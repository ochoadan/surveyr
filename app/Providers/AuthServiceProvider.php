<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \App\Alert\EmailAlert::class      => \App\Policies\EmailAlertPolicy::class,
        \App\App::class                   => \App\Policies\AppPolicy::class,
        \App\ScheduleMonitor::class       => \App\Policies\ScheduleMonitorPolicy::class,
        \App\ScheduleMonitorEvent::class  => \App\Policies\ScheduleMonitorEventPolicy::class,
        \App\Team::class                  => \App\Policies\TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
