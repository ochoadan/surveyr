<?php

namespace App\Http\Controllers;

use App\App;
use App\Jobs\HandleFinishPing;
use App\Jobs\HandleStartPing;
use Illuminate\Http\Request;

class PingController extends Controller
{
    public function start($appId, $monitorId)
    {
        $app     = App::where('identifier', $appId)->firstOrFail();
        $monitor = $app->scheduleMonitors()->where('identifier', $monitorId)->firstOrFail();

        HandleStartPing::dispatch($monitor, now());

        return response('Ok');
    }

    public function finish($appId, $monitorId)
    {
        $app     = App::where('identifier', $appId)->firstOrFail();
        $monitor = $app->scheduleMonitors()->where('identifier', $monitorId)->firstOrFail();

        HandleFinishPing::dispatch($monitor, now());

        return response('Ok');
    }
}
