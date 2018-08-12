 @extends('layouts.admin')
<!-- Page Content -->

@section('content') 
 	<p class="h3 text-muted">All Classes</p>
  
  
	<table class="table">
		<th>Class name</th>
		<th>Start time</th>
		<th>Finish time</th>
		<th>Professor</th>
		<th></th>
		<th></th>

		@foreach($grades as $grade)
			<tr>
				<td>{{$grade->name}}</td>
				<td>{{$grade->start_time}}</td>
				<td>{{$grade->finish_time}}</td>
				<td>{{$grade->professor_id}}</td>
				<td><button class="btn btn-update">update</button></td>
				<td><button class="btn btn-danger">delete</button></td>
			</tr>
		@endforeach
	</table>

	<div class="row">
		<div class="col-sm-m6 col-sm-offset-5">
			{{$grades->links()}}
		</div>
	</div>
 
 
@stop