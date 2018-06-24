<?php

namespace Map\Http\Controllers\Api;


use Illuminate\Http\Request;
use Map\Http\Controllers\Api\ApiBaseController as ApiBaseController;
use Map\Message;
use Validator;
use Map\User;


class MessageApiController  extends ApiBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Message::all();
        return $this->sendResponse($events->toArray(), 'Messages retrieved successfully.');
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
            'chat_id' => 'required',
            'user_id'=> 'required',
            'message_text' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $message = Message::create($input);


        return $this->sendResponse($message->toArray(), 'Message created.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Chat::find($id);


        if (is_null($message)) {
            return $this->sendError('Message not found.');
        }


        return $this->sendResponse($message->toArray(), 'Message retrieved successfully.');
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
          'chat_id' => 'required',
          'user_id'=> 'required',
          'message_text' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $message = Message::find($id);

        if (is_null($message)) {
            return $this->sendError('Message not found.');
        }

        $message->chat_id = $input['chat_id'];
        $message->user_id = $input['user_id'];
        $message->message_text = $input['message_text'];
        $message->save();


        return $this->sendResponse($message->toArray(), 'Message updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Message::find($id);


        if (is_null($message)) {
            return $this->sendError('Chat not found.');
        }


        $message->delete();


        return $this->sendResponse($id, 'Tag deleted successfully.');
    }

  //MESSAGES OF CHAT
    public function messageOfChat($chat_id)
    {
      $messages = Message::where('chat_id', $chat_id)->pluck('message_text');

      if (is_null($messages)) {
          return $this->sendError('Messages  not found.');
      }

      return $this->sendResponse($messages->toArray(), 'Messages retrive successfully.');
  }


  //NAME OF USER THAT SEND MESSAGE
  public function userName($chat_id)
  {

      $messages = Message::where('chat_id', $chat_id)->pluck('user_id');
      $names_of = User::find($messages)->pluck('name');
      $names = User::where('name',$names_of )->get();

    if (is_null($names)) {
        return $this->sendError('Username  of message not found.');
    }

    return $this->sendResponse($names_of->toArray(), 'Username of message retrive successfully.');
  }



}
