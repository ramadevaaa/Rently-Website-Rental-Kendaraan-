// routes/web.php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\KendaraanAdminController;
use App\Http\Controllers\Admin\PemesananAdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing Page
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Kendaraan (Public)
Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('kendaraan.index');
Route::get('/kendaraan/{id}', [KendaraanController::class, 'show'])->name('kendaraan.show');

// Authentication Routes (Laravel Breeze/Fortify akan generate otomatis)
// Atau bisa menggunakan ini untuk manual:
Route::get('/login', function() {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::post('/login', function(\Illuminate\Http\Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials, $request->filled('remember'))) {
        $request->session()->regenerate();
        
        if (auth()->user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('dashboard.user');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->onlyInput('email');
})->name('login.post')->middleware('guest');

Route::get('/register', function() {
    return view('auth.register');
})->name('register')->middleware('guest');

Route::post('/register', function(\Illuminate\Http\Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string',
    ]);

    $user = \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'phone' => $request->phone,
        'address' => $request->address,
        'role' => 'user',
    ]);

    Auth::login($user);

    return redirect()->route('dashboard.user');
})->name('register.post')->middleware('guest');

Route::post('/logout', function(\Illuminate\Http\Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('landing');
})->name('logout');

// User Routes (Protected)
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.user');
    
    // Pemesanan
    Route::get('/pemesanan/create/{kendaraan_id}', [PemesananController::class, 'create'])->name('pemesanan.create');
    Route::post('/pemesanan', [PemesananController::class, 'store'])->name('pemesanan.store');
    Route::post('/pemesanan/{id}/cancel', [PemesananController::class, 'cancel'])->name('pemesanan.cancel');
});
// Admin Routes (Protected)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
// Dashboard Admin
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
// CRUD Kendaraan
Route::get('/kendaraan', [KendaraanAdminController::class, 'index'])->name('kendaraan.index');
Route::get('/kendaraan/create', [KendaraanAdminController::class, 'create'])->name('kendaraan.create');
Route::post('/kendaraan', [KendaraanAdminController::class, 'store'])->name('kendaraan.store');
Route::get('/kendaraan/{id}/edit', [KendaraanAdminController::class, 'edit'])->name('kendaraan.edit');
Route::put('/kendaraan/{id}', [KendaraanAdminController::class, 'update'])->name('kendaraan.update');
Route::delete('/kendaraan/{id}', [KendaraanAdminController::class, 'destroy'])->name('kendaraan.destroy');

// Manajemen Pemesanan
Route::get('/pemesanan', [PemesananAdminController::class, 'index'])->name('pemesanan.index');
Route::get('/pemesanan/{id}', [PemesananAdminController::class, 'show'])->name('pemesanan.show');
Route::post('/pemesanan/{id}/status', [PemesananAdminController::class, 'updateStatus'])->name('pemesanan.updateStatus');
Route::delete('/pemesanan/{id}', [PemesananAdminController::class, 'destroy'])->name('pemesanan.destroy');
});