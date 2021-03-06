<?php

namespace Map\Http\Controllers\Api;


use Illuminate\Http\Request;
use Map\Http\Controllers\Api\ApiBaseController as ApiBaseController;
use Map\Chat;
use Map\Event;
use Map\User_Event;
use Validator;



class ChatApiController  extends ApiBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Chat::all();
        return $this->sendResponse($events->toArray(), 'Chats retrieved successfully.');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'event_id' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $event = Chat::create($input);


        return $this->sendResponse($event->toArray(), 'Chat created.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Chat::find($id);


        if (is_null($event)) {
            return $this->sendError('Chat not found.');
        }


        return $this->sendResponse($event->toArray(), 'Chat retrieved successfully.');
    }



    /** Get event of logged user
    *
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    *
    *
    *
    */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
          'event_id' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $event = Chat::find($id);
        if (is_null($chat)) {
            return $this->sendError('Chat not found.');
        }
        $chat->event_id = $input['event_id'];
        $chat->save();


        return $this->sendResponse($event->toArray(), 'Chat updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Chat::find($id);


        if (is_null($chat)) {
            return $this->sendError('Chat not found.');
        }


        $chat->delete();


        return $this->sendResponse($id, 'Tag deleted successfully.');
    }
  //CHAT OF EVENTS IN WICH USER PARTECIPATE

    public function activeChat($id)
    {
      $events = User_Event::where('user_id', $id)->pluck('event_id');
      $event = Event::where('is_active', '1')->find($events)->pluck('id');
      $chats = Chat::whereIn('event_id', $event)->pluck('id');

      return $this->sendResponse($chats->toArray(), 'Events of user retrieved succesfully');
    }


    //TAKE EVENT NAME FOR ACTIVE CHAT
    public function nameOfEvent($id)
    {
      $events = User_Event::where('user_id', $id)->pluck('event_id');
      $event = Event::where('is_active', '1')->find($events)->pluck('description');
    //  $chats = Chat::whereIn('event_id', $event)->get();
      //$event_id_of_chat = $chats->pluck('event_id');
      //$event_name = Event::find($event_id_of_chat)->pluck('description');
      return $this->sendResponse($event->toArray(), 'Events of user retrieved succesfully');
    }
  }

