<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProxyController;

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





Route::get('/proxy/type-gender', [ProxyController::class, 'typeGender']);
Route::get('/proxy/type-group', [ProxyController::class, 'typeGroup']);
Route::post('/proxy/participant', [ProxyController::class, 'participant']);
