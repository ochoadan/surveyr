<?php

namespace App\Http\Controllers;

use App\Jobs\HandleFinishPing;
use App\Jobs\HandleStartPing;
use App\ScheduleMonitor;
use Illuminate\Http\Request;

class PingController extends Controller
{
    public function start($identifier)
    {
        $monitor = $this->getMonitorByIdentifier($identifier);

        HandleStartPing::dispatch($monitor, now());

        return response('Ok');
    }

    public function finish($identifier)
    {
        $monitor = $this->getMonitorByIdentifier($identifier);

        HandleFinishPing::dispatch($monitor, now());

        return response('Ok');
    }

    /**
     * @param String $identifier
     * @return ScheduleMonitor
     */
    private function getMonitorByIdentifier($identifier)
    {
        $monitor = ScheduleMonitor::where('identifier', $identifier)->first();
        abort_unless($monitor, 404);

        return $monitor;
    }
}
