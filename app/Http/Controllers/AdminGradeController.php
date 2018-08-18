<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Grade;
use App\User;

class AdminGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $grades = Grade::paginate(6);
        
        return view('admin.grade.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $professors = User::whereStatus(1)->whereTypeId(2)->pluck('name','id')->all();
        return view('admin.grade.create',compact('professors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $request->validate([
            'name' => 'required',
            'start_time' => 'required|date_format:H:i',
            'finish_time' => 'required|date_format:H:i',

        ]);

        Grade::create($request->all());
        return redirect(route('admin.grade.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grade = Grade::findOrfail($id);   
        return view('admin.grade.confirm_delete',compact('grade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grade = Grade::findOrFail($id); 
        $professors = User::whereStatus(1)->whereTypeId(2)->pluck('name','id')->all();
        return view('admin.grade.edit',compact('grade','professors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $grade = Grade::findOrFail($id);
        $grade->update($request->all());
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grade = Grade::findOrFail($id)->delete();
        return $this->index();
    }

    public function addStudent($id)
    {   
        $grade = Grade::findOrFail($id);

        return view('admin.grade.add_student',compact('grade'));
    }

    public function storeStudentInGrade(Request $request)
    {   

        $request->validate([
            'grade_id'  => 'required|unique:grade_user,grade_id,NULL, NULL,user_id,' . $request->student_id,
            'student_id' => 'required|unique:grade_user,user_id,NULL, NULL,grade_id,' . $request->grade_id,
        ]);

        $grade = Grade::findOrFail($request->grade_id);

        $grade->students()->attach($request->student_id);

        Session::flash('msg_grade_student', 'The student has been added');

        return redirect(route('admin.grade.add.student',$request->grade_id));
        
    }

    public function searchStudent(Request $request)
    {   

        $request->validate([
            'filter' => 'required'
        ]);

        $grade = Grade::findOrFail($request->grade_id);

        if($request->search_type == 'name'){
            $students = User::where('name', 'LIKE', '%'.$request->filter.'%')->get();
        }else{
            $students = User::whereId($request->filter)->get();
        } 
 
        return redirect()->back()->with(compact('students',$students));
    }


    public function removeStudent(Request $request)
    {   

        Session::flash('msg_grade_student', 'The student has been removed');

        $user = User::findOrFail($request->student_id);

        $user->grades()->detach($request->grade_id);

        return redirect(route('admin.grade.add.student',$request->grade_id));
    }
}
