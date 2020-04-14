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

    Route::get('volume', 'VolumeController@volume');

    Route::get('history', 'HistoryController@history');
    Route::get('history/addprofile', 'HistoryController@addprofile');
    Route::post('history/addprofile/store', 'HistoryController@store');

    Route::get('ringtone', 'RingtonesController@ringtone');
    Route::post('ringtone/add', 'RingtonesController@ringtoneAdd');
    Route::delete('ringtone/remove/{remove}', 'RingtonesController@ringtoneRemove');
    Route::post('ringtone/restore', 'RingtonesController@ringtoneRestore');

    Route::get('/profiles', 'ContactsController@profiles');
    Route::get('/profiles/{profile}', 'ContactsController@savedProfile');
    Route::get('/profiles/updateProfile/{profile}', 'ContactsController@updateProfile');
    Route::put('/profiles/updateProfile/update/{profile}', 'ContactsController@update');
});

Route::get('history', 'MainController@history');


Auth::routes();
Route::get('home', 'HomeController@index')->name('home');

// Oude Login
// Route::get('main', 'MainController@index');
// Route::post('main/checklogin', 'MainController@checklogin');
// Route::get('main/successlogin', 'MainController@successlogin');
// Route::get('main/logout', 'MainController@logout');
// Route::get('create', 'MainController@create');
// Route::post('checkcreate', 'MainController@checkcreate');
