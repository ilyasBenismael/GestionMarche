<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeMarche extends Model
{
    use HasFactory;

    protected $table = 'typeMarches';
    protected $fillable = [
        'type',
    ];


}
