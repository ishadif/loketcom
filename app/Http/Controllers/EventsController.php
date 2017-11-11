<?php

namespace App\Http\Controllers;

use App\Event;
use App\Venue;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

	public function index()
	{
		$events = Event::where('user_id', auth()->id())->get();

		return view('events.index', compact('events'));
	}

    public function create()
    {
        $venues = Venue::all();

        return view('events.create', compact('venues'));
    }

    public function store()
    {
        request()->validate([
            'title' => 'required',
            'venue_id' => 'required | exists:venues,id',
            'event_date' => 'required',
            'description' => 'required',
        ]);

        $slug = str_slug(request('title'),'-');

        $event = Event::create([
            'title' => request('title'),
            'user_id' => auth()->id(),
            'venue_id' => request('venue_id'),
            'slug' => $slug,
            'event_date' => request('event_date'),
            'description' => request('description')
        ]);

        return redirect($event->path());
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        $venues = Venue::all();

        return view('events.edit', compact('event','venues'));
    }

    public function update(Event $event)
    {
        request()->validate([
            'title' => 'required',
            'venue_id' => 'required | exists:venues,id',
            'event_date' => 'required',
            'description' => 'required',
        ]);
        
        $slug = str_slug(request('title'),'-');
        
        $event->update([
            'title' => request('title'),
            'user_id' => auth()->id(),
            'venue_id' => request('venue_id'),
            'slug' => $slug,
            'event_date' => request('event_date'),
            'description' => request('description')
        ]);

        return redirect($event->path());
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect('events');
    }
}
