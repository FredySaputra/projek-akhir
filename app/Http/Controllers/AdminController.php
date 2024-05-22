<?php

namespace App\Http\Controllers;

use App\Models\Bioskop;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class AdminController extends Controller
{
    public function index()
    {
        return view("admin.admin");
    }

    public function bioskop()
    {
        return view("admin.tmbh-bioskop");
    }

    public function film()
    {
        return view("admin.tambah-film");
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'bioskop_id' => 'required|unique:bioskop',
            'nama_bioskop' => 'required',
            'lokasi' => 'required',
            'jml_studio' => 'required',
        ]);

        Bioskop::create($validatedData);
        return redirect('tambah')->with('success', 'Data bioskop berhasil ditambahkan.');
    }
}
