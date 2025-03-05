<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Rota principal
Route::get('/', function () {
    return redirect()->route('users.index');
});

// Rotas CRUD completas
Route::resource('users', UserController::class)->except(['show']);