<?php

namespace App\Http\Controllers;

use App\Event;
use App\Ticket;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');    
    }

	public function create(Event $event)
	{
        $this->authorize('create', $event);
        
        return view('tickets.create', compact('event'));
    }

    public function store(Event $event)
    {
        $this->authorize('create', $event);

    	$event->addTicket([
    		'name' => request('name'),
    		'price' => request('price'),
    		'quantity' => request('quantity'),
    	]);

    	return redirect($event->path());
    }

    public function edit(Event $event, Ticket $ticket)
    {
        return view('tickets.edit', compact('event','ticket'));
    }

    public function update(Event $event, $ticket)
    {
        $ticket = Ticket::findOrFail($ticket);

        $this->authorize('update', $ticket);

        $ticket->update(request()->all());

        return redirect($event->path());
    }
}
