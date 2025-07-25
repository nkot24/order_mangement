<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
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
