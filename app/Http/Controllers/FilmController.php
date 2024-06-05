<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Film;
use Illuminate\Support\Facades\Storage;

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
            'cover' => 'image|file'
        ]);

        $validatedData['cover'] = $request->file('cover')->store('cover');

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
        $request->validate([
            'judul' => 'required|string|max:255',
            'genre' => 'required|string',
            'durasi' => 'required|integer',
            'tgl_rilis' => 'required|date',
            'deskripsi' => 'required|string',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $film = Film::findOrFail($film_id);

        // Ambil semua data kecuali cover
        $data = $request->except('cover');

        if ($request->hasFile('cover')) {
            // Hapus file cover lama jika ada
            if ($film->cover && Storage::disk('public')->exists($film->cover)) {
                Storage::disk('public')->delete($film->cover);
            }

            // Simpan file cover baru
            $file = $request->file('cover');
            $path = $file->store('cover', 'public');
            $data['cover'] = $path; // Tambahkan path cover baru ke data
        }

        // Perbarui film dengan data baru
        $film->update($data);

        return redirect()->route('admin')->with('success', 'Film updated successfully');
    }



    public function destroy($film_id)
    {
        $film = Film::findOrFail($film_id);
        if ($film->cover && Storage::disk('public')->exists($film->cover)) {
            Storage::disk('public')->delete($film->cover);
        }
        $film->delete();
        return back()->with('success', 'Film deleted successfully');
    }
}
