<?php

Route::get('oauth/dashboard', function () {
    return view('oauth.dashboard');
})->middleware('auth');