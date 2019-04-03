<?php

namespace App\Alert;

class EmailAlert extends AlertModel
{
    protected $fillable = [
        'team_id',
        'email',
    ];
}
