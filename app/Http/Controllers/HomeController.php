<?php

namespace Map\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Charts;

use Map\User;
use Map\Event;
use Map\User_event;
use Map\Chat;
use Map\Message;
use Map\Photo;

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
        $chart = Charts::database(User_event::all(), 'bar', 'highcharts')
                       ->title('Partecipazioni')
                       ->responsive(false)
                       ->width(0)
                       ->elementLabel('Partecipazioni eventi')
                       ->yaxistitle('numero partecipanti')
                       ->groupBy('user_id')
                       ->labels($names);

        $chartE = Charts::database(Photo::all(), 'line', 'highcharts')
                        ->title('Foto')
                        ->responsive(false)
                        ->width(0)
                        ->groupByMonth();
        $chartF = Charts::database(Chat::all(), 'bar', 'highcharts')
                        ->title('Chat')
                        ->responsive(false)
                        ->width(0)
                        ->groupByMonth();
        $chartG = Charts::database(Message::all(), 'donut', 'highcharts')
                        ->title('Messaggi')
                        ->responsive(false)
                        ->width(0)
                        ->groupByMonth();
        $chartAd = Charts::database(User::all(), 'line', 'highcharts')
                        ->title('Registrazione utenti')
                        ->responsive(false)
                        ->width(0)
                        ->groupByMonth();
        $chartAd2 = Charts::database(User_event::all(), 'bar', 'highcharts')
                        ->title('Eventi utenti')
                        ->responsive(false)
                        ->width(0)
                        ->groupByMonth();
        $chartAd3 = Charts::database(Event::all(), 'donut', 'highcharts')
                        ->title('Eventi')
                        ->responsive(false)
                        ->width(0)
                        ->groupByMonth();
        $chartAd4 = Charts::database(Chat::all(), 'pie', 'highcharts')
                        ->title('Chat utenti')
                        ->responsive(false)
                        ->width(0)
                        ->groupByMonth();
        $chartAd5 = Charts::database(Message::all(), 'line', 'highcharts')
                        ->title('Messaggi utenti')
                        ->responsive(false)
                        ->width(0)
                        ->groupByMonth();
        $chartAd6 = Charts::database(Photo::all(), 'donut', 'highcharts')
                        ->title('Foto utenti')
                        ->responsive(false)
                        ->width(0)
                        ->groupByMonth();


        if($admin == 1)
        {
            return view('homeAdmin', compact('chartAd', 'chartAd2', 'chartAd3', 'chartAd4', 'chartAd5', 'chartAd6'));
        }
        else
        {
            return view('home', compact('chart', 'chartE', 'chartF', 'chartG'));
        }
    }
}
