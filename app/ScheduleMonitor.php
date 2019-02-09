<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleMonitor extends Model
{
    protected $fillable = [
        'app_id',
        'slug',
        'name',
        'command',
        'status',
        'schedule',
        'timezone',
        'grace_period',
        'last_run_at',
    ];

    protected $dates = [
        'last_run_at',
    ];

    public function app()
    {
        return $this->belongsTo('App\App');
    }

    public function events()
    {
        return $this->hasMany('App\ScheduleMonitorEvent');
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->slug = uniqid();
        });
    }
}
