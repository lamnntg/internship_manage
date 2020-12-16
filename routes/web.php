<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

//admin page
Route::group(['prefix' => 'administration','middleware' => ['auth']], function () {
    Route::resource('questions', 'QuestionsController');
    Route::resource('config-testing', 'ExamConfigController');
    Route::resource('answer', 'AnswerController');
    

    Route::group(['prefix' => 'internship'], function () {
        Route::resource('candidates', 'CandidatesController');
        Route::resource('test-online', 'ExamController');
        Route::get('test-online/{id}/create-exam', 'ExamController@createExam')->name('createExam');
        Route::delete('delete', 'CandidatesController@delete')->name('deleteCandidate');
        Route::get('send-mail/{id}','CandidatesController@sendEmail')->name('sendEmail');
    });
    
    Route::get('', function () {
        return view('layouts.master');
    });
});
// web page
Route::group(['prefix' => '/'], function () {
    Route::get('/', function () {
        $value = session('logined');
        if ($value == NULL) {
            return view('web.index');
        } else {
            return redirect()->route('candidate.show', $value);
        }
    })->name('homePage');
    Route::resource('register-candidate', 'Web\RegisterController');
    Route::get('login-candidate', 'Web\LoginController@loginCandidate')->name('login-candidate');
    Route::get('logout-candidate', 'Web\LoginController@logoutCandidate')->name('logout-candidate');

    Route::resource('candidate', 'Web\CandidateController')->middleware('candidate_logined');
    Route::get('candidate/{id}/list-test-online', 'Web\CandidateController@showChooseTheExam')->name('showChooseTheExam');
    Route::get('candidate/{candidateId}/test-online/{testId}', 'Web\CandidateController@doTheExam')->name('doTheExam');
    Route::post('candidate/{candidateId}/test-online/{testId}/submit', 'Web\CandidateController@submitTheExam')->name('submitTheExam');
    Route::get('candidate/{candidateId}/test-online/{testId}/result', 'Web\CandidateController@resultTheExam')->name('resultTheExam');
    Route::get('change-password/{id}','Web\CandidateController@editPassword')->name('editPassword');
    Route::post('change-password/{id}/update','Web\CandidateController@updatePassword')->name('updatePassword');
    
    Route::view('login_1', 'layouts.login_page')->name('login_1');
});

Auth::routes([
    'register' => false,
    'reset' => false
  ]);

 //Route::get('/administration', 'HomeController@index')->name('home');
