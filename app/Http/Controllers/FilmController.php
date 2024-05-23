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
        return redirect('/admin')->with('success', 'Data bioskop berhasil ditambahkan.');
    }

    public function edit(string $film_id)
    {
        $film = Film::findOrFail($film_id);
        return view("admin.edit-film", compact('film'));
    }

    public function update(Request $request, $film_id): RedirectResponse
    {
        $film = Film::findOrFail($film_id);
        $film->update($request->all());
        return redirect('admin')->with('success', 'Data Berhasil di Update');
    }
}
