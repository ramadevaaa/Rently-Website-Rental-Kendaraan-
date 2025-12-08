<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'RentLy - Rental Kendaraan Terpercaya')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <div class="nav-wrapper">
                <a href="{{ route('landing') }}" class="logo">
                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                        <rect width="32" height="32" rx="8" fill="#3B82F6"/>
                        <path d="M8 12L16 8L24 12V20L16 24L8 20V12Z" stroke="white" stroke-width="2" stroke-linejoin="round"/>
                    </svg>
                    <span>RentLy</span>
                </a>

                <button class="mobile-menu-btn" id="mobileMenuBtn">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <div class="nav-menu" id="navMenu">
                    <a href="{{ route('landing') }}" class="nav-link {{ request()->routeIs('landing') ? 'active' : '' }}">Beranda</a>
                    <a href="{{ route('kendaraan.index') }}" class="nav-link {{ request()->routeIs('kendaraan.*') ? 'active' : '' }}">Kendaraan</a>
                    
                    @auth
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.*') ? 'active' : '' }}">Dashboard Admin</a>
                        @else
                            <a href="{{ route('dashboard.user') }}" class="nav-link {{ request()->routeIs('dashboard.*') ? 'active' : '' }}">Dashboard</a>
                        @endif
                        
                        <div class="nav-user">
                            <span class="user-name">{{ auth()->user()->name }}</span>
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-outline">Logout</button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="alert alert-success" id="alertSuccess">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            {{ session('success') }}
            <button class="alert-close" onclick="this.parentElement.remove()">×</button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error" id="alertError">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
            </svg>
            {{ session('error') }}
            <button class="alert-close" onclick="this.parentElement.remove()">×</button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-error" id="alertValidation">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
            </svg>
            <div>
                <strong>Terjadi kesalahan:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button class="alert-close" onclick="this.parentElement.remove()">×</button>
        </div>
    @endif

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="logo">
                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <rect width="32" height="32" rx="8" fill="#3B82F6"/>
                            <path d="M8 12L16 8L24 12V20L16 24L8 20V12Z" stroke="white" stroke-width="2" stroke-linejoin="round"/>
                        </svg>
                        <span>RentLy</span>
                    </div>
                    <p class="footer-desc">Platform rental kendaraan terpercaya dengan pilihan lengkap dan harga terjangkau.</p>
                </div>

                <div class="footer-section">
                    <h3>Menu</h3>
                    <a href="{{ route('landing') }}">Beranda</a>
                    <a href="{{ route('kendaraan.index') }}">Kendaraan</a>
                    <a href="{{ route('kendaraan.index', ['kategori' => 'mobil']) }}">Mobil</a>
                    <a href="{{ route('kendaraan.index', ['kategori' => 'motor']) }}">Motor</a>
                </div>

                <div class="footer-section">
                    <h3>Informasi</h3>
                    <a href="#">Tentang Kami</a>
                    <a href="#">Syarat & Ketentuan</a>
                    <a href="#">Kebijakan Privasi</a>
                    <a href="#">FAQ</a>
                </div>

                <div class="footer-section">
                    <h3>Kontak</h3>
                    <p>📧 info@rently.com</p>
                    <p>📱 +62 812-3456-7890</p>
                    <p>📍 Jakarta, Indonesia</p>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} RentLy. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
    @stack('scripts')
</body>
</html>