
<!DOCTYPE html>
<html>
<head>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<title></title>
</head>
<body>

<h1>Classes</h1>
<h1></h1>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>
<h2>Create Class</h2>
 
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

		  {!! Form::label('professor_id','Category:') !!}
		  {!! Form::select('professor_id',array('
		  '=>'Choose Categories','1'=>'Jhon','2'=>'Maria'),null,['class'=>'form-control']) !!}
		  
	 	</div>  
	 
	
	 <div class="form-group"> 
	  {!! Form::submit('Submit',['class' => 'btn btn-primary']) !!} 
	 </div>
	{!! Form::close() !!}

	<hr>

	<table class="table">
		<th>Class name</th>
		<th>Start time</th>
		<th>Finish time</th>
		<th>Professor</th>

		@foreach($grades as $grade)
			<tr>
				<td>{{$grade->name}}</td>
				<td>{{$grade->start_time}}</td>
				<td>{{$grade->finish_time}}</td>
				<td>{{$grade->professor_id}}</td>
			</tr>
		@endforeach
	</table>	 
 
</div>
</body>
</html>