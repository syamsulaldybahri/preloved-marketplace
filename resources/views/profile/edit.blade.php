<x-app-layout>
    <div class="min-h-screen bg-[#F8F9FA] max-w-[450px] mx-auto relative border-x border-gray-100 flex flex-col shadow-2xl pb-24 font-sans">
        
        <header class="p-4 flex items-center gap-3 sticky top-0 bg-white z-30 border-b">
            <a href="{{ route('profile.custom') }}" class="text-gray-800 p-1">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <h2 class="font-bold text-xl text-[#28A745]">Edit Profil</h2>
        </header>

        <main class="p-4">
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100">
                @include('profile.partials.update-profile-information-form')
            </div>
        </main>
    </div>
</x-app-layout>