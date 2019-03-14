<?php

namespace App\Console\Commands;

use App\ScheduleMonitorEvent;
use Illuminate\Console\Command;

class DeleteOldEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-old-events';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete schedule monitor events older than the limit';

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
        $dateLimit = now()->subDays(30);
        $count     = ScheduleMonitorEvent::where('created_at', '<', $dateLimit)->count();

        if (!$count) {
            $this->info("No events to delete");
            return;
        }

        $this->info("Deleting {$count} old events...");

        ScheduleMonitorEvent::where('created_at', '<', $dateLimit)->delete();

        $this->info('Finished');
    }
}
