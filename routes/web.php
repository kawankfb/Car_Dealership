<?php

use Illuminate\Support\Facades\Auth;
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
    return view('header');
});

Auth::routes();

Route::prefix('profile')->middleware('auth')->group(function () {
    Route::get('/','ProfileController@index')->name('profile');
    Route::post('/edit','ProfileController@edit')->name('profile.edit');
});

Route::get('/home', 'HomeController@index')->name('home');
