<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Http\Controllers\AttendanceController;
use App\Day;
use App\Grade;
use App\Http\Requests\RoomEditRequest;
use App\Http\Requests\RoomRequest;
use App\Manager;
use App\Room;
use App\Student;
use App\Teacher;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RoomController extends Controller
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
    public function store(RoomRequest $request)
    {
        $data = $request->all();
        $days = Day::find($request->daysArray);
        $manager = Manager::find(1);
        $room = $manager->room()->create($data);
        foreach ($days as $day) {
            $room->days()->save($day);
        }
        return redirect('/class/show');
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
        $grades = $manager->grade()->get();
        $classes = $manager->room()->get();
        $teachers = $manager->teacher()->get();
        $students = $manager->student()->get();
        $classes = $this->getPercent($classes);
        $tomorrow = \verta()->dayOfWeek;

//        return $tomorrow;
        $classes = $this->checkDay1($classes, $tomorrow);
        $role = Auth::user()->userable->userable_type;

//        return $classes;
        $num = 1;
        return view('admin.class.index', compact('classes', 'grades', 'num', 'teachers', 'students', 'role'));

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
    public function update(RoomEditRequest $request, $id)
    {
        $data = $request->all();
        $class = Room::find($id);
        $class->update($data);
        return redirect('/class/show');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = Room::find($id);
        $class->delete();
        return redirect('/class/show');
    }

    public function addStudent(Request $request)
    {
        $studentId = $request->student_id;
        $roomId = $request->room_id;
        $student = Student::find($studentId);
        $room = Room::find($roomId);
        $room->students()->save($student);
        return redirect('/class/show');

    }

    public function showClassStudent(Request $request)
    {
        $class_id = $request->room_id;
        $class = Room::find($class_id);
        $students = $class->students()->get();
        $num = 1;
        return view('admin.student.index', compact('students', 'num', 'class'));
    }

    public function gradeClass(Request $request)
    {
        $manager = Manager::find(1);
        $id = $request->grade_id;
        $grade = $manager->grade()->where('id', '=', $id)->first();
        $classes = $grade->room()->get();
        $students = $grade->student()->get();
        $teachers = $manager->teacher()->get();
        $num = 1;
//        return $grade;
        return view('admin.class.grade-index', compact('classes', 'grade', 'num', 'students', 'teachers'));
    }

    public function teacherClass(Request $request)
    {
        $id = $request->teacher_id;
        $manager = Manager::find(1);
        $teacher = $manager->teacher()->where('id', '=', $id)->first();
        $classes = $teacher->rooms()->get();
        $students = $manager->student()->get();
        $grades = $manager->grade()->get();
        $num = 1;
        return view('admin.class.teacher-class', compact('classes', 'grades', 'num', 'students', 'teacher'));
    }

    public function getPercent($classes)
    {

        foreach ($classes as $class) {
            $class['percent'] = $this->classAttendancesPercent($class->id);
        }
        return $classes;
    }

    public static function classAttendancesPercent($class_id)
    {
        $manager = Manager::find(1);
        $attendances = count($manager->attendance()->get()->where('room_id', '=', $class_id));
        $presents = count($manager->attendance()->get()->where('room_id', '=', $class_id)->where('attendance', '=', 1));
        if ($attendances != 0) {
            $percent = ($presents / $attendances) * 100;
            $percent = round($percent, 2);
        } else $percent = 0;
        return $percent;

    }

    public function getAverage($classes)
    {
        $average = 0;
        foreach ($classes as $class) {
            $average = $average + $class->percent;
        }
        $num = count($classes);
        $average = $average / $num;
        return $average;

    }

    public function gradeChart($grade_id)
    {
        $grade = Grade::find($grade_id);
        $classes = $grade->room()->get();
        $classes = $this->getPercent($classes);
        $average = $this->getAverage($classes);

        return view('admin.attendance.class-attendance-chart', compact('classes', 'average'));
    }

    public function dayChart($class_id)
    {
        $manger = Manager::find(1);
        $class = Room::find($class_id);
        $numStudent = count($class->students()->get());
        $dates = $manger->attendance()->select('date')->where('class_id', '=', $class_id)->distinct('date')->get();
        $attendances = $manger->attendance()->where('class_id', '=', $class_id);
        $dates = $this->getPercentOfDay($dates, $attendances, $numStudent);
        return view('admin.attendance.day-chart', compact('dates'));
    }

    public function getPercentOfDay($dates, $attendances, $studentNum)
    {
        foreach ($dates as $date) {
            $n = 0;

            foreach ($attendances as $attendance) {
                if ($attendance->date == $date && $attendance->attendance == 1) {
                    $n++;
                }

            }
            $percent = ($n / $studentNum) * 100;
            $percent = round($percent, 2);
            $date['percent'] = $percent;

        }


        return $dates;
    }

    public function checkDay1($classes, $tomorrow)
    {
        foreach ($classes as $class) {
            $temp = 0;
            foreach ($class->days()->get() as $day) {
                if ($day->num_of_day == $tomorrow . '') {
                    $temp = 1;
                    break;
                }

            }
            if ($temp == 1) {
                $class['day1'] = 1 . '';
            } else
                $class['day1'] = 0 . '';


        }

        return $classes;


    }

    public function showAllAttendanceChart($id)
    {
        $manager = Manager::find(1);
        $class = $manager->room()->where('id', '=', $id)->first();
        $dates = $class->attendance()->distinct()->get('date');
        $attendances = $class->attendance()->get();
        $classStudentNum = count($attendances) / count($dates);
        foreach ($dates as $date) {
            $temp = 0;

            foreach ($attendances as $attendance) {
                if ($attendance->date == $date->date) {
                    if ($attendance->attendance == 1) {
                        $temp++;
                    }
                }
            }
            $percent = ($temp / $classStudentNum) * 100;

            $date['percent'] = $percent;
        }
        foreach ($dates as $date) {
            $d = Carbon::create($date->date);
            $date['date'] = $d->subDays(31);
            $date['date'] = date('Y,m,d', strtotime($date->date));
        }
//        return $dates;
//        return count($dates);
        return view('admin.attendance.day-chart', compact('dates'));
    }

    public function viewDayChartIndex()
    {
//        return 1;
        $manager = Manager::find(1);
        $classes = $manager->room()->get();
        return view('admin.class.charts-Index', compact('classes'));
    }


//    public function showAllAttendanceChart($id)
//    {
//
//        $dates = $this->getPercentEverySection($id);
//        return $dates;
//    }

}
