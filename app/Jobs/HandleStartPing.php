<?php

namespace App\Jobs;

use App\ScheduleMonitor;
use App\ScheduleMonitorEvent;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class HandleStartPing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var ScheduleMonitor;
     */
    protected $monitor;

    /**
     * @var \Illuminate\Support\Carbon
     */
    protected $now;

    /**
     * Create a new job instance.
     *
     * @param ScheduleMonitor $monitor
     * @param \Illuminate\Support\Carbon $now
     * @return void
     */
    public function __construct(ScheduleMonitor $monitor, $now)
    {
        $this->monitor = $monitor;
        $this->now     = $now;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        ScheduleMonitorEvent::create([
            'schedule_monitor_id' => $this->monitor->id,
            'started_at'          => $this->now,
        ]);
    }
}
