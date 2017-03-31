@foreach ($list_teacher as $key => $value)
	<option value="{{ $value->magv }}">{{ $value->tengv }}</option>
@endforeach