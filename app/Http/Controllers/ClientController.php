<?php
namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ContactPerson;
use App\Models\DeliveryAddress;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::with('contactPersons', 'deliveryAddresses')->get();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nosaukums' => 'required|string',
            'registracijas_numurs' => 'required|string|unique:clients',
            'pvn_maksataja_numurs' => 'nullable|string',
            'juridiska_adrese' => 'nullable|string',
            'contact_persons.*.kontakt_personas_vards' => 'required|string',
            'contact_persons.*.e-pasts' => 'nullable|email',
            'contact_persons.*.telefons' => 'nullable|string',
            'delivery_addresses.*.piegades_adrese' => 'required|string',
        ]);

        $client = Client::create($validated);

        foreach ($request->contact_persons ?? [] as $person) {
            $client->contactPersons()->create($person);
        }

        foreach ($request->delivery_addresses ?? [] as $address) {
            $client->deliveryAddresses()->create($address);
        }

        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    public function show(Client $client)
    {
        $client->load('contactPersons', 'deliveryAddresses');
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        $client->load('contactPersons', 'deliveryAddresses');
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
            $validated = $request->validate([
            'nosaukums' => 'required|string',
            'registracijas_numurs' => 'required|string|unique:clients,registracijas_numurs,' . $client->id,
            'pvn_maksataja_numurs' => 'nullable|string',
            'juridiska_adrese' => 'nullable|string',

            'contact_persons.*.id' => 'nullable|exists:contact_persons,id',
            'contact_persons.*.kontakt_personas_vards' => 'required|string',
            'contact_persons.*.e_pasts' => 'nullable|email',
            'contact_persons.*.telefons' => 'nullable|string',

            'delivery_addresses.*.id' => 'nullable|exists:delivery_addresses,id',
            'delivery_addresses.*.piegades_adrese' => 'required|string',
        ]);

        $client->update($validated);

        // Handle contact persons
        $existingContactIds = $client->contactPersons()->pluck('id')->toArray();
        $submittedContactIds = collect($request->contact_persons)->pluck('id')->filter()->toArray();

        // Delete removed contacts
        $toDelete = array_diff($existingContactIds, $submittedContactIds);
        $client->contactPersons()->whereIn('id', $toDelete)->delete();

        foreach ($request->contact_persons ?? [] as $personData) {
            if (isset($personData['id'])) {
                $client->contactPersons()->where('id', $personData['id'])->update($personData);
            } else {
                $client->contactPersons()->create($personData);
            }
        }

        // Handle delivery addresses
        $existingAddressIds = $client->deliveryAddresses()->pluck('id')->toArray();
        $submittedAddressIds = collect($request->delivery_addresses)->pluck('id')->filter()->toArray();

        $toDeleteAddresses = array_diff($existingAddressIds, $submittedAddressIds);
        $client->deliveryAddresses()->whereIn('id', $toDeleteAddresses)->delete();

        foreach ($request->delivery_addresses ?? [] as $addressData) {
            if (isset($addressData['id'])) {
                $client->deliveryAddresses()->where('id', $addressData['id'])->update($addressData);
            } else {
                $client->deliveryAddresses()->create($addressData);
            }
        }

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client deleted.');
    }
}
