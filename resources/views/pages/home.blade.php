@extends('layouts.app')

@section('content')
<!-- ==========================================
     SECTION 1: HERO VIEWPORT (SOLÉM MASTERPIECE)
     ========================================== -->
<section class="relative min-h-screen w-full flex flex-col justify-between pt-28 pb-10 px-6 sm:px-10 lg:px-14 bg-[#0D0C0B] text-white overflow-hidden">
    
    <!-- Full Bleed Architectural Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/915036143.jpg?k=6c2ee8fed39b4a400bfa5c7a5f81972bb7719d0b0c8d407ca79346d3b25fdb90&o=" 
            alt="Grand Harmoni Architectural Sanctuary" 
            class="w-full h-full object-cover object-center filter brightness-[0.86] contrast-[1.08]">
        <!-- Subtle Vignette & Gradient Overlays for High Legibility -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/55 via-black/15 to-black/80 pointer-events-none"></div>
    </div>

    <!-- Top Area: Year Badge & Massive Editorial Wordmark -->
    <div class="relative z-10 max-w-7xl mx-auto w-full pt-4">
        <div class="flex items-center justify-between text-[11px] font-mono tracking-[0.25em] uppercase text-white/75 pb-2">
            <span>RESIDENCE & SUITES</span>
            <span>© 2026</span>
        </div>
        
        <!-- Big Bold Serif Wordmark Across Viewport (Exact SOLÉM Composition) -->
        <div class="text-center w-full select-none">
            <h1 class="font-serif text-[17vw] sm:text-[15vw] lg:text-[13.5vw] leading-[0.82] font-normal tracking-[-0.03em] uppercase text-white/95 drop-shadow-lg">
                GRAND HARMONI
            </h1>
        </div>
    </div>

    <!-- Bottom Hero Sub-bar: Philosophy Quote (Left) & Scroll Down (Right) -->
    <div class="relative z-10 max-w-7xl mx-auto w-full pt-8 flex flex-col sm:flex-row items-start sm:items-end justify-between gap-6">
        <!-- Bottom Left: Iconic SOLÉM Quote -->
        <div class="text-xs sm:text-sm text-white/90 font-light leading-relaxed max-w-md">
            <p class="font-normal text-white">Spaces crafted with restraint, light, and deep presence.</p>
            <p class="text-white/60">Not built to impress — built to endure.</p>
        </div>

        <!-- Bottom Right: Scroll Indicator -->
        <a href="#filosofi" class="inline-flex items-center gap-2.5 text-[11px] font-mono uppercase tracking-[0.2em] text-white/80 hover:text-white transition-colors">
            <span class="w-6 h-6 rounded-full border border-white/30 flex items-center justify-center text-[10px]">↓</span>
            <span>SCROLL DOWN</span>
        </a>
    </div>

</section>


<!-- ==========================================
     SECTION 2: ABOUT US / PHILOSOPHY (EXACT MATCH TO REFERENCE SCREENSHOT)
     ========================================== -->
<section id="filosofi" class="py-24 sm:py-32 bg-white text-[#141312] border-t border-stone-200 overflow-hidden relative">
    <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-14">
        
        <!-- Top Row: (01) ABOUT US | Main 3-line Headline | Right Arrow Button -->
        <div class="flex items-start justify-between gap-6 sm:gap-10">
            <!-- Left: Eyebrow Label -->
            <div class="w-32 sm:w-40 shrink-0 pt-1.5">
                <span class="text-xs font-mono tracking-wider text-stone-600 block">
                    (01) <span class="italic font-serif">ABOUT US</span>
                </span>
            </div>

            <!-- Center: Iconic 3-line Headline -->
            <div class="flex-1 max-w-4xl">
                <h2 class="text-3xl sm:text-5xl lg:text-[3.25rem] font-normal leading-[1.18] tracking-tight text-stone-900 font-sans">
                    We design <span class="font-serif italic font-normal text-stone-900">atmospheres</span>, not just buildings.<br>
                    Our work is defined by material honesty<br>
                    and a <span class="font-serif italic font-normal text-stone-900">deep respect for nature</span>.
                </h2>
            </div>

            <!-- Right: Next Arrow Pill Button -->
            <div class="shrink-0 pt-2 hidden sm:block">
                <a href="#kamar-koleksi" class="w-11 h-7 rounded-full border border-stone-300 flex items-center justify-center text-stone-500 hover:border-stone-900 hover:text-stone-900 transition-colors" title="Jelajahi Koleksi">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Lower Row: Circular Award Stamp & Prev Button | Wireframe Circle & Paragraph & Asterisks | Vertical Photo Card -->
        <div class="mt-16 sm:mt-24 grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-end">
            
            <!-- Left Column: Circular Award Stamp & Bottom Prev Button (3 Kolom) -->
            <div class="lg:col-span-3 flex flex-col justify-between h-full space-y-12">
                <!-- Circular Award Seal with Laurel Wreath & Star (Exact from Image) -->
                <div class="w-24 h-24 select-none">
                    <svg class="w-full h-full text-stone-800" viewBox="0 0 120 120">
                        <defs>
                            <path id="sealCircle" d="M 60, 60 m -43, 0 a 43,43 0 1,1 86,0 a 43,43 0 1,1 -86,0" />
                        </defs>
                        <!-- Outer fine dotted ring -->
                        <circle cx="60" cy="60" r="52" fill="none" stroke="currentColor" stroke-width="0.75" stroke-dasharray="2 2" opacity="0.5"/>
                        <!-- Circular Curved Text -->
                        <text font-size="7" font-family="'Plus Jakarta Sans', monospace" font-weight="600" letter-spacing="1.7" fill="currentColor">
                            <textPath href="#sealCircle" startOffset="0%">
                                BEST ARCHITECTURE 2026 • BEST ARCHITECTURE 2026 •
                            </textPath>
                        </text>
                        <!-- Laurel Wreath & Star in Center -->
                        <g transform="translate(60, 60) scale(0.85)">
                            <!-- Star -->
                            <polygon points="0,-18 3,-10 11,-10 5,-5 7,3 0,-1 -7,3 -5,-5 -11,-10 -3,-10" fill="currentColor"/>
                            <!-- Laurel Left -->
                            <path d="M -2,-8 C -10,-4 -14,6 -10,16 C -7,21 -2,24 0,25 C -3,23 -6,19 -7,15 C -10,7 -7,0 -2,-8 Z" fill="currentColor" opacity="0.9"/>
                            <path d="M -8,0 C -12,2 -14,7 -12,12 C -10,7 -8,3 -4,1 Z" fill="currentColor"/>
                            <path d="M -9,8 C -14,11 -15,16 -12,20 C -11,15 -9,11 -5,9 Z" fill="currentColor"/>
                            <!-- Laurel Right -->
                            <path d="M 2,-8 C 10,-4 14,6 10,16 C 7,21 2,24 0,25 C 3,23 6,19 7,15 C 10,7 7,0 2,-8 Z" fill="currentColor" opacity="0.9"/>
                            <path d="M 8,0 C 12,2 14,7 12,12 C 10,7 8,3 4,1 Z" fill="currentColor"/>
                            <path d="M 9,8 C 14,11 15,16 12,20 C 11,15 9,11 5,9 Z" fill="currentColor"/>
                        </g>
                    </svg>
                </div>

                <!-- Prev Arrow Button on Left -->
                <div class="pt-4">
                    <a href="#filosofi" class="w-11 h-7 rounded-full border border-stone-300 inline-flex items-center justify-center text-stone-500 hover:border-stone-900 hover:text-stone-900 transition-colors" title="Kembali">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Center Column: Thin line, Faint Circle, 4-Line Paragraph & 3 Stars (6 Kolom) -->
            <div class="lg:col-span-6 relative flex items-center min-h-[220px]">
                <!-- Thin Horizontal Connecting Line -->
                <div class="absolute -left-12 sm:-left-24 right-0 top-1/2 h-[1px] bg-stone-200 pointer-events-none"></div>

                <!-- Faint Wireframe Circle Backdrop (Exact from Image) -->
                <div class="w-48 h-48 sm:w-56 sm:h-56 rounded-full border border-stone-200/90 absolute left-4 sm:left-12 top-1/2 -translate-y-1/2 pointer-events-none"></div>

                <!-- Paragraph & 3 Stars Container -->
                <div class="relative z-10 flex flex-col sm:flex-row sm:items-center gap-6 sm:gap-8 pl-8 sm:pl-24 pr-4">
                    <p class="text-xs sm:text-[13px] text-stone-700 leading-relaxed font-light max-w-sm">
                        In a world overwhelmed by noise, we believe in the power of quiet architecture. Raw textures, sun-washed surfaces, and sculptural geometry create calm environments.
                    </p>
                    <span class="text-stone-800 text-xs tracking-[0.4em] font-serif select-none shrink-0">✦ ✦ ✦</span>
                </div>
            </div>

            <!-- Right Column: Vertical Architectural Photo Card (3 Kolom) -->
            <div class="lg:col-span-3 flex flex-col items-end">
                <div class="w-full max-w-[240px] space-y-2">
                    <div class="rounded-2xl overflow-hidden aspect-[3/4] bg-stone-100 shadow-xl border border-stone-200 group">
                        <img src="{{ asset('assets/images/rooms/detail.jpg') }}" 
                             alt="Bogor Icon Villa Architecture" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    </div>
                    <div class="flex items-center justify-between text-[11px] font-mono text-stone-500 px-1 pt-1">
                        <span>Solém Villa</span>
                        <span>©2026</span>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- ==========================================
     SECTION 3: ACCOMMODATION / TIMELESS SERVICES (SOLÉM DARK SECTION)
     ========================================== -->
<section id="kamar-koleksi" class="py-28 sm:py-36 bg-[#121110] text-white border-t border-white/10">
    <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-14 space-y-24">
        
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between pb-8 border-b border-white/10 gap-6">
            <div class="space-y-2">
                <span class="text-[11px] font-semibold tracking-[0.25em] uppercase text-[#8C867E] block">
                    — PILIHAN KAMAR
                </span>
                <h2 class="font-serif text-3xl sm:text-5xl font-normal text-white">
                    Timeless Services. <span class="italic text-[#EAE5DC]">Smarter Living.</span>
                </h2>
            </div>
            <div class="max-w-sm text-right">
                <span class="text-[10px] font-mono tracking-widest uppercase text-[#8C867E] block mb-1">PILIHAN AKOMODASI RESMI</span>
                <p class="text-xs text-[#8C867E] font-light leading-relaxed">
                    Tersedia 3 jenis tipe kamar standar BNSP (Standar, Deluxe, Family) dengan fasilitas premium dan garansi kebersihan bintang 4.
                </p>
            </div>
        </div>

        <!-- Room Showcase Rows (Dual-Photo Gallery Composition from SOLÉM Image 2) -->
        <div class="space-y-28">
            @foreach($roomTypes as $index => $room)
                <div class="space-y-8 pb-24 border-b border-white/10 last:border-b-0">
                    
                    <!-- Row Header Bar: Number, Name, Price & CTA -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-4">
                        <div class="flex items-baseline gap-4">
                            <span class="text-sm font-mono text-[#8C867E] tabular-nums">0{{ $index + 1 }}</span>
                            <h3 class="font-serif text-2xl sm:text-4xl font-normal text-white">
                                Kamar {{ $room->name }}
                            </h3>
                            <span class="text-xs text-[#8C867E] font-light hidden sm:inline">— {{ $room->capacity }}</span>
                        </div>
                        
                        <div class="flex items-center gap-6">
                            <div class="text-right">
                                <span class="text-[10px] font-mono text-[#8C867E] uppercase block">Tarif Per Malam</span>
                                <span class="text-xl font-mono tabular-nums font-semibold text-[#E8DFD0]">{{ $room->formatted_price }}</span>
                            </div>
                            <a href="{{ route('booking.create', ['room_id' => $room->id]) }}" 
                               class="pressable px-7 py-2.5 rounded-full text-xs font-semibold tracking-wider uppercase bg-white text-stone-900 hover:bg-[#C46849] hover:text-white transition-all shadow-lg flex items-center gap-1.5">
                                <span>Pesan Kamar</span>
                                <span class="text-xs">↗</span>
                            </a>
                        </div>
                    </div>

                    <!-- Dual Photographic Showcase: Wide View + Detail View (SOLÉM Image 2) -->
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-stretch">
                        
                        <!-- Primary Wide View Image (8 Columns) -->
                        <div class="md:col-span-8 rounded-3xl overflow-hidden aspect-[16/10] bg-[#1A1816] border border-white/10 group shadow-2xl relative">
                            <img src="{{ asset($room->image_url) }}" 
                                 alt="Kamar {{ $room->name }} Wide View" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute bottom-5 left-6 text-white text-xs font-mono tracking-wider uppercase bg-black/40 backdrop-blur-md px-3 py-1.5 rounded-full border border-white/15">
                                Utama • {{ $room->name }} Suite
                            </div>
                        </div>

                        <!-- Secondary Specs & Detail Card (4 Columns) -->
                        <div class="md:col-span-4 rounded-3xl bg-[#181715] border border-white/10 p-8 flex flex-col justify-between space-y-6 shadow-2xl">
                            <div class="space-y-4">
                                <span class="text-[10px] font-mono tracking-widest uppercase text-[#8C867E] block">SPESIFIKASI SUITE</span>
                                <p class="text-xs text-[#C7BFB4] leading-relaxed font-light">
                                    {{ $room->description }}
                                </p>

                                <div class="space-y-2 pt-3 border-t border-white/10 text-xs text-[#EAE5DC] font-light">
                                    <p>🛏️ <strong>Ranjang:</strong> {{ $room->bed_type }}</p>
                                    <p>👥 <strong>Kapasitas:</strong> {{ $room->capacity }}</p>
                                    <p>🍳 <strong>Sarapan:</strong> Opsional (+ Rp 80.000)</p>
                                </div>

                                <div class="pt-2">
                                    <p class="text-[10px] font-mono uppercase tracking-wider text-[#8C867E] mb-2">Fasilitas Utama:</p>
                                    <ul class="text-xs text-[#A89F91] space-y-1 font-light">
                                        @foreach(array_slice($room->facilities ?? [], 0, 4) as $facility)
                                            <li>• {{ $facility }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <a href="{{ route('booking.create', ['room_id' => $room->id]) }}" 
                               class="pressable block text-center py-3 rounded-full text-xs font-semibold tracking-wider uppercase bg-[#C46849] hover:bg-[#d07354] text-white transition-all shadow-md">
                                Reservasi Tipe Ini ↗
                            </a>
                        </div>

                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>


<!-- ==========================================
     SECTION 4: ARCHITECTURE IN HARMONI (GALLERY & VIRTUAL VIDEO TOUR)
     ========================================== -->
<section id="tur-video" class="py-28 sm:py-36 bg-[#FAF8F5] text-[#141312] border-t border-stone-200">
    <div class="max-w-7xl mx-auto px-6 sm:px-10 lg:px-14 space-y-16">
        
        <!-- Section Header with Filter Pills (SOLÉM Image 2) -->
        <div class="flex flex-col md:flex-row md:items-end justify-between pb-6 border-b border-stone-300 gap-6">
            <div class="space-y-2">
                <span class="text-[11px] font-semibold tracking-[0.25em] uppercase text-stone-500 block">
                    — TUR VIRTUAL & VIDEO
                </span>
                <h2 class="font-serif text-3xl sm:text-5xl font-normal text-stone-900">
                    Architecture in Harmoni.
                </h2>
            </div>

            <!-- Filter Buttons -->
            <div class="flex flex-wrap items-center gap-2 text-xs font-mono">
                <button type="button" onclick="switchVideo('{{ asset('assets/videos/rooms/hotel_tour.mp4') }}', 'Tur Utama Hotel')" class="px-4 py-2 rounded-full border border-stone-900 bg-stone-900 text-white font-medium">Tur Utama</button>
                <button type="button" onclick="switchVideo('{{ asset('assets/videos/rooms/standar_tour.mp4') }}', 'Kamar Standar')" class="px-4 py-2 rounded-full border border-stone-300 bg-white hover:bg-stone-100 text-stone-800 transition-colors">Standar</button>
                <button type="button" onclick="switchVideo('{{ asset('assets/videos/rooms/deluxe_tour.mp4') }}', 'Kamar Deluxe')" class="px-4 py-2 rounded-full border border-stone-300 bg-white hover:bg-stone-100 text-stone-800 transition-colors">Deluxe</button>
                <button type="button" onclick="switchVideo('{{ asset('assets/videos/rooms/family_tour.mp4') }}', 'Kamar Family')" class="px-4 py-2 rounded-full border border-stone-300 bg-white hover:bg-stone-100 text-stone-800 transition-colors">Family</button>
            </div>
        </div>

        <!-- Video Player Card & Architectural Photo Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <!-- Video Player (8 Kolom) -->
            <div class="lg:col-span-8 rounded-3xl overflow-hidden bg-black border border-stone-300 shadow-2xl relative aspect-[16/9]">
                <video id="main-video-player" controls preload="metadata" class="w-full h-full object-cover">
                    <source id="video-source" src="{{ asset('assets/videos/rooms/hotel_tour.mp4') }}" type="video/mp4">
                    Browser Anda tidak mendukung tag video HTML5.
                </video>
            </div>

            <!-- Architectural Gallery Cards (4 Kolom) -->
            <div class="lg:col-span-4 space-y-6">
                <div class="p-6 rounded-3xl bg-white border border-stone-300 shadow-lg space-y-3">
                    <span class="text-[10px] font-mono tracking-widest uppercase text-stone-400 block">DOKUMENTASI VISUAL</span>
                    <h4 id="video-title-display" class="font-serif text-2xl font-normal text-stone-900">Tur Utama Hotel</h4>
                    <p class="text-xs text-stone-600 font-light leading-relaxed">
                        Nikmati pengalaman berkeliling seluruh area Hotel Grand Harmoni, mulai dari ruang lobi berarsitektur hangat hingga fasilitas kamar tidur yang tenang.
                    </p>
                </div>

                <div class="rounded-3xl overflow-hidden aspect-[4/3] bg-stone-200 border border-stone-300 shadow-md">
                    <img src="{{ asset('assets/images/rooms/family.jpg') }}" alt="Family Suite Living" class="w-full h-full object-cover">
                </div>
            </div>

        </div>

    </div>
</section>


<!-- ==========================================
     SECTION 5: TESTIMONIAL / EDITORIAL QUOTE (SOLÉM IMAGE 2)
     ========================================== -->
<section class="py-24 sm:py-32 bg-[#FAF8F5] text-[#141312] border-t border-stone-200">
    <div class="max-w-5xl mx-auto px-6 sm:px-10 lg:px-14">
        
        <div class="grid grid-cols-1 md:grid-cols-12 gap-10 items-center">
            
            <!-- Big Serif Quotation (9 Kolom) -->
            <div class="md:col-span-9 space-y-8">
                <span class="font-serif text-6xl text-[#B85D3E] block leading-none select-none">❝</span>
                <blockquote class="font-serif text-2xl sm:text-4xl lg:text-4xl font-normal leading-snug text-stone-900">
                    From material selection to the quiet ambient lighting, the hospitality team translated our stay into a serene sanctuary. We couldn't have imagined a more <span class="italic font-normal">perfect rest</span>.
                </blockquote>
                
                <div class="flex items-center gap-4 pt-4 border-t border-stone-300">
                    <div class="w-12 h-12 rounded-full overflow-hidden bg-stone-300 border border-stone-400 shrink-0">
                        <img src="{{ asset('assets/images/rooms/standar.jpg') }}" alt="Andri Santosa" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <strong class="font-serif text-lg text-stone-900 block font-normal">Andri Santosa</strong>
                        <span class="text-xs font-mono text-stone-500 uppercase tracking-wider">Tamu Eksekutif • Peserta Uji BNSP</span>
                    </div>
                </div>
            </div>

            <!-- Small Architectural Polaroid Accent Card (3 Kolom) -->
            <div class="md:col-span-3 hidden md:block">
                <div class="p-3 bg-white border border-stone-300 rounded-2xl shadow-xl transform rotate-2">
                    <div class="rounded-xl overflow-hidden aspect-[3/4] bg-stone-200">
                        <img src="{{ asset('assets/images/rooms/detail.jpg') }}" alt="Detail Polish" class="w-full h-full object-cover">
                    </div>
                    <span class="text-[9px] font-mono text-stone-400 uppercase tracking-widest block text-center pt-2">SUITE DETAIL • 2026</span>
                </div>
            </div>

        </div>

    </div>
</section>
@endsection

@push('scripts')
<script>
    function switchVideo(src, title) {
        const player = document.getElementById('main-video-player');
        const source = document.getElementById('video-source');
        const titleDisplay = document.getElementById('video-title-display');
        
        if (player && source) {
            source.src = src;
            player.load();
            player.play();
            if (titleDisplay) titleDisplay.textContent = title;
        }
    }
</script>
@endpush