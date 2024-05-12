<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/settings', [SettingsController::class, 'index'])->name('admin.settings');

Route::get('/admin/users', [UsersController::class, 'show'])->name('admin.users.show');
Route::get('/admin/users/edit/{id}', [UsersController::class, 'edit'])->name('admin.users.edit');

Route::get('/admin/roles', [RolesController::class, 'show'])->name('admin.roles.show');
Route::get('/admin/roles/edit/{id}', [RolesController::class, 'edit'])->name('admin.roles.edit');

require __DIR__.'/auth.php';
