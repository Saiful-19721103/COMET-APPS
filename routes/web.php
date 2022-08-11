<?php

use Illuminate\Support\Facades\Route;

//Dashboard Load(View Route)
Route::get('/', function(){
    return view('admin.pages.dashboard');
});


