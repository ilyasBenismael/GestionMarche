<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prixe extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'designation',
        'marche',
        'unite',
        'quantite',
        'prix_unitaire',
        'categorie_prix',
    ];
}
