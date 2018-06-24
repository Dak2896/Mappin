<?php

namespace Map\Console\Commands;

use Illuminate\Console\Command;
use Map\Event;
use Carbon\Carbon;

class setEvents extends Command
{

      protected $name = 'set:Events';

      $events = Event::all()->pluck('end_date');
      $now = Carbon::now();
      if (is_null($events)) {
          //return $this->sendError('Events not set.');
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


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
    }
}
