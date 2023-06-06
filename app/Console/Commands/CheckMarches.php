<?php

namespace App\Console\Commands;
use App\Models\Notification;
use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Marche;
class CheckMarches extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check_marche';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check_marche';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today= Carbon::now();
        $marches = Marche::all();

        foreach ($marches as $marche) {

            // Check if delai_dexecution + date_ordre_service is today's date and marche is not already closed
            if ($marche->date_ordre_service && $marche->delai_dexecution && $marche->statut != 'Clôturé') {

                $date_service = Carbon::createFromFormat('Y-m-d', $marche->date_ordre_service);

                if ($date_service->addDays($marche->delai_dexecution+1)->isToday()) {
                $notification = new Notification();
                $notification->title = 'Rappel :: marche num ' . $marche->numero_marche;
                $notification->content = "Le délai d'exécution est terminé, mais le marché n'est pas encore clôturé.";
                $notification->target = $marche->responsable_de_suivi;
                $notification->link = 'marche/' . $marche->numero_marche;
                $notification->save();
            }
        }

            // Check if date_reception_provisoire + delai_garantie is today's date and date_reception_definitive doesn't exist
            if ($marche->date_reception_provisoire && $marche->delai_garantie && !$marche->date_reception_definitive) {

                $date_provisoire = Carbon::createFromFormat('Y-m-d', $marche->date_reception_provisoire);

                if($date_provisoire->addDays($marche->delai_garantie+1)->isToday()){
                $notification = new Notification();
                $notification->title = 'Rappel :: marche num '.$marche->numero_marche;
                $notification->content = "Le délai de garantie est terminé, mais la date de réception définitive n'a pas encore été renseignée.";
                $notification->target = $marche->responsable_de_suivi;
                $notification->link = 'marche/'.$marche->numero_marche;
                $notification->save();
            }
        }
        }
    }

}
