<?php

namespace Map\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Charts;

use Map\User;
use Map\Event;
use Map\User_event;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chart = Charts::database(User::all(), 'pie', 'highcharts')
                        ->title('Mappin Charts')
                        ->responsive(false)
                        ->width(0)
                        ->lastByMonth();
        $id = Auth::user()->id;
        $chartE = Charts::database(User_event::all(), 'line', 'highcharts')
                        ->title('Mappin Charts')
                        ->responsive(false)
                        ->width(0)
                        ->lastByMonth();

        return view('home', ['chart' => $chart, 'chartE' => $chartE]);
    }
}
