@extends('layouts.professor_area')

@section('content')

<h3>Classes</h3>	

 <ul class="list-group list-group-flush"> 
 	@if($user->grades) 
		@foreach($user->professor as $grades)
			<a href="{{route('professor.attendance.index',$grades->id)}}"> <li class="list-group-item"> - {{$grades->name}}</li></a>
		@endforeach
	@else
		<p class="alert">No classed added</p>
  	@endif
</ul>

@stop