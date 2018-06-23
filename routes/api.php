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



Route::get('myEvents/{event_id}', 'Api\EventApiController@indexUser');
Route::get('activeEvents/{user_id}', 'Api\EventApiController@aviableEvents');
Route::get('getName/{user_id}', 'Api\MessageApiController@getName');

Route::post('login', 'Api\PassportController@login');
Route::post('register', 'Api\PassportController@register');
Route::resource('messages', 'Api\MessageApiController');
Route::get('messagesOfChat/{chat_id}', 'Api\MessageApiController@messageOfChat');

Route::get('nameOfEvent/{user_id}','Api\ChatApiController@nameOfEvent');
Route::get('activeChat/{user_id}','Api\ChatApiController@activeChat');

Route::get('userName/{user_id}','Api\MessageApiController@userName');

Route::group(['middleware' => 'auth:api'], function(){

  Route::post('get-details', 'Api\PassportController@getDetails');
  //Route::get('points', 'PointController@index');
  Route::resource('chats', 'Api\ChatApiController');
  Route::resource('points', 'Api\PointApiController');
  Route::resource('user_events', 'Api\User_EventApiController');
  Route::get('user_events_find/{id}/{user_id}','Api\User_EventApiController@findParecipationsOfUser');

  Route::resource('events', 'Api\EventApiController');

});
