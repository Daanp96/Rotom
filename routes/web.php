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

// startpagina
Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth'])->group(function() {
    // settings
    Route::get('settings', 'SettingsController@settings');
    Route::put('settings/update/{id}', 'SettingsController@update');

    // geschiedenis & toevoegen contact
    Route::get('history', 'HistoryController@history');

    // ringtones
    Route::get('ringtone', 'RingtonesController@ringtone');
    Route::post('ringtone/add', 'RingtonesController@ringtoneAdd');
    Route::delete('ringtone/remove/{remove}', 'RingtonesController@ringtoneRemove');
    Route::post('ringtone/restore', 'RingtonesController@ringtoneRestore');

    // contacten
    Route::get('/contacts', 'ContactsController@contacts');

    Route::get('/contacts/addcontact', 'HistoryController@addContact');
    Route::post('/contacts/addcontact/store', 'HistoryController@store');

    Route::get('/contacts/{contact}', 'ContactsController@savedContact');
    Route::get('/contacts/updatecontact/{contact}', 'ContactsController@updateContact');
    Route::put('/contacts/updatecontact/update/{contact}', 'ContactsController@update');
});

Auth::routes();
Route::get('home', 'HomeController@index')->name('home');
