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

//Route::get('events', 'EventController@index');
//Route::get('events/{event}', 'EventController@show');



Route::get('points/{point}', 'PointController@show');






Route::post('login', 'Api\PassportController@login');
Route::post('register', 'Api\PassportController@register');



Route::group(['middleware' => 'auth:api'], function(){

  Route::post('get-details', 'Api\PassportController@getDetails');
  //Route::get('points', 'PointController@index');
  Route::resource('chats', 'Api\ChatApiController');
  Route::resource('points', 'Api\PointApiController');
  Route::resource('user_events', 'Api\User_EventApiController');
  Route::get('myevents/{id}', 'Api\EventApiController@indexUser');
  Route::resource('events', 'Api\EventApiController');
  
});
