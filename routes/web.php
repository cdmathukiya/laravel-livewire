<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Posts\PostManager;
use App\Livewire\StudentCrud;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/post-manager', \App\Livewire\Posts\PostManager::class);

Route::get('/students', \App\Livewire\StudentCrud::class);
