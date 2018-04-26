<?php

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('home');
    });
    // Untuk route department
    Route::get('department/data', 'DepartmentController@listData')->name('department.data');
    Route::get('department/status/{status}/{id}', 'DepartmentController@status')->name('department.status');
    Route::resource('department', 'DepartmentController');
    // Untuk route line
    Route::get('line/data', 'LineController@listData')->name('line.data');
    Route::get('line/status/{status}/{id}', 'LineController@status')->name('line.status');
    Route::resource('line', 'LineController');

    // untuk mendapatkan line saat create sample
    Route::get('line/{dept_id}/{tanggal_sample}/{jam_sample}/get', 'LineController@get');
    Route::get('line/per_department/{dept_id}', 'LineController@per_department');

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
    Route::get('sample-minyak/create-sample', 'SampleMinyakController@create_sample_id')->name('sample.minyak.create-page');
    Route::get('sample-minyak/delete/{id}', 'SampleMinyakController@delete_sample')->name('sample.minyak.delete');
    Route::get('sample-mie/delete/{id}', 'SampleMieController@delete_sample')->name('sample.mie.delete');
    Route::get('sample-mie/create-sample', 'SampleMieController@create_sample_id')->name('sample.mie.create-page');
    Route::get('sample-minyak/report-sample', 'ReportSampleMinyakController@index')->name('sample.minyak.report');
    Route::get('sample-mie/report-sample', 'ReportSampleMieController@index')->name('sample.mie.report');
    Route::get('sample-minyak/report-sample/data/{department?}/{status?}/{line?}/{tangki?}/{start_time?}/{end_time?}', 'ReportSampleMinyakController@data')->name('sample.minyak.report.data');
    Route::get('sample-minyak/report-sample/excel/{department?}/{status?}/{line?}/{tangki?}/{start_time?}/{end_time?}', 'ReportSampleMinyakController@excel')->name('sample.minyak.report.excel');
    Route::get('sample-minyak/upload-hasil-sample', 'SampleMinyakController@upload_sample_result')->name('sample.minyak.upload-page');
    Route::get('sample-mie/upload-hasil-sample', 'SampleMieController@upload_sample_result')->name('sample.mie.upload-page');
    Route::post('sample-minyak/create-sample', 'SampleMinyakController@create_sample')->name('sample.minyak.create');
    Route::post('sample-mie/create-sample', 'SampleMieController@create_sample')->name('sample.mie.create');
    Route::get('sample-minyak', 'SampleMinyakController@input')->name('sample.minyak.input');
    Route::get('sample-minyak/hasil', 'SampleMinyakController@hasil')->name('sample.minyak.hasil');
    Route::get('sample-mie/hasil', 'SampleMieController@hasil')->name('sample.mie.hasil');
    Route::get('sample-minyak/showhasil', 'SampleMinyakController@showHasil')->name('sample.minyak.show');
    Route::get('sample-mie/showhasil', 'SampleMieController@showHasil')->name('sample.mie.show');
    Route::post('upload-sample-proses', 'SampleMinyakController@upload_sample_proses')->name('sample.minyak.upload');
    Route::get('sample-minyak/{status}', 'SampleMinyakController@per_status');
    Route::get('sample-mie/{status}', 'SampleMieController@per_status');
    //approve / reject
    Route::POST('sample-minyak/approve', 'SampleMinyakController@approve')->name('sample.minyak.approve');
    Route::POST('sample-mie/approve', 'SampleMieController@approve')->name('sample.mie.approve');
    // Simpan hasil sample minyak
    Route::post('sample_minyak/save', 'SampleMinyakController@store_sample')->name('sample_minyak.store');
    Route::post('sample_mie/save', 'SampleMieController@store_sample')->name('sample_mie.store');
    // Untuk route transaksi sample minyak
    Route::get('sample-mie', 'SampleMieController@input')->name('sample.mie.input');
    Route::post('upload-sample-mie', 'SampleMieController@upload_sample_mie')->name('sample.mie.upload');

    // Simpan hasil sample minyak line
    Route::post('sample_mie/save', 'SampleMieController@store_sample')->name('sample_mie.store');
    Route::get('/home/{jenis?}', 'HomeController@index')->name('home');

    // Untuk report sample mie
    // Route::get('sample-mie/report', 'SampleMieController@index_report')->name('sample.mie.report');
    Route::get('sample-mie/generate_report/{tanggal}', 'SampleMieController@generate_report')->name('sample.mie.report.generate');

    // Untuk otorisasis

    // Route::resource('auth-group', 'AuthGroupController');
    Route::get('/auth-group/show', 'AuthGroupController@show')->name('auth-group.show');
    Route::delete('/auth-group/{id}', 'AuthGroupController@destroy');
    Route::get('/auth-group', 'AuthGroupController@index')->name('authorization.group');
    Route::get('/auth-group/{id}/edit', 'AuthGroupController@edit')->name('auth-group.edit');
    Route::get('/group-permission/{id}/get', 'AuthGroupPermissionController@getById');
    Route::patch('/group-permission/{id}/change', 'AuthGroupController@change');
    Route::post('/auth-group/store', 'AuthGroupController@store')->name('auth-group.store');

    // Untuk permission
    Route::get('auth-permission/data', 'AuthPermissionController@showAll')->name('auth-permission.data');
    // Untuk membuat permission baru
});

// Untuk route Login
Route::post('/login', 'LoginController@authenticate')->name('login.authenticate');
Route::get('/login', 'LoginController@index')->name('login');
Route::post('/logout', 'LoginController@logout')->name('logout');

// Untuk display
Route::get('/display/{dept?}/{line?}', 'DisplayController@index');
Route::get('/display/minyak/get-last/{tangki?}/{dept?}/{line?}', 'DisplayController@get_last_minyak');
Route::get('/display/minyak/get-last/{tangki?}/{dept?}/{line?}', 'DisplayController@get_last_minyak');
