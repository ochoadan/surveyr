<?php

namespace App\Policies;

use App\User;
use App\ScheduleMonitorEvent;
use Illuminate\Auth\Access\HandlesAuthorization;

class ScheduleMonitorEventPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the schedule monitor event.
     *
     * @param  \App\User  $user
     * @param  \App\ScheduleMonitorEvent  $event
     * @return mixed
     */
    public function view(User $user, ScheduleMonitorEvent $event)
    {
        $team = $event->scheduleMonitor->app->team;

        return $user->onTeam($team);
    }

    /**
     * Determine whether the user can create schedule monitor events.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the schedule monitor event.
     *
     * @param  \App\User  $user
     * @param  \App\ScheduleMonitorEvent  $event
     * @return mixed
     */
    public function update(User $user, ScheduleMonitorEvent $event)
    {
        return $this->view($user, $event);
    }

    /**
     * Determine whether the user can delete the schedule monitor event.
     *
     * @param  \App\User  $user
     * @param  \App\ScheduleMonitorEvent  $event
     * @return mixed
     */
    public function delete(User $user, ScheduleMonitorEvent $event)
    {
        return $this->view($user, $event);
    }
}
