<x-tutor-layout :title="'Dashboard'">
    <!-- Welcome -->
    <h2 class="text-xl font-bold mb-6">Welcome back, {{ session('username') }}!</h2>

    <!-- Tutor Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <!-- Schedule Attendance -->
        <div class="bg-white p-4 rounded-sm shadow flex items-center gap-1 border-l-lime-600 border-l-6 justify-between">
            <div>
                <p class="text-sm font-semibold text-lime-600 uppercase">Total Schedule</p>
                <div class="flex items-end gap-2">
                    <h3 class="text-2xl font-bold text-gray-500">{{ $totalSchedules }}</h3>
                    <p class="text-xs text-gray-400 mb-1">This month</p>
                </div>
            </div>
            <svg class="w-10 h-10 text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
            </svg>
        </div>

        <!-- Assign Class -->
        <div class="bg-white p-4 rounded-sm shadow flex items-center gap-1 border-l-amber-400 border-l-6 justify-between">
            <div>
                <p class="text-sm font-semibold text-amber-600 uppercase">Total Assigned Class</p>
                <h3 class="text-2xl font-bold text-gray-500">{{ $totalClasses }}</h3>
            </div>
            <svg class="w-10 h-10 text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
            </svg>
        </div>

        <!-- Salary -->
        <div class="bg-white p-4 rounded-sm shadow flex items-center gap-1 border-l-red-600 border-l-6 justify-between">
            <div>
                <p class="text-sm font-semibold text-red-600 uppercase">Outstanding Salary</p>
                <h3 class="text-2xl font-bold text-gray-500">RM{{ number_format($unpaidSalary, 2) }}</h3>
            </div>
            <svg class="w-10 h-10 text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M9 2a1 1 0 0 0-1 1H6a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-2a1 1 0 0 0-1-1H9Zm1 2h4v2h1a1 1 0 1 1 0 2H9a1 1 0 0 1 0-2h1V4Zm5.707 8.707a1 1 0 0 0-1.414-1.414L11 14.586l-1.293-1.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
            </svg>
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

<!-- Upcoming Sessions Section -->
<div class="bg-white p-4 rounded-xl shadow flex flex-col lg:col-span-1">
    <div class="flex items-center justify-between mb-4">
        <h3 class="font-semibold text-gray-800">Upcoming Sessions</h3>
    </div>

    <!-- Scrollable container -->
    <div class="space-y-3 max-h-[60vh] overflow-y-auto pr-2">
        @forelse ($schedules as $schedule)
            <a href="{{ route('tutor.report.attendance.index', $schedule->schedule_id) }}"
                class="group flex items-center justify-between p-4 rounded-lg shadow bg-gray-100 hover:bg-green-700 transition cursor-pointer">
                
                <div class="flex items-center gap-3">
                    <!-- Calendar Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="currentColor"
                        class="group-hover:text-white transition text-emerald-600">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M16 2c.183 0 .355 .05 .502 .135l.033 .02c.28 .177 .465 .49 .465 .845v1h1a3 3 0 0 1 2.995 2.824l.005 .176v12a3 3 0 0 1 -2.824 2.995l-.176 .005h-12a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-12a3 3 0 0 1 2.824 -2.995l.176 -.005h1v-1a1 1 0 0 1 .514 -.874l.093 -.046l.066 -.025l.1 -.029l.107 -.019l.12 -.007q .083 0 .161 .013l.122 .029l.04 .012l.06 .023c.328 .135 .568 .44 .61 .806l.007 .117v1h6v-1a1 1 0 0 1 1 -1m3 7h-14v9.625c0 .705 .386 1.286 .883 1.366l.117 .009h12c.513 0 .936 -.53 .993 -1.215l.007 -.16z" />
                        <path d="M9.015 13a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1" />
                        <path d="M13.015 13a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1" />
                        <path d="M17.02 13a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1" />
                        <path d="M12.02 15a1 1 0 0 1 0 2a1.001 1.001 0 1 1 -.005 -2z" />
                        <path d="M9.015 16a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1" />
                    </svg>

                    <!-- Text -->
                    <div>
                        <p class="text-sm font-semibold text-gray-700 group-hover:text-white transition">
                            {{ $schedule->class->class_name }}
                        </p>
                        <p class="text-xs text-gray-500 group-hover:text-white transition">
                            {{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }}
                        </p>
                    </div>
                </div>

                <!-- Chevron Right -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="text-gray-400 group-hover:text-white transition">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M9 6l6 6l-6 6" />
                </svg>
            </a>
        @empty
            <div class="text-center py-6 text-gray-500 text-sm bg-gray-50 rounded-lg border border-dashed">
                <i class="fas fa-calendar-times text-2xl text-gray-400 mb-2"></i>
                <p>No upcoming sessions scheduled.</p>
            </div>
        @endforelse
    </div>
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