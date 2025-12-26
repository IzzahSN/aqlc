<x-admin-layout :title="'Borang Kehadiran Pelajar'">
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

    <!-- Schedules List -->
    <div class="bg-white p-6 rounded-xl shadow">
        <!-- Header -->
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg font-semibold">Senarai Borang Kehadiran</h2>
                <p class="text-sm text-gray-500">Urus borang kehadiran : tambah baru, cari, tapis, sunting, atau padam.</p>
            </div>
            <button data-modal-target="addScheduleModal" data-modal-toggle="addScheduleModal"
                class="px-4 py-2 text-sm rounded-md font-semibold text-white bg-green-600 shadow-sm hover:bg-green-700 transition-colors duration-200 focus:ring-2 focus:ring-green-400 focus:ring-offset-1">
                + Tambah Borang Kehadiran
            </button>
        </div>

        <!-- Filters -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
            <div class="relative w-full sm:flex-1">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M2.25 6.75c0-1.242 1.008-2.25 2.25-2.25h3.375c.621 0 1.192.243 1.613.675l.343.342c.15.15.354.233.567.233H19.5c1.242 0 2.25 1.008 2.25 2.25v10.5c0 1.242-1.008 2.25-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75Z" />
                    </svg>
                </div>

                <select id="classFilter"
                        class="appearance-none cursor-pointer block w-full p-2.5 pl-10 pr-8 text-sm text-gray-700 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-green-500/20 focus:border-green-600 outline-none shadow-sm transition-all">
                    
                    <option value="">Semua Kelas</option>
                    
                    @foreach ($classes->pluck('class_name')->unique() as $class)
                        <option value="{{ $class }}">{{ $class }}</option>
                    @endforeach
                </select>

                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                
                <div class="relative w-full sm:w-40">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12.75 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM7.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM8.25 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM9.75 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM10.5 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM12.75 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM14.25 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 13.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" />
                            <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <select id="filterDay" 
                            class="appearance-none cursor-pointer w-full p-2.5 pl-10 pr-8 text-sm text-gray-700 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-green-500/20 focus:border-green-600 outline-none shadow-sm transition-all">
                        <option value="">Hari</option>
                        <option value="Isnin">Isnin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Khamis">Khamis</option>
                        <option value="Jumaat">Jumaat</option>
                        <option value="Sabtu">Sabtu</option>
                        <option value="Ahad">Ahad</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>

                <div class="relative w-full sm:w-40">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 2.25a.75.75 0 0 0-.75.75v.54l1.838-.46a9.75 9.75 0 0 1 6.725.738l.108.054a8.25 8.25 0 0 0 5.58.652l3.109-.732a.75.75 0 0 1 .917.81 47.784 47.784 0 0 0 .005 10.337.75.75 0 0 1-.574.812l-3.114.733a9.75 9.75 0 0 1-6.594-.158l-.108-.054a8.25 8.25 0 0 0-5.89-.538l-2.25.54A.75.75 0 0 0 3 6v9.75a.75.75 0 0 0 .75.75h16.5a.75.75 0 0 0 .75-.75V6a.75.75 0 0 0-.75-.75H12a.75.75 0 0 0-.75.75v.75a.75.75 0 0 1-1.5 0V6A.75.75 0 0 0 9 5.25H3.75V3A.75.75 0 0 0 3 2.25Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <select id="filterRoom" 
                            class="appearance-none cursor-pointer w-full p-2.5 pl-10 pr-8 text-sm text-gray-700 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-green-500/20 focus:border-green-600 outline-none shadow-sm transition-all">
                        <option value="">Bilik</option>
                        <option value="Kelas 1">Kelas 1</option>
                        <option value="Kelas 2">Kelas 2</option>
                        <option value="Kelas 3">Kelas 3</option>
                        <option value="Kelas 4">Kelas 4</option>
                        <option value="Bilik 1">Bilik 1</option>
                        <option value="Bilik 2">Bilik 2</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>

                <div class="relative w-full sm:w-auto">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="date" 
                        id="filterDate" 
                        class="block w-full p-2.5 pl-10 text-sm text-gray-700 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-green-500/20 focus:border-green-600 outline-none shadow-sm transition-all cursor-pointer" 
                        placeholder="Filter by date">
                </div>

            </div>
        </div>

        <!-- Table -->
        <div class="w-full overflow-x-auto">
            <table id="scheduleTable" class="w-full min-w-max text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">Bil</th>
                        <th class="px-4 py-3">Nama Kelas</th>
                        <th class="px-4 py-3">Jenis Pakej</th>
                        <th class="px-4 py-3">Hari</th>
                        <th class="px-4 py-3">Bilik</th>
                        <th class="px-4 py-3">Tutor</th>
                        <th class="px-4 py-3">Tarikh</th>
                        <th class="px-4 py-3 text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody id="scheduleBody">
                    @foreach ($schedules as $schedule)
                    <tr class="border-b">
                        <td class="px-4 py-3 row-index"></td>
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $schedule->class->class_name }}</td>
                        {{-- <td class="px-4 py-3">{{ ucfirst($schedule->class->package->package_type) }}</td> --}}
                        <td class="px-4 py-3">
                            {{ $schedule->class->package->package_type == 'personal' ? 'Persendirian' : 'Berkumpulan' }}
                        </td>
                        {{-- <td class="px-4 py-3">{{ $schedule->class->day }}</td> --}}
                        {{-- tukar monday->Isnin --}}
                        <td class="px-4 py-3">
                            @php
                                $daysMap = [
                                    'monday' => 'Isnin',
                                    'tuesday' => 'Selasa',
                                    'wednesday' => 'Rabu',
                                    'thursday' => 'Khamis',
                                    'friday' => 'Jumaat',
                                    'saturday' => 'Sabtu',
                                    'sunday' => 'Ahad',
                                ];
                            @endphp
                            {{ $daysMap[strtolower($schedule->class->day)] ?? $schedule->class->day }}
                        </td>
                        <td class="px-4 py-3">{{ $schedule->class->room }}</td>
                        {{-- if relief null display $schedule->class->tutor->username, if ada value $schedule->relief->tutor->username--}}
                        <td class="px-4 py-3">
                            {{ $schedule->reliefTutor ? $schedule->reliefTutor->username : $schedule->class->tutor->username }}
                        </td>
                        <td class="px-4 py-3">{{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }}</td>
                        <td class="px-4 py-3 flex gap-2 justify-center">
                            <button type="button"
                                class="px-3 py-1 text-xs rounded bg-gray-200 hover:bg-gray-300 edit-button"
                                data-id="{{ $schedule->schedule_id }}" 
                                data-modal-target="editScheduleModal"
                                data-modal-toggle="editScheduleModal">Kemaskini</button>
                            <a href="{{ route('admin.schedule.attendance.index', $schedule->schedule_id) }}" class="px-3 py-1 text-xs rounded bg-yellow-500 text-white hover:bg-yellow-600">Kehadiran</a>                                                        
                        </td>
                    </tr>
                    @endforeach
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
            const searchInput = document.getElementById("classFilter");
            const filterDay = document.getElementById("filterDay");
            const filterRoom = document.getElementById("filterRoom");
            const filterDate = document.getElementById("filterDate");
            const tbody = document.getElementById("scheduleBody");
            const rows = Array.from(tbody.getElementsByTagName("tr"));
            const noRecord = document.getElementById("noRecord");
            const pagination = document.getElementById("pagination");
            const entriesInfo = document.getElementById("entriesInfo");

            let currentPage = 1;
            const rowsPerPage = 10;

            function renderTable() {
                const searchValue = searchInput.value.toLowerCase();
                const dayValue = filterDay.value.toLowerCase();
                const roomValue = filterRoom.value.toLowerCase();
                const dateValue = filterDate.value;

                let filteredRows = rows.filter(row => {
                    const name = row.cells[1].textContent.toLowerCase();
                    const day = row.cells[3].textContent.toLowerCase();
                    const room = row.cells[4].textContent.toLowerCase();
                    const dateText = row.cells[6].textContent.trim(); // Get date in format dd/mm/yyyy

                    const matchSearch = name.includes(searchValue);
                    const matchDay = dayValue === "" || day.includes(dayValue);
                    const matchRoom = roomValue === "" || room.includes(roomValue);
                    
                    // Date matching logic
                    let matchDate = true;
                    if (dateValue !== "") {
                        // Convert filter date (yyyy-mm-dd) to dd/mm/yyyy format for comparison
                        const [year, month, day] = dateValue.split('-');
                        const formattedFilterDate = `${day}/${month}/${year}`;
                        matchDate = dateText === formattedFilterDate;
                    }
                    
                    return matchSearch && matchDay && matchRoom && matchDate;
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
            filterDay.addEventListener("change", () => { currentPage = 1; renderTable(); });
            filterRoom.addEventListener("change", () => { currentPage = 1; renderTable(); });
            filterDate.addEventListener("change", () => { currentPage = 1; renderTable(); });

            renderTable();
        </script>
        </div>

    <!-- Add Schedule Modal -->
    <div id="addScheduleModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative w-full max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <div class="w-6"></div>
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Tambah Borang Kehadiran</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="addScheduleModal">✕</button>
            </div>

            <!-- Modal Body -->
            <form id="classForm" action="{{ route('admin.schedule.store') }}" method="POST">
                @csrf
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                        <!-- Date -->
                        <div>
                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900">Tarikh</label>
                            <input type="date" id="date" name="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        <!-- Class -->
                        <div>
                            <label for="class_id" class="block mb-2 text-sm font-medium text-gray-900">Nama Kelas</label>
                            <select id="class_id" name="class_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>                                
                                <option value="">Pilih Kelas</option>
                                @foreach($classes as $class)
                                    <option value="{{ $class->class_id }}" data-tutor="{{ $class->tutor->tutor_id }}" data-tutorname="{{ $class->tutor->username }}">
                                        {{ $class->class_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                       <!-- Tutor Assign -->
                        <div>
                            <label for="tutor_display" class="block mb-2 text-sm font-medium text-gray-900">Tutor</label>
                            <!-- Papar username tutor -->
                            <input type="text" id="tutor_display" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                focus:ring-green-500 focus:border-green-500 block w-full p-2.5" readonly>

                            <!-- Hidden input simpan tutor_id -->
                            <input type="hidden" id="tutor_id" name="tutor_id">
                        </div>

                        {{-- class script dan display tutor username --}}
                        <script>
                            document.getElementById('class_id').addEventListener('change', function() {
                                let selected = this.options[this.selectedIndex];
                                let tutorId = selected.getAttribute('data-tutor') || '';
                                let tutorName = selected.getAttribute('data-tutorname') || '';

                                // Assign dua-dua sekali
                                document.getElementById('tutor_id').value = tutorId;        // untuk submit
                                document.getElementById('tutor_display').value = tutorName; // untuk paparan
                            });
                        </script>

                        <!-- Relief Assign -->
                        <div>
                            <label for="relief" class="block mb-2 text-sm font-medium text-gray-900">Tutor Ganti</label>
                             <select id="relief" name="relief"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                                <option value="">Pilih Tutor</option>
                                @foreach($tutors as $tutor)
                                    <option value="{{ $tutor->tutor_id }}">{{ $tutor->username }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="addScheduleModal">Batal</button>

                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-4 py-2 text-center">Hantar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Schedule Modal -->
    <div id="editScheduleModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative w-full max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <div class="w-6"></div>
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Kemaskini Borang Kehadiran</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="editScheduleModal">✕</button>
            </div>

            <!-- Modal Body -->
            <form id="editScheduleForm" method="POST">
                @csrf
                @method('PUT')
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                        <!-- Date -->
                        <div>
                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900">Tarikh</label>
                            <input type="date" id="date" name="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        <!-- Class -->
                        <div>
                            <label for="class_id" class="block mb-2 text-sm font-medium text-gray-900">Nama Kelas</label>
                            <select id="class_id" name="class_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>                                
                                <option value="">Pilih Kelas</option>
                                @foreach($classes as $class)
                                    <option value="{{ $class->class_id }}" data-tutor="{{ $class->tutor->tutor_id }}" data-tutorname="{{ $class->tutor->username }}">
                                        {{ $class->class_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                       <!-- Tutor Assign -->
                        <div>
                            <label for="tutor_display" class="block mb-2 text-sm font-medium text-gray-900">Tutor</label>
                            <!-- Papar username tutor -->
                            <input type="text" id="tutor_display" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                focus:ring-green-500 focus:border-green-500 block w-full p-2.5" readonly>

                            <!-- Hidden input simpan tutor_id -->
                            <input type="hidden" id="tutor_id" name="tutor_id">
                        </div>

                        {{-- class script dan display tutor username --}}
                        <script>
                            document.getElementById('class_id').addEventListener('change', function() {
                                let selected = this.options[this.selectedIndex];
                                let tutorId = selected.getAttribute('data-tutor') || '';
                                let tutorName = selected.getAttribute('data-tutorname') || '';

                                // Assign dua-dua sekali
                                document.getElementById('tutor_id').value = tutorId;        // untuk submit
                                document.getElementById('tutor_display').value = tutorName; // untuk paparan
                            });
                        </script>

                        <!-- Relief Assign -->
                        <div>
                            <label for="relief" class="block mb-2 text-sm font-medium text-gray-900">Tutor Ganti</label>
                             <select id="relief" name="relief"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                                <option value="">Pilih Tutor</option>
                                @foreach($tutors as $tutor)
                                    <option value="{{ $tutor->tutor_id }}">{{ $tutor->username }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="editScheduleModal">Batal</button>

                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-4 py-2 text-center">Kemaskini Maklumat</button>
                </div>
            </form>
        </div>
    </div>

     @if(session('closeModalAdd'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const closeBtn = document.querySelector('[data-modal-hide="addScheduleModal"]');
            if (closeBtn) {
                closeBtn.click(); // trigger tutup modal
            }
        });
    </script>
    @endif

    @if(session('closeModalEdit'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const closeBtn = document.querySelector('[data-modal-hide="editScheduleModal"]');
            if (closeBtn) {
                closeBtn.click(); // trigger tutup modal
            }
        });
    </script>
    @endif

    {{-- Edit form --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editButtons = document.querySelectorAll('.edit-button');
            const editForm = document.getElementById('editScheduleForm');

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const scheduleId = this.getAttribute('data-id');
                    fetch(`/admin/schedule/${scheduleId}/edit`)
                        .then(response => response.json())
                        .then(data => {
                            // Set form action
                            editForm.action = `/admin/schedule/${scheduleId}`;

                            // Populate form fields
                            editForm.date.value = data.date || '';
                            editForm.class_id.value = data.class_id || '';
                            editForm.tutor_id.value = data.tutor_id || '';
                            editForm.tutor_display.value = data.tutor_name || '';
                            editForm.relief.value = data.relief || '';
                        })
                        .catch(error => {
                            console.error('Error fetching schedule data:', error);
                        });
                });
            });
        });
    </script>

</x-admin-layout>