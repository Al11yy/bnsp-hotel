@extends('layouts.app')

@section('content')
<div class="py-14 sm:py-20 lg:py-24 max-w-6xl mx-auto px-4 sm:px-8 lg:px-12">

    <!-- Page Header & Lead -->
    <header class="max-w-3xl space-y-4 mb-16 sm:mb-20">
        <span class="text-xs font-sans tracking-[0.25em] uppercase text-[#d16806] font-medium block">
            Profil & Keramahan Bintang Lima
        </span>
        <h1 class="font-serif text-4xl sm:text-6xl font-normal text-[#1a1a1a] tracking-tight">
            Tentang Hotel Grand Harmoni
        </h1>
        <p class="text-base sm:text-lg text-[#606060] font-light leading-relaxed pt-2">
            JW Marriott Hotel Jakarta — Grand Harmoni menghadirkan perpaduan estetika ketenangan, standar kemewahan bintang lima, serta dedikasi keramahan legendaris di jantung Jakarta.
        </p>
    </header>

    <!-- Full-Width Editorial Hero Media -->
    <div class="w-full overflow-hidden mb-16 sm:mb-24 aspect-[16/8] sm:aspect-[21/9]">
        <img src="{{ asset('assets/images/rooms/detail.jpg') }}" 
             alt="JW Marriott Jakarta Grand Lobby" 
             class="w-full h-full object-cover">
    </div>

    <!-- Editorial Narrative & Story -->
    <section class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 mb-20 sm:mb-28">
        <div class="lg:col-span-5 space-y-3">
            <span class="text-xs font-sans tracking-[0.2em] uppercase text-[#737373] block">
                Filosofi & Visi
            </span>
            <h2 class="font-serif text-3xl sm:text-4xl font-normal text-[#1a1a1a] leading-snug">
                {{ $hotelInfo['name'] }}
            </h2>
            <p class="font-serif text-xl sm:text-2xl italic text-[#d16806] font-normal pt-1">
                {{ $hotelInfo['tagline'] }}
            </p>
        </div>
        <div class="lg:col-span-7 space-y-6 text-sm sm:text-base text-[#606060] font-light leading-relaxed">
            <p>
                {{ $hotelInfo['description'] }}
            </p>
            <p>
                Berlokasi di kawasan diplomatik dan bisnis prestisius Mega Kuningan, hotel kami dirancang untuk menghadirkan ketenangan di tengah dinamika ibu kota. Tamu dimanjakan dengan kamar luas berpemandangan panorama gedung pencakar langit Jakarta, tempat tidur mewah khas Marriott Revive, serta sentuhan pelayanan personal yang tulus.
            </p>
            <p>
                Nikmati pengalaman kuliner tak tertandingi di Sailendra Restaurant dengan hidangan prasmanan internasional legendaris, serta cita rasa autentik kanton di Pearl Chinese Restaurant yang disajikan oleh chef kelas dunia.
            </p>
        </div>
    </section>

    <!-- Hospitality Values / 3 Pillars (Natural Flat Typography Flow) -->
    <section class="border-t border-[#e9e9e9] pt-12 sm:pt-16 mb-20 sm:mb-28">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 lg:gap-14">
            <div class="space-y-3">
                <span class="text-xs font-mono text-[#d16806] tracking-widest block">01 / STANDAR</span>
                <h3 class="font-serif text-2xl text-[#1a1a1a] font-normal">Kenyamanan Bintang 5</h3>
                <p class="text-xs sm:text-sm text-[#737373] font-light leading-relaxed">
                    Privasi eksklusif, fasilitas kamar berstandar tertinggi, serta komitmen higienitas menyeluruh Marriott Global Cleanliness.
                </p>
            </div>
            <div class="space-y-3">
                <span class="text-xs font-mono text-[#d16806] tracking-widest block">02 / ARSITEKTUR</span>
                <h3 class="font-serif text-2xl text-[#1a1a1a] font-normal">Desain Timeless</h3>
                <p class="text-xs sm:text-sm text-[#737373] font-light leading-relaxed">
                    Perpaduan marmer mulia, aksen kayu hangat, dan pencahayaan alami yang menciptakan nuansa anggun dan menenangkan.
                </p>
            </div>
            <div class="space-y-3">
                <span class="text-xs font-mono text-[#d16806] tracking-widest block">03 / DEDIKASI</span>
                <h3 class="font-serif text-2xl text-[#1a1a1a] font-normal">Keramahan Sejati</h3>
                <p class="text-xs sm:text-sm text-[#737373] font-light leading-relaxed">
                    Tim concierge dan staf profesional siap melayani setiap kebutuhan Anda dengan penuh perhatian selama 24 jam sehari.
                </p>
            </div>
        </div>
    </section>

    <!-- Contact & Location (Completely Unboxed, Direct Document Integration) -->
    <section class="border-t border-[#e9e9e9] pt-12 sm:pt-16 space-y-12">
        <div class="max-w-2xl space-y-2">
            <span class="text-xs font-sans tracking-[0.2em] uppercase text-[#d16806] font-medium block">
                Hubungi Kami
            </span>
            <h2 class="font-serif text-3xl sm:text-4xl font-normal text-[#1a1a1a]">
                Informasi Kontak & Lokasi Resmi
            </h2>
            <p class="text-xs sm:text-sm text-[#737373] font-light">
                Layanan concierge dan resepsionis beroperasi penuh 24 jam setiap hari untuk melayani Anda.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-10 pt-4">
            <!-- 1. Alamat Lengkap -->
            <div class="space-y-2">
                <span class="text-[11px] font-sans uppercase tracking-[0.15em] text-[#737373] block">Alamat Lengkap</span>
                <p class="text-sm sm:text-base text-[#1a1a1a] font-light leading-relaxed">
                    {{ $hotelInfo['address'] }}
                </p>
            </div>

            <!-- 2. No Telp -->
            <div class="space-y-2">
                <span class="text-[11px] font-sans uppercase tracking-[0.15em] text-[#737373] block">Nomor Telepon</span>
                <p class="text-sm sm:text-base text-[#1a1a1a] font-medium">
                    <a href="tel:{{ preg_replace('/[^0-9]/', '', $hotelInfo['phone']) }}" class="hover:text-[#d16806] transition-colors">
                        {{ $hotelInfo['phone'] }}
                    </a>
                </p>
                <span class="text-xs text-[#737373] font-light block">Bebas Pulsa • 24/7 Concierge</span>
            </div>

            <!-- 3. Alamat Email -->
            <div class="space-y-2">
                <span class="text-[11px] font-sans uppercase tracking-[0.15em] text-[#737373] block">Alamat Email Resmi</span>
                <p class="text-sm sm:text-base text-[#1a1a1a]">
                    <a href="mailto:{{ $hotelInfo['email'] }}" class="text-[#d16806] hover:underline transition-colors break-all">
                        {{ $hotelInfo['email'] }}
                    </a>
                </p>
                <span class="text-xs text-[#737373] font-light block">Respon Resmi dalam 1x24 Jam</span>
            </div>

            <!-- 4. Waktu Menginap -->
            <div class="space-y-2">
                <span class="text-[11px] font-sans uppercase tracking-[0.15em] text-[#737373] block">Waktu Menginap</span>
                <div class="text-sm sm:text-base text-[#1a1a1a] space-y-1">
                    <p class="font-light">Check-in: <strong class="font-medium">14.00 WIB</strong></p>
                    <p class="font-light">Check-out: <strong class="font-medium">12.00 WIB</strong></p>
                </div>
            </div>
        </div>

        <!-- Integrated Call to Action (Direct Flow) -->
        <div class="pt-10 border-t border-[#e9e9e9] flex flex-col sm:flex-row sm:items-center justify-between gap-6">
            <div class="space-y-1">
                <p class="font-serif text-2xl text-[#1a1a1a] font-normal">
                    Siap Merasakan Pengalaman Menginap Istimewa?
                </p>
                <p class="text-xs sm:text-sm text-[#737373] font-light">
                    Pesan langsung secara online untuk jaminan tarif terbaik dan konfirmasi instan.
                </p>
            </div>
            <a href="{{ route('booking.create') }}" 
               class="pressable inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-[9px] bg-[#d16806] hover:bg-[#b55804] text-white text-xs font-semibold tracking-wider uppercase transition-colors shadow-sm shrink-0">
                <span>Buat Reservasi Kamar</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>
    </section>

</div>
@endsection
