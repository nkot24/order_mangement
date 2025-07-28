<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Rediģēt lietotāju
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-xl mx-auto bg-white shadow-sm rounded-lg p-6">
            <form method="POST" action="{{ route('users.update', $user) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Vārds</label>
                    <input type="text" name="name" class="w-full border rounded px-3 py-2" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Loma</label>
                    <select name="role" class="w-full border rounded px-3 py-2" required>
                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrators</option>
                        <option value="worker" {{ $user->role === 'worker' ? 'selected' : '' }}>Darbinieks</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Jauna parole (aizpildīt tikai, ja vēlaties mainīt)</label>
                    <input type="password" name="password" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">Apstiprināt paroli</label>
                    <input type="password" name="password_confirmation" class="w-full border rounded px-3 py-2">
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('users.index') }}" class="mr-4 px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
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
