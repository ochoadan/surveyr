<?php

namespace App\Slack;

use App\Alert\SlackAlert;
use App\ScheduleMonitor;
use Carbon\Carbon;

class ScheduleMonitorFailing extends SlackMessage
{
    /**
     * @var SlackAlert
     */
    public $alert;

    /**
     * @var ScheduleMonitor
     */
    public $monitor;

    /**
     * @var Carbon
     */
    public $checkTime;

    /**
     * Create a new message instance.
     *
     * @param SlackAlert $alert
     * @param ScheduleMonitor $monitor
     * @param Carbon $checkTime
     * @return void
     */
    public function __construct(SlackAlert $alert, ScheduleMonitor $monitor, Carbon $checkTime)
    {
        $this->alert     = $alert;
        $this->monitor   = $monitor;
        $this->checkTime = $checkTime;
    }

    /**
     * Send the message.
     */
    public function sendMessage()
    {
        $fields = [
            [
                'title' => $this->monitor->name ?: 'Command',
                'value' => $this->monitor->command,
                'short' => false,
            ],
            [
                'title' => 'Schedule',
                'value' => $this->monitor->schedule,
                'short' => true,
            ],
            [
                'title' => 'Expected at',
                'value' => $this->checkTime->toDateTimeString() . ' ' . $this->monitor->timezone,
                'short' => true,
            ],
        ];

        if ($this->monitor->last_run_at) {
            array_push($fields, [
                'title' => 'Last run at',
                'value' => $this->monitor->last_run_at->toDateTimeString() . ' ' . $this->monitor->timezone,
                'short' => true,
            ]);
        }

        $this->send($this->alert->incoming_webhook, [
            'attachments' => [
                [
                    'text'    => '[Failing] Our schedule monitor has not recieved a ping.',
                    'color'   => 'danger',
                    'fields'  => $fields,
                    'actions' => [
                        [
                            'type' => 'button',
                            'text' => 'View Schedule Monitor',
                            'url'  => url("schedule-monitor/{$this->monitor->id}"),
                        ],
                    ],
                ],
            ],
        ]);
    }
}
