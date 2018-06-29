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
Route::get('messagesOfChat/{chat_id}', 'Api\MessageApiController@messageOfChat');

Route::post('seeImage','Api\ImageApiController@seeImage');
Route::post('uploadMyImage','Api\ImageApiController@uploadMyImage');
Route::post('downloadImage','Api\ImageApiController@downloadImage');
Route::get('categories', 'Api\PointApiController@getCategories');
Route::get('userName/{user_id}','Api\MessageApiController@userName');
Route::post('updateUserData', 'Api\UserApiController@updateUserData');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('events', 'EventController@index');
//Route::get('events/{event}', 'EventController@show');
Route::resource('events', 'Api\EventApiController')->middleware('auth:api');

Route::get('nameOfEvent/{user_id}','Api\ChatApiController@nameOfEvent');
Route::get('activeChat/{user_id}','Api\ChatApiController@activeChat');

Route::post('register', 'Api\PassportController@register');
Route::post('login', 'Api\PassportController@login');


Route::group(['middleware' => 'auth:api'], function(){

  Route::resource('points', 'Api\PointApiController');
  Route::get('activePoints', 'Api\PointApiController@getActivePoints');
  Route::get('points/{point}', 'PointController@show');

  Route::resource('events', 'Api\EventApiController');
  Route::get('activeEvents/{user_id}', 'Api\EventApiController@aviableEvents');
  Route::post('setActiveEvents', 'Api\EventApiController@setActiveEvents');
  Route::get('myEvents/{event_id}', 'Api\EventApiController@indexUser');

  Route::get('getName/{user_id}', 'Api\MessageApiController@getName');
  Route::resource('messages', 'Api\MessageApiController');



  Route::resource('chats', 'Api\ChatApiController');


  Route::post('get-details', 'Api\PassportController@getDetails');


  Route::resource('user_events', 'Api\User_EventApiController');
  Route::get('user_events_find/{id}/{user_id}','Api\User_EventApiController@findParecipationsOfUser');

});

 //RealTime Charts
/*Route::get('/data', function() {
    return['value' =>rand (0, 100)];
})->name('data');*/
