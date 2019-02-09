<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\ScheduleMonitor::class, function (Faker $faker) {
    return [
        'app_id'       => 1,
        'name'         => 'Example Monitor',
        'command'      => 'echo "Hello World!"',
        'status'       => 'passing',
        'schedule'     => '* * * * *',
        'timezone'     => 'UTC',
        'grace_period' => 3,
        'last_run_at'  => null,
    ];
});
