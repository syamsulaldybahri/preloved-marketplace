<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-4">
        @csrf
        @method('patch')

        {{-- INPUT NAMA --}}
        <div class="space-y-1">
            <label class="text-[10px] font-bold text-gray-400 uppercase ml-1">Nama Lengkap</label>
            <input name="name" type="text" value="{{ old('name', $user->name) }}" required
                class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-[#28A745] focus:border-[#28A745] outline-none transition shadow-sm" placeholder="Masukkan nama...">
            <x-input-error class="mt-1" :messages="$errors->get('name')" />
        </div>

        {{-- INPUT EMAIL --}}
        <div class="space-y-1">
            <label class="text-[10px] font-bold text-gray-400 uppercase ml-1">Alamat Email</label>
            <input name="email" type="email" value="{{ old('email', $user->email) }}" required
                class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-[#28A745] focus:border-[#28A745] outline-none transition shadow-sm" placeholder="Masukkan email...">
            <x-input-error class="mt-1" :messages="$errors->get('email')" />
        </div>

        {{-- INPUT LOKASI (PERBAIKAN: MENGAMBIL DATA DARI DATABASE) --}}
        <div class="space-y-1">
            <label class="text-[10px] font-bold text-gray-400 uppercase ml-1">Lokasi / Kota</label>
            <div class="relative">
                {{-- Bagian 'Makassar' sudah diganti menjadi $user->location agar dinamis --}}
                <input name="location" type="text" value="{{ old('location', $user->location) }}" 
                    class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-[#28A745] focus:border-[#28A745] outline-none transition shadow-sm" placeholder="Contoh: Jakarta, Indonesia">
                
                <div class="absolute right-4 top-3.5 text-gray-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
            </div>
            <x-input-error class="mt-1" :messages="$errors->get('location')" />
        </div>

        {{-- TOMBOL SIMPAN --}}
        <div class="pt-4">
            <button type="submit" class="w-full bg-[#28A745] text-white font-black py-4 rounded-2xl shadow-lg shadow-green-100 active:scale-95 transition-all uppercase text-[11px] tracking-widest">
                Simpan Perubahan
            </button>

            @if (session('status') === 'profile-updated')
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)" 
                   class="flex items-center justify-center gap-2 mt-4 text-green-600 font-bold text-[11px] bg-green-50 py-2 rounded-xl border border-green-100 uppercase tracking-tighter">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                    </svg>
                    Data Berhasil Disimpan
                </div>
            @endif
        </div>
    </form>
</section>