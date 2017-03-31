@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
  <!-- Default panel contents -->
        <div class="panel-heading">Danh sách môn học toàn trường</div>
        <div class="panel-heading"><a href="{{ route('subject.add') }}"><button class="btn btn-primary">Thêm</button></a></div>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã môn học</th>
                    <th>Tên môn học</th>
                    <th></th>
                </tr>
                <tbody>
                    @foreach ($list_subject as $key => $value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->mamon }}</td>
                            <td>{{ $value->tenmon }}</td>
                            <td>
                                <a href="{{ route('subject.edit', $value->id) }}"><button class="btn btn-primary">Chỉnh sửa</button></a>
                                <a href="{{ route('subject.delete', $value->id) }}" onclick="return confirm('are you sure?')"><button class="btn btn-danger">Xóa</button></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </thead>
        </table>
    </div>
@endsection
