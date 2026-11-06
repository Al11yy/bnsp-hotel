@extends('layouts.app')

@section('content')
<!-- BANNER PRODUK & KOLEKSI KAMAR -->
<section class="pt-36 pb-20 px-6 sm:px-8 lg:px-12 bg-[#0D0C0B] text-white border-b border-white/10">
    <div class="max-w-7xl mx-auto space-y-4">
        <span class="text-[11px] font-semibold tracking-[0.25em] uppercase text-[#8C867E] block">
            — KATALOG ARSITEKTURAL
        </span>
        <h1 class="font-serif text-4xl sm:text-6xl font-normal text-white">
            Koleksi Kamar & Video Tur.
        </h1>
        <p class="text-xs sm:text-sm text-[#8C867E] max-w-xl leading-relaxed font-light">
            Menampilkan 3 tipe kamar pilihan (Standar, Deluxe, Family) lengkap dengan dokumentasi visual foto dan video tur interaktif sesuai lembar tugas BNSP FR.IA.02.
        </p>
    </div>
</section>

<!-- SECTION PEMUTAR VIDEO MULTIMEDIA (Butir c Soal BNSP) -->
<section class="py-20 bg-[#121110] text-white border-b border-white/10">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 space-y-10">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 pb-6 border-b border-white/10">
            <div>
                <span class="text-[10px] font-semibold tracking-[0.2em] uppercase text-[#C46849] block mb-1">DOKUMENTASI VIDEO</span>
                <h2 class="font-serif text-2xl sm:text-3xl font-normal text-white">
                    Video Tur Suasana Kamar Hotel
                </h2>
            </div>

            <!-- Tab Switcher Tombol Video Interaktif -->
            <div class="inline-flex p-1 bg-[#1A1816] rounded-full border border-white/10" role="tablist">
                @foreach($roomTypes as $index => $room)
                    <button type="button" 
                            class="video-tab-btn pressable px-5 py-2 rounded-full text-xs font-medium tracking-wider uppercase transition-all {{ $index === 0 ? 'bg-[#C46849] text-white' : 'text-[#8C867E] hover:text-white' }}"
                            data-video-src="{{ asset($room->video_url) }}"
                            data-room-name="{{ $room->name }}"
                            data-room-poster="{{ asset($room->image_url) }}">
                        {{ $room->name }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Pemutar Video HTML5 -->
        <div class="relative rounded-3xl overflow-hidden aspect-video bg-black border border-white/15 shadow-2xl max-w-5xl mx-auto">
            <video id="room-tour-player" 
                   class="w-full h-full object-cover" 
                   controls 
                   preload="metadata"
                   poster="{{ asset($roomTypes->first()->image_url ?? '') }}">
                <source id="video-source" src="{{ asset($roomTypes->first()->video_url ?? '') }}" type="video/mp4">
                Browser Anda tidak mendukung pemutar video HTML5.
            </video>
            
            <div id="video-caption" class="absolute top-6 left-6 bg-[#121110]/80 backdrop-blur-md px-4 py-2 rounded-full border border-white/10 text-xs font-mono tracking-wider uppercase text-[#EAE5DC]">
                Tur Video: Kamar {{ $roomTypes->first()->name ?? 'Hotel' }}
            </div>
        </div>

    </div>
</section>

<!-- SECTION KATALOG 3 TIPE KAMAR DETAIL -->
<section class="py-24 bg-[#F7F5F0] text-[#141312]">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 space-y-24">
        
        <div class="max-w-2xl space-y-2">
            <span class="text-[11px] font-semibold tracking-[0.25em] uppercase text-[#8C867E] block">
                — SPESIFIKASI RUANG
            </span>
            <h2 class="font-serif text-3xl sm:text-5xl font-normal text-[#141312]">
                Detail & Fasilitas Kamar.
            </h2>
        </div>

        <div class="space-y-24">
            @foreach($roomTypes as $index => $room)
                <div id="kamar-{{ $room->slug }}" class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-start pb-20 border-b border-stone-300 last:border-b-0">
                    
                    <!-- Foto Kamar -->
                    <div class="lg:col-span-6">
                        <div class="rounded-3xl overflow-hidden aspect-[16/11] bg-stone-300 border border-stone-300 shadow-md">
                            <img src="{{ asset($room->image_url) }}" 
                                 alt="Kamar {{ $room->name }}" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>

                    <!-- Spesifikasi Kamar -->
                    <div class="lg:col-span-6 space-y-8">
                        <div>
                            <div class="flex items-center justify-between pb-4 border-b border-stone-300">
                                <div>
                                    <span class="text-xs font-mono text-stone-400 tabular-nums">TIPE 0{{ $index + 1 }}</span>
                                    <h3 class="font-serif text-3xl sm:text-4xl font-normal text-stone-900 mt-1">
                                        Kamar {{ $room->name }}
                                    </h3>
                                </div>
                                <div class="text-right">
                                    <span class="text-xs text-stone-400 block font-light">Tarif Per Malam</span>
                                    <span class="font-mono text-2xl font-semibold text-[#B85D3E] tabular-nums">
                                        {{ $room->formatted_price }}
                                    </span>
                                </div>
                            </div>

                            <p class="text-xs sm:text-sm text-stone-600 leading-relaxed font-light mt-4">
                                {{ $room->description }}
                            </p>
                        </div>

                        <!-- Grid Kapasitas & Ranjang -->
                        <div class="grid grid-cols-2 gap-6 p-5 rounded-2xl bg-stone-200/60 border border-stone-300 text-xs">
                            <div>
                                <span class="text-stone-400 block text-[10px] uppercase tracking-wider font-semibold">Kapasitas Tamu</span>
                                <strong class="text-stone-900 font-medium block mt-1">👥 {{ $room->capacity }}</strong>
                            </div>
                            <div>
                                <span class="text-stone-400 block text-[10px] uppercase tracking-wider font-semibold">Tipe Ranjang</span>
                                <strong class="text-stone-900 font-medium block mt-1">🛏️ {{ $room->bed_type }}</strong>
                            </div>
                        </div>

                        <!-- Fasilitas Kamar Lengkap -->
                        <div class="space-y-3">
                            <span class="text-[10px] font-semibold tracking-widest uppercase text-stone-400 block">FASILITAS SUITE</span>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs text-stone-700 font-light">
                                @foreach($room->facilities ?? [] as $facility)
                                    <div class="flex items-center gap-2">
                                        <span class="text-[#B85D3E] font-bold">✓</span>
                                        <span>{{ $facility }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Tombol Booking -->
                        <div class="pt-4 flex items-center justify-between">
                            <span class="text-xs text-stone-500 font-light">
                                * Diskon 10% untuk menginap &gt; 3 hari
                            </span>
                            <a href="{{ route('booking.create', ['room_id' => $room->id]) }}" 
                               class="pressable px-7 py-3 rounded-full text-xs font-semibold tracking-wider uppercase bg-[#141312] text-white hover:bg-[#B85D3E] transition-all">
                                Pesan Kamar {{ $room->name }} →
                            </a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>
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
                        b.classList.remove('bg-[#C46849]', 'text-white');
                        b.classList.add('text-[#8C867E]');
                    });
                    this.classList.remove('text-[#8C867E]');
                    this.classList.add('bg-[#C46849]', 'text-white');

                    const newSrc = this.getAttribute('data-video-src');
                    const roomName = this.getAttribute('data-room-name');
                    const poster = this.getAttribute('data-room-poster');

                    videoSource.setAttribute('src', newSrc);
                    if (poster) player.setAttribute('poster', poster);
                    if (caption) caption.textContent = 'Tur Video: Kamar ' + roomName;

                    player.load();
                    player.play().catch(() => {});
                });
            });
        }
    });
</script>
@endpush
