<?php

namespace App\Jobs;

use App\Mail\ScheduleMonitorFailing as ScheduleMonitorFailingMail;
use App\Mail\ScheduleMonitorRecovered as ScheduleMonitorRecoveredMail;
use App\ScheduleMonitor;
use App\ScheduleMonitorEvent;
use App\Slack\ScheduleMonitorFailing as ScheduleMonitorFailingSlack;
use App\Slack\ScheduleMonitorRecovered as ScheduleMonitorRecoveredSlack;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class RunAlertCheck implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var ScheduleMonitor
     */
    protected $monitor;

    /**
     * @var Carbon
     */
    protected $checkTime;

    /**
     * Create a new job instance.
     *
     * @param ScheduleMonitor $monitor
     * @param Carbon $checkTime
     * @return void
     */
    public function __construct(ScheduleMonitor $monitor, Carbon $checkTime)
    {
        $this->monitor   = $monitor;
        $this->checkTime = $checkTime;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $event = $this->monitor->events()->orderBy('started_at', 'desc')->first();
        if (!$event) {
            return;
        }

        if ($this->eventIsOlderThanGracePeriod($event)) {
            if ($this->monitor->status == 'passing') { // Only send alerts once
                $this->sendFailingAlerts();
            }

            $this->monitor->status = 'failing';
            $this->monitor->save();
        } elseif ($this->monitor->status == 'failing') {
            $this->monitor->status = 'passing';
            $this->monitor->save();

            $this->sendRecoveredAlerts();
        }
    }

    /**
     * @param ScheduleMonitorEvent $event
     * @return boolean
     */
    private function eventIsOlderThanGracePeriod(ScheduleMonitorEvent $event)
    {
        return  $event->started_at < $this->checkTime->copy()->subMinutes($this->monitor->grace_period);
    }

    protected function sendFailingAlerts()
    {
        $this->sendFailingEmailAlerts();
        $this->sendFailingSlackAlerts();
    }

    protected function sendFailingEmailAlerts()
    {
        $emailAlerts = $this->monitor->app->emailAlerts()->get();
        $emailAlerts->each(function ($emailAlert) {
            Mail::to($emailAlert->email)->send(new ScheduleMonitorFailingMail($this->monitor, $this->checkTime));
        });
    }

    protected function sendFailingSlackAlerts()
    {
        $slackAlerts = $this->monitor->app->slackAlerts()->get();
        $slackAlerts->each(function ($slackAlert) {
            (new ScheduleMonitorFailingSlack($slackAlert, $this->monitor, $this->checkTime))->sendMessage();
        });
    }

    protected function sendRecoveredAlerts()
    {
        $this->sendRecoveredEmailAlerts();
        $this->sendRecoveredSlackAlerts();
    }

    protected function sendRecoveredEmailAlerts()
    {
        $emailAlerts = $this->monitor->app->emailAlerts()->get();
        $emailAlerts->each(function ($emailAlert) {
            Mail::to($emailAlert->email)->send(new ScheduleMonitorRecoveredMail($this->monitor, $this->checkTime));
        });
    }

    protected function sendRecoveredSlackAlerts()
    {
        $slackAlerts = $this->monitor->app->slackAlerts()->get();
        $slackAlerts->each(function ($slackAlert) {
            (new ScheduleMonitorRecoveredSlack($slackAlert, $this->monitor, $this->checkTime))->sendMessage();
        });
    }
}
