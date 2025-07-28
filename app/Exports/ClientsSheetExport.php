<?php

namespace App\Exports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientsSheetExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Client::select('id', 'nosaukums', 'registracijas_numurs', 'pvn_maksataja_numurs', 'juridiska_adrese')->get();
    }

    public function headings(): array
    {
        return ['id', 'nosaukums', 'registracijas_numurs', 'pvn_maksataja_numurs', 'juridiska_adrese'];
    }
}

