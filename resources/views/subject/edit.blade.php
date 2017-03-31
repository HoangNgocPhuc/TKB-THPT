@extends('layouts.app')

@section('content')
    <div class="container">
      <h2>Chỉnh sửa</h2>
      <form method="post" >
        {{ csrf_field() }}
        <div class="form-group">
          <label>Mã môn học</label>
          <input class="form-control" name="subject_id" placeholder="Mã môn học" value="{{ old('subject_id', $subject->mamon) }}" style="{{ $errors->has('subject_id') ? 'border-color:red' : '' }}">
        </div>

        <div class="form-group">
          <label>Tên môn</label>
          <input class="form-control" name="name" placeholder="Tên môn" value="{{ old('name', $subject->tenmon) }}" style="{{ $errors->has('name') ? 'border-color:red' : '' }}">
        </div>

        <button type="submit" class="btn btn-default">Thêm</button>
      </form>
    </div>
@endsection
