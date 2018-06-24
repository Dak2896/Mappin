<?php

namespace Map\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Map\Event;
use Carbon\Carbon;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
       \App\Console\Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
      $schedule->call(function () {
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
      })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
