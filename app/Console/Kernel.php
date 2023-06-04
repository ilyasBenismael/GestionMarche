<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

    protected $commands = [Commands\UpdateMarcheDefinitive::class,];

    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            // Your code to update the marche goes here
        })->after(function ($schedule) {
            $schedule->command('marche:update_definitive {marcheId}')
                ->withoutOverlapping()
                ->runInBackground()
                ->after(function () {
                    sleep(120); // Wait for 300 seconds (5 minutes) before executing the command
                });
        });
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
