<?php

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');
    // Untuk route department
    Route::get('department/data', 'DepartmentController@listData')->name('department.data');
    Route::get('department/status/{status}/{id}', 'DepartmentController@status')->name('department.status');
    Route::resource('department', 'DepartmentController');
    // Untuk route line
    Route::get('line/data', 'LineController@listData')->name('line.data');
    Route::get('line/status/{status}/{id}', 'LineController@status')->name('line.status');
    Route::resource('line', 'LineController');
    Route::get('line/{dept_id}/per_department', 'LineController@per_department');
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
    Route::post('sample-minyak/create-sample', 'SampleMinyakController@create_sample')->name('sample.minyak.create');
    Route::get('sample-minyak', 'SampleMinyakController@input')->name('sample.minyak.input');
    Route::get('sample-minyak/hasil', 'SampleMinyakController@hasil')->name('sample.minyak.hasil');
    Route::get('sample-minyak/showhasil', 'SampleMinyakController@showHasil')->name('sample.minyak.show');
    Route::post('upload-sample-proses', 'SampleMinyakController@upload_sample_proses')->name('sample.minyak.upload');
    Route::get('sample-minyak/{status}', 'SampleMinyakController@per_status');
    //approve / reject
    Route::POST('sample-minyak/approve', 'SampleMinyakController@approve')->name('sample.minyak.approve');
    Route::POST('sample-mie/approve', 'SampleMieController@approve')->name('sample.mie.approve');
    // Simpan hasil sample minyak line
    Route::post('sample_minyak/save', 'SampleMinyakController@store_sample')->name('sample_minyak.store');
    // Untuk route transaksi sample minyak
    Route::get('sample-mie', 'SampleMieController@input')->name('sample.mie.input');
    Route::post('upload-sample-mie', 'SampleMieController@upload_sample_mie')->name('sample.mie.upload');
    Route::get('sample-mie/hasil', 'SampleMieController@hasil')->name('sample.mie.hasil');
    Route::get('sample-mie/showhasil', 'SampleMieController@showHasil')->name('sample.mie.show');
    // Simpan hasil sample minyak line
    Route::post('sample_mie/save', 'SampleMieController@store_sample')->name('sample_mie.store');
    Route::get('/home', 'HomeController@index')->name('home');

    // Untuk report sample mie
    Route::get('sample-mie/report', 'SampleMieController@index_report')->name('sample.mie.report');
    Route::get('sample-mie/generate_report/{tanggal}', 'SampleMieController@generate_report')->name('sample.mie.report.generate');

    // Untuk otorisasis

    // Route::resource('auth-group', 'AuthGroupController');
    Route::get('/auth-group/show', 'AuthGroupController@show')->name('auth-group.show');
    Route::get('/auth-group', 'AuthGroupController@index')->name('authorization.group');
    Route::get('/auth-group/{id}/edit', 'AuthGroupController@edit')->name('auth-group.edit');
    Route::get('/group-permission/{id}/get', 'AuthGroupPermissionController@getById');
    Route::post('/auth-group/store', 'AuthGroupController@store')->name('auth-group.store');


    // Untuk permission
    Route::get('auth-permission/data', 'AuthPermissionController@showAll')->name('auth-permission.data');
    // Untuk membuat permission baru

    Route::resource('group-permission', 'AuthGroupPermissionController');
});

// Untuk route Login
Route::post('/login', 'LoginController@authenticate')->name('login.authenticate');
Route::get('/login', 'LoginController@index')->name('login');
Route::post('/logout', 'LoginController@logout')->name('logout');

// Untuk display
Route::get('display', 'DisplayController@index');
