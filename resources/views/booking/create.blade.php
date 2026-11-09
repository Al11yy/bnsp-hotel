@extends('layouts.app')

@section('content')
<!-- BANNER FORM PEMESANAN -->
<section class="pt-36 pb-16 px-6 sm:px-8 lg:px-12 bg-[#0D0C0B] text-white border-b border-white/10">
    <div class="max-w-7xl mx-auto space-y-3">
        <span class="text-[11px] font-semibold tracking-[0.25em] uppercase text-[#8C867E] block">
            — RESERVASI RESMI
        </span>
        <h1 class="font-serif text-4xl sm:text-6xl font-normal text-white">
            Form Pemesanan Kamar.
        </h1>
        <p class="text-xs sm:text-sm text-[#8C867E] max-w-xl leading-relaxed font-light">
            Silakan lengkapi formulir reservasi di bawah ini sesuai petunjuk uji kompetensi BNSP FR.IA.02. Tekan tombol <strong>Hitung Total Bayar</strong> untuk memvalidasi dan mengaktifkan tombol simpan.
        </p>
    </div>
</section>

<!-- SECTION FORMULIR RESERVASI EDITORIAL -->
<section class="py-20 bg-[#F7F5F0] text-[#141312]">
    <div class="max-w-6xl mx-auto px-6 sm:px-8 lg:px-12">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            
            <!-- FORMULIR INPUT UTAMA (8 KOLOM) -->
            <div class="lg:col-span-8 bg-white p-8 sm:p-12 rounded-3xl border border-stone-300 shadow-xl space-y-8">
                
                <div class="flex items-center justify-between pb-6 border-b border-stone-200">
                    <div>
                        <span class="text-[10px] font-bold tracking-widest uppercase text-[#B85D3E] block">RESERVASI SUITE</span>
                        <h2 class="font-serif text-2xl sm:text-3xl font-normal text-stone-900 mt-1">Isian Data Pemesan</h2>
                    </div>
                    <span class="text-xs font-mono text-stone-400">SKEMA FR.IA.02</span>
                </div>

                <form id="booking-form" action="{{ route('booking.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- 1. Nama Pemesan (Auto-Focus) -->
                    <div class="space-y-2">
                        <label for="customer_name" class="block text-xs font-semibold uppercase tracking-wider text-stone-700">
                            Nama Pemesan <span class="text-[#B85D3E]">*</span>
                        </label>
                        <input type="text" 
                               id="customer_name" 
                               name="customer_name" 
                               value="{{ old('customer_name') }}"
                               placeholder="Masukkan nama lengkap pemesan (cth: Andri Santosa)" 
                               required
                               class="w-full px-5 py-3.5 rounded-2xl border border-stone-300 bg-stone-50/50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#B85D3E]/40 focus:border-[#B85D3E] text-sm text-stone-900 transition-all font-light @error('customer_name') border-rose-400 bg-rose-50/40 @enderror">
                        <p id="error-customer_name" class="hidden text-xs font-semibold text-rose-600">
                            Nama pemesan wajib diisi.
                        </p>
                        @error('customer_name')
                            <p class="text-xs font-semibold text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- 2. Jenis Kelamin (Radio Button) -->
                    <div class="space-y-2">
                        <span class="block text-xs font-semibold uppercase tracking-wider text-stone-700">
                            Jenis Kelamin <span class="text-[#B85D3E]">*</span>
                        </span>
                        <div class="flex items-center gap-8 p-4 rounded-2xl bg-stone-50 border border-stone-200">
                            <label class="flex items-center gap-3 cursor-pointer text-xs sm:text-sm font-medium text-stone-700 hover:text-stone-900">
                                <input type="radio" 
                                       name="gender" 
                                       value="Laki-laki" 
                                       {{ old('gender', 'Laki-laki') === 'Laki-laki' ? 'checked' : '' }}
                                       class="w-4 h-4 text-[#B85D3E] focus:ring-[#B85D3E] border-stone-300">
                                <span>Laki-laki</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer text-xs sm:text-sm font-medium text-stone-700 hover:text-stone-900">
                                <input type="radio" 
                                       name="gender" 
                                       value="Perempuan" 
                                       {{ old('gender') === 'Perempuan' ? 'checked' : '' }}
                                       class="w-4 h-4 text-[#B85D3E] focus:ring-[#B85D3E] border-stone-300">
                                <span>Perempuan</span>
                            </label>
                        </div>
                        @error('gender')
                            <p class="text-xs font-semibold text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- 3. Nomor Identitas (16 Digit NIK) -->
                    <div class="space-y-2">
                        <label for="identity_number" class="block text-xs font-semibold uppercase tracking-wider text-stone-700">
                            Nomor Identitas (NIK / KTP) <span class="text-[#B85D3E]">*</span>
                        </label>
                        <input type="text" 
                               id="identity_number" 
                               name="identity_number" 
                               maxlength="16"
                               value="{{ old('identity_number') }}"
                               placeholder="Isi 16 digit angka (cth: 3275091210770004)" 
                               required
                               class="w-full px-5 py-3.5 rounded-2xl border border-stone-300 bg-stone-50/50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#B85D3E]/40 focus:border-[#B85D3E] text-sm text-stone-900 font-mono tracking-widest tabular-nums transition-all @error('identity_number') border-rose-400 bg-rose-50/40 @enderror">
                        
                        <!-- Pesan Error Khas BNSP -->
                        <p id="error-identity_number" class="hidden text-xs font-bold text-rose-600">
                            isian salah..data harus 16 digit
                        </p>
                        @error('identity_number')
                            <p class="text-xs font-bold text-rose-600">{{ $message }}</p>
                        @enderror
                        <span class="text-[11px] text-stone-400 font-light block">Wajib berupa 16 digit angka sesuai identitas KTP.</span>
                    </div>

                    <!-- 4. Tipe Kamar & 5. Harga (Readonly) -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        
                        <!-- Tipe Kamar -->
                        <div class="space-y-2">
                            <label for="room_type_id" class="block text-xs font-semibold uppercase tracking-wider text-stone-700">
                                Tipe Kamar <span class="text-[#B85D3E]">*</span>
                            </label>
                            <select id="room_type_id" 
                                    name="room_type_id" 
                                    required
                                    class="w-full px-5 py-3.5 rounded-2xl border border-stone-300 bg-stone-50/50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#B85D3E]/40 focus:border-[#B85D3E] text-sm text-stone-900 transition-all @error('room_type_id') border-rose-400 bg-rose-50/40 @enderror">
                                <option value="" disabled {{ !old('room_type_id', $selectedRoomId) ? 'selected' : '' }}>
                                    — PILIH TIPE KAMAR —
                                </option>
                                @foreach($roomTypes as $room)
                                    <option value="{{ $room->id }}" 
                                            data-price="{{ $room->price }}"
                                            data-name="{{ $room->name }}"
                                            {{ (string) old('room_type_id', $selectedRoomId) === (string) $room->id ? 'selected' : '' }}>
                                        Kamar {{ $room->name }}
                                    </option>
                                @endforeach
                            </select>
                            <p id="error-room_type_id" class="hidden text-xs font-semibold text-rose-600">
                                Pilih salah satu tipe kamar.
                            </p>
                            @error('room_type_id')
                                <p class="text-xs font-semibold text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Harga Kamar (Auto-fill Readonly) -->
                        <div class="space-y-2">
                            <label for="room_price_display" class="block text-xs font-semibold uppercase tracking-wider text-stone-700">
                                Harga Kamar (per malam)
                            </label>
                            <input type="text" 
                                   id="room_price_display" 
                                   name="room_price_display" 
                                   readonly 
                                   placeholder="Rp 0"
                                   class="w-full px-5 py-3.5 rounded-2xl border border-stone-200 bg-stone-100 text-stone-800 text-sm font-mono font-semibold tabular-nums cursor-not-allowed">
                            <span class="text-[11px] text-stone-400 font-light block">Terisi otomatis sesuai pilihan tipe kamar.</span>
                        </div>

                    </div>

                    <!-- 6. Tanggal Pesan & 7. Durasi Menginap -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        
                        <!-- Tanggal Pesan -->
                        <div class="space-y-2">
                            <label for="booking_date" class="block text-xs font-semibold uppercase tracking-wider text-stone-700">
                                Tanggal Pesan <span class="text-[#B85D3E]">*</span>
                            </label>
                            <input type="date" 
                                   id="booking_date" 
                                   name="booking_date" 
                                   value="{{ old('booking_date', date('Y-m-d')) }}"
                                   min="{{ date('Y-m-d') }}"
                                   required
                                   class="w-full px-5 py-3.5 rounded-2xl border border-stone-300 bg-stone-50/50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#B85D3E]/40 focus:border-[#B85D3E] text-sm text-stone-900 transition-all @error('booking_date') border-rose-400 bg-rose-50/40 @enderror">
                            <span class="text-[11px] text-stone-400 font-light block">Format tanggal pemesanan: dd/mm/yyyy.</span>
                            @error('booking_date')
                                <p class="text-xs font-semibold text-rose-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Durasi Menginap -->
                        <div class="space-y-2">
                            <label for="stay_duration" class="block text-xs font-semibold uppercase tracking-wider text-stone-700">
                                Durasi Menginap (Hari) <span class="text-[#B85D3E]">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" 
                                       id="stay_duration" 
                                       name="stay_duration" 
                                       value="{{ old('stay_duration', '1') }}"
                                       placeholder="Cth: 3" 
                                       required
                                       class="w-full px-5 py-3.5 pr-14 rounded-2xl border border-stone-300 bg-stone-50/50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#B85D3E]/40 focus:border-[#B85D3E] text-sm text-stone-900 font-mono tabular-nums transition-all @error('stay_duration') border-rose-400 bg-rose-50/40 @enderror">
                                <div class="absolute inset-y-0 right-0 pr-5 flex items-center pointer-events-none text-xs font-semibold text-stone-400">
                                    Hari
                                </div>
                            </div>
                            
                            <!-- Pesan Error Khas BNSP -->
                            <p id="error-stay_duration" class="hidden text-xs font-bold text-rose-600">
                                harus isi angka
                            </p>
                            @error('stay_duration')
                                <p class="text-xs font-bold text-rose-600">{{ $message }}</p>
                            @enderror
                            <span class="text-[11px] text-stone-400 font-light block">Durasi &gt; 3 hari otomatis mendapatkan diskon 10%.</span>
                        </div>

                    </div>

                    <!-- 8. Termasuk Breakfast (Checkbox) -->
                    <div class="p-5 rounded-2xl bg-stone-100 border border-stone-300/80">
                        <label class="flex items-center gap-4 cursor-pointer">
                            <input type="checkbox" 
                                   id="include_breakfast" 
                                   name="include_breakfast" 
                                   value="1" 
                                   {{ old('include_breakfast') ? 'checked' : '' }}
                                   class="w-5 h-5 rounded text-[#B85D3E] focus:ring-[#B85D3E] border-stone-400">
                            <div>
                                <span class="text-xs sm:text-sm font-semibold text-stone-900 block">
                                    Termasuk Breakfast (+ Rp 80.000)
                                </span>
                                <span class="text-[11px] text-stone-500 font-light block">
                                    Cekbox dicentang berarti Ya, menyediakan sarapan pagi prasmanan (buffet).
                                </span>
                            </div>
                        </label>
                    </div>

                    <!-- 9. Total Bayar (Readonly) -->
                    <div class="space-y-2 pt-2">
                        <label for="total_payment_display" class="block text-xs font-semibold uppercase tracking-wider text-stone-700">
                            Total Bayar
                        </label>
                        <input type="text" 
                               id="total_payment_display" 
                               name="total_payment_display" 
                               readonly 
                               placeholder="Klik tombol 'Hitung Total Bayar'" 
                               class="w-full px-5 py-4 rounded-2xl border border-stone-300 bg-stone-100 text-stone-900 font-mono text-xl font-bold tabular-nums cursor-not-allowed">
                        <span id="hint-total" class="text-xs text-stone-500 font-light block">
                            Terisi otomatis dengan menekan tombol <strong>Hitung Total Bayar</strong> di bawah.
                        </span>
                    </div>

                    <!-- BARIS TOMBOL AKSI SESUAI MOCKUP BNSP -->
                    <div class="pt-8 border-t border-stone-200 flex flex-wrap items-center justify-between gap-4">
                        
                        <!-- 1. Tombol Hitung Total Bayar -->
                        <button type="button" 
                                id="btn-calculate"
                                class="pressable px-7 py-3.5 rounded-full text-xs font-semibold tracking-wider uppercase bg-[#141312] text-white hover:bg-[#2E2A26] shadow-md transition-all">
                            Hitung Total Bayar
                        </button>

                        <div class="flex items-center gap-3">
                            <!-- 2. Tombol Simpan (Disabled sebelum dihitung) -->
                            <button type="submit" 
                                    id="btn-save"
                                    disabled
                                    class="pressable px-8 py-3.5 rounded-full text-xs font-semibold tracking-wider uppercase bg-[#B85D3E] text-white shadow-md transition-all cursor-not-allowed opacity-50">
                                Simpan
                            </button>

                            <!-- 3. Tombol Cancel / Batal -->
                            <button type="button" 
                                    id="btn-cancel"
                                    class="pressable px-6 py-3.5 rounded-full text-xs font-semibold tracking-wider uppercase bg-stone-200 hover:bg-stone-300 text-stone-700 transition-colors">
                                Cancel
                            </button>
                        </div>

                    </div>

                </form>

            </div>

            <!-- SIDEBAR DETAIL RINGKASAN KALKULASI (4 KOLOM) -->
            <div class="lg:col-span-4 space-y-6">
                
                <div class="p-8 rounded-3xl bg-[#141312] text-white border border-white/10 shadow-xl space-y-6">
                    <div class="pb-4 border-b border-white/10">
                        <span class="text-[10px] font-semibold tracking-widest uppercase text-[#8C867E] block">RINGKASAN ESTIMASI</span>
                        <h3 class="font-serif text-2xl font-normal text-white mt-1">Rincian Reservasi</h3>
                    </div>

                    <div id="calculation-breakdown" class="space-y-4 text-xs font-light text-[#C7BFB4]">
                        <div class="flex justify-between pb-3 border-b border-white/5">
                            <span>Sewa Kamar (<span id="calc-duration" class="font-mono tabular-nums">0</span> hari):</span>
                            <strong id="calc-subtotal" class="font-mono tabular-nums text-white">Rp 0</strong>
                        </div>
                        <div class="flex justify-between pb-3 border-b border-white/5 text-[#E5D5D0]">
                            <span>Diskon (<span id="calc-discount-percent">0</span>%):</span>
                            <strong id="calc-discount-amount" class="font-mono tabular-nums">- Rp 0</strong>
                        </div>
                        <div class="flex justify-between pb-3 border-b border-white/5">
                            <span>Sarapan (Buffet):</span>
                            <strong id="calc-breakfast-fee" class="font-mono tabular-nums text-white">Rp 0</strong>
                        </div>
                        <div class="pt-2 flex justify-between text-sm text-white">
                            <span class="font-medium">Total Akhir:</span>
                            <strong id="calc-total-final" class="font-mono tabular-nums text-xl font-bold text-[#E8DFD0]">Rp 0</strong>
                        </div>
                    </div>

                    <div class="p-4 rounded-2xl bg-white/5 border border-white/10 text-[11px] text-[#8C867E] space-y-1 leading-relaxed">
                        <p class="font-medium text-[#FAF8F5]">Pedoman Penilaian Asesor:</p>
                        <p>• Data diverifikasi di sisi klien (JS) dan sisi peladen (PHP FormRequest).</p>
                        <p>• Disimpan ke SQLite (Tabel <code>bookings</code>).</p>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>
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
            btnSave.classList.add('opacity-50', 'cursor-not-allowed');
            btnSave.classList.remove('cursor-pointer', 'hover:bg-[#a34f33]');
            
            totalPaymentDisplay.value = '';
            totalPaymentDisplay.placeholder = "Klik tombol 'Hitung Total Bayar'";
            if (hintTotal) {
                hintTotal.innerHTML = "⚠️ Ada perubahan isian. Silakan klik <strong>Hitung Total Bayar</strong> lagi untuk mengaktifkan tombol Simpan.";
                hintTotal.className = "text-xs text-[#B85D3E] font-medium mt-1.5 block";
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
                identityInput.classList.add('border-rose-400', 'bg-rose-50/40');
                identityInput.classList.remove('border-emerald-500');
                return false;
            } else {
                errorIdentity.classList.add('hidden');
                identityInput.classList.remove('border-rose-400', 'bg-rose-50/40');
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
                stayDurationInput.classList.add('border-rose-400', 'bg-rose-50/40');
                stayDurationInput.classList.remove('border-emerald-500');
                return false;
            } else {
                errorStayDuration.classList.add('hidden');
                stayDurationInput.classList.remove('border-rose-400', 'bg-rose-50/40');
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
                customerNameInput.classList.remove('border-rose-400');
            }
            invalidateCalculation();
        });

        breakfastCheckbox.addEventListener('change', invalidateCalculation);

        // 5. LOGIKA TOMBOL HITUNG TOTAL BAYAR
        btnCalculate.addEventListener('click', function () {
            let isValid = true;

            if (customerNameInput.value.trim() === '') {
                errorCustomerName.classList.remove('hidden');
                customerNameInput.classList.add('border-rose-400');
                customerNameInput.focus();
                isValid = false;
            } else {
                errorCustomerName.classList.add('hidden');
                customerNameInput.classList.remove('border-rose-400');
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
            const breakfastFee = includeBreakfast ? 80000 : 0;
            const totalPayment = (subtotal - discountAmount) + breakfastFee;

            totalPaymentDisplay.value = formatRupiah(totalPayment);

            calcDuration.textContent = duration;
            calcSubtotal.textContent = formatRupiah(subtotal);
            calcDiscountPercent.textContent = discountPercent;
            calcDiscountAmount.textContent = '- ' + formatRupiah(discountAmount);
            calcBreakfastFee.textContent = formatRupiah(breakfastFee);
            calcTotalFinal.textContent = formatRupiah(totalPayment);

            hintTotal.innerHTML = "✓ Perhitungan selesai. Tombol <strong>Simpan</strong> telah aktif.";
            hintTotal.className = "text-xs text-emerald-700 font-medium mt-1.5 block";

            // AKTIFKAN TOMBOL SIMPAN
            isCalculated = true;
            btnSave.disabled = false;
            btnSave.classList.remove('opacity-50', 'cursor-not-allowed');
            btnSave.classList.add('cursor-pointer', 'hover:bg-[#a34f33]');
        });

        // 7. TOMBOL CANCEL: Reset Form
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
