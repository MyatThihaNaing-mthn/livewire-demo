<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Users\Index;
use App\Livewire\Users\Create;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Logout;

Route::get('/', Index::class)->name('home');

Route::get('/login', Login::class)->name ('login');
Route::get('/logout', Logout::class)->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/users/create', Create::class)->name('users.create');
});



