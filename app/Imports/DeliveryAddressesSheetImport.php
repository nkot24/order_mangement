<?php

namespace App\Imports;

use App\Models\DeliveryAddress;
use Maatwebsite\Excel\Concerns\ToModel;

class DeliveryAddressesSheetImport implements ToModel
{
    public function model(array $row)
    {
        if ($row[0] === 'id') return null;
        return new DeliveryAddress([
            'id' => $row[0],
            'client_id' => $row[1],
            'piegades_adrese' => $row[2],
        ]);
    }
}

