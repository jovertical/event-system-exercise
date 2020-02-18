<?php

namespace App\Http\Controllers;

use App\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    /**
     * Display a listing of the Event.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Event::with('days')->get();
    }

    /**
     * Store a newly created Event in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'from' => [
                'required',
                'date',
                'date_format:Y-m-d',
                'after_or_equal:'.now()->format('Y-m-d'),
                'before_or_equal:to',
            ],
            'to' => 'required|date|date_format:Y-m-d|after_or_equal:from',
            'days' => 'required|array|in:Mon,Tue,Wed,Thu,Fri,Sat,Sun',
        ]);

        $event = Event::create($request->only('name', 'from', 'to'));
        $period = Carbon::parse($request->from)->toPeriod($request->to);

        collect($period)
            ->filter(fn ($date) => in_array($date->shortEnglishDayOfWeek, $request->days))
            ->each(fn ($date) => $event->createDay(['date' => $date->format('Y-m-d')]));

        return Event::with('days')->find($event->id);
    }
}
