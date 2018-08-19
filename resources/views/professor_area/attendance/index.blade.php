@extends('layouts.professor_area')

@section('content')


<h3>Attendance - {{$grade->name}}</h3>

<p><a href="{{route('professor.attendance.show',$grade->id)}}"><button type="button" class="btn btn-success btn-sm">Add Attendance</button></a>
</p>


@stop