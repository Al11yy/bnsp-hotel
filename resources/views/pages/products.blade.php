@extends('layouts.app')

@section('content')
<div class="py-14 sm:py-20 lg:py-24 max-w-6xl mx-auto px-4 sm:px-8 lg:px-12 space-y-20 sm:space-y-28">

    <!-- Header Section -->
    <header class="max-w-3xl space-y-4">
        <span class="text-xs font-sans tracking-[0.25em] uppercase text-[#d16806] font-medium block">
            Akomodasi & Tarif Resmi • JW Marriott Hotel Jakarta
        </span>
        <h1 class="font-serif text-4xl sm:text-6xl font-normal text-[#1a1a1a] tracking-tight">
            Koleksi Kamar & Video Tur
        </h1>
        <p class="text-base sm:text-lg text-[#606060] font-light leading-relaxed pt-2">
            Saksikan video tur virtual tiga pilihan kamar unggulan JW Marriott Hotel Jakarta di kawasan Mega Kuningan — Standar, Deluxe, dan Family — beserta daftar tarif resmi menginap.
        </p>
    </header>

    <!-- Interactive Video Tour Section (Unboxed, Clean Flow) -->
    <section class="space-y-8">
        
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-4 border-b border-[#e9e9e9]">
            <div>
                <h2 class="font-serif text-2xl sm:text-3xl font-normal text-[#1a1a1a]">
                    Video Tur Virtual Kamar
                </h2>
                <p class="text-xs text-[#737373] mt-1 font-light">
                    Pilih tipe kamar untuk memutar cuplikan suasana interior kamar
                </p>
            </div>

            <!-- Room Switcher Tabs -->
            <div class="inline-flex p-1 bg-[#f0ece7] rounded-[10px]" role="tablist">
                @foreach($roomTypes as $index => $room)
                    <button type="button" 
                            class="video-tab-btn pressable px-4 py-2 rounded-[8px] text-xs font-medium tracking-wide uppercase transition-all {{ $index === 0 ? 'bg-[#d16806] text-white shadow-sm' : 'text-[#606060] hover:text-[#1a1a1a]' }}"
                            data-video-src="{{ asset($room->video_url) }}"
                            data-room-name="{{ $room->name }}"
                            data-room-poster="{{ asset($room->image_url) }}">
                        {{ $room->name }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Video Player (Flat, Edge-to-Edge Container) -->
        <div class="relative overflow-hidden aspect-video bg-black max-w-5xl mx-auto shadow-sm">
            <video id="room-tour-player" 
                   class="w-full h-full object-cover" 
                   controls 
                   playsinline
                   preload="metadata"
                   poster="{{ asset($roomTypes->first()->image_url ?? '') }}">
                <source id="video-source" src="{{ asset($roomTypes->first()->video_url ?? '') }}" type="video/mp4">
                Browser Anda tidak mendukung pemutar video HTML5.
            </video>
            
            <div id="video-caption" class="absolute top-4 left-4 bg-white/90 backdrop-blur-md px-4 py-1.5 rounded-full text-xs font-mono text-[#1a1a1a] shadow-sm">
                Tur Video: Kamar {{ $roomTypes->first()->name ?? 'Hotel' }} — JW Marriott Hotel Jakarta
            </div>
        </div>

    </section>

    <!-- Price List Section (Simple, Clean, Flat, Replacing Previous Heavy Cards) -->
    <section class="border-t border-[#e9e9e9] pt-12 sm:pt-16 space-y-10">
        
        <div class="max-w-2xl space-y-2">
            <span class="text-xs font-sans tracking-[0.2em] uppercase text-[#d16806] font-medium block">
                Daftar Harga Resmi
            </span>
            <h2 class="font-serif text-3xl sm:text-4xl font-normal text-[#1a1a1a]">
                Daftar Tarif Kamar
            </h2>
            <p class="text-xs sm:text-sm text-[#737373] font-light">
                Transparansi harga resmi akomodasi JW Marriott Hotel Jakarta per malam.
            </p>
        </div>

        <!-- Extremely Simple Price List: Room Name, Room Type, and Price -->
        <div class="divide-y divide-[#e9e9e9]">
            @foreach($roomTypes as $room)
                <div class="py-6 flex flex-col sm:flex-row sm:items-center justify-between gap-6">
                    
                    <!-- Left: Thumbnail, Name, and Room Type -->
                    <div class="flex items-center gap-5">
                        <div class="w-24 h-20 sm:w-28 sm:h-20 rounded-[8px] overflow-hidden shrink-0 bg-[#f0ece7]">
                            <img src="{{ asset($room->image_url) }}" 
                                 alt="Kamar {{ $room->name }} JW Marriott Hotel Jakarta" 
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="space-y-1">
                            <span class="text-xs font-mono uppercase text-[#d16806] tracking-wider block">
                                Tipe: {{ $room->name }}
                            </span>
                            <h3 class="font-serif text-2xl sm:text-3xl font-normal text-[#1a1a1a]">
                                Kamar {{ $room->name }}
                            </h3>
                            <span class="text-xs text-[#737373] font-light block sm:hidden font-mono pt-0.5">
                                {{ $room->formatted_price }} / malam
                            </span>
                        </div>
                    </div>

                    <!-- Right: Price and Action Button -->
                    <div class="flex items-center justify-between sm:justify-end gap-6 sm:gap-8">
                        <div class="hidden sm:block text-right">
                            <span class="text-[11px] uppercase tracking-wider text-[#737373] block">Tarif per Malam</span>
                            <span class="font-mono text-xl sm:text-2xl font-bold text-[#d16806]">
                                {{ $room->formatted_price }}
                            </span>
                            <span class="text-[11px] text-[#8c867e] block">Termasuk Pajak & Layanan</span>
                        </div>
                        <a href="{{ route('booking.create', ['room_type_id' => $room->id]) }}" 
                           class="pressable inline-flex items-center gap-2 px-6 py-3 rounded-[9px] bg-[#d16806] hover:bg-[#b55804] text-white text-xs font-semibold tracking-wider uppercase transition-colors shadow-sm shrink-0">
                            <span>Pesan Kamar</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    </div>

                </div>
            @endforeach
        </div>

        <!-- Ketentuan Biaya & Diskon Menginap (Integrated Minimalist Flow) -->
        <div class="pt-8 border-t border-[#e9e9e9] grid grid-cols-1 sm:grid-cols-2 gap-8 text-xs text-[#737373] font-light leading-relaxed">
            <div class="space-y-1.5">
                <p class="font-medium text-[#1a1a1a] text-sm font-serif">Opsi Sarapan Prasmanan</p>
                <p>Sarapan prasmanan di Sailendra Restaurant tersedia dengan biaya tambahan <strong class="font-mono text-[#1a1a1a] font-medium">Rp 80.000 / orang / hari</strong>.</p>
            </div>
            <div class="space-y-1.5">
                <p class="font-medium text-[#1a1a1a] text-sm font-serif">Diskon Menginap Panjang</p>
                <p>Reservasi untuk durasi lebih dari 3 hari otomatis mendapatkan <strong class="text-[#d16806] font-medium">potongan diskon 10%</strong> dari total biaya sewa kamar.</p>
            </div>
        </div>

    </section>

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const videoPlayer = document.getElementById('room-tour-player');
        const videoSource = document.getElementById('video-source');
        const videoCaption = document.getElementById('video-caption');
        const tabButtons = document.querySelectorAll('.video-tab-btn');

        tabButtons.forEach(btn => {
            btn.addEventListener('click', function () {
                const src = this.dataset.videoSrc;
                const name = this.dataset.roomName;
                const poster = this.dataset.roomPoster;

                // Update active tab styling
                tabButtons.forEach(b => {
                    b.classList.remove('bg-[#d16806]', 'text-white', 'shadow-sm');
                    b.classList.add('text-[#606060]', 'hover:text-[#1a1a1a]');
                });
                this.classList.add('bg-[#d16806]', 'text-white', 'shadow-sm');
                this.classList.remove('text-[#606060]', 'hover:text-[#1a1a1a]');

                // Update video source and caption
                if (videoPlayer && videoSource) {
                    videoSource.src = src;
                    if (poster) {
                        videoPlayer.poster = poster;
                    }
                    videoPlayer.load();
                    videoPlayer.play().catch(e => console.log('Autoplay dicegah browser:', e));
                }

                if (videoCaption) {
                    videoCaption.textContent = `Tur Video: Kamar ${name} — JW Marriott Hotel Jakarta`;
                }
            });
        });
    });
</script>
@endpush
