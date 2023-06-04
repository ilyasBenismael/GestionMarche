<?php

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Marche;

class UpdateDateReceptionDefinitive extends Command
{
    protected $signature = 'update:date_reception_definitive {--id=}';
    protected $description = 'Update the date_reception_definitive attribute of Marche records';

    public function handle()
    {
        $marcheId = $this->option('id');
        $marche = Marche::find($marcheId);

        $delaiGarantie=3;

        if ($marche) {
            $dateReceptionProvisoire = Carbon::parse($marche->date_reception_provisoire);
           // $delaiGarantie = $marche->delai_garantie;

            $dateReceptionDefinitive = $dateReceptionProvisoire->addDays($delaiGarantie);
            $marche->date_reception_definitive = $dateReceptionDefinitive;
            $marche->save();

            $this->info('date_reception_definitive updated successfully for marche ID: ' . $marcheId);
        } else {
            $this->error('Unable to find marche with ID: ' . $marcheId);
        }
    }
}
