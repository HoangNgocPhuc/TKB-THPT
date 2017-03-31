<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\student;
use App\classroom;
use Validator;

class StudentController extends Controller
{

    public function index(){
    	$s = student::all();
    	return view('student.index', compact('s'));
    }

    public function edit($id)
    {
        $s = student::find($id);
        $class = classroom::all();
        return view('student.edit', compact('s', 'class'));
    }

    public function update(Request $request, $id){
    	$Rules = [
    		'student_id' => 'required',
    		'firstname' => 'required',
    		'name' =>	'required',
    		'date' =>	'required',
    		'class' =>	'required',
    	];
    	$this->validate($request, $Rules);
    	$s = student::find($id);
    	$s->mahocsinh = $request->student_id;
    	$s->hodem = $request->firstname;
    	$s->ten = $request->name;
    	$s->ngaysinh = $request->date;
    	$s->malop = $request->class;
     	$s->save();
    	return redirect(route('student.index'));
    }

    public function addStudent(){
    	$class = classroom::all();
    	return view('student.add', compact('class'));
    }

    public function store(Request $request){
    	$Rules = [
    		'student_id' => 'required|unique:hocsinh,mahocsinh',
    		'firstname' => 'required',
    		'name' =>	'required',
    		'date' =>	'required',
    		'class' =>	'required',
    	];
    	$this->validate($request, $Rules);

    	$s = new student;
    	$s->mahocsinh = $request->student_id;
    	$s->hodem = $request->firstname;
    	$s->ten = $request->name;
    	$s->ngaysinh = $request->date;
    	$s->malop = $request->class;
     	$s->save();
    	return redirect(route('student.index'));
    }

    public function delete($id){
    	student::find($id)->delete();
    	return redirect(route('student.index'));
    }
}
