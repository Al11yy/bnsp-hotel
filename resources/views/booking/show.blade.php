@extends('layouts.app')

@section('content')
<div class="py-14 sm:py-20 max-w-4xl mx-auto px-4 sm:px-8 lg:px-12">

    <!-- Flash Notification -->
    @if (session('success'))
        <div class="mb-10 p-4 rounded-[10px] bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-center gap-3 text-xs sm:text-sm font-medium print:hidden">
            <svg class="w-5 h-5 flex-shrink-0 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <!-- Page Header & Identification -->
    <header class="space-y-4 mb-14 sm:mb-16">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <span class="text-xs font-mono tracking-widest uppercase text-[#d16806]">
                STATUS: TERKONFIRMASI & TERVERIFIKASI
            </span>
            <span class="text-xs font-mono text-[#737373] tracking-wider uppercase">
                KODE: <strong class="text-[#1a1a1a] font-semibold">{{ $booking->booking_code }}</strong>
            </span>
        </div>
        <h1 class="font-serif text-4xl sm:text-5xl font-normal text-[#1a1a1a] tracking-tight">
            Konfirmasi Reservasi Kamar
        </h1>
        <p class="text-sm sm:text-base text-[#606060] font-light leading-relaxed">
            Terima kasih. Reservasi Anda di JW Marriott Hotel Jakarta — Grand Harmoni telah resmi tercatat. Dokumen konfirmasi ini sah sebagai bukti reservasi resmi.
        </p>
    </header>

    <!-- Main Confirmation Flow (Unboxed, Flat Document Flow) -->
    <main class="space-y-12">
        
        <!-- Section 1: Detail Tamu & Masa Menginap -->
        <section class="space-y-6">
            <div class="border-b border-[#1a1a1a] pb-3 flex items-baseline justify-between">
                <h2 class="font-serif text-2xl text-[#1a1a1a] font-normal">
                    Data Tamu & Reservasi
                </h2>
                <span class="text-xs font-mono text-[#737373]">
                    Tanggal Pesan: {{ $booking->formatted_booking_date }}
                </span>
            </div>

            <dl class="divide-y divide-[#e9e9e9] text-sm">
                
                <div class="py-3.5 grid grid-cols-1 sm:grid-cols-3 gap-2">
                    <dt class="text-xs uppercase tracking-wider text-[#737373]">Nama Pemesan</dt>
                    <dd class="sm:col-span-2 text-[#1a1a1a] font-medium">{{ $booking->customer_name }}</dd>
                </div>

                <div class="py-3.5 grid grid-cols-1 sm:grid-cols-3 gap-2">
                    <dt class="text-xs uppercase tracking-wider text-[#737373]">Nomor Identitas</dt>
                    <dd class="sm:col-span-2 font-mono text-[#1a1a1a]">{{ $booking->identity_number }}</dd>
                </div>

                <div class="py-3.5 grid grid-cols-1 sm:grid-cols-3 gap-2">
                    <dt class="text-xs uppercase tracking-wider text-[#737373]">Jenis Kelamin</dt>
                    <dd class="sm:col-span-2 text-[#1a1a1a]">{{ $booking->gender }}</dd>
                </div>

                <div class="py-3.5 grid grid-cols-1 sm:grid-cols-3 gap-2">
                    <dt class="text-xs uppercase tracking-wider text-[#737373]">Tipe Kamar</dt>
                    <dd class="sm:col-span-2 text-[#1a1a1a] font-medium">
                        {{ $booking->roomType->name }}
                        <span class="text-xs text-[#737373] font-light font-sans ml-2">({{ $booking->formatted_room_price }} / malam)</span>
                    </dd>
                </div>

                <div class="py-3.5 grid grid-cols-1 sm:grid-cols-3 gap-2">
                    <dt class="text-xs uppercase tracking-wider text-[#737373]">Durasi Penginapan</dt>
                    <dd class="sm:col-span-2 text-[#1a1a1a] font-medium">{{ $booking->stay_duration }} Hari</dd>
                </div>

                <div class="py-3.5 grid grid-cols-1 sm:grid-cols-3 gap-2">
                    <dt class="text-xs uppercase tracking-wider text-[#737373]">Fasilitas Sarapan</dt>
                    <dd class="sm:col-span-2 text-[#1a1a1a]">
                        @if($booking->include_breakfast)
                            <span class="text-[#1a1a1a] font-medium">Termasuk Buffet Breakfast</span>
                            <span class="text-xs text-[#737373] font-light block mt-0.5 font-mono">
                                (Rp 80.000 x {{ $booking->stay_duration }} hari = {{ $booking->formatted_breakfast_fee }})
                            </span>
                        @else
                            <span class="text-[#737373]">Tidak Termasuk</span>
                        @endif
                    </dd>
                </div>

            </dl>
        </section>

        <!-- Section 2: Rincian Finansial & Total Bayar -->
        <section class="space-y-6 pt-6">
            <div class="border-b border-[#1a1a1a] pb-3">
                <h2 class="font-serif text-2xl text-[#1a1a1a] font-normal">
                    Rincian Pembayaran
                </h2>
            </div>

            <dl class="divide-y divide-[#e9e9e9] text-sm">
                
                <div class="py-3.5 flex justify-between">
                    <dt class="text-[#606060] font-light">Sewa Kamar ({{ $booking->stay_duration }} Hari)</dt>
                    <dd class="font-mono text-[#1a1a1a]">
                        Rp {{ number_format($booking->room_price * $booking->stay_duration, 0, ',', '.') }}
                    </dd>
                </div>

                @if($booking->discount_amount > 0)
                    <div class="py-3.5 flex justify-between text-[#d16806]">
                        <dt class="font-light">Potongan Diskon Long Stay ({{ $booking->discount_percentage }}%)</dt>
                        <dd class="font-mono font-medium">- {{ $booking->formatted_discount_amount }}</dd>
                    </div>
                @endif

                @if($booking->include_breakfast)
                    <div class="py-3.5 flex justify-between">
                        <dt class="text-[#606060] font-light">Sarapan Harian ({{ $booking->stay_duration }} Hari)</dt>
                        <dd class="font-mono text-[#1a1a1a]">+ {{ $booking->formatted_breakfast_fee }}</dd>
                    </div>
                @endif

                <div class="py-5 border-t-2 border-[#1a1a1a] flex flex-col sm:flex-row sm:items-baseline justify-between gap-2">
                    <div>
                        <dt class="font-serif text-2xl text-[#1a1a1a] font-normal">Total Bayar</dt>
                        <span class="text-xs text-[#737373] font-light">Termasuk pajak 10% & biaya layanan hotel</span>
                    </div>
                    <dd class="font-mono text-3xl sm:text-4xl font-bold text-[#d16806] tabular-nums">
                        {{ $booking->formatted_total_payment }}
                    </dd>
                </div>

            </dl>
        </section>

        <!-- Section 3: Petunjuk Kedatangan & Check-In (Minimalist) -->
        <section class="border-t border-[#e9e9e9] pt-8 space-y-3 text-xs text-[#737373] font-light leading-relaxed">
            <h3 class="font-serif text-lg text-[#1a1a1a] font-normal">Petunjuk Kedatangan</h3>
            <p>• Waktu Check-in resmi dimulai pukul <strong>14.00 WIB</strong>, dan waktu Check-out maksimal pukul <strong>12.00 WIB</strong>.</p>
            <p>• Tunjukkan konfirmasi pemesanan ini beserta kartu identitas fisik asli (KTP / Paspor) yang didaftarkan ke meja resepsionis Concierge.</p>
            <p>• Layanan Front Desk beroperasi penuh selama 24 jam untuk melayani kedatangan Anda di Jl. Boulevard Sudirman No. 88, Kav. 12, Jakarta.</p>
        </section>

        <!-- Signature for Print Only -->
        <div class="hidden print:grid grid-cols-2 pt-16 text-center text-xs text-[#353535]">
            <div class="space-y-16">
                <p>Pemesan,</p>
                <p class="font-semibold underline">({{ $booking->customer_name }})</p>
            </div>
            <div class="space-y-16">
                <p>Front Desk & Concierge,</p>
                <p class="font-semibold underline">(JW Marriott Hotel Jakarta)</p>
            </div>
        </div>

        <!-- Action Buttons (Screen Only) -->
        <div class="pt-8 border-t border-[#e9e9e9] flex flex-wrap items-center justify-between gap-4 print:hidden">
            <button type="button" 
                    onclick="window.print()"
                    class="pressable inline-flex items-center gap-2 px-6 py-3 rounded-[9px] bg-[#1a1a1a] hover:bg-[#d16806] text-white text-xs font-semibold tracking-wider uppercase transition-colors shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                </svg>
                <span>Cetak Bukti Konfirmasi</span>
            </button>

            <div class="flex items-center gap-3">
                <a href="{{ route('booking.index') }}" 
                   class="pressable inline-flex items-center gap-2 px-5 py-3 rounded-[9px] bg-white hover:bg-[#f9f6f3] text-[#353535] border border-[#e2ded9] text-xs font-medium tracking-wider uppercase transition-colors">
                    <span>← Riwayat Pemesanan</span>
                </a>
                <a href="{{ route('booking.create') }}" 
                   class="pressable inline-flex items-center gap-2 px-6 py-3 rounded-[9px] bg-[#d16806] hover:bg-[#b55804] text-white text-xs font-semibold tracking-wider uppercase transition-colors shadow-sm">
                    <span>Pesan Kamar Baru</span>
                </a>
            </div>
        </div>

    </main>

</div>
@endsection
