@extends('layouts.app')

@section('content')
<div class="space-y-24 sm:space-y-32 py-8 sm:py-12">

    <!-- ==========================================
         SECTION 1: BILLBOARD / HERO (JW Marriott & Mellow 1:227)
         ========================================== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-14">
        <div class="relative rounded-[28px] sm:rounded-[36px] overflow-hidden min-h-[640px] lg:min-h-[700px] flex items-center shadow-lg">
            
            <!-- Real-World JW Marriott Jakarta Exterior Photo -->
            <img src="{{ asset('assets/images/rooms/hero.jpg') }}" 
                 alt="JW Marriott Hotel Jakarta Grand Harmoni Luxury Hotel" 
                 class="absolute inset-0 w-full h-full object-cover object-center filter brightness-[0.82] contrast-[1.05]">
            
            <!-- Ambient Vignette Gradient -->
            <div class="absolute inset-0 bg-gradient-to-r from-black/75 via-black/45 to-transparent"></div>

            <!-- Hero Grid: Headline on Left, Floating Availability Card on Right -->
            <div class="relative z-10 w-full p-8 sm:p-12 lg:p-16 grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                
                <!-- Left: Headline & Button (7 cols) -->
                <div class="lg:col-span-7 space-y-6 text-white max-w-xl">
                    <span class="text-xs font-sans tracking-[0.25em] uppercase text-[#e2ded9]">
                        JW Marriott Jakarta • Grand Harmoni
                    </span>
                    <h1 class="font-serif text-5xl sm:text-6xl lg:text-7xl font-normal leading-[1.08] capitalize text-white">
                        JW Marriott Hotel Jakarta Your Gateway to Serenity.
                    </h1>
                    <p class="text-sm sm:text-base text-white/90 font-light leading-relaxed">
                        Kemewahan bintang lima di kawasan Mega Kuningan. Nikmati keramahan berkelas dunia, kamar berpanorama kota, dan fasilitas rekreasi premium.
                    </p>
                    <div class="pt-4">
                        <a href="#rooms" 
                           class="pressable inline-flex items-center gap-3 px-8 py-3.5 rounded-[9px] bg-[#f9f6f3] text-[#1a1a1a] hover:bg-white text-sm font-medium tracking-wide shadow-md">
                            <span>Explore rooms</span>
                            <svg class="w-4 h-4 text-[#d16806]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Right: Check Availability Card (5 cols) (Mellow Figma 1:235) -->
                <div class="lg:col-span-5 flex justify-end">
                    <div class="w-full max-w-md bg-white rounded-[20px] p-6 sm:p-8 shadow-2xl border border-white/80 space-y-5">
                        <div class="text-center pb-2">
                            <h2 class="font-serif text-3xl font-normal text-[#1a1a1a] capitalize">
                                Check availability
                            </h2>
                            <p class="text-xs text-[#737373] mt-1 font-light">Pesan kamar impian Anda secara langsung</p>
                        </div>

                        <form action="{{ route('booking.create') }}" method="GET" class="space-y-4">
                            <!-- Check-in -->
                            <div class="space-y-1.5">
                                <label class="block text-[11px] font-medium tracking-wider uppercase text-[#353535]">
                                    Check-in
                                </label>
                                <div class="relative flex items-center">
                                    <input type="date" name="booking_date" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}"
                                           class="w-full text-xs px-3.5 py-2.5 rounded-[9px] border border-[#e9e9e9] bg-[#f9f6f3] text-[#353535] focus:outline-none focus:border-[#d16806]">
                                </div>
                            </div>

                            <!-- Durasi Menginap -->
                            <div class="space-y-1.5">
                                <label class="block text-[11px] font-medium tracking-wider uppercase text-[#353535]">
                                    Durasi Menginap (Hari)
                                </label>
                                <input type="number" name="stay_duration" value="1" min="1" max="30"
                                       class="w-full text-xs px-3.5 py-2.5 rounded-[9px] border border-[#e9e9e9] bg-[#f9f6f3] text-[#353535] focus:outline-none focus:border-[#d16806]">
                            </div>

                            <!-- Pilihan Tipe Kamar -->
                            <div class="space-y-1.5">
                                <label class="block text-[11px] font-medium tracking-wider uppercase text-[#353535]">
                                    Pilihan Kamar
                                </label>
                                <select name="room_type_id" 
                                        class="w-full text-xs px-3.5 py-2.5 rounded-[9px] border border-[#e9e9e9] bg-[#f9f6f3] text-[#353535] focus:outline-none focus:border-[#d16806]">
                                    @foreach($roomTypes as $room)
                                        <option value="{{ $room->id }}">
                                            {{ $room->name }} — Rp {{ number_format($room->price, 0, ',', '.') }} / malam
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Button -->
                            <button type="submit" 
                                    class="pressable w-full py-3.5 px-6 rounded-[9px] bg-[#d16806] hover:bg-[#b55804] text-white text-xs font-semibold tracking-wider uppercase flex items-center justify-center gap-2 shadow-sm transition-colors">
                                <span>Check availability</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ==========================================
         SECTION 2: ABOUT / JW MARRIOTT STORY (Mellow Figma 1:216)
         ========================================== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-14">
        <div class="text-center max-w-3xl mx-auto space-y-4">
            <h2 class="font-serif text-4xl sm:text-6xl font-normal text-[#1a1a1a] leading-tight capitalize">
                JW Marriott: Your Gateway to Serenity
            </h2>
            <p class="text-sm sm:text-base text-[#606060] font-light leading-relaxed">
                Selamat datang di JW Marriott Hotel Jakarta. Berlokasi di kawasan bisnis strategis Mega Kuningan, hotel kami menghadirkan suaka ketenangan berbalut kemewahan klasik, pelayanan berdedikasi, serta fasilitas kuliner dan kebugaran legendaris untuk memastikan setiap momen menginap Anda berkesan mendalam.
            </p>
            <div class="pt-2">
                <a href="{{ route('about') }}" class="pressable inline-flex items-center gap-2 text-sm font-medium text-[#353535] hover:text-[#d16806] transition-colors">
                    <span>Read about us</span>
                    <svg class="w-4 h-4 text-[#d16806]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Asymmetric 3-Image Composition (Photos of JW Marriott Jakarta) -->
        <div class="mt-14 grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
            <div class="md:col-span-6">
                <div class="rounded-[20px] overflow-hidden aspect-[4/3] shadow-md border border-[#f4e2d8]">
                    <img src="{{ asset('assets/images/rooms/detail.jpg') }}" alt="JW Marriott Jakarta Grand Lobby" class="w-full h-full object-cover">
                </div>
            </div>
            <div class="md:col-span-6 space-y-6">
                <div class="rounded-[20px] overflow-hidden aspect-[16/9] shadow-md border border-[#f4e2d8]">
                    <img src="{{ asset('assets/images/rooms/standar.jpg') }}" alt="JW Marriott Deluxe Twin Room" class="w-full h-full object-cover">
                </div>
                <div class="rounded-[20px] overflow-hidden aspect-[16/9] shadow-md border border-[#f4e2d8]">
                    <img src="{{ asset('assets/images/rooms/deluxe.jpg') }}" alt="JW Marriott King Deluxe Room" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </section>


    <!-- ==========================================
         SECTION 3: ACHIEVEMENTS / STATS (Mellow Figma 1:199)
         ========================================== -->
    <section class="max-w-5xl mx-auto px-4 sm:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center py-6 border-y border-[#e9e9e9]">
            
            <div class="space-y-1">
                <span class="font-sans font-extralight text-5xl sm:text-6xl text-[#d16806] block tabular-nums">25k</span>
                <span class="text-xs sm:text-sm font-light text-[#353535] capitalize">Happy clients</span>
            </div>

            <div class="space-y-1">
                <span class="font-sans font-extralight text-5xl sm:text-6xl text-[#d16806] block tabular-nums">160</span>
                <span class="text-xs sm:text-sm font-light text-[#353535] capitalize">Total rooms</span>
            </div>

            <div class="space-y-1">
                <span class="font-sans font-extralight text-5xl sm:text-6xl text-[#d16806] block tabular-nums">28</span>
                <span class="text-xs sm:text-sm font-light text-[#353535] capitalize">Awards won</span>
            </div>

            <div class="space-y-1">
                <span class="font-sans font-extralight text-5xl sm:text-6xl text-[#d16806] block tabular-nums">100</span>
                <span class="text-xs sm:text-sm font-light text-[#353535] capitalize">Team members</span>
            </div>

        </div>
    </section>


    <!-- ==========================================
         SECTION 4: EXPLORE OUR ROOMS (JW Marriott Rooms)
         ========================================== -->
    <section id="rooms" class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-14">
        
        <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between gap-4 pb-10">
            <div>
                <h2 class="font-serif text-4xl sm:text-6xl font-normal text-[#1a1a1a] capitalize">
                    Explore our rooms
                </h2>
                <p class="text-xs sm:text-sm text-[#737373] mt-2 font-light">Tiga pilihan akomodasi mewah dengan kasur signature Marriott dan kenyamanan tertinggi</p>
            </div>
            <a href="{{ route('products') }}" 
               class="pressable inline-flex items-center gap-2 px-6 py-3 rounded-[9px] bg-white border border-[#e9e9e9] text-[#353535] hover:border-[#d16806] hover:text-[#d16806] text-xs font-medium tracking-wide shadow-sm transition-all">
                <span>Lihat Semua Kamar</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>

        <!-- 3 Room Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($roomTypes as $room)
                <div class="bg-white rounded-[20px] overflow-hidden border border-[#f4e2d8] shadow-sm flex flex-col group hover:shadow-md transition-shadow">
                    
                    <!-- Room Image (Official JW Marriott Photography) -->
                    <div class="aspect-[4/3] overflow-hidden relative bg-[#f0ece7]">
                        <img src="{{ asset('assets/images/rooms/' . strtolower($room->name) . '.jpg') }}" 
                             alt="JW Marriott {{ $room->name }} Room" 
                             class="w-full h-full object-cover group-hover:scale-103 transition-transform duration-500">
                        <span class="absolute top-4 left-4 bg-white/90 backdrop-blur-md px-3 py-1 rounded-full text-[11px] font-medium text-[#1a1a1a] uppercase tracking-wider">
                            {{ $room->name }}
                        </span>
                    </div>

                    <!-- Room Info -->
                    <div class="p-6 sm:p-7 flex-1 flex flex-col justify-between space-y-4">
                        <div class="space-y-2">
                            <h3 class="font-serif text-2xl font-normal text-[#1a1a1a] capitalize">
                                {{ $room->name }} Room
                            </h3>
                            <p class="text-xs text-[#606060] leading-relaxed line-clamp-2 font-light">
                                {{ $room->description }}
                            </p>
                            
                            <!-- Highlights -->
                            <div class="pt-2 flex items-center gap-3 text-xs text-[#737373]">
                                <span>{{ $room->capacity }} Tamu</span>
                                <span>•</span>
                                <span>{{ $room->bed_type }}</span>
                                <span>•</span>
                                <span>Wi-Fi Cepat</span>
                            </div>
                        </div>

                        <!-- Price & CTA Button -->
                        <div class="pt-4 border-t border-[#f4e2d8] flex items-center justify-between gap-3">
                            <div>
                                <span class="font-sans font-semibold text-xl text-[#d16806] tabular-nums">
                                    Rp {{ number_format($room->price, 0, ',', '.') }}
                                </span>
                                <span class="text-xs text-[#737373] block font-light">/ malam</span>
                            </div>

                            <a href="{{ route('booking.create', ['room_type_id' => $room->id]) }}" 
                               class="pressable px-4 py-2.5 rounded-[9px] bg-[#d16806] hover:bg-[#b55804] text-white text-xs font-semibold tracking-wider uppercase transition-colors">
                                Pesan Kamar
                            </a>
                        </div>

                    </div>

                </div>
            @endforeach
        </div>

    </section>


    <!-- ==========================================
         SECTION 5: VIDEO WALKTHROUGH TOUR
         ========================================== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-14">
        <div class="bg-white rounded-[24px] sm:rounded-[32px] p-6 sm:p-10 lg:p-12 border border-[#f4e2d8] shadow-sm">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                
                <!-- Video Player (7 cols) -->
                <div class="lg:col-span-7">
                    <div class="rounded-[20px] overflow-hidden bg-black aspect-video shadow-md relative">
                        <video id="video-source" controls playsinline preload="metadata" 
                               class="w-full h-full object-cover">
                            <source src="{{ asset('assets/videos/rooms/hotel_tour.mp4') }}" type="video/mp4">
                            Browser Anda tidak mendukung tag video HTML5.
                        </video>
                    </div>
                </div>

                <!-- Text & Explanation (5 cols) -->
                <div class="lg:col-span-5 space-y-5">
                    <span class="text-xs font-sans tracking-[0.2em] uppercase text-[#d16806] font-medium">
                        Visual Sanctuary Tour
                    </span>
                    <h2 class="font-serif text-3xl sm:text-4xl font-normal text-[#1a1a1a] leading-tight">
                        Jelajahi Suasana JW Marriott Jakarta
                    </h2>
                    <p class="text-xs sm:text-sm text-[#606060] leading-relaxed font-light">
                        Saksikan tayangan tur visual yang memperlihatkan keanggunan lobby, kamar berinterior mewah, dan kenyamanan fasilitas hotel berbintang lima di jantung Jakarta.
                    </p>
                    
                    <div class="pt-2">
                        <a href="{{ route('products') }}" 
                           class="pressable inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-[#d16806] hover:text-[#b55804]">
                            <span>Lihat Video Seluruh Kamar</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ==========================================
         SECTION 6: SERVICES & FACILITIES (JW Marriott Jakarta Amenities)
         ========================================== -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-14">
        
        <div class="text-center max-w-2xl mx-auto space-y-3 pb-12">
            <h2 class="font-serif text-4xl sm:text-6xl font-normal text-[#1a1a1a] capitalize">
                Our services & facilities
            </h2>
            <p class="text-xs sm:text-sm text-[#737373] font-light">
                Fasilitas lengkap bertaraf internasional dirancang untuk ketenangan dan kenyamanan optimal Anda.
            </p>
        </div>

        <!-- 6 Cards Grid (Exact from Mellow Template 1:72) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            
            <!-- 1. Spa by JW & Wellness -->
            <div class="bg-white rounded-[20px] p-8 border border-[#f4e2d8] shadow-sm hover:border-[#d16806] transition-colors space-y-4 text-center flex flex-col items-center">
                <div class="w-16 h-16 rounded-full bg-[#f9f6f3] flex items-center justify-center text-[#d16806]">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <h3 class="font-serif text-2xl font-normal text-[#1a1a1a] capitalize">Spa by JW & Wellness</h3>
                <p class="text-xs text-[#606060] font-light leading-relaxed">
                    Manjakan diri Anda dengan perawatan tubuh dan terapi relaksasi khas Spa by JW untuk memulihkan kesegaran jiwa dan raga.
                </p>
            </div>

            <!-- 2. Sailendra & Pearl Dining -->
            <div class="bg-white rounded-[20px] p-8 border border-[#f4e2d8] shadow-sm hover:border-[#d16806] transition-colors space-y-4 text-center flex flex-col items-center">
                <div class="w-16 h-16 rounded-full bg-[#f9f6f3] flex items-center justify-center text-[#d16806]">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <h3 class="font-serif text-2xl font-normal text-[#1a1a1a] capitalize">Sailendra Restaurant</h3>
                <p class="text-xs text-[#606060] font-light leading-relaxed">
                    Restoran prasmanan terbaik di Jakarta dengan stasiun dapur terbuka, hidangan nusantara, asia, dan barat yang menggugah selera.
                </p>
            </div>

            <!-- 3. Resort Swimming Pool -->
            <div class="bg-white rounded-[20px] p-8 border border-[#f4e2d8] shadow-sm hover:border-[#d16806] transition-colors space-y-4 text-center flex flex-col items-center">
                <div class="w-16 h-16 rounded-full bg-[#f9f6f3] flex items-center justify-center text-[#d16806]">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M3 15a4 4 0 004 4h10a4 4 0 004-4M3 15a4 4 0 014-4h10a4 4 0 014 4M7 7h10M9 3h6"/>
                    </svg>
                </div>
                <h3 class="font-serif text-2xl font-normal text-[#1a1a1a] capitalize">Outdoor Pool & Oasis</h3>
                <p class="text-xs text-[#606060] font-light leading-relaxed">
                    Kolam renang bernuansa resor tropis di tengah kota Jakarta yang asri untuk bersantai sore bersama minuman segar.
                </p>
            </div>

            <!-- 4. 24-Hour Fitness Center -->
            <div class="bg-white rounded-[20px] p-8 border border-[#f4e2d8] shadow-sm hover:border-[#d16806] transition-colors space-y-4 text-center flex flex-col items-center">
                <div class="w-16 h-16 rounded-full bg-[#f9f6f3] flex items-center justify-center text-[#d16806]">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M4 8h16M4 16h16M8 4v16m8-16v16"/>
                    </svg>
                </div>
                <h3 class="font-serif text-2xl font-normal text-[#1a1a1a] capitalize">JW Fitness Center</h3>
                <p class="text-xs text-[#606060] font-light leading-relaxed">
                    Pusat kebugaran lengkap dengan peralatan kardio dan beban mutakhir serta instruktur berpengalaman yang beroperasi 24 jam.
                </p>
            </div>

            <!-- 5. Grand Ballroom & Event Spaces -->
            <div class="bg-white rounded-[20px] p-8 border border-[#f4e2d8] shadow-sm hover:border-[#d16806] transition-colors space-y-4 text-center flex flex-col items-center">
                <div class="w-16 h-16 rounded-full bg-[#f9f6f3] flex items-center justify-center text-[#d16806]">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <h3 class="font-serif text-2xl font-normal text-[#1a1a1a] capitalize">Grand Ballroom & Events</h3>
                <p class="text-xs text-[#606060] font-light leading-relaxed">
                    Grand Mutiara Ballroom elegan tanpa pilar untuk konferensi internasional, pertemuan bisnis berkelas, hingga pernikahan mewah.
                </p>
            </div>

            <!-- 6. Free High-Speed Wi-Fi -->
            <div class="bg-white rounded-[20px] p-8 border border-[#f4e2d8] shadow-sm hover:border-[#d16806] transition-colors space-y-4 text-center flex flex-col items-center">
                <div class="w-16 h-16 rounded-full bg-[#f9f6f3] flex items-center justify-center text-[#d16806]">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0"/>
                    </svg>
                </div>
                <h3 class="font-serif text-2xl font-normal text-[#1a1a1a] capitalize">High-Speed Executive Wi-Fi</h3>
                <p class="text-xs text-[#606060] font-light leading-relaxed">
                    Koneksi internet serat optik berkecepatan tinggi tanpa hambatan di seluruh area hotel dan kamar tidur tamu.
                </p>
            </div>

        </div>

    </section>

</div>
@endsection
