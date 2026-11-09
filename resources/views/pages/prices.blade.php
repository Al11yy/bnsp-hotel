@extends('layouts.app')

@section('content')
<div class="py-12 sm:py-16 space-y-16">

    <!-- Header Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-14">
        <div class="max-w-3xl space-y-4">
            <span class="text-xs font-sans tracking-[0.2em] uppercase text-[#d16806] font-medium">
                Transparansi Tarif & Layanan
            </span>
            <h1 class="font-serif text-4xl sm:text-6xl font-normal text-[#1a1a1a] capitalize">
                Daftar Harga Sewa Kamar Hotel
            </h1>
            <p class="text-sm sm:text-base text-[#606060] font-light leading-relaxed">
                Struktur tarif resmi sewa kamar per malam untuk seluruh tipe akomodasi di Hotel Mellow — Grand Harmoni, lengkap dengan perhitungan diskon durasi dan sarapan.
            </p>
        </div>
    </section>

    <!-- Price Table (Mellow Warm Card Style) -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-14">
        <div class="bg-white rounded-[24px] sm:rounded-[32px] p-6 sm:p-10 border border-[#f4e2d8] shadow-sm space-y-8">
            
            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs sm:text-sm">
                    <thead>
                        <tr class="border-b border-[#e9e9e9] text-[#1a1a1a] uppercase text-[11px] tracking-wider font-semibold">
                            <th class="py-4 px-3 w-12 text-center">No</th>
                            <th class="py-4 px-3 w-36">Visual</th>
                            <th class="py-4 px-3">Tipe Kamar</th>
                            <th class="py-4 px-3">Kapasitas</th>
                            <th class="py-4 px-3">Fasilitas Unggulan</th>
                            <th class="py-4 px-3 text-right">Tarif / Malam</th>
                            <th class="py-4 px-3 text-center w-36">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#f0ece7]">
                        @foreach($roomTypes as $index => $room)
                            <tr class="hover:bg-[#f9f6f3] transition-colors">
                                <td class="py-5 px-3 text-center font-mono text-[#8c867e] tabular-nums">0{{ $index + 1 }}</td>
                                
                                <td class="py-5 px-3">
                                    <div class="w-24 h-16 rounded-[10px] overflow-hidden bg-[#f0ece7] border border-[#e9e9e9]">
                                        <img src="{{ asset($room->image_url) }}" alt="{{ $room->name }}" class="w-full h-full object-cover">
                                    </div>
                                </td>

                                <td class="py-5 px-3">
                                    <strong class="font-serif text-lg text-[#1a1a1a] block font-normal">Kamar {{ $room->name }}</strong>
                                    <span class="text-xs text-[#737373] font-light">{{ $room->bed_type }}</span>
                                </td>

                                <td class="py-5 px-3 whitespace-nowrap text-[#606060] font-light">
                                    {{ $room->capacity }}
                                </td>

                                <td class="py-5 px-3">
                                    <ul class="text-xs text-[#606060] space-y-1 font-light">
                                        @foreach(array_slice($room->facilities ?? [], 0, 3) as $f)
                                            <li>• {{ $f }}</li>
                                        @endforeach
                                    </ul>
                                </td>

                                <td class="py-5 px-3 text-right whitespace-nowrap">
                                    <span class="font-sans font-semibold text-lg sm:text-xl text-[#d16806] tabular-nums block">
                                        {{ $room->formatted_price }}
                                    </span>
                                    <span class="text-[10px] text-[#8c867e] font-light">per malam / kamar</span>
                                </td>

                                <td class="py-5 px-3 text-center">
                                    <a href="{{ route('booking.create', ['room_type_id' => $room->id]) }}" 
                                       class="pressable inline-block px-4 py-2 rounded-[9px] text-xs font-semibold tracking-wider uppercase bg-[#d16806] hover:bg-[#b55804] text-white transition-colors shadow-sm">
                                        Pesan Kamar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Two Informational Cards: Diskon & Sarapan (BNSP Provisions) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-6 border-t border-[#e9e9e9]">
                
                <div class="p-6 rounded-[16px] bg-[#f9f6f3] border border-[#e9e9e9] space-y-3">
                    <span class="text-[11px] font-medium tracking-wider uppercase text-[#d16806] block">
                        Ketentuan Diskon Menginap
                    </span>
                    <h3 class="font-serif text-2xl font-normal text-[#1a1a1a]">
                        Potongan 10% untuk Durasi > 3 Hari
                    </h3>
                    <p class="text-xs text-[#606060] leading-relaxed font-light">
                        Sesuai pedoman sertifikasi BNSP, pemesanan dengan durasi lebih dari 3 hari (4 hari ke atas) berhak atas diskon 10% dari total tarif sewa kamar sebelum sarapan.
                    </p>
                    <div class="p-3.5 rounded-[9px] bg-white border border-[#e9e9e9] text-xs font-mono text-[#353535] tabular-nums">
                        Simulasi: 4 malam Kamar Standar (4 × Rp 500.000 = Rp 2.000.000). Diskon 10% (-Rp 200.000) = Subtotal Rp 1.800.000.
                    </div>
                </div>

                <div class="p-6 rounded-[16px] bg-[#f9f6f3] border border-[#e9e9e9] space-y-3">
                    <span class="text-[11px] font-medium tracking-wider uppercase text-[#d16806] block">
                        Layanan Sarapan Pagi
                    </span>
                    <h3 class="font-serif text-2xl font-normal text-[#1a1a1a]">
                        Tambahan Paket Sarapan (+Rp 80.000)
                    </h3>
                    <p class="text-xs text-[#606060] leading-relaxed font-light">
                        Pilihan buffet sarapan lezat nusantara & continental tersedia dengan biaya tambahan Rp 80.000 per hari yang dikalikan dengan seluruh durasi menginap Anda.
                    </p>
                    <div class="p-3.5 rounded-[9px] bg-white border border-[#e9e9e9] text-xs font-mono text-[#353535] tabular-nums">
                        Simulasi Sarapan: 3 hari × Rp 80.000/hari = Total tambahan sarapan Rp 240.000.
                    </div>
                </div>

            </div>

        </div>
    </section>

</div>
@endsection
