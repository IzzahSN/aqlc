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
                    <p class="text-sm text-gray-500">Total Available Classes</p>
                    <h3 class="text-2xl font-bold text-gray-800">8</h3>
                </div>
            </div>

            <div class="bg-white p-5 rounded-2xl shadow flex items-center gap-4 hover:shadow-md transition">
                <div class="p-4 rounded-full bg-green-100 text-green-600 text-xl">
                    👩‍🏫
                </div>
                <div>
                    <p class="text-sm text-gray-500">Total Full Classes</p>
                    <h3 class="text-2xl font-bold text-gray-800">5</h3>
                </div>
            </div>

            <div class="bg-white p-5 rounded-2xl shadow flex items-center gap-4 hover:shadow-md transition">
                <div class="p-4 rounded-full bg-purple-100 text-purple-600 text-xl">
                    📘
                </div>
                <div>
                    <p class="text-sm text-gray-500">Total Classes</p>
                    <h3 class="text-2xl font-bold text-gray-800">2</h3>
                </div>
            </div>
        </div>
        <!-- Right Stats -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow p-4 flex flex-col">
            <!-- Title -->
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Number of Classes</h2>

            <!-- Content: legend kiri, chart kanan -->
            <div class="flex items-center justify-between ml-12 mx-5">

                <!-- Custom Legend -->
                <div id="chartLegend" class="space-y-2"></div>

                <!-- Donut Chart -->
                <div class="relative w-64 h-64 flex items-center justify-center">
                    <canvas id="classDonutChart"></canvas>

                    <!-- Center text -->
                    <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                        <p class="text-sm text-gray-500">Total Classes</p>
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


    <!-- Classes List -->
    <div class="bg-white p-6 rounded-xl shadow">
        <!-- Header -->
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg font-semibold">List of Classes</h2>
                <p class="text-sm text-gray-500">Manage your classes: add new, search, filter, edit, or delete.</p>
            </div>
            <button data-modal-target="addClassModal" data-modal-toggle="addClassModal"
                class="px-4 py-2 text-sm rounded-lg bg-green-600 text-white hover:bg-green-700">
                + Add New Class
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
                <option value="">Status</option>
                <option value="full">Full</option>
                <option value="available">Available</option>
            </select>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Class Name</th>
                        <th class="px-4 py-3">Room</th>
                        <th class="px-4 py-3">Day</th>
                        <th class="px-4 py-3">Start Time</th>
                        <th class="px-4 py-3">End Time</th>
                        <th class="px-4 py-3">Tutor Name</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-3">1</td>
                        <td class="px-4 py-3 font-medium text-gray-900">Mon-20-K1</td>
                        <td class="px-4 py-3">Kelas 1</td>
                        <td class="px-4 py-3">Monday</td>
                        <td class="px-4 py-3">20:00:00</td>
                        <td class="px-4 py-3">21:00:00</td>
                        <td class="px-4 py-3">Ustaz Aamir</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">Available</span>
                        </td>
                        <td class="px-4 py-3 flex gap-2 justify-center">
                            <button type="button" class="px-3 py-1 text-xs rounded bg-gray-200 hover:bg-gray-300" data-modal-target="editClassModal" data-modal-toggle="editClassModal">Edit</button>
                            <a href="{{ route('admin.class.report') }}" class="px-3 py-1 text-xs rounded bg-yellow-400 text-white hover:bg-yellow-500">Report</a>
                            <button class="px-3 py-1 text-xs rounded bg-red-500 text-white hover:bg-red-600">Delete</button>
                        </td>
                    </tr>

                    <tr class="border-b">
                        <td class="px-4 py-3">2</td>
                        <td class="px-4 py-3 font-medium text-gray-900">Tue-21-K4</td>
                        <td class="px-4 py-3">Kelas 4</td>
                        <td class="px-4 py-3">Tuesday</td>
                        <td class="px-4 py-3">21:00:00</td>
                        <td class="px-4 py-3">22:00:00</td>
                        <td class="px-4 py-3">Ustazah Husniah</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-600">Full</span>
                        </td>
                        <td class="px-4 py-3 flex gap-2 justify-center">
                            <button type="button" class="px-3 py-1 text-xs rounded bg-gray-200 hover:bg-gray-300" data-modal-target="editClassModal" data-modal-toggle="editClassModal">Edit</button>
                            <a href="{{ route('admin.class.report') }}" class="px-3 py-1 text-xs rounded bg-yellow-400 text-white hover:bg-yellow-500">Report</a>
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

    <!-- Add Class Modal -->
    <div id="addClassModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative w-full max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <div class="w-6"></div>
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Add New Class</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="addClassModal">✕</button>
            </div>

            <!-- Modal Body -->
            <form id="addClassForm" action="{{ route('admin.class.store') }}" method="POST">
                @csrf
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                        <!-- Package name -->
                        <div>
                            <label for="package_id" class="block mb-2 text-sm font-medium text-gray-900">Select Package</label>
                            <select id="package_id" name="package_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Select Package</option>
                                @foreach($packages as $package)
                                    <option value="{{ $package->package_id }}" data-duration="{{ $package->duration_per_sessions }}">
                                        {{ $package->package_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Package duration -->
                        <div>
                            <label for="duration_per_sessions" class="block mb-2 text-sm font-medium text-gray-900">Duration Per Session</label>
                            <input type="text" id="duration_per_sessions" name="duration_per_sessions"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    focus:ring-green-500 focus:border-green-500 block w-full p-2.5" readonly>
                        </div>

                        <script>
                            document.getElementById('package_id').addEventListener('change', function() {
                                let selected = this.options[this.selectedIndex];
                                let duration = selected.getAttribute('data-duration') || '';
                                document.getElementById('duration_per_sessions').value = duration;
                            });
                        </script>

                        <!-- Class Name -->
                        <div>
                            <label for="class_name" class="block mb-2 text-sm font-medium text-gray-900">Class Name</label>
                            <input type="text" id="class_name" name="class_name" placeholder="Mon-2000-K1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        <!-- Day -->
                        <div>
                            <label for="day" class="block mb-2 text-sm font-medium text-gray-900">Select Day</label>
                            <select id="day" name="day" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Day</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </select>
                        </div>

                       <!-- Start Time -->
                        <div>
                            <label for="start_time" class="block mb-2 text-sm font-medium text-gray-900">Start Time</label>
                            <input type="time" id="start_time" name="start_time"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        <!-- End Time -->
                        <div>
                            <label for="end_time" class="block mb-2 text-sm font-medium text-gray-900">End Time</label>
                            <input type="time" id="end_time" name="end_time"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required readonly>
                        </div>

                        <script>
                            const packageSelect = document.getElementById('package_id');
                            const durationInput = document.getElementById('duration_per_sessions');
                            const startInput = document.getElementById('start_time');
                            const endInput = document.getElementById('end_time');

                            // bila pilih package → auto isi duration
                            packageSelect.addEventListener('change', function() {
                                let selected = this.options[this.selectedIndex];
                                let duration = selected.getAttribute('data-duration') || '';
                                durationInput.value = duration;

                                // reset end time kalau ada start time
                                if (startInput.value) {
                                    calculateEndTime();
                                }
                            });

                            // bila isi start time → auto calculate end time
                            startInput.addEventListener('change', calculateEndTime);

                            function calculateEndTime() {
                                let duration = durationInput.value;
                                if (!duration || !startInput.value) return;

                                let [h, m] = startInput.value.split(':').map(Number);

                                if (duration.includes('30')) {
                                    m += 30;
                                } else if (duration.includes('1')) {
                                    h += 1;
                                }

                                if (m >= 60) {
                                    h += Math.floor(m / 60);
                                    m = m % 60;
                                }

                                // format jadi HH:MM
                                let end = `${String(h).padStart(2, '0')}:${String(m).padStart(2, '0')}`;
                                endInput.value = end;
                            }
                        </script>

                        <!-- Room -->
                        <div>
                            <label for="room" class="block mb-2 text-sm font-medium text-gray-900">Select Room</label>
                            <select id="room" name="room" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Room</option>
                                <option value="Kelas 1">Kelas 1</option>
                                <option value="Kelas 2">Kelas 2</option>
                                <option value="Kelas 3">Kelas 3</option>
                                <option value="Kelas 4">Kelas 4</option>
                                <option value="Bilik 1">Bilik 1</option>
                                <option value="Bilik 2">Bilik 2</option>
                            </select>
                        </div>

                        <!-- Capacity -->
                        <div>
                            <label for="capacity" class="block mb-2 text-sm font-medium text-gray-900">Capacity</label>
                            <input type="number" id="capacity" name="capacity" placeholder="15" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                            <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Select Status</option>
                                <option value="Available">Available</option>
                                <option value="Full">Full</option>
                            </select>
                        </div>

                        <!-- Tutor Assign -->
                       <div>
                            <label for="tutor_id" class="block mb-2 text-sm font-medium text-gray-900">Assign Tutor</label>
                            <select id="tutor_id" name="tutor_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Select Tutor</option>
                                @foreach($tutors as $tutor)
                                    <option value="{{ $tutor->tutor_id }}">{{ $tutor->username }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button" class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="addClassModal">Cancel</button>

                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-6 py-2.5 text-center">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Class Modal -->
    <div id="editClassModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative w-full max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <div class="w-6"></div>
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Edit Class</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="editClassModal">✕</button>
            </div>

            <!-- Modal Body -->
            <form id="classForm">
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                        <!-- Class Name -->
                        <div>
                            <label for="class_name" class="block mb-2 text-sm font-medium text-gray-900">Class Name</label>
                            <input type="text" id="class_name" name="class_name" placeholder="Mon-2000-K1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        <!-- Day -->
                        <div>
                            <label for="day" class="block mb-2 text-sm font-medium text-gray-900">Select Day</label>
                            <select id="day" name="day" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Day</option>
                                <option value="monday">Monday</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wednesday">Wednesday</option>
                                <option value="thursday">Thursday</option>
                                <option value="friday">Friday</option>
                                <option value="saturday">Saturday</option>
                                <option value="sunday">Sunday</option>
                            </select>
                        </div>

                        <!-- Start Time -->
                        <div>
                            <label for="start_time" class="block mb-2 text-sm font-medium text-gray-900">Start Time</label>
                            <input type="time" id="start_time" name="start_time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        <!-- End Time -->
                        <div>
                            <label for="end_time" class="block mb-2 text-sm font-medium text-gray-900">End Time</label>
                            <input type="time" id="end_time" name="end_time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>


                        <!-- Room -->
                        <div>
                            <label for="room" class="block mb-2 text-sm font-medium text-gray-900">Select Room</label>
                            <select id="room" name="room" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Room</option>
                                <option value="1">Kelas 1</option>
                                <option value="2">Kelas 2</option>
                                <option value="3">Kelas 3</option>
                                <option value="4">Kelas 4</option>
                                <option value="5">Kelas 5</option>
                                <option value="6">Kelas 6</option>
                            </select>
                        </div>

                        <!-- Capacity -->
                        <div>
                            <label for="capacity" class="block mb-2 text-sm font-medium text-gray-900">Capacity</label>
                            <input type="number" id="capacity" name="capacity" placeholder="15" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                            <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Select Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <!-- Tutor Assign -->
                        <div>
                            <label for="tutor" class="block mb-2 text-sm font-medium text-gray-900">Assign Tutor</label>
                            <select id="tutor" name="tutor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Select Tutor</option>
                                <option value="1">Ustaz Hakeem</option>
                                <option value="2">Ustazah Aira</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button" class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="editClassModal">Cancel</button>

                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-6 py-2.5 text-center">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

     @if(session('closeModalAdd'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Cari button yang ada data-modal-hide="addPackageModal"
            const closeBtn = document.querySelector('[data-modal-hide="addClassModal"]');
            if (closeBtn) {
                closeBtn.click(); // trigger tutup modal
            }
        });
    </script>
    @endif

</x-admin-layout>