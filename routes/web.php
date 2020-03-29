<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//перевірено
Route::get('/register-as-student', 'CustomRegisterController@registerAsStudent')->name('register-as-student');
Route::get('/register-as-teacher', 'CustomRegisterController@registerAsTeacher')->name('register-as-teacher');
Route::post('/add-student', 'CustomRegisterController@addStudent')->name('add-student');
Route::post('/add-teacher', 'CustomRegisterController@addTeacher')->name('add-teacher');



Route::group(['middleware' => ['role:superadmin']], function () {
    Route::get('/register-cathedraworker', 'CustomRegisterController@registerCathedraworker')->name('register-cathedraworker');
    Route::post('/add-cathedraworker', 'CustomRegisterController@addCathedraworker')->name('add-cathedraworker');
});

Route::group(['middleware' => ['role:student']], function () {
    Route::get('search', array('as'=>'search','uses'=>'SearchController@search'));
    Route::get('autocomplete', array('as'=>'autocomplete','uses'=>'ScienceworkController@autocomplete'));
    Route::get('/register-sciencework-as-student', 'ScienceworkController@registerScienceworkAsStudent')->name('register-sciencework-as-student');
    Route::post('/add-sciencework-as-student', 'ScienceworkController@addScienceworkAsStudent')->name('add-sciencework-as-student');
});

Route::group(['middleware' => ['role:teacher']], function () {
    Route::group(['prefix' => 'teacher'], function () {
        Route::get('/show-inactive', 'ScienceworksController@showInactive')->name('show-inactive');
        Route::patch('/change-status/{id}', 'ScienceworksController@changeStatus')->name('change-status');
        Route::delete('/delete/{id}', 'ScienceworksController@delete')->name('delete');
        Route::get('/show-approved', 'ScienceworksController@showApproved')->name('show-approved');
    });
});

Route::group(['middleware' => ['role:cathedraworker']], function () {
    Route::group(['prefix' => 'cathedraworker'], function () {
        Route::get('/show-approved', 'CathedraworkersController@showApproved')->name('show-approved');
        Route::get('/show-active', 'CathedraworkersController@showActive')->name('show-active');
        
        // Route::patch('/change-status/{id}', 'TeachersController@changeStatus')->name('change-status');
        // Route::delete('/delete/{id}', 'TeachersController@delete')->name('delete');
        // Route::get('/show-approved', 'TeachersController@showApproved')->name('show-approved');
    });
}); 