@extends('layouts.app')

@section('content')
    <div class="container">
      <h2>Thêm giáo viên</h2>
      <form method="post" >
        {{ csrf_field() }}
        <div class="form-group">
          <label>Mã giáo viên</label>
          <input class="form-control" name="teacher_id" placeholder="Mã giáo viên" value="{{ old('teacher_id') }}" style="{{ $errors->has('teacher_id') ? 'border-color:red' : '' }}">
        </div>

        <div class="form-group">
          <label>Họ tên</label>
          <input class="form-control" name="name" placeholder="Họ tên" value="{{ old('name') }}" style="{{ $errors->has('name') ? 'border-color:red' : '' }}">
        </div>

        <div class="form-group">
          <label>Bộ môn</label>
          <select class="form-control" name="subject" style="{{ $errors->has('subject') ? 'border-color:red' : '' }}">
            <option value=""></option>
            @foreach ( $list_subject as $key => $value)
                <option value="{{ $value->mamon }}" {{ ( old('subject') == $value->mamon ) ? 'selected' : ''}}>{{ $value->tenmon }}</option>
            @endforeach
          </select>
        </div>

        <button type="submit" class="btn btn-default">Thêm</button>
      </form>
    </div>
@endsection
