 @extends('layouts.professor_area')

@section('content')


{!! Form::open(['method'=>'POST', 'action'=>'AttendanceController@store']) !!}

<hr> Add Attendance  
	
	<div class="row justify-content-center">
		<div class="col-3"> 
			Date:{!! Form::date('attendance_date', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
			<input type="hidden" name="grade_id" value="{{$grade->id}}">
		</div>
	</div>
<table class="table">
	<thead>
		<tr>
		<th>Id</th>
		<th>Student</th>
		<th>1º<br><input type="checkbox" id="options" "></th>
		<th>2°<br><input type="checkbox" id="options2" "></th>
		</tr>
	</thead>
	<tr>
		@if($grade->students)
			
			@foreach($grade->students as $students)
				<tr>
				<td width="20px">{{$students->id}}</td>
				<td width="300px">{{$students->name}}</td>
				<td width="20px">
					<input  class="checkBoxes" type="checkbox" name="attendance_1[]"value="{{$students->id}}"> 
				</td>
				<td width="20px">
					<input  class="checkBoxes2" type="checkbox" name="attendance_2[]"value="{{$students->id}}"> 
				</td>
			@endforeach		
		@endif
	</tr>

</table>
	<div class="content">
		<div class="row justify-content-center">
		<div class="col-5"></div>
		<div class="col-1 justify-content-center">
			<a href="{{route('professor.attendance.index',$grade->id)}}">
				<input type='button' class="btn btn-info" value='Back'>
			</a>
		</div>
		<div class="col-1 justify-content-center">
			<button class="btn btn-success">Submit</button>
		</div>
		<div class="col-5"></div>
		</div>
	</div>
 
{!! Form::close() !!}
<hr>
@include('errors.errors_form')
@stop

@section('scripts')
<script>
	$(document).ready(function(){

		 $('#options').click(function(){

		 	if(this.checked){
			 	 $('.checkBoxes').each(function(){
			 	 	this.checked = true;
			 	 });
		 	}else{
		 		$('.checkBoxes').each(function(){
			 	 	this.checked = false;
			 	 });
		 	}
		 });

		  $('#options2').click(function(){

		 	if(this.checked){
			 	 $('.checkBoxes2').each(function(){
			 	 	this.checked = true;
			 	 });
		 	}else{
		 		$('.checkBoxes2').each(function(){
			 	 	this.checked = false;
			 	 });
		 	}
		 });
	});

</script>

@stop