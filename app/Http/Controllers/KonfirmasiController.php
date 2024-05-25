<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Bioskop;

class KonfirmasiController extends Controller
{
    public function index($film_id)
    {
        $film = Film::findOrFail($film_id);
        Film::all();
        $bioskop = Bioskop::all();
        return view("konfirmasi.konfirmasi", compact('film', 'bioskop'));
    }
}
