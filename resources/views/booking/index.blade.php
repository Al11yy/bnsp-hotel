@extends('layouts.app')

@section('content')
<div class="py-12 sm:py-16 max-w-7xl mx-auto px-4 sm:px-8 lg:px-14 space-y-8">

    <!-- Breadcrumb / Back Navigation to Daftar Harga -->
    <div>
        <a href="{{ route('prices') }}" class="inline-flex items-center gap-2 text-xs text-[#737373] hover:text-[#d16806] transition-colors">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            <span>Kembali ke Daftar Harga</span>
        </a>
    </div>

    <!-- Header Section (Clean Luxury Editorial Style) -->
    <header class="space-y-3 pb-8 border-b border-[#e9e9e9]">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <span class="text-xs font-sans tracking-[0.25em] uppercase text-[#d16806] font-medium block">
                Catatan Transaksi Resmi • JW Marriott Hotel Jakarta
            </span>
            <span class="text-xs font-mono text-[#8c867e] tracking-wider uppercase">
                Total: <strong class="text-[#1a1a1a] font-semibold">{{ $bookings->count() }} Reservasi</strong>
            </span>
        </div>
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 pt-1">
            <div class="space-y-2 max-w-3xl">
                <h1 class="font-serif text-4xl sm:text-6xl font-normal text-[#1a1a1a] tracking-tight">
                    Riwayat Pemesanan
                </h1>
                <p class="text-base sm:text-lg text-[#606060] font-light leading-relaxed">
                    Daftar seluruh transaksi reservasi kamar hotel yang telah terkonfirmasi di sistem kami. Klik tombol 'Lihat Detail' untuk memeriksa bukti konfirmasi dan voucher menginap.
                </p>
            </div>
            <a href="{{ route('booking.create') }}" 
               class="pressable inline-flex items-center gap-2 px-6 py-3 rounded-[8px] bg-[#d16806] hover:bg-[#b55804] text-white text-xs font-medium tracking-wider uppercase shadow-sm transition-colors shrink-0">
                <span>+ Pesan Kamar Baru</span>
            </a>
        </div>
    </header>

    <!-- Main List Flow (Unboxed, Flat Document Layout) -->
    <main>
        @if($bookings->isEmpty())
            <!-- Empty State -->
            <div class="py-20 text-center space-y-4 border-y border-[#e9e9e9]">
                <div class="w-14 h-14 mx-auto rounded-full bg-[#f0ece7] flex items-center justify-center text-[#8c867e]">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.6" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <div class="space-y-1">
                    <h2 class="font-serif text-2xl sm:text-3xl font-normal text-[#1a1a1a]">
                        Belum Ada Riwayat Pemesanan
                    </h2>
                    <p class="text-xs sm:text-sm text-[#737373] font-light max-w-md mx-auto leading-relaxed">
                        Saat ini belum ada data pemesanan kamar yang tersimpan. Silakan pilih kamar favorit Anda dan buat reservasi pertama Anda.
                    </p>
                </div>
                <div class="pt-4">
                    <a href="{{ route('booking.create') }}" 
                       class="pressable inline-flex items-center gap-2 px-7 py-3 rounded-[8px] bg-[#d16806] hover:bg-[#b55804] text-white text-xs font-medium tracking-wider uppercase shadow-sm transition-colors">
                        <span>Buat Reservasi Sekarang</span>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        @else
            <!-- Flat Responsive Reservation List -->
            <div class="divide-y divide-[#e9e9e9] border-y border-[#e9e9e9]">
                @foreach($bookings as $booking)
                    <div class="py-6 sm:py-7 flex flex-col lg:flex-row lg:items-center justify-between gap-6 hover:bg-white/50 transition-colors px-2 rounded-[8px]">
                        
                        <!-- Left Block: Kode & Info Tamu -->
                        <div class="space-y-2.5 max-w-md">
                            <div class="flex items-center gap-3">
                                <span class="font-mono text-xs font-medium text-[#1a1a1a] tracking-wider">
                                    {{ $booking->booking_code }}
                                </span>
                                <span class="px-2 py-0.5 rounded-[4px] bg-emerald-50 text-emerald-700 text-[10px] font-mono uppercase tracking-wider font-medium border border-emerald-200/60">
                                    Terkonfirmasi
                                </span>
                            </div>
                            
                            <div>
                                <h3 class="font-serif text-xl sm:text-2xl font-normal text-[#1a1a1a]">
                                    {{ $booking->customer_name }}
                                </h3>
                                <p class="text-xs text-[#737373] font-light mt-0.5">
                                    NIK: <span class="font-mono text-[#353535]">{{ $booking->identity_number }}</span> • {{ $booking->gender }}
                                </p>
                            </div>
                        </div>

                        <!-- Middle Block: Detail Kamar & Jadwal -->
                        <div class="space-y-1.5 text-xs text-[#606060] font-light min-w-[200px]">
                            <div class="flex items-center gap-2">
                                <span class="font-medium text-[#1a1a1a]">Kamar {{ $booking->roomType->name }}</span>
                                <span class="text-[#c8c2bc]">•</span>
                                <span class="font-mono">{{ $booking->formatted_room_price }} / malam</span>
                            </div>
                            <div class="flex items-center gap-2 text-[#737373]">
                                <span>Check-in: <strong class="font-mono text-[#1a1a1a] font-medium">{{ $booking->formatted_booking_date }}</strong></span>
                                <span class="text-[#c8c2bc]">•</span>
                                <span>{{ $booking->stay_duration }} Hari</span>
                            </div>
                            <div>
                                @if($booking->include_breakfast)
                                    <span class="inline-flex items-center gap-1 text-[11px] text-emerald-800 font-medium">
                                        ✓ Termasuk Sarapan Prasmanan
                                    </span>
                                @else
                                    <span class="text-[11px] text-[#8c867e]">
                                        Tanpa Layanan Sarapan
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Right Block: Finansial & Tombol Aksi Detail -->
                        <div class="flex items-center justify-between lg:justify-end gap-6 pt-3 lg:pt-0 border-t border-[#f0ece7] lg:border-t-0">
                            <div class="text-left lg:text-right">
                                <span class="text-[10px] uppercase tracking-wider text-[#8c867e] block">Total Pembayaran</span>
                                <span class="font-mono text-xl sm:text-2xl font-medium text-[#d16806] tabular-nums">
                                    {{ $booking->formatted_total_payment }}
                                </span>
                            </div>

                            <a href="{{ route('booking.show', $booking) }}" 
                               class="pressable inline-flex items-center gap-2 px-5 py-2.5 rounded-[8px] bg-white border border-[#dcd8d3] hover:border-[#d16806] hover:bg-[#f9f6f3] text-[#1a1a1a] text-xs font-medium uppercase tracking-wider transition-all shadow-sm shrink-0">
                                <span>Lihat Detail</span>
                                <svg class="w-3.5 h-3.5 text-[#d16806]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        </div>

                    </div>
                @endforeach
            </div>
        @endif
    </main>

</div>
@endsection
