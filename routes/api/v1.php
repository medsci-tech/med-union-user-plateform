<?php


Route::group(['prefix' => 'v1'], function () {
    Route::post('register', 'ThirdPartyInterfaces\V1\RegisterInterfaceController@handleRequest');
});