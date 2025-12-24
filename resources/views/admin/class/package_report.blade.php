<x-admin-layout :title="'Laporan Pakej'">
    <!-- Header with Title (left) and Breadcrumb (right) -->
    <div class="flex items-center justify-between mb-4">
        <!-- Left: Page Title -->
        <h2 class="text-xl font-medium text-gray-800">Laporan Pakej</h2>

        <!-- Right: Breadcrumb -->
        <nav class="text-sm text-gray-500">
            <ol class="flex space-x-2">
                <li><a href="{{ route('admin.package.index') }}" class="hover:text-green-600">Senarai Pakej</a></li>
                <li>/</li>
                <li class="text-green-600">Laporan Pakej</li>
            </ol>
        </nav>
    </div>

    <!-- Package Report List -->
    <div class="bg-white p-6 rounded-xl shadow">
        <!-- Header -->
        {{-- <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold">Laporan Pakej: {{ $package->package_name }}</h2>
            <p class="text-sm text-gray-500">Jumlah Pelajar Berdaftar: {{ $students->count() }}</p>
        </div> --}}

    {{-- maklumat pakej,  $package->package_name, $students->count(), duration_per_session, package_rate--}}
    <div class="mb-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    
    <div class="flex items-center p-3 bg-white border border-gray-200 rounded-lg shadow-sm">
        <div class="flex-shrink-0 p-2 bg-rose-50 rounded-lg text-rose-600 mr-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </svg>
        </div>
        <div>
            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider leading-none mb-1">Pakej</p>
            <p class="text-sm font-semibold text-gray-800 truncate">{{ $package->package_name }}</p>
        </div>
    </div>

    <div class="flex items-center p-3 bg-white border border-gray-200 rounded-lg shadow-sm">
        <div class="flex-shrink-0 p-2 bg-indigo-50 rounded-lg text-indigo-600 mr-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
        </div>
        <div>
            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider leading-none mb-1">Bil. Pelajar</p>
            <p class="text-sm font-semibold text-gray-800">{{ $students->count() }} Orang</p>
        </div>
    </div>

    <div class="flex items-center p-3 bg-white border border-gray-200 rounded-lg shadow-sm">
        <div class="flex-shrink-0 p-2 bg-amber-50 rounded-lg text-amber-600 mr-3">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div>
            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider leading-none mb-1">Durasi/Sesi</p>
            <p class="text-sm font-semibold text-gray-800">{{ $package->duration_per_sessions }}</p>
        </div>
    </div>

    <div class="flex items-center p-3 bg-white border border-gray-200 rounded-lg shadow-sm">
        <div class="flex-shrink-0 p-2 bg-emerald-50 rounded-lg text-emerald-600 mr-3">
            <span class="text-xs font-bold">RM</span>
        </div>
        <div>
            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider leading-none mb-1">Kadar Pakej</p>
            <p class="text-sm font-semibold text-gray-800">{{ number_format($package->package_rate, 2) }}</p>
        </div>
    </div>

</div>

      <!-- Search + Filter -->
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
                    placeholder="Cari mengikut Nama atau bacaan..." 
                    class="block w-full p-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-green-500/20 focus:border-green-600 focus:bg-white transition-all duration-200 outline-none shadow-sm" />
            </div>
             <!-- Filter -->
            <div class="relative w-full sm:w-32">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <select id="yearFilter" 
                        class="appearance-none cursor-pointer w-full p-2.5 pl-10 pr-8 text-sm text-gray-700 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-green-500/20 focus:border-green-600 outline-none shadow-sm transition-all">
                    <option value="">Tahun</option>
                    @php
                        $years = $students->map(function($student) {
                            return \Carbon\Carbon::parse($student->admission_date)->format('Y');
                        })->unique()->sort();
                    @endphp
                    @foreach($years as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>
        </div>

       <!-- Table -->
        <div class="w-full overflow-x-auto">
            <table class="w-full min-w-max text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">Bil</th>
                        <th class="px-4 py-3">Nama Pelajar</th>
                        <th class="px-4 py-3">Bacaan Terkini</th>
                        <th class="px-4 py-3">Tarikh Kemasukan</th>
                    </tr>
                </thead>
                <tbody id="studentBody">
                    @foreach($students as $student)
                        <tr class="border-b">
                            <td class="px-4 py-3 row-index"></td>
                            <td class="px-4 py-3 font-medium text-gray-900">{{ $student->first_name }} {{ $student->last_name }}</td>
                            {{-- show the latest student progress recitation name or 'No Progress' if none exists --}}
                            <td class="px-4 py-3">
                                {{ $student->latestProgress?->recitationModule?->recitation_name ?? 'Tiada kemajuan' }}
                            </td>
                            <td class="px-4 py-3">{{ \Carbon\Carbon::parse($student->admission_date)->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- No record row -->
        <p id="noRecord" class="text-center text-gray-500 py-3 hidden">Tiada rekod ditemui</p>

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
        yearFilter.addEventListener("change", () => { currentPage = 1; renderTable(); });

        renderTable();
    </script>


</x-admin-layout>