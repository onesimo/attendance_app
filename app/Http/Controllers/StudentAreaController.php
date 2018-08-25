<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Grade;

class StudentAreaController extends Controller
{
    public function index()
    {	
    	$user = Auth::user();

    	$grade = Grade::findOrFail(1);
 		
 		return $user->grades->id;
 
    	$data = $grade::whereHas('attendances', function($query){
    		$query->where('interval','=',1)->get();
    	});

    	return $data;

    	return view('student_area.index', compact('user'));
    } 
}
