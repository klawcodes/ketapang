<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PakarController;

Route::get('/', function () {
  return view('home');
});
Route::post('/kuesioner/proses', [PakarController::class, 'simpanJawaban']);
Route::get('/hasil', [PakarController::class, 'inferensi']);
Route::get('/quiz', [PakarController::class, 'kuesioner']);
