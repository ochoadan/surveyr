<?php

namespace App\Console\Commands;

use App\Team;
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
                    $team = $monitor->app->team;
                    if (!$team || !$this->teamIsOnTrialOrSubscribed($team)) {
                        continue;
                    }

                    $cron = CronExpression::factory($monitor->schedule);
                    if ($cron->isDue('now', $monitor->timezone)) {
                        $this->line("Queuing check for monitor {$monitor->id}...");
                        RunAlertCheck::dispatch($monitor, now())
                                 ->delay(now()->addMinutes($monitor->grace_period))
                                 ->onQueue('alert-checks');
                    }
                } catch (\Exception $e) {
                    report($e);
                }
            }
        });

        $this->info('Finshed');
    }

    /**
     * @param Team $team
     * @return boolean
     */
    protected function teamIsOnTrialOrSubscribed(Team $team)
    {
        return $team->onGenericTrial() || $team->subscribed();
    }
}
