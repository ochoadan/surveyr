<?php

namespace App\Http\Controllers\Api;

use App\Alert\EmailAlert;
use App\App;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmailAlertResource;
use App\Team;
use Illuminate\Http\Request;

class EmailAlertController extends Controller
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

            return EmailAlertResource::collection($app->emailAlerts()->paginate($request->input('perPage', 10)));
        }

        $query = $team->emailAlerts();

        if ($request->has('with_apps')) {
            $query->with('apps');
        }

        return EmailAlertResource::collection($query->paginate($request->input('perPage', 10)));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', EmailAlert::class);

        $data = $this->validate($request, [
            'team_id' => 'required|integer',
            'email'   => 'required|email',
        ]);

        $team = Team::findOrFail($data['team_id']);
        $this->authorize('view', $team);

        $emailAlert = EmailAlert::create($data);

        return new EmailAlertResource($emailAlert);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emailAlert = EmailAlert::findOrFail($id);
        $this->authorize('view', $emailAlert);

        return new EmailAlertResource($emailAlert);
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
        $emailAlert = EmailAlert::findOrFail($id);
        $this->authorize('update', $emailAlert);

        $data = $this->validate($request, [
            'email' => 'required|email',
        ]);

        $emailAlert->update($data);

        return new EmailAlertResource($emailAlert);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emailAlert = EmailAlert::findOrFail($id);
        $this->authorize('delete', $emailAlert);

        $emailAlert->apps()->detach();
        $emailAlert->delete();

        return new EmailAlertResource($emailAlert);
    }
}
