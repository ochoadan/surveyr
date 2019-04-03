<?php

namespace App\Alert;

class SlackAlert extends AlertModel
{
    protected $fillable = [
        'team_id',
        'incoming_webhook',
        'slack_team',
        'slack_channel',
    ];
}
