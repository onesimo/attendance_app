<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StudentAreaController extends Controller
{
    public function index()
    {	
    	$user = Auth::user();
    	return view('student_area.index', compact('user'));
    } 
}
