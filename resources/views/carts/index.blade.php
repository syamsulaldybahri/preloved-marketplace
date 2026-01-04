<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@700;900&display=swap');
        
        .font-serif-custom {
            font-family: 'Crimson Pro', 'Times New Roman', serif;
        }

        .info-gray-card {
            background-color: #bcbcbc;
            padding: 8px;
            border-radius: 2px;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
        }

        .glossy-badge {
            background: linear-gradient(to bottom, #ffffff 0%, #e0e0e0 50%, #bcbcbc 100%);
            border: 1px solid #ffffff;
            color: #444;
            text-shadow: 0px 1px 0px rgba(255,255,255,0.5);
            box-shadow: 0 1px 2px rgba(0,0,0,0.2);
        }

        .glossy-badge-dark {
            background: linear-gradient(to bottom, #888888 0%, #555555 50%, #333333 100%);
            border: 1px solid #999999;
            color: #ffffff;
        }

        .select-active {
            color: #22C55E !important;
            fill: #22C55E !important;
        }
        
        .select-active circle { stroke: #22C55E; }
        .select-active path { stroke: white; }
    </style>

    <div class="max-w-[450px] mx-auto bg-[#F3F4F6] min-h-screen pb-40 relative">
        {{-- HEADER --}}
        <div class="bg-white px-4 py-3 flex justify-between items-center border-b sticky top-0 z-50">
            <div class="flex items-center gap-2">
                <a href="{{ route('dashboard') }}">
                    <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                <h1 class="text-[#22C55E] text-[24px] font-black tracking-tight leading-none">Keranjang</h1>
            </div>
            <div class="flex gap-1.5">
                <button class="bg-[#22C55E] text-white px-3 py-0.5 rounded-lg text-[14px] font-bold shadow-sm hover:opacity-80 active:scale-95 transition">Hapus</button>
                <button onclick="toggleEditMode()" id="btn-edit" class="bg-[#F9A8D4] text-black px-3 py-0.5 rounded-lg text-[14px] font-bold shadow-sm hover:opacity-80 transition">Edit</button>
            </div>
        </div>

        {{-- CONTENT --}}
        <div class="bg-white mt-4 px-2 py-8 shadow-sm">
            @forelse($cartItems as $item)
                <div class="flex items-start gap-1 mb-10 relative item-row">
                    
                    {{-- Ikon Plus Bulat (Fungsi Pilih Barang) --}}
                    <div class="pt-10 pr-1">
                        <button onclick="toggleSelect(this)" class="focus:outline-none">
                            <svg class="w-7 h-7 text-black transition-all duration-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <circle cx="12" cy="12" r="9" />
                                <path d="M12 8v8M8 12h8" />
                            </svg>
                        </button>
                    </div>

                    {{-- Gambar Produk --}}
                    <div class="w-28 h-28 border border-gray-300 p-0.5 shadow-md bg-white flex-shrink-0 z-10 relative">
                        <img src="{{ asset('storage/' . $item->product->image_path) }}" class="w-full h-full object-cover" alt="Produk">
                        
                        {{-- Tombol Hapus Kecil (Muncul saat Edit) --}}
                        <button class="edit-controls hidden absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center shadow-lg z-20 font-bold text-xs">X</button>
                    </div>

                    {{-- Info Produk --}}
                    <div class="flex-1 pl-2">
                        <h3 class="text-[14px] font-black uppercase text-black leading-tight mb-2 pr-2">
                            {{ $item->product->name }}
                        </h3>

                        {{-- KOTAK ABU-ABU --}}
                        <div class="info-gray-card">
                            <div class="flex items-center gap-0 mb-3 overflow-hidden rounded-full border border-gray-400">
                                <div class="flex-1 glossy-badge text-[10px] font-bold py-0.5 text-center border-r border-gray-400">Warna</div>
                                <div class="flex-1 glossy-badge-dark text-[10px] font-bold py-0.5 text-center">Ukuran</div>
                            </div>

                            <div class="flex items-center justify-between gap-1">
                                <span class="text-[#22C55E] text-[26px] font-black font-serif-custom leading-none whitespace-nowrap">
                                    Rp {{ number_format($item->product->price, 0, ',', '.') }}
                                </span>

                                {{-- Kotak Input Putih --}}
                                <div class="w-24 h-7 bg-white border border-gray-300 rounded-sm shadow-inner flex items-center justify-between px-1">
                                    <button onclick="updateQty(this, -1)" class="edit-controls hidden font-black text-gray-500 w-5">-</button>
                                    <input type="text" value="1" readonly class="qty-input w-full text-center border-none p-0 text-[12px] font-bold text-black focus:ring-0">
                                    <button onclick="updateQty(this, 1)" class="edit-controls hidden font-black text-[#22C55E] w-5">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="py-20 text-center">
                    <p class="text-gray-400 font-bold italic text-sm">Keranjang kamu masih kosong.</p>
                </div>
            @endforelse
        </div>

        {{-- BOTTOM NAVIGATION --}}
        <div class="fixed bottom-[75px] left-0 right-0 px-2 max-w-[450px] mx-auto z-50">
            <a href="{{ route('products.mine') }}" 
               class="block w-full bg-[#F9A8D4] text-black text-[30px] py-2.5 font-serif-custom font-black shadow-lg leading-tight rounded-sm text-center active:scale-95 transition-transform">
                Beli Sekarang
            </a>
        </div>
    </div>

    <script>
        // FUNGSI 1: MENGAKTIFKAN MODE EDIT (Munculkan +/- dan tombol X)
        function toggleEditMode() {
            const controls = document.querySelectorAll('.edit-controls');
            const btnEdit = document.getElementById('btn-edit');
            
            controls.forEach(el => el.classList.toggle('hidden'));

            if (btnEdit.innerText === "Edit") {
                btnEdit.innerText = "Selesai";
                btnEdit.classList.replace('bg-[#F9A8D4]', 'bg-black');
                btnEdit.classList.add('text-white');
            } else {
                btnEdit.innerText = "Edit";
                btnEdit.classList.replace('bg-black', 'bg-[#F9A8D4]');
                btnEdit.classList.remove('text-white');
            }
        }

        // FUNGSI 2: TAMBAH/KURANG JUMLAH (Hanya saat mode edit)
        function updateQty(btn, change) {
            const container = btn.closest('div');
            const input = container.querySelector('.qty-input');
            let currentVal = parseInt(input.value);
            
            if (!isNaN(currentVal)) {
                let newVal = currentVal + change;
                if (newVal < 1) newVal = 1;
                input.value = newVal;
            }
        }

        // FUNGSI 3: TOMBOL (+) BERUBAH JADI HIJAU (Pilih Barang)
        function toggleSelect(btn) {
            const icon = btn.querySelector('svg');
            icon.classList.toggle('select-active');
            
            // Logika sederhana: jika aktif, beri warna isi, jika tidak, kosongkan
            if(icon.classList.contains('select-active')) {
                icon.setAttribute('fill', '#22C55E');
            } else {
                icon.setAttribute('fill', 'none');
            }
        }
    </script>
</x-app-layout>