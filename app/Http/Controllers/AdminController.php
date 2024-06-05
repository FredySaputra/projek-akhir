<?php

namespace App\Http\Controllers;

use App\Models\Bioskop;
use App\Models\Film;
use App\Models\Jadwal;
use App\Models\Studio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class AdminController extends Controller
{
    public function index()
    {
        $bioskop = Bioskop::all();
        $film = Film::all();
        $studio = Studio::all();
        $jadwal = Jadwal::all();

        
        return view("admin.admin", compact('bioskop', 'film', 'jadwal', 'studio'));
    }

    public function bioskop()
    {
        return view("admin.tmbh-bioskop");
    }

    public function studio()
    {
        $bioskop = Bioskop::all();
        return view("admin.tambah-studio", compact('bioskop'));
    }


    public function film()
    {
        return view("admin.tambah-film");
    }

    public function jadwal()
    {
        $bioskop = Bioskop::all();
        $film = Film::all();
        $jadwal = Jadwal::all();

        $jmlStudio = Bioskop::pluck('jml_studio')->toArray();

        return view("admin.tambah-jadwal", compact('bioskop', 'film', 'jadwal', 'jmlStudio'));
    }
}
