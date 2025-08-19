<x-admin-layout :title="'Class'">

    <!-- Stats + Chart -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <!-- Left Stats -->
        <div class="lg:col-span-1 space-y-4">
            <div class="bg-white p-5 rounded-2xl shadow flex items-center gap-4 hover:shadow-md transition">
                <div class="p-4 rounded-full bg-blue-100 text-blue-600 text-xl">
                    👨‍🏫
                </div>
                <div>
                    <p class="text-sm text-gray-500">Total Personal Packages</p>
                    <h3 class="text-2xl font-bold text-gray-800">8</h3>
                </div>
            </div>

            <div class="bg-white p-5 rounded-2xl shadow flex items-center gap-4 hover:shadow-md transition">
                <div class="p-4 rounded-full bg-green-100 text-green-600 text-xl">
                    👩‍🏫
                </div>
                <div>
                    <p class="text-sm text-gray-500">Total Tutors</p>
                    <h3 class="text-2xl font-bold text-gray-800">5</h3>
                </div>
            </div>

            <div class="bg-white p-5 rounded-2xl shadow flex items-center gap-4 hover:shadow-md transition">
                <div class="p-4 rounded-full bg-purple-100 text-purple-600 text-xl">
                    📘
                </div>
                <div>
                    <p class="text-sm text-gray-500">Total Group Packages</p>
                    <h3 class="text-2xl font-bold text-gray-800">2</h3>
                </div>
            </div>
        </div>
        <!-- Right Stats -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow p-4 flex flex-col">
            <!-- Title -->
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Number of Class</h2>

            <!-- Content: legend kiri, chart kanan -->
            <div class="flex items-center justify-between ml-12 mx-5">

                <!-- Custom Legend -->
                <div id="chartLegend" class="space-y-2"></div>

                <!-- Donut Chart -->
                <div class="relative w-64 h-64 flex items-center justify-center">
                    <canvas id="classDonutChart"></canvas>

                    <!-- Center text -->
                    <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                        <p class="text-sm text-gray-500">Total Class</p>
                        <p class="text-2xl font-bold">24</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('classDonutChart').getContext('2d');
        const classDonutChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                datasets: [{
                    data: [6, 4, 3, 2, 5, 2, 2],
                    backgroundColor: [
                        '#3B82F6', // Monday
                        '#14B8A6', // Tuesday
                        '#8B5CF6', // Wednesday
                        '#6366F1', // Thursday
                        '#EF4444', // Friday
                        '#FACC15', // Saturday
                        '#FB923C' // Sunday
                    ],
                    borderWidth: 0,
                }]
            },
            options: {
                cutout: '70%',
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        enabled: true,
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                let value = context.raw || 0; // <-- guna context.raw untuk ambil value
                                let total = context.dataset.data.reduce((a, b) => a + b, 0);
                                let percentage = ((value / total) * 100).toFixed(1);
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });

        // Custom Legend
        const legendContainer = document.getElementById('chartLegend');
        legendContainer.innerHTML = ''; // clear dulu kalau ada legend lama

        classDonutChart.data.labels.forEach((label, i) => {
            const color = classDonutChart.data.datasets[0].backgroundColor[i];
            const value = classDonutChart.data.datasets[0].data[i];
            const item = document.createElement('div');
            item.className = "flex items-center space-x-2 text-gray-700";
            item.innerHTML = `
            <span class="w-4 h-4 rounded-full inline-block" style="background-color:${color}"></span>
            <span class="text-sm">${label} - ${value}</span>
        `;
            legendContainer.appendChild(item);
        });
    </script>


    <!-- Packages List -->
    <div class="bg-white p-6 rounded-xl shadow">
        <!-- Header -->
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg font-semibold">List of Packages</h2>
                <p class="text-sm text-gray-500">Manage your packages: add new, search, filter, edit, or delete.</p>
            </div>
            <button data-modal-target="addPackageModal" data-modal-toggle="addPackageModal"
                class="px-4 py-2 text-sm rounded-lg bg-green-600 text-white hover:bg-green-700">
                + Add New Package
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
                <option value="">Type</option>
                <option value="active">Personal</option>
                <option value="inactive">Group</option>
            </select>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">Package ID</th>
                        <th class="px-4 py-3">Package Name</th>
                        <th class="px-4 py-3">Package Type</th>
                        <th class="px-4 py-3">Package Rate</th>
                        <th class="px-4 py-3">Unit</th>
                        <th class="px-4 py-3">No. of Student</th>
                        <th class="px-4 py-3">Class Duration</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-3">PC001</td>
                        <td class="px-4 py-3 font-medium text-gray-900">An-Nur Lite</td>
                        <td class="px-4 py-3">Personal</td>
                        <td class="px-4 py-3">RM25.00</td>
                        <td class="px-4 py-3">Per Session</td>
                        <td class="px-4 py-3">29</td>
                        <td class="px-4 py-3">30 minutes</td>
                        <td class="px-4 py-3 flex gap-2 justify-center">
                            <button class="px-3 py-1 text-xs rounded bg-gray-200 hover:bg-gray-300">Edit</button>
                            <button class="px-3 py-1 text-xs rounded bg-yellow-400 text-white hover:bg-yellow-500">View</button>
                            <button class="px-3 py-1 text-xs rounded bg-red-500 text-white hover:bg-red-600">Delete</button>
                        </td>
                    </tr>

                    <tr class="border-b">
                        <td class="px-4 py-3">PC002</td>
                        <td class="px-4 py-3 font-medium text-gray-900">An-Nur Plus</td>
                        <td class="px-4 py-3">Group</td>
                        <td class="px-4 py-3">RM100.00</td>
                        <td class="px-4 py-3">Per month</td>
                        <td class="px-4 py-3">30</td>
                        <td class="px-4 py-3">1 hour</td>
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

    <!-- Add New Package Modal -->
    <div id="addPackageModal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative bg-white rounded-lg shadow w-full max-w-lg">

            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900">
                    Add New Package
                </h3>
                <button type="button" data-modal-hide="addPackageModal"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center">
                    ✕
                </button>
            </div>

            <!-- Modal body -->
            <form class="p-6 space-y-4">
                <!-- Full Name -->
                <div>
                    <label for="packageName" class="block mb-1 text-sm font-medium text-gray-700">Package Name</label>
                    <input type="text" id="packageName" name="packageName"
                        class="w-full border rounded-lg px-3 py-2 text-sm focus:ring focus:ring-green-200 focus:border-green-400"
                        placeholder="Enter full name" required />
                </div>

                <!-- Modal footer -->
                <div class="flex items-center justify-end gap-3 pt-4 border-t">
                    <button type="button" data-modal-hide="addPackageModal"
                        class="px-4 py-2 text-sm rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-4 py-2 text-sm rounded-lg bg-green-600 text-white hover:bg-green-700">
                        Save Package
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-admin-layout>