<?php

namespace App\Mail;

use App\ScheduleMonitor;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ScheduleMonitorSetUp extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var ScheduleMonitor
     */
    public $monitor;

    /**
     * Create a new message instance.
     *
     * @param ScheduleMonitor $monitor
     * @return void
     */
    public function __construct(ScheduleMonitor $monitor)
    {
        $this->monitor = $monitor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your scheduled cron job is now being monitored')
                    ->markdown('emails.monitors.setup');
    }
}
