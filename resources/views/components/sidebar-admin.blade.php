<button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
</button>

<aside id="sidebar-multi-level-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <a href="{{ route('admin.dashboard') }}" class=" flex items-center ps-2.5 mb-5">
            <img src="/logo.jpg" class="h-10 w-10 rounded-full shadow me-3" alt=" AQLC Logo" />
            <h2 class="self-center text-sm font-semibold dark:text-white">Pusat Pengajian Quran<br>As-Siraaj</h2>
        </a>
        <ul class="space-y-2 font-semibold">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center p-2 rounded-lg group {{ request()->routeIs('admin.dashboard') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 dark:text-white hover:bg-green-100 dark:hover:bg-green-700' }}">
                    <svg class="w-5 h-5 transition duration-75 {{ request()->routeIs('admin.dashboard') ? 'text-green-900 dark:text-green-300' : 'text-gray-500 dark:text-gray-400 group-hover:text-green-900 dark:group-hover:text-green' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <!-- Record Management -->
            <li>
                <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-green-100 dark:text-white dark:hover:bg-green-700" aria-controls="dropdown-record" data-collapse-toggle="dropdown-record" aria-expanded="false">
                    <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-green-900 dark:text-gray-400 group-[aria-expanded=true]:text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                        <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                    </svg>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Record Management</span>
                    <svg class="w-3 h-3 transition-transform duration-200 group-[aria-expanded=true]:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-record" class="{{ request()->routeIs('admin.tutor','admin.student','admin.guardian') ? '' : 'hidden' }} py-2 space-y-2">
                    <li>
                        <a href="{{ route('admin.tutor') }}" class="flex items-center w-full p-2 pl-11 rounded-lg {{ request()->routeIs('admin.tutor') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 hover:bg-green-100 dark:text-white dark:hover:bg-green-700' }}">Tutor</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.student') }}" class="flex items-center w-full p-2 pl-11 rounded-lg {{ request()->routeIs('admin.student') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 hover:bg-green-100 dark:text-white dark:hover:bg-green-700' }}">Student</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.guardian') }}" class="flex items-center w-full p-2 pl-11 rounded-lg {{ request()->routeIs('admin.guardian') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 hover:bg-green-100 dark:text-white dark:hover:bg-green-700' }}">Guardian</a>
                    </li>
                </ul>
            </li>
            <!-- Class Management -->
            <li>
                <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-green-100 dark:text-white dark:hover:bg-green-700" aria-controls="dropdown-class" data-collapse-toggle="dropdown-class" aria-expanded="false">
                    <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-green-900 dark:text-gray-400 group-[aria-expanded=true]:text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                        <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                    </svg>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Class Management</span>
                    <svg class="w-3 h-3 transition-transform duration-200 group-[aria-expanded=true]:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-class" class="{{ request()->routeIs('admin.package','admin.class','admin.schedule') ? '' : 'hidden' }} py-2 space-y-2">
                    <li>
                        <a href="{{ route('admin.package') }}" class="flex items-center w-full p-2 pl-11 rounded-lg {{ request()->routeIs('admin.package') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 hover:bg-green-100 dark:text-white dark:hover:bg-green-700' }}">Package</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.class') }}" class="flex items-center w-full p-2 pl-11 rounded-lg {{ request()->routeIs('admin.class') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 hover:bg-green-100 dark:text-white dark:hover:bg-green-700' }}">Class</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.schedule') }}" class="flex items-center w-full p-2 pl-11 rounded-lg {{ request()->routeIs('admin.schedule') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 hover:bg-green-100 dark:text-white dark:hover:bg-green-700' }}">Schedule</a>
                    </li>
                </ul>
            </li>
            <!-- Report Management -->
            <li>
                <a href="{{ route('admin.report') }}" class="flex items-center p-2 rounded-lg group {{ request()->routeIs('admin.report') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 dark:text-white hover:bg-green-100 dark:hover:bg-green-700' }}">
                    <svg class="w-5 h-5 transition duration-75 {{ request()->routeIs('admin.report') ? 'text-green-900 dark:text-green-300' : 'text-gray-500 dark:text-gray-400 group-hover:text-green-900 dark:group-hover:text-green' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Report Management</span>
                </a>
            </li>
            <!-- Payment Management -->
            <li>
                <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-green-100 dark:text-white dark:hover:bg-green-700" aria-controls="dropdown-payment" data-collapse-toggle="dropdown-payment" aria-expanded="false">
                    <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-green-900 dark:text-gray-400 group-[aria-expanded=true]:text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                        <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                    </svg>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Payment Management</span>
                    <svg class="w-3 h-3 transition-transform duration-200 group-[aria-expanded=true]:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-payment" class="{{ request()->routeIs('admin.salary','admin.bill') ? '' : 'hidden' }} py-2 space-y-2">
                    <li>
                        <a href="{{ route('admin.salary') }}" class="flex items-center w-full p-2 pl-11 rounded-lg {{ request()->routeIs('admin.salary') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 hover:bg-green-100 dark:text-white dark:hover:bg-green-700' }}">Salary</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.bill') }}" class="flex items-center w-full p-2 pl-11 rounded-lg {{ request()->routeIs('admin.bill') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 hover:bg-green-100 dark:text-white dark:hover:bg-green-700' }}">Student Bill</a>
                    </li>
                </ul>
            </li>
            <!-- Notification -->
            <li>
                <a href="{{ route('admin.notification') }}" class="flex items-center p-2 rounded-lg group {{ request()->routeIs('admin.notification') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 dark:text-white hover:bg-green-100 dark:hover:bg-green-700' }}">
                    <svg class="w-5 h-5 transition duration-75 {{ request()->routeIs('admin.notification') ? 'text-green-900 dark:text-green-300' : 'text-gray-500 dark:text-gray-400 group-hover:text-green-900 dark:group-hover:text-green' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Notification</span>
                </a>
            </li>
            <!-- Setting -->
            <li>
                <a href="{{ route('admin.setting') }}" class="flex items-center p-2 rounded-lg group {{ request()->routeIs('admin.setting') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 dark:text-white hover:bg-green-100 dark:hover:bg-green-700' }}">
                    <svg class="w-5 h-5 transition duration-75 {{ request()->routeIs('admin.setting') ? 'text-green-900 dark:text-green-300' : 'text-gray-500 dark:text-gray-400 group-hover:text-green-900 dark:group-hover:text-green' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                    </svg>
                    <span class="ms-3">Setting</span>
                </a>
            </li>
        </ul>
    </div>
</aside>