<x-tutor-layout :title="'Kehadiran'">
    <!-- Header with Title (left) and Breadcrumb (right) -->
    <div class="flex items-center justify-between mb-4">
        <!-- Left: Page Title -->
        <h2 class="text-xl font-medium text-gray-800">Laporan Kehadiran Kelas</h2>

        <!-- Right: Breadcrumb -->
        <nav class="text-sm text-gray-500">
            <ol class="flex space-x-2">
                <li><a href="{{ route('tutor.schedule.index') }}" class="hover:text-green-600">Senarai Borang Kehadiran</a></li>
                <li>/</li>
                <li class="text-green-600">Laporan Kehadiran</li>
            </ol>
        </nav>
    </div>

    <!-- Attendance Form -->
    <form action="{{ route('tutor.schedule.attendance.update', $id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Attendance Report List -->
        <div class="bg-white p-6 rounded-xl shadow">
            <!-- Header -->
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h2 class="text-lg font-semibold">Senarai Kehadiran</h2>
                    <p class="text-sm text-gray-500">Urus laporan kehadiran anda: cari, tapis dan kemas kini.</p>
                </div>
                <div>
                     <!-- if student ganti kelas -->
                    <button data-modal-target="addStudentModal" data-modal-toggle="addStudentModal" type="button"
                        class="px-4 py-2 text-sm rounded-md font-semibold text-white bg-yellow-500 shadow-sm hover:bg-yellow-600 transition-colors duration-200 focus:ring-2 focus:ring-yellow-400 focus:ring-offset-1">
                        + Tambah Pelajar
                    </button>
                    <button type="submit"
                        class="px-4 py-2 text-sm rounded-md font-semibold text-white bg-green-600 shadow-sm hover:bg-green-700 transition-colors duration-200 focus:ring-2 focus:ring-green-400 focus:ring-offset-1">
                        Kemaskini Kehadiran
                    </button>
                </div>
            </div>

            {{-- maklumat kelas [nama kelas dan tarikh] --}}
            <div class="mb-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="flex items-center p-3 bg-white border border-gray-200 rounded-lg shadow-sm">
                    <div class="flex-shrink-0 p-2 bg-green-50 rounded-lg text-green-600 mr-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider leading-none mb-1">Nama Kelas</p>
                        <p class="text-sm font-semibold text-gray-800">{{ $className }}</p>
                    </div>
                </div>

                <div class="flex items-center p-3 bg-white border border-gray-200 rounded-lg shadow-sm">
                    <div class="flex-shrink-0 p-2 bg-blue-50 rounded-lg text-blue-600 mr-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider leading-none mb-1">Tarikh Rekod</p>
                        <p class="text-sm font-semibold text-gray-800">{{ \Carbon\Carbon::parse($date)->format('d M Y, l') }}</p>
                    </div>
                </div>
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
                <table id="attendanceTable" class="w-full min-w-max text-sm text-left text-gray-600">
                    <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                        <tr>
                            <th class="px-4 py-3">Bil</th>
                            <th class="px-4 py-3">Nama Pelajar</th>
                            <th class="px-4 py-3">Catatan</th>
                            <th class="px-4 py-3 text-center">Kehadiran</th>
                            <th class="px-4 py-3 text-center">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody id="attendanceBody">
                        @foreach ($attendances as $index => $attendance)
                            <tr class="border-b">
                                <td class="px-4 py-3 row-index"></td>

                                <td class="px-4 py-3 font-medium text-gray-900">
                                    {{ $attendance->student->first_name }} {{ $attendance->student->last_name }}
                                </td>

                                <td class="px-4 py-3">
                                    <input type="hidden" name="attendances[{{ $index }}][attendance_id]"
                                        value="{{ $attendance->attendance_id }}">
                                        {{-- if status == 1, display '-', else show input box --}}
                                    @if($attendance->status == 1)
                                        <span class="text-gray-500 italic">-</span>
                                    @else
                                        <input type="text"
                                            name="attendances[{{ $index }}][remark]" 
                                            value="{{ $attendance->remark }}"
                                            placeholder="Masukkan catatan..."
                                            @if($attendance->status == 1) disabled @endif
                                            class="w-full px-2 py-1 text-sm border rounded-lg focus:ring focus:ring-green-200 focus:border-green-500" />
                                    @endif
                                </td>

                                <td class="px-4 py-3 text-center">
                                    <input type="hidden" name="attendances[{{ $index }}][status]" value="0">
                                    <input type="checkbox"
                                        name="attendances[{{ $index }}][status]"
                                        value="1"
                                        {{ $attendance->status == 1 ? 'checked disabled' : '' }}
                                        class="w-5 h-5 text-green-600 border-gray-300 rounded focus:ring-green-500">
                                </td>

                              <td class="px-4 py-3 flex justify-center">
                                 <button type="button"
                                    class="delete-button px-3 py-1 text-xs rounded bg-red-500 text-white hover:bg-red-600"
                                    data-id="{{ $attendance->attendance_id }}"
                                    data-schedule-id="{{ $attendance->schedule_id }}"
                                    @if ($attendance->status == 1) disabled @endif>
                                    Padam
                                </button>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const deleteButtons = document.querySelectorAll(".delete-button");

                    deleteButtons.forEach(button => {
                        button.addEventListener("click", function() {
                            const attendanceId = this.dataset.id;
                            const scheduleId = this.dataset.scheduleId;
                            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                            Swal.fire({
                                title: "Adakah anda pasti?",
                                text: "Rekod kehadiran ini akan dipadamkan.",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#3085d6",
                                cancelButtonColor: "#d33",
                                confirmButtonText: "Padam",
                                cancelButtonText: "Batal"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    fetch(`/tutor/schedule/${scheduleId}/attendance/${attendanceId}`, {
                                        method: 'DELETE',
                                        headers: {
                                            'X-CSRF-TOKEN': token,
                                            'Accept': 'application/json',
                                            'X-Requested-With': 'XMLHttpRequest'
                                        }
                                    })
                                    .then(response => {
                                        if (!response.ok) {
                                            throw new Error("Rangkaian tidak berfungsi");
                                        }
                                        return response.text(); // handle redirect or JSON
                                    })
                                    .then(data => {
                                        Swal.fire("Berjaya!", "Rekod kehadiran telah dipadamkan.", "success");
                                        setTimeout(() => location.reload(), 1000);
                                    })
                                    .catch(err => {
                                        Swal.fire("Ralat!",  "Gagal memadam kehadiran. Sila cuba lagi.", "error");
                                        console.error(err);
                                    });
                                }
                            });
                        });
                    });
                });
                </script>

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
        const tbody = document.getElementById("attendanceBody");
        const rows = Array.from(tbody.getElementsByTagName("tr"));
        const noRecord = document.getElementById("noRecord");
        const pagination = document.getElementById("pagination");
        const entriesInfo = document.getElementById("entriesInfo");

        let currentPage = 1;
        const rowsPerPage = 10;

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

    <!-- Add Student Modal -->
    <div id="addStudentModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative w-full max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <div class="w-6"></div>
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Tambah Pelajar</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="addStudentModal">✕</button>
            </div>

            <!-- Modal Body -->
            <form id="studentForm" action="{{ route('tutor.schedule.attendance.store', $id) }}" method="POST">
                @csrf
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <div>
                        <label for="student_id" class="block mb-2 text-sm font-medium text-gray-900">Nama Pelajar</label>
                        <select id="student_id" name="student_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            <option value="">Pilih Pelajar</option>
                            @foreach($students as $student)
                                <option value="{{ $student->student_id }}">{{ $student->first_name }} {{ $student->last_name }} (ID: {{ $student->student_id }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="addStudentModal">Batal</button>

                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-4 py-2 text-center">Hantar</button>
                </div>
            </form>
        </div>
    </div>

    @if(session('closeModalAdd'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const closeBtn = document.querySelector('[data-modal-hide="addStudentModal"]');
            if (closeBtn) {
                closeBtn.click(); // trigger tutup modal
            }
        });
    </script>
    @endif
</x-tutor-layout>