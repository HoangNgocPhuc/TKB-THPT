<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\classroom;
use App\class_subject_teacher;
use App\teacher;
use App\subject;

class SubjectController extends Controller
{
    public function index(){
        $list_subject = subject::all();
        return view('subject.index', compact('list_subject'));
    }   

    public function edit($id)
    {
        $subject = subject::find($id);
        return view('subject.edit', compact('subject'));
    }

    public function update(Request $request, $id){
        $rules = [
            'subject_id' => 'required',
            'name' => 'required',
        ];
        $this->validate($request, $rules);
        $subject = subject::find($id);
        $subject->mamon = $request->subject_id;
        $subject->tenmon = $request->name;
        $subject->save();
        return redirect(route('subject.index'));
    }

    public function add(){
        return view('subject.add');
    }

    public function store(Request $request){
        $Rules = [
            'subject_id' => 'required|unique:monhoc,mamon',
            'name' => 'required',
        ];
        $this->validate($request, $Rules);

        $subject = new subject();
        $subject->mamon = $request->subject_id;
        $subject->tenmon = $request->name;
        $subject->save();
        return redirect(route('subject.index'));
    }

    public function delete($id){
        subject::find($id)->delete();
        return redirect(route('subject.index'));
    }
}
