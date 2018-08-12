@extends('layouts.admin')

@section('content')


<p class="h3 text-muted">Edit Professor</p>
 <div class="col-sm-5">
  		{!! Form::model($professor, ['method'=>'PUT', 'action' => ['AdminProfessorController@update',$professor->id]]) !!}
		<input type="hidden" name="type_id" value="2">
  		<div class="form-group">

		  {!! Form::label('name','Name:') !!}
		  {!! Form::text('name',null,['class'=>'form-control']) !!}
		  
		 </div>
		 <div class="form-group">

		  {!! Form::label('email','Email:') !!}
		  {!! Form::text('email',null,['class'=>'form-control']) !!}
		  
		 </div>
		 <div class="form-group">
 
		  {!! Form::label('password','Password:') !!} 
		  {!! Form::password('password',['class'=>'form-control']) !!}
		  
		 </div> 
		<div class="form-group"> 
		 {!! Form::label('password_confirmation','Confirm Password:') !!}
		 {!! Form::password('password_confirmation', ['class'=>'form-control']) !!} 
		</div>
	  
	 <div class="form-group"> 
	  {!! Form::submit('Submit',['class' => 'btn btn-primary']) !!} 
	 </div>
	{!! Form::close() !!}
	
	@include('errors.errors_form')
	<hr>
</div>
@stop 
 