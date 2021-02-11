<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::resource('notes', 'WEB\NoteController');
Route::get('notes', 'WEB\NoteController@index')->name('notes');
Route::get('notes/create/', 'WEB\NoteController@create')->name('note.create');
Route::post('notes/store', 'WEB\NoteController@store')->name('note.store');
Route::get('notes/show/{id}', 'WEB\NoteController@show')->name('note.show');
Route::get('notes/edit/{id}', 'WEB\NoteController@edit')->name('note.edit');
Route::post('notes/update/{id}', 'WEB\NoteController@update')->name('note.update');
Route::get('notes/destroy/{id}', 'WEB\NoteController@destroy')->name('note.destroy');
