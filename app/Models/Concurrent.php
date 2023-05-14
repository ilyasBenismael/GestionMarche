<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concurrent extends Model
{
    use HasFactory;

    protected $table = 'concurrents';
    protected $fillable = [
        'nom',
        'ville',
        'montant',
        'statut',
    ];



    public function appelOffres()
    {
        return $this->belongsTo(AppelOffre::class, 'appeloffres_id', 'id');
    }
}
