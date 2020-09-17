<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['middleware' => ['auth'], 'prefix' => 'maintenance', 'namespace' => 'Maintenance'], function () {
        Route::resource('downtime', 'DownTimeController');
        Route::resource('job_card_type', 'JobCarTypeController');
        Route::resource('job_system', 'JobSystemController');
        Route::resource('job_type', 'JobTypeController');
        Route::resource('job_ident', 'JobIdentController');
        Route::resource('workshop', 'WorkshopController');
        Route::post('open_job_card/append', 'OpenJobCardController@jobIdent')->name('open_job_card.append');
        Route::resource('open_job_card', 'OpenJobCardController');
    });
    Route::group(['middleware' => ['auth'], 'prefix' => 'hrm', 'namespace' => 'HRM'], function () {
        Route::get('/personale/deactivate/{id}',                     ['uses' => 'PersonalesController@deactivate', 'as' => 'personale.deactivate']);
        Route::post('/personale/deactivate_store/{id}',                 ['uses' => 'PersonalesController@deactivate_store', 'as' => 'personale.deactivate_store']);
        Route::post('/personale/activate/{id}',                 ['uses' => 'PersonalesController@activate', 'as' => 'personale.activate']);
        Route::resource('personale', 'PersonalesController');
        Route::resource('department', 'DepartementsController');
        Route::resource('personale', 'PersonalesController');
    });
});
Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::match(['get', 'post'], '/login', 'AdminsController@login')->name('admin.login');
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/', 'AdminsController@index')->name('admin');
    });
});
