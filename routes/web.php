<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home')->middleware('auth');
Route::get('/register', Register::class)->name('register');
Route::get('/login', Login::class)->name('login');
