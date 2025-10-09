<button data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
</button>

<aside id="sidebar-multi-level-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
        <a href="{{ route('admin.dashboard') }}" class=" flex items-center ps-2.5 mb-5">
            <img src="/images/logo-round.svg" class="h-10 w-10 rounded-full shadow me-3" alt=" AQLC Logo" />
            <h2 class="self-center text-sm font-semibold dark:text-white">Pusat Pengajian Quran<br>As-Siraaj</h2>
        </a>
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

                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <!-- Record Management -->
            <li>
                <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-green-100 dark:text-white dark:hover:bg-green-700" aria-controls="dropdown-record" data-collapse-toggle="dropdown-record" aria-expanded="false">
                    <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-green-900 dark:text-gray-400 group-[aria-expanded=true]:text-green-700"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                    </svg>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Record Management</span>
                    <svg class="w-3 h-3 transition-transform duration-200 group-[aria-expanded=true]:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-record" class="{{ request()->routeIs('admin.tutor.index','admin.student.index','admin.guardian.index') ? '' : 'hidden' }} py-2 space-y-2">
                    <li>
                        <a href="{{ route('admin.tutor.index') }}" class="flex items-center w-full p-2 pl-11 rounded-lg {{ request()->routeIs('admin.tutor.index') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 hover:bg-green-100 dark:text-white dark:hover:bg-green-700' }}">Tutor</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.student.index') }}" class="flex items-center w-full p-2 pl-11 rounded-lg {{ request()->routeIs('admin.student.index') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 hover:bg-green-100 dark:text-white dark:hover:bg-green-700' }}">Student</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.guardian.index') }}" class="flex items-center w-full p-2 pl-11 rounded-lg {{ request()->routeIs('admin.guardian.index') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 hover:bg-green-100 dark:text-white dark:hover:bg-green-700' }}">Guardian</a>
                    </li>
                </ul>
            </li>
            <!-- Class Management -->
            <li>
                <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-green-100 dark:text-white dark:hover:bg-green-700" aria-controls="dropdown-class" data-collapse-toggle="dropdown-class" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-500 transition duration-75 group-hover:text-green-900 dark:text-gray-400 group-[aria-expanded=true]:text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697" />
                        <path d="M18 14v4h4" />
                        <path d="M18 11v-4a2 2 0 0 0 -2 -2h-2" />
                        <path d="M8 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                        <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                        <path d="M8 11h4" />
                        <path d="M8 15h3" />
                    </svg>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Class Management</span>
                    <svg class="w-3 h-3 transition-transform duration-200 group-[aria-expanded=true]:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <ul id="dropdown-class" class="{{ request()->routeIs('admin.package.index','admin.class.index','admin.schedule.index') ? '' : 'hidden' }} py-2 space-y-2">
                    <li>
                        <a href="{{ route('admin.package.index') }}" class="flex items-center w-full p-2 pl-11 rounded-lg {{ request()->routeIs('admin.package.index') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 hover:bg-green-100 dark:text-white dark:hover:bg-green-700' }}">Package</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.class.index') }}" class="flex items-center w-full p-2 pl-11 rounded-lg {{ request()->routeIs('admin.class.index') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 hover:bg-green-100 dark:text-white dark:hover:bg-green-700' }}">Class</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.schedule.index') }}" class="flex items-center w-full p-2 pl-11 rounded-lg {{ request()->routeIs('admin.schedule.index') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 hover:bg-green-100 dark:text-white dark:hover:bg-green-700' }}">Schedule</a>
                    </li>
                </ul>
            </li>
            <!-- Report Management -->
            <li>
                <a href="{{ route('admin.report.index') }}" class="flex items-center p-2 rounded-lg group {{ request()->routeIs('admin.report.index') ? 'bg-green-200 text-green-900 dark:bg-green-800 dark:text-green-300' : 'text-gray-900 dark:text-white hover:bg-green-100 dark:hover:bg-green-700' }}">
                    <svg class="w-5 h-5 transition duration-75 {{ request()->routeIs('admin.report.index') ? 'text-green-900 dark:text-green-300' : 'text-gray-500 dark:text-gray-400 group-hover:text-green-900 dark:group-hover:text-green' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                        <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                    </svg>
                    <span class="ms-3">Report Management</span>
                </a>
            </li>
            <!-- Payment Management -->
            <li>
                <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-green-100 dark:text-white dark:hover:bg-green-700" aria-controls="dropdown-payment" data-collapse-toggle="dropdown-payment" aria-expanded="false">

                    <svg class="shrink-0 w-5 h-5 text-gray-500 transition duration-75 group-hover:text-green-900 dark:text-gray-400 group-[aria-expanded=true]:text-green-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M7 15h-3a1 1 0 0 1 -1 -1v-8a1 1 0 0 1 1 -1h12a1 1 0 0 1 1 1v3" />
                        <path d="M7 9m0 1a1 1 0 0 1 1 -1h12a1 1 0 0 1 1 1v8a1 1 0 0 1 -1 1h-12a1 1 0 0 1 -1 -1z" />
                        <path d="M12 14a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
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
                    <svg class="w-5 h-5 transition duration-75 {{ request()->routeIs('admin.notification') ? 'text-green-900 dark:text-green-300' : 'text-gray-500 dark:text-gray-400 group-hover:text-green-900 dark:group-hover:text-green' }}"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                        <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                    </svg>
                    <span class="ms-3">Notification</span>
                </a>
            </li>
        </ul>
    </div>
</aside>