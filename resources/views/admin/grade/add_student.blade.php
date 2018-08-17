@extends('layouts.admin')

@section('content')
	

	
	<div class="row">
		<p class="h4">Add students - {{$grade->name}}</p> 
	</div>
	<div class="row">
		<div class="col">Professor: {{$grade->professor->name}} </div>
	</div>
	<hr>
	{!! Form::open([ 'method'=>'POST', 'action'=>'AdminGradeController@searchStudent']) !!}
	{!! Form::label('search_type','Search by:') !!}
	@csrf
	<div class="row">
	<div class="col-sm-2" >
	
	 	<input type="hidden" name="grade_id" value="{{$grade->id}}">
	 	<div class="form-group">
	 	
		  {!! Form::select('search_type',array('name
		  '=>'name', 'id'=>'id'),null,['class'=>'form-control']) !!}
		 </div>
	</div>
	<div class="col-sm-4" >
		 <div class="form-group"> 
		  {!! Form::text('filter',null,['class'=>'form-control']) !!}
		 </div>
	</div>
	<div class="col-sm-2" >
		@if(!isset($students))
		  <div class="form-group">  
		  {!! Form::submit('Search',['class' => 'btn btn-info']) !!} 
		  {!! Form::close() !!}
		  </div> 
		@else
		{!! Form::close() !!}

			<a href="{{route('admin.grade.add.student',$grade->id)}}"><button  type='button' class="btn btn-warning">Reset</button></a>
		@endif
	 
	 </div> 
	</div>
	@include('errors.errors_form')

	@if(Session::has('msg_grade_student'))
		<p class="bg-info">{{session('msg_grade_student')}}</p>
	@endif
	<hr>
	<table class="table">
		<tr>
			<th>Id</th>
			<th>Student</th>
			<th>Email</th>
			<th></th>
		</tr>
		 </div>
		@if(Session::has('students'))

			echo  
				@foreach(Session::get('students') as $student)
				<tr>
					<td> {{ $student['id'] }} </td>
					<td> {{ $student['name'] }} </td>
					<td> {{ $student['email'] }} </td>
					<td> 
					 		{!! Form::open(['method' => 'POST', 'action' => ['AdminGradeController@storeStudentInGrade']]) !!}
							<input type="hidden" name="student_id" value="{{$student['id']}}">
							<input type="hidden" name="grade_id" value="{{$grade->id}}">
							{!! Form::submit('Add',['class'=>'btb btn-success']) !!}
					 		{!! Form::close() !!}
				 
					</td>
				</tr> 
				@endforeach 
		@endif
		@if(isset($grade->students))

			@foreach($grade->students as $student)
			<tr>
				<td> {{ $student->id }} </td>
				<td> {{ $student->name }} </td>
				<td> {{ $student->email }} </td>
				<td>
					{!! Form::open(['method' => 'POST', 'action' => ['AdminGradeController@removeStudent']]) !!}
							<input type="hidden" name="student_id" value="{{$student->id}}">
							<input type="hidden" name="grade_id" value="{{$grade->id}}">
							{!! Form::submit('Remove',['class'=>'btb btn-danger']) !!}
					 		{!! Form::close() !!}</td>
			</tr> 
			@endforeach
		@endif
	
	</table>
	<div class="row">
		
	</div>
@stop

