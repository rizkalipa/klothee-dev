<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function response(Request $request, $id)
    {
        $schedule = \App\Schedule::find($id);

        if($request->input('response') == 'Accept')
        {
            $schedule->author_response = 'Accept';
        }
        else
        {
            $schedule->author_response = 'Decline';
        }

        $schedule->save();

        return redirect()->back()->with('status', 'You ' . $schedule->author_response . ' Schedule From ' . $schedule->user->name);
    }
}
