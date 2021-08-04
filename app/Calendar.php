<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
	//usado para conectar as tabelas user e schedule (user -> schedule)
    public function user(){
    	return $this->belongsTo(User::class);
    }
}
