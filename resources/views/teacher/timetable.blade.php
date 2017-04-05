@extends('layouts.app')

@section('content')
    <div class="container" style="text-align: center;">
      <h2>Thời khóa biểu của {{ $teacher->tengv }}</h2>
      <h2>{{ $teacher->subject->tenmon }}</h2>
      <table class="table table-bordered table-inverse" >
      <thead>
        <tr>
          <th></th>
          <th>Thứ 2</th>
          <th>Thứ 3</th>
          <th>Thứ 4</th>
          <th>Thứ 5</th>
          <th>Thứ 6</th>
          <th>Thứ 7</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">Tiết 1</th>
          <td>Chào cờ</td>
          <td>{{ isset($arr_timetable[4]->classroom->tenlop) ? $arr_timetable[4]->classroom->tenlop : ''}}</td>
          <td>{{ isset($arr_timetable[9]->classroom->tenlop) ? $arr_timetable[9]->classroom->tenlop : ''}}</td>
          <td>{{ isset($arr_timetable[14]->classroom->tenlop) ? $arr_timetable[14]->classroom->tenlop : ''}}</td>
          <td>{{ isset($arr_timetable[19]->classroom->tenlop) ? $arr_timetable[19]->classroom->tenlop : ''}}</td>
          <td>{{ isset($arr_timetable[23]->classroom->tenlop) ? $arr_timetable[23]->classroom->tenlop : ''}}</td>
        </tr>
        <tr>
          <th scope="row">Tiết 2</th>
          <td>{{ isset($arr_timetable[0]->classroom->tenlop) ? $arr_timetable[0]->classroom->tenlop : ''}}</td>
          <td>{{ isset($arr_timetable[5]->classroom->tenlop) ? $arr_timetable[5]->classroom->tenlop : ''}}</td>
          <td>{{ isset($arr_timetable[10]->classroom->tenlop) ? $arr_timetable[10]->classroom->tenlop : ''}}</td>
          <td>{{ isset($arr_timetable[15]->classroom->tenlop) ? $arr_timetable[15]->classroom->tenlop : ''}}</td>
          <td>{{ isset($arr_timetable[20]->classroom->tenlop) ? $arr_timetable[20]->classroom->tenlop : ''}}</td>
          <td>{{ isset($arr_timetable[24]->classroom->tenlop) ? $arr_timetable[24]->classroom->tenlop : ''}}</td>
        </tr>
        <tr>
          <th scope="row">Tiết 3</th>
          <td>{{ isset($arr_timetable[1]->classroom->tenlop) ? $arr_timetable[1]->classroom->tenlop : ''}}</td>
          <td>{{ isset($arr_timetable[6]->classroom->tenlop) ? $arr_timetable[6]->classroom->tenlop : ''}}</td>
          <td>{{ isset($arr_timetable[11]->classroom->tenlop) ? $arr_timetable[11]->classroom->tenlop : ''}}</td>
          <td>{{ isset($arr_timetable[16]->classroom->tenlop) ? $arr_timetable[16]->classroom->tenlop : ''}}</td>
          <td>{{ isset($arr_timetable[21]->classroom->tenlop) ? $arr_timetable[21]->classroom->tenlop : ''}}</td>
          <td>{{ isset($arr_timetable[25]->classroom->tenlop) ? $arr_timetable[25]->classroom->tenlop : ''}}</td>
        </tr>
        <tr>
          <th scope="row">Tiết 4</th>
          <td>{{ isset($arr_timetable[2]->classroom->tenlop) ? $arr_timetable[2]->classroom->tenlop : ''}}</td>
          <td>{{ isset($arr_timetable[7]->classroom->tenlop) ? $arr_timetable[7]->classroom->tenlop : ''}}</td>
          <td>{{ isset($arr_timetable[12]->classroom->tenlop) ? $arr_timetable[12]->classroom->tenlop : ''}}</td>
          <td>{{ isset($arr_timetable[17]->classroom->tenlop) ? $arr_timetable[17]->classroom->tenlop : ''}}</td>
          <td>{{ isset($arr_timetable[22]->classroom->tenlop) ? $arr_timetable[22]->classroom->tenlop : ''}}</td>
          <td>{{ isset($arr_timetable[26]->classroom->tenlop) ? $arr_timetable[26]->classroom->tenlop : ''}}</td>
        </tr>
        <tr>
          <th scope="row">Tiết 5</th>
          <td>{{ isset($arr_timetable[3]->classroom->tenlop) ? $arr_timetable[3]->classroom->tenlop : ''}}</td>
          <td>{{ isset($arr_timetable[8]->classroom->tenlop) ? $arr_timetable[8]->classroom->tenlop : ''}}</td>
          <td>{{ isset($arr_timetable[13]->classroom->tenlop) ? $arr_timetable[13]->classroom->tenlop : ''}}</td>
          <td>{{ isset($arr_timetable[18]->classroom->tenlop) ? $arr_timetable[18]->classroom->tenlop : ''}}</td>
          <td></td>
          <td>Sinh hoạt</td>
        </tr>
      </tbody>
    </table>
    </div>
@endsection
