<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Tiket;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Film;
use Illuminate\Support\Facades\Auth;


class PesanController extends Controller
{
    public function index()
    {   
        $film = Film::all();
        $tanggalHariIni = Carbon::today('Asia/Jakarta')->toDateString();

        // Mengambil data nama_film untuk tanggal hari ini melalui relasi
        $jadwals = Jadwal::whereDate('tgl_tayang', $tanggalHariIni)->with('film')->latest()->get();
        $jadwal = $jadwals->groupBy('film_id')->map(function ($group) {
            return $group->first();
        });
        return view("nontonbioskop.utama", compact('film', 'jadwals','jadwal'));
    }

    public function riwayat($user_id)
    {
        $user = User::findOrFail($user_id);
        $tiket = Tiket::where('user_id',$user_id)->get();
        return view("riwayat.riwayat",compact("user","tiket"));
    }
}
