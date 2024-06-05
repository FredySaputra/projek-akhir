<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Tiket;
use Illuminate\Http\Request;
use App\Models\Film;

class DetailController extends Controller
{
    public function index($jadwal_id)
    {
        $jadwal = Jadwal::findOrFail($jadwal_id);
        $tiket = Tiket::with(['jadwal'])->get();
        return view("detail.detail", compact('tiket',  'jadwal'));
    }

}
