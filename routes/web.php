<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CoupleController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/register');

Route::get('/home', [LoginController::class, 'home']);
Route::get('/register', [LoginController::class, 'index']);
Route::post('/register', [LoginController::class, 'register']);

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'masuk']);

Route::get('/payment', [LoginController::class, 'payment']);
Route::put('/topup', [UserController::class, 'topup']);
Route::post('/pay', [UserController::class, 'payment']);

Route::put('/reqMatch', [CoupleController::class, 'reqMatch'])->middleware('auth');
Route::put('/accMatch', [CoupleController::class, 'accMatch']);


Route::get('/like', [LikeController::class, 'like'])->middleware('auth');

Route::get('/logout', [LoginController::class, 'logout']);
