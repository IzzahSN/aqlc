<x-tutor-layout :title="'Laporan Prestasi Pelajar'">
    <!-- Header with Title (left) and Breadcrumb (right) -->
    <div class="flex items-center justify-between mb-4">
        <!-- Left: Page Title -->
        <h2 class="text-xl font-medium text-gray-800">Laporan Prestasi Pelajar</h2>

        <!-- Right: Breadcrumb -->
        <nav class="text-sm text-gray-500">
            <ol class="flex space-x-2">
                <li><a href="{{ route('tutor.report.index') }}" class="hover:text-green-600">Senarai Prestasi Pelajar</a></li>
                <li>/</li>
                <li class="text-green-600">Laporan Prestasi Pelajar</li>
            </ol>
        </nav>
    </div>

     <!-- Grade Report List -->
    <form action="{{ route('tutor.report.grade.update', $id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="bg-white p-6 rounded-xl shadow">
            <!-- Header -->
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h2 class="text-lg font-semibold">Senarai Laporan Prestasi Pelajar</h2>
                    <p class="text-sm text-gray-500">Urus laporan prestasi anda: cari, tapis dan kemaskini.</p>
                </div>
                <button type="submit" class="px-4 py-2 text-sm rounded-md font-semibold text-white bg-green-600 shadow-sm hover:bg-green-700 transition-colors duration-200 focus:ring-2 focus:ring-green-400 focus:ring-offset-1">Kemaskini Prestasi Pelajar</button>
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
                        placeholder="Cari pelajar mengikut Nama atau ID..." 
                        class="block w-full p-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-green-500/20 focus:border-green-600 focus:bg-white transition-all duration-200 outline-none shadow-sm" />
                </div>

                <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                    
                    <div class="relative w-full sm:w-48">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <select id="filterGrade" 
                                class="appearance-none cursor-pointer w-full p-2.5 pl-10 pr-8 text-sm text-gray-700 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-green-500/20 focus:border-green-600 outline-none shadow-sm transition-all">
                            <option value="">Semua Gred</option>
                            <option value="Mumtaz">Mumtaz</option>
                            <option value="Jayyid Jiddan">Jayyid Jiddan</option>
                            <option value="Jayyid">Jayyid</option>
                            <option value="Maqbul">Maqbul</option>
                            <option value="Rasib">Rasib</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>

                </div>
            </div>

            <div class="overflow-x-auto">
                <table id="gradeTable" class="min-w-full text-sm text-left text-gray-600">
                    <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                        <tr>
                            <th class="px-4 py-3">Bil</th>
                            <th class="px-4 py-3">Nama Pelajar</th>
                            <th class="px-4 py-3">Bacaan Terkini</th>
                            <th class="px-4 py-3">Pangkat</th>
                            <th class="px-4 py-3">Bacaan</th>
                            <th class="px-4 py-3">Muka Surat</th>
                            <th class="px-4 py-3">Gred</th>
                            <th class="px-4 py-3">Catatan</th>
                            <th class="px-4 py-3">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody id="gradeBody">
                        @foreach ($studentProgresses as $index => $studentProgress)
                            @php
                                $isReadOnly = (
                                    $studentProgress->recitation_module_id !== null &&
                                    $studentProgress->page_number !== null &&
                                    $studentProgress->grade !== null &&
                                    $studentProgress->remark !== null &&
                                    $studentProgress->is_main_page == 1 || 
                                    $studentProgress->is_main_page == 0
                                );
                            @endphp
                            <tr class="border-b">
                                <td class="px-4 py-3 row-index">{{ $loop->iteration }}</td>

                                {{-- STUDENT NAME --}}
                                <td class="px-4 py-3 font-medium text-gray-900">
                                    {{ $studentProgress->student->first_name }} {{ $studentProgress->student->last_name }}
                                </td>

                                {{-- VIEW PAST RECITATION only show when is_main_page==1 --}}
                                <td class="px-4 py-3">
                                    @if ($studentProgress->is_main_page === 1)
                                        @php
                                            // Get the student's latest progress before the current schedule date
                                            $pastProgress = \App\Models\StudentProgress::select('student_progress.*')
                                            ->join('schedules', 'student_progress.schedule_id', '=', 'schedules.schedule_id')
                                            ->where('student_progress.student_id', $studentProgress->student_id)
                                            ->whereNotNull('student_progress.recitation_module_id')
                                            ->whereNotNull('student_progress.page_number')
                                            ->where('schedules.date', '<', $currentSchedule->date)
                                            ->with('recitationModule')
                                            ->orderByDesc('schedules.date')
                                            ->orderByDesc('student_progress.student_progress_id')
                                            ->first();
                                        @endphp
                                        
                                        @if ($pastProgress && $pastProgress->recitationModule)
                                            {{ $pastProgress->recitationModule->recitation_name }}, m/s: {{ $pastProgress->page_number }}
                                        @else
                                            Tiada Bacaan Terkini
                                        @endif
                                    @else
                                        -
                                    @endif
                                </td>

                                @if (!$isReadOnly)
                                    <input type="hidden" name="student_progress_id[]" value="{{ $studentProgress->student_progress_id }}" />
                                @else
                                    {{-- untuk pastikan dia tak dihantar --}}
                                    <input type="hidden" name="skip_ids[]" value="{{ $studentProgress->student_progress_id }}">
                                @endif

                                {{-- LEVEL --}}
                                <td class="px-4 py-3">
                                    @if ($isReadOnly)
                                        <span>{{ $studentProgress->recitationModule->level_type ?? '-' }}</span>
                                    @else
                                     <select name="level_type[]" 
                                        class="level-select border rounded-lg px-3 py-1 text-sm w-full"
                                        data-index="{{ $loop->index }}">
                                        <option value="">Pilih Pangkat</option>
                                        @foreach ($modules->pluck('level_type')->unique() as $level)
                                            <option value="{{ $level }}" 
                                                {{ $studentProgress->recitationModule && $studentProgress->recitationModule->level_type == $level ? 'selected' : '' }}>
                                                {{ $level }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @endif
                                </td>

                                {{-- RECITATION --}}
                                <td class="px-4 py-3">
                                    @if ($isReadOnly)
                                        <span>{{ $studentProgress->recitationModule->recitation_name ?? '-' }}</span>
                                    @else
                                        <select name="recitation_module_id[]" 
                                            class="recitation-select border rounded-lg px-3 py-1 text-sm w-full"
                                            data-index="{{ $loop->index }}">
                                            <option value="">Pilih Bacaan</option>
                                            @foreach ($modules as $module)
                                                <option value="{{ $module->recitation_module_id }}"
                                                    data-level="{{ $module->level_type }}"
                                                    data-start="{{ $module->first_page }}"
                                                    data-end="{{ $module->end_page }}"
                                                    {{ $studentProgress->recitation_module_id == $module->recitation_module_id ? 'selected' : '' }}>
                                                    {{ $module->recitation_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif
                                </td>

                                {{-- PAGE --}}
                                <td class="px-4 py-3 text-center">
                                    @if ($isReadOnly)
                                        <span>{{ $studentProgress->page_number ?? '-' }}</span>
                                    @else
                                    <input type="number" name="page_number[]" 
                                        class="page-input border rounded-lg text-sm w-30 px-2 py-1"
                                        placeholder="Page..." 
                                        value="{{ $studentProgress->page_number }}" 
                                        data-index="{{ $loop->index }}" />
                                    @endif
                                </td>

                                {{-- GRADE --}}
                                <td class="px-4 py-3">
                                    @if ($isReadOnly)
                                        <span>{{ $studentProgress->grade ?? '-' }}</span>
                                    @else
                                        <select name="grade[]" class="border rounded-lg px-3 py-1 text-sm w-full">
                                            <option value="">Pilih Gred</option>
                                            <option value="Mumtaz" {{ $studentProgress->grade == 'Mumtaz' ? 'selected' : '' }}>Mumtaz</option>
                                            <option value="Jayyid Jiddan" {{ $studentProgress->grade == 'Jayyid Jiddan' ? 'selected' : '' }}>Jayyid Jiddan</option>
                                            <option value="Jayyid" {{ $studentProgress->grade == 'Jayyid' ? 'selected' : '' }}>Jayyid</option>
                                            <option value="Maqbul" {{ $studentProgress->grade == 'Maqbul' ? 'selected' : '' }}>Maqbul</option>
                                            <option value="Rasib" {{ $studentProgress->grade == 'Rasib' ? 'selected' : '' }}>Rasib</option>
                                        </select>
                                    @endif
                                </td>

                                {{-- REMARK --}}
                                <td class="px-4 py-3">
                                    @if ($isReadOnly)
                                        <span>{{ $studentProgress->remark ?? '-' }}</span>
                                    @else
                                    <input type="text" name="remark[]" class="border rounded-lg text-sm w-full px-2 py-1"
                                        placeholder="Remark..." value="{{ $studentProgress->remark ?? '' }}" />
                                    @endif
                                </td>

                                {{-- ACTION --}}
                                <td class="px-4 py-3 text-center">
                                    @if ($studentProgress->recitation_module_id === null &&
                                        $studentProgress->page_number === null &&
                                        $studentProgress->grade === null &&
                                        $studentProgress->is_main_page === 1)
                                        -
                                    @elseif ($studentProgress->is_main_page === 1 )
                                        <button type="button"
                                            class="px-3 py-1 text-xs rounded text-white bg-yellow-400 hover:bg-yellow-500 add-progress-btn"
                                            data-student-id="{{ $studentProgress->student->student_id }}"
                                            data-student-name="{{ $studentProgress->student->first_name }} {{ $studentProgress->student->last_name }}"
                                            data-student-progress-id="{{ $studentProgress->student_progress_id }}"
                                            data-modal-target="addStudentModal"
                                            data-modal-toggle="addStudentModal">+</button>
                                    @else
                                        <button type="button"
                                            class="delete-button px-3 py-1 text-xs rounded bg-red-500 text-white hover:bg-red-600"
                                            data-id="{{$studentProgress->student_progress_id }}"
                                            data-schedule-id="{{$studentProgress->schedule_id }}">-</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- No Record Message -->
                <div id="noRecord" class="hidden text-center text-gray-500 py-4">Tiada rekod ditemui</div>
            </div>
             <!-- Pagination (manual JS) -->
            <div class="flex flex-col sm:flex-row items-center justify-between mt-4 text-sm text-gray-600">
                <!-- Showing entries -->
                <div id="entriesInfo" class="mb-2 sm:mb-0"></div>
                <!-- Pagination buttons -->
                <div class="flex items-center gap-2" id="pagination"></div>
            </div>
        </div>
    </form>

     <!-- Pagination Script -->
    <script>
        const searchInput = document.getElementById("searchInput");
        const filterGrade = document.getElementById("filterGrade");
        const tbody = document.getElementById("gradeBody");
        const rows = Array.from(tbody.getElementsByTagName("tr"));
        const noRecord = document.getElementById("noRecord");
        const pagination = document.getElementById("pagination");
        const entriesInfo = document.getElementById("entriesInfo");

        let currentPage = 1;
        const rowsPerPage = 5;

        function renderTable() {
            const searchValue = searchInput.value.toLowerCase();
            const filterValue = filterGrade.value.toLowerCase();

            let filteredRows = rows.filter(row => {
                const name = row.cells[1].textContent.toLowerCase();
                const gradeCell = row.cells[6];
                const gradeSelect = gradeCell.querySelector('select[name="grade[]"]');
                const gradeSpan = gradeCell.querySelector('span');
                const grade = gradeSelect ? gradeSelect.value.toLowerCase() : (gradeSpan ? gradeSpan.textContent.toLowerCase().trim() : '');

                const matchSearch = name.includes(searchValue);
                const matchFilter = filterValue === "" || grade === filterValue;
                return matchSearch && matchFilter;
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
        filterGrade.addEventListener("change", () => { currentPage = 1; renderTable(); });

        renderTable();
    </script>

    {{-- delete button --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const deleteButtons = document.querySelectorAll(".delete-button");

            deleteButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const studentProgressId = this.dataset.id;
                    const scheduleId = this.dataset.scheduleId;
                    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    Swal.fire({
                        // title: "Are you sure?",
                        title: "Adakah anda pasti?",
                        // text: "This progress record will be deleted.",
                        text: "Rekod kemajuan ini akan dipadamkan.",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "Cancel"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch(`/tutor/report/${scheduleId}/grade/${studentProgressId}`, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': token,
                                    'Accept': 'application/json',
                                    'X-Requested-With': 'XMLHttpRequest'
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.status === 'success') {
                                    // Swal.fire("Deleted!", data.message, "success");
                                    Swal.fire("Berjaya!", data.message, "success");
                                    setTimeout(() => location.reload(), 1000);
                                } else {
                                    // Swal.fire("Error!", data.message, "error");
                                    Swal.fire("Ralat!", data.message, "error");
                                }
                            })
                            .catch(err => {
                                // Swal.fire("Error!", "Failed to delete progress record.", "error");
                                Swal.fire("Ralat!", "Gagal memadam rekod kemajuan.", "error");
                                console.error(err);
                            });
                        }
                    });
                });
            });
        });
    </script>

    <!-- Dynamic Page Input Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const levelSelects = document.querySelectorAll('.level-select');
            const recitationSelects = document.querySelectorAll('.recitation-select');
            const pageInputs = document.querySelectorAll('.page-input');

            // Step 1: Bila pilih level_type → filter recitation ikut level
            levelSelects.forEach(levelSelect => {
                levelSelect.addEventListener('change', function() {
                    const level = this.value;
                    const index = this.dataset.index;
                    const recitationSelect = document.querySelector(`.recitation-select[data-index="${index}"]`);

                    // Reset recitation options
                    recitationSelect.value = '';
                    recitationSelect.querySelectorAll('option').forEach(opt => {
                        if (!opt.value) return;
                        opt.hidden = opt.dataset.level !== level;
                    });

                    // Reset page input bila tukar level
                    const pageInput = document.querySelector(`.page-input[data-index="${index}"]`);
                    pageInput.value = '';
                    pageInput.min = '';
                    pageInput.max = '';
                    pageInput.placeholder = 'Page...';
                });
            });

            // Step 2: Bila pilih recitation → auto set min & max
            recitationSelects.forEach(recitationSelect => {
                recitationSelect.addEventListener('change', function() {
                    const index = this.dataset.index;
                    const pageInput = document.querySelector(`.page-input[data-index="${index}"]`);
                    const selectedOption = this.options[this.selectedIndex];

                    if (selectedOption && selectedOption.value) {
                        const min = parseInt(selectedOption.dataset.start);
                        const max = parseInt(selectedOption.dataset.end);
                        pageInput.min = min;
                        pageInput.max = max;
                        pageInput.placeholder = `${min}-${max}`;

                        // Validate current value
                        const currentValue = parseInt(pageInput.value);
                        if (currentValue && (currentValue < min || currentValue > max)) {
                            pageInput.value = '';
                        }
                    } else {
                        pageInput.min = '';
                        pageInput.max = '';
                        pageInput.placeholder = 'Page...';
                    }
                });
            });

            // Step 3: Validate page input (SweetAlert)
            pageInputs.forEach(pageInput => {
                pageInput.addEventListener('input', function() {
                    const value = parseInt(this.value);
                    const min = parseInt(this.min);
                    const max = parseInt(this.max);

                    if (this.value && (value < min || value > max)) {
                        this.value = ''; // clear value
                        this.classList.add('border-red-500');

                        Swal.fire({
                            icon: 'warning',
                            // title: 'Invalid Page Number',
                            title: 'Nombor Muka Surat Tidak Sah',
                            // text: `Page number must be between ${min} and ${max}.`,
                            text: `Nombor muka surat mesti antara ${min} dan ${max}.`,
                            confirmButtonColor: '#16a34a',
                            confirmButtonText: 'Okay',
                            timer: 2500
                        });
                    } else {
                        this.classList.remove('border-red-500');
                    }
                });
            });

            // ✅ Step 4: Auto-trigger constraints for preloaded data (edit mode)
            recitationSelects.forEach(select => {
                if (select.value) {
                    // Hide irrelevant recitations based on current level
                    const index = select.dataset.index;
                    const levelSelect = document.querySelector(`.level-select[data-index="${index}"]`);
                    const level = levelSelect ? levelSelect.value : '';
                    select.querySelectorAll('option').forEach(opt => {
                        if (!opt.value) return;
                        opt.hidden = (opt.dataset.level !== level);
                    });

                    // Trigger change to apply min/max constraint
                    select.dispatchEvent(new Event('change'));
                }
            });
        });
    </script>

   {{-- Add Student Progress Modal --}}
    <div id="addStudentModal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative w-full max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <div class="w-6"></div>
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Tambah Bacaan</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200"
                    data-modal-hide="addStudentModal">✕</button>
            </div>

            <!-- Modal Body -->
            <form id="addStudentForm" action="{{ route('tutor.report.grade.store') }}" method="POST">
                @csrf
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                        {{-- Hidden IDs --}}
                        <input type="hidden" name="student_id" id="modal_student_id" value="" />
                        <input type="hidden" name="student_progress_id" id="modal_student_progress_id" value="" />
                        <input type="hidden" name="schedule_id" value="{{ $id }}" />

                        {{-- Student Name (readonly) --}}
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900">Nama Pelajar</label>
                            <input type="text" id="modal_student_name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                readonly />
                        </div>

                        {{-- Level --}}
                        <div>
                            <label for="modal_level_type"
                                class="block mb-2 text-sm font-medium text-gray-900">Pangkat</label>
                            <select name="level_type" id="modal_level_type"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                                <option value="">Pilih Pangkat</option>
                                @foreach ($modules->pluck('level_type')->unique() as $level)
                                    <option value="{{ $level }}">{{ $level }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Recitation --}}
                        <div>
                            <label for="modal_recitation_module_id"
                                class="block mb-2 text-sm font-medium text-gray-900">Bacaan</label>
                            <select name="recitation_module_id" id="modal_recitation_module_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                                <option value="">Pilih Bacaan</option>
                                @foreach ($modules as $module)
                                    <option value="{{ $module->recitation_module_id }}"
                                        data-level="{{ $module->level_type }}"
                                        data-start="{{ $module->first_page }}"
                                        data-end="{{ $module->end_page }}">
                                        {{ $module->recitation_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Page --}}
                        <div>
                            <label for="modal_page_number"
                                class="block mb-2 text-sm font-medium text-gray-900">Muka Surat</label>
                            <input type="number" name="page_number" id="modal_page_number"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                placeholder="Page..." />
                            <small id="modal_page_hint" class="text-xs text-gray-500"></small>
                        </div>

                        {{-- Grade --}}
                        <div>
                            <label for="grade" class="block mb-2 text-sm font-medium text-gray-900">Gred</label>
                            <select name="grade" id="grade"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                                <option value="">Pilih Gred</option>
                                <option value="Mumtaz">Mumtaz</option>
                                <option value="Jayyid Jiddan">Jayyid Jiddan</option>
                                <option value="Jayyid">Jayyid</option>
                                <option value="Maqbul">Maqbul</option>
                                <option value="Rasib">Rasib</option>
                            </select>
                        </div>

                        {{-- Remark --}}
                        <div>
                            <label for="remark" class="block mb-2 text-sm font-medium text-gray-900">Catatan</label>
                            <input type="text" name="remark" id="remark"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                                placeholder="Catatan..." />
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300"
                        data-modal-hide="addStudentModal">Batal</button>

                    <button type="submit" id="submitForm"
                        class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-4 py-2 text-center">
                        Hantar
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- JS Section --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modalStudentId = document.getElementById('modal_student_id');
            const modalProgressId = document.getElementById('modal_student_progress_id');
            const modalStudentName = document.getElementById('modal_student_name');
            const levelSelect = document.getElementById('modal_level_type');
            const recitationSelect = document.getElementById('modal_recitation_module_id');
            const pageInput = document.getElementById('modal_page_number');
            const pageHint = document.getElementById('modal_page_hint');

            // open modal: fill data from button
            document.querySelectorAll('.add-progress-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    modalStudentId.value = this.dataset.studentId || '';
                    modalProgressId.value = this.dataset.studentProgressId || '';
                    modalStudentName.value = this.dataset.studentName || '';

                    // reset modal fields
                    levelSelect.value = '';
                    recitationSelect.value = '';
                    pageInput.value = '';
                    pageInput.removeAttribute('min');
                    pageInput.removeAttribute('max');
                    pageHint.textContent = '';
                });
            });

            // filter recitation based on level
            levelSelect.addEventListener('change', function() {
                const level = this.value;
                Array.from(recitationSelect.options).forEach(opt => {
                    if (!opt.value) return;
                    opt.hidden = (opt.dataset.level !== level);
                });
                recitationSelect.value = '';
                pageInput.value = '';
                pageInput.removeAttribute('min');
                pageInput.removeAttribute('max');
                pageHint.textContent = '';
            });

            // set min/max page when recitation selected
            recitationSelect.addEventListener('change', function() {
                const sel = recitationSelect.options[recitationSelect.selectedIndex];
                if (sel && sel.value) {
                    const min = parseInt(sel.dataset.start);
                    const max = parseInt(sel.dataset.end);
                    pageInput.min = min;
                    pageInput.max = max;
                    pageInput.placeholder = `${min}-${max}`;
                    // pageHint.textContent = `Allowed pages: ${min} — ${max}`;
                    pageHint.textContent = `Muka surat dibenarkan: ${min} — ${max}`;
                    pageInput.value = '';
                } else {
                    pageInput.removeAttribute('min');
                    pageInput.removeAttribute('max');
                    pageHint.textContent = '';
                }
            });

            // realtime validation
            pageInput.addEventListener('input', function() {
                if (!this.value) return;
                const val = parseInt(this.value, 10);
                const min = this.min ? parseInt(this.min, 10) : null;
                const max = this.max ? parseInt(this.max, 10) : null;

                if ((min !== null && val < min) || (max !== null && val > max)) {
                    this.value = '';
                    Swal.fire({
                        icon: 'warning',
                        // title: 'Invalid Page Number',
                        title: 'Nombor Muka Surat Tidak Sah',
                        // text: `Page number must be between ${min} and ${max}.`,
                        text: `Nombor muka surat mesti antara ${min} dan ${max}.`,
                        confirmButtonColor: '#16a34a',
                        timer: 2500
                    });
                }
            });
        });
    </script>
</x-tutor-layout>