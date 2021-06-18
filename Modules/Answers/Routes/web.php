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

// Route::group(function() {
    Route::post('questions/answers','AnswersController@store')->name('answers.store');
    Route::get('questions/answers/{answers}/edit', 'AnswersController@edit')->name('answers.edit');
    Route::put('questions/answers/{answers}', 'AnswersController@update')->name('answers.update');
    Route::delete('questions/answers/{answers}', 'AnswersController@destroy')->name('answers.destroy');

// });
// questions/ask/{ask}/edit 