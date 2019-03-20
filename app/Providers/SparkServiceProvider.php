<?php

namespace App\Providers;

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
        'vendor'   => 'Dev7studios Ltd',
        'product'  => 'Surveyr',
        'street'   => '4 Duffus Place',
        'location' => 'Elgin, UK, IV30 5PB',
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
        'gilbert@pellegrom.me',
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

        Spark::useStripe();

        $plans = config('billing.plans');
        foreach ($plans as $plan) {
            if ($plan['id'] == 'free') {
                continue;
            }

            $sparkPlan = Spark::teamPlan($plan['title'], $plan['id'])
                ->price($plan['price'])
                ->trialDays($plan['trial'])
                ->features([
                    $plan['schedule_monitor_limit'] . ' Schedule Monitors',
                ]);

            if ($plan['interval'] == 'yearly') {
                $sparkPlan->yearly();
            }
            if ($plan['archived']) {
                $sparkPlan->archived();
            }
        }
    }
}
