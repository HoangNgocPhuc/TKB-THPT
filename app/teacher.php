<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
	protected $table = 'giaovien';
    public function subject(){
    	return $this->belongsTo('App\subject', 'mamon', 'mamon');
    }

    public function timetable(){
    	return $this->hasMany('App\timetable', 'magv', 'magv');
    }

    public function class_subject_teacher(){
    	return $this->hasMany('App\class_subject_teacher', 'magv', 'magv');
    }
}
