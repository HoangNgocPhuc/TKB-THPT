@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
  <!-- Default panel contents -->
        <div class="panel-heading">Danh sách giáo viên toàn trường</div>
        <div class="panel-heading"><a href="{{ route('teacher.add') }}"><button class="btn btn-primary">Thêm giáo viên</button></a></div>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã giáo viên</th>
                    <th>Tên</th>
                    <th>Dạy môn</th>
                </tr>
                <tbody>
                    @foreach ($list_teacher as $key => $value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->magv }}</td>
                            <td>{{ $value->tengv }}</td>
                            <td>{{ $value->subject->tenmon }}</td>
                            <td>
                                <a href="{{ route('teacher.edit', $value->id) }}"><button class="btn btn-primary">Chỉnh sửa</button></a>
                                <a href="{{ route('teacher.delete', $value->id) }}" onclick="return confirm('are you sure?')"><button class="btn btn-danger">Xóa</button></a>
                                <a href="{{ route('teacher.timetable', $value->magv) }}"><button class="btn btn-primary">Thời khóa biểu</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </thead>
            <div style="display: none;">
                {{ $list_teacher->links() }}
            </div>
        </table>
        <div style="text-align: center;">
            {{ $list_teacher->links() }}
        </div>
    </div>
@endsection
