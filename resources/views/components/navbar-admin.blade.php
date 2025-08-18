<header>
    <!-- Navbar Component -->
    <div class="flex items-center justify-between px-6 py-2 bg-white shadow-sm">
        <!-- Left: Title -->
        <h1 class="text-xl font-bold">{{ $title ?? 'Dashboard' }}</h1>

        <!-- Right: Search, Notification, Profile -->
        <div class="flex items-center gap-4">
            <!-- Notification -->
            <button class="p-2 rounded-full bg-gray-100 hover:bg-gray-200">
                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C8.67 6.165 8 7.388 8 8.75V14.158c0 .538-.214 1.055-.595 1.437L6 17h5m4 0v1a2 2 0 11-4 0v-1m4 0H9" />
                </svg>
            </button>

            <!-- Profile -->
            <div class="flex items-center gap-2">
                <img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                    class="w-10 h-10 rounded-full" alt="User" />
                <div>
                    <h4 class="text-sm font-medium">Mustaqim</h4>
                    <p class="text-xs text-gray-500">Admin Manager</p>
                </div>
            </div>
        </div>
    </div>
</header>