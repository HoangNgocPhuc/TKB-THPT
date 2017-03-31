<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
	protected $table = 'hocsinh';
	
    public function classroom(){
    	return $this->belongsTo('App\classroom', 'malop', 'malop');
    }
}
