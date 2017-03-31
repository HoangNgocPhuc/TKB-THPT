@extends('layouts.app')

@section('content')
    <div class="container">
      <h2>Thêm môn</h2>
      <form method="post" >
        {{ csrf_field() }}
        <div class="form-group">
          <label>Tên môn</label>
          <select class="form-control" name="name_subject" placeholder="Chọn môn" id="name_subject" data-url={{ route('get_list_teacher') }}>
            <option></option>
            @foreach($arr_subject as $key => $value)
              <option value="{{ $value->mamon }}">{{ $value->tenmon }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group"> 
          <label>Giáo viên</label>
          <select class="form-control" name="name_teacher" id="html_list_teacher">
          </select>
        </div>

        <div class="form-group">
          <label>Số tiết trong tuần</label>
          <input class="form-control" name="number_lession" placeholder="Số tiết trong tuần" value="{{ old('number_lession') }}" style="{{ $errors->has('number_lession') ? 'border-color:red' : '' }}">
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
@endsection

