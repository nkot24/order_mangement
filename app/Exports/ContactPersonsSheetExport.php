<?php

namespace App\Exports;

use App\Models\ContactPerson;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ContactPersonsSheetExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return ContactPerson::select('id', 'client_id', 'kontakt_personas_vards', 'e-pasts', 'telefons')->get();
    }

    public function headings(): array
    {
        return ['id', 'client_id', 'kontakt_personas_vards', 'e-pasts', 'telefons'];
    }
}

