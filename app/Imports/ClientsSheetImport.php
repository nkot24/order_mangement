<?php

namespace App\Imports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\ToModel;

class ClientsSheetImport implements ToModel
{
    public function model(array $row)
    {
        if ($row[0] === 'id') return null; // skip header
        return new Client([
            'id' => $row[0],
            'nosaukums' => $row[1],
            'registracijas_numurs' => $row[2],
            'pvn_maksataja_numurs' => $row[3],
            'juridiska_adrese' => $row[4],
        ]);
    }
}
