@extends('layouts.professor_area')

@section('content')


{!! Form::open(['method'=>'POST', 'action'=>'AttendanceController@store']) !!}
Add Attendance
<hr>
<div class="row">

	<div class="col">Date:
		{!! Form::date('attendance_date', \Carbon\Carbon::now()) !!}
		<input type="hidden" name="grade_id" value="{{$grade->id}}">
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
				<td>{!! Form::checkbox('attendance_1[]', $students->id) !!}</td>
				<td>{!! Form::checkbox('attendance_2[]', $students->id) !!}</td>
			@endforeach		
		@endif
	</tr>

</table>

<button class="btn btn-success">Submit</button>
</div>
{!! Form::close() !!}

@include('errors.errors_form')
@stop