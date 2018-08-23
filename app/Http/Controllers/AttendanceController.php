<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Attendance;
use Illuminate\Http\Request;
use App\Grade;
use App\User;
 

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    { 
        $grade = Grade::findOrFail($id);
        
         //$attendance = $grade->attendances->groupBy('attendance_date','grade_id','interval');
        $attendances = DB::table('attendances')
                            ->select('attendance_date','grades.name','grades.id')
                            ->distinct()
                            ->join('grades','attendances.grade_id','=','grades.id')
                            ->where('grades.id','=',$id)
                            ->orderBy('attendance_date') 
                            ->paginate(4);
         
        return view('professor_area.attendance.index',compact('grade','attendances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $grade = Grade::findOrFail($request->grade_id);
        $attendance = new Attendance;

        if(!isset($request->attendance_1) && !isset($request->attendance_5)) {
            return back()->withErrors('No data selected');
        }
 
        $request->validate(['attendance_date' => 'required']);
 
        /*Attendance from first interval */ 
        if(isset($request->attendance_1)){
            foreach ($request->attendance_1 as $user_id){
                $user = User::findOrFail($user_id);
                $return = $attendance->validateAttendance($request->grade_id, $user_id,$request->attendance_date,1);
                if(!$return){
                    return back()->withErrors('Attendance Student: '.$user->name.' has already been inserted on first inverval');

                }
             }
        }

        if(isset($request->attendance_1)){
            for($i = 0; $i < count($request->attendance_1); $i++)
                $sync_data[$request->attendance_1[$i]] = [
                    'attendance_date' => $request->attendance_date, 
                    'interval' =>1
                ];

            $grade->attendances()->attach($sync_data);
        }


        /*Attendance from second interval */
         if(isset($request->attendance_2)){
            foreach ($request->attendance_2 as $user_id){
                $user = User::findOrFail($user_id);
                $return = $attendance->validateAttendance($request->grade_id, $user_id,$request->attendance_date,2);
                if(!$return){
                    return back()->withErrors('Attendance Student: '.$user->name.' has already been inserted on second interval');

                }
             }
        }

        if(isset($request->attendance_2)){
            for($i = 0; $i < count($request->attendance_2); $i++)
                $sync_data[$request->attendance_2[$i]] = [
                    'attendance_date' => $request->attendance_date, 
                    'interval' =>2
                ];

            $grade->attendances()->attach($sync_data);
        }

        return redirect("professor/attendance/$request->grade_id/index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $grade = Grade::findOrFail($id);

        return view('professor_area.attendance.create', compact('grade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        
        $attendances = DB::table('attendances')
                            ->join('users','users.id','=','attendances.user_id')
                            ->select('users.name','users.id',
                                DB::raw("(select distinct `interval` from attendances as where grade_id = ".$request->grade_id." and `interval` = 1 and user_id = users.id) as interval1"),

                                DB::raw("(select distinct `interval` from attendances where grade_id = ".$request->grade_id." and `interval` = 2 and user_id = users.id) as interval2")
                            )
                            ->where('attendance_date','=',$request->attendance_date)
                            ->where('grade_id','=',$request->grade_id)
                            ->groupBy('users.name','users.id')
                            ->get();

    
    return $attendances;

        
       
        return view('professor_area.attendance.edit',compact('attendances'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
