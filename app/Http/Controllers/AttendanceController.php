<?php

namespace App\Http\Controllers;

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
        return view('professor_area.attendance.index',compact('grade'));
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

        $request->validate([ 
                    'attendance_date' => 'required'                
        ]);
        

        if(isset($request->attendance_1)){
            foreach ($request->attendance_1 as $attendance1){

                $request->validate([
                    'grade_id'  => 'required|unique:attendances,grade_id,NULL, NULL,attendance_date,' . $attendance1,
                    'attendance_date' => 'required|unique:attendances,attendance_date,NULL, NULL,grade_id,' . $request->attendance_date,
                
                ]);

                $user = User::findOrFail($attendance1);
                $grade->attendances()->save($user,[
                    'attendance_date' => $request->attendance_date, 
                    'interval' => 1
                ]);    
            }
        }

        if(isset($request->attendance_2)){ 
            foreach ($request->attendance_2 as $attendance2){
                
                $request->validate([
                    'grade_id'  => 'required|unique:attendances,grade_id,NULL, NULL,attendance_date,' . $attendance2,
                    'attendance_date' => 'required|unique:attendances,attendance_date,NULL, NULL,grade_id,' . $request->attendance_date,
                
                ]);

                $user = User::findOrFail($attendance2);
                $grade->attendances()->save($user,[
                    'attendance_date' => $request->attendance_date, 
                    'interval' => 2
                ]);    
            }
        }


        return $request->all();
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
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
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
