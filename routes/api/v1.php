<?php


Route::group(['prefix' => 'v1'], function () {
    Route::any('test', 'ThirdPartyInterfaces\V1\TestConnectionInterfaceController@handleRequest');
    Route::post('register', 'ThirdPartyInterfaces\V1\RegisterInterfaceController@handleRequest')->middleware('scope:register');
    Route::post('learn', 'ThirdPartyInterfaces\V1\LearnInterfaceController@handleRequest')->middleware('scope:learn');
    Route::post('consume', 'ThirdPartyInterfaces\V1\ConsumeInterfaceController@handleRequest')->middleware('scope:consume');
});