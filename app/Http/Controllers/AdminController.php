<?php

namespace App\Http\Controllers;

use App\Models\Bioskop;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class AdminController extends Controller
{
    public function index()
    {
        $bioskop = Bioskop::all();
        $film = Film::all();
        return view("admin.admin", compact('bioskop', 'film'));
    }

    public function bioskop()
    {
        return view("admin.tmbh-bioskop");
    }

    public function film()
    {
        return view("admin.tambah-film");
    }

    
}
