<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadEventsTest extends TestCase
{
	use RefreshDatabase;

    /** @test */
    public function user_can_read_only_events_he_is_created()
    {
    	$signedInUser = create('App\User');
    	$eventBySignedInUser = create('App\Event',['user_id' => $signedInUser->id]);
    	$eventByNotSignedInUser = create('App\Event');

    	$this->signIn($signedInUser)
    		->get('/events')
    		->assertSee($eventBySignedInUser->title)
    		->assertDontSee($eventByNotSignedInUser->title);

    }
}
