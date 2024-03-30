<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Posts\PostManager;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/post-manager', PostManager::class);
Route::get('/post-manager', \App\Livewire\Posts\PostManager::class);
