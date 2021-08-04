<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\User;

class EventsController extends Controller
{


    public function create($username) {

    	$user = User::where('username',$username)->firstOrFail();

        $date = request()->get('date');

    	return view('events.create', compact('user', 'date'));
    }




    public function store($username) {

    	//validação de dados
    	$data = request()->validate([
    		'name'		    =>	'required',
            'date'          =>  'required',
            'start_time'    =>  'required',
    		//...
    	]);

    	$user = User::select('id', 'username')->where('username', $username)->firstOrFail();

    	Event::create([
    		'name'        	  =>	$data['name'],
    		'user_id'	      =>	$user->id,
    		'date'            =>	$data['date'],
            'start_time'      =>    $data['start_time'],
            'finish_time'     =>    $data['start_time'], // !!!
    	]);
    	

      	return view('calendars.index', compact('user'));
    }




    public function show($username,  $event_id) {

        $event = Event::select('id', 'name', 'date', 'start_time', 'finish_time')->where('id', $event_id)->firstOrFail();        
        $user = User::select('id', 'username')->where('username', $username)->firstOrFail();
        
        return view('events.show', compact('user', 'event'));
    }




    public function edit($username, $event_id) {

        $event = Event::select('id', 'name', 'date')->where('id', $event_id)->firstOrFail();        
        $user = User::select('id', 'username')->where('username', $username)->firstOrFail();

        return view('events.edit', compact('user', 'event'));
    }




    public function update($username, $event_id) {

        $data = request()->validate([
            'name'      =>  'required',
            'date'      =>  'required',
            //...
        ]);

        $user = User::select('id', 'username')->where('username', $username)->firstOrFail();


        $event = Event::select('id', 'name', 'date')->where('id', $event_id)->firstOrFail();       

        $update = $event->update([
            'name'      =>  $data['name'],
            'date'      =>  $data['date'],
        ]);

        if($update)
            return view('calendars.index', compact('user'));
        else
            return view('events.edit', compact('user', 'event'))->with(['errors' => 'Falhou ']);
    }




    public function destroy($username, $event_id) {

        $user = User::select('id', 'username')->where('username', $username)->firstOrFail();
        $event = Event::select('id', 'name', 'date')->where('id', $event_id)->firstOrFail();

        $delete = $event->delete($event_id);

        if($delete)
            return view('calendars.index', compact('user'));
        else
            return view('events.edit', compact('user', 'event'))->with(['errors' => 'Falhou ']);
    }
}
