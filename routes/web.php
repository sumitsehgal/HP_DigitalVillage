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

Route::get('/', 'PagesController@home')->name('main');
Route::get('/about', 'PagesController@about');
Route::get('/feedback', 'PagesController@feedback');
Route::get('/support', 'PagesController@support');
Route::get('/faq', 'PagesController@faq');
Route::get('/courses', 'PagesController@courses');
Route::get('/contact_us', 'PagesController@contact');
Route::post('/post_contact_us', 'PagesController@postContact');
Route::post('/post_feedback', 'PagesController@postFeedback');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', 'UserController');
Route::resource('centers', 'CenterController');
Route::resource('students', 'StudentController');
Route::get('/change-password', 'UserController@changepassword');
Route::post('/storepassword', 'UserController@storepassword');

Route::get('/user/{id}/password', 'UserController@otherpassword');
Route::post('/user/{id}/storepassword', 'UserController@storeotherpassword');


Route::get('/dbmigration', 'HomeController@dbScript');
Route::get('/getcenters', 'HomeController@getCenterData');
Route::get('/getyeardata', 'HomeController@getYearData');


Route::get('/getmalefemale', 'HomeController@getMaleFemaleData');
Route::get('/studentcenterinfo', 'HomeController@StudentInfo');

Route::get('/centerdashboard', 'HomeController@centerdashboard');



