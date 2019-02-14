<?php

namespace App\Http\Controllers\Api;

use App\App;
use App\Exceptions\UpgradeRequiredException;
use App\Http\Controllers\Controller;
use App\Http\Resources\AppResource;
use App\Surveyr\Helpers\BillingHelper;
use App\Team;
use Illuminate\Http\Request;

class AppController extends Controller
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
            'team_id' => 'required|integer',
        ]);

        $team = Team::findOrFail($data['team_id']);
        $this->authorize('view', $team);

        return AppResource::collection($team->apps()->with(['scheduleMonitors', 'emailAlerts'])->paginate($request->input('perPage', 10)));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', App::class);

        $data = $this->validate($request, [
            'team_id'      => 'required|integer',
            'name'         => 'required|string',
            'email_alerts' => 'nullable|array',
        ]);

        $team = Team::findOrFail($data['team_id']);
        $this->authorize('view', $team);
        if (!BillingHelper::canCreateApps($team)) {
            throw new UpgradeRequiredException('Limit reached. Upgrade required.');
        }

        $app = App::create([
            'team_id' => $data['team_id'],
            'name'    => $data['name'],
        ]);

        if (!empty($data['email_alerts'])) {
            $app->emailAlerts()->attach($data['email_alerts']);
        }

        return new AppResource($app);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $app = App::with('emailAlerts')->findOrFail($id);
        $this->authorize('view', $app);

        return new AppResource($app);
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
        $app = App::findOrFail($id);
        $this->authorize('update', $app);

        $data = $this->validate($request, [
            'name'         => 'nullable|string',
            'email_alerts' => 'nullable|array',
        ]);

        if (!empty($data['name'])) {
            $app->update(['name' => $data['name']]);
        }

        if (isset($data['email_alerts'])) {
            $app->emailAlerts()->sync($data['email_alerts']);
        }

        return new AppResource($app);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $app = App::findOrFail($id);
        $this->authorize('delete', $app);

        $app->scheduleMonitors->each->events()->delete();
        $app->scheduleMonitors()->delete();
        $app->emailAlerts()->detach();
        $app->delete();

        return new AppResource($app);
    }
}
