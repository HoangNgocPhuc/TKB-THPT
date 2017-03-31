@extends('layouts.app')

@section('content')
    <div class="container">
      <h2>Chỉnh sửa thông tin môn {{ $class_subject_teacher->subject->tenmon }} của lớp {{ $class_subject_teacher->classroom->tenlop }}</h2>
      <form method="post" >
        {{ csrf_field() }}
        <div class="form-group">
          <label>Tên môn</label>
          <input class="form-control" name="name_subject"  value="{{ $class_subject_teacher->subject->tenmon }}" disabled="">
        </div>

        <div class="form-group">
          <label>Giáo viên</label>
          <select class="form-control" name="teacher">
            @foreach ( $list_teacher as $key => $value)
                <option value="{{ $value->magv }}" {{ ( old('teacher') == $value->magv ) ? 'selected' : ( !old('class') && $class_subject_teacher->teacher->magv == $value->magv) ? 'selected' : '' }}>{{ $value->tengv }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Số tiết trong tuần</label>
          <input class="form-control" name="number_lession" placeholder="Số tiết trong tuần" value="{{ old('number_lession', $class_subject_teacher->sotiet) }}" style="{{ $errors->has('number_lession') ? 'border-color:red' : '' }}">
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
@endsection
