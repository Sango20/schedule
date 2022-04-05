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
    
    public function make($date)
    {
        $data = ['date' => $date];
        return view('schedules/make',$data);
    }
    
    public function configuration(Routine_Schedule $routine_schedule)
    {
        $number = auth()->user()->id;
        return view('schedules/configuration')->with(['routine_schedules' => $routine_schedule->where([["user_id",'=', $number]])->get()]);
    }

    public function store(Request $request,Routine_Schedule $routine_schedule)
    {
        $number = auth()->user()->id;
        $items = \App\Routine_Schedule::select('id')->where([["user_id",'=', $number]])->get();
        $number5=count($items);
        $value = 0;
        $titles = (array)$request->title;
        $start_times = (array)$request->start_times;
        $times = (array)$request->times;
        $contents = (array)$request->contents;
        foreach ($titles as $title)
        {
             $number1 = 0;
             $number2 = 0;
             $number3 = 0;
            $input = new Routine_Schedule;
            $input -> user_id = auth()->user()->id;
            $input->date = now();
            $input -> title = $title;
            foreach($start_times as $start_time)
            { 
               if ($number1==$value)
               { 
                $input -> start_time = $start_time;
                break;
               }
               else
               {
                   $number1++;
               }
            }
            foreach($times as $time)
            {
                if ($number2==$value)
               { 
                   $input -> time = $time;
                     break;
                }
                else
                {
                $number2++; 
                }
            }
            foreach($contents as $content)
            {
                if ($number3==$value)
                { 
                $input -> contents = $content;
                break;
                }
                else
                {
                    $number3++;
                }
            }
        if($value<$number5)
        {
        $number4 = $items[$value]->id;
             Routine_Schedule::where([['id', '=', $number4]])->update
             ([
        'title' => $input->title,
        'start_time' => $input->start_time,
        'time' => $input->time,
        'contents' => $input->contents,
        ]);
        }else{
            $input->save();
        }
    $value++;
        }
        return redirect('home');
    }

    public function graph(Request $request, Schedule $schedule, Routine_Schedule $routine_schedule)
    {
       $number = auth()->user()->id;
        $value = 1;
        $date = $request->dates;
        $titles = (array)$request->title;
        $times = (array)$request->times;
        $contents = (array)$request->contents;
        foreach ($titles as $title)
        {
             $number1 = 1;
             $number2 = 1;
            $input = new Schedule;
            $input -> user_id = auth()->user()->id;
            $input -> date = $date;
            $input -> title = $title;
            foreach($times as $time)
            {
                $input -> time = $time;
               if ($number1==$value)
               { 
                   break;
                }
                else
                {
                $number1++; 
                }
            }
            foreach($contents as $content)
            {
              $input -> contents = $content;
                if ($number2==$value)
                { 
                $value++;
                break;
                }
                else
                {
                    $number2++;
                }
            } 
            $input -> save();
        }
        $items = \APP\Schedule::select('created_at')->orderBy('id', 'desc')->where([["user_id",'=', $number]])->get();
        $dd=$items[0]->created_at;
        return view('schedules/chartjs')->with(['routine_schedules' => $routine_schedule->where('user_id', '=', $number)->get(),'schedules' =>$schedule->where([['user_id', '=', $number],['created_at','=',$dd]])->get()]);
    }
    
    public function reload(Request $request, Schedule $schedule, Routine_Schedule $routine_schedule)
    {
        $number = auth()->user()->id;
        $items = \APP\Schedule::select('created_at')->orderBy('id', 'desc')->where([["user_id",'=', $number]])->get();
        $dd=$items[0]->created_at;
        return view('schedules/update')->with(['routine_schedules' => $routine_schedule->where('user_id', '=', $number)->get(),'schedules' =>$schedule->where([['user_id', '=', $number],['created_at','=',$dd]])->get()]);
    }
    
    public function view()
    {
        return view('schedules/view');
    }
}