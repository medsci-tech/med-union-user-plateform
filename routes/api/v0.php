<?php


Route::group(['prefix' => 'v0'], function () {
    Route::any('test', 'ThirdPartyInterfaces\V0\TestConnectionInterfaceController@handleRequest');
    Route::post('register', 'ThirdPartyInterfaces\V0\RegisterInterfaceController@handleRequest')->middleware('scope:register');
});