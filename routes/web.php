<?php

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



Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/form', [App\Http\Controllers\HomeController::class, 'form'])->name('form');
Route::post('/save-question', [App\Http\Controllers\HomeController::class, 'saveQuestion'])->name('save.question');
Route::get('/interview', [App\Http\Controllers\InterviewController::class, 'index'])->name('interview');
Route::post('/get-question', [App\Http\Controllers\InterviewController::class, 'getQuestion'])->name('get.question');
