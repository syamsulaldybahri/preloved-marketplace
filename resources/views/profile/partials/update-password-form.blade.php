<section>
    <form method="post" action="{{ route('password.update') }}" class="space-y-4">
        @csrf
        @method('put')

        {{-- PASSWORD SAAT INI --}}
        <div class="space-y-1">
            <label class="text-[10px] font-bold text-black-400 uppercase ml-1">Kata Sandi Saat Ini</label>
            <input name="current_password" type="password" placeholder="••••••••"
                class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-[#28A745] focus:border-transparent outline-none transition shadow-sm">
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-1" />
        </div>

        {{-- PASSWORD BARU --}}
        <div class="space-y-1">
            <label class="text-[10px] font-bold text-black-400 uppercase ml-1">Kata Sandi Baru</label>
            <input name="password" type="password" placeholder="Masukan sandi baru"
                class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-[#28A745] focus:border-transparent outline-none transition shadow-sm">
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-1" />
        </div>

        {{-- KONFIRMASI PASSWORD --}}
        <div class="space-y-1">
            <label class="text-[10px] font-bold text-black-400 uppercase ml-1">Ulangi Kata Sandi Baru</label>
            <input name="password_confirmation" type="password" placeholder="Ulangi sandi baru"
                class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-[#28A745] focus:border-transparent outline-none transition shadow-sm">
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-1" />
        </div>

        {{-- TOMBOL UPDATE --}}
        <div class="pt-2 flex items-center gap-4">
            <button type="submit" class="w-full bg-[#28A745] text-white font-black py-3.5 rounded-xl shadow-lg shadow-green-100 active:scale-95 transition-all uppercase text-xs tracking-widest">
                Simpan Kata Sandi
            </button>
        </div>

        @if (session('status') === 'password-updated')
            <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)" 
                class="bg-green-50 text-green-600 text-center py-2 rounded-lg text-xs font-bold border border-green-100 animate-pulse">
                ✓ Kata sandi berhasil diperbarui!
            </div>
        @endif
    </form>
</section>