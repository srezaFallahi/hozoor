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

use App\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Role;

Route::get('/', function () {
    return view('layouts.index');
})->name('index');


Route::resource('/teacher', 'TeacherController')->middleware('adminPage:teacher-controller');
Route::resource('/grade', 'GradeController')->middleware('adminPage:grade-controller');
Route::resource('/manager', 'ManagerController');
Route::get('/class/chart/{grade_id}', 'RoomController@gradeChart')->name('gradeChart')->middleware('adminPage:room-controller');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/er', function () {
    return "loginError";
});
//Route::get('/teacherAdmin', function () {
//    return view('layouts.teacherAdmin');
//})->name('teacherAdmin');


Route::resource('/student', 'StudentController')->middleware('adminPage:student-controller');
Route::resource('/attendance', 'AttendanceController')->middleware('adminPage:attendance-controller');
Route::resource('/class', 'RoomController')->middleware('adminPage:room-controller');
Route::post('/class/multiAddStudentShow', 'RoomController@showMultiAddStudentPage')->name('multiStudentAddShow')->middleware('adminPage:room-controller');
Route::post('/class/multiAddStudent', 'RoomController@addMultiStudent')->name('multiStudentAdd')->middleware('adminPage:room-controller');
Route::get('/admin', function () {
    return view('layouts.admin');
})->middleware('adminPage:student-controller');;
Route::post('/class/add', 'RoomController@addStudent')->name('add-student')->middleware('adminPage:room-controller');
Route::post('/class/showStudent', 'RoomController@showClassStudent')->name('show-student')->middleware('adminPage:room-controller');
Route::post('/showAttendance/{student_id}', 'AttendanceController@showStudentAttendance')->middleware('adminPage:attendance-controller');
Route::post('/showAttendance/{student_id}', 'AttendanceController@showStudentAttendance')->middleware('adminPage:attendance-controller');
Route::get('/class/Chart/{id}', 'RoomController@showAllAttendanceChart')->name('dayChart')->middleware('adminPage:room-controller');
Route::post('/attendance/{id}', 'AttendanceController@multiAdd')->name('doAttendance')->middleware('adminPage:attendance-controller');
Route::post('/class/grade-class', 'RoomController@gradeClass')->name('grade-class')->middleware('adminPage:room-controller');
Route::post('/class/teacher-class', 'RoomController@teacherClass')->name('teacher-class')->middleware('adminPage:room-controller');
Route::get('/class/dayIndex/{id}', 'RoomController@viewDayChartIndex')->name('dayIndex')->middleware('adminPage:room-controller');
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/test', 'RoomController@dayChart');
Route::get('/manager/show-all', 'AdminController@showAllManager')->middleware('admin-Page:Manager-controller')->name('show-all-manager');

