<button id="hamburger-btn" type="button" class="fixed top-4 left-4 z-50 inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Toggle sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
</button>

<aside id="sidebar-multi-level-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-all duration-300 -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <div class="flex items-center justify-between ps-2.5 mb-5">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center">
                <img src="/images/logo-round.svg" class="sidebar-logo h-10 w-10 rounded-full shadow me-3" alt=" AQLC Logo" />
                <h2 class="self-center text-sm font-semibold dark:text-white sidebar-text">Pusat Pengajian<br>Quran As-Siraaj</h2>
            </a>
            <button id="collapse-btn" type="button" class="hidden md:flex items-center p-2 text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                <span class="sr-only">Toggle sidebar</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                </svg>
            </button>
        </div>
        <ul class="space-y-2 font-semibold">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center p-2 rounded-lg group {{ request()->routeIs('admin.dashboard') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 dark:text-white hover:bg-green-100 dark:hover:bg-green-700' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 transition duration-75 {{ request()->routeIs('admin.dashboard') ? 'text-green-900 dark:text-green-300' : 'text-gray-500 dark:text-gray-400 group-hover:text-green-900 dark:group-hover:text-green-300' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 4h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1" />
                        <path d="M5 16h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" />
                        <path d="M15 12h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1" />
                        <path d="M15 4h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" />
                    </svg>

                    <span class="ms-3 sidebar-text">Dashboard</span>
                </a>
            </li>
            <!-- Record Management -->
            <li>
                <button type="button" class="flex items-center w-full p-2 text-base transition duration-75 rounded-lg group {{ request()->routeIs('admin.tutor.*', 'admin.student.*', 'admin.guardian.*') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300 dropdown-active' : 'text-gray-900 dark:text-white hover:bg-green-100 dark:hover:bg-green-700' }}" aria-controls="dropdown-record" data-collapse-toggle="dropdown-record" aria-expanded="false">
                    <svg class="shrink-0 w-5 h-5 {{ request()->routeIs('admin.tutor.*', 'admin.student.*', 'admin.guardian.*') ? 'text-green-900 dark:text-green-300' : 'text-gray-500 dark:text-gray-400' }} transition duration-75 group-hover:text-green-900 group-[aria-expanded=true]:text-green-700"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                    </svg>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap sidebar-text">Record Management</span>
                    <svg class="w-3 h-3 transition-transform duration-200 group-[aria-expanded=true]:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-record"
                    class="{{ request()->routeIs('admin.tutor.*', 'admin.student.*', 'admin.guardian.*') ? '' : 'hidden' }} py-2 space-y-2">

                    <li>
                        <a href="{{ route('admin.tutor.index') }}"
                            class="flex items-center w-full p-2 pl-11 rounded-lg
                            {{ request()->routeIs('admin.tutor.*') 
                                ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' 
                                : 'text-gray-900 hover:bg-green-100 dark:text-white dark:hover:bg-green-700' }}">
                            Tutor
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.student.index') }}"
                            class="flex items-center w-full p-2 pl-11 rounded-lg
                            {{ request()->routeIs('admin.student.*') 
                                ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' 
                                : 'text-gray-900 hover:bg-green-100 dark:text-white dark:hover:bg-green-700' }}">
                            Student
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.guardian.index') }}"
                            class="flex items-center w-full p-2 pl-11 rounded-lg
                            {{ request()->routeIs('admin.guardian.*') 
                                ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' 
                                : 'text-gray-900 hover:bg-green-100 dark:text-white dark:hover:bg-green-700' }}">
                            Guardian
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Class Management -->
            <li>
                <button type="button" class="flex items-center w-full p-2 text-base transition duration-75 rounded-lg group {{ request()->routeIs('admin.package.*','admin.class.*','admin.schedule.*') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300 dropdown-active' : 'text-gray-900 dark:text-white hover:bg-green-100 dark:hover:bg-green-700' }}" aria-controls="dropdown-class" data-collapse-toggle="dropdown-class" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 {{ request()->routeIs('admin.package.*','admin.class.*','admin.schedule.*') ? 'text-green-900 dark:text-green-300' : 'text-gray-500 dark:text-gray-400' }} transition duration-75 group-hover:text-green-900 group-[aria-expanded=true]:text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697" />
                        <path d="M18 14v4h4" />
                        <path d="M18 11v-4a2 2 0 0 0 -2 -2h-2" />
                        <path d="M8 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                        <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                        <path d="M8 11h4" />
                        <path d="M8 15h3" />
                    </svg>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap sidebar-text">Class Management</span>
                    <svg class="w-3 h-3 transition-transform duration-200 group-[aria-expanded=true]:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-class" class="{{ request()->routeIs('admin.package.*','admin.class.*','admin.schedule.*') ? '' : 'hidden' }} py-2 space-y-2">
                    <li>
                        <a href="{{ route('admin.package.index') }}" class="flex items-center w-full p-2 pl-11 rounded-lg {{ request()->routeIs('admin.package.*') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 hover:bg-green-100 dark:text-white dark:hover:bg-green-700' }}">Package</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.class.index') }}" class="flex items-center w-full p-2 pl-11 rounded-lg {{ request()->routeIs('admin.class.*') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 hover:bg-green-100 dark:text-white dark:hover:bg-green-700' }}">Class</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.schedule.index') }}" class="flex items-center w-full p-2 pl-11 rounded-lg {{ request()->routeIs('admin.schedule.*') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 hover:bg-green-100 dark:text-white dark:hover:bg-green-700' }}">Schedule</a>
                    </li>
                </ul>
            </li>
            <!-- Report Management -->
            <li>
                <button type="button" class="flex items-center w-full p-2 text-base transition duration-75 rounded-lg group {{ request()->routeIs('admin.report.*','admin.achievement.*','admin.module.*') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300 dropdown-active' : 'text-gray-900 dark:text-white hover:bg-green-100 dark:hover:bg-green-700' }}" aria-controls="dropdown-report" data-collapse-toggle="dropdown-report" aria-expanded="false">
                    <svg class="w-5 h-5 {{ request()->routeIs('admin.report.*','admin.achievement.*','admin.module.*') ? 'text-green-900 dark:text-green-300' : 'text-gray-500 dark:text-gray-400' }} transition duration-75 group-hover:text-green-900 group-[aria-expanded=true]:text-green-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                        <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                    </svg>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap sidebar-text">Report Management</span>
                    <svg class="w-3 h-3 transition-transform duration-200 group-[aria-expanded=true]:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-report" class="{{ request()->routeIs('admin.report.*','admin.achievement.*','admin.module.*') ? '' : 'hidden' }} py-2 space-y-2">
                    <li>
                        <a href="{{ route('admin.report.index') }}" class="flex items-center w-full p-2 pl-11 rounded-lg {{ request()->routeIs('admin.report.*') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 hover:bg-green-100 dark:text-white dark:hover:bg-green-700' }}">Grade & Lesson Plan</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.achievement.index') }}" class="flex items-center w-full p-2 pl-11 rounded-lg {{ request()->routeIs('admin.achievement.*') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 hover:bg-green-100 dark:text-white dark:hover:bg-green-700' }}">Achievement</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.module.index') }}" class="flex items-center w-full p-2 pl-11 rounded-lg {{ request()->routeIs('admin.module.*') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 hover:bg-green-100 dark:text-white dark:hover:bg-green-700' }}">Module</a>
                    </li>
                </ul>
            </li>
            <!-- Payment Management -->
            <li>
                <button type="button" class="flex items-center w-full p-2 text-base transition duration-75 rounded-lg group {{ request()->routeIs('admin.salary.index','admin.bill') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300 dropdown-active' : 'text-gray-900 dark:text-white hover:bg-green-100 dark:hover:bg-green-700' }}" aria-controls="dropdown-payment" data-collapse-toggle="dropdown-payment" aria-expanded="false">

                    <svg class="shrink-0 w-5 h-5 {{ request()->routeIs('admin.salary.index','admin.bill') ? 'text-green-900 dark:text-green-300' : 'text-gray-500 dark:text-gray-400' }} transition duration-75 group-hover:text-green-900 group-[aria-expanded=true]:text-green-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M7 15h-3a1 1 0 0 1 -1 -1v-8a1 1 0 0 1 1 -1h12a1 1 0 0 1 1 1v3" />
                        <path d="M7 9m0 1a1 1 0 0 1 1 -1h12a1 1 0 0 1 1 1v8a1 1 0 0 1 -1 1h-12a1 1 0 0 1 -1 -1z" />
                        <path d="M12 14a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                    </svg>

                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap sidebar-text">Payment Management</span>
                    <svg class="w-3 h-3 transition-transform duration-200 group-[aria-expanded=true]:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-payment" class="{{ request()->routeIs('admin.salary.index','admin.bill') ? '' : 'hidden' }} py-2 space-y-2">
                    <li>
                        <a href="{{ route('admin.salary.index') }}" class="flex items-center w-full p-2 pl-11 rounded-lg {{ request()->routeIs('admin.salary.index') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 hover:bg-green-100 dark:text-white dark:hover:bg-green-700' }}">Salary</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.bill') }}" class="flex items-center w-full p-2 pl-11 rounded-lg {{ request()->routeIs('admin.bill') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 hover:bg-green-100 dark:text-white dark:hover:bg-green-700' }}">Student Bill</a>
                    </li>
                </ul>
            </li>
            <!-- Notification -->
            <li>
                <a href="{{ route('admin.notification') }}" class="flex items-center p-2 rounded-lg group {{ request()->routeIs('admin.notification') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 dark:text-white hover:bg-green-100 dark:hover:bg-green-700' }}">
                    <svg class="w-5 h-5 transition duration-75 {{ request()->routeIs('admin.notification') ? 'text-green-900 dark:text-green-300' : 'text-gray-500 dark:text-gray-400 group-hover:text-green-900 dark:group-hover:text-green' }}"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                        <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                    </svg>
                    <span class="ms-3 sidebar-text">Notification</span>
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
