<x-admin-layout :title="'Senarai Kelas'">

    <!-- Statistics Cards + Donut Chart -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        
        <div class="lg:col-span-1 flex flex-col gap-4">
            
            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between transition-all duration-300 hover:shadow-md hover:-translate-y-0.5">
                <div>
                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Kelas Tersedia</p>
                    <h3 class="text-3xl font-extrabold text-gray-900">{{ $availableClasses }}</h3>
                </div>
                <div class="flex items-center justify-center p-3 bg-lime-100 rounded-full text-lime-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 2c-.218 0 -.432 .002 -.642 .005l-.616 .017l-.299 .013l-.579 .034l-.553 .046c-4.785 .464 -6.732 2.411 -7.196 7.196l-.046 .553l-.034 .579c-.005 .098 -.01 .198 -.013 .299l-.017 .616l-.004 .318l-.001 .324c0 .218 .002 .432 .005 .642l.017 .616l.013 .299l.034 .579l.046 .553c.464 4.785 2.411 6.732 7.196 7.196l.553 .046l.579 .034c.098 .005 .198 .01 .299 .013l.616 .017l.642 .005l.642 -.005l.616 -.017l.299 -.013l.579 -.034l.553 -.046c4.785 -.464 6.732 -2.411 7.196 -7.196l.046 -.553l.034 -.579c.005 -.098 .01 -.198 .013 -.299l.017 -.616l.005 -.642l-.005 -.642l-.017 -.616l-.013 -.299l-.034 -.579l-.046 -.553c-.464 -4.785 -2.411 -6.732 -7.196 -7.196l-.553 -.046l-.579 -.034a28.058 28.058 0 0 0 -.299 -.013l-.616 -.017l-.318 -.004l-.324 -.001zm2.293 7.293a1 1 0 0 1 1.497 1.32l-.083 .094l-4 4a1 1 0 0 1 -1.32 .083l-.094 -.083l-2 -2a1 1 0 0 1 1.32 -1.497l.094 .083l1.293 1.292l3.293 -3.292z" />
                    </svg>
                </div>
            </div>

            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between transition-all duration-300 hover:shadow-md hover:-translate-y-0.5">
                <div>
                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Kelas Penuh</p>
                    <h3 class="text-3xl font-extrabold text-gray-900">{{ $fullClasses }}</h3>
                </div>
                <div class="flex items-center justify-center p-3 bg-amber-100 rounded-full text-amber-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 2l.324 .001l.318 .004l.616 .017l.299 .013l.579 .034l.553 .046c4.785 .464 6.732 2.411 7.196 7.196l.046 .553l.034 .579c.005 .098 .01 .198 .013 .299l.017 .616l.005 .642l-.005 .642l-.017 .616l-.013 .299l-.034 .579l-.046 .553c-.464 4.785 -2.411 6.732 -7.196 7.196l-.553 .046l-.579 .034c-.098 .005 -.198 .01 -.299 .013l-.616 .017l-.642 .005l-.642 -.005l-.616 -.017l-.299 -.013l-.579 -.034l-.553 -.046c-4.785 -.464 -6.732 -2.411 -7.196 -7.196l-.046 -.553l-.034 -.579a28.058 28.058 0 0 1 -.013 -.299l-.017 -.616c-.003 -.21 -.005 -.424 -.005 -.642l.001 -.324l.004 -.318l.017 -.616l.013 -.299l.034 -.579l.046 -.553c.464 -4.785 2.411 -6.732 7.196 -7.196l.553 -.046l.579 -.034c.098 -.005 .198 -.01 .299 -.013l.616 -.017c.21 -.003 .424 -.005 .642 -.005zm-1.489 7.14a1 1 0 0 0 -1.218 1.567l1.292 1.293l-1.292 1.293l-.083 .094a1 1 0 0 0 1.497 1.32l1.293 -1.292l1.293 1.292l.094 .083a1 1 0 0 0 1.32 -1.497l-1.292 -1.293l1.292 -1.293l.083 -.094a1 1 0 0 0 -1.497 -1.32l-1.293 1.292l-1.293 -1.292l-.094 -.083z" />
                    </svg>
                </div>
            </div>

            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between transition-all duration-300 hover:shadow-md hover:-translate-y-0.5">
                <div>
                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Jumlah Kelas</p>
                    <h3 class="text-3xl font-extrabold text-gray-900">{{ $totalClasses }}</h3>
                </div>
                <div class="flex items-center justify-center p-3 bg-cyan-100 rounded-full text-cyan-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                        <path d="M3 4.92857C3 3.90506 3.80497 3 4.88889 3H19.1111C20.195 3 21 3.90506 21 4.92857V13h-3v-2c0-.5523-.4477-1-1-1h-4c-.5523 0-1 .4477-1 1v2H3V4.92857ZM3 15v1.0714C3 17.0949 3.80497 18 4.88889 18h3.47608L7.2318 19.3598c-.35356.4243-.29624 1.0548.12804 1.4084.42428.3536 1.05484.2962 1.40841-.128L10.9684 18h2.0632l2.2002 2.6402c.3535.4242.9841.4816 1.4084.128.4242-.3536.4816-.9841.128-1.4084L15.635 18h3.4761C20.195 18 21 17.0949 21 16.0714V15H3Z"/>
                        <path d="M16 12v1h-2v-1h2Z"/>
                    </svg>
                </div>
            </div>

        </div>

        <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex flex-col justify-between"> 
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-sm font-bold text-rose-600 uppercase tracking-wider flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-rose-600"></span>
                    Bilangan Kelas
                </h2>
            </div>

            <div class="flex flex-col md:flex-row items-center justify-around flex-grow gap-8">

                <div id="chartLegend" class="w-full md:w-1/3 space-y-3"></div>

                <div class="relative w-54 h-54 flex items-center justify-center">
                    <canvas id="classDonutChart"></canvas>

                    <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                        <p class="text-xs text-gray-400 font-medium uppercase tracking-wide">Jumlah Kelas</p>
                        <p class="text-3xl font-extrabold text-gray-800">{{ $totalClasses }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const dayMap = {
            "Monday": "Isnin",
            "Tuesday": "Selasa",
            "Wednesday": "Rabu",
            "Thursday": "Khamis",
            "Friday": "Jumaat",
            "Saturday": "Sabtu",
            "Sunday": "Ahad",
        };

        // Convert controller labels to Malay
        const mappedDays = @json($days).map(day => dayMap[day] ?? day);
        const ctx = document.getElementById('classDonutChart').getContext('2d');
        const classDonutChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: mappedDays, // <-- ambil label dari controller
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
                <h2 class="text-lg font-semibold">Senarai Kelas</h2>
                <p class="text-sm text-gray-500">Urus kelas anda: tambah baru, cari, tapis, sunting, atau padam.</p>
            </div>
            <button data-modal-target="addClassModal" data-modal-toggle="addClassModal"
                class="px-4 py-2 text-sm rounded-md font-semibold text-white bg-green-600 shadow-sm hover:bg-green-700 transition-colors duration-200 focus:ring-2 focus:ring-green-400 focus:ring-offset-1">
                + Tambah Kelas
            </button>
        </div>

        <!-- Search + Filter -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
            <!-- Search -->
            <div class="relative w-full sm:flex-1">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="text" 
                    id="searchInput" 
                    placeholder="Cari mengikut Nama atau ID..." 
                    class="block w-full p-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-green-500/20 focus:border-green-600 focus:bg-white transition-all duration-200 outline-none shadow-sm" />
            </div>
            <!-- Filter -->
            <div class="relative w-full sm:w-40">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 2.25a.75.75 0 0 1 .75.75v.54l1.838-.46a9.75 9.75 0 0 1 6.725.738l.108.054a8.25 8.25 0 0 0 5.58.652l3.109-.732a.75.75 0 0 1 .917.81 47.784 47.784 0 0 0 .005 10.337.75.75 0 0 1-.574.812l-3.114.733a9.75 9.75 0 0 1-6.594-.158l-.108-.054a8.25 8.25 0 0 0-5.89-.538l-2.25.54A.75.75 0 0 1 3 15.6V3a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <select id="filterStatus" 
                        class="appearance-none cursor-pointer w-full p-2.5 pl-10 pr-8 text-sm text-gray-700 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-green-500/20 focus:border-green-600 outline-none shadow-sm transition-all">
                    <option value="">Semua Status</option>
                    <option value="Tersedia">Tersedia</option>
                    <option value="Penuh">Penuh</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table id="classTable" class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">Bil</th>
                        <th class="px-4 py-3">Nama Kelas</th>
                        <th class="px-4 py-3">Hari</th>
                        <th class="px-4 py-3">Masa Mula</th>
                        <th class="px-4 py-3">Masa Tamat</th>
                        <th class="px-4 py-3">Bilik</th>
                        <th class="px-4 py-3">Tutor</th>
                        <th class="px-4 py-3">Bil. Ahli</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody id="classBody">
                    @foreach ($classes as $class)                        
                    <tr class="border-b">
                        <td class="px-4 py-3 row-index"></td>
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $class->class_name }}</td>
                        {{-- <td class="px-4 py-3">{{ $class->day }}</td> --}}
                        <td class="px-4 py-3">
                            @php
                                $dayMap = [
                                    'Monday' => 'Isnin',
                                    'Tuesday' => 'Selasa',
                                    'Wednesday' => 'Rabu',
                                    'Thursday' => 'Khamis',
                                    'Friday' => 'Jumaat',
                                    'Saturday' => 'Sabtu',
                                    'Sunday' => 'Ahad',
                                ];
                            @endphp
                            {{ $dayMap[$class->day] ?? $class->day }}
                        </td>
                        <td class="px-4 py-3">{{ $class->start_time }}</td>
                        <td class="px-4 py-3">{{ $class->end_time }}</td>
                        <td class="px-4 py-3">{{ $class->room }}</td>
                        <td class="px-4 py-3">{{ $class->tutor->username }}</td>
                        {{-- display total join_classess / capacity --}}
                        <td class="px-4 py-3 text-center">{{ $class->join_classes_count }} / {{ $class->capacity }}</td>
                         {{-- status with color --}}
                        <td class="px-4 py-3">
                            @if($class->status == 'Available')
                                <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">Tersedia</span>
                            @else
                                <span class="px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-600">Penuh</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 flex gap-2 justify-center">
                                <button type="button" class="px-3 py-1 text-xs rounded bg-gray-200 hover:bg-gray-300 edit-class-button" data-id="{{ $class->class_id }}" data-modal-target="editClassModal" data-modal-toggle="editClassModal">Kemaskini</button>                            
                                <a href="{{ route('admin.class.report', $class->class_id) }}" class="px-3 py-1 text-xs rounded bg-yellow-400 text-white hover:bg-yellow-500">Laporan</a>                                
                                <form id="delete-form-{{ $class->class_id }}" action="{{ route('admin.class.destroy', $class->class_id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                     <button type="button" 
                                    class="delete-button px-3 py-1 text-xs rounded bg-red-500 text-white hover:bg-red-600"
                                    data-id="{{ $class->class_id }}">
                                    Padam
                                </button>                                
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

             <!-- No Record Message -->
            <div id="noRecord" class="hidden text-center text-gray-500 py-4">Tiada kelas dijumpai.</div>
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
                    const status = row.cells[8].textContent.toLowerCase(); // 👈 ambil status

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
                entriesInfo.textContent = `Memaparkan ${start} hingga ${end} daripada ${totalRows} rekod`;

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

                // page numbers (limit 5 sahaja)
                let startPage = Math.max(1, currentPage - 2);
                let endPage = Math.min(totalPages, currentPage + 2);

                if (endPage - startPage < 4) {
                    if (startPage === 1) {
                        endPage = Math.min(totalPages, startPage + 4);
                    } else if (endPage === totalPages) {
                        startPage = Math.max(1, endPage - 4);
                    }
                }

                for (let i = startPage; i <= endPage; i++) {
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
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Tambah Kelas</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="addClassModal">✕</button>
            </div>

            <!-- Modal Body -->
            <form id="addClassForm" action="{{ route('admin.class.store') }}" method="POST">
                @csrf
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                        <!-- Package name -->
                        <div>
                            <label for="package_id" class="block mb-2 text-sm font-medium text-gray-900">Nama Pakej</label>
                            <select id="package_id" name="package_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Pilih Pakej</option>
                                @foreach($packages as $package)
                                    <option value="{{ $package->package_id }}" data-duration="{{ $package->duration_per_sessions }}">
                                        {{ $package->package_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Package duration -->
                        <div>
                            <label for="duration_per_sessions" class="block mb-2 text-sm font-medium text-gray-900">Tempoh Masa Per Sesi</label>
                            <input type="text" id="duration_per_sessions" name="duration_per_sessions" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
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
                            <label for="class_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Kelas</label>
                            <input type="text" id="class_name" name="class_name" placeholder="Mon-2000-K1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        <!-- Day -->
                        <div>
                            <label for="day" class="block mb-2 text-sm font-medium text-gray-900">Hari</label>
                            <select id="day" name="day" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Pilih Hari</option>
                                <option value="Monday">Isnin</option>
                                <option value="Tuesday">Selasa</option>
                                <option value="Wednesday">Rabu</option>
                                <option value="Thursday">Khamis</option>
                                <option value="Friday">Jumaat</option>
                                <option value="Saturday">Sabtu</option>
                                <option value="Sunday">Ahad</option>
                            </select>
                        </div>

                       <!-- Start Time -->
                        <div>
                            <label for="start_time" class="block mb-2 text-sm font-medium text-gray-900">Masa Mula</label>
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
                            <label for="end_time" class="block mb-2 text-sm font-medium text-gray-900">Masa Tamat</label>
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
                            <label for="room" class="block mb-2 text-sm font-medium text-gray-900">Bilik</label>
                            <select id="room" name="room" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Pilih Bilik</option>
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
                            <label for="capacity" class="block mb-2 text-sm font-medium text-gray-900">Kapasiti</label>
                            <input type="number" id="capacity" name="capacity" placeholder="15" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                            <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Pilih Status</option>
                                <option value="Available">Tersedia</option>
                                <option value="Full">Penuh</option>
                            </select>
                        </div>

                        <!-- Tutor Assign -->
                       <div>
                            <label for="tutor_id" class="block mb-2 text-sm font-medium text-gray-900">Tugaskan Tutor</label>
                            <select id="tutor_id" name="tutor_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Pilih Tutor</option>
                                @foreach($tutors as $tutor)
                                    <option value="{{ $tutor->tutor_id }}">{{ $tutor->username }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="addClassModal">Batal</button>

                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-4 py-2 text-center">Hantar</button>
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
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Kemaskini Maklumat Kelas</h3>
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
                            <label for="package_name_display" class="block mb-2 text-sm font-medium text-gray-900">Nama Pakej</label>
                            <input type="text" id="package_name_display" name="package_name_display"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    focus:ring-green-500 focus:border-green-500 block w-full p-2.5" readonly>
                            <input type="hidden" name="package_id" id="package_id_hidden">
                        </div>

                        <!-- Package duration -->
                        <div>
                            <label for="duration_per_sessions" class="block mb-2 text-sm font-medium text-gray-900">Tempoh Masa Per Sesi</label>
                            <input type="text" id="duration_per_sessions" name="duration_per_sessions"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    focus:ring-green-500 focus:border-green-500 block w-full p-2.5" readonly>
                        </div>

                        <!-- Class Name -->
                        <div>
                            <label for="class_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Kelas</label>
                            <input type="text" id="class_name" name="class_name" placeholder="Mon-2000-K1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                         <!-- Day -->
                        <div>
                            <label for="day" class="block mb-2 text-sm font-medium text-gray-900">Hari</label>
                            <select id="day" name="day" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Pilih Hari</option>
                                <option value="Monday">Isnin</option>
                                <option value="Tuesday">Selasa</option>
                                <option value="Wednesday">Rabu</option>
                                <option value="Thursday">Khamis</option>
                                <option value="Friday">Jumaat</option>
                                <option value="Saturday">Sabtu</option>
                                <option value="Sunday">Ahad</option>
                            </select>
                        </div>

                      <!-- Start Time -->
                        <div>
                            <label for="start_time" class="block mb-2 text-sm font-medium text-gray-900">Masa Mula</label>
                            <input type="time" id="start_time" name="start_time"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required readonly>
                        </div>

                        <!-- End Time -->
                        <div>
                            <label for="end_time" class="block mb-2 text-sm font-medium text-gray-900">Masa Tamat</label>
                            <input type="time" id="end_time" name="end_time"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required readonly>
                        </div>

                         <!-- Room -->
                        <div>
                            <label for="room" class="block mb-2 text-sm font-medium text-gray-900">Bilik</label>
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
                            <label for="capacity" class="block mb-2 text-sm font-medium text-gray-900">Kapasiti</label>
                            <input type="number" id="capacity" name="capacity" placeholder="15" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                            <input type="text" id="status" name="status"class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"value="{{ $class->status ?? '' }}" readonly>
                        </div>

                         <!-- Tutor Assign -->
                       <div>
                            <label for="tutor_id" class="block mb-2 text-sm font-medium text-gray-900">Tugaskan Tutor</label>
                            <select id="tutor_id" name="tutor_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Pilih Tutor</option>
                                @foreach($tutors as $tutor)
                                    <option value="{{ $tutor->tutor_id }}">{{ $tutor->username }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="editClassModal">Batal</button>

                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-4 py-2 text-center">Kemaskini Maklumat</button>
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
                            editForm.package_name_display.value = data.package.package_name;
                            editForm.package_id_hidden.value = data.package_id;
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
                        title: 'Adakah anda pasti?',
                        text: "Kelas ini akan dipadamkan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, padamkan!',
                        cancelButtonText: 'Batal'
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