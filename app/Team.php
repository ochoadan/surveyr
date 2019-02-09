<?php

namespace App;

use Laravel\Spark\Team as SparkTeam;

class Team extends SparkTeam
{
    public function apps()
    {
        return $this->hasMany('App\App');
    }

    public function emailAlerts()
    {
        return $this->hasMany('App\Alert\EmailAlert');
    }
}
