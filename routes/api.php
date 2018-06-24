<?php

use Illuminate\Http\Request;
use Map\Event;
use Map\User;
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

//Route::get('events', 'EventController@index');
//Route::get('events/{event}', 'EventController@show');

Route::resource('events', 'Api\EventApiController')->middleware('auth:api');

Route::get('points/{point}', 'PointController@show');
Route::get('points', 'PointController@index');
Route::get('myevents/{user_id}', 'Api\EventApiController@indexUser');




  //REGISTER AND LOG
Route::post('login', 'Api\PassportController@login');
Route::post('register', 'Api\PassportController@register');

Route::group(['middleware' => 'auth:api'], function(){
	Route::post('get-details', 'Api\PassportController@getDetails');
});

 //RealTime Charts
/*Route::get('/data', function() {
    return['value' =>rand (0, 100)];
})->name('data');*/
