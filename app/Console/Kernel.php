<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('queue:work --stop-when-empty')->everyFiveMinutes()->withoutOverlapping();
        
        // send even reminder mails every day at 6am
        //$schedule->command('remind:events')->everyFiveMinutes();
        
        //$schedule->command('command:backupdb')->evenInMaintenanceMode()->dailyAt('04:35');
        
        //$schedule->command('manage:sqlbackups')->evenInMaintenanceMode()->dailyAt('04:40');
        
        // $schedule->command('remind:events')->evenInMaintenanceMode()->dailyAt('06:00');
        
        //$schedule->command('command:backupdb')->evenInMaintenanceMode()->dailyAt('07:15');

        //$schedule->command('backup:singletables')->dailyAt('19:15');
        
        //$schedule->command('queue:work --tries=3')
        //             ->cron('* * * * * *')
        //             ->withoutOverlapping();
        Log::channel('cronjob')->info('Schedule Jobs started');
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
