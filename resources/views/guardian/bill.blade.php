<x-guardian-layout :title="'Student Bill'">
    <!-- Student Bill List -->
    <div class="bg-white p-6 rounded-xl shadow">
        <!-- Header -->
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg font-semibold">Senarai Bill Pelajar</h2>
                <p class="text-sm text-gray-500">Urus bil pelajar menggunakan fungsi carian dan tapisan.</p>
            </div>
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
                <option value="">Status</option>
                <option value="Sudah Bayar">Sudah Bayar</option>
                <option value="Belum Bayar">Belum Bayar</option>
                <option value="Sedang Proses">Sedang Proses</option>
            </select>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">Bil</th>
                        <th class="px-4 py-3">Nama Bil</th>
                        <th class="px-4 py-3">Nama Pelajar</th>
                        <th class="px-4 py-3">Jumlah</th>
                        <th class="px-4 py-3 text-center">Status</th>
                        <th class="px-4 py-3">Tarikh Bill</th>
                        <th class="px-4 py-3 text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody id="billBody">
                    @foreach ($billHistories as $billHistory)                        
                    <tr class="border-b">
                        <td class="px-4 py-3 row-index"></td>
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $billHistory->studentBill->student_bill_name }}</td>
                        <td class="px-4 py-3">{{ $billHistory->student->first_name }} {{ $billHistory->student->last_name }}</td>
                        <td class="px-4 py-3">RM{{ number_format($billHistory->bill_amount, 2) }}</td>
                        <td class="flex justify-center">
                            @if ($billHistory->bill_status == 'Paid')
                                <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-800">Sudah Bayar</span>
                            @elseif ($billHistory->bill_status == 'Unpaid')
                                <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-800">Belum Bayar</span>
                            @elseif ($billHistory->bill_status == 'Pending')
                                <span class="px-3 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">Sedang Proses</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center">
                            {{ $billHistory->bill_date ? \Carbon\Carbon::parse($billHistory->bill_date)->format('d/m/Y') : '-' }}
                        </td>
                        <td class="px-4 py-3 flex gap-2 justify-center">
                            {{-- if bill_status == pending/paid, pay button disable --}}
                            @if ($billHistory->bill_status == 'Unpaid')
                            <a href="{{ route('guardian.bill.toyyibpay.create', $billHistory->bill_id)}}" class="px-3 py-1 text-xs rounded bg-green-500 text-white hover:bg-green-600">Bayar</a>
                            @else
                            <button class="px-3 py-1 text-xs rounded bg-gray-300 text-white cursor-not-allowed" disabled>Bayar</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- No Record Message -->
            <div id="noRecord" class="hidden text-center text-gray-500 py-4">Tiada rekod dijumpai.</div>
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
            const filterType = document.getElementById("filterStatus");
            const tbody = document.getElementById("billBody");
            const rows = Array.from(tbody.getElementsByTagName("tr"));
            const noRecord = document.getElementById("noRecord");
            const pagination = document.getElementById("pagination");
            const entriesInfo = document.getElementById("entriesInfo");

            let currentPage = 1;
            const rowsPerPage = 5;

            function renderTable() {
                const searchValue = searchInput.value.toLowerCase();
                const statusValue = filterType.value.toLowerCase();

                let filteredRows = rows.filter(row => {
                    const name = row.cells[1].textContent.toLowerCase();
                    const status = row.cells[4].textContent.trim().toLowerCase();
                    const id = row.cells[0].textContent.toLowerCase();

                    const matchSearch = name.includes(searchValue) || id.includes(searchValue);
                    const matchFilter = statusValue === "" || status === statusValue;
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
            filterType.addEventListener("change", () => { currentPage = 1; renderTable(); });

            renderTable();
        </script>
    </div>
</x-guardian-layout>