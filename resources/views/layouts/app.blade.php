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
    
    <!-- FLOATING EDITORIAL PILL NAVBAR (Faithful SOLÉM Masterpiece Replication) -->
    <header class="fixed top-0 inset-x-0 z-50 pt-5 px-4 sm:px-8 lg:px-12 pointer-events-none">
        <div class="max-w-7xl mx-auto flex items-center justify-between gap-4">
            
            <!-- Left: Pill Buttons Group (Matching SOLÉM Reference) -->
            <div class="pointer-events-auto flex items-center gap-1.5 sm:gap-2">
                <!-- Grid dots icon pill -->
                <a href="{{ route('home') }}" class="w-9 h-9 rounded-full border border-white/25 bg-black/30 backdrop-blur-md flex items-center justify-center text-white/90 hover:text-white hover:bg-white/20 transition-all shadow-lg" title="Grand Harmoni">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 16 16">
                        <circle cx="4" cy="4" r="1.5"/>
                        <circle cx="12" cy="4" r="1.5"/>
                        <circle cx="4" cy="12" r="1.5"/>
                        <circle cx="12" cy="12" r="1.5"/>
                    </svg>
                </a>

                <!-- Navigation Pill Items -->
                <nav class="hidden md:flex items-center gap-1.5 text-[11px] font-medium tracking-[0.14em] uppercase" aria-label="Navigasi Utama">
                    <a href="{{ route('home') }}" 
                       class="px-4 py-2 rounded-full border {{ request()->routeIs('home') ? 'border-white bg-white/25 text-white' : 'border-white/25 bg-black/30 text-white/90' }} backdrop-blur-md hover:bg-white/20 hover:text-white transition-all shadow-lg">
                        Beranda
                    </a>
                    <a href="{{ route('about') }}" 
                       class="px-4 py-2 rounded-full border {{ request()->routeIs('about') ? 'border-white bg-white/25 text-white' : 'border-white/25 bg-black/30 text-white/90' }} backdrop-blur-md hover:bg-white/20 hover:text-white transition-all shadow-lg">
                        Tentang Kami
                    </a>
                    <a href="{{ route('prices') }}" 
                       class="px-4 py-2 rounded-full border {{ request()->routeIs('prices') ? 'border-white bg-white/25 text-white' : 'border-white/25 bg-black/30 text-white/90' }} backdrop-blur-md hover:bg-white/20 hover:text-white transition-all shadow-lg">
                        Daftar Harga
                    </a>
                    <a href="{{ route('products') }}" 
                       class="px-4 py-2 rounded-full border {{ request()->routeIs('products') ? 'border-white bg-white/25 text-white' : 'border-white/25 bg-black/30 text-white/90' }} backdrop-blur-md hover:bg-white/20 hover:text-white transition-all shadow-lg">
                        Produk & Video
                    </a>
                    <a href="{{ route('booking.index') }}" 
                       class="px-4 py-2 rounded-full border {{ request()->routeIs('booking.index') ? 'border-white bg-white/25 text-white' : 'border-white/25 bg-black/30 text-white/90' }} backdrop-blur-md hover:bg-white/20 hover:text-white transition-all shadow-lg">
                        Data Pesanan
                    </a>
                </nav>
            </div>

            <!-- Center: Address / Coordinates (SOLÉM Style) -->
            <div class="pointer-events-auto hidden xl:block text-center font-mono text-[10px] tracking-[0.22em] uppercase text-white/70 leading-relaxed select-none">
                <span>JL. BOULEVARD SUDIRMAN NO. 88</span><br>
                <span>JAKARTA PUSAT, 10220</span>
            </div>

            <!-- Right: Action CTA & Mobile Toggle -->
            <div class="pointer-events-auto flex items-center gap-2 sm:gap-3">
                <a href="{{ route('booking.create') }}" 
                   class="pressable inline-flex items-center gap-2 px-5 sm:px-6 py-2 sm:py-2.5 rounded-full text-[11px] sm:text-xs font-semibold tracking-wider uppercase bg-white text-[#121110] hover:bg-[#C46849] hover:text-white transition-all shadow-xl">
                    <span>Pesan Kamar</span>
                    <span class="text-xs">↗</span>
                </a>

                <!-- Mobile Hamburger Button -->
                <button type="button" 
                        id="mobile-menu-toggle"
                        aria-expanded="false" 
                        class="md:hidden p-2 rounded-full border border-white/25 bg-black/30 backdrop-blur-md text-white hover:bg-white/20 transition-colors">
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
        <div id="mobile-nav-panel" class="pointer-events-auto hidden md:hidden mt-3 max-w-sm mx-auto bg-[#181715]/95 backdrop-blur-2xl border border-white/15 rounded-3xl p-6 shadow-2xl space-y-4">
            <nav class="flex flex-col space-y-3 text-xs uppercase tracking-widest text-[#C7BFB4]">
                <a href="{{ route('home') }}" class="py-2 border-b border-white/10 hover:text-white">Beranda</a>
                <a href="{{ route('about') }}" class="py-2 border-b border-white/10 hover:text-white">Tentang Kami</a>
                <a href="{{ route('prices') }}" class="py-2 border-b border-white/10 hover:text-white">Daftar Harga</a>
                <a href="{{ route('products') }}" class="py-2 border-b border-white/10 hover:text-white">Produk & Video</a>
                <a href="{{ route('booking.index') }}" class="py-2 border-b border-white/10 hover:text-white">Data Pesanan</a>
                <a href="{{ route('booking.create') }}" class="py-3 mt-2 text-center rounded-full bg-[#C46849] text-white font-bold tracking-wider">
                    Pesan Kamar Sekarang ↗
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

    <!-- ARCHITECTURAL FOOTER (Faithful SOLÉM Masterpiece Replication) -->
    <footer class="bg-[#0D0C0B] text-[#C7BFB4] border-t border-white/10 pt-24 pb-12">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 space-y-16">
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 pb-12 border-b border-white/10">
                
                <!-- Left Title Column -->
                <div class="lg:col-span-5 space-y-6">
                    <span class="text-[11px] font-semibold tracking-[0.25em] uppercase text-[#8C867E]">
                        — KONTAK KAMI
                    </span>
                    <h2 class="font-serif text-4xl sm:text-5xl lg:text-6xl font-normal text-white leading-tight">
                        A Space to Align — <br>
                        <span class="italic text-[#EAE5DC]">Connect with Harmoni.</span>
                    </h2>
                    <p class="text-xs text-[#8C867E] leading-relaxed max-w-sm">
                        Sebuah peristirahatan kontemporer berbalut ketenangan material alami di jantung Jakarta. Dirancang untuk pengalaman menginap berkesan.
                    </p>
                </div>

                <!-- Right Information Columns -->
                <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-8 text-xs">
                    
                    <div class="space-y-4">
                        <div>
                            <span class="text-[10px] font-mono tracking-widest uppercase text-[#8C867E] block mb-1">LOKASI UTAMA</span>
                            <p class="text-[#FAF8F5] leading-relaxed font-light">
                                Jl. Boulevard Sudirman No. 88, Kav. 12<br>
                                Jakarta Pusat, DKI Jakarta 10220
                            </p>
                        </div>
                        <div class="pt-2">
                            <span class="text-[10px] font-mono tracking-widest uppercase text-[#8C867E] block mb-1">EMAIL RESERVASI</span>
                            <p class="text-[#FAF8F5] font-light">
                                reservation@grandharmonihotel.co.id
                            </p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <span class="text-[10px] font-mono tracking-widest uppercase text-[#8C867E] block mb-1">LAYANAN TELEPON</span>
                            <p class="text-[#FAF8F5] leading-relaxed font-light">
                                (021) 555-8989<br>
                                +62 812-3456-7890
                            </p>
                        </div>
                        <div class="pt-2">
                            <span class="text-[10px] font-mono tracking-widest uppercase text-[#8C867E] block mb-1">WAKTU OPERASIONAL</span>
                            <p class="text-[#FAF8F5] leading-relaxed font-light">
                                Check-in: 14.00 WIB • Check-out: 12.00 WIB<br>
                                Front Desk 24 Jam
                            </p>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Full-width Architectural Banner in Footer (SOLÉM Style) -->
            <div class="rounded-3xl overflow-hidden aspect-[21/9] sm:aspect-[24/8] bg-[#181715] border border-white/10 shadow-2xl relative group">
                <img src="{{ asset('assets/images/rooms/detail.jpg') }}" 
                     alt="Grand Harmoni Sanctuary Atmosphere" 
                     class="w-full h-full object-cover filter brightness-[0.85] contrast-[1.05] group-hover:scale-102 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                <div class="absolute bottom-6 left-6 sm:bottom-8 sm:left-8 text-white">
                    <span class="font-serif text-2xl sm:text-3xl font-normal block">Grand Harmoni Sanctuary</span>
                    <span class="text-xs text-[#C7BFB4] font-mono tracking-widest uppercase">Jakarta Residence • Est. 2026</span>
                </div>
            </div>

            <!-- Bottom Sub-footer -->
            <div class="pt-8 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between text-[11px] text-[#6B655D] tracking-wider uppercase gap-4">
                <p>© {{ date('Y') }} HOTEL GRAND HARMONI. ALL RIGHTS RESERVED.</p>
                <p class="font-normal text-[#8C867E]">
                    SKEMA BNSP: <span class="text-[#FAF8F5]">JUNIOR WEB DEVELOPER (FR.SKEMA-02-07)</span>
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
