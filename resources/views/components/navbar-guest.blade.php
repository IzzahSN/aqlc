<header class="w-full bg-gray-50 border-b border-gray-200 shadow-sm dark:bg-neutral-900 dark:border-neutral-800">
    <nav class="max-w-7xl mx-auto flex items-center justify-between px-4 sm:px-6 lg:px-8 py-3">
        <!-- Logo & Brand -->
        <a href="{{ route('home') }}" class=" flex items-center">
            <img src="/logo-round.svg" class="h-10 w-10 rounded-full shadow me-3" alt=" AQLC Logo" />
            <h2 class="self-center text-xs font-semibold">Pusat Pengajian Quran <br>As-Siraaj</h2>
        </a>

        <!-- Nav Links -->
        <div class="hidden md:flex items-center gap-6">
            <a href="{{ route('home') }}" class="text-base font-medium transition {{ request()->routeIs('home') ? 'text-green-600 dark:text-green-400' : 'text-gray-700 hover:text-green-600 dark:text-gray-200 dark:hover:text-green-400' }}">
                Home
            </a>
            <a href="{{ route('profile') }}" class="text-base font-medium transition {{ request()->routeIs('profile') ? 'text-green-600 dark:text-green-400' : 'text-gray-700 hover:text-green-600 dark:text-gray-200 dark:hover:text-green-400' }}">
                Profile
            </a>
            <a href="{{ route('contact') }}" class="text-base font-medium transition {{ request()->routeIs('contact') ? 'text-green-600 dark:text-green-400' : 'text-gray-700 hover:text-green-600 dark:text-gray-200 dark:hover:text-green-400' }}">
                Contact
            </a>
        </div>

        <!-- Auth Buttons -->
        <div class="flex items-center gap-3">
            <a href="{{ route('login') }}"
                class="px-4 py-2 text-sm font-medium rounded-xl border border-gray-300 
              text-gray-700 bg-white shadow-sm hover:bg-gray-100 hover:shadow-md
              transition-all duration-200 ease-in-out
              dark:bg-neutral-800 dark:text-gray-200 dark:border-neutral-700 
              dark:hover:bg-neutral-700 dark:hover:shadow-md">
                Sign In
            </a>
            <a href="{{ route('register') }}"
                class="px-4 py-2 text-sm font-medium rounded-xl bg-green-600 text-white 
              shadow-md hover:bg-green-700 hover:shadow-lg
              transition-all duration-200 ease-in-out
              dark:bg-green-500 dark:hover:bg-green-600">
                Register
            </a>
        </div>

    </nav>
</header>