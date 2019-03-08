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

    protected $dates = [
        'started_at',
        'finished_at',
    ];

    public function scheduleMonitor()
    {
        return $this->belongsTo('App\ScheduleMonitor');
    }
}
