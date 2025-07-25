<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Rediģēt produktu
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto bg-white shadow-sm rounded-lg p-6">
            <form method="POST" action="{{ route('products.update', $product) }}">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label for="svitr_kods">Svītrkods</label>
                        <input type="number" name="svitr_kods" class="mt-1 block w-full" required value="{{ old('svitr_kods', $product->svitr_kods) }}">
                    </div>

                    <div>
                        <label for="nosaukums">Nosaukums</label>
                        <input type="text" name="nosaukums" class="mt-1 block w-full" required value="{{ old('nosaukums', $product->nosaukums) }}">
                    </div>

                    <div>
                        <label for="pardosanas_cena">Pārdošanas cena</label>
                        <input type="number" step="0.01" name="pardosanas_cena" class="mt-1 block w-full" required value="{{ old('pardosanas_cena', $product->pardosanas_cena) }}">
                    </div>

                    <div>
                        <label for="vairumtirdzniecibas_cena">Vairumtirdzniecības cena</label>
                        <input type="number" step="0.01" name="vairumtirdzniecibas_cena" class="mt-1 block w-full" value="{{ old('vairumtirdzniecibas_cena', $product->vairumtirdzniecibas_cena) }}">
                    </div>

                    <div>
                        <label for="daudzums_noliktava">Daudzums noliktavā</label>
                        <input type="number" name="daudzums_noliktava" class="mt-1 block w-full" value="{{ old('daudzums_noliktava', $product->daudzums_noliktava) }}">
                    </div>

                    <div>
                        <label for="svars_neto">Svars (neto, kg)</label>
                        <input type="number" step="0.01" name="svars_neto" class="mt-1 block w-full" value="{{ old('svars_neto', $product->svars_neto) }}">
                    </div>

                    <div>
                        <label for="nomGr_kods">Nomenklatūras grupas kods</label>
                        <input type="text" name="nomGr_kods" class="mt-1 block w-full" required value="{{ old('nomGr_kods', $product->nomGr_kods) }}">
                    </div>

                    <div>
                        <label for="garums">Garums (cm)</label>
                        <input type="number" step="0.01" name="garums" class="mt-1 block w-full" value="{{ old('garums', $product->garums) }}">
                    </div>

                    <div>
                        <label for="platums">Platums (cm)</label>
                        <input type="number" step="0.01" name="platums" class="mt-1 block w-full" value="{{ old('platums', $product->platums) }}">
                    </div>

                    <div>
                        <label for="augstums">Augstums (cm)</label>
                        <input type="number" step="0.01" name="augstums" class="mt-1 block w-full" value="{{ old('augstums', $product->augstums) }}">
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <a href="{{ route('products.index') }}" class="mr-4 px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                        Atcelt
                    </a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Saglabāt izmaiņas
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
