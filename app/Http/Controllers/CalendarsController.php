<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CalendarsController extends Controller
{
	public function index($username)
	{
		$user = User::where('username',$username)->firstOrFail();
    	return view('calendars.index', compact('user'));
	}
}
