<?php

use App\Http\Livewire\{
    ShowTweets
};
use Illuminate\Support\Facades\Route;

Route::get('tweets', ShowTweets::class);

Route::get('/', function () {
    return view('welcome');
});
