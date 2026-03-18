<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;

Route::inertia('/', 'Welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::middleware(['auth', 'verified', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::inertia('/dashboard', 'user/Dashboard')->name('dashboard');
});

Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function(){
    Route::inertia('/dashboard', 'admin/Dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
