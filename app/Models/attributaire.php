<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attributaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'raison_sociale',
        'adresse',
        'compte_bancaire',
        'nom_banque',
        'registre_de_commerce',
        'ville_registre_de_commerce',
        'cnss',
        'ville_cnss',
        'patente',
    ];

}
