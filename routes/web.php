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
})->name('home');

// Untuk route department
Route::get('department/data', 'DepartmentController@listData')->name('department.data');
Route::get('department/status/{status}/{id}', 'DepartmentController@status')->name('department.status');
Route::resource('department', 'DepartmentController');
// Untuk route variant product
Route::get('variant_product/data', 'VariantProductController@listData')->name('variant_product.data');
Route::get('variant_product/status/{status}/{id}', 'VariantProductController@status')->name('variant_product.status');
Route::resource('variant_product', 'VariantProductController');
// Untuk route user
Route::get('user/data', 'UserController@listData')->name('user.data');
Route::get('user/status/{status}/{id}', 'UserController@status')->name('user.status');
Route::resource('user', 'UserController');
// Untuk route shift
Route::get('shift/data', 'ShiftController@listData')->name('shift.data');
Route::get('shift/status/{status}/{id}', 'ShiftController@status')->name('shift.status');
Route::resource('shift', 'ShiftController');
// Untuk route transaksi sample minyak
Route::get('sample-minyak', 'SampleMinyakController@input')->name('sample.minyak.input');
