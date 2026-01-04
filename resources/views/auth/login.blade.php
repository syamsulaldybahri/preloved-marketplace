<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">
        <div class="w-full max-w-[380px] bg-white shadow-2xl rounded-sm overflow-hidden border border-gray-100">
            
            <div class="p-6 border-b border-gray-50">
                <div class="flex justify-between items-center">
                    <div class="bg-[#10B981] text-white px-3 py-1 rounded-sm text-xs font-bold shadow-sm">
                        Preloved Market
                    </div>
                    <div class="text-[#F472B6]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div class="px-8 py-10">
                <h2 class="text-center text-xl font-bold text-gray-800 mb-8">Masuk ke Akun</h2>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="bg-gray-100 p-4 rounded-sm mb-6">
                        <div class="relative mb-3">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 font-bold text-xs">TT</span>
                            </div>
                            <input type="email" name="email" :value="old('email')" required autofocus
                                class="w-full pl-10 pr-3 py-2 bg-white border border-gray-200 rounded-sm text-sm focus:outline-none focus:ring-1 focus:ring-green-500"
                                placeholder="Masukkan email Anda">
                        </div>

                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                                </svg>
                            </div>
                            <input type="password" name="password" required
                                class="w-full pl-10 pr-10 py-2 bg-white border border-gray-200 rounded-sm text-sm focus:outline-none focus:ring-1 focus:ring-green-500"
                                placeholder="Masukkan kata sandi">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-[#10B981] hover:bg-[#0da371] text-white font-bold py-3 px-4 rounded-md flex justify-between items-center mb-4 transition duration-200">
                        <span>Masuk</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>

                    <a href="{{ route('register') }}" class="w-full bg-[#F9A8D4] hover:bg-[#f78ec3] text-gray-800 font-bold py-3 px-4 rounded-md flex justify-between items-center transition duration-200">
                        <span>Daftar Sekarang</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </form>
            </div>

            <div class="h-20 bg-gray-50"></div>
        </div>
    </div>
</x-guest-layout>