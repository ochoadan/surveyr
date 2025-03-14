<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register the API routes for your application as
| the routes are automatically authenticated using the API guard and
| loaded automatically by this application's RouteServiceProvider.
|
*/

Route::group([
    'namespace' => 'Api',
    'middleware' => ['auth:api', 'teamSubscribed']
], function () {
    Route::apiResource('apps', 'AppController');
    Route::apiResource('schedule-monitors', 'ScheduleMonitorController');
    Route::apiResource('schedule-monitor-events', 'ScheduleMonitorEventController');
    Route::apiResource('email-alerts', 'EmailAlertController');
    Route::apiResource('slack-alerts', 'SlackAlertController');
});
