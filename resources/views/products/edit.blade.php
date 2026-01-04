<x-app-layout>
    <div class="min-h-screen bg-white max-w-[450px] mx-auto relative border-x border-gray-100 flex flex-col shadow-2xl font-sans pb-24">
        
        {{-- HEADER --}}
        <header class="p-4 flex items-center gap-3 sticky top-0 bg-white z-30 border-b">
            <a href="{{ route('products.mine') }}" class="text-gray-800">
                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
            </a>
            <h2 class="font-bold text-2xl text-[#22C55E]">Edit Produk</h2>
        </header>

        {{-- FORM EDIT --}}
        <main class="p-4 flex-grow">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                {{-- Preview Gambar Saat Ini --}}
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-gray-700">Foto Produk</label>
                    <div class="w-full h-48 border-2 border-dashed border-gray-300 rounded-lg overflow-hidden relative bg-gray-50 flex items-center justify-center">
                        <img id="preview" src="{{ asset('storage/' . $product->image_path) }}" class="w-full h-full object-cover">
                        <input type="file" name="image" id="imageInput" class="absolute inset-0 opacity-0 cursor-pointer" onchange="previewImage(event)">
                    </div>
                    <p class="text-[10px] text-gray-500 italic">*Klik gambar untuk mengganti foto</p>
                </div>

                {{-- Nama Produk --}}
                <div class="space-y-1">
                    <label class="block text-sm font-bold text-gray-700">Nama Produk</label>
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#22C55E] focus:ring-[#22C55E] uppercase text-sm" required>
                </div>

                {{-- Harga --}}
                <div class="space-y-1">
                    <label class="block text-sm font-bold text-gray-700">Harga (Rp)</label>
                    <input type="number" name="price" value="{{ old('price', $product->price) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#22C55E] focus:ring-[#22C55E] text-sm" required>
                </div>

                {{-- Deskripsi --}}
                <div class="space-y-1">
                    <label class="block text-sm font-bold text-gray-700">Deskripsi</label>
                    <textarea name="description" rows="3" class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#22C55E] focus:ring-[#22C55E] text-sm" required>{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    {{-- Kondisi --}}
                    <div class="space-y-1">
                        <label class="block text-sm font-bold text-gray-700">Kondisi (%)</label>
                        <input type="number" name="condition" value="{{ old('condition', $product->condition) }}" min="0" max="100" class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#22C55E] focus:ring-[#22C55E] text-sm" required>
                    </div>
                    {{-- Lokasi --}}
                    <div class="space-y-1">
                        <label class="block text-sm font-bold text-gray-700">Lokasi</label>
                        <input type="text" name="location" value="{{ old('location', $product->location) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#22C55E] focus:ring-[#22C55E] text-sm" required>
                    </div>
                </div>

                {{-- Minus/Flaws --}}
                <div class="space-y-1">
                    <label class="block text-sm font-bold text-gray-700">Minus (Kosongkan jika tidak ada)</label>
                    <input type="text" name="flaws" value="{{ old('flaws', $product->flaws) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-[#22C55E] focus:ring-[#22C55E] text-sm">
                </div>

                {{-- Tombol Submit --}}
                <div class="pt-4">
                    <button type="submit" class="w-full bg-[#22C55E] text-white font-bold py-3 rounded-lg shadow-lg hover:opacity-90 active:scale-95 transition-all uppercase">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('products.mine') }}" class="block text-center mt-3 text-gray-500 text-sm font-bold uppercase">Batal</a>
                </div>
            </form>
        </main>
    </div>

    {{-- Script untuk Preview Gambar saat diganti --}}
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('preview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</x-app-layout>