<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\KonfirmasiController;
use App\Http\Controllers\PesanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//user
Route::get('/nontonbioskop', [PesanController::class, 'index']);

Route::get('/detail', [DetailController::class, 'index']);

Route::get('/konfirmasi', [KonfirmasiController::class, 'index']);

//admin
Route::get('/admin', [AdminController::class, 'index']);

//bioskop
Route::get('/admin/tambah-bioskop', [AdminController::class, 'bioskop']);
Route::post("tambah", [AdminController::class, 'store']);
Route::get("tambah", [AdminController::class, 'store']);

//film
Route::get('/admin/tambah-film', [AdminController::class, 'film']);
Route::post('/tambah-film', [FilmController::class, 'store']);