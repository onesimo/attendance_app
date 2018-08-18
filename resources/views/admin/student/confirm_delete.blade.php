@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col">
			<h4>Are you sure you want to delete Student "{{$student->name}}"?</h4>
		</div> 
		<div class="form-group col-sm-3">
			<a href="{{route('admin.student.index')}}"><button class='btn btn-delete'>Cancel</button></a>
	 	</div>
	 	<div class="form-group">
	 		{!! Form::open(['method' => 'DELETE', 'action' => ['AdminStudentController@destroy', $student->id]]) !!}

			{!! Form::submit('Submit',['class'=>'btb btn-danger']) !!}
	 		
	 		{!! Form::close() !!}
		</div>
	</div>
</div>
@stop