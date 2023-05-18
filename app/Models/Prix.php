<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prix extends Model
{
    use HasFactory;


    protected $table = 'prix';

    protected $fillable = [
        'numero',
        'designation',
        'unite',
        'quantite',
        'prix_unitaire',
        'categorie_prix',
    ];
}
