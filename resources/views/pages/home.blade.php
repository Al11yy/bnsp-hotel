@extends('layouts.app')

@section('content')
<!-- HERO SECTION (Inspired by SOLÉM Masterpiece) -->
<section class="relative min-h-screen flex flex-col justify-between pt-32 pb-16 px-6 sm:px-8 lg:px-12 bg-[#0D0C0B] text-white overflow-hidden">
    
    <!-- Top Editorial Wordmark (Huge Serif Title across the viewport) -->
    <div class="max-w-7xl mx-auto w-full text-center relative z-10 pt-4">
        <h1 class="font-serif text-[18vw] sm:text-[16vw] lg:text-[14vw] leading-[0.82] font-normal tracking-[-0.03em] uppercase text-[#E8DFD0] select-none">
            HARMONI
        </h1>
    </div>

    <!-- Center Hero Composition with Architectural Visual -->
    <div class="max-w-7xl mx-auto w-full relative mt-[-4vw] sm:mt-[-5vw] z-20">
        
        <div class="relative rounded-3xl overflow-hidden aspect-[16/10] sm:aspect-[21/10] bg-[#1A1816] border border-white/10 shadow-2xl">
            <!-- Architectural Background Image -->
            <img src="{{ asset('assets/images/rooms/hero.jpg') }}" 
                 alt="Grand Harmoni Architectural Villa" 
                 class="w-full h-full object-cover object-center filter brightness-[0.88] contrast-[1.05]">
            
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/20 pointer-events-none"></div>

            <!-- Floating Glassmorphic Room Spec Card (Like the Solém reference) -->
            <div class="absolute bottom-6 right-6 sm:bottom-10 sm:right-10 max-w-xs sm:max-w-sm bg-[#121110]/80 backdrop-blur-xl border border-white/15 p-5 sm:p-6 rounded-2xl shadow-2xl text-left hidden sm:block">
                <div class="flex items-center justify-between pb-3 border-b border-white/10">
                    <div>
                        <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#C46849] block">Featured Suite</span>
                        <h4 class="font-serif text-lg font-normal text-white">Deluxe Sanctuary</h4>
                    </div>
                    <span class="text-xs font-mono tabular-nums font-semibold text-[#E8DFD0]">Rp 800.000<span class="text-[10px] text-[#8C867E]">/mlm</span></span>
                </div>
                <div class="pt-3 text-[11px] text-[#A89F91] space-y-1.5 font-light">
                    <p>• Area: 48m² • King Bed • Private Terrace</p>
                    <p>• Marmer Bathtub & Pour-over Coffee Bar</p>
                </div>
                <a href="{{ route('booking.create', ['room_id' => 2]) }}" 
                   class="pressable mt-4 w-full block text-center py-2.5 rounded-xl text-[11px] font-semibold tracking-wider uppercase bg-[#F7F5F0] text-[#121110] hover:bg-[#C46849] hover:text-white transition-all">
                    Booking Kamar Ini
                </a>
            </div>

            <!-- Left Corner Caption on Image -->
            <div class="absolute bottom-6 left-6 sm:bottom-10 sm:left-10 text-xs tracking-wider uppercase font-light text-white/80">
                <span class="block text-[10px] text-[#8C867E]">ARCHITECTURE & SUITES</span>
                <span class="font-medium text-[#E8DFD0]">JAKARTA RESIDENCE / 2026</span>
            </div>
        </div>

    </div>

    <!-- Bottom Hero Sub-bar -->
    <div class="max-w-7xl mx-auto w-full pt-8 flex flex-col sm:flex-row items-start sm:items-center justify-between text-xs tracking-[0.2em] text-[#8C867E] uppercase border-t border-white/10 gap-4 mt-6">
        <div>
            <span>HOTEL BINTANG 4</span> — <span>KENYAMANAN TAK LEKANG WAKTU</span>
        </div>
        <div class="flex items-center gap-6">
            <a href="#kamar-koleksi" class="hover:text-white transition-colors flex items-center gap-1.5">
                <span>Jelajahi 3 Tipe Kamar</span>
                <span>↓</span>
            </a>
            <a href="{{ route('booking.create') }}" class="hover:text-white transition-colors flex items-center gap-1.5">
                <span>Form Pemesanan</span>
                <span>→</span>
            </a>
        </div>
    </div>

</section>

<!-- SECTION 2: PHILOSOPHY & ABOUT (Light Cream Stone Ground — Inspired by Solém Mid-Section) -->
<section id="filosofi" class="py-28 bg-[#F7F5F0] text-[#141312] border-t border-stone-300/60">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
            
            <!-- Left Sub-label -->
            <div class="lg:col-span-3">
                <span class="text-[11px] font-semibold tracking-[0.25em] uppercase text-[#8C867E]">
                    — TENTANG HARMONI
                </span>
            </div>

            <!-- Center Statement -->
            <div class="lg:col-span-9 space-y-12">
                <h2 class="font-serif text-3xl sm:text-5xl lg:text-6xl font-normal leading-[1.15] text-[#141312]">
                    We design <span class="italic font-normal">atmospheres</span>, not just rooms. Our stay is defined by <span class="italic text-[#B85D3E]">material honesty</span> and a quiet respect for your comfort.
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center pt-4 border-t border-stone-200">
                    
                    <!-- Circular Artisan Stamp (Inspired by reference stamp) -->
                    <div class="md:col-span-3 flex items-center justify-start">
                        <div class="w-24 h-24 rounded-full border border-stone-400/80 flex flex-col items-center justify-center text-center p-2 text-[9px] uppercase tracking-widest text-stone-600 font-semibold select-none">
                            <span>HOTEL</span>
                            <span class="font-serif text-base italic text-[#B85D3E] font-normal my-0.5">Grand</span>
                            <span>HARMONI</span>
                        </div>
                    </div>

                    <!-- Narrative Paragraph -->
                    <div class="md:col-span-5 text-xs sm:text-sm text-stone-600 leading-relaxed font-light">
                        Terletak di jantung kota, Hotel Grand Harmoni menghadirkan peristirahatan yang memadukan batu travertine hangat, kayu oak mentah, dan pencahayaan alami yang menyejukkan pikiran Anda.
                    </div>

                    <!-- Architectural Accent Thumbnail -->
                    <div class="md:col-span-4">
                        <div class="rounded-2xl overflow-hidden aspect-[4/3] bg-stone-300 shadow-md">
                            <img src="{{ asset('assets/images/rooms/detail.jpg') }}" 
                                 alt="Architectural detail" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section>

<!-- SECTION 3: 3 PILIHAN TIPE KAMAR (Deep Dark Charcoal — Inspired by Solém Services Rows) -->
<section id="kamar-koleksi" class="py-28 bg-[#121110] text-white border-t border-white/10">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 space-y-20">
        
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between pb-8 border-b border-white/10 gap-6">
            <div>
                <span class="text-[11px] font-semibold tracking-[0.25em] uppercase text-[#8C867E] block mb-2">
                    — PILIHAN AKOMODASI
                </span>
                <h2 class="font-serif text-3xl sm:text-5xl font-normal text-white">
                    Timeless Comfort. <span class="italic text-[#EAE5DC]">Bespoke Suites.</span>
                </h2>
            </div>
            <p class="text-xs text-[#8C867E] max-w-sm leading-relaxed font-light">
                Tersedia 3 jenis kamar yang dirancang dengan integritas estetika tinggi. Sesuai skenario uji kompetensi BNSP (Standar, Deluxe, Family).
            </p>
        </div>

        <!-- Room Rows (Editorial Duo-Image Showcase like Reference) -->
        <div class="space-y-24">
            @foreach($roomTypes as $index => $room)
                <div class="space-y-6 pb-20 border-b border-white/10 last:border-b-0">
                    
                    <!-- Row Header: Number, Name, Price & Action -->
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 gap-4">
                        <div class="flex items-baseline gap-4">
                            <span class="text-xs font-mono text-[#8C867E] tabular-nums">0{{ $index + 1 }}</span>
                            <h3 class="font-serif text-2xl sm:text-3xl font-normal text-white">
                                Kamar {{ $room->name }}
                            </h3>
                            <span class="text-xs text-[#8C867E] font-light hidden sm:inline">— {{ $room->capacity }}</span>
                        </div>
                        
                        <div class="flex items-center gap-6">
                            <div class="text-right">
                                <span class="text-xs text-[#8C867E] block font-light">Tarif Per Malam</span>
                                <span class="text-xl font-mono tabular-nums font-semibold text-[#E8DFD0]">{{ $room->formatted_price }}</span>
                            </div>
                            <a href="{{ route('booking.create', ['room_id' => $room->id]) }}" 
                               class="pressable px-6 py-2.5 rounded-full text-xs font-semibold tracking-wider uppercase bg-[#C46849] text-white hover:bg-[#d07354] transition-all">
                                Pesan
                            </a>
                        </div>
                    </div>

                    <!-- Dual Photographic Gallery Composition -->
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-stretch">
                        
                        <!-- Primary Wide View -->
                        <div class="md:col-span-8 rounded-3xl overflow-hidden aspect-[16/10] bg-[#1A1816] border border-white/10 group">
                            <img src="{{ asset($room->image_url) }}" 
                                 alt="Kamar {{ $room->name }}" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        </div>

                        <!-- Secondary Specs & Editorial Detail Box -->
                        <div class="md:col-span-4 rounded-3xl bg-[#181715] border border-white/10 p-8 flex flex-col justify-between space-y-6">
                            <div class="space-y-4">
                                <span class="text-[10px] font-semibold tracking-widest uppercase text-[#8C867E] block">SPESIFIKASI & FASILITAS</span>
                                <p class="text-xs text-[#C7BFB4] leading-relaxed font-light">
                                    {{ $room->description }}
                                </p>

                                <div class="space-y-2 pt-2 border-t border-white/5 text-xs text-[#EAE5DC] font-light">
                                    <p>🛏️ <strong>Ranjang:</strong> {{ $room->bed_type }}</p>
                                    <p>👥 <strong>Kapasitas:</strong> {{ $room->capacity }}</p>
                                    <p>🍳 <strong>Sarapan:</strong> Opsional (+ Rp 80.000)</p>
                                </div>

                                <div class="pt-2">
                                    <p class="text-[10px] uppercase tracking-wider text-[#8C867E] mb-2 font-medium">Fitur Kamar:</p>
                                    <ul class="text-xs text-[#A89F91] space-y-1 font-light">
                                        @foreach(array_slice($room->facilities ?? [], 0, 4) as $facility)
                                            <li>• {{ $facility }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <a href="{{ route('products') }}#kamar-{{ $room->slug }}" 
                               class="text-xs font-medium tracking-wider uppercase text-[#E8DFD0] hover:text-[#C46849] flex items-center gap-2 pt-4 border-t border-white/10 transition-colors">
                                <span>Lihat Video Tur Lengkap</span>
                                <span>→</span>
                            </a>
                        </div>

                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- SECTION 4: CINEMATIC VIDEO SHOWCASE (Butir c Soal BNSP) -->
<section class="py-24 bg-[#0D0C0B] text-white border-t border-white/10">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        
        <div class="max-w-3xl mb-12">
            <span class="text-[11px] font-semibold tracking-[0.25em] uppercase text-[#8C867E] block mb-2">
                — TUR MULTIMEDIA
            </span>
            <h2 class="font-serif text-3xl sm:text-4xl font-normal text-white">
                Architecture in Motion.
            </h2>
            <p class="text-xs sm:text-sm text-[#8C867E] font-light mt-2">
                Dokumentasi visual suasana ruang peristirahatan yang nyata untuk transparansi pemesanan tamu (sesuai Butir c FR.IA.02).
            </p>
        </div>

        <!-- Architectural Video Frame -->
        <div class="relative rounded-3xl overflow-hidden aspect-video bg-black border border-white/15 shadow-2xl max-w-5xl mx-auto">
            <video class="w-full h-full object-cover" 
                   controls 
                   preload="metadata"
                   poster="{{ asset('assets/images/rooms/deluxe.jpg') }}">
                <source src="{{ asset('assets/videos/rooms/hotel_tour.mp4') }}" type="video/mp4">
                Browser Anda tidak mendukung tag video HTML5.
            </video>
        </div>

    </div>
</section>

<!-- SECTION 5: MINIMALIST PRICE TABLE (Daftar Harga Sesuai Butir 1) -->
<section id="tabel-harga" class="py-28 bg-[#F7F5F0] text-[#141312] border-t border-stone-300">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 space-y-12">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 pb-6 border-b border-stone-300">
            <div>
                <span class="text-[11px] font-semibold tracking-[0.25em] uppercase text-[#8C867E] block mb-2">
                    — STRUKTUR TARIF RESMI
                </span>
                <h2 class="font-serif text-3xl sm:text-4xl font-normal text-[#141312]">
                    Tabel Daftar Harga Kamar
                </h2>
            </div>
            <a href="{{ route('prices') }}" class="text-xs font-semibold tracking-wider uppercase text-[#B85D3E] hover:underline">
                Halaman Lengkap Daftar Harga →
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs sm:text-sm">
                <thead>
                    <tr class="border-b border-stone-300 text-stone-500 uppercase text-[10px] sm:text-[11px] tracking-widest font-semibold">
                        <th class="py-4 px-4 w-12 text-center">NO</th>
                        <th class="py-4 px-4">TIPE KAMAR</th>
                        <th class="py-4 px-4">KAPASITAS</th>
                        <th class="py-4 px-4">TIPE RANJANG</th>
                        <th class="py-4 px-4 text-right">TARIF / MALAM</th>
                        <th class="py-4 px-4 text-center w-32">AKSI</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-200">
                    @foreach($roomTypes as $index => $room)
                        <tr class="hover:bg-stone-200/50 transition-colors">
                            <td class="py-5 px-4 text-center font-mono text-stone-400 tabular-nums">0{{ $index + 1 }}</td>
                            <td class="py-5 px-4 font-serif text-base sm:text-lg text-stone-900 font-medium">
                                Kamar {{ $room->name }}
                            </td>
                            <td class="py-5 px-4 text-stone-600 font-light">{{ $room->capacity }}</td>
                            <td class="py-5 px-4 text-stone-600 font-light">{{ $room->bed_type }}</td>
                            <td class="py-5 px-4 text-right font-mono font-semibold text-stone-900 tabular-nums text-base">
                                {{ $room->formatted_price }}
                            </td>
                            <td class="py-5 px-4 text-center">
                                <a href="{{ route('booking.create', ['room_id' => $room->id]) }}" 
                                   class="pressable inline-block px-5 py-2 rounded-full text-[11px] font-semibold tracking-wider uppercase bg-[#141312] text-white hover:bg-[#B85D3E] transition-all">
                                    Pesan
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Ketentuan Khusus BNSP (Diskon 10% dan Sarapan Rp 80.000) -->
        <div class="p-6 rounded-2xl bg-stone-200/60 border border-stone-300 text-xs text-stone-700 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div class="space-y-1">
                <span class="font-semibold text-stone-900 uppercase tracking-wider text-[10px] block">Ketentuan Khusus Reservasi BNSP:</span>
                <p class="font-light leading-relaxed">
                    • Diskon <strong>10%</strong> otomatis diterapkan untuk durasi menginap lebih dari 3 hari (&gt; 3 hari).<br>
                    • Pilihan sarapan pagi prasmanan (buffet) tambahan tetap sebesar <strong>Rp 80.000</strong>.
                </p>
            </div>
            <a href="{{ route('booking.create') }}" 
               class="pressable shrink-0 px-6 py-2.5 rounded-full text-xs font-semibold tracking-wider uppercase bg-[#B85D3E] text-white hover:bg-[#a34f33] transition-all shadow-sm">
                Hitung di Form Pemesanan
            </a>
        </div>

    </div>
</section>

<!-- SECTION 6: EDITORIAL GUEST NOTE (Inspired by Solém Testimonial Section) -->
<section class="py-24 bg-[#0D0C0B] text-white border-t border-white/10">
    <div class="max-w-4xl mx-auto px-6 sm:px-8 text-center space-y-6">
        <span class="font-serif text-6xl text-[#C46849] font-normal leading-none block">“</span>
        <blockquote class="font-serif text-2xl sm:text-4xl lg:text-4xl font-normal leading-snug text-[#EAE5DC]">
            From material honesty to spatial calm, Grand Harmoni translated our retreat into pure peace. We couldn't have imagined a more <span class="italic text-[#C46849]">perfect stay</span>.
        </blockquote>
        <div class="pt-4 text-xs font-mono uppercase tracking-[0.2em] text-[#8C867E]">
            Andri Santosa — Tamu Terverifikasi BNSP
        </div>
    </div>
</section>
@endsection
