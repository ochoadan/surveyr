<?php

namespace App\Mail;

use App\Team;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TrialIsOver extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Team
     */
    public $team;

    /**
     * Create a new message instance.
     *
     * @param Team $team
     * @return void
     */
    public function __construct(Team $team)
    {
        $this->team = $team;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your Surveyr trial ends today')
                    ->markdown('emails.trial-over');
    }
}
