<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class timetable extends Model
{
	protected $table = 'thoikhoabieu';
    public function subject(){
    	return $this->belongsTo('App\subject', 'mamon', 'mamon');
    }

    public function teacher(){
    	return $this->belongsTo('App\teacher', 'magv', 'magv');
    }

    public function classroom(){
    	return $this->belongsTo('App\classroom', 'malop', 'malop');
    }
}
