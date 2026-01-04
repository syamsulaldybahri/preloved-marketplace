<x-app-layout>
    <div class="min-h-screen bg-white max-w-[450px] mx-auto relative border-x border-gray-100 flex flex-col shadow-2xl pb-24 font-sans">

        {{-- HEADER --}}
        <header class="p-4 flex items-center justify-between sticky top-0 bg-white z-30 border-b">
            <div class="flex items-center gap-3">
                <a href="{{ route('profile.custom') }}" class="text-gray-800">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 12H5M12 19l-7-7 7-7"/>
                    </svg>
                </a>
                <h2 class="font-bold text-2xl text-[#22C55E]">Produk Saya</h2>
            </div>

            <a href="{{ route('cart.index') }}" class="text-gray-800">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4
                        M7 13L5.4 5M7 13l-2.293 2.293
                        c-.63.63-.184 1.707.707 1.707H17
                        m0 0a2 2 0 100 4 2 2 0 000-4
                        zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </a>
        </header>

        {{-- MAIN CONTENT --}}
        <main class="flex-grow p-2 space-y-4">
            @forelse($myProducts as $product)
                <div class="flex gap-3 p-2 border-b border-gray-100">

                    {{-- Gambar --}}
                    <div class="w-28 h-28 shrink-0 border border-gray-300 shadow-sm overflow-hidden bg-white">
                        <img src="{{ asset('storage/' . $product->image_path) }}"
                             class="w-full h-full object-cover"
                             alt="{{ $product->name }}">
                    </div>

                    <div class="flex-1 flex flex-col">

                        {{-- Nama Produk --}}
                        <h3 class="font-bold text-[14px] text-black leading-tight mb-2 uppercase">
                            {{ $product->name }}
                        </h3>

                        {{-- INFO BOX (SUDAH DITEBALIN RAPI) --}}
                        <div class="bg-[#D1D5DB] p-2 rounded-sm shadow-inner">
                            <div class="text-[11px] text-gray-800 leading-tight space-y-0.5 font-['Times_New_Roman'] font-semibold">
                                <p>
                                    <span class="font-bold">Harga:</span>
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </p>

                                <p>
                                    <span class="font-bold">Kondisi:</span>
                                    {{ $product->condition }}% Mulus
                                </p>

                                <p>
                                    <span class="font-bold">Status:</span>
                                    <span class="font-bold {{ $product->status == 'Terjual' ? 'text-black-600' : 'text-black-600' }}">
                                        {{ $product->status ?? 'Tersedia' }}
                                    </span>
                                </p>
                            </div>
                        </div>

                        {{-- AKSI --}}
                        <div class="flex justify-between items-center mt-2">

                            {{-- LOVE --}}
                            <svg class="w-5 h-5 text-red-700 cursor-pointer"
                                 fill="none"
                                 stroke="currentColor"
                                 stroke-width="3.5"
                                 viewBox="0 0 24 24"
                                 stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06
                                         a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06
                                         L12 21.23l7.78-7.78 1.06-1.06
                                         a5.5 5.5 0 0 0 0-7.78z"/>
                            </svg>

                            <div class="flex gap-2">

                                {{-- Hapus --}}
                                <form action="{{ route('products.destroy', $product->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="bg-[#22C55E] text-white text-[10px] px-4 py-0.5 rounded shadow-sm font-bold uppercase active:scale-95 transition">
                                        Hapus
                                    </button>
                                </form>

                                {{-- Edit --}}
                                @if($product->status !== 'Terjual')
                                    <a href="{{ route('products.edit', $product->id) }}"
                                       class="bg-[#F9A8D4] text-black text-[10px] px-4 py-0.5 rounded shadow-sm font-bold uppercase border border-gray-300 flex items-center active:scale-95 transition">
                                        Edit
                                    </a>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-20 text-gray-400 font-bold italic text-sm">
                    Belum ada barang yang Anda jual.
                </div>
            @endforelse
        </main>

    </div>
</x-app-layout>
