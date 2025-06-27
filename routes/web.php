<?php

use Illuminate\Support\Facades\Route;
//Controllers

use App\Http\Controllers\admininsertController; // Insert automat doar daca user = admin+auth
use App\Http\Controllers\formularController; // Formular doar pt user auth
use App\Http\Controllers\authController; // Rute de auth
use App\Http\Controllers\landingController; // Landing + helpers pentru vizualizarea datelor user-ului daca este logat

//Nonauth
Route::get('/', [landingController::class, 'index']);
Route::post('/set-role', [landingController::class, 'setAdmin'])->middleware('auth');

Route::middleware('is-logged')->controller(authController::class)->group(function () {
    Route::get('/register', 'registerPage');
    Route::post('/register', 'register');
    Route::get('/login', 'loginPage');
    Route::post('/login', 'login');
});

//auth users
Route::middleware('auth')->group(function () {
    Route::get('/logout', [authController::class, 'logout']);
    //for test rbac
    Route::middleware('admin')->controller(admininsertController::class)->group(function () {
        Route::get('/insert-model', 'insert');
        Route::get('/display-model', 'display');
    });
    Route::controller(formularController::class)->group(function () {
        Route::get('/formular', 'formularPage');
        Route::post('/formular', 'formular');
    });
});

//Need a tip pentru o organizare mai buna a rutelor :)