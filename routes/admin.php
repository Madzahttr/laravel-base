<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

Route::name('admin.')->prefix('admin')->group(function() {
    Route::controller(MainController::class)->group(function() {
        Route::get('/', 'index')->name('overview');
    });
    Route::controller(SettingsController::class)->group(function() {
        Route::get('/settings', 'index')->name('settings');
    });
    Route::name('users.')->prefix('users')->controller(UsersController::class)->group(function() {
        Route::get('/', 'show')->name('show');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/edit/{id}', 'update')->name('update');
        Route::delete('/edit/{id}', 'destroy')->name('destroy');
    });
    Route::name('roles.')->prefix('roles')->controller(RolesController::class)->group(function() {
        Route::get('/', 'show')->name('show');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::patch('/edit/{id}', 'update')->name('update');
        Route::delete('/edit/{id}', 'destroy')->name('destroy');
    });
});