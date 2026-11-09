<!DOCTYPE html>
<html lang="id" class="h-full scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'JW Marriott Hotel Jakarta — Grand Harmoni Luxury Sanctuary' }}</title>
    
    <meta name="description" content="JW Marriott Hotel Jakarta — Peristirahatan berarsitektur mewah, keramahan bintang lima tak lekang waktu, dan kenyamanan istimewa di Jakarta.">
    <meta name="author" content="JW Marriott Hotel Jakarta">

    <!-- Google Fonts: Cormorant Upright & Cormorant Infant (Serif) + Sora (Clean Sans) + JetBrains Mono -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Infant:ital,wght@0,600;0,700;1,600;1,700&family=Cormorant+Upright:wght@400;500;600;700&family=Sora:wght@200;300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    <!-- Vite Assets Bundler -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Sora', system-ui, -apple-system, sans-serif;
            background-color: #f9f6f3;
            color: #1a1a1a;
        }
        .font-serif {
            font-family: 'Cormorant Upright', 'Cormorant Infant', Georgia, serif;
        }
        .font-sans {
            font-family: 'Sora', system-ui, -apple-system, sans-serif;
        }
        .font-mono {
            font-family: 'JetBrains Mono', monospace;
        }
    </style>
</head>
<body class="min-h-full flex flex-col bg-[#f9f6f3] text-[#1a1a1a] antialiased selection:bg-[#d16806] selection:text-white">

    <!-- ==========================================
         TOP CONTACT BAR (Mellow & Luxury Hotel Reference)
         ========================================== -->
    <div class="border-b border-[#e9e9e9] bg-[#f9f6f3] text-[#606060] text-xs py-2 px-4 sm:px-8 lg:px-14">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-2">
            <!-- Contact Info: Phone & Email -->
            <div class="flex items-center gap-6 text-[13px]">
                <a href="tel:0215558989" class="flex items-center gap-2 hover:text-[#d16806] transition-colors">
                    <svg class="w-3.5 h-3.5 text-[#d16806]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <span>(021) 555-8989</span>
                </a>
                <span class="text-[#e2ded9] hidden sm:inline">|</span>
                <a href="mailto:reservation@grandharmonihotel.co.id" class="flex items-center gap-2 hover:text-[#d16806] transition-colors">
                    <svg class="w-3.5 h-3.5 text-[#d16806]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>reservation@grandharmonihotel.co.id</span>
                </a>
            </div>

            <!-- Luxury Location & Social Icons -->
            <div class="flex items-center gap-4 text-xs">
                <span class="text-[#999] tracking-wider uppercase text-[11px] hidden md:inline">JW Marriott Jakarta • Mega Kuningan</span>
                <div class="flex items-center gap-3 text-[#737373]">
                    <a href="#" class="hover:text-[#d16806] transition-colors" title="Instagram">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <a href="#" class="hover:text-[#d16806] transition-colors" title="Facebook">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- ==========================================
         MAIN NAVBAR (JW Marriott & Mellow Aesthetic)
         ========================================== -->
    <header class="sticky top-0 z-40 bg-[#f9f6f3]/95 backdrop-blur-md border-b border-[#e9e9e9]">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-14 py-4 flex items-center justify-between gap-4">
            
            <!-- Left: Logo JW Marriott x Grand Harmoni -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="relative w-9 h-8 flex items-center justify-center">
                    <!-- Stylized Marriott Griffin / M-Emblem SVG -->
                    <svg class="w-8 h-8 text-[#d16806]" viewBox="0 0 44 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 30V4L22 22L40 4V30" stroke="#d16806" stroke-width="4.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="22" cy="7" r="3.5" fill="#d16806" />
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="font-serif italic font-bold text-2xl tracking-[0.14em] text-[#1a1a1a] uppercase leading-none group-hover:text-[#d16806] transition-colors">
                        JW MARRIOTT
                    </span>
                    <span class="text-[9px] font-sans font-medium tracking-[0.25em] text-[#737373] uppercase">
                        Jakarta • Grand Harmoni
                    </span>
                </div>
            </a>

            <!-- Center: Navigation Links -->
            <nav class="hidden md:flex items-center gap-8 text-[14px] font-normal tracking-[0.04em] text-[#353535]" aria-label="Navigasi Utama">
                <a href="{{ route('home') }}" 
                   class="hover:text-[#d16806] transition-colors {{ request()->routeIs('home') ? 'text-[#d16806] font-medium' : '' }}">
                    Beranda
                </a>
                <a href="{{ route('about') }}" 
                   class="hover:text-[#d16806] transition-colors {{ request()->routeIs('about') ? 'text-[#d16806] font-medium' : '' }}">
                    Tentang Kami
                </a>
                <a href="{{ route('products') }}" 
                   class="hover:text-[#d16806] transition-colors {{ request()->routeIs('products') ? 'text-[#d16806] font-medium' : '' }}">
                    Koleksi Kamar
                </a>
                <a href="{{ route('prices') }}" 
                   class="hover:text-[#d16806] transition-colors {{ request()->routeIs('prices') ? 'text-[#d16806] font-medium' : '' }}">
                    Daftar Tarif
                </a>
                <a href="{{ route('booking.index') }}" 
                   class="hover:text-[#d16806] transition-colors {{ request()->routeIs('booking.index') ? 'text-[#d16806] font-medium' : '' }}">
                    Data Reservasi
                </a>
            </nav>

            <!-- Right: Action CTA & Mobile Toggle -->
            <div class="flex items-center gap-3">
                <a href="{{ route('booking.create') }}" 
                   class="pressable inline-flex items-center gap-2 px-5 sm:px-6 py-2.5 rounded-[9px] bg-[#d16806] hover:bg-[#b55804] text-white text-xs font-semibold tracking-wider uppercase shadow-sm">
                    <span>Pesan Kamar</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>

                <!-- Mobile Hamburger Button -->
                <button type="button" 
                        id="mobile-menu-toggle"
                        aria-expanded="false" 
                        class="md:hidden p-2 rounded-[9px] border border-[#e9e9e9] bg-white text-[#353535] hover:bg-[#f2eee9] transition-colors">
                    <svg id="menu-icon-bars" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 7h16M4 17h16"></path>
                    </svg>
                    <svg id="menu-icon-close" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

        </div>

        <!-- Mobile Drawer Menu -->
        <div id="mobile-nav-panel" class="hidden md:hidden border-t border-[#e9e9e9] bg-white px-6 py-5 shadow-lg">
            <nav class="flex flex-col space-y-3 text-sm text-[#353535]">
                <a href="{{ route('home') }}" class="py-2 border-b border-[#f0ece7] hover:text-[#d16806]">Beranda</a>
                <a href="{{ route('about') }}" class="py-2 border-b border-[#f0ece7] hover:text-[#d16806]">Tentang Kami</a>
                <a href="{{ route('products') }}" class="py-2 border-b border-[#f0ece7] hover:text-[#d16806]">Koleksi Kamar</a>
                <a href="{{ route('prices') }}" class="py-2 border-b border-[#f0ece7] hover:text-[#d16806]">Daftar Tarif</a>
                <a href="{{ route('booking.index') }}" class="py-2 border-b border-[#f0ece7] hover:text-[#d16806]">Data Reservasi</a>
                <a href="{{ route('booking.create') }}" class="py-3 mt-2 text-center rounded-[9px] bg-[#d16806] text-white font-medium text-xs uppercase tracking-wider">
                    Pesan Kamar Sekarang →
                </a>
            </nav>
        </div>
    </header>

    <!-- NOTIFIKASI FLASH ALERT MINIMALIS -->
    @if(session('success'))
        <div class="fixed bottom-6 right-6 z-50 max-w-md bg-white border border-[#d16806]/40 text-[#1a1a1a] rounded-[14px] p-4 shadow-xl flex items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <span class="w-2.5 h-2.5 rounded-full bg-[#d16806]"></span>
                <p class="text-xs font-medium text-[#1a1a1a]">{{ session('success') }}</p>
            </div>
            <button type="button" onclick="this.parentElement.remove()" class="text-[#737373] hover:text-[#1a1a1a] text-xs">
                ✕
            </button>
        </div>
    @endif

    @if($errors->any())
        <div class="fixed bottom-6 right-6 z-50 max-w-md bg-white border border-red-300 text-red-900 rounded-[14px] p-5 shadow-xl">
            <div class="flex items-start justify-between gap-3">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-red-700">Periksa Isian Formulir</p>
                    <ul class="mt-2 space-y-1 text-xs text-red-800">
                        @foreach($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button type="button" onclick="this.parentElement.parentElement.remove()" class="text-red-400 hover:text-red-700 text-xs">✕</button>
            </div>
        </div>
    @endif

    <!-- MAIN BODY CONTENT -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- ==========================================
         FOOTER (Luxury Hospitality Standard)
         ========================================== -->
    <footer class="bg-white border-t border-[#e9e9e9] pt-20 pb-12 text-[#606060]">
        <div class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-14">
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-12 pb-16 border-b border-[#e9e9e9]">
                
                <!-- Col 1: About & Logo (4 cols) -->
                <div class="lg:col-span-4 space-y-5">
                    <a href="{{ route('home') }}" class="flex items-center gap-2">
                        <svg class="w-7 h-6 text-[#d16806]" viewBox="0 0 44 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 30V4L22 22L40 4V30" stroke="#d16806" stroke-width="4.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <circle cx="22" cy="7" r="3.5" fill="#d16806" />
                        </svg>
                        <span class="font-serif italic font-bold text-2xl tracking-[0.14em] text-[#1a1a1a] uppercase">
                            JW MARRIOTT
                        </span>
                    </a>
                    <p class="text-xs text-[#606060] leading-relaxed max-w-sm font-light">
                        Selamat datang di JW Marriott Hotel Jakarta — Grand Harmoni. Kenyamanan mewah bertaraf bintang lima di kawasan prestisius Mega Kuningan, Jakarta.
                    </p>
                    <div class="pt-2 text-xs font-mono text-[#8c867e]">
                        <span>MEGA KUNINGAN, JAKARTA • EST. 2026</span>
                    </div>
                </div>

                <!-- Col 2: Newsletter Subscription (3 cols) -->
                <div class="lg:col-span-3 space-y-4">
                    <h3 class="font-serif text-xl font-normal text-[#1a1a1a]">Buletin & Penawaran Eksklusif</h3>
                    <p class="text-xs text-[#737373] leading-relaxed">
                        Dapatkan informasi promosi musim liburan dan penawaran kamar terbaik langsung di email Anda.
                    </p>
                    <form onsubmit="event.preventDefault(); alert('Terima kasih telah mendaftar buletin!');" class="space-y-2">
                        <input type="email" placeholder="Alamat email Anda" required
                               class="w-full text-xs px-3.5 py-2.5 rounded-[9px] border border-[#e9e9e9] bg-[#f9f6f3] focus:outline-none focus:border-[#d16806]">
                        <button type="submit" 
                                class="w-full px-4 py-2.5 rounded-[9px] bg-[#d16806] hover:bg-[#b55804] text-white text-xs font-medium tracking-wide uppercase transition-colors">
                            Langganan Buletin →
                        </button>
                    </form>
                </div>

                <!-- Col 3: Contact Info (3 cols) -->
                <div class="lg:col-span-3 space-y-4 text-xs">
                    <h3 class="font-serif text-xl font-normal text-[#1a1a1a]">Informasi Kontak</h3>
                    
                    <div class="space-y-3">
                        <div class="flex items-start gap-3">
                            <svg class="w-4 h-4 text-[#d16806] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <p class="leading-relaxed text-[#353535]">
                                Jl. Boulevard Sudirman No. 88, Kawasan Mega Kuningan<br>
                                Jakarta Pusat & Selatan, DKI Jakarta 10220
                            </p>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 text-[#d16806] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span class="text-[#353535]">(021) 555-8989</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 text-[#d16806] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span class="text-[#353535] break-all">reservation@grandharmonihotel.co.id</span>
                        </div>
                    </div>
                </div>

                <!-- Col 4: Quick Nav Links (2 cols) -->
                <div class="lg:col-span-2 space-y-4 text-xs">
                    <h3 class="font-serif text-xl font-normal text-[#1a1a1a]">Tautan</h3>
                    <ul class="space-y-2 text-[#606060]">
                        <li><a href="{{ route('home') }}" class="hover:text-[#d16806] transition-colors">Beranda</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-[#d16806] transition-colors">Tentang Kami</a></li>
                        <li><a href="{{ route('products') }}" class="hover:text-[#d16806] transition-colors">Koleksi Kamar</a></li>
                        <li><a href="{{ route('prices') }}" class="hover:text-[#d16806] transition-colors">Daftar Tarif</a></li>
                        <li><a href="{{ route('booking.index') }}" class="hover:text-[#d16806] transition-colors">Data Reservasi</a></li>
                    </ul>
                </div>

            </div>

            <!-- Bottom Sub-footer (Customer-facing clean imprint) -->
            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-[#8c867e] gap-4">
                <p>© {{ date('Y') }} JW MARRIOTT HOTEL JAKARTA — GRAND HARMONI. ALL RIGHTS RESERVED.</p>
                <p>
                    LAYANAN RESERVASI RESMI HOTEL • <span class="text-[#1a1a1a] font-medium">24/7 CONCIERGE DESK</span>
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
