<?php

namespace App\Http\Controllers\Auth;

use App\Alert\SlackAlert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SlackController extends Controller
{
    public function createSlackAlert(Request $request)
    {
        $team = $request->user()->currentTeam;

        $provider = new \AdamPaterson\OAuth2\Client\Provider\Slack([
            'clientId'     => config('services.slack.client_id'),
            'clientSecret' => config('services.slack.client_secret'),
            'redirectUri'  => url('/alert/slack'),
        ]);

        if (!$request->has('code')) {
            $authUrl = $provider->getAuthorizationUrl([
                'scope' => 'incoming-webhook',
            ]);

            $request->session()->put('slackOauth2state', $provider->getState());

            return redirect($authUrl);
        } elseif (!$request->has('state') || $request->input('state') !== $request->session()->get('slackOauth2state')) {
            $request->session()->forget('slackOauth2state');
            abort('Invalid state');
        } else {
            $token = $provider->getAccessToken('authorization_code', [
                'code' => $request->input('code'),
            ]);

            $values = $token->getValues();

            $exists = SlackAlert::where('team_id', $team->id)
                                ->where('slack_team', $values['team_name'])
                                ->where('slack_channel', $values['incoming_webhook']['channel'])
                                ->exists();

            if (!$exists) {
                SlackAlert::create([
                    'team_id'          => $team->id,
                    'incoming_webhook' => $values['incoming_webhook']['url'],
                    'slack_team'       => $values['team_name'],
                    'slack_channel'    => $values['incoming_webhook']['channel'],
                ]);
            }
        }

        return redirect('/alerts');
    }
}
