<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Auth::routes(['reset' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Password management routes
Route::controller(PasswordController::class)->prefix('password')->group(function (){
    Route::post('/store', 'store')->name('password.store');
    Route::get('/show/{id}', 'show')->name('password.show');
    Route::get('/delete/{id}', 'delete')->name('password.delete');
});

// Category management routes
Route::controller(CategoryController::class)->prefix('category')->group(function (){
    Route::get('/', 'index')->name('category.index');
    Route::get('/create', 'create')->name('category.create');
    Route::post('/store', 'store')->name('category.store');
    Route::post('/update/{id}', 'update')->name('category.update');
    Route::get('/show/{id}', 'show')->name('category.show');
    Route::get('/delete/{id}', 'delete')->name('category.delete');
});

Route::get('/violated-passwords', function (){
    return view('violated');
})->name('violated');

Route::get('/security-advice', function (){
    return view('security');
})->name('security');