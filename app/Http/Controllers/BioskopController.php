<?php

namespace App\Http\Controllers;

use App\Models\Bioskop;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BioskopController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'bioskop_id' => 'required|unique:bioskop',
            'nama_bioskop' => 'required',
            'lokasi' => 'required',
            'jml_studio' => 'required',
        ]);

        Bioskop::create($validatedData);
        return redirect('/admin')->with('success', 'Data bioskop berhasil ditambahkan.');
    }

    public function edit(string $bioskop_id)
    {
        $bskp = Bioskop::findOrFail($bioskop_id);
        return view("admin.edit-bioskop", compact('bskp'));
    }

    public function update(Request $request, $bioskop_id): RedirectResponse
    {
        $bskp = Bioskop::findOrFail($bioskop_id);
        $bskp->update($request->all());
        return redirect('admin')->with('success', 'Data Berhasil di Update');
    }
}
