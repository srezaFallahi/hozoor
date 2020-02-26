<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Http\Requests\StudentRequest;
use App\Manager;
use App\Role;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
        $grades = Grade::all()->where('manager_id', '=', Auth::user()->userable->userable_id);
        $role = Auth::user()->userable->userable_type;

        return view('admin.student.add', compact('grades', 'role'));
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
        $manager = Manager::find(Auth::user()->userable->userable_id);
        $user['password'] = Hash::make($request['password']);

        $user = User::create($user);
        $role = Role::find(4);
        $user->roles()->save($role);
        $manager->student()->create($student)->users()->save($user);

        Session::flash('massage', 'دانش آموز ساخته شد:)');
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
        $manager = Manager::find(Auth::user()->userable->userable_id);
        $students = $manager->student()->get();
        $num = 1;
//        $role = Auth::user()->userable->userable_type;
//        return '1';
        return view('admin.student.index', compact('students', 'num', 'id'));

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
        $grades = Grade::all()->where('manager_id', '=', Auth::user()->userable->userable_id);
        $role = Auth::user()->userable->userable_type;
        return view('admin.student.edit', compact('student', 'grades', 'role'));
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
//        $student = Student::find($id);
//        $id = $student->manager_id;
//        $data['password'] = Hash::make($request['password']);
//        foreach ($student->users as $user) {
//            $user->update($data);
//        }
//        $student->update($request->all());
        Session::flash('massage', 'دانش آموز ویرایش نشد ارور داره بعدا ویرایشش باز میشهئ:)');
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
        Session::flash('massage', 'دانش آموز حذف شد');
        return redirect()->back();
    }

}
