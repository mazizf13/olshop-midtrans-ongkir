<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', \App\Livewire\Home::class);

Route::get('/TambahProduk', \App\Livewire\TambahProduk::class);

Route::get('/BelanjaUser', \App\Livewire\BelanjaUser::class);
