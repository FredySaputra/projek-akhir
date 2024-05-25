<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BioskopController;
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

Route::get('/detail-film/{film_id}', [DetailController::class, 'index']);

Route::get('/konfirmasi/{film_id}', [KonfirmasiController::class, 'index']);

//admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin');

//bioskop
Route::get('/admin/tambah-bioskop', [AdminController::class, 'bioskop']);
Route::post("tambah", [BioskopController::class, 'store']);
Route::get("tambah", [BioskopController::class, 'store']);
Route::get('/edit-bioskop/{bioskop_id}', [BioskopController::class, 'edit'])->name('edit-bioskop');
Route::post('/update-bioskop/{bioskop_id}', [BioskopController::class, 'update'])->name('update-bioskop');
Route::get('/delete-bioskop/{bioskop_id}', [BioskopController::class, 'destroy'])->name('delete-bioskop');
;

//film
Route::get('/admin/tambah-film', [AdminController::class, 'film']);
Route::post('/tambah-film', [FilmController::class, 'store']);
Route::get('/edit-film/{film_id}', [FilmController::class, 'edit'])->name('edit-film');
Route::post('/update-film/{film_id}', [FilmController::class, 'update'])->name('update-film');
Route::get('/delete-film/{film_id}', [FilmController::class, 'destroy'])->name('delete-film');
