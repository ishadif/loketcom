<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageVenuesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guess_may_not_create_events()
    {
        $this->withExceptionHandling();
        
        $this->get('/venues/create')
            ->assertRedirect('/login');  

        $this->post('/venues')
            ->assertRedirect('/login');  
    }

    /** @test */
    public function an_authenticated_user_can_create_new_venue()
    {
    	$this->signIn();

    	$venue = make('App\Venue');

    	$this->post('/venues', $venue->toArray());

    	$this->get('/venues')
    		->assertSee($venue->name);	
    }

    /** @test */
    public function an_authenticated_users_can_update_venue()
    {
    	$this->signIn();
    	$venue = create('App\Venue');

    	$this->patch("/venues/{$venue->id}",[
    		'name' => 'something else',
    		'address' => $venue->address
    	]);

    	tap($venue->fresh(), function ($editedVenue) use ($venue){
    		$this->assertEquals('something else', $editedVenue->name);
    	});
    }
}
