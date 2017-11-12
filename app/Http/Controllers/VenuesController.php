<?php

namespace App\Http\Controllers;

use App\Venue;
use Illuminate\Http\Request;

class VenuesController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');	
	}

	public function index()
	{
		$venues = Venue::all();

		return view('venues.index', compact('venues'));	
	}

	public function create()
	{
		return view('venues.create');
	}

    public function store()
    {
    	request()->validate([
    		'name' => 'required',
    		'address' => 'required'
    	]);

    	Venue::create([
    		'name' => request('name'),
    		'address' => request('address')
    	]);

    	return redirect('venues');
    }

    public function edit(Venue $venue)
    {
    	return view('venues.edit', compact('venue'));
    }

    public function update(Venue $venue)
    {
    	request()->validate([
    		'name' => 'required',
    		'address' => 'required'
    	]);

    	$venue->update(request()->all());

    	return redirect('venues');
    }
}
