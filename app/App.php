<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    protected $fillable = [
        'team_id',
        'slug',
        'name',
    ];

    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function scheduleMonitors()
    {
        return $this->hasMany('App\ScheduleMonitor');
    }

    public function emailAlerts()
    {
        return $this->belongsToMany('App\Alert\EmailAlert');
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->slug = uniqid();
        });
    }
}
