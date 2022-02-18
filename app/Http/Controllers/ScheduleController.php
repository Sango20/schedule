<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use fullcalendar;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('schedules/index');  
    }
    
    public function calendar()
    {
        return view('schedules/calendar');  
    }
    
}
