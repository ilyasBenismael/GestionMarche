<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function setDelaiGarantieAttribute($value)
    {
        $this->attributes['delai_garantie'] = $value;

        // Calculate and set the date_reception_definitive if date_reception_provisoire is set
        if (!empty($this->attributes['date_reception_provisoire'])) {
            $dateReceptionProvisoire = Carbon::parse($this->attributes['date_reception_provisoire']);
            $delaiDeGarantie = $this->attributes['delai_garantie'];
            $endDate = $dateReceptionProvisoire->copy()->addDays($delaiDeGarantie);

            if (Carbon::now()->lt($endDate)) {
                $this->attributes['date_reception_definitive'] = NULL;
            } else {
                $this->attributes['date_reception_definitive'] = $endDate->toDateString();
            }
        }
    }

    public function setDateReceptionProvisoireAttribute($value)
    {
        $this->attributes['date_reception_provisoire'] = $value;

        // Calculate and set the date_reception_definitive if delai_garantie is set
        if (!empty($this->attributes['delai_garantie'])) {
            $dateReceptionProvisoire = Carbon::parse($value);
            $delaiDeGarantie = $this->attributes['delai_garantie'];
            $endDate = $dateReceptionProvisoire->copy()->addDays($delaiDeGarantie);

            if (Carbon::now()->lt($endDate)) {
                $this->attributes['date_reception_definitive'] = NULL;
            } else {
                $this->attributes['date_reception_definitive'] = $endDate->toDateString();
            }
        }
    }


}
