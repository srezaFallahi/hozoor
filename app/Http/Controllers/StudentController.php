<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Http\Requests\StudentRequest;
use App\Manager;
use App\Student;
use App\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grades = Grade::all()->where('manager_id', '=', 1);
        return view('admin.student.add', compact('grades'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {

        $user['first_name'] = $request->first_name;
        $user['last_name'] = $request->last_name;
        $user['code'] = $request->code;
        $student['grade_id'] = $request->grade_id;
        $student['dad_name'] = $request->dad_name;
        $student['birth_day'] = $request->birth_day;
        $student['entry_date'] = $request->entry_date;
        $manager = Manager::find(1);
        $user = User::create($user);
        $manager->student()->create($student)->users()->save($user);
        return redirect('/student/show');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manager = Manager::find(1);
        $students = $manager->student()->get();
        $num = 1;
        return view('admin.student.index', compact('students', 'num'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $grades = Grade::all()->where('manager_id', '=', 1);

        return view('admin.student.edit', compact('student', 'grades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update($request, $id)
    {
        $student = Student::find($id);
        $student->update($request->all());
        return redirect('/student/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->back();
    }
}
