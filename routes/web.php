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

Route::resource('admin/grade','GradeController',['as'=>'admin']);
Route::resource('admin/professor','AdminProfessorController',['as'=>'admin']);
Route::resource('admin/student','AdminStudentController',['as'=>'admin']);

