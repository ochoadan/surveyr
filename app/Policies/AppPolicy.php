<?php

namespace App\Policies;

use App\User;
use App\App;
use Illuminate\Auth\Access\HandlesAuthorization;

class AppPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the app.
     *
     * @param  \App\User  $user
     * @param  \App\App  $app
     * @return mixed
     */
    public function view(User $user, App $app)
    {
        return $user->onTeam($app->team);
    }

    /**
     * Determine whether the user can create apps.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the app.
     *
     * @param  \App\User  $user
     * @param  \App\App  $app
     * @return mixed
     */
    public function update(User $user, App $app)
    {
        return $this->view($user, $app);
    }

    /**
     * Determine whether the user can delete the app.
     *
     * @param  \App\User  $user
     * @param  \App\App  $app
     * @return mixed
     */
    public function delete(User $user, App $app)
    {
        return $this->view($user, $app);
    }
}
