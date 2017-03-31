<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class classroom extends Model
{
	protected $table = 'lop';

    public function students(){
    	return $this->hasMany('App\student', 'malop', 'malop');
    }

    public function timetables(){
    	return $this->hasMany('App\timetable', 'malop', 'malop');
    }

    public function class_subject_teacher(){
    	return $this->hasMany('App\class_subject_teacher', 'malop', 'malop');
    }
}
