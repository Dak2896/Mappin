<?php

namespace Map\Http\Controllers\Api;


use Illuminate\Http\Request;
use Map\Http\Controllers\Api\ApiBaseController as ApiBaseController;
use Validator;
use Map\Point;


class PointApiController  extends ApiBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $points = Point::all();
        return $this->sendResponse($points->toArray(), 'Points retrieved successfully.');
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
            'event_id' => 'required',
            'lat' => 'required',
            'long' => 'required',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $point = Point::create($input);


        return $this->sendResponse($point->toArray(), 'Point created.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $point = Point::find($id);


        if (is_null($point)) {
            return $this->sendError('Point not found.');
        }


        return $this->sendResponse($point->toArray(), 'Point retrieved successfully.');
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
          'event_id' => 'required',
          'lat' => 'required',
          'long' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }


        $point = Point::find($id);
        if (is_null($point)) {
            return $this->sendError('Event not found.');
        }



        $point->event_id = $input['event_id'];
        $point->latt = $input['lat'];
        $point->long = $input['long'];
        $point->save();


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
        $event = Point::find($id);


        if (is_null($event)) {
            return $this->sendError('Event not found.');
        }


        $event->delete();


        return $this->sendResponse($id, 'Tag deleted successfully.');
    }

}
