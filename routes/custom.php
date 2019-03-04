<?php

/*
|--------------------------------------------------------------------------
| Custom Routes
|--------------------------------------------------------------------------
|
| Here is where you can register custom routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains no middleware.
|
*/

Route::get('/ping/{identifier}/start', 'PingController@start');
Route::get('/ping/{identifier}/finish', 'PingController@finish');
