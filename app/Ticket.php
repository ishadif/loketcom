<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['name','price','quantity','event_id'];

    public function event()
    {
    	return $this->belongsTo(Event::class);
    }
}
