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

Route::get('/panel/help', 
[ActionController::class, 'showHelp'])->name('help');

Route::match(['get', 'post'], '/panel/find-sylabuses', 
[ActionController::class, 'showFoundSylabuses'])->name('find-sylabuses');

Route::post('/panel/searchSylabuses', 
[ActionController::class, 'searchSylabuses'])->name('searchSylabuses');


Route::match(['get', 'post'], 'edit/{code}/{id}', [SylabusController::class, 'read'])->name('read');
Route::match(['get', 'post'], 'edit/{code}/{id}/change', [SylabusController::class, 'change'])->name('change');

Route::match(['get', 'post'], 'content/{code}/{id}', [SylabusController::class, 'readContent'])->name('readContent');
Route::get( 'content/add/{code}/{id}', [SylabusController::class, 'addContent'])->name('addContent');
Route::get( 'content/make/{code}/{id}', [SylabusController::class, 'makeContent'])->name('makeContent');
