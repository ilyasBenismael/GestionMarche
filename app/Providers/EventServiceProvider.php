<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        // Subscribe to the CustomEvent and define the scheduled task
        event(CustomEvent::class, function (CustomEvent $event) {
            $id = $event->id;

            // Find and update the record in `tablex`
            $marche = Marche::find($id);
            if ($marche) {
                $dateReceptionProvisoire = Carbon::parse($marche->date_reception_provisoire);
                $delaiGarantie = $marche->delai_garantie;

                $dateReceptionDefinitive = $dateReceptionProvisoire->addDays($delaiGarantie);
                $marche->date_reception_definitive = $dateReceptionDefinitive;
                $marche->save();
            }
        });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
