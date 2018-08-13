@extends('layouts.admin')

@section('content')
	 

<p class="h3 text-muted">Edit Professor</p>
 <div class="col-sm-5">
		{!! Form::model($grade, ['method'=>'PUT', 'action' => ['AdminGradeController@update', $grade->id]]) !!}
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
		  '=>'Choose Professor') + $professors,null,['class'=>'form-control']) !!}
		  
	 	</div>  
	 
	
	 <div class="form-group"> 
	  {!! Form::submit('Submit',['class' => 'btn btn-primary']) !!} 
	 </div>
	{!! Form::close() !!}
	@include('errors.errors_form')
	<hr>
</div>
@stop