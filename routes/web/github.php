<?php

Route::post('/callback/github', function (){
    exec('sudo git pull origin '.env('GITHUB_WEBHOOK_BRANCH'), $d);
    return response('ok');
});

Route::get('/callback/github', function (){
    exec('sudo git pull origin '.env('GITHUB_WEBHOOK_BRANCH'), $d);
    dd($d);
});