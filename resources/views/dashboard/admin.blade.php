<x-admin-layout :title="'Dashboard'">
    <!-- Welcome -->
    <h2 class="text-xl font-bold mb-6">Welcome back, Mustaqim!</h2>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white p-4 rounded-xl shadow">
            <div class="flex items-center gap-3">
                <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                    🎓
                </div>
                <div>
                    <p class="text-sm text-gray-500">Total Students</p>
                    <h3 class="text-2xl font-bold">46</h3>
                    <p class="text-xs text-gray-500">3 new students this month</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow">
            <div class="flex items-center gap-3">
                <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                    👨‍🏫
                </div>
                <div>
                    <p class="text-sm text-gray-500">Total Teachers</p>
                    <h3 class="text-2xl font-bold">6</h3>
                    <p class="text-xs text-gray-500">0 new teachers this month</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow">
            <div class="flex items-center gap-3">
                <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                    🏷️
                </div>
                <div>
                    <p class="text-sm text-gray-500">Unpaid Fees</p>
                    <h3 class="text-2xl font-bold">RM739</h3>
                    <p class="text-xs text-gray-500">15% Decrease from last month</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow">
            <div class="flex items-center gap-3">
                <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">
                    📊
                </div>
                <div>
                    <p class="text-sm text-gray-500">Total Revenues</p>
                    <h3 class="text-2xl font-bold">RM11,902</h3>
                    <p class="text-xs text-gray-500">28% Increase from last month</p>
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
            <canvas id="salesChart" height="150"></canvas>
        </div>

        <!-- Student Progress -->
        <div class="bg-white p-4 rounded-xl shadow">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-semibold">Student Progress</h3>
                <select class="text-sm border rounded-lg px-3 py-1">
                    <option>Select Year</option>
                    <option>2024</option>
                    <option>2025</option>
                </select>
            </div>
            <canvas id="progressChart" height="150"></canvas>
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
        new Chart(document.getElementById('progressChart'), {
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
            }
        });
    </script>

</x-admin-layout>