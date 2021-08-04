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

use App\User;

Route::get('/', function () {
    return view('index');
});

Auth::routes();


Route::get('/{username}/event/create', 'EventsController@create')->name('event_create');
Route::get('/{username}/event/{event_id}', 'EventsController@show')->name('event_show');
Route::delete('/{username}/event/{event_id}', 'EventsController@destroy');
Route::get('/{username}/event/{event_id}/edit', 'EventsController@edit');
Route::patch('/{username}/event/{event_id}', 'EventsController@update');
Route::post('/{username}/event', 'EventsController@store');


Route::get('{username}', 'CalendarsController@index')->name('calendar.show');


