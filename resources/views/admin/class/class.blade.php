<x-admin-layout :title="'Class'">

    <!-- Stats + Chart -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <!-- Left Stats -->
        <div class="lg:col-span-1 space-y-4">
        <div class="bg-white p-4 rounded-sm shadow flex items-center gap-3 border-l-lime-600 border-l-6 justify-between">
            <div>
                <p class="text-sm font-semibold text-lime-600 uppercase">Total Available Classes</p>
                <h3 class="text-2xl font-bold text-gray-500">{{ $availableClasses  }}</h3>
            </div>            
            <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-square-rounded-check w-8 h-8 text-gray-300"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2c-.218 0 -.432 .002 -.642 .005l-.616 .017l-.299 .013l-.579 .034l-.553 .046c-4.785 .464 -6.732 2.411 -7.196 7.196l-.046 .553l-.034 .579c-.005 .098 -.01 .198 -.013 .299l-.017 .616l-.004 .318l-.001 .324c0 .218 .002 .432 .005 .642l.017 .616l.013 .299l.034 .579l.046 .553c.464 4.785 2.411 6.732 7.196 7.196l.553 .046l.579 .034c.098 .005 .198 .01 .299 .013l.616 .017l.642 .005l.642 -.005l.616 -.017l.299 -.013l.579 -.034l.553 -.046c4.785 -.464 6.732 -2.411 7.196 -7.196l.046 -.553l.034 -.579c.005 -.098 .01 -.198 .013 -.299l.017 -.616l.005 -.642l-.005 -.642l-.017 -.616l-.013 -.299l-.034 -.579l-.046 -.553c-.464 -4.785 -2.411 -6.732 -7.196 -7.196l-.553 -.046l-.579 -.034a28.058 28.058 0 0 0 -.299 -.013l-.616 -.017l-.318 -.004l-.324 -.001zm2.293 7.293a1 1 0 0 1 1.497 1.32l-.083 .094l-4 4a1 1 0 0 1 -1.32 .083l-.094 -.083l-2 -2a1 1 0 0 1 1.32 -1.497l.094 .083l1.293 1.292l3.293 -3.292z" fill="currentColor" stroke-width="0" /></svg>
        </div>

        <div class="bg-white p-4 rounded-sm shadow flex items-center gap-3 border-l-amber-400 border-l-6 justify-between">
            <div>
                <p class="text-sm font-semibold text-amber-600 uppercase">Total Full Classes</p>
                <h3 class="text-2xl font-bold text-gray-500">{{ $fullClasses  }}</h3>
            </div>
            <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-square-rounded-x w-8 h-8 text-gray-300"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2l.324 .001l.318 .004l.616 .017l.299 .013l.579 .034l.553 .046c4.785 .464 6.732 2.411 7.196 7.196l.046 .553l.034 .579c.005 .098 .01 .198 .013 .299l.017 .616l.005 .642l-.005 .642l-.017 .616l-.013 .299l-.034 .579l-.046 .553c-.464 4.785 -2.411 6.732 -7.196 7.196l-.553 .046l-.579 .034c-.098 .005 -.198 .01 -.299 .013l-.616 .017l-.642 .005l-.642 -.005l-.616 -.017l-.299 -.013l-.579 -.034l-.553 -.046c-4.785 -.464 -6.732 -2.411 -7.196 -7.196l-.046 -.553l-.034 -.579a28.058 28.058 0 0 1 -.013 -.299l-.017 -.616c-.003 -.21 -.005 -.424 -.005 -.642l.001 -.324l.004 -.318l.017 -.616l.013 -.299l.034 -.579l.046 -.553c.464 -4.785 2.411 -6.732 7.196 -7.196l.553 -.046l.579 -.034c.098 -.005 .198 -.01 .299 -.013l.616 -.017c.21 -.003 .424 -.005 .642 -.005zm-1.489 7.14a1 1 0 0 0 -1.218 1.567l1.292 1.293l-1.292 1.293l-.083 .094a1 1 0 0 0 1.497 1.32l1.293 -1.292l1.293 1.292l.094 .083a1 1 0 0 0 1.32 -1.497l-1.292 -1.293l1.292 -1.293l.083 -.094a1 1 0 0 0 -1.497 -1.32l-1.293 1.292l-1.293 -1.292l-.094 -.083z" fill="currentColor" stroke-width="0" /></svg>   
        </div>

        <div class="bg-white p-4 rounded-sm shadow flex items-center gap-3 border-l-cyan-600 border-l-6 justify-between">
            <div>
                <p class="text-sm font-semibold text-cyan-600 uppercase">Total Classes</p>
                <h3 class="text-2xl font-bold text-gray-500">{{ $totalClasses  }}</h3>                
            </div>
             <svg class="w-10 h-10 text-gray-300 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path d="M3 4.92857C3 3.90506 3.80497 3 4.88889 3H19.1111C20.195 3 21 3.90506 21 4.92857V13h-3v-2c0-.5523-.4477-1-1-1h-4c-.5523 0-1 .4477-1 1v2H3V4.92857ZM3 15v1.0714C3 17.0949 3.80497 18 4.88889 18h3.47608L7.2318 19.3598c-.35356.4243-.29624 1.0548.12804 1.4084.42428.3536 1.05484.2962 1.40841-.128L10.9684 18h2.0632l2.2002 2.6402c.3535.4242.9841.4816 1.4084.128.4242-.3536.4816-.9841.128-1.4084L15.635 18h3.4761C20.195 18 21 17.0949 21 16.0714V15H3Z"/>
                <path d="M16 12v1h-2v-1h2Z"/>
            </svg>
            </div>
        </div>

        <!-- Right Stats -->
        <div class="lg:col-span-2 bg-white rounded-sm shadow p-4 flex flex-col border-l-rose-600 border-l-6">
            <!-- Title -->
            <h2 class="text-base font-semibold text-rose-600 uppercase mb-4">Number of Classes</h2>

            <!-- Content: legend kiri, chart kanan -->
            <div class="flex items-center justify-between ml-12 mx-12">

                <!-- Custom Legend -->
                <div id="chartLegend" class="space-y-2"></div>

                <!-- Donut Chart -->
                <div class="relative w-50 h-50 flex items-center justify-center">
                    <canvas id="classDonutChart"></canvas>

                    <!-- Center text -->
                    <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                        <p class="text-sm text-gray-500">Total Classes</p>
                        <p class="text-2xl font-bold">{{ $totalClasses  }}</p>
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
                labels: @json($days), // <-- ambil label dari controller
                datasets: [{
                    data: @json($dayCounts), // <-- ambil count dari controller
                    backgroundColor: [
                        '#3B82F6', // Monday
                        '#14B8A6', // Tuesday
                        '#8B5CF6', // Wednesday
                        '#6366F1', // Thursday
                        '#EF4444', // Friday
                        '#FACC15', // Saturday
                        '#FB923C'  // Sunday
                    ],
                    borderWidth: 0,
                }]
            },
            options: {
                cutout: '70%',
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        enabled: true,
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                let value = context.raw || 0;
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
        legendContainer.innerHTML = '';
        classDonutChart.data.labels.forEach((label, i) => {
            const color = classDonutChart.data.datasets[0].backgroundColor[i];
            const value = classDonutChart.data.datasets[0].data[i];
            const item = document.createElement('div');
            item.className = "flex items-center space-x-2 text-gray-700";
            item.innerHTML = `
                <span class="w-4 h-4 rounded-full inline-block" style="background-color:${color}"></span>
                <span class="text-sm text-gray-500">${label} - ${value}</span>
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
                <input type="text" id="searchInput" placeholder="Search by name or ID"
                    class="w-full pl-10 pr-4 py-2 text-sm border rounded-lg focus:ring focus:ring-green-200" />
                <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
                </svg>
            </div>
            <!-- Filter -->
            <select id="filterStatus" class="border rounded-lg px-3 py-2 text-sm w-full sm:w-auto">
                <option value="">All Status</option>
                <option value="Available">Available</option>
                <option value="Full">Full</option>
            </select>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table id="classTable" class="min-w-max text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Class Name</th>
                        <th class="px-4 py-3">Day</th>
                        <th class="px-4 py-3">Start Time</th>
                        <th class="px-4 py-3">End Time</th>
                        <th class="px-4 py-3">Room</th>
                        <th class="px-4 py-3">Tutor Name</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="classBody">
                    @foreach ($classes as $class)                        
                    <tr class="border-b">
                        <td class="px-4 py-3 row-index"></td>
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $class->class_name }}</td>
                        <td class="px-4 py-3">{{ $class->day }}</td>
                        <td class="px-4 py-3">{{ $class->start_time }}</td>
                        <td class="px-4 py-3">{{ $class->end_time }}</td>
                        <td class="px-4 py-3">{{ $class->room }}</td>
                        <td class="px-4 py-3">{{ $class->tutor->username }}</td>
                        <td class="px-4 py-3">
                            @if($class->status == 'Available')
                                <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">Available</span>
                            @else
                                <span class="px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-600">Full</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 flex gap-2 justify-center">
                                <button type="button" class="px-3 py-1 text-xs rounded bg-gray-200 hover:bg-gray-300 edit-class-button" data-id="{{ $class->class_id }}" data-modal-target="editClassModal" data-modal-toggle="editClassModal">Edit</button>                            
                                <a href="{{ route('admin.class.report', $class->class_id) }}" class="px-3 py-1 text-xs rounded bg-yellow-400 text-white hover:bg-yellow-500">Report</a>                                
                                <form id="delete-form-{{ $class->class_id }}" action="{{ route('admin.class.destroy', $class->class_id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                     <button type="button" 
                                    class="delete-button px-3 py-1 text-xs rounded bg-red-500 text-white hover:bg-red-600"
                                    data-id="{{ $class->class_id }}">
                                    Delete
                                </button>                                
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

             <!-- No Record Message -->
            <div id="noRecord" class="hidden text-center text-gray-500 py-4">No classes found.</div>
        </div>

         <!-- Pagination (manual JS) -->
        <div class="flex flex-col sm:flex-row items-center justify-between mt-4 text-sm text-gray-600">
            <!-- Showing entries -->
            <div id="entriesInfo" class="mb-2 sm:mb-0"></div>
            <!-- Pagination buttons -->
            <div class="flex items-center gap-2" id="pagination"></div>
        </div>

        <!-- Pagination Script -->
        <script>
            const searchInput = document.getElementById("searchInput");
            const filterStatus = document.getElementById("filterStatus");
            const tbody = document.getElementById("classBody");
            const rows = Array.from(tbody.getElementsByTagName("tr"));
            const noRecord = document.getElementById("noRecord");
            const pagination = document.getElementById("pagination");
            const entriesInfo = document.getElementById("entriesInfo");

            let currentPage = 1;
            const rowsPerPage = 5;

            function renderTable() {
                const searchValue = searchInput.value.toLowerCase();
                const filterValue = filterStatus.value.toLowerCase();

                let filteredRows = rows.filter(row => {
                    const name = row.cells[1].textContent.toLowerCase();
                    const id = row.cells[0].textContent.toLowerCase();
                    const status = row.cells[7].textContent.toLowerCase(); // 👈 ambil status

                    const matchSearch = name.includes(searchValue) || id.includes(searchValue);
                    const matchFilter = filterValue === "" || status.includes(filterValue); // 👈 filter ikut Available/Full
                    return matchSearch && matchFilter;
                });

                const totalRows = filteredRows.length;
                const totalPages = Math.ceil(totalRows / rowsPerPage);
                if (currentPage > totalPages) currentPage = totalPages || 1;

            // show only current page rows
                rows.forEach(r => r.style.display = "none");

                let pageRows = filteredRows.slice((currentPage - 1) * rowsPerPage, currentPage * rowsPerPage);

                pageRows.forEach((r, i) => {
                    r.style.display = "";
                    // update numbering semula
                    r.querySelector(".row-index").textContent = (currentPage - 1) * rowsPerPage + (i + 1);
                });

                // show/hide "no records"
                noRecord.classList.toggle("hidden", totalRows > 0);

                // entries info
                const start = totalRows === 0 ? 0 : (currentPage - 1) * rowsPerPage + 1;
                const end = Math.min(currentPage * rowsPerPage, totalRows);
                entriesInfo.textContent = `Showing ${start} to ${end} of ${totalRows} entries`;

                // build pagination buttons
                pagination.innerHTML = "";

                // prev button
                const prevBtn = document.createElement("button");
                prevBtn.textContent = "‹";
                prevBtn.disabled = currentPage === 1;
                prevBtn.className = `px-3 py-1 rounded ${prevBtn.disabled ? 'bg-gray-300 text-gray-500 cursor-not-allowed' : 'bg-gray-200 hover:bg-gray-300'}`;
                prevBtn.addEventListener("click", () => {
                    if (currentPage > 1) {
                        currentPage--;
                        renderTable();
                    }
                });
                pagination.appendChild(prevBtn);

                // page numbers
                for (let i = 1; i <= totalPages; i++) {
                    const btn = document.createElement("button");
                    btn.textContent = i;
                    btn.className = `px-3 py-1 rounded ${i === currentPage ? 'bg-green-600 text-white' : 'bg-gray-200 hover:bg-gray-300'}`;
                    btn.addEventListener("click", () => {
                        currentPage = i;
                        renderTable();
                    });
                    pagination.appendChild(btn);
                }

                // next button
                const nextBtn = document.createElement("button");
                nextBtn.textContent = "›";
                nextBtn.disabled = currentPage === totalPages || totalPages === 0;
                nextBtn.className = `px-3 py-1 rounded ${nextBtn.disabled ? 'bg-gray-300 text-gray-500 cursor-not-allowed' : 'bg-gray-200 hover:bg-gray-300'}`;
                nextBtn.addEventListener("click", () => {
                    if (currentPage < totalPages) {
                        currentPage++;
                        renderTable();
                    }
                });
                pagination.appendChild(nextBtn);
            }

            searchInput.addEventListener("input", () => { currentPage = 1; renderTable(); });
            filterStatus.addEventListener("change", () => { currentPage = 1; renderTable(); });

            renderTable();
        </script>
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
                        
                        {{-- Package script --}}
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
                                step="1800"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        <script>
                        document.getElementById("start_time").addEventListener("change", function () {
                            let value = this.value; // contoh: "10:17"
                            if (!value) return;

                            let [hours, minutes] = value.split(":").map(Number);
                            // kalau < 15 minit → lock ke 00, kalau >= 15 → lock ke 30
                            minutes = minutes < 15 ? 0 : (minutes < 45 ? 30 : 0);

                            // kalau minit jadi 0 tapi asalnya lebih 45 → tambah sejam
                            if (value.split(":")[1] >= 45) {
                                hours = (hours + 1) % 24;
                            }
                               this.value = String(hours).padStart(2, "0") + ":" + String(minutes).padStart(2, "0");
                            });
                        </script>


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
            <form id="editClassForm" method="POST">
                @csrf
                @method('PUT')
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                         <!-- Package name -->
                        <div>
                            <label for="package_id" class="block mb-2 text-sm font-medium text-gray-900">Select Package</label>
                            <select id="package_id" name="package_id" disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                @foreach($packages as $package)
                                    <option value="{{ $package->package_id }}" data-duration="{{ $package->duration_per_sessions }}">
                                        {{ $package->package_name }}
                                    </option>
                                @endforeach
                            </select>
                             <!-- supaya value tetap dihantar dalam form -->
                            <input type="hidden" name="package_id" value="{{ $class->package_id }}">
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
                                    focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required readonly>
                        </div>

                        <!-- End Time -->
                        <div>
                            <label for="end_time" class="block mb-2 text-sm font-medium text-gray-900">End Time</label>
                            <input type="time" id="end_time" name="end_time"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required readonly>
                        </div>

                         <!-- Room -->
                        <div>
                            <label for="room" class="block mb-2 text-sm font-medium text-gray-900">Select Room</label>
                            <select id="room" name="room" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
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

    @if(session('closeModalEdit'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Cari button yang ada data-modal-hide="editPackageModal"
            const closeBtn = document.querySelector('[data-modal-hide="editClassModal"]');
            if (closeBtn) {
                closeBtn.click(); // trigger tutup modal
            }
        });
    </script>
    @endif

    {{-- Edit Class Form --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editButtons = document.querySelectorAll('.edit-class-button'); // button utk buka modal
            const editForm = document.getElementById('editClassForm');

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const classId = this.getAttribute('data-id');
                    fetch(`/admin/class/${classId}/edit`)
                        .then(response => response.json())
                        .then(data => {
                            // Set action URL
                            editForm.action = `/admin/class/${classId}`;

                            // Populate form fields
                            editForm.package_id.value = data.package_id;
                            editForm.duration_per_sessions.value = data.package.duration_per_sessions;
                            editForm.class_name.value = data.class_name;
                            editForm.day.value = data.day;
                            editForm.start_time.value = data.start_time;
                            editForm.end_time.value = data.end_time;
                            editForm.room.value = data.room;
                            editForm.capacity.value = data.capacity;
                            editForm.status.value = data.status;
                            editForm.tutor_id.value = data.tutor_id;

                            // kalau package bertukar → auto update duration
                            const packageSelect = editForm.package_id;
                            const selected = packageSelect.querySelector(`option[value="${data.package_id}"]`);
                            if (selected) {
                                const duration = selected.getAttribute('data-duration') || '';
                                editForm.duration_per_sessions.value = duration;
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching class data:', error);
                        });
                });
            });
        });
    </script>

    {{-- Delete Confirmation --}}
   <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".delete-button").forEach(button => {
                button.addEventListener("click", function () {
                    let id = this.getAttribute("data-id");
                    let form = document.getElementById("delete-form-" + id);

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "This class will be deleted!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

</x-admin-layout>