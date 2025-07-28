<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    public function model(array $row)
    {
        if ($row[0] === 'id') return null; // Skip header row

        return new Product([
            'id' => $row[0],
            'svitr_kods' => $row[1],
            'nosaukums' => $row[2],
            'pardosanas_cena' => $row[3],
            'vairumtirdzniecibas_cena' => $row[4],
            'daudzums_noliktava' => $row[5],
            'svars_neto' => $row[6],
            'nomGr_kods' => $row[7],
            'garums' => $row[8],
            'platums' => $row[9],
            'augstums' => $row[10],
        ]);
    }
}
