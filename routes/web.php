<?php

use Illuminate\Support\Facades\{Route,Auth};

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

Route::get('/', function () {
    return view('frontend.home');
});

Auth::routes([
    'register' => false, // Registration Dinonaktifkan
    'reset' => false, // Password Reset Dinonaktifkan
    'verify' => false, // Email Verification Dinonaktifkan
  ]);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::get('/show-post', [App\Http\Controllers\PostController::class, 'index'])->name('show.post');
Route::get('/create-post', [App\Http\Controllers\PostController::class, 'create'])->name('create.post');
Route::post('/upload-post', [App\Http\Controllers\PostController::class, 'store'])->name('upload.post');
Route::put('/edit-post/{post}', [App\Http\Controllers\PostController::class, 'update'])->name('edit.post');
Route::delete('/delete-post/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('delete.post');

Route::get('/permissions', [App\Http\Controllers\PermissionController::class, 'index'])->name('permission');

Route::get('/accounts', [App\Http\Controllers\AccountController::class, 'index'])->name('accounts');
Route::post('/accounts', [App\Http\Controllers\AccountController::class, 'store'])->name('create.accounts');
Route::put('/accounts/{user}', [App\Http\Controllers\AccountController::class, 'update'])->name('update.accounts');
Route::delete('/accounts/{user}', [App\Http\Controllers\AccountController::class, 'destroy'])->name('delete.accounts');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::put('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('update.profile');
Route::put('/profile/updatePassword', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('updatePassword.profile');

Route::get('/level-account', [App\Http\Controllers\RoleController::class, 'index'])->name('level.account');
Route::post('/level-account', [App\Http\Controllers\RoleController::class, 'store'])->name('create.level.account');
Route::delete('/level-account/{role}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('delete.level.account');
Route::put('/level-account/{role}', [App\Http\Controllers\RoleController::class, 'update'])->name('update.level.account');