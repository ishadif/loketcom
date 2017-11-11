<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
    	'title','user_id','description','venue_id','event_date','slug'
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($event){
            $event->tickets->each->delete();
        });
    }

    protected $dates = ['event_date'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function path()
    {
    	return '/events/'. $this->slug;
    }

    public function tickets()
    {
    	return $this->hasMany(Ticket::class);
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

    public function addTicket($ticket)
    {
    	$this->tickets()->create([
    		'name' => $ticket['name'],
    		'price' => $ticket['price'],
    		'quantity' => $ticket['quantity'],
    	]);
    }
}
