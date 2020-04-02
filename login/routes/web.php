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
    return view('welcome');
});

// Oude Login
Route::get('main', 'MainController@index');
Route::post('main/checklogin', 'MainController@checklogin');
Route::get('main/successlogin', 'MainController@successlogin');
Route::get('main/logout', 'MainController@logout');
Route::get('create', 'MainController@create');
Route::post('checkcreate', 'MainController@checkcreate');

// Profiles
Route::get('testprofile', 'MainController@testprofile');
Route::post('testprofile/store', 'MainController@store');
Route::get('profile/{profile}', 'MainController@savedProfile');

Route::get('volume', 'MainController@volume');

Route::get('ringtone', 'MainController@ringtone');
Route::post('ringtone/add', 'MainController@ringtoneAdd');


Auth::routes();
Route::get('home', 'HomeController@index')->name('home');
