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

// Auth::routes([
//     'verify' => true,
//     'register' => false
// ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('/home/create', 'App\Http\Controllers\PasswordController@create')->name('createPassword')->middleware('verified');
Route::get('/home/create-card', 'App\Http\Controllers\CardController@create')->name('addCard')->middleware('verified');
Route::get('/home/edit/{password}', 'App\Http\Controllers\PasswordController@edit')->name('editPassword')->middleware('verified');
Route::get('/home/edit-card/{card}', 'App\Http\Controllers\CardController@edit')->name('editCard')->middleware('verified');
Route::get('/settings', 'App\Http\Controllers\HomeController@settings')->name('settings')->middleware('verified');
Route::get('/purchase', function () {

    return view('purchase');

})->middleware('verified');

Route::post('/create', 'App\Http\Controllers\PasswordController@store')->name('create')->middleware('verified');
Route::post('/create-card', 'App\Http\Controllers\CardController@store')->name('createCard')->middleware('verified');

Route::put('/update/{password}', 'App\Http\Controllers\PasswordController@update')->name('updatePassword')->middleware('verified');
Route::put('/update-card/{card}', 'App\Http\Controllers\CardController@update')->name('updateCard')->middleware('verified');
Route::put('/updateInformation/{user}', 'App\Http\Controllers\UserController@updateInformation')->name('updateInformation')->middleware('verified');
Route::put('/updatePro/{user}', 'App\Http\Controllers\UserController@updatePro')->name('updatePro')->middleware('verified');
Route::put('/updateAvatar/{user}', 'App\Http\Controllers\UserController@updateAvatar')->name('updateAvatar')->middleware('verified');


Route::delete('/home/delete/{id}', 'App\Http\Controllers\PasswordController@delete')->middleware('verified');
Route::delete('/home/delete-card/{id}', 'App\Http\Controllers\CardController@delete')->middleware('verified');
Route::delete('/home/delete-user', 'App\Http\Controllers\UserController@delete')->middleware('verified');
