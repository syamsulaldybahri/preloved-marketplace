<x-app-layout>
    <div class="min-h-screen bg-[#F8F9FA] max-w-[450px] mx-auto relative border-x border-gray-100 flex flex-col shadow-2xl font-sans pb-24">
        
        {{-- HEADER --}}
        <header class="p-4 flex items-center gap-3 sticky top-0 bg-white z-30">
            {{-- PERBAIKAN: Route diarahkan ke profile.custom agar kembali ke halaman Profile utama --}}
            <a href="{{ route('profile.custom') }}" class="text-gray-800 hover:text-[#28A745] transition-colors">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
            </a>
            <h2 class="font-bold text-2xl text-[#28A745]">Notifikasi</h2>
        </header>

        {{-- DAFTAR NOTIFIKASI --}}
        <main class="flex-grow p-4 space-y-4">
            
            {{-- Notifikasi Pesanan --}}
            <div class="bg-white p-4 rounded-xl shadow-sm border-l-4 border-orange-500 flex gap-3">
                <div class="bg-orange-100 p-2 rounded-full h-fit">
                    <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-gray-800">Pesanan Diproses</p>
                    <p class="text-xs text-gray-600">Barang <span class="font-semibold text-[#28A745]">Sepatu Nike</span> sedang disiapkan oleh penjual.</p>
                    <p class="text-[10px] text-gray-400 mt-2">10 Menit yang lalu</p>
                </div>
            </div>

            {{-- Notifikasi Like --}}
            <div class="bg-white p-4 rounded-xl shadow-sm border-l-4 border-pink-500 flex gap-3">
                <div class="bg-pink-100 p-2 rounded-full h-fit">
                    <svg class="w-5 h-5 text-pink-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-gray-800">Produk Disukai</p>
                    <p class="text-xs text-gray-600">Seseorang menyukai produk <span class="font-semibold text-[#28A745]">Sepatu Nike</span> Anda.</p>
                    <p class="text-[10px] text-gray-400 mt-2">2 Jam yang lalu</p>
                </div>
            </div>

        </main>
    </div>
</x-app-layout>