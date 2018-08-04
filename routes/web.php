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

//Route::get('/softwares/imhrc', function () {
//    return view('softwares.imhrc.main');
//});
Route::get('test', function() {
    $arr = explode("\n", File::get('imhrc/1527278624.4628/results/Fmeasure_table.txt'));
    for ($i =0 ; $i<sizeof($arr); $i++)
        $arr[$i] = explode(",", $arr[$i]);
    dd($arr);
});
Route::get('', function (){
    return view('pages.home');
});
Route::get('about-us', function (){
    return view('pages.aboutus');
});
Route::get('contact-us', function (){
    return view('pages.contactus');
});
Route::get('people', function (){
    return view('pages.people');
});
Route::prefix('softwares')->group(function (){
    Route::get('', function (){
        return view('softwares.main');
    });
    Route::prefix('cdap')->group(function (){
        Route::post('result', 'IMHRCController@process');
        Route::get('', function () {
            return view('softwares.imhrc.main');
        });
        Route::get('start', function () {
            return view('softwares.imhrc.start');
        });
        Route::get('results', function () {
            return view('softwares.imhrc.results');
        });
    });

    Route::prefix('dmn')->group(function (){
        Route::get('', function () {
            return view('softwares.dmn.main');
        });
        Route::get('start', function () {
            return view('softwares.dmn.start');
        });
        Route::get('results', function () {
            return view('softwares.dmn.results');
        });
    });
});
Route::get('maddi', function (){
    return view('emdadi');
});
Route::post('upload', 'DataController@uploadFile');
