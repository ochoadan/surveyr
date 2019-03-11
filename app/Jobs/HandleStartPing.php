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
     * @var string|null
     */
    protected $eventId;

    /**
     * Create a new job instance.
     *
     * @param ScheduleMonitor $monitor
     * @param \Illuminate\Support\Carbon $now
     * @param string|null $eventId
     * @return void
     */
    public function __construct(ScheduleMonitor $monitor, $now, $eventId = null)
    {
        $this->monitor = $monitor;
        $this->now     = $now;
        $this->eventId = $eventId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->eventId && $this->monitor->events()->where('identifier', $this->eventId)->exists()) {
            return;
        }

        ScheduleMonitorEvent::create([
            'schedule_monitor_id' => $this->monitor->id,
            'identifier'          => $this->eventId,
            'started_at'          => $this->now,
        ]);
    }
}
