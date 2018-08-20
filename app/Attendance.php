<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Attendance extends Model
{
    public function validateAttendance($grade_id, $user_id, $attendace_date,$interval)
    {
    	$items = DB::select("SELECT count(*) as aggregate FROM attendances WHERE grade_id ='$grade_id' AND attendance_date='$attendace_date' AND user_id='$user_id' AND `interval` = '$interval'"); 
    	 
    	$number = $items[0]->aggregate;
		
		if ($number > 0) {

			return false;
		} else {
			return true;
		}                 
    }
}
