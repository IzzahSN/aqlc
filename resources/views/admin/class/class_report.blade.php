<x-admin-layout :title="'Laporan Kelas'">
    <!-- Header with Title (left) and Breadcrumb (right) -->
    <div class="flex items-center justify-between mb-4">
        <!-- Left: Page Title -->
        <h2 class="text-xl font-medium text-gray-800">Laporan Kelas</h2>

        <!-- Right: Breadcrumb -->
        <nav class="text-sm text-gray-500">
            <ol class="flex space-x-2">
                <li><a href="{{ route('admin.class.index') }}" class="hover:text-green-600">Senarai Kelas</a></li>
                <li>/</li>
                <li class="text-green-600">Laporan Kelas</li>
            </ol>
        </nav>
    </div>

    <!-- Class Report List -->
    <div class="bg-white p-6 rounded-xl shadow">
        <!-- Header -->
        {{-- <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg font-semibold">Senarai Laporan</h2>
                <p class="text-sm text-gray-500">Urus laporan anda: carian, tapis dan kemaskini.</p>
            </div>
        </div> --}}

        {{-- maklumat kelas, $class->class_name, bilangan ahli - capacity, guru kelas - tutor->username --}}
        <div class="mb-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="flex items-center p-3 bg-white border border-gray-200 rounded-lg shadow-sm">
                <div class="flex-shrink-0 p-2 bg-violet-50 rounded-lg text-violet-600 mr-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider leading-none mb-1">Nama Kelas</p>
                    <p class="text-sm font-semibold text-gray-800">{{ $class->class_name }}</p>
                </div>
            </div>

            <div class="flex items-center p-3 bg-white border border-gray-200 rounded-lg shadow-sm">
                <div class="flex-shrink-0 p-2 bg-sky-50 rounded-lg text-sky-600 mr-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider leading-none mb-1">Kapasiti Ahli</p>
                    <div class="flex items-center gap-2">
                        <p class="text-sm font-semibold text-gray-800">{{ $class->students->count() }} / {{ $class->capacity }}</p>
                        <span class="text-[10px] px-1.5 py-0.5 bg-sky-100 text-sky-700 rounded-full font-medium">Pelajar</span>
                    </div>
                </div>
            </div>

            <div class="flex items-center p-3 bg-white border border-gray-200 rounded-lg shadow-sm sm:col-span-2 lg:col-span-1">
                <div class="flex-shrink-0 p-2 bg-teal-50 rounded-lg text-teal-600 mr-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider leading-none mb-1">Guru Kelas</p>
                    <p class="text-sm font-semibold text-gray-800 truncate">{{ $class->tutor->username }}</p>
                </div>
            </div>

        </div>

        <!-- Search -->
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
        </div>

        <!-- Table -->
        <div class="w-full overflow-x-auto">
            <table class="w-full min-w-max text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">Bil</th>
                        <th class="px-4 py-3">Tarikh Kelas</th>
                        <th class="px-4 py-3">Jumlah Hadir</th>
                        <th class="px-4 py-3">Jumlah Tidak Hadir</th>
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
        <div id="noRecord" class="text-center text-gray-500 py-3 hidden">Tiada rekod dijumpai</div>

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
            entriesInfo.textContent = `Memaparkan ${start} hingga ${end} daripada ${totalRows} rekod`;

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
</x-admin-layout>