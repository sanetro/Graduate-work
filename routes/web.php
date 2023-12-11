<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\SylabusController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\EffectController;

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

Route::match(['get', 'post'], 'content/{code}/{id}', [ContentController::class, 'read'])->name('readContent');
Route::get( 'content/add/{code}/{id}', [ContentController::class, 'add'])->name('addContent');
Route::get( 'content/edit/{code}/{id}', [ContentController::class, 'edit'])->name('editContent');
Route::get( 'content/detailed', [ContentController::class, 'detailed'])->name('detailedContent');
Route::get( 'content/span', [ContentController::class, 'span'])->name('spanContent');
Route::post( 'content/create/{code}/{id}', [ContentController::class, 'create'])->name('createContent');
Route::get( 'content/destroy', [ContentController::class, 'destroy'])->name('destroyContent');
Route::post( 'content/update/{code}/{id}', [ContentController::class, 'update'])->name('updateContent');


Route::match(['get', 'post'], 'effect/{code}/{id}', [EffectController::class, 'read'])->name('readEffect');
Route::get( 'effects/add/{code}/{id}', [EffectController::class, 'add'])->name('addEffect');
Route::get( 'effects/edit/{code}/{id}', [EffectController::class, 'edit'])->name('editEffect');
Route::get( 'effects/detailed', [EffectController::class, 'detailed'])->name('detailedEffect');
Route::get( 'effects/span', [EffectController::class, 'span'])->name('spanEffect');
Route::post( 'effects/create/{code}/{id}', [EffectController::class, 'create'])->name('createEffect');
Route::get( 'effects/destroy', [EffectController::class, 'destroy'])->name('destroyEffect');
Route::post( 'effects/update/{code}/{id}', [EffectController::class, 'update'])->name('updateEffect');
Route::get( 'effects/link', [EffectController::class, 'link'])->name('linkEffect');
