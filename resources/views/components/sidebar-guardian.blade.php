<aside id="sidebar-multi-level-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-all duration-300 -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50">
        
        <div class="flex items-center justify-center mb-6 px-3">
            <a href="{{ route('guardian.dashboard') }}" 
            class="flex items-center gap-3 p-3 w-full bg-white border border-green-100 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 group">
                
                <img src="/images/logo-1.svg" 
                    class="h-10 w-auto object-contain drop-shadow-sm group-hover:scale-105 transition-transform duration-300" 
                    alt="AQLC Logo" />
                
                <div class="flex flex-col sidebar-text">
                    <span class="text-[10px] font-bold text-gray-600 uppercase tracking-wider leading-none mb-0.5">
                        Pusat Pengajian 
                    </span>
                    <span class="text-[10px] font-bold text-gray-600 uppercase tracking-wider leading-none mb-0.5">
                        Quran As-Siraaj
                    </span>
                </div>
            </a>
        </div>
        
        <ul class="space-y-2 font-semibold">
            <!-- Dashboard & Profil-->
            <li>
                <a href="{{ route('guardian.dashboard') }}"
                class="flex items-center p-2 rounded-lg group transition-all duration-200 ease-in-out
                {{ request()->routeIs('guardian.dashboard') 
                    ? 'bg-gradient-to-r from-green-600 to-emerald-700 text-white shadow-md' 
                    : 'text-gray-600 hover:bg-green-100 hover:text-green-700' 
                }}">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" 
                        viewBox="0 0 24 24" 
                        fill="currentColor" 
                        class="w-5 h-5 transition-colors duration-200
                        {{ request()->routeIs('guardian.dashboard') 
                            ? 'text-white' 
                            : 'text-gray-400 group-hover:text-green-600' 
                        }}">
                        <path d="M3 4a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4zM3 14a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-5zM13 4a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1V4zM13 14a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-5z" />
                    </svg>

                    <span class="ms-3 text-sm font-semibold sidebar-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('guardian.profile') }}"
                class="flex items-center p-2 rounded-lg group transition-all duration-200 ease-in-out
                {{ request()->routeIs('guardian.profile') 
                    ? 'bg-gradient-to-r from-green-600 to-emerald-700 text-white shadow-md' 
                    : 'text-gray-600 hover:bg-green-100 hover:text-green-700' 
                }}">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" 
                        viewBox="0 0 24 24" 
                        fill="currentColor" 
                        class="w-5 h-5 transition-colors duration-200
                        {{ request()->routeIs('guardian.profile') 
                            ? 'text-white' 
                            : 'text-gray-400 group-hover:text-green-600' 
                        }}">
                        <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                    </svg>

                    <span class="ms-3 text-sm font-semibold sidebar-text">Profil</span>
                </a>
            </li>

            <!-- Laporan -->
            <div class="mt-6 mb-3 px-3">
                <h3 class="text-xs font-bold uppercase tracking-wider text-gray-500 flex items-center gap-2">
                    <div class="h-px flex-1 bg-gradient-to-r from-transparent via-gray-300 to-transparent"></div>
                    <span>Laporan</span>
                    <div class="h-px flex-1 bg-gradient-to-r from-transparent via-gray-300 to-transparent"></div>
                </h3>
            </div>
            <li>
                <a href="{{ route('guardian.report.index') }}"
                class="flex items-center p-2 rounded-lg group transition-all duration-200 ease-in-out
                {{ request()->routeIs('guardian.report.*') 
                    ? 'bg-gradient-to-r from-green-600 to-emerald-700 text-white shadow-md' 
                    : 'text-gray-600 hover:bg-green-100 hover:text-green-700' 
                }}">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 transition-colors duration-200
                        {{ request()->routeIs('guardian.report.*') ? 'text-white' : 'text-gray-400 group-hover:text-green-600' }}"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2l.117 .007a1 1 0 0 1 .876 .876l.007 .117v4l.005 .15a2 2 0 0 0 1.838 1.844l.157 .006h4l.117 .007a1 1 0 0 1 .876 .876l.007 .117v9a3 3 0 0 1 -2.824 2.995l-.176 .005h-10a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-14a3 3 0 0 1 2.824 -2.995l.176 -.005zm-.2 9a.39 .39 0 0 0 -.351 .217l-1.086 2.193l-2.428 .352a.389 .389 0 0 0 -.217 .665l1.757 1.707l-.415 2.411a.392 .392 0 0 0 .568 .41l2.172 -1.138l2.172 1.138a.39 .39 0 0 0 .567 -.411l-.414 -2.41l1.757 -1.707a.39 .39 0 0 0 -.217 -.665l-2.428 -.352l-1.086 -2.193a.39 .39 0 0 0 -.351 -.217" /><path d="M19 7h-4l-.001 -4.001z" /></svg>

                    <span class="ms-3 text-sm font-semibold sidebar-text">Prestasi Pelajar</span>
                </a>
            </li>
            <li>
                <a href="{{ route('guardian.bill.index') }}"
                class="flex items-center p-2 rounded-lg group transition-all duration-200 ease-in-out
                {{ request()->routeIs('guardian.bill.*') 
                    ? 'bg-gradient-to-r from-green-600 to-emerald-700 text-white shadow-md' 
                    : 'text-gray-600 hover:bg-green-100 hover:text-green-700' 
                }}">
                
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 transition-colors duration-200
                {{ request()->routeIs('guardian.bill.*') ? 'text-white' : 'text-gray-400 group-hover:text-green-600' }}"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2l.117 .007a1 1 0 0 1 .876 .876l.007 .117v4l.005 .15a2 2 0 0 0 1.838 1.844l.157 .006h4l.117 .007a1 1 0 0 1 .876 .876l.007 .117v9a3 3 0 0 1 -2.824 2.995l-.176 .005h-10a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-14a3 3 0 0 1 2.824 -2.995l.176 -.005zm4 15h-2a1 1 0 0 0 0 2h2a1 1 0 0 0 0 -2m0 -4h-8a1 1 0 0 0 0 2h8a1 1 0 0 0 0 -2m-7 -7h-1a1 1 0 1 0 0 2h1a1 1 0 1 0 0 -2" /><path d="M19 7h-4l-.001 -4.001z" /></svg>

                    <span class="ms-3 text-sm font-semibold sidebar-text">Yuran Pengajian</span>
                </a>
            </li>  
        </ul>
    </div>
</aside>