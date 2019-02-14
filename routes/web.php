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

Route::get('/', 'WelcomeController@show');

Route::middleware('teamSubscribed')->group(function() {
    Route::get('/home', 'HomeController@show');
    Route::get('/app/{app}', 'AppController@show');
    Route::get('/schedule-monitor/{schedule_monitor}', 'ScheduleMonitorController@show');

    Route::get('/alerts', 'AlertController@show');
});
