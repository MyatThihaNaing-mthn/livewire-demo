<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Users\Index;
use App\Livewire\Users\Create;
use App\Livewire\Auth\Login;

Route::get('/', function () { return view('welcome'); });

Route::get('/login', Login::class)->name ('login');

Route::get('/users', Index::class);
Route::get('/users/create', Create::class);


Route::get('/test-cache', function () {
    $user = Auth::user();
    if (!$user) return 'Not logged in';

    $permissions = Cache::get("user_permissions_{$user->id}");
    return response()->json($permissions);
});