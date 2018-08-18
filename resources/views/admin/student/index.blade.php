@extends('layouts.admin')

@section('content')
 
<p class="h3 text-muted">All students</p>
  
  
	<table class="table">
		<th>Name</th>
		<th>Email</th>  
		<th></th>
		<th></th>

		@foreach($students as $student)
			<tr>
				<td>{{$student->name}}</td>
				<td>{{$student->email}}</td> 
				<td><a href="{{route('admin.student.edit',$student->id)}}"><button class="btn btn-update">update</button></a></td>
				<td><a href="{{route('admin.student.show',$student->id)}}"><button class="btn btn-danger">delete</button
			</tr>
		@endforeach
	</table>

	<div class="row">
		<div class="col-sm-m6 col-sm-offset-5">
			{{$students->links()}}
		</div>
	</div>
@stop