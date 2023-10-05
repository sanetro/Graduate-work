<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\SylabusController;

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
[AccountController::class, 'showAccount'])->name('account');

Route::get('/panel/my-sylabuses', 
[ActionController::class, 'showMySylabuses'])->name('my-sylabuses');

Route::match(['get', 'post'], '/panel/find-sylabuses', 
[ActionController::class, 'showFoundSylabuses'])->name('find-sylabuses');

Route::post('/panel/searchSylabuses', 
[ActionController::class, 'searchSylabuses'])->name('searchSylabuses');


Route::get('/{code}/{id}', [SylabusController::class, 'read']);
Route::post('/{code}/{id}/change', [SylabusController::class, 'change'])->name('change');
