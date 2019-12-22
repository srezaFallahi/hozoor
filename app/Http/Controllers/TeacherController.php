<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Manager;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Auth::user()->userable->userable_type;

        return view('admin.teacher-admin.add-teacher',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $request)
    {
        $data = $request->all();
        $manager = Manager::find(1);
        $id = $manager->id;
        $data['password'] = Hash::make($request['password']);
        $user = User::create($data);
        $userId = $user->id;
        $user = User::find($userId);
        $manager->teacher()->create()->users()->save($user);
        return redirect(route('teacher.show', compact('id')));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teachers = Manager::find(1)->teacher()->get();
        $num = 1;
        $role = Auth::user()->userable->userable_type;
        return view('admin.teacher-admin.index', compact('teachers', 'num', 'id', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacherTemp = Teacher::find($id);
        return view('admin.teacher-admin.edit', compact('teacherTemp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherRequest $request, $id)
    {
        $data = $request->all();
        $teacher = Teacher::find($id);
        $id = $teacher->manager_id;
        foreach ($teacher->users as $user) {
            $user->update($data);
        }
        return redirect(route('teacher.show', $id));

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        foreach ($teacher->users as $user) {
            $user->delete();
        }
        $teacher->delete();
        return redirect()->back();

    }

}
