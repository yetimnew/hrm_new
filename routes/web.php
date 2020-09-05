<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/personale',                                    ['uses' => 'HRM\PersonalesController@index', 'as' => 'personale']);
    Route::get('/personale/create',                             ['uses' => 'HRM\PersonalesController@create', 'as' => 'personale.create']);
    Route::post('/personale/store',                             ['uses' => 'HRM\PersonalesController@store', 'as' => 'personale.store']);
    Route::get('/personale/show/{id}',                          ['uses' => 'HRM\PersonalesController@show', 'as' => 'personale.show']);
    Route::get('/personale/edit/{id}',                          ['uses' => 'HRM\PersonalesController@edit', 'as' => 'personale.edit']);
    Route::patch('/personale/update/{id}',                       ['uses' => 'HRM\PersonalesController@update', 'as' => 'personale.update']);
    Route::delete('/personale/destroy/{id}',                    ['uses' => 'HRM\PersonalesController@destroy', 'as' => 'personale.destroy']);
});
