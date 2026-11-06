<!DOCTYPE html>
<html lang="id" class="h-full scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Grand Harmoni — Architectural Hotel & Sanctuary' }}</title>
    
    <meta name="description" content="Hotel Grand Harmoni — Akomodasi peristirahatan berarsitektur tenang, material alami, dan kenyamanan tak lekang waktu.">
    <meta name="author" content="Peserta Sertifikasi BNSP">

    <!-- Google Fonts: Cormorant Garamond (Editorial Serif) & Plus Jakarta Sans (Modernist Sans) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vite Assets Bundler -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .font-serif {
            font-family: 'Cormorant Garamond', Garamond, Georgia, serif;
        }
        .font-sans {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        }
    </style>
</head>
<body class="min-h-full flex flex-col bg-[#0D0C0B] text-[#F7F5F0] antialiased font-sans selection:bg-[#C46849] selection:text-white">
    
    <!-- FLOATING EDITORIAL PILL NAVBAR (Inspired by SOLÉM) -->
    <header class="fixed top-5 inset-x-0 z-50 px-4 sm:px-6 max-w-6xl mx-auto pointer-events-none">
        <div class="pointer-events-auto bg-[#181715]/80 backdrop-blur-xl border border-white/10 rounded-full px-5 sm:px-7 py-3 flex items-center justify-between shadow-2xl shadow-black/40">
            
            <!-- Left: Minimalist Navigation Links -->
            <nav class="hidden md:flex items-center gap-6 text-[12px] font-medium tracking-[0.16em] uppercase text-[#C7BFB4]" aria-label="Navigasi Utama">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors {{ request()->routeIs('home') ? 'text-white font-semibold' : '' }}">
                    Beranda
                </a>
                <a href="{{ route('products') }}" class="hover:text-white transition-colors {{ request()->routeIs('products') ? 'text-white font-semibold' : '' }}">
                    Produk & Video
                </a>
                <a href="{{ route('prices') }}" class="hover:text-white transition-colors {{ request()->routeIs('prices') ? 'text-white font-semibold' : '' }}">
                    Daftar Harga
                </a>
                <a href="{{ route('about') }}" class="hover:text-white transition-colors {{ request()->routeIs('about') ? 'text-white font-semibold' : '' }}">
                    Tentang Kami
                </a>
                <a href="{{ route('booking.index') }}" class="hover:text-white transition-colors {{ request()->routeIs('booking.index') ? 'text-white font-semibold' : '' }}">
                    Data Pesanan
                </a>
            </nav>

            <!-- Center: Brand Logo / Wordmark -->
            <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                <span class="font-serif text-xl sm:text-2xl font-normal tracking-[0.2em] uppercase text-white group-hover:text-[#E8DFD0] transition-colors">
                    HARMONI
                </span>
                <span class="w-1.5 h-1.5 rounded-full bg-[#C46849]"></span>
            </a>

            <!-- Right: Action Button -->
            <div class="flex items-center gap-3">
                <a href="{{ route('booking.create') }}" 
                   class="pressable inline-flex items-center gap-2 px-5 py-2 rounded-full text-[12px] font-semibold tracking-wider uppercase bg-[#F7F5F0] text-[#121110] hover:bg-[#C46849] hover:text-white transition-all shadow-md">
                    <span>Pesan Kamar</span>
                    <span class="text-xs">→</span>
                </a>

                <!-- Mobile Hamburger Button -->
                <button type="button" 
                        id="mobile-menu-toggle"
                        aria-expanded="false" 
                        class="md:hidden p-2 rounded-full text-[#C7BFB4] hover:text-white hover:bg-white/5 transition-colors">
                    <svg id="menu-icon-bars" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M4 7h16M4 17h16"></path>
                    </svg>
                    <svg id="menu-icon-close" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

        </div>

        <!-- Mobile Drawer Menu -->
        <div id="mobile-nav-panel" class="hidden md:hidden mt-2 bg-[#181715]/95 backdrop-blur-2xl border border-white/10 rounded-3xl p-6 shadow-2xl space-y-4">
            <nav class="flex flex-col space-y-3 text-xs uppercase tracking-widest text-[#C7BFB4]">
                <a href="{{ route('home') }}" class="py-2 border-b border-white/5 hover:text-white">Beranda</a>
                <a href="{{ route('products') }}" class="py-2 border-b border-white/5 hover:text-white">Produk & Video</a>
                <a href="{{ route('prices') }}" class="py-2 border-b border-white/5 hover:text-white">Daftar Harga</a>
                <a href="{{ route('about') }}" class="py-2 border-b border-white/5 hover:text-white">Tentang Kami</a>
                <a href="{{ route('booking.index') }}" class="py-2 border-b border-white/5 hover:text-white">Data Pesanan</a>
                <a href="{{ route('booking.create') }}" class="py-3 mt-2 text-center rounded-full bg-[#C46849] text-white font-bold tracking-wider">
                    Pesan Kamar Sekarang
                </a>
            </nav>
        </div>
    </header>

    <!-- NOTIFIKASI FLASH ALERT MINIMALIS (Jika ada) -->
    @if(session('success'))
        <div class="fixed bottom-6 right-6 z-50 max-w-md bg-[#181715]/95 backdrop-blur-xl border border-white/10 text-white rounded-2xl p-4 shadow-2xl flex items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-[#C46849] animate-pulse"></span>
                <p class="text-xs font-medium text-[#EBE6DC]">{{ session('success') }}</p>
            </div>
            <button type="button" onclick="this.parentElement.remove()" class="text-[#8C867E] hover:text-white text-xs">
                ✕
            </button>
        </div>
    @endif

    @if($errors->any())
        <div class="fixed bottom-6 right-6 z-50 max-w-md bg-[#251A18]/95 backdrop-blur-xl border border-[#C46849]/30 text-white rounded-2xl p-5 shadow-2xl">
            <div class="flex items-start justify-between gap-3">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-[#C46849]">Periksa Isian Formulir</p>
                    <ul class="mt-2 space-y-1 text-xs text-[#E5D5D0]">
                        @foreach($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button type="button" onclick="this.parentElement.parentElement.remove()" class="text-[#8C867E] hover:text-white text-xs">✕</button>
            </div>
        </div>
    @endif

    <!-- MAIN BODY CONTENT -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- ARCHITECTURAL FOOTER (Inspired by SOLÉM Reference Bottom Section) -->
    <footer class="bg-[#0D0C0B] text-[#C7BFB4] border-t border-white/10 pt-24 pb-12">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 pb-20 border-b border-white/10">
                
                <!-- Left Title Column -->
                <div class="lg:col-span-5 space-y-6">
                    <span class="text-[11px] font-semibold tracking-[0.25em] uppercase text-[#8C867E]">
                        — KONTAK KAMI
                    </span>
                    <h2 class="font-serif text-4xl sm:text-5xl font-normal text-white leading-tight">
                        A Space to Unwind — <br>
                        <span class="italic text-[#EAE5DC]">Connect with Harmoni.</span>
                    </h2>
                    <p class="text-xs text-[#8C867E] leading-relaxed max-w-sm">
                        Sebuah peristirahatan kontemporer berbalut ketenangan material alami. Dirancang untuk pengalaman menginap berkesan dan ramah lingkungan.
                    </p>
                </div>

                <!-- Right Information Columns -->
                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-3 gap-8 text-xs">
                    
                    <div class="space-y-2">
                        <span class="text-[11px] font-semibold tracking-widest uppercase text-[#8C867E] block">LOKASI HOTEL</span>
                        <p class="text-[#FAF8F5] leading-relaxed font-light">
                            Jl. Boulevard Sudirman No. 88, Kav. 12<br>
                            Jakarta Pusat, DKI Jakarta 10220
                        </p>
                    </div>

                    <div class="space-y-2">
                        <span class="text-[11px] font-semibold tracking-widest uppercase text-[#8C867E] block">HUBUNGI KAMI</span>
                        <p class="text-[#FAF8F5] leading-relaxed font-light">
                            (021) 555-8989<br>
                            +62 812-3456-7890
                        </p>
                        <span class="text-[11px] font-semibold tracking-widest uppercase text-[#8C867E] block pt-3">EMAIL RESMI</span>
                        <p class="text-[#FAF8F5] font-light">
                            reservation@grandharmonihotel.co.id
                        </p>
                    </div>

                    <div class="space-y-2">
                        <span class="text-[11px] font-semibold tracking-widest uppercase text-[#8C867E] block">WAKTU OPERASIONAL</span>
                        <p class="text-[#FAF8F5] leading-relaxed font-light">
                            Check-in : 14.00 WIB<br>
                            Check-out : 12.00 WIB<br>
                            Front Desk : 24 Jam Siap Melayani
                        </p>
                    </div>

                </div>

            </div>

            <!-- Bottom Sub-footer -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-[11px] text-[#6B655D] tracking-wider uppercase gap-4">
                <p>© {{ date('Y') }} HOTEL GRAND HARMONI. ALL RIGHTS RESERVED.</p>
                <p class="font-normal text-[#8C867E]">
                    SKEMA SERTIFIKASI: <span class="text-[#FAF8F5]">JUNIOR WEB DEVELOPER (FR.SKEMA-02-07)</span>
                </p>
            </div>

        </div>
    </footer>

    <!-- Vanilla JavaScript for Mobile Menu Toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggle = document.getElementById('mobile-menu-toggle');
            const navPanel = document.getElementById('mobile-nav-panel');
            const iconBars = document.getElementById('menu-icon-bars');
            const iconClose = document.getElementById('menu-icon-close');

            if (toggle && navPanel) {
                toggle.addEventListener('click', function () {
                    const isExpanded = toggle.getAttribute('aria-expanded') === 'true';
                    toggle.setAttribute('aria-expanded', !isExpanded);
                    navPanel.classList.toggle('hidden');
                    iconBars.classList.toggle('hidden');
                    iconClose.classList.toggle('hidden');
                });
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
