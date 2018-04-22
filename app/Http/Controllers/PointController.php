<?php

namespace Map\Http\Controllers;
use Map\Point;
use Illuminate\Http\Request;

class PointController extends Controller
{
  public function index()
  {
      return Point::all();
  }
  public function show(Point $point){
      return $point;
  }
}
