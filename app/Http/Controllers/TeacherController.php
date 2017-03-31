<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\teacher;
use App\subject;
use App\class_subject_teacher;
use App\timetable;
use Validator;

class TeacherController extends Controller
{

    public function index(){
    	$list_teacher = teacher::all();
    	return view('teacher.index', compact('list_teacher'));
    }

    public function edit($id)
    {
        $teacher = teacher::find($id);
        $list_subject = subject::all();
        return view('teacher.edit', compact('teacher', 'list_subject'));
    }

    public function update(Request $request, $id){
    	$rules = [
            'teacher_id' => 'required',
            'name' => 'required',
            'subject' => 'required',
        ];
        $this->validate($request, $rules);
        $teacher = teacher::find($id);
        $teacher->magv = $request->teacher_id;
        $teacher->tengv = $request->name;
        $teacher->mamon = $request->subject;
        $teacher->save();  
    	return redirect(route('teacher.index'));
    }

    public function add(){
    	$list_subject = subject::all();
    	return view('teacher.add', compact('list_subject'));
    }

    public function store(Request $request){
    	$Rules = [
    		'teacher_id' => 'required|unique:giaovien,magv',
    		'name' => 'required',
    		'subject' =>	'required',
    	];
    	$this->validate($request, $Rules);

    	$teacher = new teacher;
    	$teacher->magv = $request->teacher_id;
    	$teacher->tengv = $request->name;
    	$teacher->mamon = $request->subject;
     	$teacher->save();
    	return redirect(route('teacher.index'));
    }

    public function delete($id){
    	teacher::find($id)->delete();
    	return redirect(route('teacher.index'));
    }
}
