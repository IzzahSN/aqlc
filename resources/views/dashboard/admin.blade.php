<x-admin-layout :title="'Dashboard'">
    <!-- Welcome -->
    <h2 class="text-xl font-bold mb-6">Welcome back, {{ session('name') }}!</h2>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white p-4 rounded-xl shadow">
            <div class="flex items-center gap-3">
                <div>
                    <p class="text-sm text-gray-500">Total Students</p>
                    <h3 class="text-2xl font-bold">46</h3>
                    <div class="flex items-center gap-1 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trending-up w-4 h-4 text-green-500">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 17l6 -6l4 4l8 -8" />
                            <path d="M14 7l7 0l0 7" />
                        </svg>
                        <p class="text-xs text-green-500">3 new students this month</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow">
            <div class="flex items-center gap-3">
                <div>
                    <p class="text-sm text-gray-500">Total Teachers</p>
                    <h3 class="text-2xl font-bold">6</h3>
                    <div class="flex items-center gap-1 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trending-up w-4 h-4 text-yellow-500">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 17l6 -6l4 4l8 -8" />
                            <path d="M14 7l7 0l0 7" />
                        </svg>
                        <p class="text-xs text-yellow-500">0 new teachers this month</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow">
            <div class="flex items-center gap-3">
                <div>
                    <p class="text-sm text-gray-500">Unpaid Fees</p>
                    <h3 class="text-2xl font-bold">RM739</h3>
                    <div class="flex items-center gap-1 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trending-down w-4 h-4 text-red-500">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 7l6 6l4 -4l8 8" />
                            <path d="M21 10l0 7l-7 0" />
                        </svg>
                        <p class="text-xs text-red-500">15% Decrease from last month</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow">
            <div class="flex items-center gap-3">
                <div>
                    <p class="text-sm text-gray-500">Total Revenues</p>
                    <h3 class="text-2xl font-bold">RM11,902</h3>
                    <div class="flex items-center gap-1 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trending-up w-4 h-4 text-green-500">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 17l6 -6l4 4l8 -8" />
                            <path d="M14 7l7 0l0 7" />
                        </svg>
                        <p class="text-xs text-green-500">28% Increase from last month</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Sales Report -->
        <div class="bg-white p-4 rounded-xl shadow">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-semibold">Sales Report</h3>
                <select class="text-sm border rounded-lg px-3 py-1">
                    <option>Select Year</option>
                    <option>2024</option>
                    <option>2025</option>
                </select>
            </div>
            <canvas id="salesChart" height="200"></canvas>
        </div>

        <!-- Student Progress -->
        <div class="bg-white p-4 rounded-xl shadow flex flex-col">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-semibold">Student Progress</h3>
                <select class="text-sm border rounded-lg px-3 py-1">
                    <option>Select Year</option>
                    <option>2024</option>
                    <option>2025</option>
                </select>
            </div>

            <!-- Chart & Legend -->
            <div class="flex items-center justify-between">
                <!-- Pie Chart -->
                <div class="relative w-64 h-64">
                    <canvas id="progressChart"></canvas>
                </div>

                <!-- Custom Legend -->
                <div id="progressLegend" class="ml-6 space-y-2"></div>
            </div>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Sales Report Chart
        new Chart(document.getElementById('salesChart'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Total revenue (RM)',
                    data: [400, 420, 500, 650, 700, 750, 720, 760, 780, 800, 820, 880],
                    borderColor: '#16a34a',
                    backgroundColor: 'rgba(22,163,74,0.2)',
                    fill: true,
                    tension: 0.3
                }]
            }
        });

        // Student Progress Chart
        const progressCtx = document.getElementById('progressChart');
        const progressChart = new Chart(progressCtx, {
            type: 'pie',
            data: {
                labels: ['Iqra’ 1', 'Iqra’ 2', 'Iqra’ 3', 'Iqra’ 4', 'Iqra’ 5', 'Iqra’ 6', 'Quran'],
                datasets: [{
                    data: [15, 10, 20, 10, 15, 10, 20],
                    backgroundColor: [
                        '#06b6d4', '#3b82f6', '#8b5cf6',
                        '#ef4444', '#f97316', '#22c55e', '#eab308'
                    ]
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false
                    } // hide default legend
                }
            }
        });

        // Generate Custom Legend
        const progressLegend = document.getElementById('progressLegend');
        progressChart.data.labels.forEach((label, index) => {
            const color = progressChart.data.datasets[0].backgroundColor[index];
            const value = progressChart.data.datasets[0].data[index];

            const item = document.createElement('div');
            item.classList.add('flex', 'items-center', 'space-x-2', 'text-sm');

            item.innerHTML = `
            <span class="w-4 h-4 rounded-full" style="background-color:${color}"></span>
            <span class="font-medium text-gray-700">${label}</span>
            <span class="text-gray-500">(${value})</span>
        `;
            progressLegend.appendChild(item);
        });
    </script>

</x-admin-layout>