@extends('layouts.admin')
 
@section('content')
 <p class="h3 text-muted">Create Class</p>
 <div class="col-sm-5">
  		{!! Form::open(['method'=>'POST', 'action' => 'GradeController@store']) !!}

  		<div class="form-group">

		  {!! Form::label('name','Name:') !!}
		  {!! Form::text('name',null,['class'=>'form-control']) !!}
		  
		 </div>
		 <div class="form-group">

		  {!! Form::label('start_time','Start time:') !!}
		  {!! Form::text('start_time',null,['class'=>'form-control']) !!}
		  
		 </div>
		 <div class="form-group">

		  {!! Form::label('finish_time','Finish time:') !!}
		  {!! Form::text('finish_time',null,['class'=>'form-control']) !!}
		  
		 </div>
		 
		 <div class="form-group">

		  {!! Form::label('professor_id','Professor:') !!}
		  {!! Form::select('professor_id',array('
		  '=>'Choose Categories','1'=>'Jhon','2'=>'Maria'),null,['class'=>'form-control']) !!}
		  
	 	</div>  
	 
	
	 <div class="form-group"> 
	  {!! Form::submit('Submit',['class' => 'btn btn-primary']) !!} 
	 </div>
	{!! Form::close() !!}
	@include('errors.errors_form')
	<hr>
</div>
@stop