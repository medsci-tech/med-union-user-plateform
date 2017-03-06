<?php


Route::group(['prefix' => 'v2'], function () {
    Route::get('query-user-information', 'ThirdPartyInterfaces\V2\QueryUserInformationInterfaceController@handleRequest')->middleware('scope:air-classes');
    Route::post('modify-bean', 'ThirdPartyInterfaces\V2\ModifyBeanInterfaceController@handleRequest')->middleware('scope:air-classes');
    Route::post('modify-user-information', 'ThirdPartyInterfaces\V2\ModifyUserInformationInterfaceController@handleRequest')->middleware('scope:air-classes');
});