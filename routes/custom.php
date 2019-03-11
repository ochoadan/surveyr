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

Route::get('/ping/{appId}/{monitorId}/start', 'PingController@start');
Route::post('/ping/{appId}/{monitorId}/start', 'PingController@start');
Route::get('/ping/{appId}/{monitorId}/finish', 'PingController@finish');
Route::post('/ping/{appId}/{monitorId}/finish', 'PingController@finish');
