<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleMonitorEvent extends Model
{
    protected $fillable = [
        'schedule_monitor_id',
        'identifier',
        'started_at',
        'finished_at',
        'duration',
        'success',
        'output',
    ];

    protected $hidden = [
        'output',
    ];

    protected $appends = [
        'has_output',
    ];

    protected $dates = [
        'started_at',
        'finished_at',
    ];

    public function getHasOutputAttribute()
    {
        return !is_null($this->attributes['output']);
    }

    public function scheduleMonitor()
    {
        return $this->belongsTo('App\ScheduleMonitor');
    }
}
