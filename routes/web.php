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
    return view('home');
});
Route::get('department/data', 'DepartmentController@listData')->name('department.data');
Route::get('department/status/{status}/{id}', 'DepartmentController@status')->name('department.status');
Route::resource('department', 'DepartmentController');
