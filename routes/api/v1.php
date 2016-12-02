<?php


Route::group(['prefix' => 'v1'], function () {
    Route::post('register', 'ThirdPartyInterfaces\V1\RegisterInterfaceController@handleRequest')->middleware('scope:register');
    Route::post('learn', 'ThirdPartyInterfaces\V1\LearnInterfaceController@handleRequest')->middleware('scope:learn');
    Route::post('consume', 'ThirdPartyInterfaces\V1\ConsumeInterfaceController@handleRequest')->middleware('scope:consume');
    Route::get('query-user-information', 'ThirdPartyInterfaces\V1\QueryUserInformationInterfaceController@handleRequest')->middleware('scope:query-user-information');
    Route::post('modify-bean', 'ThirdPartyInterfaces\V1\ModifyBeanInterfaceController@handleRequest')->middleware('scope:modify-bean');
});