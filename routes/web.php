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

Route::middleware(['auth'])->group(function() {
    // // Oude Login
    // Route::get('main', 'MainController@index');
    // Route::post('main/checklogin', 'MainController@checklogin');
    // Route::get('main/successlogin', 'MainController@successlogin');
    // Route::get('main/logout', 'MainController@logout');
    // Route::get('create', 'MainController@create');
    // Route::post('checkcreate', 'MainController@checkcreate');


    Route::get('volume', 'MainController@volume');

    Route::get('history', 'MainController@history');
    Route::get('history/addprofile', 'MainController@addprofile');
    Route::post('history/addprofile/store', 'MainController@store');

    Route::get('ringtone', 'MainController@ringtone');
    Route::post('ringtone/add', 'MainController@ringtoneAdd');
    Route::delete('ringtone/remove/{remove}', 'MainController@ringtoneRemove');
    Route::post('ringtone/restore', 'MainController@ringtoneRestore');

    Route::get('profiles', 'MainController@profiles');
    Route::get('profiles/{profile}', 'MainController@savedProfile');
    Route::get('profiles/{profile}/update', 'MainController@updateProfile');
});


Auth::routes();
Route::get('home', 'HomeController@index')->name('home');
