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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'admin'],function(){

	Route::get('class', 'ClassRoomController@index')->name('class');
	Route::get('class/add', 'ClassRoomController@add')->name('class.add');
	Route::post('class/add', 'ClassRoomController@store');
	Route::get('class/{id}', 'ClassRoomController@edit')->name('class.edit');
	Route::post('class/{id}', 'ClassRoomController@update');
	Route::get('class/delete/{id}', 'ClassRoomController@delete')->name('class.delete');
	Route::get('class/{id}/generaltimetable', 'ClassRoomController@generalTimeTable')->name('class.generalTimeTable');
	Route::get('class/{id}/generaltimetable/add', 'ClassRoomController@addTimeTable')->name('class.generaltimetable.add');
	Route::post('class/{id}/generaltimetable/add', 'ClassRoomController@addtoTimeTable');
	Route::get('class/{class_id}/generaltimetable/{subject_id}/', 'ClassRoomController@editTimeTable')->name('class.generaltimetable.edit');
	Route::post('class/{class_id}/generaltimetable/{subject_id}/', 'ClassRoomController@updateTimeTable')->name('class.generaltimetable.edit');
	Route::get('class/{class_id}/generaltimetable/delete/{subject_id}', 'ClassRoomController@deleteTimeTable')->name('class.generaltimetable.delete');
	Route::post('get_list_teacher', 'ClassRoomController@get_list_teacher')->name('get_list_teacher');

	Route::get('student', 'StudentController@index')->name('student.index');
	Route::get('student/add', 'StudentController@addStudent')->name('student.add');
	Route::post('student/add', 'StudentController@store');
	Route::get('student/{id}', 'StudentController@edit')->name('student.edit');
	Route::post('student/{id}', 'StudentController@update');
	Route::get('student/delete/{id}', 'StudentController@delete')->name('student.delete');

	Route::get('/teacher', 'TeacherController@index')->name('teacher.index');
	Route::get('teacher/add', 'TeacherController@add')->name('teacher.add');
	Route::post('teacher/add', 'TeacherController@store');
	Route::get('teacher/{id}', 'TeacherController@edit')->name('teacher.edit');
	Route::post('teacher/{id}', 'TeacherController@update');
	Route::get('teacher/delete/{id}', 'TeacherController@delete')->name('teacher.delete');

	Route::get('subject', 'SubjectController@index')->name('subject.index');
	Route::get('subject/add', 'SubjectController@add')->name('subject.add');
	Route::post('subject/add', 'SubjectController@store');
	Route::get('subject/{id}', 'SubjectController@edit')->name('subject.edit');
	Route::post('subject/{id}', 'SubjectController@update');
	Route::get('subject/delete/{id}', 'SubjectController@delete')->name('subject.delete');
});