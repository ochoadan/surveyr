<?php

namespace App\Policies;

use App\User;
use App\Alert\EmailAlert;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmailAlertPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the email alert.
     *
     * @param  \App\User  $user
     * @param  \App\Alert\EmailAlert  $emailAlert
     * @return mixed
     */
    public function view(User $user, EmailAlert $emailAlert)
    {
        return $user->onTeam($emailAlert->team);
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
     * @param  \App\Alert\EmailAlert  $emailAlert
     * @return mixed
     */
    public function update(User $user, EmailAlert $emailAlert)
    {
        $this->view($user, $emailAlert);
    }

    /**
     * Determine whether the user can delete the email alert.
     *
     * @param  \App\User  $user
     * @param  \App\Alert\EmailAlert  $emailAlert
     * @return mixed
     */
    public function delete(User $user, EmailAlert $emailAlert)
    {
        $this->view($user, $emailAlert);
    }
}
