 @extends('layouts.admin')
<!-- Page Content -->

@section('content') 
 	<p class="h3 text-muted">All Classes</p>
  
  
	<table class="table">
		<th>Class name</th>
		<th>Start time</th>
		<th>Finish time</th>
		<th>Professor</th>
		<th>Manager</th>
		<th>Update</th>
		<th>Delete</th>
		@foreach($grades as $grade)
			<tr>
				<td>{{$grade->name}}</td>
				<td>{{$grade->start_time}}</td>
				<td>{{$grade->finish_time}}</td>
				<td>{{$grade->professor->name}}</td>
				<td><a href="{{route('admin.grade.add.student',$grade->id)}}"><button class="btn btn-success">Manager</button></a></td>
				<td><a href="{{route('admin.grade.edit',$grade->id)}}"><button class="btn btn-update">Update</button></a></td>
				<td><button class="btn btn-danger">Delete</button></td>
			</tr>
		@endforeach
	</table>

	<div class="row">
		<div class="col-sm-m6 col-sm-offset-5">
			{{$grades->links()}}
		</div>
	</div>
 
 
@stop