<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignController;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('/admin_index', function () {
    return view('admin_panel.admin_index');
})->name("index");
Route::get('/signin', [SignController::class, 'signIn'])->name("signIn");
Route::post('/signinPost', [SignController::class, 'signInPost'])->name("signInPost");
Route::get('/signout', [SignController::class, 'signout'])->name('signout');
