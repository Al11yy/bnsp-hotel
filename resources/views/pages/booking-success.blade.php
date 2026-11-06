@extends('layouts.app')

@section('content')
<!-- BANNER BUKTI PEMESANAN -->
<section class="pt-36 pb-16 px-6 sm:px-8 lg:px-12 bg-[#0D0C0B] text-white border-b border-white/10 print:hidden">
    <div class="max-w-4xl mx-auto text-center space-y-3">
        <span class="text-[10px] font-bold tracking-[0.25em] uppercase text-[#C46849] block">
            RESERVASI TERKONFIRMASI
        </span>
        <h1 class="font-serif text-3xl sm:text-5xl font-normal text-white">
            Bukti Transaksi Pemesanan.
        </h1>
        <p class="text-xs sm:text-sm text-[#8C867E] max-w-md mx-auto font-light">
            Data pemesanan telah tersimpan dengan aman ke basis data SQLite. Dokumen ini dapat langsung dicetak sebagai tanda bukti sah reservasi.
        </p>
    </div>
</section>

<!-- SECTION TAMPILAN SESUAI FORMAT LEMBAR SOAL BNSP (HALAMAN 3 BUTIR B) -->
<section class="py-20 bg-[#F7F5F0] text-[#141312] min-h-[calc(100vh-25rem)]">
    <div class="max-w-2xl mx-auto px-6 sm:px-8">
        
        <!-- KARTU VOUCHER INVOICE EDITORIAL -->
        <div id="invoice-card" class="bg-white rounded-3xl border border-stone-300 shadow-2xl overflow-hidden print:shadow-none print:border-none print:rounded-none">
            
            <!-- Header Kartu -->
            <div class="bg-[#141312] text-white p-8 sm:p-10 flex items-center justify-between border-b border-white/10">
                <div>
                    <span class="text-[10px] font-mono tracking-widest uppercase text-[#8C867E] block">TANDA BUKTI RESERVASI</span>
                    <h2 class="font-serif text-2xl sm:text-3xl font-normal text-white mt-1">HOTEL GRAND HARMONI</h2>
                    <span class="text-xs text-[#C7BFB4] font-light">Boutique Sanctuary & Resort</span>
                </div>
                <div class="text-right">
                    <span class="text-[10px] font-mono text-[#8C867E] uppercase block">KODE RESERVASI</span>
                    <span class="font-mono text-sm sm:text-base font-bold text-[#E8DFD0]">{{ $booking->booking_code }}</span>
                </div>
            </div>

            <!-- BADAN TAMPILAN SESUAI PERSIS DENGAN FORMAT SOAL BNSP -->
            <div class="p-8 sm:p-12 space-y-8">
                
                <div class="flex items-center justify-between pb-6 border-b border-stone-200 text-xs">
                    <div>
                        <span class="text-stone-400 block text-[10px] uppercase tracking-wider font-semibold">Status Transaksi</span>
                        <span class="text-emerald-700 font-medium">✓ Tersimpan di Database SQLite</span>
                    </div>
                    <div class="text-right">
                        <span class="text-stone-400 block text-[10px] uppercase tracking-wider font-semibold">Tanggal Pemesanan</span>
                        <span class="font-mono text-stone-800 font-medium">{{ $booking->formatted_booking_date }}</span>
                    </div>
                </div>

                <!-- DAFTAR DETAIL FORMAT PERSIS BUTIR B HALAMAN 3 -->
                <div class="p-8 rounded-2xl bg-stone-50 border border-stone-300 font-mono text-xs sm:text-sm space-y-4 tabular-nums">
                    
                    <div class="flex flex-col sm:flex-row sm:items-center">
                        <span class="w-48 text-stone-500 font-normal">Nama Pemesan</span>
                        <span class="text-stone-900 font-bold">: {{ $booking->customer_name }}</span>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-center">
                        <span class="w-48 text-stone-500 font-normal">Nomor Identitas</span>
                        <span class="text-stone-900 font-bold">: {{ $booking->identity_number }}</span>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-center">
                        <span class="w-48 text-stone-500 font-normal">Jenis Kelamin</span>
                        <span class="text-stone-900 font-bold">: {{ $booking->gender }}</span>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-center">
                        <span class="w-48 text-stone-500 font-normal">Tipe Kamar</span>
                        <span class="text-stone-900 font-bold">: {{ $booking->roomType->name }}</span>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-center">
                        <span class="w-48 text-stone-500 font-normal">Duras Penginapan</span>
                        <span class="text-stone-900 font-bold">: {{ $booking->stay_duration }} Hari</span>
                    </div>

                    <div class="flex flex-col sm:flex-row sm:items-center">
                        <span class="w-48 text-stone-500 font-normal">Discount</span>
                        <span class="text-stone-900 font-bold">: {{ $booking->discount_percentage }}%</span>
                    </div>

                    <div class="border-t border-dashed border-stone-300 pt-4 flex flex-col sm:flex-row sm:items-center">
                        <span class="w-48 text-stone-900 font-black text-sm uppercase">Total Bayar</span>
                        <span class="text-[#B85D3E] font-black text-xl">: {{ $booking->formatted_total_payment }}</span>
                    </div>

                </div>

                <!-- Catatan Fasilitas Tambahan -->
                <div class="p-5 rounded-2xl bg-stone-100 border border-stone-200 text-xs text-stone-600 space-y-1.5 font-light">
                    <p class="font-medium text-stone-900">Rincian Perhitungan:</p>
                    <p>• Tarif Dasar: {{ $booking->formatted_room_price }} / malam</p>
                    <p>• Termasuk Breakfast: <strong>{{ $booking->include_breakfast ? 'Ya (+ Rp 80.000)' : 'Tidak' }}</strong></p>
                    @if($booking->discount_amount > 0)
                        <p class="text-emerald-700">• Potongan Diskon Masa Inap (> 3 hari): - {{ $booking->formatted_discount_amount }}</p>
                    @endif
                </div>

                <!-- Tanda Tangan Cetak (Hanya tampil saat dicetak) -->
                <div class="hidden print:grid grid-cols-2 pt-16 text-center text-xs text-stone-700">
                    <div>
                        <p>Pemesan,</p>
                        <br><br><br>
                        <p class="font-bold underline">({{ $booking->customer_name }})</p>
                    </div>
                    <div>
                        <p>Front Office Grand Harmoni,</p>
                        <br><br><br>
                        <p class="font-bold underline">(Petugas Reservasi)</p>
                    </div>
                </div>

                <!-- TOMBOL AKSI CETAK & NAVIGASI -->
                <div class="pt-6 border-t border-stone-200 flex flex-wrap items-center justify-between gap-4 print:hidden">
                    <button type="button" 
                            onclick="window.print()"
                            class="pressable px-8 py-3.5 rounded-full text-xs font-semibold tracking-wider uppercase bg-[#141312] text-white hover:bg-[#2E2A26] shadow-md transition-all">
                        Cetak Bukti Pemesanan
                    </button>

                    <div class="flex items-center gap-3">
                        <a href="{{ route('booking.create') }}" 
                           class="pressable px-6 py-3.5 rounded-full text-xs font-semibold tracking-wider uppercase bg-[#B85D3E] text-white hover:bg-[#a34f33] transition-all">
                            + Pesan Kamar Baru
                        </a>
                        <a href="{{ route('booking.index') }}" 
                           class="pressable px-5 py-3.5 rounded-full text-xs font-semibold tracking-wider uppercase bg-stone-200 hover:bg-stone-300 text-stone-700 transition-colors">
                            Semua Pesanan
                        </a>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>
@endsection
