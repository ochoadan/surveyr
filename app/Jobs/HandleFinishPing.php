<?php

namespace App\Jobs;

use App\ScheduleMonitor;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class HandleFinishPing implements ShouldQueue
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
        if ($this->eventId) {
            $event = $this->monitor->events()
                                   ->where('identifier', $this->eventId)
                                   ->orderBy('started_at', 'asc')
                                   ->first();
        } else {
            $event = $this->monitor->events()
                                   ->whereNull('finished_at')
                                   ->orderBy('started_at', 'asc')
                                   ->first();
        }

        if (!$event) {
            return;
        }

        $event->finished_at = $this->now;
        $event->duration    = $event->finished_at->diffInSeconds($event->started_at);
        $event->save();

        $this->monitor->last_run_at = $this->now;
        $this->monitor->save();
    }
}
