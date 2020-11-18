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
        Route::post('personale/append', 'PersonalesController@pay_grade_level')->name('personale.append');
        Route::resource('personale', 'PersonalesController');
        Route::resource('department', 'DepartementsController');
        Route::resource('branch', 'BranchesController');
        Route::resource('job_title', 'JobTitleController');
        Route::resource('pay_grade', 'PayGradeController');
        Route::resource('pay_grade_level', 'PayGradeLevelController');
        Route::resource('promotion', 'EmployeesPromotionController');

        Route::get('employees_dependant/create/{id}', 'EmployeesDependantsContactController@create')->name('employees_dependant.create');
        Route::POST('employees_dependant/store',      'EmployeesDependantsContactController@store')->name('employees_dependant.store');
        Route::get('employees_dependant/edit/{id}',      'EmployeesDependantsContactController@edit')->name('employees_dependant.edit');
        Route::patch('/employees_dependant/update/{id}',       'EmployeesDependantsContactController@update')->name('employees_dependant.update');
        Route::DELETE('/employees_dependant/destroy/{id}',       'EmployeesDependantsContactController@destroy')->name('employees_dependant.destroy');

        Route::get('emergence_contact/create/{id}', 'EmployeesEmergencyContactController@create')->name('emergence_contact.create');
        Route::POST('emergence_contact/store',      'EmployeesEmergencyContactController@store')->name('emergence_contact.store');
        Route::get('emergence_contact/edit/{id}',      'EmployeesEmergencyContactController@edit')->name('emergence_contact.edit');
        Route::patch('/emergence_contact/update/{id}',       'EmployeesEmergencyContactController@update')->name('emergence_contact.update');
        Route::DELETE('/emergence_contact/destroy/{id}',       'EmployeesEmergencyContactController@destroy')->name('emergence_contact.destroy');

        Route::get('experience/create/{id}', 'WorkExperianceController@create')->name('experience.create');
        Route::POST('experience/store',      'WorkExperianceController@store')->name('experience.store');
        Route::get('experience/edit/{id}',      'WorkExperianceController@edit')->name('experience.edit');
        Route::patch('/experience/update/{id}',       'WorkExperianceController@update')->name('experience.update');
        Route::DELETE('/experience/destroy/{id}',       'WorkExperianceController@destroy')->name('experience.destroy');

        Route::get('education/create/{id}', 'EducationController@create')->name('education.create');
        Route::POST('education/store',      'EducationController@store')->name('education.store');
        Route::get('education/edit/{id}',      'EducationController@edit')->name('education.edit');
        Route::patch('/education/update/{id}',       'EducationController@update')->name('education.update');
        Route::DELETE('/education/destroy/{id}',       'EducationController@destroy')->name('education.destroy');

        // Route::resource('education', 'EducationController')->except('index');
    });
});
Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::match(['get', 'post'], '/login', 'AdminsController@login')->name('admin.login');
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/', 'AdminsController@index')->name('admin');
    });
});
