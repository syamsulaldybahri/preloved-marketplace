<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Preloved - Barang Bekas</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,800&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased bg-white text-slate-900 font-[Figtree]">

    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-gray-100">
        <div class="flex justify-between items-center p-5 max-w-7xl mx-auto">
            <div class="flex items-center gap-2">
                <div class="bg-[#10B981] p-2 rounded-xl shadow-lg shadow-emerald-100">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
                <span class="text-2xl font-black tracking-tighter text-slate-800 uppercase italic">PRE<span class="text-[#10B981]">LOVED</span></span>
            </div>

            <div class="flex gap-3">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-6 py-2.5 bg-slate-900 text-white rounded-2xl font-bold text-sm transition hover:bg-slate-800">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="px-6 py-2.5 text-slate-600 font-bold text-sm hover:text-[#10B981] transition">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-6 py-2.5 bg-pink-500 hover:bg-pink-600 text-white rounded-2xl font-bold text-sm transition shadow-lg shadow-pink-100">Daftar</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <main class="relative min-h-[90vh] flex flex-col items-center justify-center text-center px-6 overflow-hidden">
        <div class="absolute top-1/2 left-1/4 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-emerald-100/50 blur-[120px] rounded-full"></div>
        <div class="absolute top-1/2 left-3/4 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-pink-100/50 blur-[120px] rounded-full"></div>

        <div class="relative z-10">
            <div class="inline-block px-4 py-1.5 bg-emerald-50 text-[#10B981] text-xs font-black rounded-full uppercase tracking-widest mb-6">
                ✨ Marketplace Barang Bekas.
            </div>
            
            <h1 class="text-6xl md:text-8xl font-black mb-8 tracking-tighter text-slate-900 leading-[0.9]">
                Cari Barang <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#10B981] via-pink-500 to-pink-600">Bekas Berkualitas.</span>
            </h1>
            
            <p class="text-slate-500 text-lg md:text-xl max-w-2xl mx-auto mb-12 leading-relaxed font-medium">
                Beri kesempatan kedua untuk barang yang tak terpakai. <span class="text-[#10B981] font-bold">Hemat uang</span>, kurangi limbah, dan temukan harta karunmu di sini.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('register') }}" class="px-12 py-5 bg-[#10B981] hover:bg-emerald-600 text-white shadow-2xl shadow-emerald-200 rounded-3xl font-black text-lg transition-all hover:scale-105 active:scale-95 uppercase tracking-tight">
                    Mulai Belanja
                </a>
                <a href="{{ route('login') }}" class="px-12 py-5 bg-white hover:bg-slate-50 border-2 border-slate-100 text-slate-700 rounded-3xl font-black text-lg transition shadow-sm uppercase tracking-tight">
                    Jual Barang
                </a>
            </div>
        </div>

        <div class="mt-28 grid grid-cols-2 md:grid-cols-3 gap-16 border-t border-gray-100 pt-12 relative w-full max-w-4xl">
            <div class="text-center">
                <p class="text-4xl font-black text-[#10B981]">5k+</p>
                <p class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em] mt-2">Produk Aktif</p>
            </div>
            <div class="text-center">
                <p class="text-4xl font-black text-pink-500">2k+</p>
                <p class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em] mt-2">Penjual Terpercaya</p>
            </div>
            <div class="hidden md:block text-center border-l border-gray-100">
                <p class="text-4xl font-black text-slate-800">Safe</p>
                <p class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em] mt-2">Transaksi Aman</p>
            </div>
        </div>
    </main>

    <footer class="py-12 text-center text-slate-400 text-[10px] font-black uppercase tracking-widest">
        <div class="flex justify-center gap-3 mb-4">
            <div class="w-2 h-2 rounded-full bg-emerald-400"></div>
            <div class="w-2 h-2 rounded-full bg-pink-400"></div>
        </div>
        <p>&copy; 2025 PRELOVED Marketplace - RE-USE & RE-LOVE</p>
    </footer>

</body>
</html>