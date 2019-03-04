<?php

namespace App\Http\Controllers\Api;

use App\App;
use App\Exceptions\UpgradeRequiredException;
use App\Http\Controllers\Controller;
use App\Http\Resources\ScheduleMonitorResource;
use App\ScheduleMonitor;
use App\Surveyr\Helpers\BillingHelper;
use Illuminate\Http\Request;

class ScheduleMonitorController extends Controller
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
            'app_id' => 'required|integer',
        ]);

        $app = App::findOrFail($data['app_id']);
        $this->authorize('view', $app);

        return ScheduleMonitorResource::collection($app->scheduleMonitors()->paginate($request->input('perPage', 10)));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', ScheduleMonitor::class);

        $data = $this->validate($request, [
            'app_id'       => 'nullable|required_without:identifier|integer',
            'identifier'   => 'nullable|required_without:app_id|string',
            'name'         => 'nullable|string',
            'command'      => 'required|string',
            'schedule'     => 'required|string',
            'timezone'     => 'nullable|string',
            'grace_period' => 'nullable|integer|min:1',
        ]);

        if (!empty($data['identifier'])) {
            $app = App::where('identifier', $data['identifier'])->firstOrFail();
        } else {
            $app = App::findOrFail($data['app_id']);
        }

        $this->authorize('view', $app);
        if (!BillingHelper::canCreateScheduleMonitors($app->team)) {
            throw new UpgradeRequiredException('Schedule monitor limit reached.');
        }

        $monitorExists = $app->scheduleMonitors()
                             ->where('command', $data['command'])
                             ->where('schedule', $data['schedule'])
                             ->where('timezone', $data['timezone'])
                             ->exists();

        if ($monitorExists) {
            throw \Illuminate\Validation\ValidationException::withMessages([
               'command' => ['A schedule monitor for this command already exists.'],
            ]);
        }

        $data['app_id'] = $app->id;

        if (empty($data['grace_period'])) {
            $data['grace_period'] = 3;
        }

        $monitor = ScheduleMonitor::create($data);

        return new ScheduleMonitorResource($monitor);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $monitor = ScheduleMonitor::findOrFail($id);
        $this->authorize('view', $monitor);

        return new ScheduleMonitorResource($monitor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $monitor = ScheduleMonitor::findOrFail($id);
        $this->authorize('update', $monitor);

        $data = $this->validate($request, [
            'name'         => 'nullable|string',
            'command'      => 'required|string',
            'schedule'     => 'required|string',
            'timezone'     => 'nullable|string',
            'grace_period' => 'required|integer|min:1',
        ]);

        $monitor->update($data);

        return new ScheduleMonitorResource($monitor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $monitor = ScheduleMonitor::findOrFail($id);
        $this->authorize('delete', $monitor);

        $monitor->events()->delete();
        $monitor->delete();

        return new ScheduleMonitorResource($monitor);
    }
}
