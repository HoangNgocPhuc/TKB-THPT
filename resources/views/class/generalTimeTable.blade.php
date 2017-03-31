@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
  <!-- Default panel contents -->
        <div class="panel-heading">Tổng số tiết môn học của lớp {{ $class->tenlop }} là {{ $sum }}</div>
        <div class="panel-heading"><a href="{{ route('class.generaltimetable.add', $class->malop) }}"><button class="btn btn-primary">Thêm</button></a></div>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên môn</th>
                    <th>Giáo viên (mã giáo viên) dạy</th>
                    <th>Số tiết trong tuần</th>
                    <th></th>
                </tr>
                <tbody>
                    @foreach ($general as $key => $value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->subject->tenmon }}</td>
                            <td>{{ $value->teacher->tengv }} ({{ $value->magv }})</td>
                            <td>{{ $value->sotiet }}</td>
                            <td>
                                <a href="{{ route('class.generaltimetable.edit', [$class->malop, $value->mamon]) }}"><button class="btn btn-primary">Chỉnh sửa</button></a>
                                <a href="{{ route('class.generaltimetable.delete', [$class->malop, $value->mamon]) }}" onclick="return confirm('are you sure?')"><button class="btn btn-danger">Xóa</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </thead>
        </table>
    </div>
@endsection
