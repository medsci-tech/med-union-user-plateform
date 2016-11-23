<?php


Route::group(['prefix' => 'v1'], function () {
    Route::any('test', 'ThirdPartyInterfaces\V1\TestConnectionInterfaceController@handleRequest');
    Route::post('register', 'ThirdPartyInterfaces\V1\RegisterInterfaceController@handleRequest')->middleware('scope:register');
});