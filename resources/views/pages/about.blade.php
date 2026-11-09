@extends('layouts.app')

@section('content')
<div class="py-12 sm:py-16 space-y-20 max-w-7xl mx-auto px-4 sm:px-8 lg:px-14">

    <!-- Header Section -->
    <section class="max-w-3xl space-y-4">
        <span class="text-xs font-sans tracking-[0.2em] uppercase text-[#d16806] font-medium">
            Profil & Pelayanan Bintang Lima
        </span>
        <h1 class="font-serif text-4xl sm:text-6xl font-normal text-[#1a1a1a] capitalize">
            Tentang Hotel Grand Harmoni
        </h1>
        <p class="text-sm sm:text-base text-[#606060] font-light leading-relaxed">
            JW Marriott Hotel Jakarta — Grand Harmoni menghadirkan perpaduan estetika ketenangan, standar kemewahan bintang lima, serta dedikasi keramahan legendaris di jantung Jakarta.
        </p>
    </section>

    <!-- Main Editorial Narrative -->
    <section class="space-y-8">
        
        <div class="space-y-3">
            <h2 class="font-serif text-3xl sm:text-4xl font-normal text-[#1a1a1a] leading-tight">
                {{ $hotelInfo['name'] }}
            </h2>
            <p class="font-serif text-xl sm:text-2xl italic text-[#d16806] font-normal">
                {{ $hotelInfo['tagline'] }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-sm sm:text-base text-[#606060] font-light leading-relaxed">
            <p>
                {{ $hotelInfo['description'] }}
            </p>
            <p>
                Berlokasi di kawasan diplomatik dan bisnis terkemuka Mega Kuningan, hotel kami dirancang untuk memanjakan tamu dengan kamar luas berpemandangan skyline Jakarta, tempat tidur mewah signature Marriott, serta fasilitas kuliner Sailendra Restaurant dan Pearl Chinese Restaurant yang terkenal.
            </p>
        </div>

        <!-- Full-Width Editorial Banner (Grand Lobby of JW Marriott Jakarta) -->
        <div class="rounded-[24px] sm:rounded-[32px] overflow-hidden aspect-[21/9] sm:aspect-[24/9] shadow-sm border border-[#f4e2d8]">
            <img src="{{ asset('assets/images/rooms/detail.jpg') }}" alt="JW Marriott Jakarta Grand Lobby" class="w-full h-full object-cover">
        </div>

        <!-- 3 Pillars of Hospitality -->
        <div class="pt-8 border-t border-[#e9e9e9] grid grid-cols-1 sm:grid-cols-3 gap-8">
            <div class="space-y-2">
                <span class="text-xs font-mono text-[#d16806]">01</span>
                <h3 class="font-serif text-xl text-[#1a1a1a] font-normal">Standar Bintang 5</h3>
                <p class="text-xs text-[#737373] font-light leading-relaxed">
                    Kenyamanan premium, privasi eksklusif, serta higienitas bersertifikasi internasional Marriott Global Cleanliness.
                </p>
            </div>
            <div class="space-y-2">
                <span class="text-xs font-mono text-[#d16806]">02</span>
                <h3 class="font-serif text-xl text-[#1a1a1a] font-normal">Desain Elegan</h3>
                <p class="text-xs text-[#737373] font-light leading-relaxed">
                    Sentuhan marmer mewah, kayu bernuansa hangat, dan interior timeless yang menciptakan ketenangan sempurna.
                </p>
            </div>
            <div class="space-y-2">
                <span class="text-xs font-mono text-[#d16806]">03</span>
                <h3 class="font-serif text-xl text-[#1a1a1a] font-normal">Pelayanan Prima</h3>
                <p class="text-xs text-[#737373] font-light leading-relaxed">
                    Layanan concierge dan resepsionis ramah berstandar global yang siap melayani kebutuhan Anda 24 jam sehari.
                </p>
            </div>
        </div>

    </section>

    <!-- Naturally Integrated Contact & Location Flow (Standard Clean Layout) -->
    <section class="bg-white rounded-[24px] sm:rounded-[32px] p-8 sm:p-12 border border-[#f4e2d8] shadow-sm space-y-10">
        
        <div class="border-b border-[#e9e9e9] pb-6 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
                <span class="text-xs font-sans tracking-[0.2em] uppercase text-[#d16806] font-medium block mb-1">
                    Lokasi & Layanan
                </span>
                <h2 class="font-serif text-3xl sm:text-4xl font-normal text-[#1a1a1a]">
                    Informasi Kontak & Lokasi Resmi
                </h2>
            </div>
            <span class="text-xs text-[#737373] font-light">
                Layanan Front Desk & Concierge 24 Jam
            </span>
        </div>

        <!-- 4-Column Clean Linear Information Flow -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 text-xs">
            
            <!-- 1. Alamat Lengkap -->
            <div class="space-y-2">
                <div class="flex items-center gap-2 text-[#d16806]">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span class="font-medium uppercase tracking-wider text-[11px]">Alamat Lengkap</span>
                </div>
                <p class="text-sm text-[#1a1a1a] font-light leading-relaxed">
                    {{ $hotelInfo['address'] }}
                </p>
            </div>

            <!-- 2. No Telp -->
            <div class="space-y-2">
                <div class="flex items-center gap-2 text-[#d16806]">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <span class="font-medium uppercase tracking-wider text-[11px]">Nomor Telepon</span>
                </div>
                <p class="text-sm text-[#1a1a1a] font-medium">
                    <a href="tel:{{ preg_replace('/[^0-9]/', '', $hotelInfo['phone']) }}" class="hover:text-[#d16806] transition-colors">
                        {{ $hotelInfo['phone'] }}
                    </a>
                </p>
                <span class="text-[11px] text-[#737373] block">Bebas Pulsa / Layanan 24 Jam</span>
            </div>

            <!-- 3. Alamat Email -->
            <div class="space-y-2">
                <div class="flex items-center gap-2 text-[#d16806]">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span class="font-medium uppercase tracking-wider text-[11px]">Alamat Email Resmi</span>
                </div>
                <p class="text-sm text-[#1a1a1a] font-light">
                    <a href="mailto:{{ $hotelInfo['email'] }}" class="text-[#d16806] hover:underline transition-colors break-all">
                        {{ $hotelInfo['email'] }}
                    </a>
                </p>
                <span class="text-[11px] text-[#737373] block">Balasan Resmi dalam 1x24 Jam</span>
            </div>

            <!-- 4. Jam Operasional -->
            <div class="space-y-2">
                <div class="flex items-center gap-2 text-[#d16806]">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="font-medium uppercase tracking-wider text-[11px]">Waktu Menginap</span>
                </div>
                <div class="text-sm text-[#1a1a1a] space-y-1">
                    <p class="font-light">Check-in: <strong class="font-medium">14.00 WIB</strong></p>
                    <p class="font-light">Check-out: <strong class="font-medium">12.00 WIB</strong></p>
                </div>
            </div>

        </div>

        <!-- Integrated Call to Action Banner -->
        <div class="pt-6 border-t border-[#e9e9e9] flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <p class="text-xs text-[#606060] font-light">
                Rencanakan kunjungan bisnis atau liburan Anda bersama JW Marriott Hotel Jakarta.
            </p>
            <a href="{{ route('booking.create') }}" 
               class="pressable inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-[9px] bg-[#d16806] hover:bg-[#b55804] text-white text-xs font-semibold tracking-wider uppercase transition-colors shadow-sm shrink-0">
                <span>Buat Reservasi Kamar Sekarang</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>

    </section>

</div>
@endsection
