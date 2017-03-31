<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class class_subject_teacher extends Model
{
	protected $table = 'lop_mon_gv';

    public function classroom(){
    	return $this->belongsTo('App\classroom', 'malop', 'malop');
    }

    public function subject(){
    	return $this->belongsTo('App\subject', 'mamon', 'mamon');
    }

    public function teacher(){
    	return $this->belongsTo('App\teacher', 'magv', 'magv');
    }
}
