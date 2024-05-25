<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class PesanController extends Controller
{
    public function index()
    {
        $film = Film::all();
        return view("nontonbioskop.utama", compact('film'));
    }
}
