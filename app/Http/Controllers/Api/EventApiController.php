<?php

namespace Map\Http\Controllers\Api;


use Illuminate\Http\Request;
use Map\Http\Controllers\Api\ApiBaseController as ApiBaseController;
use Map\Event;
use Validator;


class EventApiController  extends ApiBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return $this->sendResponse($events->toArray(), 'Events retrieved successfully.');
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
            'category' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'point_id' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $event = Event::create($input);


        return $this->sendResponse($event->toArray(), 'Event created.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);


        if (is_null($event)) {
            return $this->sendError('Event not found.');
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
        public function indexUser($id)
        {
            $events = User_event::find($id);
            return $this->sendResponse($events->toArray(), 'Events of user retrieved successfully.');
        }

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
          'category' => 'required',
          'start_date' => 'required',
          'end_date' => 'required',
          'point_id' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $event = Event::find($id);
        if (is_null($event)) {
            return $this->sendError('Event not found.');
        }


        $event->category = $input['category'];
        $event->start_date = $input['start_date'];
        $event->end_date = $input['end_date'];
        $event->point_id = $input['point_id'];
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
        $event = Event::find($id);


        if (is_null($event)) {
            return $this->sendError('Event not found.');
        }


        $event->delete();


        return $this->sendResponse($id, 'Tag deleted successfully.');
    }
}
