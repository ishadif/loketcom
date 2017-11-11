<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageVenuesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_new_venue()
    {
    	$venue = make('App\Venue');

    	$this->post('/venues', $venue->toArray());

    	$this->get('/venues')
    		->assertSee($venue->name);	
    }
}
