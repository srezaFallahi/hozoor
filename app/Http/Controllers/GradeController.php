<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Http\Requests\GradeRequest;
use App\Manager;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GradeController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(GradeRequest $request)
    {
        $data = $request->all();
        $manager = Manager::find(Auth::user()->userable->userable_id);
        $manager->grade()->create($data);
        Session::flash('massage', 'مقطع ساخته شد.');
        return redirect('/grade/show');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grades = Manager::find(Auth::user()->userable->userable_id)->grade()->paginate(5);
        $num = 1;
        $role = Auth::user()->userable->userable_type;

        return view('admin.grade.index', compact('grades', 'num', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(GradeRequest $request, $id)
    {
        $grade = Grade::find($id);
        $grade->update($request->all());
        Session::flash('grade-update', 'مقطع ویرایش شد.');
        return redirect('/grade/show');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grade = Grade::find($id);
        $grade->delete();
        Session::flash('grade-delete', 'مقطع حذف  شد.');

        return redirect('/grade/show');

    }

    public function gradeClass(Request $request)
    {
        $id = $request->id;
        $grades = Grade::find($id);
        $class = $grades->room()->get();
        $manager = Manager::find(Auth::user()->userable->userable_id);
        $grades = $manager->grade()->get();
        $teachers = $manager->teacher()->get();
        $students = $manager->student()->get();
        $role = Auth::user()->userable->userable_type;
        $num = 1;
        return view('admin.class.index', compact('classes', 'grades', 'num', 'teachers', 'students', 'role'));
//        $num = 1;
//        return view('admin.class.index', compact('grades', 'num'));
    }
}
