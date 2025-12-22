<x-tutor-layout :title="'Borang Kehadiran Pelajar'">
    <!-- Class Timetable -->
    <div class="bg-white p-4 rounded-sm shadow mb-6">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
            <div class="flex items-start gap-3">
                <div class="p-2.5 bg-green-50 rounded-lg text-green-600 shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M12.75 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM7.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM8.25 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM9.75 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM10.5 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM12.75 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM14.25 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 13.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" />
                        <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-800">Jadual Kelas</h2>
                    <p class="text-sm text-gray-500">Gambaran keseluruhan jadual kelas mingguan.</p>
                </div>
            </div>

            <div class="flex flex-wrap gap-2 justify-start md:justify-end">
                
                <div class="inline-flex items-center gap-1.5 px-3 py-1 bg-white border border-gray-200 rounded-full shadow-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-green-800"></span>
                    <span class="text-xs font-medium text-gray-600">Kelas 1</span>
                </div>

                <div class="inline-flex items-center gap-1.5 px-3 py-1 bg-white border border-gray-200 rounded-full shadow-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-orange-500"></span>
                    <span class="text-xs font-medium text-gray-600">Kelas 2</span>
                </div>

                <div class="inline-flex items-center gap-1.5 px-3 py-1 bg-white border border-gray-200 rounded-full shadow-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-red-500"></span>
                    <span class="text-xs font-medium text-gray-600">Kelas 3</span>
                </div>

                <div class="inline-flex items-center gap-1.5 px-3 py-1 bg-white border border-gray-200 rounded-full shadow-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span>
                    <span class="text-xs font-medium text-gray-600">Kelas 4</span>
                </div>

                <div class="inline-flex items-center gap-1.5 px-3 py-1 bg-white border border-gray-200 rounded-full shadow-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-purple-500"></span>
                    <span class="text-xs font-medium text-gray-600">Bilik 1</span>
                </div>

                <div class="inline-flex items-center gap-1.5 px-3 py-1 bg-white border border-gray-200 rounded-full shadow-sm">
                    <span class="w-2.5 h-2.5 rounded-full bg-pink-500"></span>
                    <span class="text-xs font-medium text-gray-600">Bilik 2</span>
                </div>

            </div>
        </div>

        <!-- Class timetable -->
        <div class="overflow-x-auto mb-6">
            <table class="w-max min-w-full border-collapse text-xs">
                <!-- Table Head -->
               <thead class="bg-gray-50 sticky top-0 z-10">
                    <tr class="text-gray-600">
                        <th class="border border-gray-200 p-2 text-left min-w-[80px]">Day</th>
                        @foreach($timeSlots as $slot)
                            <th class="border border-gray-200 p-2 text-center">{{ $slot }}</th>
                        @endforeach
                    </tr>
                </thead>

                <!-- Table Body -->
               <tbody class="divide-y divide-gray-100 border border-gray-200">
                @foreach($days as $day)
                    <tr class="hover:bg-gray-50 border border-gray-200">
                        <td class="p-2 font-medium text-gray-700 border border-gray-200">{{ $day }}</td>
                        @foreach($timeSlots as $slot)
                            <td class="text-center space-y-1 py-1">
                                @forelse($timetable[$day][$slot] as $class)
                                    <span class="block m-1 px-3 py-1 text-xs rounded-sm 
                                        {{ $class->room == 'Kelas 1' ? 'bg-green-100 text-green-800' : '' }}
                                        {{ $class->room == 'Kelas 2' ? 'bg-orange-100 text-orange-800' : '' }}
                                        {{ $class->room == 'Kelas 3' ? 'bg-red-100 text-red-800' : '' }}
                                        {{ $class->room == 'Kelas 4' ? 'bg-blue-100 text-blue-800' : '' }}
                                        {{ $class->room == 'Bilik 1' ? 'bg-purple-100 text-purple-800' : '' }}
                                        {{ $class->room == 'Bilik 2' ? 'bg-pink-100 text-pink-800' : '' }}
                                        font-medium">
                                        {{ $class->tutor->username }}
                                    </span>
                                @empty
                                    {{-- row dan column yang kosong letak dash --}}
                                    <span class="text-gray-300">-</span>
                                @endforelse
                            </td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Report List -->
    <div class="bg-white p-6 rounded-xl shadow">
        <!-- Header -->
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg font-semibold">Senarai Rekod Prestasi Pelajar</h2>
                <p class="text-sm text-gray-500">Urus laporan anda: cari, tapis dan kemaskini.</p>
            </div>
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
                    placeholder="Cari mengikut nama kelas..." 
                    class="block w-full p-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-green-500/20 focus:border-green-600 focus:bg-white transition-all duration-200 outline-none shadow-sm" />
            </div>

            <div class="relative w-full sm:w-auto">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <input type="date" 
                    id="filterDate" 
                    class="block w-full p-2.5 pl-10 text-sm text-gray-700 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-green-500/20 focus:border-green-600 outline-none shadow-sm transition-all cursor-pointer" 
                    placeholder="Filter by date">
            </div>

        </div>

        <!-- Pilih Kelas -->
        {{-- caraousel selection mengikut nama kelas yang unique --}}

        <!-- Table -->
        <div class="w-full overflow-x-auto">
            <table class="w-full min-w-max text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">Bil</th>
                        <th class="px-4 py-3">Nama Kelas</th>
                        <th class="px-4 py-3">Jenis Pakej</th>
                        <th class="px-4 py-3">Masa Mula</th>
                        <th class="px-4 py-3">Masa Tamat</th>
                        <th class="px-4 py-3">Tarikh</th>
                        <th class="px-4 py-3 text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody id="reportBody">
                    @foreach ($schedules as $schedule)                        
                    <tr class="border-b">
                        <td class="px-4 py-3 row-index"></td>
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $schedule->class->class_name }}</td>
                        <td class="px-4 py-3">{{ ucfirst($schedule->class->package->package_type) }}</td>
                        {{-- display start_time in 21:00:00 --}}
                        <td class="px-4 py-3">{{ \Carbon\Carbon::parse($schedule->class->start_time)->format('H:i:i') }}</td>
                        <td class="px-4 py-3">{{ \Carbon\Carbon::parse($schedule->class->end_time)->format('H:i:i') }}</td>
                        <td class="px-4 py-3">{{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }}</td>
                        <td class="px-4 py-3 flex gap-2 justify-center">
                            <a href="{{ route('tutor.schedule.attendance.index', $schedule->schedule_id) }}" class="px-3 py-1 text-xs rounded bg-yellow-500 text-white hover:bg-yellow-600">Kehadiran</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- No Records Message -->
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
            const filterDate = document.getElementById("filterDate")
            const tbody = document.getElementById("reportBody");
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
                    const id = row.cells[0].textContent.toLowerCase();
                    const dateText = row.cells[5].textContent.trim(); // 👈 ambil status

                    const matchSearch = name.includes(searchValue) || id.includes(searchValue);
                    // Date matching logic
                    let matchDate = true;
                    if (dateValue !== "") {
                        // Convert filter date (yyyy-mm-dd) to dd/mm/yyyy format for comparison
                        const [year, month, day] = dateValue.split('-');
                        const formattedFilterDate = `${day}/${month}/${year}`;
                        matchDate = dateText === formattedFilterDate;
                    }
                    
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
            filterDate.addEventListener("change", () => { currentPage = 1; renderTable(); });
            renderTable();
        </script>
    </div>
</x-tutor-layout>