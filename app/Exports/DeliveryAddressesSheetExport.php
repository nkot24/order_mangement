<?php

namespace App\Exports;

use App\Models\DeliveryAddress;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DeliveryAddressesSheetExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return DeliveryAddress::select('id', 'client_id', 'piegades_adrese')->get();
    }

    public function headings(): array
    {
        return ['id', 'client_id', 'piegades_adrese'];
    }
}

