<x-app-layout>
    <div class="min-h-screen bg-[#F8F9FA] max-w-[450px] mx-auto relative border-x border-gray-100 flex flex-col shadow-2xl pb-24 font-sans">
        
        {{-- HEADER: Lebih rapi dengan bayangan tipis --}}
        <header class="p-4 flex items-center justify-between sticky top-0 bg-white z-30 border-b border-gray-100">
            <div class="flex items-center gap-3">
                <a href="{{ route('profile.custom') }}" class="text-gray-800 hover:text-[#28A745] transition">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 12H5M12 19l-7-7 7-7"/>
                    </svg>
                </a>
                <h2 class="font-bold text-xl text-[#28A745]">Keamanan Akun</h2>
            </div>
        </header>

        <main class="p-5 flex-grow">
            {{-- BOX UTAMA: Menggunakan warna abu-abu yang sangat soft agar terlihat bersih --}}
            <div class="bg-[#F1F3F5] p-5 rounded-2xl border border-gray-200">
                
                {{-- Judul Kecil di Dalam Box --}}
                <div class="mb-4">
                    <h3 class="text-sm font-black text-gray-800 uppercase tracking-wide">Ubah Kata Sandi</h3>
                    <p class="text-[10px] text-gray-500 mt-1 uppercase">Gunakan minimal 8 karakter kombinasi angka dan huruf.</p>
                </div>

                {{-- Card Putih Tempat Form --}}
                <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                    @include('profile.partials.update-password-form')
                </div>

                {{-- Info Keamanan --}}
                <div class="mt-4 flex items-start gap-2 px-1">
                    <svg class="w-4 h-4 text-[#28A745] shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                    <p class="text-[10px] text-gray-600 leading-tight">
                        Sistem kami akan mengenali jika ada aktivitas mencurigakan pada akun Anda.
                    </p>
                </div>
            </div>
        </main>

        {{-- Spasi bawah untuk navigasi bar jika ada --}}
        <div class="h-10"></div>
    </div>
</x-app-layout>