<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminPageController;

//Dashboard Load(View Route)
//Route::get('/', function(){
    //return view('admin.pages.dashboard');
//});

//Login Page Load()
//Route::get('/login', function(){
    //return view('admin.pages.login');
//});

// Admin Auth Route [Login Page]
Route::get('/admin-login', [AdminAuthController::class, 'showLoginPage'])->name('admin.login.page');

// Admin Page Route [Dashboard Page]
Route::get('/dashboard', [AdminPageController::class, 'showDashboard'])->name('admin.dashboard');


