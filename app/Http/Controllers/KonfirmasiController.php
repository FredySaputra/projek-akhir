<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\seat;
use App\Models\Wallet;
use Carbon\Carbon;
use App\Models\Jadwal;
use App\Models\Tiket;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Bioskop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class KonfirmasiController extends Controller
{
    public function index($jadwal_id)
    {

        $bioskop = Bioskop::all();

        $today = Carbon::today()->toDateString();
        $jadwals = Jadwal::findOrFail($jadwal_id);
        $film_id = $jadwals->film_id;
        // Ambil jadwal dan seat yang sudah terpesan
        $jadwal = Jadwal::with([
            'studio.bioskop',
            'film',
            'tiket' => function ($query) use ($today) {
                $query->whereDate('created_at', $today); // Pastikan filter tanggal sesuai
            }
        ])->where('film_id', $film_id)->get();

        $filteredJadwal = $jadwal->filter(function ($item) use ($today) {
            return $item->tgl_tayang == $today;
        });

        $groupedJadwal = $filteredJadwal->groupBy(function ($item) {
            return $item->studio->bioskop->nama_bioskop . '-' . $item->tgl_tayang;
        });

        $maxseats = 10;
        $userId = Auth::user()->user_id;
        return view('konfirmasi.konfirmasi', compact('bioskop', 'jadwals', 'groupedJadwal', 'maxseats', 'userId', 'jadwals'));
    }

    public function store(Request $request)
    {
        $jadwalId = $request->input('jadwal_id');
        $selectedSeats = explode(',', $request->input('selected_seats'));

        foreach ($selectedSeats as $seat) {
            // Sesuaikan penyimpanan seat dengan struktur database Anda
            Tiket::create([
                'jadwal_id' => $jadwalId,
                'sisa_kursi' => $seat,
                // 'user_id' => auth()->id(), // Pastikan user sudah login
            ]);
        }

        return redirect()->back()->with('success', 'Seats have been successfully reserved.');
    }

    public function getOccupiedSeats(Request $request)
    {
        $jadwalId = $request->query('jadwal_id');
        $occupiedSeats = Tiket::where('jadwal_id', $jadwalId)->pluck('sisa_kursi')->toArray();
        return response()->json($occupiedSeats);
    }


    public function bangku(Request $request, $jadwal_id)
{
    $jadwal = Jadwal::findOrFail($jadwal_id);
    $selectedSeats = explode(',', $jadwal->terpesan); // Ubah string menjadi array dengan pemisah koma

    Session::put('tanggal', $request->input('tanggal'));
    Session::put('jam', $request->input('jamTayang'));
    Session::put('harga', $request->input('harga'));

    $harga = $request->session()->get("harga");
    $waktu = $request->session()->get("jam");
    $tanggal = $request->session()->get("tanggal");

    return view("konfirmasi.bangku", compact("waktu", "jadwal", "tanggal", "harga", "selectedSeats"));
}



    public function simpan(Request $request, $jadwal_id)
    {
        $jadwal_id = Jadwal::findOrFail($jadwal_id);
        $tanggal = $request->input('tanggal');
        $jam = $request->input('jam');
        $nomor_kursi = $request->input('nomor_kursi');
        $harga = $request->input('harga');
        // Save the values to the session or database
        Session::put('tanggal', $tanggal);
        Session::put('jam', $jam);
        Session::put('nomor_kursi', $nomor_kursi);
        Session::put('harga', $harga);

        // Redirect to the desired page
        return redirect()->route('final', $jadwal_id);
    }

    public function final(Request $request, $jadwal_id)
    {
        $jadwal = Jadwal::findOrFail($jadwal_id);
        $wallet = Wallet::where('user_id', Auth::user()->user_id)->first();
        $waktu = $request->session()->get("jam");
        $tanggal = $request->session()->get("tanggal");
        $kursi = $request->session()->get("nomor_kursi");
        $harga = $request->session()->get("harga");
        $total = count(explode(',', $kursi)) * $harga;
        return view("konfirmasi.confirm", compact("waktu", "tanggal", "kursi", "jadwal", "harga", "wallet", "total"));
    }
    public function session(Request $request, $jadwal_id)
    {
        $jadwal = Jadwal::findOrFail($jadwal_id);
        Session::put('tanggal', $request->input('tanggal'));
        Session::put('jam', $request->input('jamTayang'));
        Session::put('harga', $request->input('harga'));

        return view("konfirmasi.bangku", compact("jadwal"));

    }

    public function confirm(Request $request):RedirectResponse
    {

        $validatedData = $request->validate([
            'user_id' => 'required',
            'jadwal_id' => 'required',
            'nomor_kursi' => 'required',
            'waktu' => 'required',
            'harga' => 'required',
            'tgl_pesan' => 'required'
        ]);


        $tiket = Tiket::create($validatedData);

        $validated = $request->validate([
            'jumlah' => 'required',
            'tgl_payment' => 'required',
        ]);

        $validated['tiket_id'] = $tiket->tiket_id;

        Payment::create($validated);
        
        $wallet = Wallet::where('user_id', Auth::user()->user_id)->first();
        $pay = $request->validate([
            'amount' => 'required',
        ]);
        $wallet->update($pay);
        $jadwal = Jadwal::findOrFail($validatedData['jadwal_id']);
        $existingSeats = explode(',', $jadwal->terpesan);
        $newSeats = explode(',', $validatedData['nomor_kursi']);
        $updatedSeats = array_unique(array_merge($existingSeats, $newSeats));
        $jadwal->terpesan = implode(',', $updatedSeats);
        $jadwal->save();
    
        return redirect('/nontonbioskop')->with('success', 'Berhasil melakukan pembelian tiket bioskop');
    
    }
}
