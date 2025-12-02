<header class="sticky top-0 z-40 w-full mt-2">
    <div class="flex items-center justify-between px-6 h-16 bg-white/90 backdrop-blur-md border-b rounded-xl shadow-sm border-gray-100 transition-all duration-300">
        
        <div>
            <h1 class="text-lg font-bold text-gray-800 tracking-tight">{{ $title ?? 'Dashboard' }}</h1>
        </div>

        <div class="flex items-center gap-3 sm:gap-4">
            
            <button class="relative p-2 rounded-full text-gray-500 hover:bg-gray-100 hover:text-green-600 transition-all duration-200 focus:outline-none group">
                <span class="absolute top-2 right-2.5 h-2 w-2 rounded-full bg-red-500 ring-2 ring-white transform scale-100 group-hover:scale-110 transition-transform"></span>
                
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C8.67 6.165 8 7.388 8 8.75V14.158c0 .538-.214 1.055-.595 1.437L6 17h5m4 0v1a2 2 0 11-4 0v-1m4 0H9" />
                </svg>
            </button>

            <div class="h-6 w-px bg-gray-200 hidden sm:block"></div>

            <div class="relative">
                <button id="profileDropdownButton" data-dropdown-toggle="profileDropdown"
                    class="flex items-center gap-2 pl-1 pr-3 py-1 rounded-full border border-transparent hover:border-gray-200 hover:bg-gray-50 transition-all duration-200 focus:outline-none group">
                    
                    <img src="{{ session('profile') 
                        ? asset('storage/'.session('profile')) 
                        : 'https://ui-avatars.com/api/?name='.urlencode(session('username')).'&background=059669&color=fff' }}" 
                        class="w-8 h-8 rounded-full object-cover border border-gray-100 group-hover:shadow-sm transition-all" alt="Avatar">
                    
                    <div class="hidden sm:block text-left leading-tight">
                        <p class="text-xs font-bold text-gray-700 group-hover:text-gray-900">{{ session('username') }}</p>
                        <p class="text-[10px] font-medium text-gray-400 uppercase tracking-wider">
                            @if (session('role') === 'guardian')
                                Penjaga
                            @else
                                {{ ucfirst(session('role')) }}
                            @endif
                        </p>
                    </div>

                    <svg class="w-3.5 h-3.5 text-gray-400 group-hover:text-gray-600 transition-transform duration-200 group-aria-expanded:rotate-180" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div id="profileDropdown"
                    class="hidden absolute right-0 mt-2 w-64 bg-white rounded-xl shadow-xl ring-1 ring-black/5 z-50 overflow-hidden origin-top-right transform transition-all duration-200">

                    <div class="px-5 py-3 bg-gray-50 border-b border-gray-100">
                        <p class="text-sm font-bold text-gray-800 truncate">{{ session('fullname') }}</p>
                        <p class="text-xs text-gray-500 truncate">{{ session('email') }}</p>
                    </div>

                    <ul class="py-1">
                        <li>
                            <a href="{{ route('guardian.profile') }}"
                                class="flex items-center gap-3 px-5 py-2.5 text-sm text-gray-600 hover:bg-green-50 hover:text-green-700 transition-colors duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                Kemaskini Profil
                            </a>
                        </li>
                        
                        <div class="h-px bg-gray-100 my-1"></div>

                        <li>
                            <a href="#"
                            onclick="event.preventDefault(); handleLogout();"
                            class="flex items-center gap-3 px-5 py-2.5 text-sm text-gray-600 hover:bg-red-50 hover:text-red-700 transition-colors duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
                                </svg>
                                Log Keluar
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

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
                    title: 'Log Keluar Berjaya',
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

<!-- Flowbite JS for dropdown -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>