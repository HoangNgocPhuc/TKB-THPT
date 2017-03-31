@extends('layouts.app')

@section('content')
    <div class="container">
      <h2>Chỉnh sửa</h2>
      <form method="post" >
        {{ csrf_field() }}
        <div class="form-group">
          <label>Mã lớp</label>
          <input class="form-control" name="class_id" placeholder="Mã lớp" value="{{ old('class_id', $class->malop) }}" style="{{ $errors->has('class_id') ? 'border-color:red' : '' }}">
        </div>

        <div class="form-group">
          <label>Tên lớp</label>
          <input class="form-control" name="name" placeholder="Tên lớp" value="{{ old('name', $class->tenlop) }}" style="{{ $errors->has('name') ? 'border-color:red' : '' }}">
        </div>

        <div class="form-group">
          <label>Sĩ số</label>
          <input class="form-control" name="number" placeholder="Sĩ số" value="{{ old('number', $class->siso) }}" style="{{ $errors->has('number') ? 'border-color:red' : '' }}">
        </div>

        <div class="form-group">
          <label>Khối</label>
          <input class="form-control" name="grade" value="{{ old('grade', $class->khoi) }}" style="{{ $errors->has('grade') ? 'border-color:red' : '' }}">
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
@endsection
