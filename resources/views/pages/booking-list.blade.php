@extends('layouts.app')

@section('content')
<!-- BANNER RIWAYAT PESANAN -->
<section class="pt-36 pb-20 px-6 sm:px-8 lg:px-12 bg-[#0D0C0B] text-white border-b border-white/10">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row md:items-end justify-between gap-6">
        <div class="space-y-4">
            <span class="text-[11px] font-semibold tracking-[0.25em] uppercase text-[#8C867E] block">
                — REKAPITULASI DATA
            </span>
            <h1 class="font-serif text-4xl sm:text-6xl font-normal text-white">
                Daftar Riwayat Pemesanan.
            </h1>
            <p class="text-xs sm:text-sm text-[#8C867E] max-w-lg leading-relaxed font-light">
                Rekapitulasi seluruh transaksi reservasi yang tersimpan di basis data SQLite (Tabel <code>bookings</code>).
            </p>
        </div>

        <div>
            <a href="{{ route('booking.create') }}" 
               class="pressable inline-block px-7 py-3.5 rounded-full text-xs font-semibold tracking-wider uppercase bg-[#C46849] text-white hover:bg-[#d07354] shadow-md transition-all">
                + Tambah Pemesanan Baru
            </a>
        </div>
    </div>
</section>

<!-- SECTION TABEL LEDGER DATABASE BOOKINGS -->
<section class="py-24 bg-[#F7F5F0] text-[#141312] min-h-[calc(100vh-25rem)]">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 space-y-10">
        
        <div class="flex items-center justify-between pb-4 border-b border-stone-300 text-xs">
            <span class="text-stone-500 font-light">
                Total <strong>{{ $bookings->total() }}</strong> Data Transaksi Tercatat di Database SQLite
            </span>
            <span class="font-mono text-stone-600 text-[11px]">
                Koneksi: SQLite Active
            </span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs sm:text-sm">
                <thead>
                    <tr class="border-b-2 border-stone-900 text-stone-900 uppercase text-[11px] tracking-widest font-semibold">
                        <th class="py-4 px-4 w-12 text-center">NO</th>
                        <th class="py-4 px-4">KODE & TANGGAL</th>
                        <th class="py-4 px-4">NAMA PEMESAN</th>
                        <th class="py-4 px-4">NO. IDENTITAS (NIK)</th>
                        <th class="py-4 px-4">TIPE KAMAR</th>
                        <th class="py-4 px-4 text-center">DURASI</th>
                        <th class="py-4 px-4 text-center">BREAKFAST</th>
                        <th class="py-4 px-4 text-center">DISKON</th>
                        <th class="py-4 px-4 text-right">TOTAL BAYAR</th>
                        <th class="py-4 px-4 text-center w-28">STRUK</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-300">
                    @forelse($bookings as $index => $b)
                        <tr class="hover:bg-stone-200/50 transition-colors">
                            <td class="py-5 px-4 text-center font-mono text-stone-400 tabular-nums">
                                {{ $bookings->firstItem() + $index }}
                            </td>

                            <td class="py-5 px-4 whitespace-nowrap">
                                <strong class="font-mono text-xs text-stone-900 block">{{ $b->booking_code }}</strong>
                                <span class="text-[11px] text-stone-500 font-light">{{ $b->formatted_booking_date }}</span>
                            </td>

                            <td class="py-5 px-4">
                                <strong class="font-serif text-base text-stone-900 block font-normal">{{ $b->customer_name }}</strong>
                                <span class="text-[11px] text-stone-500 font-light">{{ $b->gender }}</span>
                            </td>

                            <td class="py-5 px-4 whitespace-nowrap font-mono text-xs tabular-nums text-stone-700">
                                {{ $b->identity_number }}
                            </td>

                            <td class="py-5 px-4 whitespace-nowrap">
                                <span class="font-medium text-stone-900">{{ $b->roomType->name }}</span>
                                <span class="text-[11px] text-stone-400 block font-light">{{ $b->formatted_room_price }}</span>
                            </td>

                            <td class="py-5 px-4 text-center font-mono tabular-nums text-stone-700">
                                {{ $b->stay_duration }} Hari
                            </td>

                            <td class="py-5 px-4 text-center whitespace-nowrap">
                                @if($b->include_breakfast)
                                    <span class="text-xs font-semibold text-[#B85D3E]">
                                        Ya (+80k)
                                    </span>
                                @else
                                    <span class="text-xs text-stone-400 font-light">
                                        Tidak
                                    </span>
                                @endif
                            </td>

                            <td class="py-5 px-4 text-center font-mono tabular-nums text-xs">
                                @if($b->discount_percentage > 0)
                                    <span class="text-emerald-700 font-medium">
                                        {{ $b->discount_percentage }}%
                                    </span>
                                @else
                                    <span class="text-stone-400">0%</span>
                                @endif
                            </td>

                            <td class="py-5 px-4 text-right whitespace-nowrap font-mono font-bold text-stone-900 tabular-nums text-base">
                                {{ $b->formatted_total_payment }}
                            </td>

                            <td class="py-5 px-4 text-center whitespace-nowrap">
                                <a href="{{ route('booking.show', $b) }}" 
                                   class="pressable inline-block px-4 py-2 rounded-full text-[11px] font-semibold tracking-wider uppercase bg-[#141312] text-white hover:bg-[#B85D3E] transition-all">
                                    Invoice →
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="py-16 text-center text-stone-400">
                                <p class="font-serif text-xl font-normal text-stone-600">Belum ada data pemesanan di database SQLite.</p>
                                <p class="text-xs mt-1 font-light">Silakan membuat reservasi baru terlebih dahulu.</p>
                                <a href="{{ route('booking.create') }}" class="pressable inline-block mt-4 px-6 py-2.5 rounded-full bg-[#B85D3E] text-white text-xs font-semibold uppercase tracking-wider">
                                    Pesan Kamar Sekarang
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($bookings->hasPages())
            <div class="pt-6 border-t border-stone-300">
                {{ $bookings->links() }}
            </div>
        @endif

    </div>
</section>
@endsection
