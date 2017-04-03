@extends('layouts.app')

@section('content')
    @foreach ($class as $a)
        
    @endforeach
    <div class="panel panel-default">
  <!-- Default panel contents -->
        <div class="panel-heading"><a href="{{ route('sort') }}"><button class="btn btn-primary">Sắp xếp thời khóa biểu</button></a></div>
        <div>
        @if (session('status'))
            <div class="alert alert-success">
                <ul>
            @foreach(session('status') as $error )
                <li>{{ $error }}</li>
            @endforeach
                </ul>
            </div>
        @endif 
        </div>
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
                <body>
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
                                <a href="{{ route('class.timetable', $value->malop) }}"><button class="btn btn-primary">Thời khóa biểu</button></a>
                            </td>
                        </tr>
                    @endforeach
                </body>    
            </thead>
            <div style="display: none;">
                {{ $class->links() }}
            </div>
        </table>
        <div style="text-align: center;">
           {{ $class->links() }}
        </div>
    </div>
@endsection
