<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Room;
use App\Student;
use Carbon\Carbon;
use Cassandra\Date;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;

class AttendanceController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($class_id)
    {
        $class = Room::find($class_id);
        $students = $class->students()->get();
        $num = 1;
        $attendance = 1;
        return view('admin.attendance.index', compact('students', 'num', 'class', 'attendance'));
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function multiAdd(Request $request, $id)
    {


        $presents = Student::find($request->attendanceArray);
        $absents = Student::find($request->attendanceFalseArray);
        if ($presents) {
            foreach ($presents as $student) {
                $student->attendances()->create(['manager_id' => 1, 'attendance' => 1, 'date' => Carbon::now()->toDateString(), 'room_id' => $id]);
            }
        }
        if ($absents) {

            foreach ($absents as $student) {
                $student->attendances()->create(['manager_id' => 1, 'attendance' => 0, 'date' => now(), 'room_id' => $id]);
            }
        }
        return redirect()->back();

    }

    // show all  attendance of one student in chosen class
    public function showStudentAttendance(Request $request, $student_id)
    {
        $class_id = $request->class_id;

        $student = Student::find($student_id);
        $class = Room::find($class_id);
        $attendances = $student->attendances()->where('room_id', '=', $class_id)->get();
        $num = 1;
        $chartNum = 1;

        return view('admin.attendance.attendance-show', compact('student', 'attendances', 'class', 'num', 'chartNum'));
    }

    // show all  attendance of student in one class and in  Specific date

    public function showStudentAttendanceDate($student_id, $class_id, $date)
    {
        $student = Student::find($student_id);
        $num = 1;
        $attendances = $student->attendances()->where('room_id', '=', $class_id)->where('date', '=', $date)->get();
    }

    //get attendance of one class and Percentage


}
