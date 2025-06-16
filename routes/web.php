<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;



Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'register')->name('register.post');
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login')->name('login.post');
    Route::post('/logout', function () {
        Auth::logout();

        return redirect()->route('login');
    })->name('logout.post');
});


Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        $user = Auth::user();
        return view('index', compact('user'));
    })->name('index');
    Route::resource('/barang', BarangController::class);
    Route::resource('/category', CategoryController::class);
});
