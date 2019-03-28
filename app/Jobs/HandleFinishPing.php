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
     * @var string|null
     */
    protected $output;

    /**
     * Create a new job instance.
     *
     * @param ScheduleMonitor $monitor
     * @param \Illuminate\Support\Carbon $now
     * @param string|null $eventId
     * @param string|null $output
     * @return void
     */
    public function __construct(ScheduleMonitor $monitor, $now, $eventId = null, $output = null)
    {
        $this->monitor = $monitor;
        $this->now     = $now;
        $this->eventId = $eventId;
        $this->output  = $output;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (!$this->shouldStorePing()) {
            return;
        }

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

        if ($this->output) {
            $event->output = $this->output;
        }

        $event->finished_at = $this->now;
        $event->duration    = $event->finished_at->diffInSeconds($event->started_at);
        $event->save();

        $this->monitor->last_run_at = $this->now;
        $this->monitor->save();
    }

    /**
     * @return boolean
     */
    protected function shouldStorePing()
    {
        $team = optional($this->monitor->app->team);
        if (!$team) {
            return false;
        }

        if ($team->subscribed() || $team->onGenericTrial()) {
            return true;
        }

        return false;
    }
}
