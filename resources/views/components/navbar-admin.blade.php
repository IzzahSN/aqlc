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

            <!-- Profile Dropdown -->
            <div class="relative">
                <!-- Trigger -->
                <button id="profileDropdownButton" data-dropdown-toggle="profileDropdown"
                    class="flex items-center gap-2 focus:outline-none">
                    <img src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                        class="w-10 h-10 rounded-full border-2 border-gray-200" alt="User" />
                    <div class="hidden sm:block text-left">
                        <h4 class="text-sm font-medium">Ustaz Mustaqim</h4>
                    </div>
                    <svg class="w-4 h-4 text-gray-500 ml-1" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div id="profileDropdown"
                    class="hidden absolute right-0 mt-2 w-64 bg-white rounded-2xl shadow-lg ring-1 ring-black/5 z-50 overflow-hidden">

                    <!-- Header -->
                    <div class="px-5 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
                        <p class="text-sm font-semibold text-gray-900">Ahmad Mustaqim Mohd Noor</p>
                        <p class="text-xs text-gray-500">mustaqim@example.com</p>
                    </div>

                    <!-- Menu Items -->
                    <ul class="py-2">
                        <li>
                            <a href="{{ route('admin.profile') }}"
                                class="flex items-center gap-3 px-5 py-2.5 text-sm text-gray-700 hover:bg-gray-100 transition">
                                <!-- Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                <span>Edit Profile</span>
                            </a>
                        </li>
                         <li>
                            <a href="#"
                            onclick="event.preventDefault(); handleLogout();"
                            class="flex items-center gap-3 px-5 py-2.5 text-sm text-gray-700 hover:bg-gray-100 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
                                </svg>
                                <span>Sign Out</span>
                            </a>
                        </li>
                        <script>
                            function handleLogout() {
                                fetch("{{ route('logout') }}", {
                                    method: "POST",
                                    headers: {
                                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                        "Accept": "application/json"
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Logged Out',
                                            text: data.message,
                                            timer: 2000,
                                            timerProgressBar: true,
                                            showConfirmButton: false,
                                            willClose: () => {
                                                window.location.href = data.redirect_url;
                                            }
                                        });
                                    }
                                });
                            }
                        </script>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</header>

<!-- Flowbite JS for dropdown -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>