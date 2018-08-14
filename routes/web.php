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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin');
	
Route::resource('admin/grade','AdminGradeController',['as'=>'admin']);

Route::get('admin/grade/{id}/add/student','AdminGradeController@addStudent',['as'=>'admin'])->name('admin.grade.add.student');
Route::post('admin/student/search','AdminGradeController@searchStudent',['as'=>'admin']);
Route::post('admin/student/store','AdminGradeController@storeStudentInGrade',['as'=>'admin']);

Route::resource('admin/professor','AdminProfessorController',['as'=>'admin']);
Route::resource('admin/student','AdminStudentController',['as'=>'admin']);


