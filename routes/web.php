<?php

// use App\Events\SampleMieEvent;

// Route::get('/test', function () {
//     broadcast(new SampleMieEvent('LINE 01 BAG'));
// });
Route::middleware('auth')->group(function () {
    Route::get('/', 'HomeController@index');
    // Untuk route transaction shift
    Route::get('set-shift', 'TShiftController@index')->name('shift.set');
    Route::get('t-shift/get-shift/{tanggal_awal}/{tanggal_akhir}', 'TShiftController@get_shift');
    Route::post('t-shift/set-shift/', 'TShiftController@set_shift');
    // Untuk route department
    Route::get('department/data', 'DepartmentController@listData')->name('department.data');
    Route::get('department/status/{status}/{id}', 'DepartmentController@status')->name('department.status');
    Route::resource('department', 'DepartmentController');
    Route::resource('changelog', 'ChangelogController');

    // Untuk route line
    Route::get('line/{dept}/get-one-line', 'LineController@get_one_line');
    Route::get('line/data', 'LineController@listData')->name('line.data');
    Route::get('line/status/{status}/{id}', 'LineController@status')->name('line.status');
    Route::resource('line', 'LineController');

    // untuk mendapatkan shift saat create sample minyak BB
    Route::get('shift/{dept_id}/{tanggal_sample}/get-shift', 'ShiftController@get_sample_pershift');

    // untuk mendapatkan line saat create sample minyak
    Route::get('line/{dept_id}/{tanggal_sample}/{jam_sample}/get-by-minyak', 'LineController@get_by_minyak');
    // untuk mendapatkan line saat create sample mie
    Route::get('line/{dept_id}/{tanggal_sample}/{shift}/get-by-mie', 'LineController@get_by_mie');


    // Untuk route variant product
    Route::get('variant_product/data', 'VariantProductController@listData')->name('variant_product.data');
    Route::get('variant_product/status/{status}/{id}', 'VariantProductController@status')->name('variant_product.status');
    Route::resource('variant_product', 'VariantProductController');
    // Untuk route user
    Route::get('user/data', 'UserController@listData')->name('user.data');
    Route::get('user/status/{status}/{id}', 'UserController@status')->name('user.status');
    Route::resource('user', 'UserController');
    Route::get('user/{id}/get_user', 'UserController@get_user');
    // Untuk route shift
    Route::get('shift/data', 'ShiftController@listData')->name('shift.data');
    Route::get('shift/status/{status}/{id}', 'ShiftController@status')->name('shift.status');
    Route::resource('shift', 'ShiftController');
    // Untuk route transaksi sample minyak
    Route::get('sample-minyak/{id}/edit', 'SampleMinyakController@edit');
    Route::get('sample-mie/{id}/edit', 'SampleMieController@edit');
    Route::get('sample-minyak/{id}/submit_edit', 'SampleMinyakController@submit_edit');
    Route::get('sample-mie/{id}/submit_edit', 'SampleMieController@submit_edit');
    Route::get('sample-minyak/get-revis', 'SampleMinyakController@get_revis_sample')->name('sample.minyak.revis');
    Route::get('sample-minyak/get-new-sample', 'SampleMinyakController@get_new_sample')->name('sample.minyak.new');
    Route::get('sample-minyak/create-sample', 'SampleMinyakController@create_sample_id')->name('sample.minyak.create-page');
    Route::get('sample-minyak/delete/{id}', 'SampleMinyakController@delete_sample')->name('sample.minyak.delete');
    Route::get('sample-mie/delete/{id}', 'SampleMieController@delete_sample')->name('sample.mie.delete');
    Route::get('sample-mie/create-sample', 'SampleMieController@create_sample_id')->name('sample.mie.create-page');
    Route::get('sample-minyak/report-sample', 'ReportSampleMinyakController@index')->name('sample.minyak.report');
    Route::get('sample-mie/report-sample', 'ReportSampleMieController@index')->name('sample.mie.report');
    Route::get('sample-minyak/report-sample/data/{department?}/{status?}/{line?}/{tangki?}/{start_time?}/{end_time?}/{variant?}/{shift?}/{jam?}', 'ReportSampleMinyakController@data')->name('sample.minyak.report.data');
    Route::get('sample-minyak/report-sample/average/{department?}/{status?}/{line?}/{tangki?}/{start_time?}/{end_time?}/{variant?}/{shift?}/{jam?}', 'ReportSampleMinyakController@average')->name('sample.minyak.report.average');
    Route::get('sample-mie/report-sample/data/{department?}/{status?}/{line?}/{variant?}/{start_time?}/{end_time?}/{shift?}', 'ReportSampleMieController@data')->name('sample.mie.report.data');
    Route::get('sample-minyak/report-sample/excel/{department?}/{status?}/{line?}/{tangki?}/{start_time?}/{end_time?}/{variant?}/{shift?}/{jam?}', 'ReportSampleMinyakController@excel')->name('sample.minyak.report.excel');
    Route::get('sample-mie/report-sample/excel/{department?}/{status?}/{line?}/{variant?}/{start_time?}/{end_time?}/{shift?}', 'ReportSampleMieController@excel')->name('sample.mie.report.excel');
    Route::get('sample-minyak/upload-hasil-sample', 'SampleMinyakController@upload_sample_result')->name('sample.minyak.upload-page');
    Route::get('sample-mie/upload-hasil-sample', 'SampleMieController@upload_sample_result')->name('sample.mie.upload-page');
    Route::get('sample-mie/upload-hasil-sample-fc', 'SampleMieController@upload_sample_result_fc')->name('sample.mie.fc-upload-page');
    Route::post('sample-minyak/create-sample', 'SampleMinyakController@create_sample')->name('sample.minyak.create');
    Route::post('sample-mie/create-sample', 'SampleMieController@create_sample')->name('sample.mie.create');
    Route::get('sample-minyak', 'SampleMinyakController@input')->name('sample.minyak.input');
    Route::get('sample-minyak/hasil', 'SampleMinyakController@hasil')->name('sample.minyak.hasil');
    Route::get('sample-mie/hasil', 'SampleMieController@hasil')->name('sample.mie.hasil');
    Route::get('sample-minyak/showhasil', 'SampleMinyakController@showHasil')->name('sample.minyak.show');
    Route::get('sample-mie/showhasil', 'SampleMieController@showHasil')->name('sample.mie.show');
    Route::post('upload-sample-proses', 'SampleMinyakController@upload_sample_proses')->name('sample.minyak.upload');
    Route::get('sample-minyak/{status}/{dept}', 'SampleMinyakController@per_status');
    Route::get('sample-mie/{status}/{dept}', 'SampleMieController@per_status');
    //approve / reject
    Route::POST('sample-minyak/approve', 'SampleMinyakController@approve')->name('sample.minyak.approve');
    Route::POST('sample-mie/approve', 'SampleMieController@approve')->name('sample.mie.approve');
    // Simpan hasil sample minyak
    Route::post('sample_minyak/save', 'SampleMinyakController@store_sample')->name('sample_minyak.store');
    Route::post('sample_mie/save', 'SampleMieController@store_sample')->name('sample_mie.store');
    Route::post('fc_sample_mie/save', 'SampleMieController@store_sample_fc')->name('fc_sample_mie.store');
    // Untuk route transaksi sample minyak
    Route::get('sample-mie', 'SampleMieController@input')->name('sample.mie.input');
    Route::post('upload-sample-mie', 'SampleMieController@upload_sample_mie')->name('sample.mie.upload');

    Route::get('sample_minyak/get_pv/{sample_id}', 'SampleMinyakController@get_pv');
    Route::get('sample_minyak/get_ffa/{sample_id}', 'SampleMinyakController@get_ffa');
    Route::get('sample_minyak/use_pv/{sample_id}/{pv_id}', 'SampleMinyakController@use_pv');
    Route::get('sample_minyak/use_ffa/{sample_id}/{ffa_id}', 'SampleMinyakController@use_ffa');

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
    // Untuk auth controller
    Route::get('/group-report/{id}/get', 'AuthGroupReportController@getById');

    // Untuk permission
    Route::get('auth-permission/data', 'AuthPermissionController@showAll')->name('auth-permission.data');
    // Untuk report
    Route::get('auth-report/data', 'AuthReportController@showAll')->name('auth-report.data');
    // Untuk membuat permission baru
    // Untuk edit approve
    Route::get('sample_minyak/edit_approve', 'SampleMinyakController@edit_approve');
    Route::get('sample_mie/edit_approve', 'SampleMieController@edit_approve');
});

// Untuk route Login
Route::post('/login', 'LoginController@authenticate')->name('login.authenticate');
Route::get('/login', 'LoginController@index')->name('login');
Route::post('/logout', 'LoginController@logout')->name('logout');

// Route::middleware('ipcheck')->group(function () {
    Route::get('line/per_department/{dept_id}', 'LineController@per_department');
    // Untuk get line dari display per line
    Route::get('line/{dept}/get-all-line', 'LineController@get_all_line')->name('line.perdept');
    // Untuk display
    Route::get('/display/all-line/{dept?}', 'DisplayController@all_line');
    Route::get('/display/all-line3/{dept?}', 'DisplayController@all_line3');
    Route::get('/display/{dept?}/{line?}', 'DisplayController@index');
    Route::get('/display2/{dept?}/{line?}', 'DisplayController@index2');
    Route::get('/display/minyak/get-last/{tangki?}/{dept?}/{line?}', 'DisplayController@get_last_minyak');
    Route::get('/display/mie/get-last/{dept?}/{line?}', 'DisplayController@get_last_mie');
    Route::get('/display/minyak/get-history/{dept}/{line}', 'DisplayController@minyak_get_history');
    Route::get('/display/mie/get-history/{dept}/{line}', 'DisplayController@mie_get_history');
    Route::get('/display/mie/get-result-ka/{dept}/{line}', 'DisplayController@mie_get_result_ka');
    Route::get('/display/mie/get-result-fc/{dept}/{line}', 'DisplayController@mie_get_result_fc');
    Route::get('/display/minyak/get-bb/{dept}', 'DisplayController@get_minyak_bb');
// });