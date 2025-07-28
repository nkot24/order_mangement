<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ClientsFullImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            0 => new ClientsSheetImport(),
            1 => new ContactPersonsSheetImport(),
            2 => new DeliveryAddressesSheetImport(),
        ];
    }
}

