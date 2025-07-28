<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Produktu saraksts
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-full mx-auto bg-white shadow-sm rounded-lg p-6">
            <div class="overflow-x-auto px-[100px]">
                <table class="table-auto w-full min-w-[1200px] border-collapse border border-gray-300 bg-white">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">Svītrkods</th>
                            <th class="border px-4 py-2">Nosaukums</th>
                            <th class="border px-4 py-2">Pārdošanas cena</th>
                            <th class="border px-4 py-2">Vairumtirdzniecības cena</th>
                            <th class="border px-4 py-2">Daudzums noliktavā</th>
                            <th class="border px-4 py-2">Svars (kg)</th>
                            <th class="border px-4 py-2">Nom. grupas kods</th>
                            <th class="border px-4 py-2">Garums (mm)</th>
                            <th class="border px-4 py-2">Platums (mm)</th>
                            <th class="border px-4 py-2">Augstums (mm)</th>
                            <th class="border px-4 py-2">Darbības</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class="border px-4 py-2">{{ $product->svitr_kods }}</td>
                                <td class="border px-4 py-2">{{ $product->nosaukums }}</td>
                                <td class="border px-4 py-2">{{ $product->pardosanas_cena }}</td>
                                <td class="border px-4 py-2">{{ $product->vairumtirdzniecibas_cena ?? '-' }}</td>
                                <td class="border px-4 py-2">{{ $product->daudzums_noliktava ?? '-' }}</td>
                                <td class="border px-4 py-2">{{ $product->svars_neto ?? '-' }}</td>
                                <td class="border px-4 py-2">{{ $product->nomGr_kods }}</td>
                                <td class="border px-4 py-2">{{ $product->garums ?? '-' }}</td>
                                <td class="border px-4 py-2">{{ $product->platums ?? '-' }}</td>
                                <td class="border px-4 py-2">{{ $product->augstums ?? '-' }}</td>
                                <td class="border px-4 py-2 space-x-2">
                                    <a href="{{ route('products.edit', $product) }}" class="text-blue-600 hover:underline">Rediģēt</a>
                                    <form method="POST" action="{{ route('products.destroy', $product) }}" class="inline"
                                          onsubmit="return confirm('Vai tiešām vēlaties dzēst šo produktu?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Dzēst</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6 px-[100px]">
                <a href="{{ route('products.create') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    + Pievienot produktu
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
