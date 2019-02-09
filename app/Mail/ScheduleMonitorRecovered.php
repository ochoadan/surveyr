<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\ScheduleMonitor;
use Carbon\Carbon;

class ScheduleMonitorRecovered extends Mailable
{
    use Queueable, SerializesModels;

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
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('[Recovered] Our schedule monitor has recieved a ping')
                    ->markdown('emails.monitors.recovered');
    }
}
