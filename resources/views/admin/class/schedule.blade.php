<x-admin-layout :title="'Schedule'">
    <!-- Class Timetable -->
    <div class="bg-white p-4 rounded-sm shadow mb-6 border-l-lime-600 border-l-6">
        <!-- Header -->
            <div class="flex items-center justify-between mb-4">
                {{-- Title & description --}}
                <div>
                    <h2 class="text-lg font-semibold">Class Timetable</h2>
                    <p class="text-sm text-gray-500">Overview of class schedules for the week.</p>
                </div>

                <!-- Legend -->
                <div class="flex gap-4 mt-4 justify-center flex-wrap">
                    <div class="flex items-center gap-1">
                        <span class="w-3 h-3 rounded-full bg-green-800"></span>
                        <span class="text-sm text-gray-700">Kelas 1</span>
                    </div>
                    <div class="flex items-center gap-1">
                        <span class="w-3 h-3 rounded-full bg-orange-500"></span>
                        <span class="text-sm text-gray-700">Kelas 2</span>
                    </div>
                    <div class="flex items-center gap-1">
                        <span class="w-3 h-3 rounded-full bg-red-500"></span>
                        <span class="text-sm text-gray-700">Kelas 3</span>
                    </div>
                    <div class="flex items-center gap-1">
                        <span class="w-3 h-3 rounded-full bg-blue-500"></span>
                        <span class="text-sm text-gray-700">Kelas 4</span>
                    </div>
                    <div class="flex items-center gap-1">
                        <span class="w-3 h-3 rounded-full bg-purple-500"></span>
                        <span class="text-sm text-gray-700">Bilik 1</span>
                    </div>
                    <div class="flex items-center gap-1">
                        <span class="w-3 h-3 rounded-full bg-pink-500"></span>
                        <span class="text-sm text-gray-700">Bilik 2</span>
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
                <h2 class="text-lg font-semibold">List of Schedules</h2>
                <p class="text-sm text-gray-500">Manage your schedules: add new, search, filter, edit, or delete.</p>
            </div>
            <button data-modal-target="addScheduleModal" data-modal-toggle="addScheduleModal"
                class="px-4 py-2 text-sm rounded-lg bg-green-600 text-white hover:bg-green-700">
                + Add New Schedule
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
            <select id="filterDay" class="border rounded-lg px-3 py-2 text-sm w-full sm:w-auto">
                <option value="">All Days</option>
                <option value="monday">Monday</option>
                <option value="tuesday">Tuesday</option>
                <option value="wednesday">Wednesday</option>
                <option value="thursday">Thursday</option>
                <option value="friday">Friday</option>
                <option value="saturday">Saturday</option>
                <option value="sunday">Sunday</option>
            </select>
            <select id="filterRoom" class="border rounded-lg px-3 py-2 text-sm w-full sm:w-auto">
                <option value="">All Rooms</option>
                <option value="Kelas 1">Kelas 1</option>
                <option value="Kelas 2">Kelas 2</option>
                <option value="Kelas 3">Kelas 3</option>
                <option value="Kelas 4">Kelas 4</option>
                <option value="Bilik 1">Bilik 1</option>
                <option value="Bilik 2">Bilik 2</option>
            </select>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table id="scheduleTable" class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Class Name</th>
                        <th class="px-4 py-3">Package Type</th>
                        <th class="px-4 py-3">Day</th>
                        <th class="px-4 py-3">Room</th>
                        <th class="px-4 py-3">Tutor Name</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="scheduleBody">
                    @foreach ($schedules as $schedule)
                    <tr class="border-b">
                        <td class="px-4 py-3 row-index"></td>
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $schedule->class->class_name }}</td>
                        <td class="px-4 py-3">{{ ucfirst($schedule->class->package->package_type) }}</td>
                        <td class="px-4 py-3">{{ $schedule->class->day }}</td>
                        <td class="px-4 py-3">{{ $schedule->class->room }}</td>
                        {{-- if relief null display $schedule->class->tutor->username, if ada value $schedule->relief->tutor->username--}}
                        <td class="px-4 py-3">
                            {{ $schedule->reliefTutor ? $schedule->reliefTutor->username : $schedule->class->tutor->username }}
                        </td>
                        <td class="px-4 py-3">{{ $schedule->date }}</td>
                        <td class="px-4 py-3 flex gap-2 justify-center">
                            <button type="button" class="px-3 py-1 text-xs rounded bg-gray-200 hover:bg-gray-300" data-modal-target="editScheduleModal" data-modal-toggle="editScheduleModal">Edit</button>
                            <a href="{{ route('admin.schedule.attendance') }}" class="px-3 py-1 text-xs rounded bg-yellow-400 text-white hover:bg-yellow-500">Attendance</a>
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
            const filterDay = document.getElementById("filterDay");
            const filterRoom = document.getElementById("filterRoom");
            const tbody = document.getElementById("scheduleBody");
            const rows = Array.from(tbody.getElementsByTagName("tr"));
            const noRecord = document.getElementById("noRecord");
            const pagination = document.getElementById("pagination");
            const entriesInfo = document.getElementById("entriesInfo");

            let currentPage = 1;
            const rowsPerPage = 5;

            function renderTable() {
                const searchValue = searchInput.value.toLowerCase();
                const dayValue = filterDay.value.toLowerCase();
                const roomValue = filterRoom.value.toLowerCase();

                let filteredRows = rows.filter(row => {
                    const name = row.cells[1].textContent.toLowerCase();
                    const id = row.cells[0].textContent.toLowerCase();
                    const day = row.cells[3].textContent.toLowerCase(); // 👈 ambil day
                    const room = row.cells[4].textContent.toLowerCase(); // 👈 ambil room

                    const matchSearch = name.includes(searchValue) || id.includes(searchValue);
                    const matchDay = dayValue === "" || day.includes(dayValue);
                    const matchRoom = roomValue === "" || room.includes(roomValue);
                    return matchSearch && matchDay && matchRoom;
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
            filterDay.addEventListener("change", () => { currentPage = 1; renderTable(); });
            filterRoom.addEventListener("change", () => { currentPage = 1; renderTable(); });

            renderTable();
        </script>
    </div>

    <!-- Add Schedule Modal -->
    <div id="addScheduleModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative w-full max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <div class="w-6"></div>
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Add New Schedule</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="addScheduleModal">✕</button>
            </div>

            <!-- Modal Body -->
            <form id="classForm" action="{{ route('admin.schedule.store') }}" method="POST">
                @csrf
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                        <!-- Date -->
                        <div>
                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900">Schedule Date</label>
                            <input type="date" id="date" name="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        <!-- Class -->
                        <div>
                            <label for="class_id" class="block mb-2 text-sm font-medium text-gray-900">Select Class</label>
                            <select id="class_id" name="class_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>                                
                                <option value="">Select Class</option>
                                @foreach($classes as $class)
                                    <option value="{{ $class->class_id }}" data-tutor="{{ $class->tutor->tutor_id }}" data-tutorname="{{ $class->tutor->username }}">
                                        {{ $class->class_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                       <!-- Tutor Assign -->
<div>
    <label for="tutor_display" class="block mb-2 text-sm font-medium text-gray-900">Assign Tutor</label>
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
                            <label for="relief" class="block mb-2 text-sm font-medium text-gray-900">Relief Tutor</label>
                             <select id="relief" name="relief"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                                <option value="">Select Tutor</option>
                                @foreach($tutors as $tutor)
                                    <option value="{{ $tutor->tutor_id }}">{{ $tutor->username }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button" class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="addScheduleModal">Cancel</button>

                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-6 py-2.5 text-center">Submit</button>
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
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Edit Schedule</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="editScheduleModal">✕</button>
            </div>

            <!-- Modal Body -->
            <form id="classForm">
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                        <!-- Schedule -->
                        <div>
                            <label for="schedule_date" class="block mb-2 text-sm font-medium text-gray-900">Schedule Date</label>
                            <input type="date" id="schedule_date" name="schedule_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        <!-- Class -->
                        <div>
                            <label for="class" class="block mb-2 text-sm font-medium text-gray-900">Select Class</label>
                            <select id="class" name="class" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Select Class</option>
                                <option value="1">Mon-2000-K1</option>
                                <option value="2">Tue-2000-K1</option>
                            </select>
                        </div>

                        <!-- Tutor Assign -->
                        <div>
                            <label for="tutor" class="block mb-2 text-sm font-medium text-gray-900">Assign Tutor</label>
                            <select id="tutor" name="tutor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" disabled>
                                <option value="2">Ustazah Aira</option>
                            </select>
                        </div>

                        <!-- Relief Assign -->
                        <div>
                            <label for="tutor" class="block mb-2 text-sm font-medium text-gray-900">Assign Tutor</label>
                            <select id="tutor" name="tutor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="none">None</option>
                                <option value="1">Ustaz Hakeem</option>
                                <option value="2">Ustazah Aira</option>
                            </select>
                        </div>
                    </div>

                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button" class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="editScheduleModal">Cancel</button>

                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-6 py-2.5 text-center">Save Changes</button>
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

</x-admin-layout>