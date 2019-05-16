<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    public function admins(){
		return $this->belongsTo('App\Admin');
	}
}
