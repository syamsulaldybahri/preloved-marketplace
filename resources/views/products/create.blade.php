<x-app-layout>
    <div class="min-h-screen bg-white max-w-[450px] mx-auto relative border-x border-gray-100 flex flex-col shadow-2xl">
        
        <header class="p-4 flex items-center justify-between sticky top-0 bg-white z-30 border-b border-gray-100">
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="mr-3 text-black">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 12H5M12 19l-7-7 7-7"/>
                    </svg>
                </a>
                <h2 class="font-black text-2xl text-[#10B981] italic uppercase tracking-tighter">jual Produk</h2>
            </div>
            <div class="text-black">
                <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
            </div>
        </header>

        <form id="productForm" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="flex-grow space-y-4 p-4 pb-48">
            @csrf
            
            {{-- Nama Barang --}}
            <div class="bg-[#D9D9D9] p-3 flex gap-4 items-center rounded-sm">
                <div class="font-black text-2xl text-gray-700 leading-none">T<span class="text-xl">T</span></div>
                <div class="flex-grow">
                    <label class="block text-[11px] font-black text-black uppercase tracking-tight">Masukkan Nama Barang</label>
                    <input type="text" name="name" class="w-full bg-white border border-gray-300 rounded-sm py-1 px-2 text-xs font-bold mt-1 focus:ring-0" placeholder="contoh: Sepatu Converse Bekas" required>
                </div>
            </div>

            {{-- Kondisi (DIUBAH MENJADI INPUT ANGKA AGAR SESUAI CONTROLLER) --}}
            <div class="bg-[#D9D9D9] p-3 flex gap-4 items-center rounded-sm">
                <div class="text-black">
                    <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="8" y1="6" x2="21" y2="6"></line>
                        <line x1="8" y1="12" x2="21" y2="12"></line>
                        <line x1="8" y1="18" x2="21" y2="18"></line>
                        <line x1="3" y1="6" x2="3.01" y2="6"></line>
                        <line x1="3" y1="12" x2="3.01" y2="12"></line>
                        <line x1="3" y1="18" x2="3.01" y2="18"></line>
                    </svg>
                </div>
                <div class="flex-grow flex items-center justify-between">
                    <label class="text-[11px] font-black text-black uppercase tracking-tight">Kondisi Barang (%)</label>
                    <input type="number" name="condition" min="0" max="100" class="w-[80px] bg-white border border-gray-300 rounded-sm py-1 px-2 text-[10px] font-bold text-black focus:ring-0" placeholder="0-100" required>
                </div>
            </div>

            {{-- Harga --}}
            <div class="bg-[#D9D9D9] p-3 flex gap-4 items-center rounded-sm">
                <div class="text-black transform -rotate-90 scale-x-[-1]">
                    <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                        <line x1="7" y1="7" x2="7.01" y2="7"></line>
                    </svg>
                </div>
                <div class="flex-grow">
                    <label class="block text-[11px] font-black text-black uppercase tracking-tight">Masukkan harga (Rp)</label>
                    <input type="number" name="price" class="w-full bg-white border border-gray-300 rounded-sm py-1 px-2 text-xs font-bold mt-1 focus:ring-0" placeholder="contoh: 150000" required>
                </div>
            </div>

            {{-- Upload Foto --}}
            <div class="bg-[#D9D9D9] p-3 rounded-sm">
                <label class="block text-[11px] font-black text-black uppercase mb-3 tracking-tight">Upload Foto Barang</label>
                <div class="flex gap-4">
                    <div class="w-20 h-20 bg-white border border-gray-300 flex items-center justify-center relative overflow-hidden">
                        <div id="cameraIcon">
                            <svg class="w-12 h-12 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
                                <circle cx="12" cy="13" r="4"></circle>
                            </svg>
                        </div>
                        <img id="imagePreview" class="hidden absolute inset-0 w-full h-full object-cover">
                    </div>

                    <label class="w-20 h-20 bg-white border border-gray-300 flex items-center justify-center cursor-pointer">
                        <input type="file" name="image" class="hidden" accept="image/*" onchange="previewImage(this)" required>
                        <svg class="w-12 h-12 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="5" y="5" width="14" height="14" rx="1" stroke-width="2"></rect>
                            <line x1="12" y1="9" x2="12" y2="15"></line>
                            <line x1="9" y1="12" x2="15" y2="12"></line>
                        </svg>
                    </label>
                </div>
                <p class="text-[9px] mt-2 text-black italic font-medium">Maksimal 3 foto (format .jpg / .png)</p>
            </div>

            {{-- Deskripsi --}}
            <div class="bg-[#D9D9D9] p-3 rounded-sm">
                <div class="flex items-center gap-2 mb-2">
                    <svg class="w-8 h-8 text-black" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                    <label class="text-[11px] font-black text-black uppercase tracking-tight">Deskripsi Produk</label>
                </div>
                <textarea name="description" rows="4" class="w-full bg-white border border-gray-300 rounded-sm py-2 px-3 text-xs font-medium focus:ring-0" placeholder="Berikan tentang kondisi, ukuran, warna, dan info lain." required></textarea>
            </div>

            {{-- Lokasi --}}
            <div class="bg-[#D9D9D9] p-3 flex gap-4 items-center rounded-sm">
                <div class="text-black">
                    <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="10" r="3"></circle>
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                    </svg>
                </div>
                <div class="flex-grow">
                    <label class="block text-[11px] font-black text-black uppercase tracking-tight">Lokasi</label>
                    <input type="text" name="location" class="w-full bg-white border border-gray-300 rounded-sm py-1 px-2 text-xs font-bold mt-1 focus:ring-0" placeholder="Contoh : Makassar." required>
                </div>
            </div>
        </form>

        {{-- Footer Buttons --}}
        <div class="fixed bottom-[60px] left-0 right-0 max-w-[450px] mx-auto flex h-16 z-40">
            <button type="button" onclick="window.history.back()" class="w-[45%] bg-[#F9A8D4] text-black flex items-center justify-center font-serif text-3xl italic border-r border-white">
                Batal
            </button>
            <button type="submit" form="productForm" class="w-[55%] bg-[#10B981] text-white flex items-center justify-center font-serif text-3xl italic">
                Kirim Barang
            </button>
        </div>

        {{-- Navbar --}}
        <nav class="fixed bottom-0 left-0 right-0 max-w-[450px] mx-auto bg-white border-t border-gray-200 py-1 flex justify-around items-center z-50 h-[60px]">
            <a href="{{ route('dashboard') }}" class="flex flex-col items-center text-black">
                <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                <span class="text-[10px] font-black uppercase">Home</span>
            </a>
            <div class="flex flex-col items-center text-[#10B981]">
                <div class="border-[3px] border-[#10B981] rounded-full p-0.5 mb-0.5">
                    <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                </div>
                <span class="text-[10px] font-black uppercase tracking-tighter">Jual Produk</span>
            </div>
            <a href="{{ route('profile.custom') }}" class="flex flex-col items-center text-black">
                <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <span class="text-[10px] font-black uppercase">Profile</span>
            </a>
        </nav>
    </div>

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('imagePreview');
                    const icon = document.getElementById('cameraIcon');
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    icon.classList.add('hidden');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-app-layout>