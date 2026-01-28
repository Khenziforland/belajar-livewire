<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::livewire('/counter', 'pages::counter');

Route::livewire('/users', 'pages::users');
