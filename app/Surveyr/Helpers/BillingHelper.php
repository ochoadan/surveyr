<?php

namespace App\Surveyr\Helpers;

use App\Team;
use Laravel\Spark\Spark;

class BillingHelper
{
    /**
     * @param Team $team
     * @return boolean
     */
    final public static function canCreateApps(Team $team)
    {
        if (auth()->user() && Spark::developer(auth()->user()->email)) {
            return true;
        }

        $plan = $team->sparkPlan();
        if (!$plan) {
            return false;
        }

        $planData = config("billing.plans.{$plan->id}");

        return $team->apps()->count() < $planData['app_limit'];
    }

    /**
     * @param Team $team
     * @return boolean
     */
    final public static function canCreateScheduleMonitors(Team $team)
    {
        if (auth()->user() && Spark::developer(auth()->user()->email)) {
            return true;
        }

        $plan = $team->sparkPlan();
        if (!$plan) {
            return false;
        }

        $planData = config("billing.plans.{$plan->id}");

        return $team->scheduleMonitors()->count() < $planData['schedule_monitor_limit'];
    }
}
