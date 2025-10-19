<x-admin-layout :title="'Class'">
    <!-- Header with Title (left) and Breadcrumb (right) -->
    <div class="flex items-center justify-between mb-4">
        <!-- Left: Page Title -->
        <h2 class="text-xl font-medium text-gray-800">Package Report</h2>

        <!-- Right: Breadcrumb -->
        <nav class="text-sm text-gray-500">
            <ol class="flex space-x-2">
                <li><a href="{{ route('admin.package.index') }}" class="hover:text-green-600">Package</a></li>
                <li>/</li>
                <li>Report</li>
            </ol>
        </nav>
    </div>

    <!-- Package Report List -->
    <div class="bg-white p-6 rounded-xl shadow">
        <!-- Header -->
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold">Report for Package: {{ $package->package_name }}</h2>
            <p class="text-sm text-gray-500">Total Students: {{ $students->count() }}</p>
        </div>

      <!-- Search + Filter -->
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
            <!-- Filter Tahun -->
            <select id="yearFilter" class="border rounded-lg px-3 py-2 text-sm w-full sm:w-auto">
                <option value="">All Years</option>
                @php
                    $years = $students->map(function($student) {
                        return \Carbon\Carbon::parse($student->admission_date)->format('Y');
                    })->unique()->sort();
                @endphp
                @foreach($years as $year)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endforeach
            </select>
        </div>

       <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Student Name</th>
                        <th class="px-4 py-3">Current Recitation</th>
                        <th class="px-4 py-3">Admission Date</th>
                    </tr>
                </thead>
                <tbody id="studentBody">
                    @foreach($students as $student)
                        <tr class="border-b">
                            <td class="px-4 py-3 row-index"></td>
                            <td class="px-4 py-3 font-medium text-gray-900">{{ $student->first_name }} {{ $student->last_name }}</td>
                            {{-- show the latest student progress recitation name or 'No Progress' if none exists --}}
                            <td class="px-4 py-3">
                                {{ $student->latestProgress?->recitationModule?->recitation_name ?? 'No Progress' }}
                            </td>
                            <td class="px-4 py-3">{{ \Carbon\Carbon::parse($student->admission_date)->format('d/m/Y') }}</td>
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
        const yearFilter = document.getElementById("yearFilter");
        const tbody = document.getElementById("studentBody");
        const rows = Array.from(tbody.getElementsByTagName("tr"));
        const noRecord = document.getElementById("noRecord");
        const pagination = document.getElementById("paginationControls");
        const entriesInfo = document.getElementById("showingEntries");

        let currentPage = 1;
        const rowsPerPage = 5;

        function renderTable() {
            const searchValue = searchInput.value.toLowerCase();
            const filterYear = yearFilter.value;

            let filteredRows = rows.filter(row => {
                const name = row.cells[1].textContent.toLowerCase();
                const recitation = row.cells[2].textContent.toLowerCase();
                const admissionDate = row.cells[3].textContent;
                const year = admissionDate.split("/")[2]; // ambil tahun dari dd/mm/yyyy

                const matchSearch = name.includes(searchValue) || recitation.includes(searchValue);
                const matchFilter = filterYear === "" || year === filterYear;
                return matchSearch && matchFilter;
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
        yearFilter.addEventListener("change", () => { currentPage = 1; renderTable(); });

        renderTable();
    </script>


</x-admin-layout>