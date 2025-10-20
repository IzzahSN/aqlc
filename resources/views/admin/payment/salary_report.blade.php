<x-admin-layout :title="'Salary'">
    <!-- Header with Title (left) and Breadcrumb (right) -->
    <div class="flex items-center justify-between mb-4">
        <!-- Left: Page Title -->
        <h2 class="text-xl font-medium text-gray-800">Salary Report</h2>

        <!-- Right: Breadcrumb -->
        <nav class="text-sm text-gray-500">
            <ol class="flex space-x-2">
                <li><a href="{{ route('admin.salary.index') }}" class="hover:text-green-600">Salary</a></li>
                <li>/</li>
                <li>Report</li>
            </ol>
        </nav>
    </div>

    <!-- Attendance Form -->
    <form action="{{ route('admin.salary.report.update', $id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Attendance Report List -->
        <div class="bg-white p-6 rounded-xl shadow">
            <!-- Header -->
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h2 class="text-lg font-semibold">List of Report</h2>
                    <p class="text-sm text-gray-500">Manage your report: search, filter and update.</p>
                </div>
                <button type="submit"
                    class="px-4 py-2 text-sm rounded-sm bg-green-600 text-white hover:bg-green-700">
                    Allocate Payment
                </button>
            </div>

            <!-- Search -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
                <div class="relative w-full sm:w-full">
                    <input type="text" id="searchInput" placeholder="Search by name or ID"
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
                <table id="salaryTable" class="min-w-full text-sm text-left text-gray-600">
                    <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                        <tr>
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Tutor Name</th>
                            <th class="px-4 py-3">Amount</th>
                            <th class="px-4 py-3">Proof</th>
                            <th class="px-4 py-3 text-center">Status</th>
                            <th class="px-4 py-3 text-center">Date</th>
                            <th class="px-4 py-3">Total Hours</th>
                        </tr>
                    </thead>
                    <tbody id="salaryBody">
                        @foreach ($billHistories as $index => $billHistory)                            
                        <tr class="border-b">
                            <td class="px-4 py-3 row-index"></td>
                            <td class="px-4 py-3 font-medium text-gray-900">{{ $billHistory->tutor->username }}</td>
                            {{-- show in 2 point --}}
                            <td class="px-4 py-3">RM{{ number_format($billHistory->bill_amount, 2) }}</td>
                            <td class="px-4 py-3">
                                {{-- if bill_status pending, bill_receipt read_only --}}
                                <div class="flex items-center gap-2">
                                    <input type="hidden" name="billHistories[{{ $index }}][bill_id]" value="{{ $billHistory->bill_id }}" />
                                    <input type="file" name="billHistories[{{ $index }}][bill_receipt]"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-auto p-1.5"
                                        @if ($billHistory->bill_status == 'Pending') disabled @endif
                                        />
                                     @if($billHistory->bill_receipt != null)
                                        <a href="{{ asset('storage/' . $billHistory->bill_receipt) }}" target="_blank" class="text-blue-600 hover:text-blue-800 text-sm">View Receipt</a>
                                    @endif
                                </div>
                            </td>
                            <td class="px-4 py-3 text-center">
                                {{-- if pending status in yellow badge, if Unpaid in red and Paid in green --}}
                                @if ($billHistory->bill_status == 'Paid')
                                    <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Paid</span>
                                @elseif ($billHistory->bill_status == 'Unpaid')
                                    <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">Unpaid</span>
                                @else
                                    <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                {{-- if null display '-' --}}
                                {{ $billHistory->bill_date ? \Carbon\Carbon::parse($billHistory->bill_date)->format('d/m/Y') : '-' }}
                            </td>
                            <td class="px-4 py-3">
                                {{-- display total hours --}}
                                {{ $totalHours[$index] }} Hours
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div id="noRecord" class="hidden text-center text-gray-500 py-4">No records found</div>
            </div>

             <!-- Pagination Info -->
            <div class="flex flex-col sm:flex-row items-center justify-between mt-4 text-sm text-gray-600">
                <div id="entriesInfo" class="mb-2 sm:mb-0"></div>
                <div class="flex items-center gap-2" id="pagination"></div>
            </div>
        </div>
    </form>

    <!-- Pagination + Search Script -->
    <script>
        const searchInput = document.getElementById("searchInput");
        const tbody = document.getElementById("salaryBody");
        const rows = Array.from(tbody.getElementsByTagName("tr"));
        const noRecord = document.getElementById("noRecord");
        const pagination = document.getElementById("pagination");
        const entriesInfo = document.getElementById("entriesInfo");

        let currentPage = 1;
        const rowsPerPage = 5;

        function renderTable() {
            const searchValue = searchInput.value.toLowerCase();

            let filteredRows = rows.filter(row => {
                const name = row.cells[1].textContent.toLowerCase();
                const id = row.cells[0].textContent.toLowerCase();
                return name.includes(searchValue) || id.includes(searchValue);
            });

            const totalRows = filteredRows.length;
            const totalPages = Math.ceil(totalRows / rowsPerPage);
            if (currentPage > totalPages) currentPage = totalPages || 1;

            rows.forEach(r => r.style.display = "none");
            let pageRows = filteredRows.slice((currentPage - 1) * rowsPerPage, currentPage * rowsPerPage);
            pageRows.forEach((r, i) => {
                r.style.display = "";
                r.querySelector(".row-index").textContent = (currentPage - 1) * rowsPerPage + (i + 1);
            });

            noRecord.classList.toggle("hidden", totalRows > 0);

            const start = totalRows === 0 ? 0 : (currentPage - 1) * rowsPerPage + 1;
            const end = Math.min(currentPage * rowsPerPage, totalRows);
            entriesInfo.textContent = `Showing ${start} to ${end} of ${totalRows} entries`;

            pagination.innerHTML = "";

            // Prev
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

            // Numbers
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

            // Next
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
        // Prevent form submission when Enter is pressed in search input
        searchInput.addEventListener("keydown", (e) => {
            if (e.key === "Enter") {
                e.preventDefault();
            }
        });
        renderTable();
    </script>

</x-admin-layout>