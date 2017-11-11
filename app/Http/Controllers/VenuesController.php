<?php

namespace App\Http\Controllers;

use App\Venue;
use Illuminate\Http\Request;

class VenuesController extends Controller
{
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
    	Venue::create([
    		'name' => request('name'),
    		'address' => request('address')
    	]);

    	return redirect('venues');
    }
}
