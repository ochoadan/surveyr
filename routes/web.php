<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'SiteController@index');
Route::get('/privacy', 'SiteController@privacy');

Route::middleware(['auth'])->group(function() {
    Route::get('/settings/subscription', 'RedirectController@toSubscription');
});

Route::middleware(['auth', 'teamSubscribed'])->group(function() {
    Route::get('/home', 'HomeController@show');
    Route::get('/app/{app}', 'AppController@show');
    Route::get('/schedule-monitor/{schedule_monitor}', 'ScheduleMonitorController@show');

    Route::get('/alerts', 'AlertController@show');

    Route::get('/alert/slack', 'Auth\SlackController@createSlackAlert');
});
