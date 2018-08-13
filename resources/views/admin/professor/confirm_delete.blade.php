@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col">
			<h4>Are you sure you want to delete Professor "{{$professor->name}}"?</h4>
		</div> 
		<div class="form-group col-sm-3">
			<a href="{{route('admin.professor.index')}}"><button class='btn btn-delete'>Voltar</button></a>
	 	</div>
	 	<div class="form-group">
	 		{!! Form::open(['method' => 'DELETE', 'action' => ['AdminProfessorController@destroy', $professor->id]]) !!}

			{!! Form::submit('Submit',['class'=>'btb btn-danger']) !!}
	 		
	 		{!! Form::close() !!}
		</div>
	</div>
</div>
@stop