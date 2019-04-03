<?php

namespace App\Alert;

use Illuminate\Database\Eloquent\Model;

class AlertModel extends Model
{
    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function apps()
    {
        return $this->belongsToMany('App\App');
    }
}
