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
			<td>
			<td>
	@endforeach

@endif
	
</table>
@stop