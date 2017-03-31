@extends('layouts.app')

@section('content')
    <div class="container">
      <h2>Thêm học sinh</h2>
      <form method="post" >
        {{ csrf_field() }}
        <div class="form-group">
          <label>Mã học sinh</label>
          <input class="form-control" name="student_id" placeholder="Mã học sinh" value="{{ old('student_id') }}" style="{{ $errors->has('student_id') ? 'border-color:red' : '' }}">
        </div>

        <div class="form-group">
          <label>Họ đệm</label>
          <input class="form-control" name="firstname" placeholder="Họ đệm" value="{{ old('firstname') }}" style="{{ $errors->has('firstname') ? 'border-color:red' : '' }}">
        </div>

        <div class="form-group">
          <label>Tên</label>
          <input class="form-control" name="name" placeholder="Tên" value="{{ old('name') }}" style="{{ $errors->has('name') ? 'border-color:red' : '' }}">
        </div>

        <div class="form-group">
          <label>Ngày sinh</label>
          <input class="form-control" name="date" type="date" value="{{ old('date') }}" style="{{ $errors->has('date') ? 'border-color:red' : '' }}">
        </div>

        <div class="form-group">
          <label>Lớp</label>
          <select class="form-control" name="class" style="{{ $errors->has('class') ? 'border-color:red' : '' }}">
            <option value=""></option>
            @foreach ( $class as $key => $value)
                <option value="{{ $value->malop }}" {{ ( old('class') == $value->id ) ? 'selected' : ''}}>{{ $value->tenlop }}</option>
            @endforeach
          </select>
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
@endsection
