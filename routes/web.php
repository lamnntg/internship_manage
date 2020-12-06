<?php

use Illuminate\Support\Facades\Route;

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
    return view('web.index');
});
Route::group(['prefix' => 'administration','middleware' => ['auth']], function () {
    Route::resource('questions', 'QuestionsController');
    Route::resource('config-testing', 'ExamConfigController');

    Route::group(['prefix' => 'internship'], function () {
        Route::resource('candidates', 'CandidatesController');
        Route::resource('create-exam', 'ExamController');
    });
    Route::get('/', function () {
        return view('layouts.master');
    });
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
