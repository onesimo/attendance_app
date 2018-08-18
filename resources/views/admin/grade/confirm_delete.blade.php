@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col">
			<h4>Are you sure you want to delete Class "{{$grade->name}}"?</h4>
		</div> 
		<div class="form-group col-sm-3">
			<a href="{{route('admin.grade.index')}}"><button class='btn btn-delete'>Cancel</button></a>
	 	</div>
	 	<div class="form-group">
	 		{!! Form::open(['method' => 'DELETE', 'action' => ['AdminGradeController@destroy', $grade->id]]) !!}

			{!! Form::submit('Submit',['class'=>'btb btn-danger']) !!}
	 		
	 		{!! Form::close() !!}
		</div>
	</div>
</div>
@stop