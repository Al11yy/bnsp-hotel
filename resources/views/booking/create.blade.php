@extends('layouts.app')

@section('content')
<div class="py-12 sm:py-16 space-y-12">

    <!-- Header Section -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-14">
        <div class="max-w-3xl space-y-4">
            <span class="text-xs font-sans tracking-[0.2em] uppercase text-[#d16806] font-medium">
                Reservasi Kamar Resmi
            </span>
            <h1 class="font-serif text-4xl sm:text-6xl font-normal text-[#1a1a1a] capitalize">
                Form Pemesanan
            </h1>
            <p class="text-sm sm:text-base text-[#606060] font-light leading-relaxed">
                Silakan lengkapi formulir reservasi kamar berikut untuk memastikan ketersediaan akomodasi pilihan Anda di JW Marriott Hotel Jakarta. Klik tombol <strong>Hitung Total Bayar</strong> untuk memeriksa rincian biaya sebelum menyimpan pemesanan.
            </p>
        </div>
    </section>

    <!-- Main Booking Form & Estimation Summary -->
    <section class="max-w-7xl mx-auto px-4 sm:px-8 lg:px-14">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
            
            <!-- Left: Main Form (8 cols) -->
            <div class="lg:col-span-8 bg-white p-6 sm:p-10 rounded-[24px] sm:rounded-[32px] border border-[#f4e2d8] shadow-sm space-y-8">
                
                <div class="flex items-center justify-between pb-6 border-b border-[#e9e9e9]">
                    <div>
                        <h2 class="font-serif text-2xl sm:text-3xl font-normal text-[#1a1a1a]">
                            Data Tamu & Detail Menginap
                        </h2>
                        <p class="text-xs text-[#737373] mt-1 font-light">Pastikan data identitas KTP/NIK sesuai dokumen resmi Anda</p>
                    </div>
                </div>

                <form id="booking-form" action="{{ route('booking.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- 1. Nama Pemesan (Auto-Focus) -->
                    <div class="space-y-2">
                        <label for="customer_name" class="block text-xs font-medium uppercase tracking-wider text-[#353535]">
                            Nama Pemesan <span class="text-[#d16806]">*</span>
                        </label>
                        <input type="text" 
                               id="customer_name" 
                               name="customer_name" 
                               value="{{ old('customer_name') }}"
                               placeholder="Masukkan nama lengkap pemesan (cth: Andri Santosa)" 
                               required
                               class="w-full px-4 py-3 rounded-[9px] border border-[#e9e9e9] bg-[#f9f6f3] text-sm text-[#1a1a1a] focus:outline-none focus:border-[#d16806] transition-colors @error('customer_name') border-red-400 bg-red-50/40 @enderror">
                        <p id="error-customer_name" class="hidden text-xs font-medium text-red-600">
                            Nama pemesan wajib diisi.
                        </p>
                        @error('customer_name')
                            <p class="text-xs font-medium text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- 2. Jenis Kelamin (Radio Button) -->
                    <div class="space-y-2">
                        <span class="block text-xs font-medium uppercase tracking-wider text-[#353535]">
                            Jenis Kelamin <span class="text-[#d16806]">*</span>
                        </span>
                        <div class="flex items-center gap-8 p-3.5 rounded-[9px] bg-[#f9f6f3] border border-[#e9e9e9]">
                            <label class="flex items-center gap-2.5 cursor-pointer text-xs sm:text-sm font-medium text-[#353535] hover:text-[#1a1a1a]">
                                <input type="radio" 
                                       name="gender" 
                                       value="Laki-laki" 
                                       {{ old('gender', 'Laki-laki') === 'Laki-laki' ? 'checked' : '' }}
                                       class="w-4 h-4 text-[#d16806] focus:ring-[#d16806] border-[#e9e9e9]">
                                <span>Laki-laki</span>
                            </label>
                            <label class="flex items-center gap-2.5 cursor-pointer text-xs sm:text-sm font-medium text-[#353535] hover:text-[#1a1a1a]">
                                <input type="radio" 
                                       name="gender" 
                                       value="Perempuan" 
                                       {{ old('gender') === 'Perempuan' ? 'checked' : '' }}
                                       class="w-4 h-4 text-[#d16806] focus:ring-[#d16806] border-[#e9e9e9]">
                                <span>Perempuan</span>
                            </label>
                        </div>
                        @error('gender')
                            <p class="text-xs font-medium text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- 3. Nomor Identitas (16 Digit NIK) -->
                    <div class="space-y-2">
                        <label for="identity_number" class="block text-xs font-medium uppercase tracking-wider text-[#353535]">
                            Nomor Identitas (NIK / KTP) <span class="text-[#d16806]">*</span>
                        </label>
                        <input type="text" 
                               id="identity_number" 
                               name="identity_number" 
                               maxlength="16"
                               value="{{ old('identity_number') }}"
                               placeholder="Isi 16 digit angka (cth: 3275091210770004)" 
                               required
                               class="w-full px-4 py-3 rounded-[9px] border border-[#e9e9e9] bg-[#f9f6f3] text-sm text-[#1a1a1a] font-mono tracking-wider tabular-nums focus:outline-none focus:border-[#d16806] transition-colors @error('identity_number') border-red-400 bg-red-50/40 @enderror">
                        
                        <!-- Pesan Error Khas BNSP -->
                        <p id="error-identity_number" class="hidden text-xs font-bold text-red-600">
                            isian salah..data harus 16 digit
                        </p>
                        @error('identity_number')
                            <p class="text-xs font-bold text-red-600">{{ $message }}</p>
                        @enderror
                        <span class="text-[11px] text-[#8c867e] font-light block">Wajib berupa 16 digit angka sesuai identitas KTP.</span>
                    </div>

                    <!-- 4. Tipe Kamar & 5. Harga (Readonly) -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        
                        <!-- Tipe Kamar -->
                        <div class="space-y-2">
                            <label for="room_type_id" class="block text-xs font-medium uppercase tracking-wider text-[#353535]">
                                Tipe Kamar <span class="text-[#d16806]">*</span>
                            </label>
                            <select id="room_type_id" 
                                    name="room_type_id" 
                                    required
                                    class="w-full px-4 py-3 rounded-[9px] border border-[#e9e9e9] bg-[#f9f6f3] text-sm text-[#1a1a1a] focus:outline-none focus:border-[#d16806] transition-colors @error('room_type_id') border-red-400 bg-red-50/40 @enderror">
                                <option value="" disabled {{ !old('room_type_id', $selectedRoomId ?? null) ? 'selected' : '' }}>
                                    — Pilih Tipe Kamar —
                                </option>
                                @foreach($roomTypes as $room)
                                    <option value="{{ $room->id }}" 
                                            data-price="{{ $room->price }}"
                                            data-name="{{ $room->name }}"
                                            {{ (string) old('room_type_id', $selectedRoomId ?? null) === (string) $room->id ? 'selected' : '' }}>
                                        Kamar {{ $room->name }} (Rp {{ number_format($room->price, 0, ',', '.') }})
                                    </option>
                                @endforeach
                            </select>
                            <p id="error-room_type_id" class="hidden text-xs font-medium text-red-600">
                                Pilih salah satu tipe kamar.
                            </p>
                            @error('room_type_id')
                                <p class="text-xs font-medium text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Harga Kamar (Auto-fill Readonly) -->
                        <div class="space-y-2">
                            <label for="room_price_display" class="block text-xs font-medium uppercase tracking-wider text-[#353535]">
                                Harga Kamar (per malam)
                            </label>
                            <input type="text" 
                                   id="room_price_display" 
                                   name="room_price_display" 
                                   readonly 
                                   placeholder="Rp 0"
                                   class="w-full px-4 py-3 rounded-[9px] border border-[#e9e9e9] bg-[#f0ece7] text-[#1a1a1a] text-sm font-mono font-semibold tabular-nums cursor-not-allowed">
                            <span class="text-[11px] text-[#8c867e] font-light block">Terisi otomatis sesuai pilihan tipe kamar.</span>
                        </div>

                    </div>

                    <!-- 6. Tanggal Pesan & 7. Durasi Menginap -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        
                        <!-- Tanggal Pesan -->
                        <div class="space-y-2">
                            <label for="booking_date" class="block text-xs font-medium uppercase tracking-wider text-[#353535]">
                                Tanggal Pesan <span class="text-[#d16806]">*</span>
                            </label>
                            <input type="date" 
                                   id="booking_date" 
                                   name="booking_date" 
                                   value="{{ old('booking_date', date('Y-m-d')) }}"
                                   min="{{ date('Y-m-d') }}"
                                   required
                                   class="w-full px-4 py-3 rounded-[9px] border border-[#e9e9e9] bg-[#f9f6f3] text-sm text-[#1a1a1a] focus:outline-none focus:border-[#d16806] transition-colors @error('booking_date') border-red-400 bg-red-50/40 @enderror">
                            <span class="text-[11px] text-[#8c867e] font-light block">Format tanggal pemesanan: dd/mm/yyyy.</span>
                            @error('booking_date')
                                <p class="text-xs font-medium text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Durasi Menginap -->
                        <div class="space-y-2">
                            <label for="stay_duration" class="block text-xs font-medium uppercase tracking-wider text-[#353535]">
                                Durasi Menginap (Hari) <span class="text-[#d16806]">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" 
                                       id="stay_duration" 
                                       name="stay_duration" 
                                       value="{{ old('stay_duration', '1') }}"
                                       placeholder="Cth: 3" 
                                       required
                                       class="w-full px-4 py-3 pr-14 rounded-[9px] border border-[#e9e9e9] bg-[#f9f6f3] text-sm text-[#1a1a1a] font-mono tabular-nums focus:outline-none focus:border-[#d16806] transition-colors @error('stay_duration') border-red-400 bg-red-50/40 @enderror">
                                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-xs font-semibold text-[#8c867e]">
                                    Hari
                                </div>
                            </div>
                            
                            <!-- Pesan Error Khas BNSP -->
                            <p id="error-stay_duration" class="hidden text-xs font-bold text-red-600">
                                harus isi angka
                            </p>
                            @error('stay_duration')
                                <p class="text-xs font-bold text-red-600">{{ $message }}</p>
                            @enderror
                            <span class="text-[11px] text-[#8c867e] font-light block">Durasi &gt; 3 hari otomatis mendapatkan diskon 10%.</span>
                        </div>

                    </div>

                    <!-- 8. Termasuk Breakfast (Checkbox) -->
                    <div class="p-4 rounded-[12px] bg-[#f9f6f3] border border-[#e9e9e9]">
                        <label class="flex items-center gap-3.5 cursor-pointer">
                            <input type="checkbox" 
                                   id="include_breakfast" 
                                   name="include_breakfast" 
                                   value="1" 
                                   {{ old('include_breakfast') ? 'checked' : '' }}
                                   class="w-4 h-4 rounded text-[#d16806] focus:ring-[#d16806] border-[#e9e9e9]">
                            <div>
                                <span class="text-xs sm:text-sm font-medium text-[#1a1a1a] block">
                                    Termasuk Breakfast (+ Rp 80.000 / hari)
                                </span>
                                <span class="text-[11px] text-[#737373] font-light block">
                                    Centang untuk menyertakan sarapan prasmanan harian di Sailendra Restaurant (dihitung Rp 80.000 x jumlah hari menginap).
                                </span>
                            </div>
                        </label>
                    </div>

                    <!-- 9. Total Bayar (Readonly) -->
                    <div class="space-y-2 pt-2">
                        <label for="total_payment_display" class="block text-xs font-medium uppercase tracking-wider text-[#353535]">
                            Total Bayar
                        </label>
                        <input type="text" 
                               id="total_payment_display" 
                               name="total_payment_display" 
                               readonly 
                               placeholder="Klik tombol 'Hitung Total Bayar'" 
                               class="w-full px-4 py-3.5 rounded-[9px] border border-[#e9e9e9] bg-[#f0ece7] text-[#1a1a1a] font-mono text-xl font-bold tabular-nums cursor-not-allowed">
                        <span id="hint-total" class="text-xs text-[#737373] font-light block">
                            Terisi otomatis dengan menekan tombol <strong>Hitung Total Bayar</strong> di bawah.
                        </span>
                    </div>

                    <!-- Action Buttons: Hitung Total Bayar, Simpan, Cancel -->
                    <div class="pt-6 border-t border-[#e9e9e9] flex flex-wrap items-center justify-between gap-4">
                        
                        <!-- 1. Tombol Hitung Total Bayar -->
                        <button type="button" 
                                id="btn-calculate"
                                class="pressable px-6 py-3 rounded-[9px] bg-white border border-[#e9e9e9] text-[#1a1a1a] hover:bg-[#f9f6f3] hover:border-[#d16806] text-xs font-semibold tracking-wider uppercase shadow-sm transition-all">
                            Hitung Total Bayar
                        </button>

                        <div class="flex items-center gap-3">
                            <!-- 2. Tombol Simpan (Disabled sebelum dihitung) -->
                            <button type="submit" 
                                    id="btn-save"
                                    disabled
                                    class="pressable px-7 py-3 rounded-[9px] bg-[#d16806] hover:bg-[#b55804] disabled:bg-[#e2ded9] disabled:text-[#8c867e] disabled:cursor-not-allowed text-white text-xs font-semibold tracking-wider uppercase shadow-sm transition-all">
                                Simpan
                            </button>

                            <!-- 3. Tombol Cancel / Batal -->
                            <button type="button" 
                                    id="btn-cancel"
                                    class="pressable px-5 py-3 rounded-[9px] bg-[#f9f6f3] hover:bg-[#eee8e0] text-[#606060] border border-[#e9e9e9] text-xs font-medium tracking-wider uppercase transition-colors">
                                Cancel
                            </button>
                        </div>

                    </div>

                </form>

            </div>

            <!-- Right: Calculation Breakdown Sidebar (4 cols) -->
            <div class="lg:col-span-4 space-y-6">
                
                <div class="p-6 sm:p-8 rounded-[24px] sm:rounded-[32px] bg-white border border-[#f4e2d8] shadow-sm space-y-6">
                    <div class="pb-4 border-b border-[#e9e9e9]">
                        <h3 class="font-serif text-2xl font-normal text-[#1a1a1a]">
                            Rincian Estimasi
                        </h3>
                        <p class="text-xs text-[#737373] mt-1 font-light">Kalkulasi biaya otomatis dan transparan</p>
                    </div>

                    <div id="calculation-breakdown" class="space-y-3.5 text-xs font-light text-[#606060]">
                        <div class="flex justify-between pb-2.5 border-b border-[#f0ece7]">
                            <span>Sewa Kamar (<span id="calc-duration" class="font-mono tabular-nums font-normal">0</span> hari):</span>
                            <strong id="calc-subtotal" class="font-mono tabular-nums text-[#1a1a1a] font-medium">Rp 0</strong>
                        </div>
                        <div class="flex justify-between pb-2.5 border-b border-[#f0ece7] text-[#d16806]">
                            <span>Diskon (<span id="calc-discount-percent">0</span>%):</span>
                            <strong id="calc-discount-amount" class="font-mono tabular-nums font-medium">- Rp 0</strong>
                        </div>
                        <div class="flex justify-between pb-2.5 border-b border-[#f0ece7]">
                            <span>Sarapan (<span id="calc-breakfast-days" class="font-mono tabular-nums">0</span> hari):</span>
                            <strong id="calc-breakfast-fee" class="font-mono tabular-nums text-[#1a1a1a] font-medium">Rp 0</strong>
                        </div>
                        <div class="pt-2 flex justify-between text-sm text-[#1a1a1a]">
                            <span class="font-medium">Total Akhir:</span>
                            <strong id="calc-total-final" class="font-mono tabular-nums text-xl font-bold text-[#d16806]">Rp 0</strong>
                        </div>
                    </div>

                    <div class="p-4 rounded-[12px] bg-[#f9f6f3] border border-[#e9e9e9] text-[11px] text-[#737373] space-y-1.5 leading-relaxed">
                        <p class="font-medium text-[#1a1a1a]">Layanan Istimewa Tamu:</p>
                        <p>• Diskon otomatis 10% untuk masa menginap lebih dari 3 hari.</p>
                        <p>• Jaminan kamar bersih & steril berstandar Marriott Global Cleanliness Council.</p>
                    </div>
                </div>

            </div>

        </div>
    </section>

</div>
@endsection

@push('scripts')
<!-- Vanilla JavaScript Interaktif: Auto-Focus, Validasi NIK 16 Digit, Validasi Durasi, Kalkulasi Otomatis, & Disable Tombol Simpan -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('booking-form');
        const customerNameInput = document.getElementById('customer_name');
        const identityInput = document.getElementById('identity_number');
        const roomTypeSelect = document.getElementById('room_type_id');
        const roomPriceDisplay = document.getElementById('room_price_display');
        const stayDurationInput = document.getElementById('stay_duration');
        const breakfastCheckbox = document.getElementById('include_breakfast');
        const totalPaymentDisplay = document.getElementById('total_payment_display');
        const hintTotal = document.getElementById('hint-total');
        
        // Breakdown Elemen
        const calcDuration = document.getElementById('calc-duration');
        const calcSubtotal = document.getElementById('calc-subtotal');
        const calcDiscountPercent = document.getElementById('calc-discount-percent');
        const calcDiscountAmount = document.getElementById('calc-discount-amount');
        const calcBreakfastDays = document.getElementById('calc-breakfast-days');
        const calcBreakfastFee = document.getElementById('calc-breakfast-fee');
        const calcTotalFinal = document.getElementById('calc-total-final');

        // Tombol Aksi
        const btnCalculate = document.getElementById('btn-calculate');
        const btnSave = document.getElementById('btn-save');
        const btnCancel = document.getElementById('btn-cancel');

        // Pesan Error Elemen
        const errorCustomerName = document.getElementById('error-customer_name');
        const errorIdentity = document.getElementById('error-identity_number');
        const errorRoomType = document.getElementById('error-room_type_id');
        const errorStayDuration = document.getElementById('error-stay_duration');

        // 1. AUTO-FOCUS ke input nama
        if (customerNameInput) {
            customerNameInput.focus();
        }

        function formatRupiah(number) {
            return 'Rp ' + Number(number).toLocaleString('id-ID');
        }

        let isCalculated = false;

        function invalidateCalculation() {
            isCalculated = false;
            btnSave.disabled = true;
            
            totalPaymentDisplay.value = '';
            totalPaymentDisplay.placeholder = "Klik tombol 'Hitung Total Bayar'";
            if (hintTotal) {
                hintTotal.innerHTML = "Ada perubahan isian. Silakan klik <strong>Hitung Total Bayar</strong> lagi untuk mengaktifkan tombol Simpan.";
                hintTotal.className = "text-xs text-[#d16806] font-medium mt-1.5 block";
            }
        }

        // 2. OTOMATIS TAMPILKAN HARGA SAAT TIPE KAMAR DIPILIH
        function updateRoomPrice() {
            const selectedOption = roomTypeSelect.options[roomTypeSelect.selectedIndex];
            if (selectedOption && selectedOption.dataset.price) {
                const price = Number(selectedOption.dataset.price);
                roomPriceDisplay.value = formatRupiah(price);
                errorRoomType.classList.add('hidden');
            } else {
                roomPriceDisplay.value = '';
            }
            invalidateCalculation();
        }

        roomTypeSelect.addEventListener('change', updateRoomPrice);
        if (roomTypeSelect.value) {
            updateRoomPrice();
        }

        // 3. VALIDASI NOMOR IDENTITAS (Wajib 16 digit angka)
        function validateIdentity() {
            const val = identityInput.value.trim();
            const regex16Digit = /^[0-9]{16}$/;

            if (!regex16Digit.test(val)) {
                errorIdentity.classList.remove('hidden');
                identityInput.classList.add('border-red-400', 'bg-red-50/40');
                identityInput.classList.remove('border-emerald-500');
                return false;
            } else {
                errorIdentity.classList.add('hidden');
                identityInput.classList.remove('border-red-400', 'bg-red-50/40');
                identityInput.classList.add('border-emerald-500');
                return true;
            }
        }

        identityInput.addEventListener('input', function () {
            validateIdentity();
            invalidateCalculation();
        });

        // 4. VALIDASI DURASI MENGINAP (Wajib angka positif)
        function validateDuration() {
            const val = stayDurationInput.value.trim();
            const isNumeric = /^[0-9]+$/.test(val);
            const num = parseInt(val, 10);

            if (!isNumeric || isNaN(num) || num <= 0) {
                errorStayDuration.classList.remove('hidden');
                stayDurationInput.classList.add('border-red-400', 'bg-red-50/40');
                stayDurationInput.classList.remove('border-emerald-500');
                return false;
            } else {
                errorStayDuration.classList.add('hidden');
                stayDurationInput.classList.remove('border-red-400', 'bg-red-50/40');
                stayDurationInput.classList.add('border-emerald-500');
                return true;
            }
        }

        stayDurationInput.addEventListener('input', function () {
            validateDuration();
            invalidateCalculation();
        });

        customerNameInput.addEventListener('input', function () {
            if (customerNameInput.value.trim().length >= 3) {
                errorCustomerName.classList.add('hidden');
                customerNameInput.classList.remove('border-red-400');
            }
            invalidateCalculation();
        });

        breakfastCheckbox.addEventListener('change', invalidateCalculation);

        // 5. LOGIKA TOMBOL HITUNG TOTAL BAYAR
        btnCalculate.addEventListener('click', function () {
            let isValid = true;

            if (customerNameInput.value.trim() === '') {
                errorCustomerName.classList.remove('hidden');
                customerNameInput.classList.add('border-red-400');
                customerNameInput.focus();
                isValid = false;
            } else {
                errorCustomerName.classList.add('hidden');
                customerNameInput.classList.remove('border-red-400');
            }

            if (!validateIdentity()) {
                if (isValid) identityInput.focus();
                isValid = false;
            }

            const selectedOption = roomTypeSelect.options[roomTypeSelect.selectedIndex];
            if (!selectedOption || !selectedOption.dataset.price) {
                errorRoomType.classList.remove('hidden');
                if (isValid) roomTypeSelect.focus();
                isValid = false;
            } else {
                errorRoomType.classList.add('hidden');
            }

            if (!validateDuration()) {
                if (isValid) stayDurationInput.focus();
                isValid = false;
            }

            if (!isValid) return;

            // KALKULASI SESUAI KETENTUAN BNSP
            const roomPrice = Number(selectedOption.dataset.price);
            const duration = parseInt(stayDurationInput.value.trim(), 10);
            const subtotal = roomPrice * duration;

            let discountPercent = 0;
            let discountAmount = 0;
            if (duration > 3) {
                discountPercent = 10;
                discountAmount = Math.round(0.10 * subtotal);
            }

            const includeBreakfast = breakfastCheckbox.checked;
            const breakfastFee = includeBreakfast ? (80000 * duration) : 0;
            const totalPayment = (subtotal - discountAmount) + breakfastFee;

            totalPaymentDisplay.value = formatRupiah(totalPayment);

            calcDuration.textContent = duration;
            calcSubtotal.textContent = formatRupiah(subtotal);
            calcDiscountPercent.textContent = discountPercent;
            calcDiscountAmount.textContent = '- ' + formatRupiah(discountAmount);
            if (calcBreakfastDays) calcBreakfastDays.textContent = includeBreakfast ? duration : 0;
            calcBreakfastFee.textContent = formatRupiah(breakfastFee);
            calcTotalFinal.textContent = formatRupiah(totalPayment);

            hintTotal.innerHTML = "Perhitungan selesai. Tombol <strong>Simpan</strong> telah aktif.";
            hintTotal.className = "text-xs text-emerald-700 font-medium mt-1.5 block";

            // AKTIFKAN TOMBOL SIMPAN
            isCalculated = true;
            btnSave.disabled = false;
        });

        // 6. TOMBOL CANCEL: Reset Form
        btnCancel.addEventListener('click', function () {
            if (confirm('Batalkan dan reset seluruh isian formulir?')) {
                form.reset();
                roomPriceDisplay.value = '';
                totalPaymentDisplay.value = '';
                invalidateCalculation();
                
                errorCustomerName.classList.add('hidden');
                errorIdentity.classList.add('hidden');
                errorRoomType.classList.add('hidden');
                errorStayDuration.classList.add('hidden');

                customerNameInput.focus();
            }
        });

        form.addEventListener('submit', function (e) {
            if (!isCalculated || btnSave.disabled) {
                e.preventDefault();
                alert('Silakan klik tombol "Hitung Total Bayar" terlebih dahulu sebelum menyimpan data!');
                btnCalculate.focus();
            }
        });
    });
</script>
@endpush
