<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $request->validate([
            'id_laundry' => 'required',
            'password' => 'required|min:8'
        ]);

        $admin = Admin::where('id_laundry', $request->id_laundry)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            // session(['admin_id' => $admin->id]);
            Auth::login($admin);
            return redirect('/dashboard');
        }

        return back()->withErrors(['invalid' => 'IDLaundry atau password salah']);
    }

    public function showRegister() {
        return view('auth.register');
    }

    public function register(Request $request) {
        $request->validate([
            'nama' => 'required',
            'id_laundry' => 'required|unique:admins',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:8'
        ]);

        Admin::create([
            'nama' => $request->nama,
            'id_laundry' => $request->id_laundry,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Akun berhasil dibuat');
    }

    public function logout() {
        session()->forget('admin_id');
        return redirect('/login');
    }
}
