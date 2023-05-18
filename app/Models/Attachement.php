<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachement extends Model
{
    use HasFactory;


    protected $table = 'attachements';

    protected $fillable = [
        'date',
        'marche',
        'numero',
        'montant_de_revision',
    ];
}
