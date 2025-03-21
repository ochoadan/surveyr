<?php

namespace App\Providers;

use Laravel\Spark\Exceptions\IneligibleForPlan;
use Laravel\Spark\Providers\AppServiceProvider as ServiceProvider;
use Laravel\Spark\Spark;

class SparkServiceProvider extends ServiceProvider
{
    /**
     * Your application and company details.
     *
     * @var array
     */
    protected $details = [
        'vendor'   => 'HalfNine LLC',
        'product'  => 'Surveyr',
        'street'   => '',
        'location' => 'St. Cloud, FL, 34772',
        'phone'    => '',
    ];

    /**
     * The address where customer support e-mails should be sent.
     *
     * @var string
     */
    protected $sendSupportEmailsTo = 'support@surveyr.io';

    /**
     * All of the application developer e-mail addresses.
     *
     * @var array
     */
    protected $developers = [
        'dan@halfnine.com',
    ];

    /**
     * Indicates if the application will expose an API.
     *
     * @var bool
     */
    protected $usesApi = true;

    /**
     * Finish configuring Spark for the application.
     *
     * @return void
     */
    public function booted()
    {
        Spark::collectBillingAddress();

        Spark::noCardUpFront()->teamTrialDays(10);

        $plans = config('billing.plans');
        foreach ($plans as $plan) {
            if ($plan['id'] == 'free') {
                continue;
            }

            $sparkPlan = Spark::teamPlan($plan['title'], $plan['id'])
                ->price($plan['price'])
                ->features([
                    $plan['schedule_monitor_limit'] . ' Schedule Monitors',
                    '30 day event log',
                    'Unlimited apps',
                    ($plan['team_member_limit'] ?: 'Unlimited') . ' team members',
                    'Email support',
                ]);

            if ($plan['team_member_limit']) {
                $sparkPlan->maxTeamMembers($plan['team_member_limit']);
            }

            if ($plan['interval'] == 'yearly') {
                $sparkPlan->yearly();
            }
            if ($plan['archived']) {
                $sparkPlan->archived();
            }
        }

        Spark::checkTeamPlanEligibilityUsing(function ($team, $plan) {
            $planData = config("billing.plans.{$plan->id}");
            if (!$planData) {
                return false;
            }

            if ($team->scheduleMonitors()->count() > $planData['schedule_monitor_limit']) {
                throw IneligibleForPlan::because("You cannot switch to the {$plan->name} plan as you have too many schedule monitors.");
            }

            return true;
        });
    }
}
