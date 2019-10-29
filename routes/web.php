<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\ManagerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.index');
});

Route::resource('/manager', 'ManagerController');
Route::get('/admin', function () {
    return view('layouts.admin');
});
Route::resource('/teacher', 'TeacherController');
Route::resource('/student', 'StudentController');
Route::resource('/grade', 'GradeController');
Route::resource('/class', 'RoomController');
Route::resource('/manager', 'ManagerController');
Route::post('/class/add', 'RoomController@addStudent')->name('add-student');
Route::post('/class/showStudent', 'RoomController@showClassStudent')->name('show-student');
Route::post('/class/grade-class', 'RoomController@gradeClass')->name('grade-class');
Route::post('/class/teacher-class', 'RoomController@teacherClass')->name('teacher-class');
Route::resource('/attendance', 'AttendanceController');
Route::post('/attendance/{id}', 'AttendanceController@multiAdd')->name('doAttendance');
Route::post('/showAttendance/{student_id}', 'AttendanceController@showStudentAttendance')->name('oneStudentAttendance');

Route::get('/home', 'HomeController@index')->name('home');


