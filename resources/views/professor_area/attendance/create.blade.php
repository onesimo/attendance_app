@extends('layouts.professor_area')

@section('content')


{!! Form::open(['method'=>'POST', 'action'=>'AttendanceController@store']) !!}
Add Attendance
<hr>
<div class="row">
	<div class="col">Date:<input type="text" name="attendance_date"></div>
</div>
<table class="table">
	<tr>
	<th>Id</th>
	<th>Student</th>
	<th>1</th>
	<th>2</th>
	</tr>

	<tr>
		@if($grade->students)
			
			@foreach($grade->students as $students)
				<tr>
				<td>{{$students->id}}</td>
				<td width="300px">{{$students->name}}</td>
				<td><input type="checkbox" name="attendance_1[]" value="{{$students->id}}"></td>
				<td><input type="checkbox" name="attendance_2[]" value="{{$students->id}}"></td>
			@endforeach		
		@endif
	</tr>

</table>

<button class="btn btn-success">Submit</button>
{!! Form::close() !!}
@stop