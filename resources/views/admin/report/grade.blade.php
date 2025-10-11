<x-admin-layout :title="'Grade & Lesson Plan Report'">
    <!-- Header with Title (left) and Breadcrumb (right) -->
    <div class="flex items-center justify-between mb-4">
        <!-- Left: Page Title -->
        <h2 class="text-xl font-medium text-gray-800">Grade Report</h2>

        <!-- Right: Breadcrumb -->
        <nav class="text-sm text-gray-500">
            <ol class="flex space-x-2">
                <li><a href="{{ route('admin.report.index') }}" class="hover:text-green-600">Report</a></li>
                <li>/</li>
                <li>Grade</li>
            </ol>
        </nav>
    </div>

    <!-- Attendance Report List -->
    <form action="{{ route('admin.grade.update', $id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="bg-white p-6 rounded-xl shadow">
        <!-- Header -->
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg font-semibold">List of Grade</h2>
                <p class="text-sm text-gray-500">Manage your grade: search, filter and update.</p>
            </div>
            <button type="submit" class="px-4 py-2 text-sm rounded-lg bg-green-600 text-white hover:bg-green-700">Allocate Grade</button>
        </div>

        <div class="overflow-x-auto">
            <table id="gradeTable" class="min-w-max text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Student Name</th>
                        <th class="px-4 py-3">Past Recitation</th>
                        <th class="px-4 py-3">Level</th>
                        <th class="px-4 py-3">Recitation</th>
                        <th class="px-4 py-3">Page</th>
                        <th class="px-4 py-3">Grade</th>
                        <th class="px-4 py-3">Remark</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody id="gradeBody">
                    @foreach ($studentProgresses as $index => $studentProgress)
                        <tr class="border-b">
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>

                            <td class="px-4 py-3 font-medium text-gray-900">
                                {{ $studentProgress->student->first_name }} {{ $studentProgress->student->last_name }}
                            </td>

                            <td class="px-4 py-3 flex justify-center">
                                <button type="button"
                                    class="px-3 py-1 text-xs rounded text-white bg-yellow-400 hover:bg-yellow-500"
                                    data-modal-target="reportClassModal"
                                    data-modal-toggle="reportClassModal">View</button>
                            </td>

                            {{-- student_progress_id hidden (important) --}}
                            <input type="hidden" name="student_progress_id[]" value="{{ $studentProgress->id }}" />

                            {{-- LEVEL --}}
                            <td class="px-4 py-3">
                                <select name="level_type[]" class="level-select border rounded-lg px-3 py-1 text-sm w-full"
                                    data-index="{{ $index }}">
                                    <option value="">Select Level</option>
                                    @foreach ($modules->pluck('level_type')->unique() as $level)
                                        <option value="{{ $level }}" {{ $studentProgress->recitationModule && $studentProgress->recitationModule->level_type == $level ? 'selected' : '' }}>{{ $level }}</option>
                                    @endforeach
                                </select>
                            </td>

                            {{-- RECITATION --}}
                            <td class="px-4 py-3">
                                <select name="recitation_module_id[]" class="recitation-select border rounded-lg px-3 py-1 text-sm w-full"
                                    data-index="{{ $index }}">
                                    <option value="">Select Recitation</option>
                                    @foreach ($modules as $module)
                                        <option value="{{ $module->recitation_module_id }}"
                                            data-level="{{ $module->level_type }}"
                                            data-start="{{ $module->start_page }}"
                                            data-end="{{ $module->end_page }}"
                                            {{ $studentProgress->recitation_module_id == $module->recitation_module_id ? 'selected' : '' }}>
                                            {{ $module->recitation_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>

                            {{-- PAGE --}}
                            <td class="px-4 py-3 text-center">
                                <input type="number" name="page_number[]" class="page-input border rounded-lg text-sm w-20 px-2 py-1"
                                    placeholder="Page..." value="{{ $studentProgress->page_number }}" data-index="{{ $index }}" />
                            </td>

                            {{-- GRADE --}}
                            <td class="px-4 py-3">
                                <select name="grade[]" class="border rounded-lg px-3 py-1 text-sm w-full">
                                    <option value="">Select Grade</option>
                                    <option value="Mumtaz" {{ $studentProgress->grade == 'Mumtaz' ? 'selected' : '' }}>Mumtaz</option>
                                    <option value="Jayyid Jiddan" {{ $studentProgress->grade == 'Jayyid Jiddan' ? 'selected' : '' }}>Jayyid Jiddan</option>
                                    <option value="Jayyid" {{ $studentProgress->grade == 'Jayyid' ? 'selected' : '' }}>Jayyid</option>
                                    <option value="Maqbul" {{ $studentProgress->grade == 'Maqbul' ? 'selected' : '' }}>Maqbul</option>
                                    <option value="Rasib" {{ $studentProgress->grade == 'Rasib' ? 'selected' : '' }}>Rasib</option>
                                </select>
                            </td>

                            {{-- REMARK --}}
                            <td class="px-4 py-3">
                                <input type="text" name="remark[]" class="border rounded-lg text-sm w-full px-2 py-1"
                                    placeholder="Remark..." value="{{ $studentProgress->remark ?? '' }}" />
                            </td>

                            {{-- ACTION --}}
                            <td class="px-4 py-3 text-center">
                                @if ($studentProgress->recitation_module_id === null &&
                                    $studentProgress->page_number === null &&
                                    $studentProgress->grade === null &&
                                    $studentProgress->remark === null &&
                                    $studentProgress->is_main_page === 1)
                                    -
                                @elseif ($studentProgress->is_main_page === 1 )
                                    <button type="button"
                                        class="px-3 py-1 text-xs rounded text-white bg-yellow-400 hover:bg-yellow-500"
                                        data-modal-target="addStudentModal"
                                        data-modal-toggle="addStudentModal">+</button>
                                @else
                                    <button type="button"
                                        class="px-3 py-1 text-xs rounded text-white bg-red-600 hover:bg-red-700">-</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</form>


    <!-- Pagination + Search Script -->
    <script>
        const searchInput = document.getElementById("searchInput");
        const tbody = document.getElementById("gradeBody");
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


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function updatePageLimits(index) {
                const recitationSelect = document.querySelector(`.recitation-select[data-index="${index}"]`);
                const pageInput = document.querySelector(`.page-input[data-index="${index}"]`);
                if (recitationSelect && pageInput) {
                    const selectedOption = recitationSelect.options[recitationSelect.selectedIndex];
                    if (selectedOption.value !== '') {
                        const min = selectedOption.dataset.start;
                        const max = selectedOption.dataset.end;
                        pageInput.min = min;
                        pageInput.max = max;
                        // Clear value if out of range
                        if (pageInput.value && (pageInput.value < min || pageInput.value > max)) {
                            pageInput.value = '';
                        }
                    } else {
                        pageInput.min = '';
                        pageInput.max = '';
                    }
                }
            }

            // Initialize for all rows on load
            document.querySelectorAll('.recitation-select').forEach((select, index) => {
                updatePageLimits(index);
                // Listen for changes
                select.addEventListener('change', () => {
                    updatePageLimits(index);
                });
            });
        });
    </script>

    <!-- View Class Modal -->
    <div id="reportClassModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative w-full max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <div class="w-6"></div>
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">List of Attendance</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="reportClassModal">✕</button>
            </div>

            <!-- Modal Body -->
            <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                    <table class="min-w-full text-sm text-left text-gray-600">
                        <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                            <tr>
                                <th class="px-4 py-3">No</th>
                                <th class="px-4 py-3">Class Name</th>
                                <th class="px-4 py-3">Recitation</th>
                                <th class="px-4 py-3">Page</th>
                                <th class="px-4 py-3">Grade</th>
                                <th class="px-4 py-3">Remark</th>
                                <th class="px-4 py-3">Date</th>
                                <th class="px-4 py-3">Attendance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b">
                                <td class="px-4 py-3">1</td>
                                <td class="px-4 py-3 font-medium text-gray-900">Mon-20-K1</td>
                                <td class="px-4 py-3">-</td>
                                <td class="px-4 py-3">-</td>
                                <td class="px-4 py-3">-</td>
                                <td class="px-4 py-3">-</td>
                                <td class="px-4 py-3">12/09/2025</td>
                                <td class="px-4 py-3 text-center">❌</td>
                            </tr>

                            <tr class="border-b">
                                <td class="px-4 py-3">2</td>
                                <td class="px-4 py-3 font-medium text-gray-900">Tue-21-K1</td>
                                <td class="px-4 py-3">Juz 1</td>
                                <td class="px-4 py-3">10</td>
                                <td class="px-4 py-3">Mumtaz</td>
                                <td class="px-4 py-3">Replacement Class</td>
                                <td class="px-4 py-3">10/08/2025</td>
                                <td class="px-4 py-3 text-center">✅</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <!-- Pagination -->
                <div class="flex items-center justify-between mt-4">
                    <div class="flex items-center gap-2">
                        <span class="text-sm text-gray-500">Result per page</span>
                        <select class="border rounded px-2 py-1 text-sm">
                            <option>10</option>
                            <option>20</option>
                            <option>50</option>
                        </select>
                    </div>
                    <div class="flex items-center gap-2">
                        <button class="px-3 py-1 border rounded text-sm text-gray-500 hover:bg-gray-100">&lt; Back</button>
                        <button class="px-3 py-1 border rounded text-sm bg-green-600 text-white">1</button>
                        <button class="px-3 py-1 border rounded text-sm">2</button>
                        <button class="px-3 py-1 border rounded text-sm">3</button>
                        <button class="px-3 py-1 border rounded text-sm">Next &gt;</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>