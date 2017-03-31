@extends('layouts.app')

@section('content')
    @foreach ($class as $a)
        
    @endforeach
    <div class="panel panel-default">
  <!-- Default panel contents -->
        <div class="panel-heading">Danh sách lớp học toàn trường</div>
        <div class="panel-heading"><a href="{{ route('class.add') }}"><button class="btn btn-primary">Thêm</button>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã lớp</th>
                    <th>Tên lớp</th>
                    <th>Khối</th>
                    <th>Sĩ số</th>
                    <th>Tùy chọn</th>
                    <th>Môn học</th>
                </tr>
                <tbody>
                    @foreach ($class as $key => $value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->malop }}</td>
                            <td>{{ $value->tenlop }}</td>
                            <td>{{ $value->khoi }}</td>
                            <td>{{ $value->siso }}</td>
                            <td>
                                <a href="{{ route('class.edit', $value->id) }}"><button class="btn btn-primary">Chỉnh sửa</button></a>
                                <a href="{{ route('class.delete', $value->id) }}" onclick="return confirm('are you sure?')"><button class="btn btn-danger">Xóa</button></a>
                            </td>
                            <td>
                                <a href="{{ route('class.generalTimeTable', $value->malop) }}"><button class="btn btn-primary">Môn học</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </thead>
        </table>
    </div>
@endsection
