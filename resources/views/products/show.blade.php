<x-app-layout>
    {{-- 1. HEADER --}}
    <div class="sticky top-0 bg-white z-40 px-4 pt-5 pb-3 border-b flex justify-between items-center">
        <div class="flex items-center gap-3">
            <a href="{{ route('dashboard') }}" class="text-black">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                    <path d="M15 19l-7-7 7-7"></path>
                </svg>
            </a>
            <h1 class="text-[22px] font-[1000] text-[#10B981] tracking-tight">Detail Produk</h1>
        </div>
        <a href="{{ route('cart.index') }}">
            <svg class="w-9 h-9 text-black" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
            </svg>
        </a>
    </div>

    {{-- 2. KONTEN UTAMA --}}
    <div class="px-5 mt-6 pb-60">
        <h2 class="text-[28px] font-[1000] leading-tight mb-4 text-black tracking-tighter">
            {{ $product->name }}
        </h2>

        <div class="flex gap-4 items-start">
            {{-- KOLOM KIRI --}}
            <div class="w-[55%] flex flex-col">
                <p class="text-[13px] text-gray-500 font-medium leading-[1.5] text-justify mb-6" style="font-family: 'Times New Roman', serif;">
                    {{ $product->description }}
                </p>

                <div class="space-y-4">
                    {{-- LOKASI --}}
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span class="text-[15px] text-black" style="font-family: 'Times New Roman', serif;">Lokasi : Makassar</span>
                    </div>

                    {{-- KONDISI --}}
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        <span class="text-[15px] text-black" style="font-family: 'Times New Roman', serif;">Kondisi : {{ $product->condition }}% Mulus</span>
                    </div>
                    
                    {{-- RATING --}}
                    <p class="text-[14px] text-gray-800 italic ml-1" style="font-family: 'Times New Roman', serif;">Rating 4/5</p>
                </div>
            </div>

            {{-- KOLOM KANAN --}}
            <div class="w-[45%] flex flex-col items-center">
                <div class="relative w-full aspect-square bg-gray-100 rounded-lg overflow-hidden border-2 border-gray-100 shadow-md">
                    <img src="{{ asset('storage/' . $product->image_path) }}" class="w-full h-full object-cover scale-110">
                    <div class="absolute top-2 right-2">
                        <svg class="w-8 h-8 text-red-500 fill-none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                            <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <span class="text-[#10B981] font-[1000] text-[26px] tracking-tighter">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    {{-- 3. TOMBOL AKSI --}}
    <div class="fixed bottom-[72px] left-1/2 -translate-x-1/2 w-full max-w-[450px] z-40 flex h-20">
        {{-- FORM BELI SEKARANG (DENGAN TAMPILAN TETAP) --}}
        <form action="{{ route('transactions.store', $product->id) }}" method="POST" class="w-1/2">
            @csrf
            <button type="submit" class="w-full h-full bg-[#F9A8D4] text-black text-[22px] flex items-center justify-center" style="font-family: 'Times New Roman', serif;">
                Beli Sekarang
            </button>
        </form>

        {{-- FORM TAMBAH KERANJANG --}}
        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="w-1/2">
            @csrf
            <button type="submit" class="w-full h-full bg-[#10B981] text-white text-[18px] px-2 leading-tight" style="font-family: 'Times New Roman', serif;">
                Tambah ke Keranjang
            </button>
        </form>
    </div>
</x-app-layout>