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
Route::get('/exclutionList', ['middleware' => 'auth', 'uses' => 'Exclution_List_Controller@getView'])->name('exclutionList');
Route::post('/exclutionList', ['middleware' => 'auth', 'uses' => 'Exclution_List_Controller@postImport']);



Route::get('/resultList', ['middleware' => 'auth', 'uses' => 'oig_result_controller@getView'])->name('oig_result');
Route::post('/resultList', ['middleware' => 'auth', 'uses' => 'oig_result_controller@file_download']);




Route::post('/pdf', ['middleware' => 'auth', 'uses' => 'Exclution_List_Controller@postImport']);