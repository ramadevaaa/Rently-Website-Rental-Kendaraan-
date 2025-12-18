<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // 


class AuthController extends Controller
    {
    // =====================
    // LOGIN
    // =====================
    public function showLogin()
    {
        return view('auth.login');
    }
    public function showAdminLogin()
{
    return view('auth.loginadmin');
}

public function loginAdmin(Request $request) //login sebagai admin
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (!Auth::attempt($credentials)) {
        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

    // USER DILARANG LOGIN VIA /admin/login
    if (auth()->user()->role !== 'admin') {
        Auth::logout();
        return back()->withErrors([
            'email' => 'Akun ini bukan admin',
        ]);
    }

    $request->session()->regenerate();
    return redirect()->route('admin.dashboard');

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }
    public function loginUser(Request $request) //login sebagai user
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (!Auth::attempt($credentials)) {
        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

    // ADMIN DILARANG LOGIN VIA /login
    if (auth()->user()->role !== 'user') {
        Auth::logout();
        return back()->withErrors([
            'email' => 'Akun admin harus login melalui halaman admin',
        ]);
    }

    $request->session()->regenerate();
    return redirect()->route('dashboard.user');
     return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
}

    // =====================
    // REGISTER
    // =====================
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => 'user',
        ]);

        // ⛔ JANGAN AUTO LOGIN
        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil, silakan login');
    }

    // =====================
    // LOGOUT
    // =====================
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing');
    }
}
