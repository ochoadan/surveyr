<?php

namespace App\Policies;

use App\User;
use App\ScheduleMonitor;
use Illuminate\Auth\Access\HandlesAuthorization;

class ScheduleMonitorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the schedule monitor.
     *
     * @param  \App\User  $user
     * @param  \App\ScheduleMonitor  $scheduleMonitor
     * @return mixed
     */
    public function view(User $user, ScheduleMonitor $scheduleMonitor)
    {
        $team = $scheduleMonitor->app->team;

        return $user->onTeam($team);
    }

    /**
     * Determine whether the user can create schedule monitors.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the schedule monitor.
     *
     * @param  \App\User  $user
     * @param  \App\ScheduleMonitor  $scheduleMonitor
     * @return mixed
     */
    public function update(User $user, ScheduleMonitor $scheduleMonitor)
    {
        return $this->view($user, $scheduleMonitor);
    }

    /**
     * Determine whether the user can delete the schedule monitor.
     *
     * @param  \App\User  $user
     * @param  \App\ScheduleMonitor  $scheduleMonitor
     * @return mixed
     */
    public function delete(User $user, ScheduleMonitor $scheduleMonitor)
    {
        return $this->view($user, $scheduleMonitor);
    }
}
