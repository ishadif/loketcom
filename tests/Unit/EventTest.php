<?php

namespace Tests\Unit;

use App\Ticket;
use App\Venue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventTest extends TestCase
{
	use RefreshDatabase;

    /** @test */
    public function it_has_a_string_path()
    {
    	$event = create('App\Event');

    	$this->assertEquals("/events/{$event->slug}", $event->path());
    }

    /** @test */
    public function it_has_many_tickets()
    {
    	$event = create('App\Event');
    	
    	$this->assertInstanceOf(Collection::class, $event->tickets);
    }

    /** @test */
    public function it_has_one_venue()
    {
        $event = create('App\Event');

        $this->assertInstanceOf(Venue::class, $event->venue);
    }

    /** @test */
    public function it_adds_new_tickets()
    {
    	$event = create('App\Event');

    	$event->addTicket([
    		'name' => 'something',
    		'price' => 10000,
    		'quantity' => 1234
    	]);

    	$ticket = Ticket::latest()->first();

    	$this->assertEquals($event->id, $ticket->event_id);
		$this->assertCount(1, $event->tickets);
    }
}
