<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\classroom;
use App\class_subject_teacher;
use App\teacher;
use App\subject;
use App\timetable;
use DB;
use Redirect;
class SortController extends Controller
{
    public $result;
    public $class_subject_teacher;
    public $ok = 1;
    //sort
    public function sort(){
        //mang thong bao viec sap xep
        timetable::truncate();
        $arr_noti = $this->check();
        if ($arr_noti[0] != "Sắp xếp thành công")
            return Redirect::route('class')->with('status', $arr_noti);
        $this->result = [];
        $classroom = classroom::all();
        foreach ($classroom as $key => $value) {
            //sap xep thoi khoa bieu cua tung lop mot
            $this->sort_class($value->malop);
            if (count($this->result) == count($classroom)){
                echo "<pre>";
                print_r(($this->result));
                echo "</pre>";
                foreach ($this->result as $key => $a_class) {
                    foreach ($a_class as $key1 => $value) {
                        $timetable = new timetable();
                        $timetable->malop = $key;
                        $timetable->mamon = $value['mamon'];
                        $timetable->magv = $value['magv'];
                        $timetable->tiet = $value['tiet'];
                        $timetable->save();
                    }
                }
                return Redirect::route('class')->with('status', $arr_noti);
                return;
            
            }
            if ($this->ok == 0){
                unset($this->result);
                $this->result = [];
                break;
            }
        }
        if ($this->ok == 0){
            $this->ok = 1;
            $this->sort();
        }
    }

    //ham kiem tra xem du lieu co day du
    public function check(){
        $arr_noti = [];
        $classroom = classroom::all();
        foreach ($classroom as $key => $value) {
            $sum = $value->class_subject_teacher->sum('sotiet');
            if ($sum != 27)
                $arr_noti[] = "Lớp " . $value["tenlop"] . " có " . $sum . ". Đề nghị điều chỉnh để đủ 27 tiết.";
        }

        if (count($arr_noti) == 0)
            $arr_noti[] = "Sắp xếp thành công";
        return $arr_noti;
    }

    //sap xep thoi khoa bieu cua tung lop mot
    public function sort_class($id){
        $aclass = [];
        $this->class_subject_teacher = class_subject_teacher::where('malop', $id)->get();
        // echo "<pre>";
        // print_r($this->class_subject_teacher);
        // echo "</pre>";
        // die;
        for ($i=1; $i <= 27 ; $i++) { 
            //tim mang thoa man ma random duoc
            $arr_subject = $this->find_arr_subject($aclass, $i);
            if (count($arr_subject) == 0){
                echo "<script>alert('reset')</script>";
                unset($aclass);
                // unset($this->result);
                // $this->result = []; 
                $this->ok = 0;
                break;
            }
            //random ra 1 mon
            if (count($arr_subject) > 0){
                $rand = (count($arr_subject) == 1) ? 0 : rand(0, count($arr_subject) - 1);
                if (($arr_subject[$rand]))
                    $aclass[] = [
                        'mamon' => $arr_subject[$rand]['mamon'], 
                        'magv' => $arr_subject[$rand]['magv'], 
                        'tiet' => $i
                    ];
            }
        }
        if ($this->ok == 1)
            $this->result[$id] = $aclass;
    }


    //ham tim mang ma random duoc trong do
    public function find_arr_subject($arr_subject_exist, $i){
        //tong cac tiet da co cua lop do
        $total_lession_subject = array();
        foreach ($arr_subject_exist as $key => $value) {
            $param = $value['mamon'];
            if (isset($total_lession_subject[$param]))
                $total_lession_subject[$param]++;
            else
                $total_lession_subject[$param] = 1;
        }

        $arr_subject = [];
        foreach ($this->class_subject_teacher as $key => $value) {
            $teacher = $value['magv'];
            $subject = $value['mamon'];
            if (($this->check_teacher($teacher, $i) == 1) && (!isset($total_lession_subject[$subject]) ||  $value['sotiet'] > $total_lession_subject[$subject])){
                $arr_subject[] = ['mamon' => $subject, 'magv' => $teacher];
            }
        }
        return $arr_subject;
    }

    //ham kiem tra xem giao vien do da day lop nao vao tiet do chua
    public function check_teacher($teacher, $i){
        foreach ($this->result as $key => $value) {
            if (count($this->result)==0)
                return 1;
            foreach ($value as $v) {
                if (($v['magv'] == $teacher) && ($v['tiet'] == $i))
                    return 0;
            }
        }
        return 1;
    }
}
