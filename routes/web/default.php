<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', function () {
    return redirect('/login');
});

//Route::get('/mongo', 'ThirdPartyInterfaces\V1\RegisterInterfaceController@mongo');

Auth::routes();

Route::get('/home', 'HomeController@index');


//Route::get('test', function () {
//    $query = DB::connection('test')->table('customers')
//        ->where('is_registered', 1)
//        ->whereNotNull('phone')
//        ->select(['phone', 'beans_total', 'referrer_id', 'unionid', 'created_at'])->get()->toArray();
//
//    foreach ($query as $row) {
//        if ($row->referrer_id != 0) {
//            $row->upper = DB::connection('test')->table('customers')->where('id', $row->referrer_id)->first()->phone;
//        } else {
//            $row->upper = null;
//        }
//    }
//    return response()->json($query);
//});