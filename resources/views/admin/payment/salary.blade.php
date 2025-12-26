<x-admin-layout :title="'Senarai Gaji Tutor'">
    <!-- Summary Cards + Chart -->
    <div class="space-y-6 mb-6">
        <!-- === 3 Summary Cards (1 row) === -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
            
            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between transition-all duration-300 hover:shadow-md hover:-translate-y-0.5">
                <div>
                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Jumlah Gaji Dibayar</p>
                    <h3 class="text-3xl font-extrabold text-gray-900">RM{{ number_format($totalPaidSalary, 2) }}</h3>
                </div>
                <div class="flex items-center justify-center p-3 bg-lime-100 rounded-full text-lime-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>

            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between transition-all duration-300 hover:shadow-md hover:-translate-y-0.5">
                <div>
                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Jumlah Gaji Sedang Di Proses</p>
                    <h3 class="text-3xl font-extrabold text-gray-900">RM{{ number_format($totalPendingSalary, 2) }}</h3>
                </div>
                <div class="flex items-center justify-center p-3 bg-amber-100 rounded-full text-amber-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>

            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between transition-all duration-300 hover:shadow-md hover:-translate-y-0.5">
                <div>
                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Jumlah Gaji Belum Dibayar</p>
                    <h3 class="text-3xl font-extrabold text-gray-900">RM{{ number_format($totalUnpaidSalary, 2) }}</h3>
                </div>
                <div class="flex items-center justify-center p-3 bg-red-100 rounded-full text-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>

        </div>

        <!-- === Chart Section (below cards) === -->
        <div class="bg-white p-4 rounded-xl shadow">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-semibold">Laporan Tahunan Gaji Tutor</h3>
                <div class="relative w-full sm:w-32">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12.75 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM7.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM8.25 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM9.75 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM10.5 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM12.75 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM14.25 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 13.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" />
                            <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
                        </svg>
                    </div>

                    <select id="yearFilter" 
                            class="appearance-none cursor-pointer w-full py-2 pl-10 pr-8 text-sm text-gray-700 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-green-500/20 focus:border-green-600 outline-none shadow-sm transition-all hover:bg-white">
                        @foreach ($salaryYears as $year)
                            <option value="{{ $year->salary_year }}">{{ $year->salary_year }}</option>
                        @endforeach
                    </select>

                    <div class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <canvas id="salaryChart" height="100"></canvas>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('salaryChart');
        let salaryChart;

        async function loadSalaryChart(year) {
            const response = await fetch(`{{ route('admin.salary.report') }}?year=${year}`);
            const result = await response.json();

            const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

            const data = {
                labels: labels,
                datasets: [{
                    label: `Jumlah Gaji (RM) untuk Tahun ${result.year}`,
                    data: result.data,
                    borderColor: '#16a34a',
                    backgroundColor: 'rgba(22,163,74,0.2)',
                    fill: true,
                    tension: 0.3
                }]
            };

            if (salaryChart) {
                salaryChart.destroy();
            }
            salaryChart = new Chart(ctx, {
                type: 'line',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            min: 0,
                            grid: { color: '#e5e7eb' }
                        },
                        x: {
                            grid: { color: '#f3f4f6' }
                        }
                    },
                    plugins: {
                        legend: { display: true },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return 'RM ' + context.parsed.y.toFixed(2);
                                }
                            }
                        }
                    }
                }
            });
        }

        // Auto-load current year
        loadSalaryChart(new Date().getFullYear());
        document.getElementById('yearFilter').addEventListener('change', function() {
            loadSalaryChart(this.value);
        });
    </script>

    <!-- Salary List -->
    <div class="bg-white p-6 rounded-xl shadow">
        <!-- Header -->
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg font-semibold">Senarai Rekod Gaji Tutor</h2>
                <p class="text-sm text-gray-500">Uruskan gaji tutor anda: tambah baru, cari, tapis, sunting, atau padam.</p>
            </div>
            <button data-modal-target="addSalaryModal" data-modal-toggle="addSalaryModal"
                class="px-4 py-2 text-sm rounded-md font-semibold text-white bg-green-600 shadow-sm hover:bg-green-700 transition-colors duration-200 focus:ring-2 focus:ring-green-400 focus:ring-offset-1">
                + Tambah Gaji Tutor
            </button>
        </div>

        <!-- Search + Filter -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
            
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

            <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                
                <div class="relative w-full sm:w-40">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12.75 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM7.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM8.25 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM9.75 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM10.5 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM12.75 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM14.25 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 13.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" />
                            <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <select id="filterMonth" 
                            class="appearance-none cursor-pointer w-full p-2.5 pl-10 pr-8 text-sm text-gray-700 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-green-500/20 focus:border-green-600 outline-none shadow-sm transition-all">
                        <option value="">Bulan</option>
                        <option value="Januari">Januari</option>
                        <option value="Februari">Februari</option>
                        <option value="Mac">Mac</option>
                        <option value="April">April</option>
                        <option value="Mei">Mei</option>
                        <option value="Jun">Jun</option>
                        <option value="Julai">Julai</option>
                        <option value="Ogos">Ogos</option>
                        <option value="September">September</option>
                        <option value="Oktober">Oktober</option>
                        <option value="November">November</option>
                        <option value="Disember">Disember</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>

                <div class="relative w-full sm:w-32">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <select id="filterYear" 
                            class="appearance-none cursor-pointer w-full p-2.5 pl-10 pr-8 text-sm text-gray-700 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-green-500/20 focus:border-green-600 outline-none shadow-sm transition-all">
                        <option value="">Tahun</option>
                        @foreach ($salaryRecords as $salaryRecord)
                            <option value="{{ $salaryRecord->salary_year }}">{{ $salaryRecord->salary_year }}</option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>

            </div>
        </div>

        <!-- Table -->
        <div class="w-full overflow-x-auto">
            <table id="salaryTable" class="w-full min-w-max text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">Bil</th>
                        <th class="px-4 py-3">Nama Rekod</th>
                        <th class="px-4 py-3">Bulan</th>
                        <th class="px-4 py-3">Tahun</th>
                        <th class="px-4 py-3">Tarikh Ditetapkan</th>
                        <th class="px-4 py-3 text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody id="salaryBody">
                    @foreach ($salaryRecords as $salaryRecord)
                    <tr class="border-b">
                        <td class="px-4 py-3 row-index"></td>
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $salaryRecord->salary_name }}</td>
                        {{-- <td class="px-4 py-3">{{ $salaryRecord->salary_month }}</td> --}}
                        <td class="px-4 py-3">
                            @php
                                $months = [
                                    'January' => 'Januari',
                                    'February' => 'Februari',
                                    'March' => 'Mac',
                                    'April' => 'April',
                                    'May' => 'Mei',
                                    'June' => 'Jun',
                                    'July' => 'Julai',
                                    'August' => 'Ogos',
                                    'September' => 'September',
                                    'October' => 'Oktober',
                                    'November' => 'November',
                                    'December' => 'Disember',
                                ];
                            @endphp
                            {{ $months[$salaryRecord->salary_month] ?? $salaryRecord->salary_month }}
                        </td>
                        <td class="px-4 py-3">{{ $salaryRecord->salary_year }}</td>
                        <td class="px-4 py-3">{{ \Carbon\Carbon::parse($salaryRecord->salary_date)->format('d/m/Y') }}</td>
                        <td class="px-4 py-3 flex gap-2 justify-center">
                            <button type="button"
                                class="px-3 py-1 text-xs rounded bg-gray-200 hover:bg-gray-300 edit-button"
                                data-id="{{ $salaryRecord->salary_id }}" 
                                data-modal-target="editSalaryModal"
                                data-modal-toggle="editSalaryModal">Kemaskini</button>
                            <a href="{{ route('admin.salary.report.index', $salaryRecord->salary_id) }}" 
                            class="px-3 py-1 text-xs rounded bg-yellow-400 text-white hover:bg-yellow-500">
                            Leporan
                            </a>
                            <form id="delete-form-{{ $salaryRecord->salary_id }}" 
                                action="{{ route('admin.salary.destroy', $salaryRecord->salary_id) }}" 
                                method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                    class="delete-button px-3 py-1 text-xs rounded bg-red-500 text-white hover:bg-red-600"
                                    data-id="{{ $salaryRecord->salary_id }}">
                                    Padam
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
             <!-- No Record Message -->
            <div id="noRecord" class="hidden text-center text-gray-500 py-4">Tiada rekod dijumpai</div>
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
            const filterMonth = document.getElementById("filterMonth");
            const filterYear = document.getElementById("filterYear");
            const tbody = document.getElementById("salaryBody");
            const rows = Array.from(tbody.getElementsByTagName("tr"));
            const noRecord = document.getElementById("noRecord");
            const pagination = document.getElementById("pagination");
            const entriesInfo = document.getElementById("entriesInfo");

            let currentPage = 1;
            const rowsPerPage = 10;

            function renderTable() {
                const searchValue = searchInput.value.toLowerCase();
                const monthValue = filterMonth.value.toLowerCase();
                const yearValue = filterYear.value;

                let filteredRows = rows.filter(row => {
                    const name = row.cells[1].textContent.toLowerCase();
                    const id = row.cells[0].textContent.toLowerCase();
                    const month = row.cells[2].textContent.toLowerCase(); // 👈 ambil day
                    const year = row.cells[3].textContent.toLowerCase(); // 👈 ambil room

                    const matchSearch = name.includes(searchValue) || id.includes(searchValue);
                    const matchMonth = monthValue === "" || month.includes(monthValue);
                    const matchYear = yearValue === "" || year.includes(yearValue);
                    return matchSearch && matchMonth && matchYear;
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
            filterMonth.addEventListener("change", () => { currentPage = 1; renderTable(); });
            filterYear.addEventListener("change", () => { currentPage = 1; renderTable(); });

            renderTable();
        </script>
    </div>

    <!-- Add Salary Modal -->
    <div id="addSalaryModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative w-full max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <div class="w-6"></div>
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Tambah Gaji Tutor</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="addSalaryModal">✕</button>
            </div>

            <!-- Modal Body -->
            <form id="salaryForm" action="{{ route('admin.salary.store') }}" method="POST">
                @csrf
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                        <!-- Month -->
                        <div>
                            <label for="salary_month" class="block mb-2 text-sm font-medium text-gray-900">Bulan</label>
                            <select id="salary_month" name="salary_month" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Pilih Bulan</option>
                                <option value="January">Januari</option>
                                <option value="February">Februari</option>
                                <option value="March">Mac</option>
                                <option value="April">April</option>
                                <option value="May">Mei</option>
                                <option value="June">Jun</option>
                                <option value="july">Julai</option>
                                <option value="August">Ogos</option>
                                <option value="September">September</option>
                                <option value="October">Oktober</option>
                                <option value="November">November</option>
                                <option value="December">Disember</option>
                            </select>
                        </div>

                        <!-- Year -->
                        <div>
                            <label for="salary_year" class="block mb-2 text-sm font-medium text-gray-900">Tahun</label>
                            <select id="salary_year" name="salary_year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Pilih Tahun</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                            </select>
                        </div>

                         {{-- salary_rate --}}
                        <div>
                            <label for="salary_rate" class="block mb-2 text-sm font-medium text-gray-900">Kadar Gaji Per Jam(RM)</label>
                            <input type="number" step="0.01" id="salary_rate" name="salary_rate" placeholder="20.00" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="addSalaryModal">Batal</button>

                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-4 py-2 text-center">Hantar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Salary Modal -->
    <div id="editSalaryModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative w-full max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <div class="w-6"></div>
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Kemaskini Gaji Tutor</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="editSalaryModal">✕</button>
            </div>

            <!-- Modal Body -->
            <form id="editSalaryForm" method="POST">
                @csrf
                @method('PUT')
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                        {{-- show salary_name, read only --}}
                        <div>
                            <label for="salary_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Rekod</label>
                            <input type="text" id="salary_name" name="salary_name" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" readonly>
                        </div>

                        {{-- salary_rate --}}
                        <div>
                            <label for="salary_rate" class="block mb-2 text-sm font-medium text-gray-900">Kadar Gaji Per Jam (RM)</label>
                            <input type="number" step="0.01" id="salary_rate" name="salary_rate" placeholder="20.00" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="editSalaryModal">Batal</button>

                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-4 py-2 text-center">Kemaskini Maklumat</button>
                </div>
            </form>
        </div>
    </div>

    {{-- edit form script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const editButtons = document.querySelectorAll('.edit-button');
            const editSalaryForm = document.getElementById('editSalaryForm');

            editButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const salaryId = this.getAttribute('data-id');

                    // Fetch the salary record data using AJAX
                    fetch(`/admin/salary/${salaryId}/edit`)
                        .then(response => response.json())
                        .then(data => {
                            // Populate the form fields with the fetched data
                            editSalaryForm.action = `/admin/salary/${salaryId}`;
                            editSalaryForm.salary_name.value = data.salary_name;
                            editSalaryForm.salary_rate.value = data.salary_rate;
                        })
                        .catch(error => {
                            console.error('Error fetching salary record:', error);
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
                        text: "Rekod gaji tutor ini akan dipadam!",
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