<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ManageEventsTest extends TestCase
{
	use RefreshDatabase;

    /** @test */
    public function guess_may_not_create_events()
    {
        $this->withExceptionHandling();
        
        $this->get('/events/create')
            ->assertRedirect('/login');  

        $this->post('/events')
            ->assertRedirect('/login');  
    }

    /** @test */
    public function authenticated_user_can_add_new_event()
    {
        $this->signIn();

    	$event = make('App\Event',['user_id' => auth()->id()]);

    	$this->post('/events', $event->toArray());
    	$this->get('/events')
    		->assertSee($event->title);
    }

    /** @test */
    public function an_event_requires_a_title()
    {
        $this->publishEvent(['title' => null])
            ->assertSessionHasErrors('title');
    }

    /** @test */
    public function an_event_requires_a_venue()
    {
        $this->publishEvent(['venue_id' => null])
            ->assertSessionHasErrors('venue_id');
    }

    /** @test */
    public function an_event_requires_an_existing_venue()
    {
        $this->publishEvent(['venue_id' => 999])
            ->assertSessionHasErrors('venue_id');
    }

    /** @test */
    public function an_event_requires_a_date()
    {
        $this->publishEvent(['event_date' => null])
            ->assertSessionHasErrors('event_date');
    }

    /** @test */
    public function an_event_requires_a_description()
    {
        $this->publishEvent(['description' => null])
            ->assertSessionHasErrors('description');
    }

    /** @test */
    public function user_can_edit_events()
    {
        $this->signIn();

        $event = create('App\Event', [
            'title' => 'something',
            'slug' => 'something',
            'user_id' => auth()->id()
        ]);

        $this->patch("{$event->path()}", [
            'title' => 'Kopdar Seru',
            'venue_id' => $event->venue_id,
            'event_date' => Carbon::now()->addMonth(),
            'description' => $event->description
        ]);

        tap($event->fresh(), function($editedEvent) use ($event) {
            $this->assertEquals('Kopdar Seru', $editedEvent->title);
            $this->assertNotEquals($editedEvent->event_date, $event->event_date);
        });
    }

    /** @test */
    public function an_authenticated_user_can_delete_an_events_with_its_associated_tickets()
    {
        $this->signIn();

        $event = create('App\Event',['user_id' => auth()->id()]);
        $ticket = create('App\Ticket',['event_id' => $event->id]);

        $this->delete("{$event->path()}");

        $this->assertDatabaseMissing('events', [
            'id' => $event->id,
            'title' => $event->title
        ]);

        $this->assertDatabaseMissing('tickets', [
            'id' => $ticket->id,
            'name' => $ticket->name
        ]);
    }

    protected function publishEvent($overrides)
    {
        $this->withExceptionHandling()
            ->signIn();

        $event = make('App\Event', $overrides);

        return $this->post('/events', $event->toArray());
    }    
}
