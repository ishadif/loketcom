<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageTicketsTest extends TestCase
{
	use RefreshDatabase;

    /** @test */
    public function users_can_add_new_ticket_for_the_selected_event()
    {
    	$event = create('App\Event');
    	$ticket = make('App\Ticket',['event_id' => $event->id]);

    	$this->post("{$event->path()}/tickets", $ticket->toArray());
    	$this->get($event->path())
    		->assertSee($ticket->name)
    		->assertSee("{$ticket->price}");
    }

    /** @test */
    public function users_can_edit_tickets()
    {
        $this->signIn();
        $event = create('App\Event',['user_id' => auth()->id()]);
        $ticket = create('App\Ticket',[
            'name' => 'VIP',
            'event_id' => $event->id
        ]);

        $this->patch("{$event->path()}/tickets/{$ticket->id}",[
            'name' => 'platinum'
        ]);

        tap($ticket->fresh(), function($ticket){
            $this->assertEquals('platinum', $ticket->name);
        });
    }
}
