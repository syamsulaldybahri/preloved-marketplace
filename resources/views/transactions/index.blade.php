<x-app-layout>
    <div class="min-h-screen bg-[#F3F4F6] max-w-[450px] mx-auto relative border-x border-gray-200 flex flex-col shadow-2xl pb-24 font-sans">
        
        {{-- HEADER --}}
        <header class="p-4 flex items-center gap-4 sticky top-0 bg-white/80 backdrop-blur-md z-30 border-b border-gray-100">
            <a href="{{ route('profile.custom') }}" class="p-2 hover:bg-gray-100 rounded-full transition text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <h2 class="font-extrabold text-xl text-[#10B981] tracking-tight">Riwayat Transaksi</h2>
        </header>

        <main class="p-4 space-y-3">
            @forelse($transactions as $trx)
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 transition active:scale-[0.98]">
                    {{-- Bagian Atas: Tanggal & Status --}}
                    <div class="px-4 py-2.5 bg-gray-50/50 flex justify-between items-center border-b border-gray-50">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                            <span class="text-[11px] font-bold text-gray-500">{{ $trx->created_at->format('d M Y') }}</span>
                        </div>
                        <span class="text-[10px] px-2.5 py-1 rounded-lg font-black uppercase tracking-wider 
                            {{ $trx->status == 'Selesai' ? 'bg-green-100 text-green-600' : 'bg-orange-100 text-orange-600' }}">
                            {{ $trx->status }}
                        </span>
                    </div>

                    {{-- Bagian Tengah: Info Produk --}}
                    <div class="p-4 flex gap-4">
                        <div class="relative">
                            <img src="{{ asset('storage/' . $trx->product->image_path) }}" 
                                 class="w-20 h-20 object-cover rounded-xl shadow-inner border border-gray-100">
                        </div>
                        
                        <div class="flex-1 flex flex-col justify-center">
                            <h3 class="font-black text-sm text-gray-800 leading-tight line-clamp-1 uppercase">{{ $trx->product->name }}</h3>
                            <p class="text-gray-400 text-[11px] mt-1 italic">1 Barang</p>
                            
                            <div class="mt-2 flex justify-between items-end">
                                <div>
                                    <p class="text-[10px] text-gray-400 leading-none">Total Belanja</p>
                                    <p class="text-[16px] font-black text-[#10B981]">Rp {{ number_format($trx->total_price, 0, ',', '.') }}</p>
                                </div>
                                {{-- Waktu Transaksi --}}
                                <span class="text-[10px] text-gray-300 font-medium">{{ $trx->created_at->format('H:i') }} WITA</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="flex flex-col items-center justify-center py-32 px-10 text-center">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                    </div>
                    <h3 class="text-gray-900 font-bold">Belum Ada Transaksi</h3>
                    <p class="text-gray-400 text-sm mt-1">Sepertinya kamu belum belanja apa pun hari ini.</p>
                </div>
            @endforelse
        </main>
    </div>
</x-app-layout>