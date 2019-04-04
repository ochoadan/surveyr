<?php

namespace App\Policies;

use App\Alert\SlackAlert;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SlackAlertPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the email alert.
     *
     * @param  \App\User  $user
     * @param  \App\Alert\SlackAlert  $slackAlert
     * @return mixed
     */
    public function view(User $user, SlackAlert $slackAlert)
    {
        return $user->onTeam($slackAlert->team);
    }

    /**
     * Determine whether the user can create email alerts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the email alert.
     *
     * @param  \App\User  $user
     * @param  \App\Alert\SlackAlert  $slackAlert
     * @return mixed
     */
    public function update(User $user, SlackAlert $slackAlert)
    {
        return $this->view($user, $slackAlert);
    }

    /**
     * Determine whether the user can delete the email alert.
     *
     * @param  \App\User  $user
     * @param  \App\Alert\SlackAlert  $slackAlert
     * @return mixed
     */
    public function delete(User $user, SlackAlert $slackAlert)
    {
        return $this->view($user, $slackAlert);
    }
}
