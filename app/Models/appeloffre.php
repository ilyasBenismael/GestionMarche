<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appeloffre extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'estimation_globale',
        'estimation_detaillee',
        'objet',
        'date_douverture_des_plis',
    ];

    public function concurrents()
    {
        return $this->hasMany(Concurrent::class, 'appeloffres_id');
    }

}
