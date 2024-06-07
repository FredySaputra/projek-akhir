<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'login',
            'active' => 'login'
        ]);
    }


    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Jika kata sandi telah dienkripsi dengan Bcrypt, gunakan Hash::check
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->flash('login', 'Berhasil Login');
            return redirect()->intended('/nontonbioskop');
        }


        return back()->with('loginError', 'Login gagal! Email atau password salah!');
    }

    public function register()
    {
        return view("login.register");

    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        $validated = $request->validate([
            'amount' => "required",
            
        ]);

        $validated['user_id'] = $user->user_id;

        Wallet::create($validated);
        $request->session()->flash('success', 'Registrasi Berhasil!');
        return redirect('login');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flash('oke', 'Anda berhasil logout!');
        return redirect('/nontonbioskop');
    }
}
