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


    // protected function schedule(Schedule $schedule)
    // {
    //     // $schedule->command('inspire')->hourly();

    //     // Database backup every midnight 
    //     $schedule->command('backup:run')->dailyAt('02:41');
    // }

    //  system backup schedule 
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('backup:run')->daily()->at('02:40'); // Runs at midnight every day
    }



    // protected function schedule(Schedule $schedule)
    // {
    //     $schedule->command('backup:run')->everyMinute();
    // }



    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
