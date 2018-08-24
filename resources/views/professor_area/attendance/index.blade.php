@extends('layouts.professor_area')

@section('content')


<h4>Attendance - {{$grade->name}} 
<a href="{{route('professor.attendance.show',$grade->id)}}"><button type="button" class="btn btn-success btn-sm">Add Attendance</button></a></h4>

</p>

<table class="table">
	<thead>
		<tr>
		<th>Date</th>
		<th>Class</th>
		<th></th>
		<th></th>
		</tr>
	</thead>
	<tr>
		@if($attendances)
			
			@foreach($attendances as $attendace)
				<tr>
				<td width="20px">{{ Carbon\Carbon::parse($attendace->attendance_date)->format('d/m/Y') }}</td>
				<td width="300px">{{$attendace->name}}</td>
				<td width="20px">
					 
				</td>
				<td width="20px">
					{!! Form::open(['method'=>'GET', 'action'=>['AttendanceController@edit',$attendace->id]]) !!}
						<input type="hidden" name="attendance_date" value="{{$attendace->attendance_date}}">
						<input type="hidden" name="grade_id" value="{{$attendace->id}}">
						<button class="btn btn-info">Edit</button>
					{!! Form::close() !!}
					
				</td>
			@endforeach		
		@endif
	</tr>

</table>

<div class="row justify-content-center">
	<div class="col-">
		{{$attendances->links()}}
	</div>

</div>
@stop