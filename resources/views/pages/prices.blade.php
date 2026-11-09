@extends('layouts.app')

@section('content')
<div class="py-14 sm:py-20 lg:py-24 max-w-6xl mx-auto px-4 sm:px-8 lg:px-12">

    <!-- Header Section -->
    <header class="max-w-3xl space-y-4 mb-16 sm:mb-20">
        <span class="text-xs font-sans tracking-[0.25em] uppercase text-[#d16806] font-medium block">
            Tarif Resmi • JW Marriott Jakarta
        </span>
        <h1 class="font-serif text-4xl sm:text-6xl font-normal text-[#1a1a1a] tracking-tight">
            Daftar Harga Kamar Hotel
        </h1>
        <p class="text-base sm:text-lg text-[#606060] font-light leading-relaxed pt-2">
            Transparansi tarif terbaik untuk peristirahatan bintang lima Anda di Jakarta. Nikmati kenyamanan berkelas, fasilitas premium, serta penawaran diskon khusus untuk masa inap lebih dari 3 hari.
        </p>
    </header>

    <!-- Room Rates List (Flat, Editorial, Standard Document Flow) -->
    <section class="space-y-12 mb-20 sm:mb-24">
        
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
                <article class="py-10 first:pt-0 last:pb-0 grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
                    
                    <!-- Media Asset (Authentic Photography) -->
                    <div class="lg:col-span-5 overflow-hidden aspect-[16/10] bg-[#f0ece7]">
                        <img src="{{ asset('assets/images/rooms/' . $imageName) }}" 
                             alt="{{ $room->name }} JW Marriott Jakarta" 
                             class="w-full h-full object-cover">
                    </div>

                    <!-- Room Information & Pricing -->
                    <div class="lg:col-span-7 space-y-6">
                        
                        <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4">
                            <div class="space-y-1">
                                <span class="text-xs font-mono text-[#d16806] tracking-widest block uppercase">
                                    Tipe Kamar Resmi
                                </span>
                                <h2 class="font-serif text-3xl sm:text-4xl font-normal text-[#1a1a1a]">
                                    {{ $room->name }} Room
                                </h2>
                            </div>
                            <div class="text-left sm:text-right">
                                <span class="text-[11px] font-sans uppercase tracking-[0.15em] text-[#737373] block">Tarif per Malam</span>
                                <p class="font-mono text-2xl sm:text-3xl font-bold text-[#d16806]">
                                    {{ $room->formatted_price }}
                                </p>
                                <span class="text-xs text-[#737373] font-light block">Termasuk Pajak & Layanan</span>
                            </div>
                        </div>

                        <p class="text-sm sm:text-base text-[#606060] font-light leading-relaxed">
                            {{ $room->description }}
                        </p>

                        <!-- Room Specs -->
                        <div class="grid grid-cols-3 gap-4 py-4 border-y border-[#f0ece7] text-xs">
                            <div>
                                <span class="text-[#8c867e] block text-[11px] uppercase tracking-wider">Luas Kamar</span>
                                <span class="text-[#1a1a1a] font-medium">{{ $specs['Ukuran'] }}</span>
                            </div>
                            <div>
                                <span class="text-[#8c867e] block text-[11px] uppercase tracking-wider">Tempat Tidur</span>
                                <span class="text-[#1a1a1a] font-medium">{{ $specs['Tempat Tidur'] }}</span>
                            </div>
                            <div>
                                <span class="text-[#8c867e] block text-[11px] uppercase tracking-wider">Kapasitas</span>
                                <span class="text-[#1a1a1a] font-medium">{{ $specs['Kapasitas'] }}</span>
                            </div>
                        </div>

                        <!-- Action Button -->
                        <div class="pt-2 flex items-center justify-between">
                            <span class="text-xs text-[#737373] font-light">Konfirmasi instan secara online</span>
                            <a href="{{ route('booking.create', ['room_id' => $room->id]) }}" 
                               class="pressable inline-flex items-center gap-2 px-6 py-3 rounded-[9px] bg-[#d16806] hover:bg-[#b55804] text-white text-xs font-semibold tracking-wider uppercase transition-colors shadow-sm">
                                <span>Pesan Kamar Ini</span>
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

    <!-- Transparent Terms & Special Offers (Integrated Document Flow) -->
    <section class="border-t border-[#e9e9e9] pt-12 sm:pt-16 space-y-10">
        
        <div class="max-w-2xl space-y-2">
            <span class="text-xs font-sans tracking-[0.2em] uppercase text-[#d16806] font-medium block">
                Kebijakan & Ketentuan Tambahan
            </span>
            <h2 class="font-serif text-3xl sm:text-4xl font-normal text-[#1a1a1a]">
                Ketentuan Tarif & Fasilitas Tambahan
            </h2>
            <p class="text-xs sm:text-sm text-[#737373] font-light">
                Seluruh harga yang tertera dihitung transparan sesuai regulasi reservasi hotel resmi.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12 pt-4">
            
            <!-- 1. Sarapan Pagi -->
            <div class="space-y-3">
                <span class="text-xs font-mono text-[#d16806] tracking-widest block">OPSI SARAPAN</span>
                <h3 class="font-serif text-2xl text-[#1a1a1a] font-normal">Buffet Breakfast</h3>
                <p class="font-mono text-lg font-bold text-[#1a1a1a]">Rp 80.000 <span class="text-xs font-sans text-[#737373] font-normal">/ orang / hari</span></p>
                <p class="text-xs sm:text-sm text-[#737373] font-light leading-relaxed">
                    Nikmati sajian sarapan prasmanan harian internasional di Sailendra Restaurant. Biaya dihitung per hari selama periode menginap Anda.
                </p>
            </div>

            <!-- 2. Diskon Long-Stay -->
            <div class="space-y-3">
                <span class="text-xs font-mono text-[#d16806] tracking-widest block">PENAWARAN KHUSUS</span>
                <h3 class="font-serif text-2xl text-[#1a1a1a] font-normal">Diskon Durasi &gt; 3 Hari</h3>
                <p class="font-mono text-lg font-bold text-[#d16806]">Diskon 10% Otomatis</p>
                <p class="text-xs sm:text-sm text-[#737373] font-light leading-relaxed">
                    Masa inap lebih dari 3 hari mendapatkan potongan langsung 10% dari total biaya sewa kamar dasar saat proses reservasi berlangsung.
                </p>
            </div>

            <!-- 3. Inklusi & Pajak -->
            <div class="space-y-3">
                <span class="text-xs font-mono text-[#d16806] tracking-widest block">FASILITAS GRATIS</span>
                <h3 class="font-serif text-2xl text-[#1a1a1a] font-normal">Inklusi Tamu</h3>
                <p class="text-xs sm:text-sm text-[#737373] font-light leading-relaxed">
                    Akses internet nirkabel (Wi-Fi) berkecepatan tinggi, penggunaan kolam renang outdoor, fasilitas pusat kebugaran 24 jam, serta perlengkapan mandi mewah.
                </p>
            </div>

        </div>

        <!-- Integrated Call To Action -->
        <div class="pt-10 border-t border-[#e9e9e9] flex flex-col sm:flex-row sm:items-center justify-between gap-6">
            <div class="space-y-1">
                <p class="font-serif text-2xl text-[#1a1a1a] font-normal">
                    Ingin Memastikan Ketersediaan Kamar Anda?
                </p>
                <p class="text-xs sm:text-sm text-[#737373] font-light">
                    Lakukan pemesanan langsung untuk mendapatkan voucher terkonfirmasi secara instan.
                </p>
            </div>
            <a href="{{ route('booking.create') }}" 
               class="pressable inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-[9px] bg-[#d16806] hover:bg-[#b55804] text-white text-xs font-semibold tracking-wider uppercase transition-colors shadow-sm shrink-0">
                <span>Mulai Formulir Reservasi</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>

    </section>

</div>
@endsection
