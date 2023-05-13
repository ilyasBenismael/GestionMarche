<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriePrix extends Model
{
    use HasFactory;

    protected $table = 'categoriePrix';
    protected $fillable = [
        'marche',
        'designation',
    ];
}
