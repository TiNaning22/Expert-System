<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {

        // dd($request->all());

        // Validasi input
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Hardcoded username dan password admin
        $adminUsername = 'admin';
        $adminPassword = 'admin';

        // Cek username dan password
        if ($credentials['username'] === $adminUsername && $credentials['password'] === $adminPassword) {
            // Set session untuk login
            $request->session()->put('is_admin', true);

            // Arahkan ke dashboard
            return redirect('/dashboard');
        }

        // Jika gagal, kembali dengan pesan error
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);

    }

    public function logout()
    { 
        session()->forget('login');
        return redirect('login');
    }
}
