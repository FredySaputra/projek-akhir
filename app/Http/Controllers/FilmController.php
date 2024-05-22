<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'film_id' => 'required|unique:film',
            'judul' => 'required',
            'genre' => 'required',
            'durasi' => 'required',
            'tgl_rilis' => 'required',
            'deskripsi' => 'required',
        ]);

        Film::create($validatedData);
        return redirect('/admin/tambah-film')->with('success', 'Data bioskop berhasil ditambahkan.');
    }
}
