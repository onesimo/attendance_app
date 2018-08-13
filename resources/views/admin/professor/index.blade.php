@extends('layouts.admin')

@section('content')
 
<p class="h3 text-muted">All Professors</p>
  
  
	<table class="table">
		<th>Name</th>
		<th>Email</th>  
		<th></th>
		<th></th>

		@foreach($professors as $professor)
			<tr>
				<td>{{$professor->name}}</td>
				<td>{{$professor->email}}</td> 
				<td><a href="{{route('admin.professor.edit',$professor->id)}}"><button class="btn btn-update">update</button></a></td>
				<td><a href="{{route('admin.professor.show',$professor->id)}}"><button class="btn btn-danger">delete</button></a></td>
			</tr>
		@endforeach
	</table>

	<div class="row">
		<div class="col-sm-m6 col-sm-offset-5">
			{{$professors->links()}}
		</div>
	</div>
@stop