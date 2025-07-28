<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Product::select(
            'id',
            'svitr_kods',
            'nosaukums',
            'pardosanas_cena',
            'vairumtirdzniecibas_cena',
            'daudzums_noliktava',
            'svars_neto',
            'nomGr_kods',
            'garums',
            'platums',
            'augstums'
        )->get();
    }

    public function headings(): array
    {
        return [
            'id',
            'svitr_kods',
            'nosaukums',
            'pardosanas_cena',
            'vairumtirdzniecibas_cena',
            'daudzums_noliktava',
            'svars_neto',
            'nomGr_kods',
            'garums',
            'platums',
            'augstums',
        ];
    }
}
