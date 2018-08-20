@extends('layouts.professor_area')

@section('content')


<h3>Attendance - {{$grade->name}}</h3>

<p><a href="{{route('professor.attendance.show',$grade->id)}}"><button type="button" class="btn btn-success btn-sm">Add Attendance</button></a>
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
					 <button class="btn btn-danger">Edit</button>
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