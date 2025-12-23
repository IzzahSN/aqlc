<x-admin-layout :title="'Laporan Yuran Pengajian'">
    <!-- Header with Title (left) and Breadcrumb (right) -->
    <div class="flex items-center justify-between mb-4">
        <!-- Left: Page Title -->
        <h2 class="text-xl font-medium text-gray-800">Laporan Yuran Pengajian</h2>

        <!-- Right: Breadcrumb -->
        <nav class="text-sm text-gray-500">
            <ol class="flex space-x-2">
                <li><a href="{{ route('admin.bill.index') }}" class="hover:text-green-600">Senarai Yuran Pengajian</a></li>
                <li>/</li>
                <li class="text-green-600">Laporan Yuran Pengajian</li>
            </ol>
        </nav>
    </div>

     <!-- Attendance Form -->
    <form action="{{ route('admin.bill.report.update', $id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Attendance Report List -->
        <div class="bg-white p-6 rounded-xl shadow">
            <!-- Header -->
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h2 class="text-lg font-semibold">Senarai Laporan Yuran Pengajian</h2>
                    <p class="text-sm text-gray-500">Urus laporan anda: carian, tapis dan kemaskini.</p>
                </div>
                <button type="submit" class="px-4 py-2 text-sm rounded-md font-semibold text-white bg-green-600 shadow-sm hover:bg-green-700 transition-colors duration-200 focus:ring-2 focus:ring-green-400 focus:ring-offset-1">Kemaskini Laporan</button>
            </div>

            <!-- Search -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
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
            </div>

            <!-- Table -->
            <div class="w-full overflow-x-auto">
                <table id="billTable" class="w-full min-w-max text-sm text-left text-gray-600">
                    <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                        <tr>
                            <th class="px-4 py-3">Bil</th>
                            <th class="px-4 py-3">Nama Pelajar</th>
                            <th class="px-4 py-3">Jumlah</th>
                            <th class="px-4 py-3">Nama Penjaga</th>
                            <th class="px-4 py-3">Jenis Pembayaran</th>
                            <th class="px-4 py-3">Bukti (Pilihan)</th>
                            <th class="px-4 py-3 text-center">Status</th>
                            <th class="px-4 py-3 text-center">Tarikh Bayaran</th>
                            <th class="px-4 py-3">Pakej</th>
                            <th class="px-4 py-3 text-center">Bil. Kehadiran</th>
                            <th class="px-4 py-3 text-center">Resit</th>
                        </tr>
                    </thead>
                    <tbody id="billBody">
                        @foreach ($billHistories as $index => $billHistory)   
                        <tr class="border-b">
                            <td class="px-4 py-3 row-index"></td>
                            {{-- student name --}}
                            <td class="px-4 py-3 font-medium text-gray-900">{{ $billHistory->student->first_name }} {{ $billHistory->student->last_name }}</td>
                            {{-- amount --}}
                            <td class="px-4 py-3">RM{{ number_format($billHistory->bill_amount, 2) }}</td>
                            {{-- guardian name --}}
                            <td class="px-4 py-3">
                                {{-- if bill_status == 'Pending' show '-', else show guardian first_name or '-' --}}
                                @if ($billHistory->bill_status == 'Pending')
                                    -
                                @elseif ($billHistory->bill_status == 'Paid' && $billHistory->guardian_id != null)
                                    {{ $billHistory->guardian->first_name}} {{ $billHistory->guardian->last_name }}
                                @else
                                    {{-- if bill_status == 'Unpaid' show selection input for guardian from guardians relationship--}}
                                    <input type="hidden" name="billHistories[{{ $index }}][bill_id]" value="{{ $billHistory->bill_id }}" />
                                    <select name="billHistories[{{ $index }}][guardian_id]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-1.5">
                                        <option value="">Select Guardian</option>
                                        @foreach ($billHistory->student->guardians as $guardian)
                                            <option value="{{ $guardian->guardian_id }}" {{ $billHistory->guardian_id == $guardian->guardian_id ? 'selected' : '' }}>
                                                {{ $guardian->first_name }} {{ $guardian->last_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                @endif
                            </td>
                            {{-- bill type --}}
                            <td class="px-4 py-3">
                                @if ($billHistory->bill_status == 'Pending')
                                    -
                                @elseif ($billHistory->bill_status == 'Paid' && $billHistory->bill_type != null)
                                    {{ $billHistory->bill_type }}
                                @else
                                    {{-- selection input --}}
                                    <input type="hidden" name="billHistories[{{ $index }}][bill_id]" value="{{ $billHistory->bill_id }}" />
                                    <select name="billHistories[{{ $index }}][bill_type]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-1.5">
                                        <option value="">Pilih</option>
                                        <option value="Cash" >Cash</option>
                                        <option value="Online Banking" >Online Banking</option>
                                    </select>                 
                                @endif
                            </td>
                            {{-- bill receipt --}}
                            <td class="px-4 py-3">
                                 <input type="hidden" name="billHistories[{{ $index }}][bill_id]" value="{{ $billHistory->bill_id }}" />
                                    <input type="file" name="billHistories[{{ $index }}][bill_receipt]"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-auto p-1.5"
                                        @if ($billHistory->bill_status == 'Pending') disabled @endif
                                        />
                                     @if($billHistory->bill_receipt != null)
                                        <a href="{{ asset('storage/' . $billHistory->bill_receipt) }}" target="_blank" class="text-blue-600 hover:text-blue-800 text-sm">Lihat Bukti</a>
                                    @endif
                            </td>
                            {{-- bill_status --}}
                            <td class="px-4 py-e">
                                 @if ($billHistory->bill_status == 'Paid')
                                    <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Sudah Bayar</span>
                                @elseif ($billHistory->bill_status == 'Unpaid')
                                    <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">Belum Bayar</span>
                                @else
                                    <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">Sedang Proses</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">{{ $billHistory->bill_date ? \Carbon\Carbon::parse($billHistory->bill_date)->format('d/m/Y') : '-' }}</td>
                            <td class="px-4 py-3">
                                {{ $billHistory->package->package_name }}
                            </td>
                            <td class="px-4 py-3">
                                {{-- display total sessions --}}
                                {{ $attendanceDetails[$index] }} Sesi
                            </td>
                            <td class="px-4 py-3 text-center">
                                @if ($billHistory->bill_status === 'Paid')
                                    <a href="{{ route('admin.bill.report.receipt', $billHistory->bill_id) }}"
                                    target="_blank"
                                    class="inline-flex items-center px-3 py-1 text-sm font-medium text-white bg-green-600 rounded hover:bg-green-700">
                                        Lihat
                                    </a>
                                @else
                                    <span class="text-gray-400 italic">-</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div id="noRecord" class="hidden text-center text-gray-500 py-4">Tiada rekod dijumpai</div>
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
        const tbody = document.getElementById("billBody");
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
            entriesInfo.textContent = `Memaparkan ${start} hingga ${end} daripada ${totalRows} rekod`;

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