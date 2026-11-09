@extends('layouts.app')

@section('content')
<div class="py-12 sm:py-16 space-y-12">

    <!-- Header Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-14">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6">
            <div class="max-w-3xl space-y-4">
                <span class="text-xs font-sans tracking-[0.2em] uppercase text-[#d16806] font-medium">
                    Rekapitulasi Data Reservasi
                </span>
                <h1 class="font-serif text-4xl sm:text-6xl font-normal text-[#1a1a1a] capitalize">
                    Data Pemesanan Kamar
                </h1>
                <p class="text-sm sm:text-base text-[#606060] font-light leading-relaxed">
                    Daftar seluruh transaksi pemesanan tamu yang tercatat pada basis data SQLite (Tabel <code>bookings</code>).
                </p>
            </div>

            <div>
                <a href="{{ route('booking.create') }}" 
                   class="pressable inline-flex items-center gap-2 px-6 py-3 rounded-[9px] bg-[#d16806] hover:bg-[#b55804] text-white text-xs font-semibold tracking-wider uppercase transition-colors shadow-sm">
                    <span>+ Tambah Reservasi Baru</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Table Section (Mellow Warm Card Style) -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-14">
        <div class="bg-white rounded-[24px] sm:rounded-[32px] p-6 sm:p-10 border border-[#f4e2d8] shadow-sm space-y-6">
            
            <div class="flex items-center justify-between pb-4 border-b border-[#e9e9e9] text-xs text-[#737373]">
                <span>
                    Total <strong class="text-[#1a1a1a] font-semibold">{{ $bookings->total() }}</strong> transaksi tercatat
                </span>
                <span class="font-mono text-[11px] text-[#8c867e]">
                    Penyimpanan: SQLite Active
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs sm:text-sm">
                    <thead>
                        <tr class="border-b border-[#e9e9e9] text-[#1a1a1a] uppercase text-[11px] tracking-wider font-semibold">
                            <th class="py-4 px-3 w-12 text-center">No</th>
                            <th class="py-4 px-3">Kode & Tanggal</th>
                            <th class="py-4 px-3">Nama Pemesan</th>
                            <th class="py-4 px-3">No. Identitas (NIK)</th>
                            <th class="py-4 px-3">Tipe Kamar</th>
                            <th class="py-4 px-3 text-center">Durasi</th>
                            <th class="py-4 px-3 text-center">Sarapan</th>
                            <th class="py-4 px-3 text-center">Diskon</th>
                            <th class="py-4 px-3 text-right">Total Bayar</th>
                            <th class="py-4 px-3 text-center w-32">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#f0ece7]">
                        @forelse($bookings as $index => $b)
                            <tr class="hover:bg-[#f9f6f3] transition-colors">
                                <td class="py-4 px-3 text-center font-mono text-[#8c867e] tabular-nums">
                                    {{ $bookings->firstItem() + $index }}
                                </td>

                                <td class="py-4 px-3 whitespace-nowrap">
                                    <strong class="font-mono text-xs text-[#1a1a1a] block">{{ $b->booking_code }}</strong>
                                    <span class="text-[11px] text-[#737373] font-light">{{ $b->formatted_booking_date }}</span>
                                </td>

                                <td class="py-4 px-3">
                                    <strong class="font-serif text-base text-[#1a1a1a] block font-normal">{{ $b->customer_name }}</strong>
                                    <span class="text-[11px] text-[#737373] font-light">{{ $b->gender }}</span>
                                </td>

                                <td class="py-4 px-3 whitespace-nowrap font-mono text-xs tabular-nums text-[#353535]">
                                    {{ $b->identity_number }}
                                </td>

                                <td class="py-4 px-3 whitespace-nowrap">
                                    <span class="font-medium text-[#1a1a1a]">{{ $b->roomType->name }}</span>
                                    <span class="text-[11px] text-[#8c867e] block font-light">{{ $b->formatted_room_price }}</span>
                                </td>

                                <td class="py-4 px-3 text-center font-mono tabular-nums text-[#353535]">
                                    {{ $b->stay_duration }} Hari
                                </td>

                                <td class="py-4 px-3 text-center whitespace-nowrap">
                                    @if($b->include_breakfast)
                                        <span class="text-xs font-semibold text-[#d16806]">Ya (+80k)</span>
                                    @else
                                        <span class="text-xs text-[#8c867e] font-light">Tidak</span>
                                    @endif
                                </td>

                                <td class="py-4 px-3 text-center font-mono tabular-nums text-xs">
                                    @if($b->discount_percentage > 0)
                                        <span class="text-emerald-700 font-medium">{{ $b->discount_percentage }}%</span>
                                    @else
                                        <span class="text-[#8c867e]">0%</span>
                                    @endif
                                </td>

                                <td class="py-4 px-3 text-right whitespace-nowrap font-mono font-bold text-[#d16806] tabular-nums text-base">
                                    {{ $b->formatted_total_payment }}
                                </td>

                                <td class="py-4 px-3 text-center whitespace-nowrap">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="{{ route('booking.show', $b) }}" 
                                           class="pressable inline-block px-3 py-1.5 rounded-[7px] text-[10px] font-semibold tracking-wider uppercase bg-[#1a1a1a] hover:bg-[#d16806] text-white transition-colors">
                                            Invoice
                                        </a>
                                        <form action="{{ route('booking.destroy', $b) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pemesanan ini?')" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="pressable px-3 py-1.5 rounded-[7px] text-[10px] font-semibold tracking-wider uppercase bg-red-100 hover:bg-red-600 text-red-700 hover:text-white transition-colors">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="py-16 text-center text-[#737373]">
                                    <p class="font-serif text-2xl font-normal text-[#1a1a1a]">Belum ada data pemesanan di database SQLite.</p>
                                    <p class="text-xs mt-1.5 font-light">Silakan membuat reservasi kamar baru terlebih dahulu.</p>
                                    <a href="{{ route('booking.create') }}" class="pressable inline-block mt-4 px-6 py-2.5 rounded-[9px] bg-[#d16806] hover:bg-[#b55804] text-white text-xs font-semibold uppercase tracking-wider transition-colors shadow-sm">
                                        Buat Reservasi Sekarang
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($bookings->hasPages())
                <div class="pt-6 border-t border-[#e9e9e9]">
                    {{ $bookings->links() }}
                </div>
            @endif

        </div>
    </section>

</div>
@endsection
