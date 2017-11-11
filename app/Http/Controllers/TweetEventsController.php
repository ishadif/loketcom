<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Thujohn\Twitter\Facades\Twitter;

class TweetEventsController extends Controller
{
    public function post(Event $event)
    {
        $url  = route('events.show',['id' => $event->id]);

    	try {
	    	Twitter::postTweet([
	    		'status' => "I make an event called {$event->title} click the link below: {$url}",
	    		'format' => 'json'
	    	]);

            return redirect()->back();
    	} catch (Exception $e) {
    		$e->getMessage();
    	}
    }
}
