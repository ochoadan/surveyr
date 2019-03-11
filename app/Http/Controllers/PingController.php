<?php

namespace App\Http\Controllers;

use App\App;
use App\Jobs\HandleFinishPing;
use App\Jobs\HandleStartPing;
use Illuminate\Http\Request;

class PingController extends Controller
{
    public function start($appId, $monitorId, Request $request)
    {
        $app     = App::where('identifier', $appId)->firstOrFail();
        $monitor = $app->scheduleMonitors()->where('identifier', $monitorId)->firstOrFail();
        $eventId = $request->input('event');

        if ($eventId && $monitor->events()->where('identifier', $eventId)->exists()) {
            return response('Ok');
        }

        HandleStartPing::dispatch($monitor, now(), $eventId);

        return response('Ok');
    }

    public function finish($appId, $monitorId, Request $request)
    {
        $app     = App::where('identifier', $appId)->firstOrFail();
        $monitor = $app->scheduleMonitors()->where('identifier', $monitorId)->firstOrFail();
        $eventId = $request->input('event');

        HandleFinishPing::dispatch($monitor, now(), $eventId);

        return response('Ok');
    }
}
