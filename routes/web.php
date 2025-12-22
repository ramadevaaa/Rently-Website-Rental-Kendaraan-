
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\KendaraanAdminController;
use App\Http\Controllers\Admin\PemesananAdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing Page
Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/', function () {
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard'); // Admin otomatis ke dashboard
    }

    return app(App\Http\Controllers\LandingController::class)->index();
})->name('landing');

// Kendaraan (Public)
Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('kendaraan.index');
Route::get('/kendaraan/{id}', [KendaraanController::class, 'show'])->name('kendaraan.show');
Route::middleware('role:user')->group(function () {
    Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('kendaraan.index');
    Route::get('/kendaraan/{id}', [KendaraanController::class, 'show'])->name('kendaraan.show');
});

// Informasi 
Route::get('/tentang-kami', function () {
    return view('informasi_footer.tentangkami');
})->name('tentang-kami');

Route::get('/syarat-ketentuan', function () {
    return view('informasi_footer.syaratketentuan');
})->name('syarat-ketentuan');

Route::get('/kebijakan-privasi', function () {
    return view('informasi_footer.kebijakanprivasi');
})->name('kebijakan-privasi');

Route::get('/faq', function () {
    return view('informasi_footer.faq');
})->name('faq');

// Authentication Routes (Laravel Breeze/Fortify akan generate otomatis)
// Atau bisa menggunakan ini untuk manual:

// User Routes (Protected)
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.user');
    
    // Profil User
// Profil User
    Route::get('/profile', [ProfileController::class, 'show'])
        ->name('profile.show');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

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

//reset-password
Route::middleware('guest')->group(function () {
    // Forgot Password
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
        ->name('password.request');
    
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
        ->name('password.email');
    
    // Reset Password
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
        ->name('password.reset');
    
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])
        ->name('password.update');
});

// AUTH (GUEST)
Route::middleware('guest')->group(function () {

    // LOGIN USER (STRICT)
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'loginUser'])
        ->name('login.user');

    // REGISTER (USER)
    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.post');
});

// menambah /admin pada URL
Route::prefix('admin')->middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showAdminLogin'])
        ->name('admin.login');

    Route::post('/login', [AuthController::class, 'loginAdmin'])
        ->name('admin.login.post');
});


// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Memastikan hanya admin yang mengakses page admin, user tidak bisa
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/', function(){
            return redirect()->route('admin.dashboard');
        });

    });