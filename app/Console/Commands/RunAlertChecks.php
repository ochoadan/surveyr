<?php

namespace App\Console\Commands;

use App\Jobs\RunAlertCheck;
use App\ScheduleMonitor;
use Cron\CronExpression;
use Illuminate\Console\Command;

class RunAlertChecks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:run-alert-checks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run alert checks';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Finding schedule monitors...');

        ScheduleMonitor::chunk(100, function ($monitors) {
            foreach ($monitors as $monitor) {
                try {
                    $cron = CronExpression::factory($monitor->schedule);
                    if ($cron->isDue('now', $monitor->timezone)) {
                        $this->line("Queuing check for monitor {$monitor->id}...");
                        RunAlertCheck::dispatch($monitor, now())
                                 ->delay(now()->addMinutes($monitor->grace_period));
                    }
                } catch (\Exception $e) {
                    report($e);
                }
            }
        });

        $this->info('Finshed');
    }
}
