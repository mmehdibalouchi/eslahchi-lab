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
Route::prefix('dashboard')->group(function () {
    Route::get('', function (){
       return view('layouts.dashboard');
    });
    Route::get('login', function () {
        return view('dashboard.login');
    });
    Route::get('forms', function () {
        return view('dashboard.forms');
    });
});
Route::get('kill/{pid}', function($pid){
   system('kill ' . $pid);
});
Route::get('test', function() {
    $akbar = system('a=$(echo "this is") & echo $a', $gholam);
    dd($gholam);
    $gholam  = system('echo $a');
    dd($gholam);
    $contents = file_get_contents('pid.txt');
    $contents = str_replace('4791', '', $contents);
    file_put_contents('pid.txt', preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $contents));
    dd(Storage::exists('public/ghol.txt'));
    $url = "https://www.topuniversities.com/sites/default/files/qs-rankings-data/379641.txt?_=1535372884005";
    $curl = curl_init();
// Set some options - we are passing in a useragent too here
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $url,
        CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
// Send the request & save response to $resp
    $resp = json_decode(curl_exec($curl));
// Close request to clear up some resources
    dd($resp);
    curl_close($curl);

    Mail::raw("Hiii", function ($message){
        $message->to('mmehdibalouchi@gmail.com');
//            ->cc(['booketacademic@gmail.com', 'Nikbakht12@gmail.com', 'foghahaei@hamrahelm.com', 'sarah.hosseini009@gmail.com']);
    });
    $dt = \Carbon\Carbon::now();
//    return $carbon = \Carbon\Carbon::createFromTime("26", "03", "26")->addSecond(-30)->toTimeString();

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
Route::get('events', function (){
    return view('pages.events');
});
Route::get('people', function (){
    return view('pages.people');
});
Route::get('people/{name}', function ($name){
    return view('pages.onePeople', ['name' => $name]);
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
    Route::get('pmlpr', function () {
        return view('softwares.pmlpr.main');
    });
    Route::get('orthognc', function () {
        return view('softwares.orthognc.main');
    });
    Route::get('imhrcpaper', function () {
        return view('softwares.imhrcpaper.main');
    });
    Route::get('prodomas', function () {
        return view('softwares.prodomas.main');
    });
    Route::get('stone', function () {
        return view('softwares.stone.main');
    });
});
Route::get('maddi', function (){
    return view('emdadi');
});
Route::post('upload', 'DataController@uploadFile');
