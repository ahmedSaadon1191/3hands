<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\backEnd\authController;
use App\Http\Controllers\backEnd\adminsController;
use App\Http\Controllers\backEnd\articalsController;
use App\Http\Controllers\BackEnd\CategoryController;
use App\Http\Controllers\backEnd\CommentsController;
use App\Http\Controllers\backEnd\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::prefix('Admin')->group(function()
{
    //START GEUST ROUTS 
        Route::middleware('guest:admin')->group(function()
        {
            Route::get('loginPage1', [authController::class, 'login'])->name('admin.login');
            Route::post('/loginPage', [authController::class, 'makeLogin'])->name('admin.makeLogin');
            Route::get('/test', [authController::class, 'test'])->name('admin.test');
        });
    //END GEUST ROUTS 

    Route::middleware('auth:admin')->group(function()
    {
        // START AUTH ROUTS 
            Route::prefix('Auth')->group(function()
            {
                Route::get('/DashBoard', [authController::class, 'DashBoard'])->name('admin.DashBoard');
                Route::get('/logout', [authController::class, 'logout'])->name('admin.logout');
            });
        // END AUTH ROUTS 

        // STATRT ADMIN ROUTS
            Route::prefix('Admins')->group(function()
            {
                Route::get('/', [adminsController::class, 'index'])->name('admin.index');
                Route::get('/create', [adminsController::class, 'create'])->name('admin.create');
                Route::post('/store', [adminsController::class, 'store'])->name('admin.store');
                Route::get('/edit/{id}', [adminsController::class, 'edit'])->name('admin.edit');
                Route::PUT('/update/{id}', [adminsController::class, 'update'])->name('admin.update');
                Route::Delete('/distroy/{id}', [adminsController::class, 'distroy'])->name('admin.distroy');
            });
        // END ADMIN ROUTS 

        // STATRT CATEGORY ROUTS
            Route::prefix('Categories')->group(function()
            {
                Route::get('/', [CategoryController::class, 'index'])->name('category.index');
                Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
                Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
                Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
                Route::PUT('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
                Route::Delete('/distroy/{id}', [CategoryController::class, 'distroy'])->name('category.distroy');
            });
        // END CATEGORY ROUTS

        // STATRT ARTICALE ROUTS
            Route::prefix('articales')->group(function()
            {
                Route::get('/', [articalsController::class, 'index'])->name('articale.index');
                Route::get('/create', [articalsController::class, 'create'])->name('articale.create');
                Route::post('/store', [articalsController::class, 'store'])->name('articale.store');
                Route::get('/edit/{id}', [articalsController::class, 'edit'])->name('articale.edit');
                Route::get('/show/{id}', [articalsController::class, 'show'])->name('articale.show');
                Route::PUT('/update/{id}', [articalsController::class, 'update'])->name('articale.update');
                Route::Delete('/distroy/{id}', [articalsController::class, 'distroy'])->name('articale.distroy');
            });
        // END ARTICALE ROUTS 

        // STATRT COMMENTS ROUTS
            Route::prefix('comments')->group(function()
            {
                Route::post('/store', [CommentsController::class, 'store'])->name('comment.store');
                Route::PUT('/update/{id}', [CommentsController::class, 'update'])->name('comment.update');
                Route::get('/distroy/{id}', [CommentsController::class, 'distroy'])->name('comment.distroy');
            });
        // END COMMENTS ROUTS 

        // START PROFILE ROUTS 
            Route::prefix('profile')->group(function()
            {
                Route::get('/edit', [ProfileController::class, 'edit'])->name('admin.profile.edit');
                Route::post('/update/{id}', [ProfileController::class, 'update'])->name('admin.profile.update');
            });
        // END PROFILE ROUTS 
    });
});



