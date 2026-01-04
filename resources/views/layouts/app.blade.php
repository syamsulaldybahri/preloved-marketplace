<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Preloved Market</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-color: #F3F4F6;
            margin: 0;
            padding: 0;
        }
        ::-webkit-scrollbar {
            width: 0;
            background: transparent;
        }
        body {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="font-sans antialiased flex justify-center min-h-screen">

<div class="w-full max-w-[450px] bg-white min-h-screen flex flex-col relative shadow-2xl">

    {{-- CONTENT --}}
    <main class="flex-grow pb-28">
        {{ $slot }}
    </main>

    {{-- BOTTOM NAVBAR --}}
    <nav class="fixed bottom-0 left-1/2 -translate-x-1/2
                w-full max-w-[450px]
                bg-white border-t border-[#E5E7EB]
                h-[72px]
                px-6
                flex justify-between items-center
                z-50
                shadow-[0_-6px_20px_rgba(0,0,0,0.06)]">

        {{-- HOME --}}
        <a href="{{ route('dashboard') }}"
           class="flex flex-col items-center flex-1
           {{ request()->routeIs('dashboard') ? 'text-[#22C55E]' : 'text-[#9CA3AF]' }}">

            <svg class="w-7 h-7"
                 viewBox="0 0 24 24"
                 fill="none"
                 stroke="currentColor"
                 stroke-width="2"
                 stroke-linecap="round"
                 stroke-linejoin="round">
                <path d="M3 10.5L12 3l9 7.5" />
                <path d="M5 10v10h14V10" />
                <path d="M10 20v-6h4v6" />
            </svg>

            <span class="text-[10px] font-bold mt-1">Home</span>
        </a>

        {{-- JUAL PRODUK (ANDROID STYLE, LEBIH KECIL) --}}
        <a href="{{ route('products.create') }}"
           class="flex flex-col items-center flex-1">

            <div class="w-9 h-9 rounded-full
                        border-2 border-[#22C55E]
                        flex items-center justify-center
                        active:scale-90 transition-transform">
                <svg class="w-5 h-5"
                     viewBox="0 0 24 24"
                     fill="none"
                     stroke="#22C55E"
                     stroke-width="2.5"
                     stroke-linecap="round"
                     stroke-linejoin="round">
                    <path d="M12 5v14" />
                    <path d="M5 12h14" />
                </svg>
            </div>

            <span class="text-[10px] font-bold text-[#9CA3AF] mt-1">
                Jual Produk
            </span>
        </a>

        {{-- PROFILE --}}
        <a href="{{ route('profile.custom') }}"
           class="flex flex-col items-center flex-1
           {{ request()->routeIs('profile.custom') ? 'text-[#22C55E]' : 'text-[#9CA3AF]' }}">

            <svg class="w-7 h-7"
                 fill="none"
                 stroke="currentColor"
                 stroke-width="2.5"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 12a4 4 0 100-8 4 4 0 000 8z M6 20a6 6 0 0112 0"/>
            </svg>

            <span class="text-[10px] font-bold mt-1">Profile</span>
        </a>

    </nav>

</div>
</body>
</html>
