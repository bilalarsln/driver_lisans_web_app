<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\OrganisationController;
use App\Http\Controllers\SubstationController;
use App\Http\Controllers\ImportandInformationController;

Auth::routes();

Route::get('/login', [SignController::class, 'login'])->name("login");
Route::post('/signinPost', [SignController::class, 'signInPost'])->name("signInPost");


Route::middleware(['auth'])->group(function () {

    Route::get('/', [AdminController::class, 'admin_index'])->name('admin_index');
    Route::get('/admin_index', [AdminController::class, 'admin_index'])->name('admin_index');
    Route::post('/announcementupdate', [AnnouncementController::class, 'update'])->name('announcementupdate');
    Route::post('/announcementdelete', [AnnouncementController::class, 'delete'])->name('announcementdelete');
    Route::post('/announcementadd', [AnnouncementController::class, 'add'])->name('announcementadd');
    Route::get('/announcement', [AnnouncementController::class, 'announcement'])->name('announcement');
    Route::put('/announcement/{id}/activity', [AnnouncementController::class, 'updateActivity'])->name('announcement.updateActivity');
    Route::get('/manager', [ManagerController::class, 'manager'])->name('manager');
    Route::post('/managerupdate', [ManagerController::class, 'update'])->name('managerupdate');
    Route::post('/managerdelete', [ManagerController::class, 'delete'])->name('managerdelete');
    Route::post('/manageradd', [ManagerController::class, 'add'])->name('manageradd');
    Route::get('/organisation', [OrganisationController::class, 'organisation'])->name('organisation');
    Route::put('/organisation/update/{id}', [OrganisationController::class, 'update'])->name('organisation.update');
    Route::put('/organisation/update/logo/{id}', [OrganisationController::class, 'updateLogo'])->name('organisation.updateLogo');
    Route::get('/substation', [SubstationController::class, 'substation'])->name('substation');
    Route::post('/substationadd', [SubstationController::class, 'add'])->name('substationadd');
    Route::post('/substationupdate', [SubstationController::class, 'update'])->name('substationupdate');
    Route::post('/substationdelete', [SubstationController::class, 'delete'])->name('substationdelete');
    Route::post('/importand_informationupdate', [ImportandInformationController::class, 'update'])->name('importand_informationupdate');
    Route::post('/importand_informationdelete', [ImportandInformationController::class, 'delete'])->name('importand_informationdelete');
    Route::post('/importand_informationadd', [ImportandInformationController::class, 'add'])->name('importand_informationadd');
    Route::get('/importand_information', [ImportandInformationController::class, 'importand_information'])->name('importand_information');
    Route::put('/importand_information/{id}/activity', [ImportandInformationController::class, 'updateActivity'])->name('importand_information.updateActivity');


    /* çıkış işlemleri */
    Route::get('/signout', [SignController::class, 'signout'])->name('signout');
});
