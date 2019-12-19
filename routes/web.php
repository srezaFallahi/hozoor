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

Route::get('/admin', function () {
    return view('layouts.admin');
});
Route::resource('/manager', 'ManagerController');
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
Route::post('/showAttendance/{student_id}', 'AttendanceController@showStudentAttendance')->name('oneStudentAttendance');
Route::get('/class/chart/{grade_id}', 'RoomController@gradeChart')->name('gradeChart');
Route::get('/class/dayChart/{id}', 'RoomController@showAllAttendanceChart')->name('dayChart');
//Route::get('/class/dayIndex/{id}', 'RoomController@viewDayChartIndex')->name('dayIndex');
Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/login/manager', 'Auth\LoginController@showManagerLoginForm');
Route::get('/login/writer', 'Auth\LoginController@showWriterLoginForm');
//Route::get('/register/manager', 'Auth\RegisterController@showAdminRegisterForm');
//Route::get('/register/writer', 'Auth\RegisterController@showWriterRegisterForm');

Route::post('/login/manager', 'Auth\LoginController@managerLogin');
Route::post('/login/teacher', 'Auth\LoginController@teacherLogin');
//Route::post('/register/manager', 'Auth\RegisterController@createAdmin');
//Route::post('/register/writer', 'Auth\RegisterController@createWriter');

Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'layouts.admin');
//Route::view('/writer', 'writer');


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
