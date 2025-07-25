<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Klientu saraksts
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-full mx-auto">

            <!-- White background container with padding and rounded corners -->
            <div class="bg-white shadow-sm rounded-lg p-6">

                <!-- Padding 100px left/right + horizontal scroll -->
                <div class="overflow-x-auto px-[100px]">
                    <table class="table-auto w-full min-w-[1000px] border-collapse border border-gray-300 bg-white">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">Nosaukums</th>
                                <th class="border border-gray-300 px-4 py-2">Reģistrācijas numurs</th>
                                <th class="border border-gray-300 px-4 py-2">PVN maksātāja numurs</th>
                                <th class="border border-gray-300 px-4 py-2">Juridiskā adrese</th>
                                <th class="border border-gray-300 px-4 py-2">Kontaktpersonas</th>
                                <th class="border border-gray-300 px-4 py-2">Piegādes adreses</th>
                                <th class="border border-gray-300 px-4 py-2">Darbības</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($clients as $client)
                                <tr class="border border-gray-300">
                                    <td class="border border-gray-300 px-4 py-2">{{ $client->nosaukums }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $client->registracijas_numurs }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $client->pvn_maksataja_numurs ?? '-' }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $client->juridiska_adrese ?? '-' }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <ul class="list-disc pl-5">
                                            @foreach ($client->contactPersons as $cp)
                                                <li class="mb-1">
                                                    <strong>{{ $cp->kontakt_personas_vards }}</strong><br>
                                                    E-pasts: {{ $cp->{'e-pasts'} ?? '-' }}<br>
                                                    Telefons: {{ $cp->telefons ?? '-' }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <ul class="list-disc pl-5">
                                            @foreach ($client->deliveryAddresses as $da)
                                                <li class="mb-1">{{ $da->piegades_adrese }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2 space-x-2">
                                        <a href="{{ route('clients.edit', $client) }}" class="text-blue-600 hover:underline">Rediģēt</a>

                                        <form method="POST" action="{{ route('clients.destroy', $client) }}" class="inline"
                                              onsubmit="return confirm('Vai tiešām vēlaties dzēst šo klientu?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Dzēst</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">Nav pieejami klienti.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6 px-[100px]">
                    <a href="{{ route('clients.create') }}" class="inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                        + Pievienot jaunu klientu
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
