<?php

namespace App\Http\Controllers\Api;

use App\Alert\SlackAlert;
use App\App;
use App\Http\Controllers\Controller;
use App\Http\Resources\SlackAlertResource;
use App\Team;
use Illuminate\Http\Request;

class SlackAlertController extends Controller
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
            'app_id'  => 'nullable|integer',
        ]);

        $team = Team::findOrFail($data['team_id']);
        $this->authorize('view', $team);

        if (!empty($data['app_id'])) {
            $app = App::findOrFail($data['app_id']);
            $this->authorize('view', $app);

            return SlackAlertResource::collection($app->slackAlerts()->paginate($request->input('perPage', 10)));
        }

        $query = $team->slackAlerts();

        if ($request->has('with_apps')) {
            $query->with('apps');
        }

        return SlackAlertResource::collection($query->paginate($request->input('perPage', 10)));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect('/alert/slack');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slackAlert = SlackAlert::findOrFail($id);
        $this->authorize('view', $slackAlert);

        return new SlackAlertResource($slackAlert);
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
        return response()->json([], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slackAlert = SlackAlert::findOrFail($id);
        $this->authorize('delete', $slackAlert);

        $slackAlert->apps()->detach();
        $slackAlert->delete();

        return new SlackAlertResource($slackAlert);
    }
}
