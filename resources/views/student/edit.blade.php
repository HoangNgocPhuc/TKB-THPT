@extends('layouts.app')

@section('content')
    <div class="container">
      <h2>Chỉnh sửa thông tin học sinh</h2>
      <form method="post" >
        {{ csrf_field() }}
        <div class="form-group">
          <label>Mã học sinh</label>
          <input class="form-control" name="student_id" placeholder="Mã học sinh" value="{{ old('student_id', $s->mahocsinh) }}" style="{{ $errors->has('student_id') ? 'border-color:red' : '' }}">
        </div>

        <div class="form-group">
          <label>Họ đệm</label>
          <input class="form-control" name="firstname" placeholder="Họ đệm" value="{{ old('firstname', $s->hodem) }}" style="{{ $errors->has('firstname') ? 'border-color:red' : '' }}">
        </div>
        <div class="form-group">
          <label>Tên</label>
          <input class="form-control" name="name" placeholder="Tên" value="{{ old('name', $s->ten) }}" style="{{ $errors->has('name') ? 'border-color:red' : '' }}">
        </div>
        <div class="form-group">
          <label>Ngày sinh</label>
          <input class="form-control" name="date" type="date" value="{{ old('date', $s->ngaysinh) }}" style="{{ $errors->has('date') ? 'border-color:red' : '' }}">
        </div>
        <div class="form-group">
          <label>Lớp</label>
          <select class="form-control" name="class">
            @foreach ( $class as $key => $value)
                <option value="{{ $value->malop }}" {{ ( old('class') == $value->id ) ? 'selected' : ( !old('class') && $s->malop == $value->malop) ? 'selected' : '' }}>{{ $value->tenlop }}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
@endsection
