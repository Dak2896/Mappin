<?php

namespace Map\Http\Controllers\Api;


use Illuminate\Http\Request;
use Map\Http\Controllers\Api\ApiBaseController as ApiBaseController;
use Validator;
use Map\User_Event;


class User_EventApiController  extends ApiBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = User_Event::all();
        return $this->sendResponse($events->toArray(), 'User_Events retrieved successfully.');
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
            'number_vote' => 'required',
            'text_vote' => 'required',
            'event_id' => 'required',
            'user_id' => 'required',
            'is_creator' => 'required',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        if (User_Event::where('user_id', '=', Input::get('user_id'))->first() && User_Event::where('event_id', '=', Input::get('event_id'))->first() ) {
              return $this->sendError('Validation Error, you already partecipate this event.', $validator->errors());
          }


        $event = User_Event::create($input);


        return $this->sendResponse($event->toArray(), 'User_Event created.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = User_Event::find($id);


        if (is_null($event)) {
            return $this->sendError('User_Event not found.');
        }


        return $this->sendResponse($event->toArray(), 'Event retrieved successfully.');
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
          'number_vote' => 'required',
          'text_vote' => 'required',
          'event_id' => 'required',
          'user_id' => 'required',
          'is_creator' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $event = User_Event::find($id);
        if (is_null($event)) {
            return $this->sendError('Event not found.');
        }


        $event->number_vote = $input['number_vote'];
        $event->text_vote = $input['text_vote'];
        $event->event_id = $input['event_id'];
        $event->user_id = $input['user_id'];
        $event->is_creator = $input['is_creator'];
        $event->save();


        return $this->sendResponse($event->toArray(), 'Event updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = User_Event::find($id);


        if (is_null($event)) {
            return $this->sendError('Event not found.');
        }


        $event->delete();


        return $this->sendResponse($id, 'Tag deleted successfully.');
    }

}
