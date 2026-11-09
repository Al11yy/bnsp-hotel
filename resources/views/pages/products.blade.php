@extends('layouts.app')

@section('content')
<div class="py-12 sm:py-16 space-y-20">

    <!-- Header Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-14">
        <div class="max-w-3xl space-y-4">
            <span class="text-xs font-sans tracking-[0.2em] uppercase text-[#d16806] font-medium">
                Katalog Ruang & Kenyamanan
            </span>
            <h1 class="font-serif text-4xl sm:text-6xl font-normal text-[#1a1a1a] capitalize">
                Koleksi Kamar & Video Tur
            </h1>
            <p class="text-sm sm:text-base text-[#606060] font-light leading-relaxed">
                Menampilkan tiga pilihan akomodasi unggulan JW Marriott Hotel Jakarta — Standar, Deluxe, dan Family — lengkap dengan kasur signature Marriott, interior elegan berpanorama kota, dan dokumentasi video tur virtual.
            </p>
        </div>
    </section>

    <!-- Interactive Video Tour Section (JW Marriott Jakarta Walkthrough) -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-14">
        <div class="bg-white rounded-[24px] sm:rounded-[32px] p-6 sm:p-10 border border-[#f4e2d8] shadow-sm space-y-8">
            
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-[#e9e9e9]">
                <div>
                    <h2 class="font-serif text-2xl sm:text-3xl font-normal text-[#1a1a1a]">
                        Video Tur Virtual Kamar
                    </h2>
                    <p class="text-xs text-[#737373] mt-1 font-light">
                        Pilih tipe kamar di bawah untuk memutar cuplikan tur suasana kamar secara langsung
                    </p>
                </div>

                <!-- Room Switcher Tabs -->
                <div class="inline-flex p-1 bg-[#f9f6f3] rounded-[10px] border border-[#e9e9e9]" role="tablist">
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

            <!-- Video Player -->
            <div class="relative rounded-[20px] overflow-hidden aspect-video bg-black shadow-md max-w-5xl mx-auto">
                <video id="room-tour-player" 
                       class="w-full h-full object-cover" 
                       controls 
                       playsinline
                       preload="metadata"
                       poster="{{ asset($roomTypes->first()->image_url ?? '') }}">
                    <source id="video-source" src="{{ asset($roomTypes->first()->video_url ?? '') }}" type="video/mp4">
                    Browser Anda tidak mendukung pemutar video HTML5.
                </video>
                
                <div id="video-caption" class="absolute top-4 left-4 bg-white/90 backdrop-blur-md px-3.5 py-1.5 rounded-full border border-white/60 text-xs font-mono text-[#1a1a1a]">
                    Tur Video: Kamar {{ $roomTypes->first()->name ?? 'Hotel' }} — JW Marriott Jakarta
                </div>
            </div>

        </div>
    </section>

    <!-- Detail 3 Tipe Kamar (JW Marriott Jakarta Rooms) -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-14">
        <div class="space-y-16">
            @foreach($roomTypes as $index => $room)
                <div id="kamar-{{ $room->slug }}" class="bg-white rounded-[24px] sm:rounded-[32px] p-6 sm:p-10 border border-[#f4e2d8] shadow-sm grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                    
                    <!-- Foto Kamar (Authentic JW Marriott Photography) -->
                    <div class="lg:col-span-6">
                        <div class="rounded-[20px] overflow-hidden aspect-[4/3] bg-[#f9f6f3] shadow-inner">
                            <img src="{{ asset($room->image_url) }}" 
                                 alt="Kamar {{ $room->name }} JW Marriott Jakarta" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>

                    <!-- Spesifikasi Kamar -->
                    <div class="lg:col-span-6 space-y-6">
                        <div class="pb-4 border-b border-[#e9e9e9] flex items-start justify-between gap-4">
                            <div>
                                <span class="text-xs font-sans tracking-widest text-[#d16806] uppercase block">
                                    Pilihan 0{{ $index + 1 }}
                                </span>
                                <h3 class="font-serif text-3xl sm:text-4xl font-normal text-[#1a1a1a] mt-1 capitalize">
                                    Kamar {{ $room->name }}
                                </h3>
                            </div>
                            <div class="text-right">
                                <span class="text-xs text-[#737373] block font-light">Tarif per malam</span>
                                <span class="font-sans font-semibold text-2xl text-[#d16806] tabular-nums">
                                    {{ $room->formatted_price }}
                                </span>
                            </div>
                        </div>

                        <p class="text-xs sm:text-sm text-[#606060] font-light leading-relaxed">
                            {{ $room->description }}
                        </p>

                        <!-- Specifications Grid (NO EMOJIS, Clean Minimalist Design) -->
                        <div class="grid grid-cols-2 gap-4 p-4 rounded-[12px] bg-[#f9f6f3] border border-[#e9e9e9] text-xs">
                            <div class="space-y-1">
                                <span class="text-[11px] font-medium uppercase tracking-wider text-[#737373] block">Kapasitas Tamu</span>
                                <span class="text-[#1a1a1a] font-medium block">{{ $room->capacity }}</span>
                            </div>
                            <div class="space-y-1">
                                <span class="text-[11px] font-medium uppercase tracking-wider text-[#737373] block">Tipe Ranjang</span>
                                <span class="text-[#1a1a1a] font-medium block">{{ $room->bed_type }}</span>
                            </div>
                        </div>

                        <!-- Amenities List -->
                        <div class="space-y-2.5">
                            <span class="text-xs font-medium uppercase tracking-wider text-[#1a1a1a] block">Fasilitas Kamar:</span>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs text-[#606060]">
                                @foreach($room->facilities ?? [] as $facility)
                                    <div class="flex items-center gap-2">
                                        <svg class="w-3.5 h-3.5 text-[#d16806] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        <span>{{ $facility }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Action Button -->
                        <div class="pt-2 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                            <span class="text-xs text-[#737373] font-light">
                                Diskon 10% untuk durasi lebih dari 3 hari
                            </span>
                            <a href="{{ route('booking.create', ['room_type_id' => $room->id]) }}" 
                               class="pressable px-6 py-3 rounded-[9px] bg-[#d16806] hover:bg-[#b55804] text-white text-xs font-semibold tracking-wider uppercase text-center transition-colors shadow-sm">
                                Pesan Kamar {{ $room->name }} →
                            </a>
                        </div>

                    </div>

                </div>
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

        if (tabButtons.length > 0 && player && videoSource) {
            tabButtons.forEach(btn => {
                btn.addEventListener('click', function () {
                    tabButtons.forEach(b => {
                        b.classList.remove('bg-[#d16806]', 'text-white', 'shadow-sm');
                        b.classList.add('text-[#606060]');
                    });
                    this.classList.remove('text-[#606060]');
                    this.classList.add('bg-[#d16806]', 'text-white', 'shadow-sm');

                    const newSrc = this.getAttribute('data-video-src');
                    const roomName = this.getAttribute('data-room-name');
                    const poster = this.getAttribute('data-room-poster');

                    videoSource.setAttribute('src', newSrc);
                    if (poster) player.setAttribute('poster', poster);
                    if (caption) caption.textContent = 'Tur Video: Kamar ' + roomName + ' — JW Marriott Jakarta';

                    player.load();
                    player.play().catch(() => {});
                });
            });
        }
    });
</script>
@endpush
