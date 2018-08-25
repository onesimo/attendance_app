@extends('layouts.professor_area')

@section('content')
	
	
	<div class="row justify-content-start">
		<div class="col-5"> 
			Class: {{$info_data['grade_name']}} 
		</div> 
	</div>

	<div class="row justify-content-start"> 
		<div class="col-3"> 
			Date: {{\Carbon\Carbon::parse($info_data['date'])->format('d/m/Y')}}
			 
		</div>
	</div>
<hr>
@if(Session::has('message'))
	<div class="alert alert-success">{{ Session::get('message')}}</div>
@endif
<table class="table">
{!! Form::open(['method'=>'PUT', 'action'=>['AttendanceController@update', $info_data['grade_id']]]) !!}
<input type="hidden" name="attendance_date" value="{{$info_data['date']}}">
<input type="hidden" name="grade_id" value="{{$info_data['grade_id']}}">
@if(isset($attendances))
	<tr>
		<th>Student</th>
		<th>1 inter</th>
		<th>2 Inter</th>
		
	@foreach($attendances as $attendance)
		<tr>
			<td>{{$attendance->name}}
			<td>
			<input type="hidden" name="students_ids[]"value="{{$attendance->id}}"> 
			<input class="checkBoxes" type="checkbox" name="attendance_1[]" value="{{$attendance->id}}" {{($attendance->interval1) ? "checked" : "" }}>
			<td> <input class="checkBoxes" type="checkbox" name="attendance_2[]" value="{{$attendance->id}}"  {{($attendance->interval2) ? "checked" : "" }}>
	@endforeach

@endif
	
</table>

	<div class="content">
		<div class="row justify-content-center">
		<div class="col-5"></div>
		<div class="col-1 justify-content-center">
			<a href="{{route('professor.attendance.index',$info_data['grade_id']) }}">
				<input type='button' class="btn btn-info" value='Back'>
			</a>
		</div>
		<div class="col-1 justify-content-center">
			<button class="btn btn-success">Submit</button>
		</div>
		<div class="col-5"></div>
		</div>
	</div>
@stop