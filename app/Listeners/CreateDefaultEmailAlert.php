<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Laravel\Spark\Events\Teams\TeamCreated;
use App\Alert\EmailAlert;

class CreateDefaultEmailAlert
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TeamCreated  $event
     * @return void
     */
    public function handle(TeamCreated $event)
    {
        EmailAlert::create([
            'team_id' => $event->team->id,
            'email'   => $event->team->owner->email,
        ]);
    }
}
