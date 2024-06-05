<?php

namespace App\Http\Controllers;

use App\Models\Bioskop;
use App\Models\Studio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StudioController extends Controller
{
    public function studio(Request $request, string $studio_id)
    {
        $bioskop = Bioskop::findOrFail($studio_id);
        $validatedData = $request->validate([
            'bioskop_id' => 'required',
        ]);
        Studio::create($validatedData);
        return view('/admin/tambah-studio/{studio_id}', compact('bioskop'));
    }
    public function store(Request $request, $studio_id): RedirectResponse
    {
        $validatedData = $request->validate([
            'studio_id' => 'required|unique:studio',
            'bioskop_id' => 'required',
            'nama_studio' => 'required',
            'kap_kursi' => 'required'
        ]);

        Studio::create($validatedData);
        return redirect('/admin')->with('success', 'Data bioskop berhasil ditambahkan.');
    }

    public function edit(string $studio_id)
    {
        $studio = Studio::findOrFail($studio_id);
        return view("admin.edit-studio", compact('studio'));
    }

    public function update(Request $request, $studio_id): RedirectResponse
    {
        $studio = Studio::findOrFail($studio_id);
        $studio->update($request->all());
        return redirect('admin')->with('success', 'Data Berhasil di Update');
    }

    public function destroy($studio_id)
    {
        $studio = Studio::findOrFail($studio_id);
        $studio->delete();
        return back();
    }

    public function cre($bioskop_id)
    {
        $cinema = Bioskop::findOrFail($bioskop_id);
        return view('halls.create', compact('cinema'));
    }

    public function st(Request $request, $bioskop_id)
    {
        $bioskop = Bioskop::findOrFail($bioskop_id);
        $request->validate([
            'name' => 'required|string|max:255',
            'seating_capacity' => 'required|integer',
        ]);

        Studio::create([
            'bioskop_id' => $bioskop->bioskop_id,
            'nama_studio' => $request->input('nama_bioskop'),
            'seating_capacity' => $request->input('seating_capacity'),
        ]);

        return redirect()->route('halls.index', $bioskop_id)->with('success', 'Hall created successfully!');
    }
}
