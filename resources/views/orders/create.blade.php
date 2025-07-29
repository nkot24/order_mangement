<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Izveidot jaunu pasūtījumu</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto bg-white p-6 shadow-md rounded">
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block mb-1 font-semibold">Izvēlieties klientu (vai atstājiet tukšu)</label>
                    <select name="client_id" class="w-full border rounded px-3 py-2">
                        <option value="">-- Nav atlasīts --</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->nosaukums }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-semibold">Vienreizējs klienta nosaukums</label>
                    <input type="text" name="klients" class="w-full border rounded px-3 py-2" placeholder="Piem. Jauns Klients">
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-semibold">Izvēlieties produktu (vai atstājiet tukšu)</label>
                    <select name="products_id" class="w-full border rounded px-3 py-2">
                        <option value="">-- Nav atlasīts --</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->nosaukums }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-semibold">Vienreizējs produkta nosaukums</label>
                    <input type="text" name="produkts" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-semibold">Daudzums</label>
                    <input type="number" name="daudzums" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-semibold">Izpildes datums</label>
                    <input type="date" name="izpildes_datums" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-semibold">Prioritāte</label>
                    <select name="prioritāte" class="w-full border rounded px-3 py-2">
                        <option value="zema">Zema</option>
                        <option value="normāla" selected>Normāla</option>
                        <option value="augsta">Augsta</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-semibold">Statuss</label>
                    <select name="statuss" class="w-full border rounded px-3 py-2">
                        <option value="nav nodots ražošanai" selected>Nav nodots ražošanai</option>
                        <option value="ražošanā">Ražošanā</option>
                        <option value="pabeigts">Pabeigts</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-semibold">Piezīmes</label>
                    <textarea name="piezimes" class="w-full border rounded px-3 py-2"></textarea>
                </div>

                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Saglabāt pasūtījumu</button>
            </form>
        </div>
    </div>
</x-app-layout>