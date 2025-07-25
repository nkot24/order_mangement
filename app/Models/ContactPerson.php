<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactPerson extends Model
{
    use HasFactory;

    protected $table = 'contact_persons';

    protected $fillable = ['client_id', 'kontakt_personas_vards', 'e-pasts', 'telefons'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}

