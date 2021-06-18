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

Route::prefix('questions')->group(function() {
    // Route::get('/ask', 'QuestionsController@create')->name('question.ask');
    // Route::post('/ask', 'QuestionsController@store')->name('question.store');
    // Route::post('/ask', 'QuestionsController@index')->name('question.index');

    Route::resource('/ask', 'QuestionsController')->except('show');
    Route::get('/ask/{slug}','QuestionsController@show')->name('ask.show');

});
