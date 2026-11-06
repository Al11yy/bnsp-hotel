@extends('layouts.app')

@section('content')
<!-- BANNER TENTANG KAMI -->
<section class="pt-36 pb-20 px-6 sm:px-8 lg:px-12 bg-[#0D0C0B] text-white border-b border-white/10">
    <div class="max-w-7xl mx-auto space-y-4">
        <span class="text-[11px] font-semibold tracking-[0.25em] uppercase text-[#8C867E] block">
            — PROFIL HOTEL
        </span>
        <h1 class="font-serif text-4xl sm:text-6xl font-normal text-white">
            Tentang Hotel Grand Harmoni.
        </h1>
        <p class="text-xs sm:text-sm text-[#8C867E] max-w-xl leading-relaxed font-light">
            Informasi profil lengkap, nilai-nilai keramahan, alamat lokasi, nomor telepon resmi, dan kontak email reservasi kami.
        </p>
    </div>
</section>

<!-- SECTION KONTEN TENTANG KAMI -->
<section class="py-24 bg-[#F7F5F0] text-[#141312]">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 space-y-20">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
            
            <!-- Deskripsi & Filosofi -->
            <div class="lg:col-span-7 space-y-8">
                <div>
                    <span class="text-[11px] font-semibold tracking-[0.25em] uppercase text-[#8C867E] block mb-2">
                        — FILOSOFI KERAMAHAN
                    </span>
                    <h2 class="font-serif text-3xl sm:text-5xl font-normal text-stone-900 leading-tight">
                        {{ $hotelInfo['name'] }}
                    </h2>
                    <p class="font-serif text-xl sm:text-2xl italic text-[#B85D3E] font-normal mt-2">
                        {{ $hotelInfo['tagline'] }}
                    </p>
                </div>

                <div class="space-y-5 text-xs sm:text-sm text-stone-600 leading-relaxed font-light">
                    <p>
                        {{ $hotelInfo['description'] }}
                    </p>
                    <p>
                        Setiap sudut arsitektur kami dirancang dengan prinsip kejujuran material: dinding pasir bertekstur, batu kapur travertine, dan kayu oak mentah yang menyejukkan. Suasana tenang yang kami hadirkan menjadikan Grand Harmoni pilihan ideal bagi para pelancong bisnis dan liburan keluarga yang mendambakan kenyamanan bermutu.
                    </p>
                </div>

                <!-- 3 Pilar Layanan -->
                <div class="pt-6 border-t border-stone-300 grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <div class="space-y-1">
                        <span class="text-xs font-mono text-stone-400">01</span>
                        <h4 class="font-serif text-lg text-stone-900 font-medium">Standar Bintang 4</h4>
                        <p class="text-[11px] text-stone-500 font-light">Kenyamanan & higienitas bersertifikasi internasional.</p>
                    </div>
                    <div class="space-y-1">
                        <span class="text-xs font-mono text-stone-400">02</span>
                        <h4 class="font-serif text-lg text-stone-900 font-medium">Material Alami</h4>
                        <p class="text-[11px] text-stone-500 font-light">Batu travertine, kayu oak, dan linen katun organik.</p>
                    </div>
                    <div class="space-y-1">
                        <span class="text-xs font-mono text-stone-400">03</span>
                        <h4 class="font-serif text-lg text-stone-900 font-medium">Pelayanan Prima</h4>
                        <p class="text-[11px] text-stone-500 font-light">Resepsionis ramah & tanggap 24 jam sehari.</p>
                    </div>
                </div>
            </div>

            <!-- Kartu Kontak Resmi Sesuai Butir 1 -->
            <div class="lg:col-span-5 space-y-8">
                
                <div class="p-8 sm:p-10 rounded-3xl bg-[#121110] text-white border border-white/10 space-y-8 shadow-xl">
                    <h3 class="font-serif text-2xl font-normal text-white border-b border-white/10 pb-4">
                        Kontak & Lokasi Resmi
                    </h3>

                    <!-- 1. Alamat Hotel -->
                    <div class="space-y-1.5">
                        <span class="text-[10px] font-semibold tracking-widest uppercase text-[#8C867E] block">ALAMAT LENGKAP</span>
                        <p class="text-xs sm:text-sm text-[#FAF8F5] font-light leading-relaxed">
                            {{ $hotelInfo['address'] }}
                        </p>
                    </div>

                    <!-- 2. No Telp -->
                    <div class="space-y-1.5">
                        <span class="text-[10px] font-semibold tracking-widest uppercase text-[#8C867E] block">NOMOR TELEPON</span>
                        <p class="text-xs sm:text-sm text-[#FAF8F5] font-light leading-relaxed">
                            {{ $hotelInfo['phone'] }}
                        </p>
                        <span class="text-[10px] text-[#8C867E] block">Layanan Front Desk & Reservasi 24 Jam</span>
                    </div>

                    <!-- 3. Alamat Email -->
                    <div class="space-y-1.5">
                        <span class="text-[10px] font-semibold tracking-widest uppercase text-[#8C867E] block">ALAMAT EMAIL RESMI</span>
                        <p class="text-xs sm:text-sm text-[#FAF8F5] font-light">
                            <a href="mailto:{{ $hotelInfo['email'] }}" class="text-[#E8DFD0] hover:text-[#C46849] underline decoration-white/20 transition-colors">
                                {{ $hotelInfo['email'] }}
                            </a>
                        </p>
                    </div>

                    <!-- Jam Operasional -->
                    <div class="pt-4 border-t border-white/10 grid grid-cols-2 gap-4 text-xs font-light text-[#A89F91]">
                        <div>
                            <span class="block text-[10px] uppercase text-[#8C867E]">CHECK-IN</span>
                            <strong class="text-white font-medium">{{ $hotelInfo['checkin_time'] }}</strong>
                        </div>
                        <div>
                            <span class="block text-[10px] uppercase text-[#8C867E]">CHECK-OUT</span>
                            <strong class="text-white font-medium">{{ $hotelInfo['checkout_time'] }}</strong>
                        </div>
                    </div>

                    <a href="{{ route('booking.create') }}" 
                       class="pressable w-full block text-center py-3 rounded-full text-xs font-semibold tracking-wider uppercase bg-[#F7F5F0] text-[#121110] hover:bg-[#C46849] hover:text-white transition-all shadow-md">
                        Buka Formulir Pemesanan
                    </a>
                </div>

            </div>

        </div>

    </div>
</section>
@endsection
