<x-admin-layout :title="'Bill'">
    <!-- Insight -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <div class="lg:col-span-1 space-y-4">
            <div class="bg-white p-6 rounded-2xl shadow flex items-center gap-4 hover:shadow-md transition">
                <div class="p-4 rounded-full bg-blue-100 text-blue-600 text-xl">
                    👨‍🏫
                </div>
                <div>
                    <p class="text-sm text-gray-500">Total Debt</p>
                    <h3 class="text-2xl font-bold text-gray-800">RM 12,500</h3>
                    <p class="text-xs text-gray-500">(+5% vs last month)</p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow flex items-center gap-4 hover:shadow-md transition">
                <div class="p-4 rounded-full bg-green-100 text-green-600 text-xl">
                    👩‍🏫
                </div>
                <div>
                    <p class="text-sm text-gray-500">Total Collected</p>
                    <h3 class="text-2xl font-bold text-gray-800">RM 3,200</h3>
                    <p class="text-xs text-gray-500">(+10% vs last month)</p>
                </div>
            </div>
        </div>
        <!-- Bills Report -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow p-4 flex flex-col">
            <div class="flex items-center justify-between">
                <h3 class="font-semibold">Bill Report</h3>
                <select class="text-sm border rounded-lg px-3 py-1">
                    <option>Select Year</option>
                    <option>2024</option>
                    <option>2025</option>
                </select>
            </div>
            <canvas id="salesChart" height="180"></canvas>
        </div>
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
                        tension: 0.5
                    }]
                }
            });
        </script>
    </div>

    <!-- Bills List -->
    <div class="bg-white p-6 rounded-xl shadow">
        <!-- Header -->
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg font-semibold">List of Bills</h2>
                <p class="text-sm text-gray-500">Manage your bill: add new, search, filter, edit, or delete.</p>
            </div>
            <button data-modal-target="addBillModal" data-modal-toggle="addBillModal"
                class="px-4 py-2 text-sm rounded-lg bg-green-600 text-white hover:bg-green-700">
                + Add New Bill
            </button>

        </div>

        <!-- Search + Filter -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
            <!-- Search -->
            <div class="relative w-full sm:w-full">
                <input type="text" placeholder="Search by name or ID"
                    class="w-full pl-10 pr-4 py-2 text-sm border rounded-lg focus:ring focus:ring-green-200" />
                <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
                </svg>
            </div>
            <!-- Filter -->
            <select class="border rounded-lg px-3 py-2 text-sm w-full sm:w-auto">
                <option value="">All Month</option>
                <option value="january">January</option>
                <option value="february">February</option>
                <option value="march">March</option>
                <option value="april">April</option>
                <option value="may">May</option>
                <option value="june">June</option>
                <option value="july">July</option>
                <option value="august">August</option>
                <option value="september">September</option>
                <option value="october">October</option>
                <option value="november">November</option>
                <option value="december">December</option>
            </select>

            <select class="border rounded-lg px-3 py-2 text-sm w-full sm:w-auto">
                <option value="">All Year</option>
                <option value="2026">2026</option>
                <option value="2025">2025</option>
                <option value="2024">2024</option>
            </select>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Bill Name</th>
                        <th class="px-4 py-3">Month</th>
                        <th class="px-4 py-3">Year</th>
                        <th class="px-4 py-3">Allocation Date</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-3">1</td>
                        <td class="px-4 py-3 font-medium text-gray-900">Bill-Jan-2025</td>
                        <td class="px-4 py-3">January</td>
                        <td class="px-4 py-3">2025</td>
                        <td class="px-4 py-3">31/01/2025</td>
                        <td class="px-4 py-3 flex gap-2 justify-center">
                            <button class="px-3 py-1 text-xs rounded bg-gray-200 hover:bg-gray-300">Edit</button>
                            <button class="px-3 py-1 text-xs rounded bg-yellow-400 text-white hover:bg-yellow-500">View</button>
                            <button class="px-3 py-1 text-xs rounded bg-red-500 text-white hover:bg-red-600">Delete</button>
                        </td>
                    </tr>

                    <tr class="border-b">
                        <td class="px-4 py-3">2</td>
                        <td class="px-4 py-3 font-medium text-gray-900">Bill-Feb-2025</td>
                        <td class="px-4 py-3">February</td>
                        <td class="px-4 py-3">2025</td>
                        <td class="px-4 py-3">28/02/2025</td>
                        <td class="px-4 py-3 flex gap-2 justify-center">
                            <button class="px-3 py-1 text-xs rounded bg-gray-200 hover:bg-gray-300">Edit</button>
                            <button class="px-3 py-1 text-xs rounded bg-yellow-400 text-white hover:bg-yellow-500">View</button>
                            <button class="px-3 py-1 text-xs rounded bg-red-500 text-white hover:bg-red-600">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex items-center justify-between mt-4">
            <div class="flex items-center gap-2">
                <span class="text-sm text-gray-500">Result per page</span>
                <select class="border rounded px-2 py-1 text-sm">
                    <option>10</option>
                    <option>20</option>
                    <option>50</option>
                </select>
            </div>

            <div class="flex items-center gap-2">
                <button class="px-3 py-1 border rounded text-sm text-gray-500 hover:bg-gray-100">&lt; Back</button>
                <button class="px-3 py-1 border rounded text-sm bg-green-600 text-white">1</button>
                <button class="px-3 py-1 border rounded text-sm">2</button>
                <button class="px-3 py-1 border rounded text-sm">3</button>
                <button class="px-3 py-1 border rounded text-sm">Next &gt;</button>
            </div>
        </div>
    </div>


</x-admin-layout>