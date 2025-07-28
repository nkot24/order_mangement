<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lietotāju saraksts
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-full mx-auto bg-white shadow-sm rounded-lg p-6">
            <div class="overflow-x-auto px-[100px]">
                <table class="table-auto w-full min-w-[900px] border-collapse border border-gray-300 bg-white">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Vārds</th>
                            <th class="border px-4 py-2">Loma</th>
                            <th class="border px-4 py-2">Parole</th>
                            <th class="border px-4 py-2">Darbības</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="border px-4 py-2">{{ $user->id }}</td>
                                <td class="border px-4 py-2">{{ $user->name }}</td>
                                <td class="border px-4 py-2">{{ ucfirst($user->role) }}</td>
                                <td class="border px-4 py-2 font-mono">{{ $user->visible_password ?? '-' }}</td>
                                <td class="border px-4 py-2 space-x-2">
                                    <a href="{{ route('users.edit', $user) }}" class="text-blue-600 hover:underline">Rediģēt</a>
                                    <form method="POST" action="{{ route('users.destroy', $user) }}" class="inline" onsubmit="return confirm('Vai tiešām vēlaties dzēst šo lietotāju?');">
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
                <a href="{{ route('users.create') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    + Pievienot lietotāju
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
