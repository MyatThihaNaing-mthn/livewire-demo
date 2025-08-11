<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\Livewire\Posts\Index;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('blogs',Index::class)->name('blog.posts.index');
});

