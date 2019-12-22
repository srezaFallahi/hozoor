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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.index');
})->name('index');
Route::group(['middleware' => 'manager'], function () {

    Route::resource('/manager', 'ManagerController');
    Route::resource('/teacher', 'TeacherController');
    Route::resource('/grade', 'GradeController');
    Route::resource('/manager', 'ManagerController');
    Route::get('/class/chart/{grade_id}', 'RoomController@gradeChart')->name('gradeChart');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/er', function () {
    return "loginError";
//    return Auth::user()->userable->userable_type;
});
Route::group(['middleware' => 'teacher'], function () {

    Route::get('/teacherAdmin', function () {
        return view('layouts.teacherAdmin');

    })->name('teacherAdmin');
});

Route::resource('/student', 'StudentController')->middleware('teacherManager');
Route::resource('/attendance', 'AttendanceController')->middleware('teacherManager');
Route::resource('/class', 'RoomController')->middleware('teacherManager');
Route::get('/admin', function () {
    return view('layouts.admin');
})->middleware('manager');;
Route::post('/class/add', 'RoomController@addStudent')->name('add-student')->middleware('teacherManager');
Route::post('/class/showStudent', 'RoomController@showClassStudent')->name('show-student')->middleware('teacherManager');
Route::post('/showAttendance/{student_id}', 'AttendanceController@showStudentAttendance')->name('oneStudentAttendance')->middleware('teacherManager');
Route::post('/showAttendance/{student_id}', 'AttendanceController@showStudentAttendance')->name('oneStudentAttendance')->middleware('teacherManager');
Route::get('/class/dayChart/{id}', 'RoomController@showAllAttendanceChart')->name('dayChart')->middleware('teacherManager');
Route::post('/attendance/{id}', 'AttendanceController@multiAdd')->name('doAttendance')->middleware('teacherManager');
Route::post('/class/grade-class', 'RoomController@gradeClass')->name('grade-class')->middleware('teacherManager');
Route::post('/class/teacher-class', 'RoomController@teacherClass')->name('teacher-class')->middleware('teacherManager');
Route::get('/class/dayIndex/{id}', 'RoomController@viewDayChartIndex')->name('dayIndex');


//Route::view('/home', 'home')->middleware('auth');
//Route::view('/admin', 'layouts.admin');
//Route::view('/writer', 'writer');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
