<?php

Route::post('/callback/github', function (){
    exec('git pull origin master');
});