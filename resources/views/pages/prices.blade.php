@extends('layouts.app')

@section('content')
<!-- BANNER DAFTAR HARGA -->
<section class="pt-36 pb-20 px-6 sm:px-8 lg:px-12 bg-[#0D0C0B] text-white border-b border-white/10">
    <div class="max-w-7xl mx-auto space-y-4">
        <span class="text-[11px] font-semibold tracking-[0.25em] uppercase text-[#8C867E] block">
            — STRUKTUR TARIF
        </span>
        <h1 class="font-serif text-4xl sm:text-6xl font-normal text-white">
            Daftar Harga Sewa Kamar Hotel.
        </h1>
        <p class="text-xs sm:text-sm text-[#8C867E] max-w-xl leading-relaxed font-light">
            Transparansi tarif resmi sewa kamar per malam untuk seluruh tipe akomodasi di Hotel Grand Harmoni, lengkap dengan simulasi diskon durasi dan fasilitas sarapan.
        </p>
    </div>
</section>

<!-- SECTION TABEL HARGA EDITORIAL -->
<section class="py-24 bg-[#F7F5F0] text-[#141312]">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 space-y-16">

        <!-- TABEL UTAMA -->
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs sm:text-sm">
                <thead>
                    <tr class="border-b-2 border-stone-900 text-stone-900 uppercase text-[11px] tracking-widest font-semibold">
                        <th class="py-5 px-4 w-12 text-center">NO</th>
                        <th class="py-5 px-4 w-40">VISUAL</th>
                        <th class="py-5 px-4">TIPE KAMAR</th>
                        <th class="py-5 px-4">KAPASITAS</th>
                        <th class="py-5 px-4">FASILITAS UNGGULAN</th>
                        <th class="py-5 px-4 text-right">TARIF / MALAM</th>
                        <th class="py-5 px-4 text-center w-36">AKSI</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-stone-300">
                    @foreach($roomTypes as $index => $room)
                        <tr class="hover:bg-stone-200/50 transition-colors">
                            <td class="py-6 px-4 text-center font-mono text-stone-400 tabular-nums">0{{ $index + 1 }}</td>
                            
                            <td class="py-6 px-4">
                                <div class="w-28 h-20 rounded-xl overflow-hidden bg-stone-300 border border-stone-300 shadow-sm">
                                    <img src="{{ asset($room->image_url) }}" alt="{{ $room->name }}" class="w-full h-full object-cover">
                                </div>
                            </td>

                            <td class="py-6 px-4">
                                <strong class="font-serif text-lg text-stone-900 block font-normal">Kamar {{ $room->name }}</strong>
                                <span class="text-xs text-stone-500 font-light">{{ $room->bed_type }}</span>
                            </td>

                            <td class="py-6 px-4 whitespace-nowrap text-stone-700 font-light">
                                {{ $room->capacity }}
                            </td>

                            <td class="py-6 px-4">
                                <ul class="text-xs text-stone-600 space-y-1 font-light">
                                    @foreach(array_slice($room->facilities ?? [], 0, 3) as $f)
                                        <li>• {{ $f }}</li>
                                    @endforeach
                                </ul>
                            </td>

                            <td class="py-6 px-4 text-right whitespace-nowrap">
                                <span class="font-mono text-lg sm:text-xl font-semibold text-[#B85D3E] tabular-nums block">
                                    {{ $room->formatted_price }}
                                </span>
                                <span class="text-[10px] text-stone-400 font-light">per malam / kamar</span>
                            </td>

                            <td class="py-6 px-4 text-center">
                                <a href="{{ route('booking.create', ['room_id' => $room->id]) }}" 
                                   class="pressable inline-block px-5 py-2.5 rounded-full text-[11px] font-semibold tracking-wider uppercase bg-[#141312] text-white hover:bg-[#B85D3E] transition-all">
                                    Pesan Kamar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- DUAL CARDS KETENTUAN BNSP -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pt-6">
            
            <div class="p-8 rounded-3xl bg-stone-200/60 border border-stone-300 space-y-4">
                <span class="text-[10px] font-semibold tracking-widest uppercase text-[#B85D3E] block">KETENTUAN DISKON</span>
                <h3 class="font-serif text-2xl font-normal text-stone-900">Potongan Diskon Durasi Menginap</h3>
                <p class="text-xs text-stone-600 leading-relaxed font-light">
                    Sesuai skenario tugas BNSP FR.IA.02 butir 2, tamu yang menginap <strong>lebih dari 3 hari (&gt; 3 hari)</strong> secara otomatis mendapatkan <strong>diskon sebesar 10%</strong> dari total biaya sewa kamar.
                </p>
                <div class="p-4 rounded-xl bg-white/80 border border-stone-300 text-xs font-mono text-stone-800 tabular-nums">
                    Contoh: 4 malam Kamar Standar (4 × Rp 500.000 = Rp 2.000.000). Diskon 10% (-Rp 200.000) = Total Rp 1.800.000.
                </div>
            </div>

            <div class="p-8 rounded-3xl bg-stone-200/60 border border-stone-300 space-y-4">
                <span class="text-[10px] font-semibold tracking-widest uppercase text-[#B85D3E] block">LAYANAN SARAPAN</span>
                <h3 class="font-serif text-2xl font-normal text-stone-900">Fasilitas Breakfast Tambahan</h3>
                <p class="text-xs text-stone-600 leading-relaxed font-light">
                    Tamu dapat memilih opsi sarapan pagi prasmanan (buffet breakfast) internasional. Jika dipilih pada formulir pemesanan, dikenakan biaya tambahan tetap sebesar <strong>Rp 80.000</strong>.
                </p>
                <div class="p-4 rounded-xl bg-white/80 border border-stone-300 text-xs font-mono text-stone-800">
                    Opsi sarapan dapat ditentukan secara fleksibel saat pengisian formulir reservasi.
                </div>
            </div>

        </div>

    </div>
</section>
@endsection
