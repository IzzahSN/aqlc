<x-admin-layout :title="'Class Report'">
    <!-- Header with Title (left) and Breadcrumb (right) -->
    <div class="flex items-center justify-between mb-4">
        <!-- Left: Page Title -->
        <h2 class="text-xl font-medium text-gray-800">Class Report</h2>

        <!-- Right: Breadcrumb -->
        <nav class="text-sm text-gray-500">
            <ol class="flex space-x-2">
                <li><a href="{{ route('admin.class.index') }}" class="hover:text-green-600">Class</a></li>
                <li>/</li>
                <li>Report</li>
            </ol>
        </nav>
    </div>

    <!-- Class Report List -->
    <div class="bg-white p-6 rounded-xl shadow">
        <!-- Header -->
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg font-semibold">List of Report</h2>
                <p class="text-sm text-gray-500">Manage your report: search, filter and udpate.</p>
            </div>
        </div>

        <!-- Search -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
           <!-- Search -->
            <div class="relative w-full sm:w-full">
                <input id="searchInput" type="text" placeholder="Search by name or recitation"
                    class="w-full pl-10 pr-4 py-2 text-sm border rounded-lg focus:ring focus:ring-green-200" />
                <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
                </svg>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Schedule</th>
                        <th class="px-4 py-3">Total Attend</th>
                        <th class="px-4 py-3">Total Absent</th>
                        <th class="px-4 py-3">Tutor</th>
                    </tr>
                </thead>
                <tbody id="classBody">
                    @foreach ($schedules as $schedule)                        
                    <tr class="border-b">
                        <td class="px-4 py-3 row-index"></td>
                        <td class="px-4 py-3 font-medium text-gray-900">{{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }}</td>
                        {{-- count attendance status==1 --}}
                        <td class="px-4 py-3">{{ $schedule->attendances->where('status', 1)->count() }}</td>
                        <td class="px-4 py-3">{{ $schedule->attendances->where('status', 0)->count() }}</td>
                        <td class="px-4 py-3">{{ $schedule->reliefTutor ? $schedule->reliefTutor->username : $schedule->tutor->username }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- No record row -->
        <p id="noRecord" class="text-center text-gray-500 py-3 hidden">No records found</p>

        <!-- Pagination -->
        <div class="flex items-center justify-between mt-4">
            <div class="text-sm text-gray-500" id="showingEntries"></div>
            <div class="flex items-center gap-2" id="paginationControls"></div>
        </div>
    </div>

    <script>
        const searchInput = document.getElementById("searchInput");
        const tbody = document.getElementById("classBody");
        const rows = Array.from(tbody.getElementsByTagName("tr"));
        const noRecord = document.getElementById("noRecord");
        const pagination = document.getElementById("paginationControls");
        const entriesInfo = document.getElementById("showingEntries");

        let currentPage = 1;
        const rowsPerPage = 5;

        function renderTable() {
            const searchValue = searchInput.value.toLowerCase();

            let filteredRows = rows.filter(row => {
                const name = row.cells[1].textContent.toLowerCase();
                const schedule = row.cells[2].textContent.toLowerCase();

                const matchSearch = name.includes(searchValue) || schedule.includes(searchValue);
                return matchSearch;
            });

            const totalRows = filteredRows.length;
            const totalPages = Math.ceil(totalRows / rowsPerPage);
            if (currentPage > totalPages) currentPage = totalPages || 1;

            // hide semua rows
            rows.forEach(r => r.style.display = "none");

            // show hanya current page rows
            let pageRows = filteredRows.slice((currentPage - 1) * rowsPerPage, currentPage * rowsPerPage);

            pageRows.forEach((r, i) => {
                r.style.display = "";
                r.querySelector(".row-index").textContent = (currentPage - 1) * rowsPerPage + (i + 1);
            });

            // no records
            noRecord.classList.toggle("hidden", totalRows > 0);

            // entries info
            const start = totalRows === 0 ? 0 : (currentPage - 1) * rowsPerPage + 1;
            const end = Math.min(currentPage * rowsPerPage, totalRows);
            entriesInfo.textContent = `Showing ${start} to ${end} of ${totalRows} entries`;

            // pagination
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

        renderTable();
    </script>

    <!-- Add Class Modal -->
    <div id="reportClassModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative w-full max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <div class="w-6"></div>
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">List of Attendance</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="reportClassModal">✕</button>
            </div>

            <!-- Modal Body -->
            <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                    <table class="w-full text-sm text-left text-gray-700">
                        <thead class="bg-gray-100 text-gray-600 uppercase text-xs font-semibold">
                            <tr>
                                <th class="px-4 py-3">No</th>
                                <th class="px-4 py-3">Recitation</th>
                                <th class="px-4 py-2">Page</th>
                                <th class="px-4 py-2">Grade</th>
                                <th class="px-4 py-2">Date</th>
                                <th class="px-4 py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td class="px-4 py-3">1</td>
                                <td class="px-4 py-3">Quran</td>
                                <td class="px-4 py-3">10</td>
                                <td class="px-4 py-3">Mumtaz</td>
                                <td class="px-4 py-3">12/11/2023</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">Attend</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3">2</td>
                                <td class="px-4 py-3">-</td>
                                <td class="px-4 py-3">-</td>
                                <td class="px-4 py-3">-</td>
                                <td class="px-4 py-3">17/11/2023</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-red-100 text-red-700">Absent</span>
                                </td>
                            </tr>
                            <!-- Repeat rows here -->
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
        </div>
    </div>

</x-admin-layout>