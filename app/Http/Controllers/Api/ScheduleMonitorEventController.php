<?php

namespace App\Http\Controllers\Api;

use App\App;
use App\Http\Controllers\Controller;
use App\Http\Resources\ScheduleMonitorEventResource;
use App\ScheduleMonitor;
use App\ScheduleMonitorEvent;
use Illuminate\Http\Request;

class ScheduleMonitorEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $this->validate($request, [
            'schedule_monitor_id' => 'required|integer',
        ]);

        $monitor = ScheduleMonitor::findOrFail($data['schedule_monitor_id']);
        $this->authorize('view', $monitor);

        $query = $monitor->events()->orderBy('started_at', 'desc');

        if ($request->has('recent')) {
            return ScheduleMonitorEventResource::collection($query->limit(100)->get());
        }

        return ScheduleMonitorEventResource::collection($query->paginate($request->input('perPage', 10)));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = ScheduleMonitorEvent::findOrFail($id);
        $this->authorize('view', $event);

        return new ScheduleMonitorEventResource($event);
    }
}
