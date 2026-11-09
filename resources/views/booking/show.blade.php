@extends('layouts.app')

@section('content')
<div class="py-12 sm:py-16 space-y-8">

    <!-- Header Section (Hidden when printing) -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-14 print:hidden">
        <div class="max-w-2xl mx-auto text-center space-y-3">
            <span class="text-xs font-sans tracking-[0.2em] uppercase text-[#d16806] font-medium">
                Reservasi Terkonfirmasi
            </span>
            <h1 class="font-serif text-3xl sm:text-5xl font-normal text-[#1a1a1a] capitalize">
                Bukti Transaksi Pemesanan
            </h1>
            <p class="text-xs sm:text-sm text-[#606060] font-light">
                Data pemesanan telah tersimpan aman di database SQLite. Dokumen ini sah dan dapat langsung dicetak sebagai voucher reservasi resmi.
            </p>
        </div>
    </section>

    <!-- Voucher Invoice Card (Exact to BNSP Mockup on Page 3) -->
    <section class="max-w-2xl mx-auto px-4 sm:px-6">
        
        @if (session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-300 text-emerald-800 rounded-[12px] flex items-center gap-3 text-xs sm:text-sm font-medium print:hidden">
                <svg class="w-5 h-5 flex-shrink-0 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif
        
        <div id="invoice-card" class="bg-white rounded-[24px] border border-[#f4e2d8] shadow-lg overflow-hidden print:shadow-none print:border-none print:rounded-none">
            
            <!-- Card Header -->
            <div class="bg-[#f9f6f3] border-b border-[#e9e9e9] p-6 sm:p-8 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <svg class="w-8 h-7 text-[#d16806]" viewBox="0 0 44 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 30V4L22 22L40 4V30" stroke="#d16806" stroke-width="4.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="22" cy="7" r="3.5" fill="#d16806" />
                    </svg>
                    <div>
                        <span class="text-[10px] font-mono tracking-wider uppercase text-[#8c867e] block">VOUCHER RESMI</span>
                        <h2 class="font-serif italic font-bold text-2xl text-[#1a1a1a] uppercase leading-none">HOTEL MELLOW</h2>
                        <span class="text-[10px] text-[#737373] font-light">Grand Harmoni Sanctuary</span>
                    </div>
                </div>
                <div class="text-right">
                    <span class="text-[10px] font-mono text-[#8c867e] uppercase block">Kode Booking</span>
                    <span class="font-mono text-sm sm:text-base font-bold text-[#d16806]">{{ $booking->booking_code }}</span>
                </div>
            </div>

            <!-- Card Body (Exact BNSP Page 3 Details) -->
            <div class="p-6 sm:p-10 space-y-6">
                
                <div class="flex items-center justify-between pb-4 border-b border-[#e9e9e9] text-xs">
                    <div>
                        <span class="text-[#8c867e] block text-[10px] uppercase tracking-wider font-semibold">Status Transaksi</span>
                        <span class="text-emerald-700 font-medium">Tersimpan di Database SQLite</span>
                    </div>
                    <div class="text-right">
                        <span class="text-[#8c867e] block text-[10px] uppercase tracking-wider font-semibold">Tanggal Pemesanan</span>
                        <span class="font-mono text-[#1a1a1a] font-medium">{{ $booking->formatted_booking_date }}</span>
                    </div>
                </div>

                <!-- Detail List (Matching Exact Format: Nama Pemesan, Nomor Identitas, Jenis Kelamin, Tipe Kamar, Duras Penginapan, Discount, Total Bayar) -->
                <div class="p-6 rounded-[14px] bg-[#f9f6f3] border border-[#e9e9e9] font-mono text-xs sm:text-sm space-y-3.5 tabular-nums">
                    
                    <div class="flex flex-col sm:flex-row sm:items-center">
                        <span class="w-48 text-[#606060] font-normal">Nama Pemesan</span>
                        <span class="text-[#1a1a1a] font-bold">: {{ $booking->customer_name }}</span>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-center">
                        <span class="w-48 text-[#606060] font-normal">Nomor Identitas</span>
                        <span class="text-[#1a1a1a] font-bold">: {{ $booking->identity_number }}</span>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-center">
                        <span class="w-48 text-[#606060] font-normal">Jenis Kelamin</span>
                        <span class="text-[#1a1a1a] font-bold">: {{ $booking->gender }}</span>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-center">
                        <span class="w-48 text-[#606060] font-normal">Tipe Kamar</span>
                        <span class="text-[#1a1a1a] font-bold">: {{ $booking->roomType->name }}</span>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-center">
                        <span class="w-48 text-[#606060] font-normal">Duras Penginapan</span>
                        <span class="text-[#1a1a1a] font-bold">: {{ $booking->stay_duration }} Hari</span>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-center">
                        <span class="w-48 text-[#606060] font-normal">Discount</span>
                        <span class="text-[#1a1a1a] font-bold">: {{ $booking->discount_percentage }}%</span>
                    </div>

                    <div class="border-t border-dashed border-[#d1c8be] pt-3.5 flex flex-col sm:flex-row sm:items-center">
                        <span class="w-48 text-[#1a1a1a] font-black text-sm uppercase">Total Bayar</span>
                        <span class="text-[#d16806] font-black text-xl">: {{ $booking->formatted_total_payment }}</span>
                    </div>

                </div>

                <!-- Calculation Notes -->
                <div class="p-4 rounded-[12px] bg-white border border-[#e9e9e9] text-xs text-[#606060] space-y-1 font-light">
                    <p class="font-medium text-[#1a1a1a]">Rincian Perhitungan Biaya:</p>
                    <p>• Tarif Dasar: {{ $booking->formatted_room_price }} / malam</p>
                    <p>• Fasilitas Sarapan (Buffet): <strong>{{ $booking->include_breakfast ? 'Ya (+ Rp 80.000)' : 'Tidak' }}</strong></p>
                    @if($booking->discount_amount > 0)
                        <p class="text-emerald-700">• Potongan Diskon Durasi (> 3 hari): - {{ $booking->formatted_discount_amount }}</p>
                    @endif
                </div>

                <!-- Print Signatures (Shown only when printing) -->
                <div class="hidden print:grid grid-cols-2 pt-14 text-center text-xs text-[#353535]">
                    <div>
                        <p>Pemesan,</p>
                        <br><br><br>
                        <p class="font-bold underline">({{ $booking->customer_name }})</p>
                    </div>
                    <div>
                        <p>Front Office Hotel Mellow,</p>
                        <br><br><br>
                        <p class="font-bold underline">(Petugas Reservasi)</p>
                    </div>
                </div>

                <!-- Action Buttons: Print, New Booking, All Bookings (Hidden when printing) -->
                <div class="pt-6 border-t border-[#e9e9e9] flex flex-wrap items-center justify-between gap-4 print:hidden">
                    <button type="button" 
                            onclick="window.print()"
                            class="pressable px-6 py-3 rounded-[9px] bg-[#1a1a1a] hover:bg-[#d16806] text-white text-xs font-semibold tracking-wider uppercase shadow-sm transition-colors flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                        </svg>
                        <span>Cetak Bukti Pemesanan</span>
                    </button>

                    <div class="flex items-center gap-2.5">
                        <a href="{{ route('booking.create') }}" 
                           class="pressable px-5 py-3 rounded-[9px] bg-[#d16806] hover:bg-[#b55804] text-white text-xs font-semibold tracking-wider uppercase transition-colors shadow-sm">
                            + Pesan Kamar Baru
                        </a>
                        <a href="{{ route('booking.index') }}" 
                           class="pressable px-4 py-3 rounded-[9px] bg-[#f9f6f3] hover:bg-[#eee8e0] text-[#606060] border border-[#e9e9e9] text-xs font-medium tracking-wider uppercase transition-colors">
                            Semua Pesanan
                        </a>
                    </div>
                </div>

            </div>

        </div>

    </section>

</div>
@endsection
