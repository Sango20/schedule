<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Routine_Schedule;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    public function index(Schedule $schedules)
    {
        return view('schedules/index');
    }

    public function calendar()
    {
        return view('schedules/calendar');
    }
    
    public function make()
    {
        return view('schedules/make');
    }
    
    public function configuration(Routine_Schedule $routine_schedule)
    {
        return view('schedules/configuration')->with(['routine_schedules' => $routine_schedule::orderBy('created_at','desc')->get()]);
    }

    public function store(Request $request)
    {
        $titles = (array)$request->title;
        $start_times = (array)$request->start_times;
        $times = (array)$request->times;
        $contents = (array)$request->contents;
        foreach ($titles as $title)
        {
            $input = new Routine_Schedule;
            $input -> user_id = 0;
            $input -> date = now();
            $input -> title = $title;
            foreach($start_times as $start_time)
            {
                $input -> start_time = $start_time;
                foreach($times as $time)
                {
                    $input -> time = $time;
                    foreach($contents as $content)
                    {
                        $input -> contents = $content;
                    }
                }
            }
            $input -> save();
        }
        return redirect('home');
    }

    public function graph(Request $request, Schedule $schedule, Routine_Schedule $routine_schedule)
    {
        $titles = (array)$request->title;
        $times = (array)$request->times;
        $contents = (array)$request->contents;
        foreach ($titles as $title)
        {
            $input = new Schedule;
            $input -> user_id = 0;
            $input -> date = now();
            $input -> title = $title;
            foreach($times as $time)
            {
                $input -> time = $time;
                foreach($contents as $content)
                {
                    $input -> contents = $content;
                }
            }
        }
            $input -> save();
        return view('schedules/chartjs')->with(['routine_schedules' => $routine_schedule->get(),'schedules' =>$schedule->get()]);
    }
}