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

// Route::view('/', function () {
//     return view('home');
// });

Auth::routes();

Route::redirect('/', 'home');

Route::get('/home', 'RemittanceController@index')->name('home');
Route::post('/upload', 'RemittanceController@store')->name('uploadfile');
Route::get('/download/{$id}', 'RemittanceController@show')->name('downloadfile');
Route::get('/search', 'RemittanceController@search')->name('search');

// Route::view('/home', 'home');

Route::resource('posts', 'RemittanceController');
