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
            <button data-modal-target="addStudentBillModal" data-modal-toggle="addStudentBillModal"
                class="px-4 py-2 text-sm rounded-lg bg-green-600 text-white hover:bg-green-700">
                + Add New Bill
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
            <select id="filterMonth" class="border rounded-lg px-3 py-2 text-sm w-full sm:w-auto">
                <option value="">All Months</option>
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
            </select>
            <select id="filterYear" class="border rounded-lg px-3 py-2 text-sm w-full sm:w-auto">
                <option value="">All Years</option>
                {{-- filter unique salary_year from salary records table--}}
                @foreach ($studentBillRecords as $studentBillRecord)
                    <option value="{{ $studentBillRecord->student_bill_year }}">{{ $studentBillRecord->student_bill_year }}</option>
                @endforeach
            </select>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table id="billTable" class="min-w-full text-sm text-left text-gray-600">
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
                <tbody id="billBody">
                    @foreach ($studentBillRecords as $studentBillRecord)
                    <tr class="border-b">
                        <td class="px-4 py-3 row-index"></td>
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $studentBillRecord->student_bill_name }}</td>
                        <td class="px-4 py-3">{{ $studentBillRecord->student_bill_month }}</td>
                        <td class="px-4 py-3">{{ $studentBillRecord->student_bill_year }}</td>
                        <td class="px-4 py-3">{{ \Carbon\Carbon::parse($studentBillRecord->student_bill_date)->format('d/m/Y') }}</td>
                        <td class="px-4 py-3 flex gap-2 justify-center">
                            <button type="button" class="px-3 py-1 text-xs rounded bg-gray-200 hover:bg-gray-300" data-modal-target="editStudentBillModal" data-modal-toggle="editStudentBillModal">Edit</button>
                            {{-- <a href="{{ route('admin.bill.report.index') }}" class="px-3 py-1 text-xs rounded bg-yellow-400 text-white hover:bg-yellow-500">Report</a> --}}
                            <button class="px-3 py-1 text-xs rounded bg-red-500 text-white hover:bg-red-600">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
             <!-- No Record Message -->
            <div id="noRecord" class="hidden text-center text-gray-500 py-4">No records found</div>
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
            const tbody = document.getElementById("billBody");
            const rows = Array.from(tbody.getElementsByTagName("tr"));
            const noRecord = document.getElementById("noRecord");
            const pagination = document.getElementById("pagination");
            const entriesInfo = document.getElementById("entriesInfo");

            let currentPage = 1;
            const rowsPerPage = 5;

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

    <!-- Add Student Bill Modal -->
    <div id="addStudentBillModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative w-full max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <div class="w-6"></div>
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Add New Bill Report</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="addStudentBillModal">✕</button>
            </div>

            <!-- Modal Body -->
            <form id="billForm" action="{{ route('admin.bill.store') }}" method="POST">
                @csrf
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                        <!-- Month -->
                        <div>
                            <label for="student_bill_month" class="block mb-2 text-sm font-medium text-gray-900">Month</label>
                            <select id="student_bill_month" name="student_bill_month" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Select Month</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="july">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                        </div>

                        <!-- Year -->
                        <div>
                            <label for="student_bill_year" class="block mb-2 text-sm font-medium text-gray-900">Year</label>
                            <select id="student_bill_year" name="student_bill_year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Select Year</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                            </select>
                        </div>
                    </div>

                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button" class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="addStudentBillModal">Cancel</button>

                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-6 py-2.5 text-center">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Student Bill Modal -->
    <div id="editStudentBillModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative w-full max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <div class="w-6"></div>
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Edit Bill Report</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="editStudentBillModal">✕</button>
            </div>

            <!-- Modal Body -->
            <form id="salaryForm">
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                        <!-- Salary Name -->
                        <div>
                            <label for="sb_name" class="block mb-2 text-sm font-medium text-gray-900">Bill Name</label>
                            <input type="text" id="sb_name" name="sb_name" placeholder="Bill-Jan-2026" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        <!-- Month -->
                        <div>
                            <label for="month" class="block mb-2 text-sm font-medium text-gray-900">Month</label>
                            <select id="month" name="month" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Select Month</option>
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
                        </div>

                        <!-- Year -->
                        <div>
                            <label for="year" class="block mb-2 text-sm font-medium text-gray-900">Year</label>
                            <select id="year" name="year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Select Year</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                            </select>
                        </div>
                    </div>

                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button" class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="editStudentBillModal">Cancel</button>

                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-6 py-2.5 text-center">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

</x-admin-layout>