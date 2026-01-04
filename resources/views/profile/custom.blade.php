<x-app-layout>
    <div class="min-h-screen bg-[#F8F9FA] max-w-[450px] mx-auto relative border-x border-gray-100 flex flex-col shadow-2xl font-sans pb-24">
        
        <header class="p-4 flex items-center justify-between sticky top-0 bg-white z-30">
            <div class="flex items-center gap-3">
                <a href="{{ route('dashboard') }}" class="text-gray-800">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 12H5M12 19l-7-7 7-7"/>
                    </svg>
                </a>
                <h2 class="font-bold text-2xl text-[#28A745]">Profile Saya</h2>
            </div>
            <div class="text-gray-800">
                <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"></path>
                    <circle cx="12" cy="12" r="3"></circle>
                </svg>
            </div>
        </header>

        <main class="flex-grow p-4">
            <div class="bg-[#E9E9E9] p-4 rounded-sm flex items-start gap-4 shadow-sm">
                <div class="w-28 h-28 bg-[#333333] rounded-full flex items-center justify-center border-4 border-[#28A745] shrink-0 overflow-hidden">
                    <svg class="w-20 h-20 text-[#28A745] mt-4" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                    </svg>
                </div>

                <div class="flex-grow flex flex-col pt-2">
                    <div class="bg-white px-2 py-0.5 border border-gray-300 mb-1">
                        <p class="text-[10px] leading-tight text-gray-700">Nama Lengkap: <span class="font-medium">{{ Auth::user()->name }}</span></p>
                    </div>
                    <div class="bg-white px-2 py-0.5 border border-gray-300 mb-1">
                        <p class="text-[10px] leading-tight text-gray-700">Email: <span class="font-medium">{{ Auth::user()->email }}</span></p>
                    </div>
                    <div class="bg-white px-2 py-0.5 border border-gray-300">
                        <p class="text-[10px] leading-tight text-gray-700">Lokasi: <span class="font-medium">{{ Auth::user()->location ?? 'Belum Diatur' }}</span></p>
                    </div>
                </div>
            </div>

            <div class="bg-[#CCCCCC] p-4 mt-6 rounded-sm space-y-3">
                @php
                    $menus = [
                        ['Riwayat Transaksi', 'bg-[#F3A3C7]', 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', route('transactions.index')],
                        ['Edit Profil', 'bg-[#28A745]', 'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z', route('profile.edit')],
                        ['Produk Saya', 'bg-[#F3A3C7]', 'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z', route('products.mine')],
                        // UPDATE: Link Notifikasi sekarang diarahkan ke route('notifications')
                        ['Notifikasi', 'bg-[#28A745]', 'M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9', route('notifications')],
                        ['Pengaturan Akun', 'bg-[#F3A3C7]', 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z', route('profile.password')],
                    ];
                @endphp

                @foreach($menus as $menu)
                <a href="{{ $menu[3] }}" class="{{ $menu[1] }} p-2.5 rounded-lg flex items-center justify-between border border-gray-300 cursor-pointer transition active:opacity-80 text-black relative">
                    <div class="flex items-center gap-3 px-1">
                        <div>
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $menu[2] }}"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-bold">{{ $menu[0] }}</span>

                        {{-- Menambahkan Badge Merah khusus untuk menu Notifikasi --}}
                        @if($menu[0] == 'Notifikasi')
                            <span class="bg-red-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full animate-pulse">
                                2
                            </span>
                        @endif
                    </div>

                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 {{ $loop->index % 2 == 0 ? 'text-black' : 'text-white' }}" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </a>
                @endforeach

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full bg-[#28A745] p-2.5 rounded-lg flex items-center justify-between border border-gray-300 mt-2 transition active:opacity-80">
                        <div class="flex items-center gap-3 px-1 text-white">
                            <div>
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                            </div>
                            <span class="text-sm font-bold">Logout</span>
                        </div>
                        
                        <div class="flex items-center text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </form>
            </div>
        </main>
    </div>
</x-app-layout>