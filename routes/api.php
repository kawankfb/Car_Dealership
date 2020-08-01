<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('/provinces','ProvinceController');
Route::apiResource('/cities','CityController');
Route::apiResource('/companies','CompanyController');
Route::apiResource('/models','ModelController');
Route::prefix('v1')->group(function(){
    Route::apiResource('/products','Api\v1\ProductController');
});
Route::apiResource('/products','ProductController');
