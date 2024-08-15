<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementController;

Auth::routes();

Route::get('/login', [SignController::class, 'login'])->name("login");
Route::post('/signinPost', [SignController::class, 'signInPost'])->name("signInPost");
Route::get('/signout', [SignController::class, 'signout'])->name('signout');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [AdminController::class, 'admin_index'])->name('admin_index');
    Route::get('/admin_index', [AdminController::class, 'admin_index'])->name('admin_index');
    Route::post('/announcementupdate', [AnnouncementController::class, 'update'])->name('announcementupdate');
    Route::post('/announcementdelete', [AnnouncementController::class, 'delete'])->name('announcementdelete');


    // Diğer admin route'ları
});
