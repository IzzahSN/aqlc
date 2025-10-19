<x-admin-layout :title="'Dashboard'">
    <!-- Welcome -->
    <h2 class="text-xl font-bold mb-6">Welcome back, {{ session('username') }}!</h2>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="bg-white p-4 rounded-sm shadow flex items-center gap-1 border-l-lime-600 border-l-6 justify-between">
                <div>
                    <p class="text-sm font-semibold text-lime-600 uppercase">Total Students</p>
                    <h3 class="text-xl font-bold text-gray-500">46</h3>
                </div>
                <svg class="w-10 h-10 text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12.4472 2.10557c-.2815-.14076-.6129-.14076-.8944 0L5.90482 4.92956l.37762.11119c.01131.00333.02257.00687.03376.0106L12 6.94594l5.6808-1.89361.3927-.13363-5.6263-2.81313ZM5 10V6.74803l.70053.20628L7 7.38747V10c0 .5523-.44772 1-1 1s-1-.4477-1-1Zm3-1c0-.42413.06601-.83285.18832-1.21643l3.49538 1.16514c.2053.06842.4272.06842.6325 0l3.4955-1.16514C15.934 8.16715 16 8.57587 16 9c0 2.2091-1.7909 4-4 4-2.20914 0-4-1.7909-4-4Z"/>
                    <path d="M14.2996 13.2767c.2332-.2289.5636-.3294.8847-.2692C17.379 13.4191 19 15.4884 19 17.6488v2.1525c0 1.2289-1.0315 2.1428-2.2 2.1428H7.2c-1.16849 0-2.2-.9139-2.2-2.1428v-2.1525c0-2.1409 1.59079-4.1893 3.75163-4.6288.32214-.0655.65589.0315.89274.2595l2.34883 2.2606 2.3064-2.2634Z"/>
                </svg>
        </div>

        <div class="bg-white p-4 rounded-sm shadow flex items-center gap-1 border-l-amber-400 border-l-6 justify-between">
                <div>
                    <p class="text-sm font-semibold text-amber-600 uppercase">Total Teachers</p>
                    <h3 class="text-xl font-bold text-gray-500">6</h3>
                </div>
                <svg class="w-10 h-10 text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M16 10c0-.55228-.4477-1-1-1h-3v2h3c.5523 0 1-.4477 1-1Z"/>
                    <path d="M13 15v-2h2c1.6569 0 3-1.3431 3-3 0-1.65685-1.3431-3-3-3h-2.256c.1658-.46917.256-.97405.256-1.5 0-.51464-.0864-1.0091-.2454-1.46967C12.8331 4.01052 12.9153 4 13 4h7c.5523 0 1 .44772 1 1v9c0 .5523-.4477 1-1 1h-2.5l1.9231 4.6154c.2124.5098-.0287 1.0953-.5385 1.3077-.5098.2124-1.0953-.0287-1.3077-.5385L15.75 16l-1.827 4.3846c-.1825.438-.6403.6776-1.0889.6018.1075-.3089.1659-.6408.1659-.9864v-2.6002L14 15h-1ZM6 5.5C6 4.11929 7.11929 3 8.5 3S11 4.11929 11 5.5 9.88071 8 8.5 8 6 6.88071 6 5.5Z"/>
                    <path d="M15 11h-4v9c0 .5523-.4477 1-1 1-.55228 0-1-.4477-1-1v-4H8v4c0 .5523-.44772 1-1 1s-1-.4477-1-1v-6.6973l-1.16797 1.752c-.30635.4595-.92722.5837-1.38675.2773-.45952-.3063-.5837-.9272-.27735-1.3867l2.99228-4.48843c.09402-.14507.2246-.26423.37869-.34445.11427-.05949.24148-.09755.3763-.10887.03364-.00289.06747-.00408.10134-.00355H15c.5523 0 1 .44772 1 1 0 .5523-.4477 1-1 1Z"/>
                </svg>
        </div>

        <div class="bg-white p-4 rounded-sm shadow flex items-center gap-1 border-l-cyan-600 border-l-6 justify-between">
                <div>
                    <p class="text-sm font-semibold text-cyan-600 uppercase">Total Revenues</p>
                    <h3 class="text-xl font-bold text-gray-500">RM11,902</h3>
                </div>
                <svg class="dark:text-white w-10 h-10 text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M7 6a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2h-2v-4a3 3 0 0 0-3-3H7V6Z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M2 11a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-7Zm7.5 1a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5Z" clip-rule="evenodd"/>
                    <path d="M10.5 14.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"/>
                </svg>
        </div>

        <div class="bg-white p-4 rounded-sm shadow flex items-center gap-1 border-l-rose-600 border-l-6 justify-between">
            <div>
                <p class="text-sm font-semibold text-rose-600 uppercase">Unpaid Fees</p>
                <h3 class="text-xl font-bold text-gray-500">RM739</h3>
            </div>
            <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-zoom-money w-10 h-10 text-gray-300"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3.072a8 8 0 0 1 2.32 11.834l5.387 5.387a1 1 0 0 1 -1.414 1.414l-5.388 -5.387a8 8 0 0 1 -12.905 -6.32l.005 -.285a8 8 0 0 1 11.995 -6.643m-2 2.928h-2.5a2.5 2.5 0 0 0 0 5h1a.5 .5 0 1 1 0 1h-2.5a1 1 0 0 0 0 2h2.5a2.5 2.5 0 1 0 0 -5h-1a.5 .5 0 0 1 0 -1h2.5a1 1 0 0 0 0 -2" /></svg>        </div>
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