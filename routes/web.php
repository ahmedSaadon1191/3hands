<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\frontEnd\userController;
use App\Http\Controllers\backEnd\adminsController;
use App\Http\Controllers\frontEnd\ProfileController;

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



Route::get('/', [userController::class, 'welcome'])->name('welcome');

Route::prefix('User')->middleware('auth:web')->group(function()
{
    Route::prefix('articales')->group(function()
    {
        Route::get('/', [userController::class, 'articalesIndex'])->name('user.articales.index');
        Route::get('/search', [userController::class, 'search'])->name('user.articales.search');
    });
    Route::prefix('comments')->group(function()
    {
        Route::get('/create/{id}', [userController::class, 'create'])->name('user.comment.create');
        Route::post('/store', [userController::class, 'store'])->name('user.comment.store');
        Route::get('/edit/{id}', [userController::class, 'edit'])->name('user.comment.edit');
        Route::post('/update/{id}', [userController::class, 'update'])->name('user.comment.update');
        Route::get('/show/{id}', [userController::class, 'show'])->name('user.comment.show');
        Route::get('/delete/{id}', [userController::class, 'delete'])->name('user.comment.delete');
    });

    Route::prefix('profile')->group(function()
    {
        Route::get('/edit', [ProfileController::class, 'edit'])->name('user.profile.edit');
        Route::post('/update/{id}', [ProfileController::class, 'update'])->name('user.profile.update');
    });
    
    Route::get('/logout', [userController::class, 'logout'])->name('user.logout');

});


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
