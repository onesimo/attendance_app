<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Grade;
use Carbon\Carbon;


class StudentAreaController extends Controller
{
    public function index()
    {	
    	$user = Auth::user();

       	 $start_date = \Carbon\Carbon::parse($user->start_date);

       	//return \Carbon\Carbon::now()->format('Y-m-d'). '  '.$start_date;

    	return $start_date->diffInDays(\Carbon\Carbon::now()->format('Y-m-d'));
    	$grade = Grade::findOrFail(1);

 		$attendances_count = DB::table('attendances') 
 					->where('user_id','=', $user->id) 
 					->whereBetween('interval',[1,2]) 
 					->groupBy('user_id')
 					->count();

 		$abstences_count = DB::table('attendances') 
 					->where('user_id','=', $user->id) 
 					->whereBetween('interval',[3,4]) 
 					->groupBy('user_id')
 					->count();
 
   

    	return view('student_area.index', compact('user','attendances_count','abstences_count'));
    } 
}
