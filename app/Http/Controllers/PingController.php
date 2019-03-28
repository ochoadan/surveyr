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

        HandleStartPing::dispatch($monitor, now(), $eventId);

        return response('Ok');
    }

    public function finish($appId, $monitorId, Request $request)
    {
        $app     = App::where('identifier', $appId)->firstOrFail();
        $monitor = $app->scheduleMonitors()->where('identifier', $monitorId)->firstOrFail();
        $eventId = $request->input('event');
        $output  = $request->input('output');

        // Use a delay here to avoid race condition where finish ping get's procesed first
        HandleFinishPing::dispatch($monitor, now(), $eventId, $output)->delay(now()->addSeconds(5));

        return response('Ok');
    }
}
