<button id="hamburger-btn" type="button" class="fixed top-4 left-4 z-50 inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
    <span class="sr-only">Toggle sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
</button>

<aside id="sidebar-multi-level-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-all duration-300 -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-4 py-6 overflow-y-auto bg-white shadow-xl">
        
        <div class="flex items-center justify-between ps-2.5 mb-8 border-b pb-4 border-gray-100">
            <a href="{{ route('guardian.dashboard') }}" class="flex items-center">
                <img src="/images/logo-1.svg" class="sidebar-logo h-8 w-8 me-3" alt="AQLC Logo" />
                <h2 class="self-center text-sm font-extrabold sidebar-text text-gray-800">Pusat Pengajian Quran As-Siraaj</h2>
            </a>
            <button id="collapse-btn" type="button" class="hidden md:flex items-center p-2 text-gray-500 rounded-full hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-200 transition duration-150">
                <span class="sr-only">Toggle sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                </svg>
            </button>
        </div>
        
        <ul class="space-y-1 font-semibold">
            <li>
                <a href="{{ route('guardian.dashboard') }}" 
                   class="flex items-center p-3 rounded-xl transition duration-200 
                          {{ request()->routeIs('guardian.dashboard') ? 'bg-green-600 text-white shadow-lg' : 'text-gray-700 hover:bg-green-50' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         class="w-5 h-5 transition duration-75 {{ request()->routeIs('guardian.dashboard') ? 'text-white' : 'text-gray-500 group-hover:text-green-700' }}" 
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 4h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1" />
                        <path d="M5 16h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" />
                        <path d="M15 12h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1" />
                        <path d="M15 4h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" />
                    </svg>
                    <span class="ms-3 sidebar-text font-medium">Papan Pemuka</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('guardian.report.index') }}" 
                   class="flex items-center p-3 rounded-xl transition duration-200 
                          {{ request()->routeIs('guardian.report.*') ? 'bg-green-600 text-white shadow-lg' : 'text-gray-700 hover:bg-green-50' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         class="w-5 h-5 transition duration-75 {{ request()->routeIs('guardian.report.*') ? 'text-white' : 'text-gray-500 group-hover:text-green-700' }}" 
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                        <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                    </svg>
                    <span class="ms-3 sidebar-text font-medium">Pengurusan Laporan</span>
                </a>
            </li>

            <li>
                <a href="{{ route('guardian.bill.index') }}" 
                   class="flex items-center p-3 rounded-xl transition duration-200 
                          {{ request()->routeIs('guardian.bill.*') ? 'bg-green-600 text-white shadow-lg' : 'text-gray-700 hover:bg-green-50' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" 
                         class="w-5 h-5 transition duration-75 {{ request()->routeIs('guardian.bill.*') ? 'text-white' : 'text-gray-500 group-hover:text-green-700' }}" 
                         fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M7 15h-3a1 1 0 0 1 -1 -1v-8a1 1 0 0 1 1 -1h12a1 1 0 0 1 1 1v3" />
                        <path d="M7 9m0 1a1 1 0 0 1 1 -1h12a1 1 0 0 1 1 1v8a1 1 0 0 1 -1 1h-12a1 1 0 0 1 -1 -1z" />
                        <path d="M12 14a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                    </svg>
                    <span class="ms-3 sidebar-text font-medium">Bil Pelajar</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<style>
#sidebar-multi-level-sidebar.collapsed {
    width: 80px;
}
#sidebar-multi-level-sidebar.collapsed .sidebar-text {
    display: none;
}
#sidebar-multi-level-sidebar.collapsed .sidebar-logo {
    display: none;
}
#sidebar-multi-level-sidebar.collapsed .w-3.h-3 {
    display: none;
}
#sidebar-multi-level-sidebar.collapsed ul ul {
    display: none;
}
#sidebar-multi-level-sidebar.collapsed .dropdown-active svg {
    color: #16a34a;
}
</style>

<script>
document.getElementById('collapse-btn').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar-multi-level-sidebar');
    const contentWrapper = document.getElementById('content-wrapper');
    sidebar.classList.toggle('collapsed');
    if (sidebar.classList.contains('collapsed')) {
        contentWrapper.classList.remove('sm:ml-64');
        contentWrapper.classList.add('sm:ml-20');
    } else {
        contentWrapper.classList.remove('sm:ml-20');
        contentWrapper.classList.add('sm:ml-64');
    }
});

document.getElementById('hamburger-btn').addEventListener('click', function() {
    const sidebar = document.getElementById('sidebar-multi-level-sidebar');
    if (sidebar.classList.contains('-translate-x-full')) {
        sidebar.classList.remove('-translate-x-full');
        sidebar.classList.add('collapsed');
    } else {
        sidebar.classList.add('-translate-x-full');
        sidebar.classList.remove('collapsed');
    }
});

// Prevent navigation and expand sidebar when clicking links or dropdown buttons in collapsed mode
document.querySelectorAll('#sidebar-multi-level-sidebar a, #sidebar-multi-level-sidebar button[data-collapse-toggle]').forEach(element => {
    element.addEventListener('click', function(e) {
        const sidebar = document.getElementById('sidebar-multi-level-sidebar');
        if (sidebar.classList.contains('collapsed')) {
            e.preventDefault();
            sidebar.classList.remove('collapsed');
            const contentWrapper = document.getElementById('content-wrapper');
            contentWrapper.classList.remove('sm:ml-20');
            contentWrapper.classList.add('sm:ml-64');
        }
    });
});
</script>