<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Marche;
class UpdateMarcheDefinitive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'marche:update_definitive {marcheId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

//
//        $marcheId = $this->option('id');
//        $marche = Marche::find($marcheId);
//
//        $delaiGarantie=3;
//
//        if ($marche) {
//            $dateReceptionProvisoire = Carbon::parse($marche->date_reception_provisoire);
//            // $delaiGarantie = $marche->delai_garantie;
//
//            $dateReceptionDefinitive = $dateReceptionProvisoire->addDays($delaiGarantie);
//            $marche->date_reception_definitive = $dateReceptionDefinitive;
//            $marche->save();
//
//            $this->info('date_reception_definitive updated successfully for marche ID: ' . $marcheId);
//        } else {
//            $this->error('Unable to find marche with ID: ' . $marcheId);
//        }


        $marcheId = $this->argument('marcheId');
        $marche = Marche::find($marcheId);

        if ($marche) {
          //  $dateReceptionProvisoire = Carbon::parse($marche->date_reception_provisoire);
            // $delaiGarantie = $marche->delai_garantie;

//            $dateReceptionDefinitive = $dateReceptionProvisoire->addMinutes(3);
            $marche->date_reception_definitive = $marche->date_reception_provisoire;
            $marche->save();

            $this->info('Marche updated successfully.');
        } else {
            $this->error('Marche not found.');
        }
    }
}
