<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function toSubscription(Request $request)
    {
        $team = $request->user()->currentTeam;

        return redirect("/settings/teams/{$team->id}#/subscription");
    }
}
