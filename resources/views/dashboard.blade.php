<x-app-layout>

    {{-- HEADER & SEARCH --}}
    <div class="sticky top-0 bg-white z-40 px-4 pt-4 pb-2">
        <div class="flex justify-between items-center mb-4">
            {{-- 1. Header: Modern Sans Serif (Sama dengan Judul Produk) --}}
            <h1 class="text-[22px] font-[900] uppercase italic tracking-tighter text-black leading-none" 
                style="font-family: 'Inter', 'Roboto', sans-serif;">
                Preloved Market
            </h1>
            <a href="{{ route('cart.index') }}">
                <svg class="w-9 h-9 text-black" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
            </a>
        </div>

        <div class="relative flex items-center bg-white border border-gray-200 rounded-sm px-3 py-2">
            <svg class="w-5 h-5 text-black mr-2" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <input type="text" placeholder="Cari barang preloved" class="w-full bg-transparent border-none focus:ring-0 text-[14px] p-0 font-medium placeholder-gray-300" 
                style="font-family: 'Inter', sans-serif;">
        </div>
    </div>

    {{-- BANNER PINK --}}
    <div class="px-4 mt-2">
        <div class="bg-[#F9A8D4] border border-[#F472B6] px-3 py-2 flex items-center gap-2 rounded-sm">
            <div class="bg-black p-1 rounded-sm flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path>
                    <path d="M3 6h18"></path>
                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                </svg>
            </div>
            <p class="text-[12px] font-bold text-black tracking-tight leading-tight" 
                style="font-family: 'Inter', sans-serif;">
                Temukan Barang Impianmu dengan Harga Murah!
            </p>
        </div>
    </div>

    {{-- LIST PRODUK --}}
    <div class="px-4 mt-8 space-y-10 pb-24">
        @forelse($products as $product)
            {{-- AREA KLIK: Membungkus seluruh kartu produk agar bisa ke halaman DETAIL --}}
            <a href="{{ route('products.show', $product->id) }}" class="block active:opacity-70 transition-opacity">
                <div class="bg-white">
                    {{-- 2. Judul Produk: Font Disamakan dengan Header --}}
                    <h2 class="text-[20px] font-[900] uppercase italic tracking-tighter leading-none mb-3 text-black" 
                        style="font-family: 'Inter', 'Roboto', sans-serif;">
                        {{ $product->name }}
                    </h2>

                    <div class="flex gap-4">
                        {{-- KOLOM KIRI: DESKRIPSI & INFO --}}
                        <div class="w-[55%] flex flex-col justify-between">
                            {{-- 3. Deskripsi: Serif Klasik (Times New Roman) --}}
                            <p class="text-[13px] text-gray-400 font-medium leading-[1.3] text-justify" 
                                style="font-family: 'Times New Roman', Times, serif;">
                                {{ $product->description }}
                            </p>

                            <div class="mt-4 space-y-2">
                                {{-- Lokasi --}}
                                <div class="flex items-center gap-2">
                                    <svg class="w-7 h-7 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                    <span class="text-[14px] font-bold text-black tracking-tight" 
                                        style="font-family: 'Times New Roman', Times, serif;">Lokasi : {{ $product->location }}</span>
                                </div>

                                {{-- Kondisi --}}
                                <div class="flex items-center gap-2">
                                    <svg class="w-7 h-7 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                    </svg>
                                    <span class="text-[14px] font-bold text-black tracking-tight" 
                                        style="font-family: 'Times New Roman', Times, serif;">Kondisi : {{ $product->condition }}% Mulus
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- KOLOM KANAN: GAMBAR & HARGA --}}
                        <div class="w-[45%]">
                            <div class="relative w-full aspect-square bg-[#EDEDED] rounded-sm overflow-hidden shadow-sm">
                                <img src="{{ asset('storage/' . $product->image_path) }}" class="w-full h-full object-cover">
                                
                                {{-- SISTEM LIKE: Menggunakan Alpine.js agar bisa diklik --}}
                                <div x-data="{ liked: false }" class="absolute top-2 right-2 z-50">
                                    <button type="button" 
                                            @click.stop.prevent="liked = !liked" 
                                            class="focus:outline-none transition-transform active:scale-125">
                                        <svg class="w-8 h-8 text-[#FF0000] transition-colors duration-200" 
                                             :class="liked ? 'fill-current' : 'fill-none'"
                                             stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l8.84-8.84 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            {{-- 4. Harga: Bulat & Bold Sans Serif (Arial/Montserrat style) --}}
                            <div class="mt-2 flex justify-center">
                                <span class="text-[#10B981] font-[1000] text-[24px] italic tracking-tighter leading-none" 
                                    style="font-family: 'Arial', 'Montserrat', sans-serif;">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @empty
            <div class="text-center py-20 text-gray-400 italic" style="font-family: 'Times New Roman', serif;">Kosong...</div>
        @endforelse
    </div>

</x-app-layout>