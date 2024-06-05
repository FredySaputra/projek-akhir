<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Film;

class PesanController extends Controller
{
    public function index()
    {
        $film = Film::all();
        $tanggalHariIni = Carbon::today('Asia/Jakarta')->toDateString();

        // Mengambil data nama_film untuk tanggal hari ini melalui relasi
        $jadwals = Jadwal::whereDate('tgl_tayang', $tanggalHariIni)->with('film')->latest()->get();
        return view("nontonbioskop.utama", compact('film', 'jadwals'));
    }
}
