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

        $id = Auth::user()->id;
        $admin = Auth::user()->admin;
        $names = Event::pluck('description');
        $chart = Charts::database(User::all(), 'bar', 'highcharts')
                        ->title('Sono io')
                        ->responsive(false)
                        ->width(0)
                        ->lastByMonth();

        $chartE = Charts::database(User_event::all(), 'line', 'highcharts')
                        ->title('Partecipazioni')
                        ->responsive(false)
                        ->width(0)
                        ->elementLabel('Partecipazioni evento')
                        ->yaxistitle('numero partecipanti')
                        ->groupBy('user_id')
                        ->labels($names);
        $chartF = Charts::database(User::all(), 'bar', 'highcharts')
                        ->title('Mappin Charts')
                        ->responsive(false)
                        ->width(0)
                        ->groupByMonth();
        $chartG = Charts::database(User::all(), 'donut', 'highcharts')
                        ->title('todos')
                        ->responsive(false)
                        ->width(0)
                        ->groupByMonth();
        $chartAd = Charts::database(User_event::all(), 'bar', 'highcharts')
                        ->title('Partecipazadasdasdioni')
                        ->responsive(false)
                        ->width(0)
                        ->groupByMonth();


        if($admin == 1)
        {
            return view('homeAdmin', compact('chart', 'chartE', 'chartF', 'chartG', 'chartAd'));
        }
        else
        {
            return view('home', compact('chart', 'chartE', 'chartF', 'chartG'));
        }


    }
}
