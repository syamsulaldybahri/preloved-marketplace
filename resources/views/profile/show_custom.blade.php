<x-app-layout>
    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-2xl shadow-sm mb-6 flex items-center gap-6">
                <div class="w-24 h-24 bg-blue-500 rounded-full flex items-center justify-center text-white text-4xl font-bold">
                    {{ substr($user->name, 0, 1) }}
                </div>
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-900">{{ $user->name }}</h1>
                    <p class="text-gray-500">{{ $user->email }}</p>
                    <div class="mt-2 inline-block bg-blue-100 text-blue-700 px-3 py-1 rounded-lg text-sm font-semibold">
                        Penjual Terverifikasi
                    </div>
                </div>
            </div>

            <h2 class="text-2xl font-bold mb-4 text-gray-800">Barang Yang Saya Jual</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($myProducts as $product)
                <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition">
                    <img src="{{ asset('storage/' . $product->image_path) }}" class="h-48 w-full object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-lg truncate">{{ $product->name }}</h3>
                        <p class="text-blue-600 font-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <div class="mt-2 flex justify-between items-center text-xs">
                            <span class="bg-gray-100 px-2 py-1 rounded">{{ $product->condition }}</span>
                            <span class="text-gray-400">Stok: {{ $product->stock }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>