<x-guardian-layout :title="'Papan Pemuka'">
    <!-- Welcome Banner -->
    <div class="relative p-6 sm:p-8 rounded-xl shadow-lg 
                bg-gradient-to-r from-green-600 to-emerald-700 mb-8 overflow-hidden">
        
        <div class="absolute inset-0 opacity-10 bg-[url('/img/pattern.svg')]"></div>

        <div class="relative flex flex-col md:flex-row items-start md:items-center justify-between">
            
            <div class="text-white mb-4 md:mb-0">
                <h2 class="text-2xl sm:text-3xl font-bold leading-tight">Selamat Datang, {{ session('username') }}!</h2>
                
                <p class="mt-1 text-sm sm:text-base font-light opacity-90">
                    Akses rekod kemajuan dan uruskan bil anak anda di sini.
                </p>
            </div>

            <button data-modal-target="addChildModal" data-modal-toggle="addChildModal"
                class="flex-shrink-0 flex items-center gap-2 px-5 py-2.5 text-sm font-semibold rounded-lg 
                    bg-white text-green-700 shadow-md 
                    hover:bg-gray-100 hover:scale-[1.03] transition-all duration-200">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 15l6 -6" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" />
                </svg>
                <span>Pautkan Anak</span>
            </button>
        </div>
    </div>

    <!-- Add Child Modal -->
    <div id="addChildModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative w-full max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <div class="w-6"></div>
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Pautkan Anak</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" 
                        data-modal-hide="addChildModal">✕</button>
            </div>

            <!-- Modal Body -->
            <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                <form id="linkChildForm" action="{{ route('guardian.dashboard.addChild') }}" method="POST">
                @csrf
                    <div class="flex flex-col gap-4">
                        <!-- IC Number -->
                        <div>
                            <label for="ic_number" class="block mb-2 text-sm font-medium text-gray-900">Nombor Kad Pengenalan Anak</label>
                            <input type="text" id="ic_number" name="ic_number" placeholder="030810101788" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        <!-- Relationship type -->
                        <div>
                            <label for="relationship_type" class="block mb-2 text-sm font-medium text-gray-900">Hubungan</label>
                            <select id="relationship_type" name="relationship_type" 
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Pilih Hubungan</option>
                                <option value="Father">Bapa</option>
                                <option value="Mother">Ibu</option>
                                <option value="Guardian">Penjaga</option>
                                <option value="Other">Lain-lain</option>
                            </select>
                        </div>

                        <!-- Submit -->
                        <div class="mt-2">
                            <button type="submit" id="submitFormAddChild" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm py-2.5 text-center w-full">
                                Hantar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        
        <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between border-l-4 border-lime-600">
            <div class="flex-grow">
                <p class="text-sm font-semibold text-lime-600 uppercase tracking-wider">Jumlah Anak</p>
                <h3 class="text-3xl font-extrabold text-gray-900 mt-1">{{ $childrenCount }}</h3>
            </div>
            <svg class="w-10 h-10 text-lime-400 opacity-70" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
            </svg>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between border-l-4 border-amber-600">
            <div class="flex-grow">
                <p class="text-sm font-semibold text-amber-600 uppercase tracking-wider">Jumlah Bil Dibayar</p>
                <h3 class="text-3xl font-extrabold text-gray-900 mt-1">RM{{ number_format($paidBills, 2) }}</h3>
            </div>
            <svg class="w-10 h-10 text-amber-400 opacity-70" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
            </svg>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md flex items-center justify-between border-l-4 border-red-600">
            <div class="flex-grow">
                <p class="text-sm font-semibold text-red-600 uppercase tracking-wider">Jumlah Bil Tertunggak</p>
                <h3 class="text-3xl font-extrabold text-gray-900 mt-1">RM{{ number_format($unpaidBills, 2) }}</h3>
            </div>
            <svg class="w-10 h-10 text-red-400 opacity-70" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M9 2a1 1 0 0 0-1 1H6a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-2a1 1 0 0 0-1-1H9Zm1 2h4v2h1a1 1 0 1 1 0 2H9a1 1 0 0 1 0-2h1V4Zm5.707 8.707a1 1 0 0 0-1.414-1.414L11 14.586l-1.293-1.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd"/>
            </svg>
        </div>
    </div>

    <!-- Schedule -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- 2/3: Upcoming Schedule -->
        <div class="bg-white p-4 rounded-xl shadow lg:col-span-2">
            <!-- Header -->
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="font-semibold text-gray-800">Senarai Jadual</h3>
                </div>
            </div>
            <!-- Search + Filter -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
                <!-- Search -->
                <div class="relative w-full sm:w-full">
                    <input type="text" id="searchInput" placeholder="Cari mengikut nama pelajar"
                        class="w-full pl-10 pr-4 py-2 text-sm border rounded-lg focus:ring focus:ring-green-200" />
                    <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
                    </svg>
                </div>
                <!-- Filter -->
                <input type="date" id="filterDate" class="border rounded-lg px-3 py-2 text-sm w-full sm:w-auto" placeholder="Filter by date">
            </div>
            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-600">
                    <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                        <tr>
                            <th class="px-4 py-3">Bil</th>
                            <th class="px-4 py-3">Nama Pelajar</th>
                            <th class="px-4 py-3">Nama Kelas</th>
                            <th class="px-4 py-3">Jam Mula</th>
                            <th class="px-4 py-3">Jam Akhir</th>
                            <th class="px-4 py-3">Tarikh</th>
                            <th class="px-4 py-3">Nama Guru</th>
                        </tr>
                    </thead>
                    <tbody id="scheduleBody">
                    @forelse ($scheduleData as $data)
                        <tr class="border-b">
                            <td class="px-4 py-3 row-index"></td>
                            <td class="px-4 py-3 font-medium text-gray-900">{{ $data->student->first_name }} {{ $data->student->last_name }}</td>
                            <td class="px-4 py-3 font-medium text-gray-900">{{ $data->class->class_name }}</td>
                            <td class="px-4 py-3">{{ date('H:i', strtotime($data->class->start_time)) }}</td>
                            <td class="px-4 py-3">{{ date('H:i', strtotime($data->class->end_time)) }}</td>
                            <td class="px-4 py-3">{{ \Carbon\Carbon::parse($data->schedule->date)->format('d/m/Y') }}</td>
                            <td class="px-4 py-3">{{ $data->tutor->username }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-8 text-center text-gray-500">
                                Tiada rekod dijumpai. Sila pautkan anak dahulu.
                            </td>
                        </tr>
                    @endforelse
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
            const filterDate = document.getElementById("filterDate");
            const tbody = document.getElementById("scheduleBody");
            const rows = Array.from(tbody.getElementsByTagName("tr"));
            const noRecord = document.getElementById("noRecord");
            const pagination = document.getElementById("pagination");
            const entriesInfo = document.getElementById("entriesInfo");

            let currentPage = 1;
            const rowsPerPage = 5;

            function renderTable() {
                const searchValue = searchInput.value.toLowerCase();
                const dateValue = filterDate.value;

                let filteredRows = rows.filter(row => {
                    const name = row.cells[1].textContent.toLowerCase();
                    const dateText = row.cells[5].textContent.trim();
                    const id = row.cells[0].textContent.toLowerCase();

                    // Date matching logic
                    let matchDate = true;
                    if (dateValue !== "") {
                        // Convert filter date (yyyy-mm-dd) to dd/mm/yyyy format for comparison
                        const [year, month, day] = dateValue.split('-');
                        const formattedFilterDate = `${day}/${month}/${year}`;
                        matchDate = dateText === formattedFilterDate;
                    }

                    const matchSearch = name.includes(searchValue) || id.includes(searchValue);
                    return matchSearch && matchDate;
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
            filterDate.addEventListener("change", () => { currentPage = 1; renderTable(); });

            renderTable();
        </script>
        </div>

        <!-- Children Summary Section -->
        <div class="bg-white p-4 rounded-xl shadow flex flex-col lg:col-span-1">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-semibold text-gray-800">Bacaan terkini</h3>
            </div>

            <div class="space-y-3">
                @forelse ($students as $student)
                    <a href="{{ route('guardian.report.view', ['id' => $student->student_id]) }}" 
                    class="group flex items-center justify-between p-4 rounded-lg shadow bg-gray-100 hover:bg-green-700 transition cursor-pointer">
                        <div class="flex items-center gap-3">
                            <div>
                                <p class="text-sm font-semibold text-gray-700 group-hover:text-white transition">
                                    {{ $student->first_name }} {{ $student->last_name }}
                                </p>

                                <!-- Juz Info -->
                                <div class="flex items-start gap-2 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-4 h-4 text-emerald-600 group-hover:text-white transition mt-[2px]"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                        <path d="M9 17l0 -5" />
                                        <path d="M12 17l0 -1" />
                                        <path d="M15 17l0 -3" />
                                    </svg>
                                    <div class="flex flex-col leading-tight">
                                        <p class="text-xs text-gray-500 group-hover:text-white transition">
                                            {{ $student->latestProgress?->recitationModule?->recitation_name ?? 'No Progress' }}, 
                                            Muka Surat {{ $student->latestProgress?->page_number ?? 'N/A' }}
                                        </p>
                                        <p class="text-xs text-gray-500 group-hover:text-white transition">
                                            ({{ $student->latestProgress?->grade ?? 'N/A' }})
                                        </p>
                                    </div>
                                </div>

                                <!-- Date Info -->
                                <div class="flex items-center gap-2 mt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-4 h-4 text-emerald-600 group-hover:text-white transition"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                                        <path d="M16 3v4" />
                                        <path d="M8 3v4" />
                                        <path d="M4 11h16" />
                                        <path d="M11 15h1" />
                                        <path d="M12 15v3" />
                                    </svg>
                                    <p class="text-xs text-gray-500 group-hover:text-white transition">
                                        {{ $student->latestProgress ? \Carbon\Carbon::parse($student->latestProgress->schedule->date)->format('d/m/Y') : 'N/A' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 text-gray-400 group-hover:text-white transition"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 6l6 6l-6 6" />
                        </svg>
                    </a>
                @empty
                    <div class="p-4 text-center text-gray-500 bg-gray-50 rounded-lg border border-gray-200">
                        Tiada rekod dijumpai.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

</x-guardian-layout>