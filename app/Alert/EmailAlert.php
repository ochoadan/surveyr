<?php

namespace App\Alert;

use Illuminate\Database\Eloquent\Model;

class EmailAlert extends Model
{
    protected $fillable = [
        'team_id',
        'email',
    ];

    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function apps()
    {
        return $this->belongsToMany('App\App');
    }
}
