<?php

namespace App\Http\Controllers;

use App\Jobs\HandleFinishPing;
use App\Jobs\HandleStartPing;
use App\ScheduleMonitor;
use Illuminate\Http\Request;

class PingController extends Controller
{
    public function start($slug)
    {
        $monitor = $this->getMonitorBySlug($slug);

        HandleStartPing::dispatch($monitor, now());

        return response('Ok');
    }

    public function finish($slug)
    {
        $monitor = $this->getMonitorBySlug($slug);

        HandleFinishPing::dispatch($monitor, now());

        return response('Ok');
    }

    /**
     * @param String $slug
     * @return ScheduleMonitor
     */
    private function getMonitorBySlug($slug)
    {
        $monitor = ScheduleMonitor::where('slug', $slug)->first();
        abort_unless($monitor, 404);

        return $monitor;
    }
}
