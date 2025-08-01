<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersFullExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Join with clients and products to get their names
        return Order::select(
            'pasutijuma_numurs',
            'datums',
            'client_id',
            'klients',
            'products_id',
            'produkts',
            'daudzums',
            'izpildes_datums',
            'prioritāte',
            'statuss',
            'piezimes'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Pasūtījuma numurs',
            'Datums',
            'Client ID',
            'Klients (name)',
            'Product ID',
            'Produkts (name)',
            'Daudzums',
            'Izpildes datums',
            'Prioritāte',
            'Statuss',
            'Piezīmes',
        ];
    }
}
