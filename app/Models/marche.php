<?php

namespace App\Models;

use Carbon\Carbon;
use DateInterval;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marche extends Model
{
    use HasFactory;
    protected $fillable = [
        'appel_doffre',
        'numero_marche',
        'exercice',
        'type_de_marche',
        'date_approbation',
        'date_notification_approbation',
        'date_ordre_service',
        'delai_dexecution',
        'responsable_de_suivi',
        'montant',
        'prix_revisable',
        'delai_garantie',
        'date_reception_provisoire',
        'date_reception_definitive',
        'date_resiliation',
        'motif_resiliation',
        'attributaire',
        'statut',
    ];




}
