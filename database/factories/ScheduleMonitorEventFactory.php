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

$factory->define(App\ScheduleMonitorEvent::class, function (Faker $faker) {
    return [
        'schedule_monitor_id' => 1,
        'started_at'          => null,
        'finished_at'         => null,
        'duration'            => 0,
        'success'             => null,
        'output'              => null,
    ];
});
