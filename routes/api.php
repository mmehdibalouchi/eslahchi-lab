<?php

use Illuminate\Http\Request;

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
Route::prefix('softwares')->group(function (){
    Route::prefix('imhrc')->group(function (){
        Route::post('result', 'IMHRCController@process');
    });
    Route::prefix('dmn')->group(function (){
        Route::post('result', 'DMNController@process');
    });
});
