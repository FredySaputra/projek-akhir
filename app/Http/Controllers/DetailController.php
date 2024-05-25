<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class DetailController extends Controller
{
    public function index($film_id)
    {
        $film = Film::findOrFail($film_id);
        return view("detail.detail", compact('film'));
    }
}
