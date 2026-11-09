@extends('layouts.app')

@section('content')
<div class="py-14 sm:py-20 lg:py-24 max-w-6xl mx-auto px-4 sm:px-8 lg:px-12 space-y-16 sm:space-y-24">

    <!-- Header Section -->
    <header class="max-w-3xl space-y-4">
        <span class="text-xs font-sans tracking-[0.25em] uppercase text-[#d16806] font-medium block">
            Transparansi Tarif Resmi • JW Marriott Jakarta
        </span>
        <h1 class="font-serif text-4xl sm:text-6xl font-normal text-[#1a1a1a] tracking-tight">
            Daftar Harga Kamar Hotel
        </h1>
        <p class="text-base sm:text-lg text-[#606060] font-light leading-relaxed pt-2">
            Panduan lengkap daftar harga resmi kamar hotel per malam, fasilitas inklusif, rincian biaya sarapan harian, serta simulasi diskon masa menginap panjang.
        </p>
    </header>

    <!-- Master Price List Table (Tabel Daftar Tarif Resmi) -->
    <section class="space-y-6">
        
        <div class="border-b border-[#1a1a1a] pb-3 flex flex-col sm:flex-row sm:items-baseline justify-between gap-2">
            <h2 class="font-serif text-2xl sm:text-3xl font-normal text-[#1a1a1a]">
                Tabel Tarif Resmi per Tipe Kamar
            </h2>
            <span class="text-xs text-[#737373] font-light">
                *Semua tarif sudah termasuk pajak 10% & biaya layanan hotel
            </span>
        </div>

        <!-- Table Container (Clean, Minimalist Document Flow) -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="border-b-2 border-[#1a1a1a] text-xs font-sans uppercase tracking-wider text-[#737373]">
                        <th class="py-4 pr-6">Tipe Kamar</th>
                        <th class="py-4 px-4">Spesifikasi</th>
                        <th class="py-4 px-4 text-right">Tarif Dasar / Malam</th>
                        <th class="py-4 px-4 text-right">Opsi Sarapan</th>
                        <th class="py-4 px-4 text-right text-[#d16806]">Tarif Long Stay (>3 Hari)</th>
                        <th class="py-4 pl-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#e9e9e9]">
                    @foreach($roomTypes as $room)
                        @php
                            $imageMap = [
                                'Standar' => 'standar.jpg',
                                'Deluxe' => 'deluxe.jpg',
                                'Family' => 'family.jpg',
                            ];
                            $imageName = $imageMap[$room->name] ?? 'standar.jpg';
                            $specsMap = [
                                'Standar' => ['Ukuran' => '32 m²', 'Ranjang' => 'Twin Bed', 'Kapasitas' => '2 Tamu'],
                                'Deluxe' => ['Ukuran' => '42 m²', 'Ranjang' => 'King Bed', 'Kapasitas' => '2 Tamu'],
                                'Family' => ['Ukuran' => '65 m²', 'Ranjang' => 'King + Twin Suite', 'Kapasitas' => '4 Tamu'],
                            ];
                            $specs = $specsMap[$room->name] ?? ['Ukuran' => '35 m²', 'Ranjang' => 'Queen Bed', 'Kapasitas' => '2 Tamu'];
                            $discountedPrice = (int) round($room->price * 0.90);
                        @endphp
                        <tr class="hover:bg-[#f4efe9]/40 transition-colors">
                            
                            <!-- 1. Tipe Kamar & Thumbnail -->
                            <td class="py-5 pr-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-16 h-12 rounded-[6px] overflow-hidden bg-[#f0ece7] shrink-0">
                                        <img src="{{ asset('assets/images/rooms/' . $imageName) }}" 
                                             alt="{{ $room->name }}" 
                                             class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <p class="font-serif text-lg font-normal text-[#1a1a1a]">
                                            Kamar {{ $room->name }}
                                        </p>
                                        <span class="text-xs text-[#737373] font-light">JW Marriott Jakarta</span>
                                    </div>
                                </div>
                            </td>

                            <!-- 2. Spesifikasi -->
                            <td class="py-5 px-4 text-xs text-[#606060]">
                                <p class="font-medium text-[#1a1a1a]">{{ $specs['Ranjang'] }}</p>
                                <p class="font-light">{{ $specs['Ukuran'] }} • {{ $specs['Kapasitas'] }}</p>
                            </td>

                            <!-- 3. Tarif Dasar / Malam -->
                            <td class="py-5 px-4 text-right font-mono font-medium text-base text-[#1a1a1a]">
                                {{ $room->formatted_price }}
                                <span class="text-[11px] font-sans font-light text-[#737373] block">/ malam</span>
                            </td>

                            <!-- 4. Sarapan -->
                            <td class="py-5 px-4 text-right text-xs">
                                <span class="font-mono font-medium text-[#1a1a1a]">+ Rp 80.000</span>
                                <span class="text-[11px] text-[#737373] font-light block">/ hari (opsional)</span>
                            </td>

                            <!-- 5. Tarif Diskon Long-Stay (> 3 Hari - Diskon 10%) -->
                            <td class="py-5 px-4 text-right text-xs">
                                <span class="font-mono font-bold text-base text-[#d16806]">
                                    Rp {{ number_format($discountedPrice, 0, ',', '.') }}
                                </span>
                                <span class="text-[11px] text-[#d16806] font-medium block">Hemat 10% / malam</span>
                            </td>

                            <!-- 6. Aksi -->
                            <td class="py-5 pl-6 text-right">
                                <a href="{{ route('booking.create', ['room_id' => $room->id]) }}" 
                                   class="pressable inline-flex items-center gap-1.5 px-4 py-2 rounded-[7px] bg-[#d16806] hover:bg-[#b55804] text-white text-xs font-semibold tracking-wider uppercase transition-colors shadow-sm">
                                    <span>Pesan</span>
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                    </svg>
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </section>

    <!-- Simulasi Perhitungan & Penghematan Biaya -->
    <section class="border-t border-[#e9e9e9] pt-12 sm:pt-16 space-y-8">
        
        <div class="max-w-2xl space-y-2">
            <span class="text-xs font-sans tracking-[0.2em] uppercase text-[#d16806] font-medium block">
                Simulasi Biaya Transparan
            </span>
            <h2 class="font-serif text-3xl sm:text-4xl font-normal text-[#1a1a1a]">
                Contoh Simulasi Perhitungan Menginap
            </h2>
            <p class="text-xs sm:text-sm text-[#737373] font-light">
                Perbandingan perkiraan biaya menginap berdasarkan durasi dan fasilitas sarapan buffet.
            </p>
        </div>

        <!-- 3 Comparison Columns (Standard, Deluxe, Family) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 pt-4">
            
            <!-- 1. Standar Room Simulation -->
            <div class="space-y-4 pb-6 border-b md:border-b-0 md:border-r border-[#e9e9e9] md:pr-8">
                <span class="text-xs font-mono text-[#d16806] tracking-widest block uppercase">SIMULASI 01</span>
                <h3 class="font-serif text-2xl text-[#1a1a1a] font-normal">Kamar Standar</h3>
                <p class="text-xs text-[#737373] font-light">Tarif dasar: Rp 500.000 / malam</p>
                
                <ul class="space-y-2.5 text-xs text-[#606060] font-light pt-2">
                    <li class="flex justify-between">
                        <span>1 Hari (Tanpa sarapan):</span>
                        <strong class="font-mono text-[#1a1a1a]">Rp 500.000</strong>
                    </li>
                    <li class="flex justify-between">
                        <span>3 Hari (Tanpa sarapan):</span>
                        <strong class="font-mono text-[#1a1a1a]">Rp 1.500.000</strong>
                    </li>
                    <li class="flex justify-between text-[#d16806]">
                        <span>4 Hari (Diskon 10%):</span>
                        <strong class="font-mono font-medium">Rp 1.800.000</strong>
                    </li>
                    <li class="flex justify-between pt-2 border-t border-[#f0ece7]">
                        <span>4 Hari + Sarapan (4 x 80k):</span>
                        <strong class="font-mono text-sm text-[#1a1a1a] font-bold">Rp 2.120.000</strong>
                    </li>
                </ul>
            </div>

            <!-- 2. Deluxe Room Simulation -->
            <div class="space-y-4 pb-6 border-b md:border-b-0 md:border-r border-[#e9e9e9] md:pr-8">
                <span class="text-xs font-mono text-[#d16806] tracking-widest block uppercase">SIMULASI 02</span>
                <h3 class="font-serif text-2xl text-[#1a1a1a] font-normal">Kamar Deluxe</h3>
                <p class="text-xs text-[#737373] font-light">Tarif dasar: Rp 800.000 / malam</p>
                
                <ul class="space-y-2.5 text-xs text-[#606060] font-light pt-2">
                    <li class="flex justify-between">
                        <span>1 Hari (Tanpa sarapan):</span>
                        <strong class="font-mono text-[#1a1a1a]">Rp 800.000</strong>
                    </li>
                    <li class="flex justify-between">
                        <span>3 Hari (Tanpa sarapan):</span>
                        <strong class="font-mono text-[#1a1a1a]">Rp 2.400.000</strong>
                    </li>
                    <li class="flex justify-between text-[#d16806]">
                        <span>4 Hari (Diskon 10%):</span>
                        <strong class="font-mono font-medium">Rp 2.880.000</strong>
                    </li>
                    <li class="flex justify-between pt-2 border-t border-[#f0ece7]">
                        <span>4 Hari + Sarapan (4 x 80k):</span>
                        <strong class="font-mono text-sm text-[#1a1a1a] font-bold">Rp 3.200.000</strong>
                    </li>
                </ul>
            </div>

            <!-- 3. Family Room Simulation -->
            <div class="space-y-4">
                <span class="text-xs font-mono text-[#d16806] tracking-widest block uppercase">SIMULASI 03</span>
                <h3 class="font-serif text-2xl text-[#1a1a1a] font-normal">Kamar Family</h3>
                <p class="text-xs text-[#737373] font-light">Tarif dasar: Rp 1.200.000 / malam</p>
                
                <ul class="space-y-2.5 text-xs text-[#606060] font-light pt-2">
                    <li class="flex justify-between">
                        <span>1 Hari (Tanpa sarapan):</span>
                        <strong class="font-mono text-[#1a1a1a]">Rp 1.200.000</strong>
                    </li>
                    <li class="flex justify-between">
                        <span>3 Hari (Tanpa sarapan):</span>
                        <strong class="font-mono text-[#1a1a1a]">Rp 3.600.000</strong>
                    </li>
                    <li class="flex justify-between text-[#d16806]">
                        <span>4 Hari (Diskon 10%):</span>
                        <strong class="font-mono font-medium">Rp 4.320.000</strong>
                    </li>
                    <li class="flex justify-between pt-2 border-t border-[#f0ece7]">
                        <span>4 Hari + Sarapan (4 x 80k):</span>
                        <strong class="font-mono text-sm text-[#1a1a1a] font-bold">Rp 4.640.000</strong>
                    </li>
                </ul>
            </div>

        </div>

    </section>

    <!-- Kebijakan Tarif & Layanan Menginap -->
    <section class="border-t border-[#e9e9e9] pt-12 sm:pt-16 space-y-8">
        
        <div class="max-w-2xl space-y-2">
            <span class="text-xs font-sans tracking-[0.2em] uppercase text-[#d16806] font-medium block">
                Ketentuan & Regulasi
            </span>
            <h2 class="font-serif text-3xl sm:text-4xl font-normal text-[#1a1a1a]">
                Kebijakan Resmi Menginap
            </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 text-xs text-[#606060] font-light leading-relaxed">
            <div class="space-y-2">
                <h4 class="font-serif text-lg text-[#1a1a1a] font-normal">Pajak & Layanan</h4>
                <p>Seluruh harga yang tertera sudah termasuk Pajak Pertambahan Nilai (PPN 10%) dan Service Charge resmi hotel.</p>
            </div>
            <div class="space-y-2">
                <h4 class="font-serif text-lg text-[#1a1a1a] font-normal">Waktu Check-In / Out</h4>
                <p>Waktu check-in mulai pukul 14.00 WIB dan check-out maksimal pukul 12.00 WIB. Permintaan early check-in tergantung ketersediaan kamar.</p>
            </div>
            <div class="space-y-2">
                <h4 class="font-serif text-lg text-[#1a1a1a] font-normal">Fasilitas Sarapan</h4>
                <p>Sarapan prasmanan buffet disajikan setiap hari di Sailendra Restaurant pukul 06.00 – 10.30 WIB dengan tarif Rp 80.000 / orang / hari.</p>
            </div>
            <div class="space-y-2">
                <h4 class="font-serif text-lg text-[#1a1a1a] font-normal">Diskon Masa Inap</h4>
                <p>Masa inap lebih dari 3 hari otomatis mendapatkan potongan diskon 10% dari total sewa kamar saat proses reservasi.</p>
            </div>
        </div>

        <!-- Integrated Call to Action -->
        <div class="pt-10 border-t border-[#e9e9e9] flex flex-col sm:flex-row sm:items-center justify-between gap-6">
            <div class="space-y-1">
                <p class="font-serif text-2xl text-[#1a1a1a] font-normal">
                    Sudah Menentukan Kamar Pilihan Anda?
                </p>
                <p class="text-xs sm:text-sm text-[#737373] font-light">
                    Isi formulir reservasi online sekarang untuk mendapatkan konfirmasi instan.
                </p>
            </div>
            <a href="{{ route('booking.create') }}" 
               class="pressable inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-[9px] bg-[#d16806] hover:bg-[#b55804] text-white text-xs font-semibold tracking-wider uppercase transition-colors shadow-sm shrink-0">
                <span>Pesan Kamar Sekarang</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
        </div>

    </section>

</div>
@endsection
