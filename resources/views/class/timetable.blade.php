@extends('layouts.app')

@section('content')
    <div class="container" style="text-align: center;">
      <h2>Thời khóa biểu lớp {{ $class->tenlop }}</h2>
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
          <td>{{ $timetable[4]->subject->tenmon}}</td>
          <td>{{ $timetable[9]->subject->tenmon}}</td>
          <td>{{ $timetable[14]->subject->tenmon}}</td>
          <td>{{ $timetable[19]->subject->tenmon}}</td>
          <td>{{ $timetable[23]->subject->tenmon}}</td>
        </tr>
        <tr>
          <th scope="row">Tiết 2</th>
          <td>{{ $timetable[0]->subject->tenmon}}</td>
          <td>{{ $timetable[5]->subject->tenmon}}</td>
          <td>{{ $timetable[10]->subject->tenmon}}</td>
          <td>{{ $timetable[15]->subject->tenmon}}</td>
          <td>{{ $timetable[20]->subject->tenmon}}</td>
          <td>{{ $timetable[24]->subject->tenmon}}</td>
        </tr>
        <tr>
          <th scope="row">Tiết 3</th>
          <td>{{ $timetable[1]->subject->tenmon}}</td>
          <td>{{ $timetable[6]->subject->tenmon}}</td>
          <td>{{ $timetable[11]->subject->tenmon}}</td>
          <td>{{ $timetable[16]->subject->tenmon}}</td>
          <td>{{ $timetable[21]->subject->tenmon}}</td>
          <td>{{ $timetable[25]->subject->tenmon}}</td>
        </tr>
        <tr>
          <th scope="row">Tiết 4</th>
          <td>{{ $timetable[2]->subject->tenmon}}</td>
          <td>{{ $timetable[7]->subject->tenmon}}</td>
          <td>{{ $timetable[12]->subject->tenmon}}</td>
          <td>{{ $timetable[17]->subject->tenmon}}</td>
          <td>{{ $timetable[22]->subject->tenmon}}</td>
          <td>{{ $timetable[26]->subject->tenmon}}</td>
        </tr>
        <tr>
          <th scope="row">Tiết 5</th>
          <td>{{ $timetable[3]->subject->tenmon}}</td>
          <td>{{ $timetable[8]->subject->tenmon}}</td>
          <td>{{ $timetable[13]->subject->tenmon}}</td>
          <td>{{ $timetable[18]->subject->tenmon}}</td>
          <td></td>
          <td>Sinh hoạt</td>
        </tr>
      </tbody>
    </table>
    </div>
@endsection
