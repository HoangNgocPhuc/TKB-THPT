<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
	protected $table = 'monhoc';
    public function timetable(){
    	return $this->hasMany('App\timetable', 'mamon', 'mamon');
    }

    public function teachers(){
    	return $this->hasMany('App\teacher', 'mamon', 'mamon');
    }

    public function class_subject_teacher(){
    	return $this->hasMany('App\class_subject_teacher', 'mamon', 'mamon');
    }
}
