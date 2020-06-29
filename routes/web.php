<?php

use App\Http\Controllers\AuthController;
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

Route::get('/provinces','ProvincesController@jsonProvincesList');
Route::get('/cities/{province_id}','CitiesController@citiesOfProvinceList');
Route::get('/cities/{province_id}','CitiesController@citiesOfProvinceList');
Route::get('/uploadfile','ProductUploadController@index');
Route::post('/uploadfile','ProductUploadController@showUploadFile');
Route::get('/upload/{jStr}','ProductUploadController@insert');
Route::resource('auth','AuthController');