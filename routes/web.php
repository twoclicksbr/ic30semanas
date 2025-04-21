<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', fn () => view('welcome'));

Route::get('/', function () {
    return view('home', [
        'featuredVideo' => ['link_youtube' => 'dQw4w9WgXcQ'], 
    ]);
});

Route::get('/cadastro', function () {
    return view('register', [
        'apiUrl' => env('API_URL'), 
        'userName' => env('API_USERNAME'),
        'token' => env('API_TOKEN'),
    ]);
});