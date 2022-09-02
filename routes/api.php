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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(['middleware' => ['api', 'throttle:3,1']], function ($router) {
Route::group(['middleware' => ['api']], function ($router) {

    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout');
    Route::post('refresh', 'LoginController@refresh');
    Route::post('me', 'LoginController@me');

});

