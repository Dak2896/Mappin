<?php

namespace Map\Http\Controllers;

use Illuminate\Http\Request;
use Map\Event;
use Validator;
use Map\Http\Controllers\ApiBaseController;
class EventController extends Controller
{
  public function index()
  {
      return Event::all();
  }
  public function show(Event $event){
      return $event;
  }

  /*public function store($name,  $number, $description){
      $article = new Article;
      $article->name = $name;
      $article->description = $description;
      $article->number = $number;
      $article->save();
  }*/

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

}
