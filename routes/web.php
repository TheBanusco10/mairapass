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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/create', 'App\Http\Controllers\PasswordController@create')->name('createPassword');
Route::get('/home/edit/{password}', 'App\Http\Controllers\PasswordController@edit')->name('editPassword');
Route::get('/settings/{user}', 'App\Http\Controllers\HomeController@settings')->name('settings');

Route::post('/create', 'App\Http\Controllers\PasswordController@store')->name('create');

Route::put('/update/{password}', 'App\Http\Controllers\PasswordController@update')->name('updatePassword');
Route::put('/updateInformation/{user}', 'App\Http\Controllers\UserController@updateInformation')->name('updateInformation');

Route::delete('/home/delete/{id}', 'App\Http\Controllers\PasswordController@delete')->name('delete');
