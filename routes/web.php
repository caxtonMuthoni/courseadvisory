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
Route::get('/adminHome', 'HomeController@adminHome')->name('adminHome');
Route::get('/about', 'GeneralController@about')->name('about');
Route::get('/courses', 'GeneralController@courses')->name('courses');
Route::get('/contact', 'GeneralController@contact')->name('contact');

Route::get('/courses', 'CourseController@index')->name('courses');
Route::get('/courseform', 'CourseController@create')->name('courseform');
Route::Post('/addcourse', 'CourseController@store')->name('addcourse');


Route::get('/universities', 'UniversityController@index')->name('universities');
Route::get('/universityform', 'UniversityController@create')->name('universityform');
Route::Post('/adduniversity', 'UniversityController@store')->name('adduniversity');
Route::get('/manageuniversity', 'UniversityController@show')->name('manageuniversity');
Route::get('/updateform/{id}', 'UniversityController@edit')->name('updateform');
Route::post('/update/{id}', 'UniversityController@update')->name('update');
Route::get('/delete/{id}', 'UniversityController@destroy')->name('delete');


Route::Post('/sendmessage', 'MessageController@store')->name('sendmessage');
Route::get('/replymessages', 'MessageController@show')->name('replymessages');
Route::get('/replyform/{id}', 'MessageController@edit')->name('replyform');
Route::post('/reply/{id}', 'MessageController@update')->name('reply');
