<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use App\Models\Jadwal;

class JadwalController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'jadwal_id' => 'required|unique:jadwal',
            'film_id' => 'required',
            'studio_id' => 'required',
            'tgl_tayang' => 'required',
            'wkt_tayang' => 'required',
            'sisa_kursi' => 'required',
        ]);

        Jadwal::create($validatedData);
        return redirect('/admin')->with('success', 'Data bioskop berhasil ditambahkan.');
    }

    public function edit(string $jammulai_id)
    {
        $jadwal = Jadwal::findOrFail($jammulai_id);
        return view("admin.edit-jadwal", compact('jadwal'));
    }

    public function update(Request $request, $jammulai_id): RedirectResponse
    {
        $jadwal = Jadwal::findOrFail($jammulai_id);
        $jadwal->update($request->all());
        return redirect('admin')->with('success', 'Data Berhasil di Update');
    }

    public function destroy($jammulai_id)
    {
        $jadwal = Jadwal::findOrFail($jammulai_id);
        $jadwal->delete();
        return back();
    }
}
