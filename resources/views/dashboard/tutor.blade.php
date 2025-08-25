<x-tutor-layout :title="'Dashboard'">
    <!-- Welcome -->
    <h2 class="text-xl font-bold mb-6">Welcome back, Ustaz Jazmy!</h2>

    <!-- Tutor Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <!-- Schedule Attendance -->
        <div class="bg-white p-4 rounded-xl shadow">
            <div class="flex items-center gap-3">
                <div class="p-3 rounded-full bg-green-100 text-green-600">
                    📅
                </div>
                <div>
                    <p class="text-sm text-gray-500">Classes This Week</p>
                    <h3 class="text-2xl font-bold">12</h3>
                    <p class="text-xs text-gray-500">2 more than last week</p>
                </div>
            </div>
        </div>

        <!-- Report Management -->
        <div class="bg-white p-4 rounded-xl shadow">
            <div class="flex items-center gap-3">
                <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                    📝
                </div>
                <div>
                    <p class="text-sm text-gray-500">Reports Updated</p>
                    <h3 class="text-2xl font-bold">18</h3>
                    <p class="text-xs text-gray-500">5 pending to update</p>
                </div>
            </div>
        </div>

        <!-- Salary -->
        <div class="bg-white p-4 rounded-xl shadow">
            <div class="flex items-center gap-3">
                <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                    💰
                </div>
                <div>
                    <p class="text-sm text-gray-500">Salary Status</p>
                    <h3 class="text-2xl font-bold">Paid</h3>
                    <p class="text-xs text-gray-500">Last received: Aug 15, 2025</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Salary Report -->
        <div class="bg-white p-4 rounded-xl shadow lg:col-span-2">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-semibold">Salary Report</h3>
                <select class="text-sm border rounded-lg px-3 py-1">
                    <option>Select Year</option>
                    <option>2024</option>
                    <option>2025</option>
                </select>
            </div>
            <canvas id="salaryChart" height="200"></canvas>
        </div>

        <!-- Active Sessions Section -->
        <div class="bg-white p-4 rounded-xl shadow flex flex-col lg:col-span-1">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-semibold text-gray-800">Active Sessions</h3>
            </div>

            <div class="space-y-3">
                <!-- Completed Session -->
                <div class="flex items-center justify-between p-4 rounded-lg bg-green-100 shadow">
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-calendar-week text-emerald-600">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M16 2c.183 0 .355 .05 .502 .135l.033 .02c.28 .177 .465 .49 .465 .845v1h1a3 3 0 0 1 2.995 2.824l.005 .176v12a3 3 0 0 1 -2.824 2.995l-.176 .005h-12a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-12a3 3 0 0 1 2.824 -2.995l.176 -.005h1v-1a1 1 0 0 1 .514 -.874l.093 -.046l.066 -.025l.1 -.029l.107 -.019l.12 -.007q .083 0 .161 .013l.122 .029l.04 .012l.06 .023c.328 .135 .568 .44 .61 .806l.007 .117v1h6v-1a1 1 0 0 1 1 -1m3 7h-14v9.625c0 .705 .386 1.286 .883 1.366l.117 .009h12c.513 0 .936 -.53 .993 -1.215l.007 -.16z" />
                            <path d="M9.015 13a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1" />
                            <path d="M13.015 13a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1" />
                            <path d="M17.02 13a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1" />
                            <path d="M12.02 15a1 1 0 0 1 0 2a1.001 1.001 0 1 1 -.005 -2z" />
                            <path d="M9.015 16a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1" />
                        </svg>
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Mon-2100-B1</p>
                            <p class="text-xs text-gray-500">22/09/2024</p>
                        </div>
                    </div>
                    <span class="text-green-600 text-lg">
                        <i class="fas fa-check-circle"></i>
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-circle-check text-green-800">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" />
                    </svg>
                </div>

                <!-- Pending Session (Clickable) -->
                <a href="{{ route('tutor.schedule') }}"
                    class="group flex items-center justify-between p-4 rounded-lg shadow bg-gray-100 hover:bg-amber-500 transition cursor-pointer">
                    <div class="flex items-center gap-3">
                        <!-- Calendar Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="group-hover:text-white transition icon icon-tabler icons-tabler-filled icon-tabler-calendar-week text-emerald-600">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M16 2c.183 0 .355 .05 .502 .135l.033 .02c.28 .177 .465 .49 .465 .845v1h1a3 3 0 0 1 2.995 2.824l.005 .176v12a3 3 0 0 1 -2.824 2.995l-.176 .005h-12a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-12a3 3 0 0 1 2.824 -2.995l.176 -.005h1v-1a1 1 0 0 1 .514 -.874l.093 -.046l.066 -.025l.1 -.029l.107 -.019l.12 -.007q .083 0 .161 .013l.122 .029l.04 .012l.06 .023c.328 .135 .568 .44 .61 .806l.007 .117v1h6v-1a1 1 0 0 1 1 -1m3 7h-14v9.625c0 .705 .386 1.286 .883 1.366l.117 .009h12c.513 0 .936 -.53 .993 -1.215l.007 -.16z" />
                            <path d="M9.015 13a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1" />
                            <path d="M13.015 13a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1" />
                            <path d="M17.02 13a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1" />
                            <path d="M12.02 15a1 1 0 0 1 0 2a1.001 1.001 0 1 1 -.005 -2z" />
                            <path d="M9.015 16a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1" />
                        </svg>
                        <!-- Text -->
                        <div>
                            <p class="text-sm font-semibold text-gray-700 group-hover:text-white transition">Tue-2100-B1</p>
                            <p class="text-xs text-gray-500 group-hover:text-white transition">21/09/2025</p>
                        </div>
                    </div>
                    <!-- Arrow Icon -->
                    <span class="text-green-500 group-hover:text-white text-lg transition">
                        <i class="fas fa-arrow-right"></i>
                    </span>

                    <!-- Chevron Right -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="text-gray-400 group-hover:text-white transition">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 6l6 6l-6 6" />
                    </svg>
                </a>
                <a href="{{ route('tutor.schedule') }}"
                    class="group flex items-center justify-between p-4 rounded-lg shadow bg-gray-100 hover:bg-amber-500 transition cursor-pointer">
                    <div class="flex items-center gap-3">
                        <!-- Calendar Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="group-hover:text-white transition icon icon-tabler icons-tabler-filled icon-tabler-calendar-week text-emerald-600">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M16 2c.183 0 .355 .05 .502 .135l.033 .02c.28 .177 .465 .49 .465 .845v1h1a3 3 0 0 1 2.995 2.824l.005 .176v12a3 3 0 0 1 -2.824 2.995l-.176 .005h-12a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-12a3 3 0 0 1 2.824 -2.995l.176 -.005h1v-1a1 1 0 0 1 .514 -.874l.093 -.046l.066 -.025l.1 -.029l.107 -.019l.12 -.007q .083 0 .161 .013l.122 .029l.04 .012l.06 .023c.328 .135 .568 .44 .61 .806l.007 .117v1h6v-1a1 1 0 0 1 1 -1m3 7h-14v9.625c0 .705 .386 1.286 .883 1.366l.117 .009h12c.513 0 .936 -.53 .993 -1.215l.007 -.16z" />
                            <path d="M9.015 13a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1" />
                            <path d="M13.015 13a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1" />
                            <path d="M17.02 13a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1" />
                            <path d="M12.02 15a1 1 0 0 1 0 2a1.001 1.001 0 1 1 -.005 -2z" />
                            <path d="M9.015 16a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1" />
                        </svg>
                        <!-- Text -->
                        <div>
                            <p class="text-sm font-semibold text-gray-700 group-hover:text-white transition">Tue-2100-B1</p>
                            <p class="text-xs text-gray-500 group-hover:text-white transition">21/09/2025</p>
                        </div>
                    </div>
                    <!-- Arrow Icon -->
                    <span class="text-green-500 group-hover:text-white text-lg transition">
                        <i class="fas fa-arrow-right"></i>
                    </span>

                    <!-- Chevron Right -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="text-gray-400 group-hover:text-white transition">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 6l6 6l-6 6" />
                    </svg>
                </a>
                <a href="{{ route('tutor.schedule') }}"
                    class="group flex items-center justify-between p-4 rounded-lg shadow bg-gray-100 hover:bg-amber-500 transition cursor-pointer">
                    <div class="flex items-center gap-3">
                        <!-- Calendar Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="group-hover:text-white transition icon icon-tabler icons-tabler-filled icon-tabler-calendar-week text-emerald-600">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M16 2c.183 0 .355 .05 .502 .135l.033 .02c.28 .177 .465 .49 .465 .845v1h1a3 3 0 0 1 2.995 2.824l.005 .176v12a3 3 0 0 1 -2.824 2.995l-.176 .005h-12a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-12a3 3 0 0 1 2.824 -2.995l.176 -.005h1v-1a1 1 0 0 1 .514 -.874l.093 -.046l.066 -.025l.1 -.029l.107 -.019l.12 -.007q .083 0 .161 .013l.122 .029l.04 .012l.06 .023c.328 .135 .568 .44 .61 .806l.007 .117v1h6v-1a1 1 0 0 1 1 -1m3 7h-14v9.625c0 .705 .386 1.286 .883 1.366l.117 .009h12c.513 0 .936 -.53 .993 -1.215l.007 -.16z" />
                            <path d="M9.015 13a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1" />
                            <path d="M13.015 13a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1" />
                            <path d="M17.02 13a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1" />
                            <path d="M12.02 15a1 1 0 0 1 0 2a1.001 1.001 0 1 1 -.005 -2z" />
                            <path d="M9.015 16a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1" />
                        </svg>
                        <!-- Text -->
                        <div>
                            <p class="text-sm font-semibold text-gray-700 group-hover:text-white transition">Tue-2100-B1</p>
                            <p class="text-xs text-gray-500 group-hover:text-white transition">21/09/2025</p>
                        </div>
                    </div>
                    <!-- Arrow Icon -->
                    <span class="text-green-500 group-hover:text-white text-lg transition">
                        <i class="fas fa-arrow-right"></i>
                    </span>

                    <!-- Chevron Right -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="text-gray-400 group-hover:text-white transition">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 6l6 6l-6 6" />
                    </svg>
                </a>
            </div>
            <!-- See More / See Less Button -->
            <button class="mt-4 text-sm px-4 py-2 rounded-lg border border-gray-300 hover:bg-gray-100 transition">
                <span x-show="!expanded">See More</span>
            </button>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Sales Report Chart
        new Chart(document.getElementById('salaryChart'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Total Salary (RM)',
                    data: [400, 420, 500, 650, 700, 750, 720, 760, 780, 800, 820, 880],
                    borderColor: '#16a34a',
                    backgroundColor: 'rgba(22,163,74,0.2)',
                    fill: true,
                    tension: 0.3
                }]
            }
        });
    </script>

</x-tutor-layout>