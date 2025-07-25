<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeliveryAddress extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'piegades_adrese'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
