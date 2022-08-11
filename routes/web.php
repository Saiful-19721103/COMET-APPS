<?php

use Illuminate\Support\Facades\Route;

//Dashboard Load(View Route)
Route::get('/', function(){
    return view('admin.pages.dashboard');
});

//Login Page Load()
Route::get('/login', function(){
    return view('admin.pages.login');
});


