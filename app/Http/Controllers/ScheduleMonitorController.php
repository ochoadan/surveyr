<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ScheduleMonitor;

class ScheduleMonitorController extends Controller
{
    public function show(ScheduleMonitor $scheduleMonitor)
    {
        $this->authorize('view', $scheduleMonitor);

        $scheduleMonitor->load('app');

        return view('schedule-monitor')->with([
            'scheduleMonitor' => $scheduleMonitor,
        ]);
    }
}
