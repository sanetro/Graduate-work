<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome'); 
})->name('welcome');

Route::post('/login', 
[AuthenticationController::class, 'login'])->name('login');

Route::get('/panel', 
[AuthenticationController::class, 'panel'])->name('panel');

Route::get('/logout', 
[AuthenticationController::class, 'logout'])->name('logout');


Route::get('/panel/account', 
[AccountController::class, 'show'])->name('account');