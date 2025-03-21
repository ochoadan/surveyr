<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\CreateStripePlans::class,
        \App\Console\Commands\DeleteOldEvents::class,
        \App\Console\Commands\RunAlertChecks::class,
        \App\Console\Commands\SendTrialReminders::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('app:run-alert-checks')->everyMinute()->monitor();
        $schedule->command('app:delete-old-events')->daily()->at('00:00')->monitor();

        $schedule->command('horizon:snapshot')->everyFiveMinutes();
        $schedule->command('spark:kpi')->dailyAt('23:55');

        $schedule->command('app:send-trial-reminders')->daily()->at('00:01')->monitor();

        $schedule->command('backup:clean')->daily()->at('01:00');
        $schedule->command('backup:run')->daily()->at('02:00');
        $schedule->command('backup:monitor')->daily()->at('03:00');
    }

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
