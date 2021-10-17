<?php

use App\Http\Livewire\{
    ShowTweets
};
use Illuminate\Support\Facades\Route;

Route::get('tweets', ShowTweets::class);

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
