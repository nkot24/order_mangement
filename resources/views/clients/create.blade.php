<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pievienot klientu
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">
                @if ($errors->any())
                    <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('clients.store') }}" method="POST">
                    @csrf

                    {{-- Nosaukums --}}
                    <div class="mt-4">
                        <x-input-label for="nosaukums" value="Nosaukums" />
                        <x-text-input id="nosaukums" name="nosaukums" class="mt-1 block w-full"
                                      value="{{ old('nosaukums') }}" required autofocus />
                    </div>

                    {{-- Reģistrācijas numurs --}}
                    <div class="mt-4">
                        <x-input-label for="registracijas_numurs" value="Reģistrācijas numurs" />
                        <x-text-input id="registracijas_numurs" name="registracijas_numurs" class="mt-1 block w-full"
                                      value="{{ old('registracijas_numurs') }}" required />
                    </div>

                    {{-- PVN numurs --}}
                    <div class="mt-4">
                        <x-input-label for="pvn_maksataja_numurs" value="PVN maksātāja numurs" />
                        <x-text-input id="pvn_maksataja_numurs" name="pvn_maksataja_numurs" class="mt-1 block w-full"
                                      value="{{ old('pvn_maksataja_numurs') }}" />
                    </div>

                    {{-- Juridiskā adrese --}}
                    <div class="mt-4">
                        <x-input-label for="juridiska_adrese" value="Juridiskā adrese" />
                        <x-text-input id="juridiska_adrese" name="juridiska_adrese" class="mt-1 block w-full"
                                      value="{{ old('juridiska_adrese') }}" />
                    </div>

                    {{-- Kontaktpersonas --}}
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold">Kontaktpersonas</h3>
                        <div id="contacts"></div>
                        <button type="button" id="add-contact" class="mt-2 px-4 py-2 bg-green-600 text-white rounded">+ Pievienot kontaktpersonu</button>
                    </div>

                    {{-- Piegādes adreses --}}
                    <div class="mt-8">
                        <h3 class="text-lg font-semibold">Piegādes adreses</h3>
                        <div id="addresses"></div>
                        <button type="button" id="add-address" class="mt-2 px-4 py-2 bg-green-600 text-white rounded">+ Pievienot adresi</button>
                    </div>

                    <button type="submit" class="mt-6 px-4 py-2 bg-blue-600 text-white rounded">Saglabāt klientu</button>
                </form>
            </div>
        </div>
    </div>

    {{-- Inline JS --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let contactIndex = 0;
            let addressIndex = 0;

            document.getElementById('add-contact').addEventListener('click', function () {
                const container = document.getElementById('contacts');
                container.insertAdjacentHTML('beforeend', `
                    <div class="contact mb-4 p-4 border rounded bg-gray-50">
                        <x-input-label value="Kontaktpersonas vārds" />
                        <input name="contact_persons[${contactIndex}][kontakt_personas_vards]" required class="w-full border p-2 rounded mb-2" />

                        <x-input-label value="E-pasts" />
                        <input name="contact_persons[${contactIndex}][e-pasts]" class="w-full border p-2 rounded mb-2" />

                        <x-input-label value="Telefons" />
                        <input name="contact_persons[${contactIndex}][telefons]" class="w-full border p-2 rounded mb-2" />

                        <button type="button" class="remove-contact text-red-600 mt-2">Noņemt</button>
                    </div>
                `);
                contactIndex++;
            });

            document.getElementById('contacts').addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-contact')) {
                    e.target.closest('.contact').remove();
                }
            });

            document.getElementById('add-address').addEventListener('click', function () {
                const container = document.getElementById('addresses');
                container.insertAdjacentHTML('beforeend', `
                    <div class="address mb-4 p-4 border rounded bg-gray-50">
                        <x-input-label value="Piegādes adrese" />
                        <input name="delivery_addresses[${addressIndex}][piegades_adrese]" required class="w-full border p-2 rounded mb-2" />
                        <button type="button" class="remove-address text-red-600 mt-2">Noņemt</button>
                    </div>
                `);
                addressIndex++;
            });

            document.getElementById('addresses').addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-address')) {
                    e.target.closest('.address').remove();
                }
            });
        });
    </script>
</x-app-layout>
