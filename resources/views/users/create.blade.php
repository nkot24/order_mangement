<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pievienot lietotāju
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto bg-white shadow-sm rounded-lg p-6">
            <form method="POST" action="{{ route('users.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Vārds</label>
                    <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Loma</label>
                    <select name="role" class="w-full border rounded px-3 py-2" required>
                        <option value="">-- Izvēlieties --</option>
                        <option value="admin">Administrators</option>
                        <option value="worker">Darbinieks</option>
                    </select>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('users.index') }}" class="mr-4 px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                        Atcelt
                    </a>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                        Saglabāt
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
