<?php

Route::get('oauth/dashboard', 'OAuth\DashboardController@dashboard')->middleware('auth');