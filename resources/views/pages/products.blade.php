@extends('layouts.app')

@section('content')
<div class="py-14 sm:py-20 lg:py-24 max-w-6xl mx-auto px-4 sm:px-8 lg:px-12 space-y-20 sm:space-y-28">

    <!-- Header Section -->
    <header class="max-w-3xl space-y-4">
        <span class="text-xs font-sans tracking-[0.25em] uppercase text-[#d16806] font-medium block">
            Akomodasi & Video Tur • JW Marriott Jakarta
        </span>
        <h1 class="font-serif text-4xl sm:text-6xl font-normal text-[#1a1a1a] tracking-tight capitalize">
            Koleksi Kamar & Video Tur
        </h1>
        <p class="text-base sm:text-lg text-[#606060] font-light leading-relaxed pt-2">
            Saksikan video tur virtual tiga pilihan kamar unggulan JW Marriott Hotel Jakarta di kawasan Mega Kuningan — Standar, Deluxe, dan Family — lengkap dengan fasilitas kemewahan bintang lima.
        </p>
    </header>

    <!-- Interactive Video Tour Section (Unboxed & Clean Flow) -->
    <section class="space-y-6">
        
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-4 border-b border-[#e9e9e9]">
            <div>
                <h2 class="font-serif text-2xl sm:text-3xl font-normal text-[#1a1a1a]">
                    Video Tur Virtual Kamar
                </h2>
                <p class="text-xs text-[#737373] mt-1 font-light">
                    Pilih tipe kamar di bawah untuk memutar cuplikan suasana interior kamar
                </p>
            </div>

            <!-- Room Switcher Tabs -->
            <div class="inline-flex p-1 bg-[#f0ece7] rounded-[10px]" role="tablist">
                @foreach($roomTypes as $index => $room)
                    <button type="button" 
                            class="video-tab-btn pressable px-4 py-2 rounded-[8px] text-xs font-medium tracking-wide uppercase transition-all {{ $index === 0 ? 'bg-[#d16806] text-white shadow-sm' : 'text-[#606060] hover:text-[#1a1a1a]' }}"
                            data-video-src="{{ $room->video_stream_url }}"
                            data-room-name="{{ $room->name }}"
                            data-room-poster="{{ asset($room->image_url) }}">
                        {{ $room->name }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Video Player (Edge-to-Edge Container without heavy boxes) -->
        <div class="relative overflow-hidden aspect-video bg-black shadow-sm">
            <video id="room-tour-player" 
                   class="w-full h-full object-cover" 
                   controls 
                   muted
                   playsinline
                   preload="metadata"
                   poster="{{ asset($roomTypes->first()->image_url ?? '') }}">
                <source id="video-source" src="{{ $roomTypes->first()->video_stream_url ?? route('video.stream', ['filename' => 'standar_tour.mp4']) }}" type="video/mp4">
                Browser Anda tidak mendukung pemutar video HTML5.
            </video>
            
            <!-- <div id="video-caption" class="absolute top-4 left-4 bg-white/90 backdrop-blur-md px-4 py-1.5 rounded-full text-xs font-mono text-[#1a1a1a] shadow-sm">
                Tur Video: Kamar {{ $roomTypes->first()->name ?? 'Hotel' }} — JW Marriott Jakarta
            </div> -->
        </div>

    </section>

    <!-- Room Cards (Exact Editorial Horizontal Layout Matching Screenshot) -->
    <section class="space-y-8">
        
        <div class="border-b border-[#1a1a1a] pb-4">
            <h2 class="font-serif text-3xl sm:text-4xl font-normal text-[#1a1a1a]">
                Pilihan Kamar Unggulan
            </h2>
            <p class="text-xs sm:text-sm text-[#737373] font-light mt-1">
                Kenyamanan istimewa dengan tempat tidur signature Marriott, pencahayaan hangat, dan panorama kota Jakarta.
            </p>
        </div>

        <div class="divide-y divide-[#e9e9e9]">
            @foreach($roomTypes as $room)
                @php
                    $imageMap = [
                        'Standar' => 'standar.jpg',
                        'Deluxe' => 'deluxe.jpg',
                        'Family' => 'family.jpg',
                    ];
                    $imageName = $imageMap[$room->name] ?? 'standar.jpg';
                    $specsMap = [
                        'Standar' => ['Ukuran' => '32 m²', 'Tempat Tidur' => 'Twin Bed', 'Kapasitas' => '2 Tamu Dewasa'],
                        'Deluxe' => ['Ukuran' => '42 m²', 'Tempat Tidur' => 'King Bed', 'Kapasitas' => '2 Tamu Dewasa'],
                        'Family' => ['Ukuran' => '65 m²', 'Tempat Tidur' => 'King + Twin Suite', 'Kapasitas' => '4 Tamu Dewasa'],
                    ];
                    $specs = $specsMap[$room->name] ?? ['Ukuran' => '35 m²', 'Tempat Tidur' => 'Queen Bed', 'Kapasitas' => '2 Tamu'];
                @endphp
                <article class="py-12 first:pt-4 last:pb-0 grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                    
                    <!-- Media Asset (Authentic JW Marriott Photography) -->
                    <div class="lg:col-span-5 overflow-hidden aspect-[16/10] bg-[#f0ece7]">
                        <img src="{{ asset('assets/images/rooms/' . $imageName) }}" 
                             alt="{{ $room->name }} JW Marriott Jakarta" 
                             class="w-full h-full object-cover">
                    </div>

                    <!-- Room Information & Pricing -->
                    <div class="lg:col-span-7 space-y-6">
                        
                        <!-- Header Row: Tipe Kamar & Tarif -->
                        <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4">
                            <div class="space-y-1">
                                <span class="text-xs font-mono text-[#d16806] tracking-widest block uppercase">
                                    TIPE KAMAR RESMI
                                </span>
                                <h2 class="font-serif text-3xl sm:text-4xl font-normal text-[#1a1a1a]">
                                    {{ $room->name }} Room
                                </h2>
                            </div>
                            <div class="text-left sm:text-right">
                                <span class="text-[11px] font-sans uppercase tracking-[0.15em] text-[#737373] block">TARIF PER MALAM</span>
                                <p class="font-mono text-2xl sm:text-3xl font-bold text-[#d16806]">
                                    {{ $room->formatted_price }}
                                </p>
                                <span class="text-xs text-[#737373] font-light block">Termasuk Pajak & Layanan</span>
                            </div>
                        </div>

                        <!-- Description Paragraph -->
                        <p class="text-sm sm:text-base text-[#606060] font-light leading-relaxed">
                            {{ $room->description }}
                        </p>

                        <!-- Room Specs (Luas, Ranjang, Kapasitas) -->
                        <div class="grid grid-cols-3 gap-4 py-4 border-y border-[#f0ece7] text-xs">
                            <div>
                                <span class="text-[#8c867e] block text-[11px] uppercase tracking-wider">LUAS KAMAR</span>
                                <span class="text-[#1a1a1a] font-medium">{{ $specs['Ukuran'] }}</span>
                            </div>
                            <div>
                                <span class="text-[#8c867e] block text-[11px] uppercase tracking-wider">TEMPAT TIDUR</span>
                                <span class="text-[#1a1a1a] font-medium">{{ $specs['Tempat Tidur'] }}</span>
                            </div>
                            <div>
                                <span class="text-[#8c867e] block text-[11px] uppercase tracking-wider">KAPASITAS</span>
                                <span class="text-[#1a1a1a] font-medium">{{ $specs['Kapasitas'] }}</span>
                            </div>
                        </div>

                        <!-- Footer Row: Subtext & Action Button -->
                        <div class="pt-2 flex items-center justify-between">
                            <span class="text-xs text-[#737373] font-light">Konfirmasi instan secara online</span>
                            <a href="{{ route('booking.create', ['room_id' => $room->id]) }}" 
                               class="pressable inline-flex items-center gap-2 px-6 py-3 rounded-[9px] bg-[#d16806] hover:bg-[#b55804] text-white text-xs font-semibold tracking-wider uppercase transition-colors shadow-sm">
                                <span>PESAN KAMAR INI</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        </div>

                    </div>

                </article>
            @endforeach
        </div>

    </section>

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabButtons = document.querySelectorAll('.video-tab-btn');
        const player = document.getElementById('room-tour-player');
        const videoSource = document.getElementById('video-source');
        const caption = document.getElementById('video-caption');

        if (player) {
            // Mute secara default saat halaman dimuat
            player.muted = true;
            player.defaultMuted = true;
        }

        if (tabButtons.length > 0 && player && videoSource) {
            tabButtons.forEach(btn => {
                btn.addEventListener('click', function () {
                    tabButtons.forEach(b => {
                        b.classList.remove('bg-[#d16806]', 'text-white', 'shadow-sm');
                        b.classList.add('text-[#606060]', 'hover:text-[#1a1a1a]');
                    });
                    this.classList.remove('text-[#606060]', 'hover:text-[#1a1a1a]');
                    this.classList.add('bg-[#d16806]', 'text-white', 'shadow-sm');

                    const newSrc = this.getAttribute('data-video-src');
                    const roomName = this.getAttribute('data-room-name');
                    const poster = this.getAttribute('data-room-poster');

                    // Set video tetap termute terlebih dahulu sesuai instruksi
                    player.muted = true;
                    player.defaultMuted = true;
                    player.src = newSrc;
                    videoSource.setAttribute('src', newSrc);
                    if (poster) player.setAttribute('poster', poster);
                    if (caption) caption.textContent = 'Tur Video: Kamar ' + roomName + ' — JW Marriott Jakarta';

                    player.load();
                    player.play().catch(function() {});
                });
            });
        }
    });
</script>
@endpush
