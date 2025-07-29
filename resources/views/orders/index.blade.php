<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Pasūtījumu saraksts</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-full mx-auto">
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mx-[100px] mb-4" role="alert">
                    <strong class="font-bold">Veiksmīgi!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white shadow-sm rounded-lg p-6">
                <div class="mb-6 px-[100px]">
                    <a href="{{ route('orders.create') }}" class="inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                        + Pievienot jaunu pasūtījumu
                    </a>
                </div>

                <div class="overflow-x-auto px-[100px]">
                    <table class="table-auto w-full min-w-[1000px] border-collapse border border-gray-300 bg-white">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">Pasūtījuma numurs</th>
                                <th class="border px-4 py-2">Datums</th>
                                <th class="border px-4 py-2">Klients</th>
                                <th class="border px-4 py-2">Produkts</th>
                                <th class="border px-4 py-2">Daudzums</th>
                                <th class="border px-4 py-2">Izpildes datums</th>
                                <th class="border px-4 py-2">Prioritāte</th>
                                <th class="border px-4 py-2">Statuss</th>
                                <th class="border px-4 py-2">Darbības</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr>
                                    <td class="border px-4 py-2">{{ $order->pasutijuma_numurs }}</td>
                                    <td class="border px-4 py-2">{{ $order->datums }}</td>
                                    <td class="border px-4 py-2">{{ $order->client->nosaukums ?? $order->klients }}</td>
                                    <td class="border px-4 py-2">{{ $order->product->nosaukums ?? $order->produkts }}</td>
                                    <td class="border px-4 py-2">{{ $order->daudzums }}</td>
                                    <td class="border px-4 py-2">{{ $order->izpildes_datums }}</td>
                                    <td class="border px-4 py-2">{{ $order->prioritāte }}</td>
                                    <td class="border px-4 py-2">{{ $order->statuss }}</td>
                                    <td class="border px-4 py-2 space-y-2">
                                        <a href="{{ route('orders.edit', $order) }}" class="text-blue-600 hover:underline block">Rediģēt</a>
                                        <form action="{{ route('orders.destroy', $order) }}" method="POST" onsubmit="return confirm('Vai tiešām vēlaties dzēst šo pasūtījumu?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Dzēst</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center py-4">Nav pieejami pasūtījumi.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>