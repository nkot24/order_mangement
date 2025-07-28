<?php

namespace App\Imports;

use App\Models\ContactPerson;
use Maatwebsite\Excel\Concerns\ToModel;

class ContactPersonsSheetImport implements ToModel
{
    public function model(array $row)
    {
        if ($row[0] === 'id') return null;
        return new ContactPerson([
            'id' => $row[0],
            'client_id' => $row[1],
            'kontakt_personas_vards' => $row[2],
            'e-pasts' => $row[3],
            'telefons' => $row[4],
        ]);
    }
}
