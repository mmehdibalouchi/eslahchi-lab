<?php

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

//Route::get('/projects/imhrc', function () {
//    return view('projects.imhrc.main');
//});
Route::prefix('projects')->group(function (){

    Route::prefix('imhrc')->group(function (){
        Route::get('', function () {
            return view('projects.imhrc.main');
        });
        Route::get('algorithms', function () {
            return view('projects.imhrc.algorithms');
        });
    });
});
Route::get('maddi', function (){
    return view('emdadi');
});
Route::post('upload', 'DataController@uploadFile');
