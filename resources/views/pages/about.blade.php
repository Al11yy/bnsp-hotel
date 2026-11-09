@extends('layouts.app')

@section('content')
<div class="py-12 sm:py-16 space-y-16">

    <!-- Header Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-14">
        <div class="max-w-3xl space-y-4">
            <span class="text-xs font-sans tracking-[0.2em] uppercase text-[#d16806] font-medium">
                Profil & Dedikasi Pelayanan
            </span>
            <h1 class="font-serif text-4xl sm:text-6xl font-normal text-[#1a1a1a] capitalize">
                Tentang Hotel Grand Harmoni
            </h1>
            <p class="text-sm sm:text-base text-[#606060] font-light leading-relaxed">
                JW Marriott Hotel Jakarta — Grand Harmoni menghadirkan perpaduan estetika ketenangan, standar kemewahan bintang lima, serta dedikasi keramahan legendaris di jantung Jakarta.
            </p>
        </div>
    </section>

    <!-- Main Story & Contact Info -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-14">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-start">
            
            <!-- Left: Hotel Philosophy & Gallery Collage (7 cols) -->
            <div class="lg:col-span-7 space-y-8">
                
                <div class="space-y-3">
                    <h2 class="font-serif text-3xl sm:text-4xl font-normal text-[#1a1a1a] leading-tight">
                        {{ $hotelInfo['name'] }}
                    </h2>
                    <p class="font-serif text-xl sm:text-2xl italic text-[#d16806] font-normal">
                        {{ $hotelInfo['tagline'] }}
                    </p>
                </div>

                <div class="space-y-4 text-xs sm:text-sm text-[#606060] leading-relaxed font-light">
                    <p>
                        {{ $hotelInfo['description'] }}
                    </p>
                    <p>
                        Berlokasi di kawasan diplomatik dan bisnis terkemuka Mega Kuningan, hotel kami dirancang untuk memanjakan tamu dengan kamar luas berpemandangan skyline Jakarta, tempat tidur mewah signature Marriott, serta fasilitas kuliner Sailendra Restaurant dan Pearl Chinese Restaurant yang terkenal.
                    </p>
                </div>

                <!-- 3 Pillars -->
                <div class="pt-6 border-t border-[#e9e9e9] grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <div class="space-y-1">
                        <span class="text-xs font-mono text-[#d16806]">01</span>
                        <h4 class="font-serif text-lg text-[#1a1a1a] font-normal">Standar Bintang 5</h4>
                        <p class="text-xs text-[#737373] font-light">Kenyamanan & higienitas bersertifikasi internasional Marriott.</p>
                    </div>
                    <div class="space-y-1">
                        <span class="text-xs font-mono text-[#d16806]">02</span>
                        <h4 class="font-serif text-lg text-[#1a1a1a] font-normal">Desain Elegan</h4>
                        <p class="text-xs text-[#737373] font-light">Marmer mewah, kayu bernuansa hangat, dan interior timeless.</p>
                    </div>
                    <div class="space-y-1">
                        <span class="text-xs font-mono text-[#d16806]">03</span>
                        <h4 class="font-serif text-lg text-[#1a1a1a] font-normal">Pelayanan Prima</h4>
                        <p class="text-xs text-[#737373] font-light">Concierge & resepsionis ramah bertaraf global 24 jam sehari.</p>
                    </div>
                </div>

                <!-- Image Banner (Lobby of JW Marriott Jakarta) -->
                <div class="rounded-[20px] overflow-hidden aspect-[16/9] shadow-sm border border-[#f4e2d8]">
                    <img src="{{ asset('assets/images/rooms/detail.jpg') }}" alt="JW Marriott Jakarta Grand Lobby" class="w-full h-full object-cover">
                </div>

            </div>

            <!-- Right: Official Contact Card (5 cols) -->
            <div class="lg:col-span-5 space-y-6">
                
                <div class="bg-white rounded-[24px] sm:rounded-[32px] p-8 sm:p-10 border border-[#f4e2d8] shadow-sm space-y-6">
                    
                    <div class="pb-4 border-b border-[#e9e9e9]">
                        <h3 class="font-serif text-2xl font-normal text-[#1a1a1a]">
                            Kontak & Lokasi Resmi
                        </h3>
                        <p class="text-xs text-[#737373] mt-1 font-light">
                            Layanan Front Desk & Concierge 24 Jam
                        </p>
                    </div>

                    <!-- 1. Alamat Lengkap -->
                    <div class="space-y-1.5 text-xs">
                        <span class="text-[11px] font-medium tracking-wider uppercase text-[#d16806] block">Alamat Lengkap</span>
                        <p class="text-xs sm:text-sm text-[#1a1a1a] font-light leading-relaxed">
                            {{ $hotelInfo['address'] }}
                        </p>
                    </div>

                    <!-- 2. No Telp -->
                    <div class="space-y-1.5 text-xs">
                        <span class="text-[11px] font-medium tracking-wider uppercase text-[#d16806] block">Nomor Telepon</span>
                        <p class="text-xs sm:text-sm text-[#1a1a1a] font-medium">
                            <a href="tel:{{ preg_replace('/[^0-9]/', '', $hotelInfo['phone']) }}" class="hover:text-[#d16806] transition-colors">
                                {{ $hotelInfo['phone'] }}
                            </a>
                        </p>
                    </div>

                    <!-- 3. Alamat Email -->
                    <div class="space-y-1.5 text-xs">
                        <span class="text-[11px] font-medium tracking-wider uppercase text-[#d16806] block">Alamat Email Resmi</span>
                        <p class="text-xs sm:text-sm text-[#1a1a1a] font-light">
                            <a href="mailto:{{ $hotelInfo['email'] }}" class="text-[#d16806] hover:underline transition-colors break-all">
                                {{ $hotelInfo['email'] }}
                            </a>
                        </p>
                    </div>

                    <!-- 4. Jam Operasional -->
                    <div class="pt-4 border-t border-[#e9e9e9] text-xs text-[#606060] space-y-1">
                        <div class="flex justify-between">
                            <span>Check-in Tamu:</span>
                            <span class="font-medium text-[#1a1a1a]">14.00 WIB</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Check-out Tamu:</span>
                            <span class="font-medium text-[#1a1a1a]">12.00 WIB</span>
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <div class="pt-2">
                        <a href="{{ route('booking.create') }}" 
                           class="pressable block w-full py-3.5 px-6 rounded-[9px] bg-[#d16806] hover:bg-[#b55804] text-white text-xs font-semibold tracking-wider uppercase text-center transition-colors shadow-sm">
                            Buat Reservasi Kamar Sekarang →
                        </a>
                    </div>

                </div>

            </div>

        </div>
    </section>

</div>
@endsection
