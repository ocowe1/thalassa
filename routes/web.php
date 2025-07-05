<?php

use App\Http\Controllers\Auth\LoginController;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;


Route::get('/', Welcome::class)->name('welcome');
