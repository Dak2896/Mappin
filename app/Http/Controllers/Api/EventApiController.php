<?php

namespace Map\Http\Controllers\Api;


use Illuminate\Http\Request;
use Map\Http\Controllers\Api\ApiBaseController as ApiBaseController;
use Map\Event;
use Validator;
use Map\User_Event;
use Carbon\Carbon;


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
            'point_id' => 'required',
            'description' => 'required'
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


    //ACTIVE EVENTS
    public function aviableEvents($user_id)
    {

      $events = User_Event::where('user_id', $user_id)->pluck('event_id');


     $aviable_events_before  = User_Event::whereNotIn('event_id', $events)->pluck('event_id');
     $aviable_events_after = Event::where('is_active', 1)->find($aviable_events_before);


      if (is_null($aviable_events_after)) {
          return $this->sendError('Event not found.');
      }
      return $this->sendResponse($aviable_events_after, 'Events retrieved successfully.');
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

    //EVENTS  WICH USER PARTECIPATE ALREADY (created or only partecipation)
    public function indexUser($id)
    {

      $events = User_Event::where('user_id', $id)->pluck('event_id');
      $event = Event::where('is_active', '1')->find($events);

      return $this->sendResponse($event->toArray(), 'Events of user retrieved succesfully');  
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
          'point_id' => 'required',
          'description' => 'required'
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
        $event->description = $input['description'];
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


    public function setActiveEvents()
    {
      $events = Event::all()->pluck('end_date');
      $now = Carbon::now();
      if (is_null($events)) {
          return $this->sendError('Events not set.');
      }
      foreach ($events as $eve)
      {
        $datework = new Carbon($eve);
        $diff = $now->diffInMinutes($datework, false);
        if($diff <= 0)
        {
          $event = Event::where('end_date', $eve)->update(['is_active'=> 0]);
        }
        if($diff > 1)
        {
          $event = Event::where('end_date', $eve)->update(['is_active'=> 1]);
        }
      }
      return $this->sendResponse([], 'Events set');
  }

}
