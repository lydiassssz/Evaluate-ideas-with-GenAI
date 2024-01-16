<?php

use Illuminate\Support\Facades\Route;

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
});



Route::get('/dashboard', [\App\Http\Controllers\Controller::class, 'top'])->name('dashboard');
Route::get('/details/{id}', [\App\Http\Controllers\Controller::class, 'page'])->name('details');
Route::get('/chatGPT',[\App\Http\Controllers\ChatGptController::class, 'generate_sen'])->name('chatGPT');
Route::post('/chatGPT',[\App\Http\Controllers\ChatGptController::class, 'generate_sen'])->name('chatGPT');

Route::get('/csv',[\App\Http\Controllers\CsvController::class, 'save_csv'])->name('save_csv');
Route::post('/csv',[\App\Http\Controllers\CsvController::class, 'save_csv'])->name('save_csv');
