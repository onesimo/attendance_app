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
                            ->orderBy('attendance_date','desc') 
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

        /*Validation*/
        if(!isset($request->attendance_1) && !isset($request->attendance_2)) {
            return back()->withErrors('No data selected');
        }
        $request->validate(['attendance_date' => 'required']);

        $attendances = Attendance::whereGradeId($request->grade_id)
                            ->whereAttendanceDate($request->attendance_date)
                            ->delete();

        /*Insert first interval*/                    
        $sync_data = [];
        if(isset($request->attendance_1)){
            for($i = 0; $i < count($request->attendance_1); $i++)
                $sync_data[$request->attendance_1[$i]] = [
                    'attendance_date' => $request->attendance_date, 
                    'interval' =>1
                ];

            $grade->attendances()->attach($sync_data);
        }

        /*Insert second interval*/     
        $sync_data = [];
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
                            ->join('grades','grades.id','=','attendances.grade_id')
                            ->select('users.id','users.name','attendance_date','grades.name as grade','grades.id as grade_id',
                                DB::raw("(select distinct `interval` from attendances where attendance_date = '".$request->attendance_date."' and grade_id = ".$request->grade_id." and `interval` = 1 and user_id = users.id ) as interval1"),
                                DB::raw("(select distinct `interval` from attendances where attendance_date = '".$request->attendance_date."' and grade_id = ".$request->grade_id." and `interval` = 2 and user_id = users.id) as interval2")
                            )
                            ->where('attendance_date','=',$request->attendance_date)
                            ->where('grade_id','=',$request->grade_id)

                            ->groupBy('users.name','users.id','attendance_date','grades.name','grades.id')
                            ->get();
        
        $info_data['date'] = $attendances[0]->attendance_date;
        $info_data['grade_name'] = $attendances[0]->grade;
        $info_data['grade_id'] = $attendances[0]->grade_id;
 
 
        return view('professor_area.attendance.edit',compact('attendances','info_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_grade)
    {   
        $grade = Grade::findOrFail($request->grade_id);

        /*Validation*/
        if(!isset($request->attendance_1) && !isset($request->attendance_2)) {
            return back()->withErrors('No data selected');
        }
        $request->validate(['attendance_date' => 'required']);

        $attendances = Attendance::whereGradeId($request->grade_id)
                            ->whereAttendanceDate($request->attendance_date)
                            ->delete();

        /*Insert first interval*/                    
        $sync_data = [];
        if(isset($request->attendance_1)){
            for($i = 0; $i < count($request->attendance_1); $i++)
                $sync_data[$request->attendance_1[$i]] = [
                    'attendance_date' => $request->attendance_date, 
                    'interval' =>1
                ];

            $grade->attendances()->attach($sync_data);
        }

        /*Insert second interval*/     
        $sync_data = [];
        if(isset($request->attendance_2)){
            for($i = 0; $i < count($request->attendance_2); $i++)
                $sync_data[$request->attendance_2[$i]] = [
                    'attendance_date' => $request->attendance_date, 
                    'interval' =>2
                ];

            $grade->attendances()->attach($sync_data);
        }

        return redirect()->back()->with('message','Data updated');

        //return redirect("professor/attendance/$request->grade_id/index");
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
