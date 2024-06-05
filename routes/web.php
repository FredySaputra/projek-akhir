<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BioskopController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KonfirmasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\StudioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//user
Route::get('/nontonbioskop', [PesanController::class, 'index']);

Route::get('/detail-film/{jadwal_id}', [DetailController::class, 'index']);

Route::get('/konfirmasi/{jadwal_id}', [KonfirmasiController::class, 'index'])->middleware('auth')->name('konfirmasi');
Route::post('/konfirmasi/{jadwal_id}', [KonfirmasiController::class, 'session'])->name('storekonfirmasi');

//regist
Route::get('register', [LoginController::class, 'register'])->name('register');
Route::post('store', [LoginController::class, 'store'])->name('store');

//login
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('sign', [LoginController::class, 'authenticate'])->name('sign');

//logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
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

//studio
Route::get('/admin/tambah-studio', [AdminController::class, 'studio']);
Route::post('/admin/tambah-studio/{studio_id}', [StudioController::class, 'studio']);
Route::get('/tambah-studio/{bioskop_id}', [StudioController::class, 'studio'])->name('tambah-studio');
Route::post('/tambah-studio', [StudioController::class, 'store']);
Route::get('/edit-studio/{studio_id}', [StudioController::class, 'edit'])->name('edit-studio');
Route::post('/update-studio/{studio_id}', [StudioController::class, 'update'])->name('update-studio');
Route::get('/delete-studio/{studio_id}', [StudioController::class, 'destroy'])->name('delete-studio');
;

//jadwal
Route::get('/admin/tambah-jadwal', [AdminController::class, 'jadwal']);
Route::post('/tambah-jadwal', [JadwalController::class, 'store']);
Route::get('/edit-film/{jammulai_id}', [JadwalController::class, 'edit'])->name('edit-jadwal');
Route::post('/update-film/{jammulai_id}', [JadwalController::class, 'update'])->name('update-jadwal');
Route::get('/delete-film/{film_id}', [JadwalController::class, 'destroy'])->name('delete-jadwal');

//tiket
Route::get('/bangku/{jadwal_id}', [KonfirmasiController::class, 'bangku'])->name('bangku');
Route::post('/save-seats/{jadwal_id}', [KonfirmasiController::class, 'simpan'])->name('save-seats');
Route::get('/final/{jadwal_id}', [KonfirmasiController::class, 'final'])->name('final');


//coba
// Route::get('/cinemas/{bioskop_id}/halls/create', [StudioController::class, 'cre'])->name('halls.create');
// Route::post('/cinemas/{bioskop_id}/halls', [StudioController::class, 'st'])->name('halls.store');

Route::post('/seats', [KonfirmasiController::class, 'store'])->name('seats.store');
Route::get('/getOccupiedSeats', [KonfirmasiController::class, 'getOccupiedSeats']);

//konfirmasi
Route::post('/confirm', [KonfirmasiController::class, 'confirm'])->name('confirm');