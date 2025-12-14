<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - RentLy</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @stack('styles')
</head>
<body>
    
    <!-- Langsung ke content, tanpa navbar -->
    @yield('content')
    
    <!-- Tanpa footer -->
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>