<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::livewire('/counter', 'pages::counter');

Route::livewire('/users', 'pages::users');

Route::livewire('/posts', 'pages::post.index');
Route::livewire('/posts/create', 'pages::post.create');
Route::livewire('/posts/{id}', 'pages::show-post');
Route::livewire('/posts/{id}/edit', 'pages::post.edit');
