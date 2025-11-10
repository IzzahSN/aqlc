<header class="fixed top-0 left-0 w-full bg-gray-50 border-b border-gray-200 shadow-sm z-50">
    <nav class="max-w-7xl mx-auto flex items-center justify-between px-4 sm:px-6 lg:px-8 py-3">
        <!-- Logo & Brand -->
        <a href="{{ route('home') }}" class="flex items-center gap-2">
            <img src="/images/logo-1.svg" class="w-8" alt=" AQLC Logo" />
            <h2 class="self-center text-xs font-semibold">Pusat Pengajian<br>Quran As-Siraaj</h2>
        </a>

        <!-- Nav Links -->
        <div class="hidden md:flex items-center gap-10">
            <a href="{{ route('home') }}" class="text-base font-medium transition {{ request()->routeIs('home') ? 'text-green-600' : 'text-gray-700 hover:text-green-600 ' }}">
                Utama
            </a>
            <a href="{{ route('profile') }}" class="text-base font-medium transition {{ request()->routeIs('profile') ? 'text-green-600' : 'text-gray-700 hover:text-green-600 ' }}">
                Tentang Kami
            </a>
            <a href="{{ route('contact') }}" class="text-base font-medium transition {{ request()->routeIs('contact') ? 'text-green-600' : 'text-gray-700 hover:text-green-600 ' }}">
                Hubungi Kami
            </a>
        </div>

        <!-- Auth Buttons -->
        <div class="flex items-center gap-3">
            <a href="{{ route('login') }}"
                class="px-4 py-2 text-sm font-medium rounded-xl border border-gray-300 
              text-gray-700 bg-white shadow-sm hover:bg-gray-100 hover:shadow-md
              transition-all duration-200 ease-in-out">
                Log Masuk
            </a>
            <a href="{{ route('register') }}"
                class="px-4 py-2 text-sm font-medium rounded-xl bg-green-600 text-white 
              shadow-md hover:bg-green-700 hover:shadow-lg
              transition-all duration-200 ease-in-out">
                Daftar
            </a>
        </div>

    </nav>
</header>