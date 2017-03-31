@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
  <!-- Default panel contents -->
        <div class="panel-heading">Danh sách học sinh toàn trường</div>
        <div class="panel-heading"><a href="{{ route('student.add') }}"><button class="btn btn-primary">Thêm</button></a></div>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã học sinh</th>
                    <th>Họ đệm</th>
                    <th>Tên</th>
                    <th>Ngày sinh</th>
                    <th>Lớp</th>
                    <th>a</th>
                </tr>
                <tbody>
                    @foreach ($s as $key => $value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->mahocsinh }}</td>
                            <td>{{ $value->hodem }}</td>
                            <td>{{ $value->ten }}</td>
                            <td>{{ $value->ngaysinh }}</td>
                            <td>{{ $value->classroom->tenlop }}</td>
                            <td>
                                <a href="{{ route('student.edit', $value->id) }}"><button class="btn btn-primary">Chỉnh sửa</button></a>
                                <a href="{{ route('student.delete', $value->id) }}" onclick="return confirm('are you sure?')"><button class="btn btn-danger">Xóa</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </thead>
        </table>
    </div>
@endsection
