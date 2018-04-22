<?php

use Illuminate\Http\Request;
use Map\Event;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('events', 'EventController@index');
Route::get('events/{event}', 'EventController@show');
Route::resource('events', 'Api\EventApiController');

Route::get('points/{point}', 'PointController@show');
Route::get('points', 'PointController@index');