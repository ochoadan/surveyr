<?php

namespace App;

use App\Surveyr\Helpers\IdentifierHelper;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    protected $fillable = [
        'team_id',
        'identifier',
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

    public function slackAlerts()
    {
        return $this->belongsToMany('App\Alert\SlackAlert');
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->identifier = IdentifierHelper::appIdentifier($model);
        });
    }
}
