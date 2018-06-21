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
        return $this->sendResponse($events->toArray(), 'Partecipations retrieved successfully.');
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
          //$exists = User_Event::where('user_id', $input->user_idfirst();

          /*if(!exists){
            return $this->sendError('Validation Error. already partecipate', $validator->errors());
          }*/

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
            return $this->sendError('Partecipation not found.');
        }


        return $this->sendResponse($event->toArray(), 'Partecipation retrieved successfully.');
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
            return $this->sendError('Validation Error, some data could miss', $validator->errors());
        }


        $partectipation = User_Event::find($id);
        if (is_null($partectipation)) {
            return $this->sendError('Partecipation not found.');
        }


        $partectipation->number_vote = $input['number_vote'];
        $partectipation->text_vote = $input['text_vote'];
        $partectipation->event_id = $input['event_id'];
        $partectipation->user_id = $input['user_id'];
        $partectipation->is_creator = $input['is_creator'];
        $partectipation->save();


        return $this->sendResponse($partectipation->toArray(), 'Partecipation updated successfully.');
    }

    // HANDLE IF USER ALREADY PARTECIPATE, IF EMPTY HE DOESN'T IF RESPONSE IS SUCCESS HE PARTECIPATE
    public function findParecipationsOfUser($event_id, $user_id)
    {
      $partectipations = User_Event::where([
        'event_id'=> $event_id,
        'user_id'=>$user_id
      ]);



      if (is_null($partectipations)) {
          return $this->sendError('Partecipation not found.');
      }


      return $this->sendResponse($partectipations->get()->toArray(), 'Partecipations retrive successfully.');
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
            return $this->sendError('Partecipation not found.');
        }


        $event->delete();


        return $this->sendResponse($id, 'Tag deleted successfully.');
    }

}
