<x-admin-layout :title="'Schedule'">
    <!-- Header with Title (left) and Breadcrumb (right) -->
    <div class="flex items-center justify-between mb-4">
        <!-- Left: Page Title -->
        <h2 class="text-xl font-medium text-gray-800">Attendance Report</h2>

        <!-- Right: Breadcrumb -->
        <nav class="text-sm text-gray-500">
            <ol class="flex space-x-2">
                <li><a href="{{ route('admin.schedule.index') }}" class="hover:text-green-600">Schedule</a></li>
                <li>/</li>
                <li>Attendance</li>
            </ol>
        </nav>
    </div>

    <!-- Attendance Form -->
    <form action="{{ route('admin.schedule.attendance.update', $id) }}" method="POST">
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
                <div>
                    <!-- if student ganti kelas -->
                    <button type="button"
                        class="px-4 py-2 text-sm rounded-lg bg-yellow-400 text-white hover:bg-yellow-500"
                        data-modal-target="addStudentModal" data-modal-toggle="addStudentModal">
                        + Add Student
                    </button>

                    <button type="submit"
                        class="px-4 py-2 text-sm rounded-lg bg-green-600 text-white hover:bg-green-700">
                        Allocate Attendance
                    </button>
                </div>
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
                <table id="attendanceTable" class="min-w-full text-sm text-left text-gray-600">
                    <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                        <tr>
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Student Name</th>
                            <th class="px-4 py-3">Remark</th>
                            <th class="px-4 py-3 text-center">Attendance</th>
                            <th class="px-4 py-3 text-center">Action</th>
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
                                            placeholder="Enter remark..."
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
                                    Delete
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
                                title: "Are you sure?",
                                text: "This attendance record will be deleted.",
                                icon: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#3085d6",
                                cancelButtonColor: "#d33",
                                confirmButtonText: "Yes, delete it!",
                                cancelButtonText: "Cancel"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    fetch(`/admin/schedule/${scheduleId}/attendance/${attendanceId}`, {
                                        method: 'DELETE',
                                        headers: {
                                            'X-CSRF-TOKEN': token,
                                            'Accept': 'application/json',
                                            'X-Requested-With': 'XMLHttpRequest'
                                        }
                                    })
                                    .then(response => {
                                        if (!response.ok) {
                                            throw new Error("Network response was not ok");
                                        }
                                        return response.text(); // handle redirect or JSON
                                    })
                                    .then(data => {
                                        Swal.fire("Deleted!", "Attendance record deleted successfully.", "success");
                                        setTimeout(() => location.reload(), 1000);
                                    })
                                    .catch(err => {
                                        Swal.fire("Error!", "Failed to delete attendance.", "error");
                                        console.error(err);
                                    });
                                }
                            });
                        });
                    });
                });
                </script>

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
        const tbody = document.getElementById("attendanceBody");
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
        renderTable();
    </script>

    <!-- Add Student Modal -->
    <div id="addStudentModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative w-full max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <div class="w-6"></div>
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Add Student</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="addStudentModal">✕</button>
            </div>

            <!-- Modal Body -->
            <form id="studentForm" action="{{ route('admin.schedule.attendance.store', $id) }}" method="POST">
                @csrf
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <div>
                        <label for="student_id" class="block mb-2 text-sm font-medium text-gray-900">Select Student</label>
                        <select id="student_id" name="student_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            <option value="">Select Student</option>
                            @foreach($students as $student)
                                <option value="{{ $student->student_id }}">{{ $student->first_name }} {{ $student->last_name }} (ID: {{ $student->student_id }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button" class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="addStudentModal">Cancel</button>

                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-6 py-2.5 text-center">Submit</button>
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
</x-admin-layout>