<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/twitter/callback','Auth\LoginController@handleProviderCallback');

Route::get('/events', 'EventsController@index');
Route::post('/events', 'EventsController@store');
Route::get('/events/create', 'EventsController@create');
Route::get('/events/{event}', 'EventsController@show')->name('events.show');
Route::get('/events/{event}/edit', 'EventsController@edit');
Route::patch('/events/{event}','EventsController@update');
Route::delete('/events/{event}','EventsController@destroy');
Route::get('/events/{event}/tweet','TweetEventsController@post');

Route::get('/events/{event}/tickets/create', 'TicketsController@create');
Route::post('/events/{event}/tickets', 'TicketsController@store');
Route::get('/events/{event}/tickets/{ticket}/edit','TicketsController@edit');
Route::patch('/events/{event}/tickets/{ticket}','TicketsController@update');

Route::get('/venues', 'VenuesController@index');
Route::get('/venues/create', 'VenuesController@create');
Route::post('/venues', 'VenuesController@store');










Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
