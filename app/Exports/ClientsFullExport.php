<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ClientsFullExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            new ClientsSheetExport(),
            new ContactPersonsSheetExport(),
            new DeliveryAddressesSheetExport(),
        ];
    }
}
