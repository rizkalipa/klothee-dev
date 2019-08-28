<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = \App\Schedule::get()->sortBy('date_time');

        $scheduleThisMonth = $schedules->filter(function($schedule) { return  $schedule->date_time->month == now()->month; });

        return view('schedulers.index', ['scheduleThisMonth' => $scheduleThisMonth]);
    }

    public function store(Request $request)
    {
        $schedule = \App\Schedule::make($request->all());
        
        $datetime = $request->date . ' ' . $request->time_hour . ':' . $request->time_minute;
        $datetime = \Carbon\Carbon::parse($datetime);

        $schedule->date_time = $datetime;
        $schedule->user_id = auth()->user()->id;
        $schedule->save();

        return redirect()->route('scheduler.index')->with('status', 'Your Meeting Schedule is Planned!');
    }
}
