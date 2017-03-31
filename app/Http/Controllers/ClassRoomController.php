<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\classroom;
use App\class_subject_teacher;
use App\teacher;
use App\subject;

class ClassRoomController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class = classroom::all();
        return view('class.index', compact('class'));
    }

    //form add class
    public function add(){
        return view('class.add');
    }

    //them lop vao db
    public function store(Request $request){
        $rules = [
            'class_id' => 'required|unique:lop,malop',
            'name' => 'required|unique:lop,tenlop',
            'number' => 'required|integer|min:0',
            'grade' => 'required|integer|min:0',
        ];
        $this->validate($request, $rules);

        $class = new classroom();
        $class->malop = $request->class_id;
        $class->tenlop = $request->name;
        $class->siso = $request->number;
        $class->khoi = $request->grade;
        $class->save();
        return redirect(route('class'));
    }

    //form chinh sua lop
    public function edit(Request $request, $id){
        $class = classroom::find($id);
        return view('class.edit', compact('class'));
    }

    //update lop hoc
    public function update(Request $request, $id){
        $rules = [
            'class_id' => 'required',
            'name' => 'required',
            'number' => 'required|integer|min:0',
            'grade' => 'required|integer|min:0',
        ];
        $this->validate($request, $rules);

        $class = classroom::find($id);
        $class->malop = $request->class_id;
        $class->tenlop = $request->name;
        $class->siso = $request->number;
        $class->khoi = $request->grade;
        $class->save();
        return redirect(route('class'));
    }

    //xoa lop hoc
    public function delete($id){
        classroom::find($id)->delete();
        return redirect(route('class'));
    }

    public function generalTimeTable($id){
        $general = class_subject_teacher::where('malop', $id)->orderBy('mamon', 'desc')->get();
        $class = classroom::where('malop', $id)->first();
        //tinh tong so tiet trong tuan cua lop do
        $sum = $general->sum('sotiet');
        return view('class.generalTimeTable', compact('general', 'class', 'sum'));
    }

    //form add moon hoc cua 1 lop
    public function addTimeTable($id){
        //mang cac mon da co trong thoi khoa bieu
        $arr_subject_exist = class_subject_teacher::where('malop', $id)->pluck('mamon')->toArray();
        //mang cac mon hoc chua co trong thoi khoa bieu
        $arr_subject = subject::whereNotIn('mamon', $arr_subject_exist)->get();
        
        return view('class.addTimeTable', compact('arr_subject'));
    }

    //them mon hoc cua 1 lop vao db
    public function addtoTimeTable(Request $request, $id){
        $rules = [
            'name_subject' => 'required',
            'name_teacher' => 'required',
            'number_lession' => 'required|integer|min:0',
        ];
        $this->validate($request, $rules);
        $class_subject_teacher = new class_subject_teacher();
        $class_subject_teacher->malop = $id;
        $class_subject_teacher->magv = $request->name_teacher;
        $class_subject_teacher->sotiet = $request->number_lession;
        $class_subject_teacher->mamon = $request->name_subject;
        $class_subject_teacher->save();
        return redirect(route('class.generalTimeTable', $id));
    }

    //form chinh sua cua 1 mon
    public function editTimeTable($class_id, $subject_id){
        //danh sach giao vien day mon $subject_id
        $list_teacher = teacher::where('mamon', $subject_id)->get();
        //so tiet lop $class_id hoc mon $subject_id
        $class_subject_teacher = class_subject_teacher::where('malop', $class_id)->where('mamon', $subject_id)->first();
        return view('class.editTimeTable', compact('list_teacher', 'class_subject_teacher'));
    }

    public function updateTimeTable(Request $request, $class_id, $subject_id){
        $rules = [
            'teacher' => 'required',
            'number_lession' => 'required|integer|min:0',
        ];
        $this->validate($request, $rules);
        $class_subject_teacher = class_subject_teacher::where('malop', $class_id)->where('mamon', $subject_id)->first();
        $class_subject_teacher->magv = $request->teacher;
        $class_subject_teacher->sotiet = $request->number_lession;
        $class_subject_teacher->save();
        return redirect(route('class.generalTimeTable', $class_id));
    }
    //xoa mon
    public function deleteTimeTable($class_id, $subject_id){
        class_subject_teacher::where('malop', $class_id)->where('mamon', $subject_id)->first()->delete();
        return redirect(route('class.generalTimeTable', $class_id));
    }

    public function get_list_teacher(Request $request){
        $subject = $request->subject;
        $list_teacher = teacher::where('mamon', $subject)->get();
        return view('class.html_list_teachet', compact('list_teacher'));
    }
}
