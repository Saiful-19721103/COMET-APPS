<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PortfolioCategoryController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\FrontendPageController;
use Illuminate\Support\Facades\Route;

/**
 * Backend Route start
 */

//Dashboard Load(View Route)
//Route::get('/', function(){
//return view('admin.pages.dashboard');
//});

//Login Page Load()
//Route::get('/login', function(){
//return view('admin.pages.login');
//});

// Admin Auth Route [Login Page]
//Route::get('/admin-login', [AdminAuthController::class, 'showLoginPage'])->name('admin.login.page');
//Route::post('/admin-login', [AdminAuthController::class, 'login'])->name('admin.login');

//Group Route
Route::group(['middleware' => 'admin.redirect'], function () {
    Route::get('/admin-login', [AdminAuthController::class, 'showLoginPage'])->name('admin.login.page');
    Route::post('/admin-login', [AdminAuthController::class, 'login'])->name('admin.login');
});

// Admin Page Route [Dashboard Page]
//Route::get('/dashboard', [AdminPageController::class, 'showDashboard'])->name('admin.dashboard');

//Group Route
Route::group(['middleware' => 'admin'], function () {
    Route::get('/dashboard', [AdminPageController::class, 'showDashboard'])->name('admin.dashboard');
    //Logout Controller
    Route::get('/admin-logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    //Permission Route
    Route::resource('/permission', PermissionController::class);
    //Roles Route
    Route::resource('/role', RoleController::class);
    Route::resource('/admin-user', AdminController::class);

    //For Admin User Update
    Route::get('/admin-user-status-update/{id}', [AdminController::class, 'updateStatus'])->name('admin.status.update');
    //For Admin User [Trash] Update
    Route::get('/admin-user-trash-update/{id}', [AdminController::class, 'updateTrash'])->name('admin.trash.update');
    //For Admin User [Return from Trash]
    Route::get('/admin-trash', [AdminController::class, 'trashUsers'])->name('admin.trash');
});
/**
 * Backend Route Ends
 */

/**
 * Frontend Routes
 */
Route::get('/', [FrontendPageController::class, 'showHomePage'])->name('home.page');
Route::get('/contact', [FrontendPageController::class, 'showContactPage'])->name('contact.page');

/**
 *Slider Routes
 */
Route::resource('/slider', SliderController::class);
Route::resource('/testimonial', TestimonialController::class);
Route::resource('/client', ClientController::class);
Route::resource('/counter', CounterController::class);
Route::resource('/portfolio-category', PortfolioCategoryController::class);
Route::resource('/portfolio', PortfolioController::class);
