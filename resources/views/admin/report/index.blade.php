<x-admin-layout :title="'Report'">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">

        <div class="lg:col-span-1 space-y-4">
            <div class="bg-white p-5 rounded-2xl shadow flex items-center gap-4 hover:shadow-md transition">
                <div class="p-4 rounded-full bg-blue-100 text-blue-600 text-xl">
                    👨‍🏫
                </div>
                <div>
                    <p class="text-sm text-gray-500">Total Finished Iqra'</p>
                    <h3 class="text-2xl font-bold text-gray-800">8</h3>
                </div>
            </div>

            <div class="bg-white p-5 rounded-2xl shadow flex items-center gap-4 hover:shadow-md transition">
                <div class="p-4 rounded-full bg-green-100 text-green-600 text-xl">
                    👩‍🏫
                </div>
                <div>
                    <p class="text-sm text-gray-500">Total Finished Quran</p>
                    <h3 class="text-2xl font-bold text-gray-800">5</h3>
                </div>
            </div>
            <div class="bg-white p-5 rounded-2xl shadow flex items-center gap-4 hover:shadow-md transition">
                <div class="p-4 rounded-full bg-purple-100 text-purple-600 text-xl">
                    📘
                </div>
                <div>
                    <p class="text-sm text-gray-500">Total Students</p>
                    <h3 class="text-2xl font-bold text-gray-800">2</h3>
                </div>
            </div>
        </div>

        <div class="lg:col-span-2 bg-white rounded-2xl p-4 flex flex-col shadow-md">
            <!-- Header -->
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Student Progress Report</h2>
                <div>
                    <!-- Styled Dropdown -->
                    <div class="relative inline-block w-full sm:w-48">
                        <select
                            class="block w-full rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm text-gray-700 shadow-sm transition ease-in-out duration-150">
                            <option value="quran">Quran</option>
                            <option value="iqra">Iqra'</option>
                        </select>
                    </div>

                </div>
            </div>

            <!-- Chart -->
            <div class="w-full h-62">
                <canvas id="progressChart"></canvas>
            </div>
        </div>

        <!-- Chart.js CDN -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            // Generate labels from 1 → 30
            const labels = Array.from({
                length: 30
            }, (_, i) => i + 1);

            // Example random data for 30 days
            const data = labels.map(() => Math.floor(Math.random() * 120) + 20);

            const ctx = document.getElementById('progressChart').getContext('2d');
            const progressChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Progress',
                        data: data,
                        backgroundColor: '#3B82F6', // Tailwind blue-500
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            ticks: {
                                autoSkip: false, // biar semua label keluar
                                maxRotation: 0, // elak tulisan senget
                                minRotation: 0
                            }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 20
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        </script>
    </div>

    <!-- Report List -->
    <div class="bg-white p-6 rounded-xl shadow">
        <!-- Header -->
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg font-semibold">List of Report</h2>
                <p class="text-sm text-gray-500">Manage your report: search, filter and update.</p>
            </div>
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
                <option value="">Day</option>
                <option value="monday">Monday</option>
                <option value="tuesday">Tuesday</option>
                <option value="wednesday">Wednesday</option>
                <option value="thursday">Thursday</option>
                <option value="friday">Friday</option>
                <option value="saturday">Saturday</option>
                <option value="sunday">Sunday</option>
            </select>
            <select class="border rounded-lg px-3 py-2 text-sm w-full sm:w-auto">
                <option value="">Room</option>
                <option value="1">Kelas 1</option>
                <option value="2">Kelas 2</option>
                <option value="3">Kelas 3</option>
                <option value="4">Kelas 4</option>
                <option value="5">Kelas 5</option>
                <option value="6">Kelas 6</option>
            </select>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Class Name</th>
                        <th class="px-4 py-3">Package Type</th>
                        <th class="px-4 py-3">Tutor Name</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-3">1</td>
                        <td class="px-4 py-3 font-medium text-gray-900">Mon-20-K1</td>
                        <td class="px-4 py-3">Personal</td>
                        <td class="px-4 py-3">Ustaz Hafiz</td>
                        <td class="px-4 py-3">12/09/2025</td>
                        <td class="px-4 py-3 flex gap-2 justify-center">
                            <a href="{{ route('admin.report.grade') }}" class="px-3 py-1 text-xs rounded bg-yellow-400 text-white hover:bg-yellow-500">Grade</a>
                            <a href="{{ route('admin.report.lesson-plan') }}" class="px-3 py-1 text-xs rounded bg-green-500 text-white hover:bg-green-600">Lesson Plan</a>
                        </td>
                    </tr>

                    <tr class="border-b">
                        <td class="px-4 py-3">2</td>
                        <td class="px-4 py-3 font-medium text-gray-900">Tue-21-K1</td>
                        <td class="px-4 py-3">Group</td>
                        <td class="px-4 py-3">Ustazah Nuha</td>
                        <td class="px-4 py-3">10/08/2025</td>
                        <td class="px-4 py-3 flex gap-2 justify-center">
                            <a href="{{ route('admin.report.grade') }}" class="px-3 py-1 text-xs rounded bg-yellow-400 text-white hover:bg-yellow-500">Grade</a>
                            <a href="{{ route('admin.report.lesson-plan') }}" class="px-3 py-1 text-xs rounded bg-green-500 text-white hover:bg-green-600">Lesson Plan</a>
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