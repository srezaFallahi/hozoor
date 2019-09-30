<?php

namespace App\Http\Controllers;

use App\Grade;
use App\Http\Requests\GradeRequest;
use App\Manager;
use App\Room;
use Illuminate\Http\Request;

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
        $manager = Manager::find(1);
        $manager->grade()->create($data);
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
        $grades = Grade::all()->where('manager_id', '=', 1);
        $num = 1;
        return view('grade.index', compact('grades', 'num'));
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
        return redirect('/grade/show');

    }

    public function gradeClass(Request $request)
    {
        $id = $request->id;
        $grades = Grade::find($id);
        $class = $grades->room()->get();
        $manager = Manager::find(1);
        $grades = $manager->grade()->get();
        $teachers = $manager->teacher()->get();
        $students = $manager->student()->get();
        $num = 1;
        return view('class.index', compact('classes', 'grades', 'num', 'teachers', 'students'));
        $num = 1;
        return view('class.index', compact('grades', 'num'));
    }
}