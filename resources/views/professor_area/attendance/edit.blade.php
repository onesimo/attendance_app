@extends('layouts.professor_area')

@section('content')
	

<table class="table">
		
@if(isset($attendances))
	
	<tr>
		<th>Student</th>
		<th>1 inter</th>
		<th>2 Inter</th>
		
	@foreach($attendances as $attendance)
		<tr>
			<td>{{$attendance->name}}
			<td> <input type="checkbox" name="interval1">
			<td> <input type="checkbox" name="interval2">
	@endforeach

@endif
	
</table>
@stop