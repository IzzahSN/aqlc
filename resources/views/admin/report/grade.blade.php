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

                                {{-- STUDENT NAME --}}
                                <td class="px-4 py-3 font-medium text-gray-900">
                                    {{ $studentProgress->student->first_name }} {{ $studentProgress->student->last_name }}
                                </td>

                                {{-- VIEW PAST RECITATION --}}
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
                                    <select name="level_type[]" 
                                        class="level-select border rounded-lg px-3 py-1 text-sm w-full"
                                        data-index="{{ $loop->index }}">
                                        <option value="">Select Level</option>
                                        @foreach ($modules->pluck('level_type')->unique() as $level)
                                            <option value="{{ $level }}" 
                                                {{ $studentProgress->recitationModule && $studentProgress->recitationModule->level_type == $level ? 'selected' : '' }}>
                                                {{ $level }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>

                                {{-- RECITATION --}}
                                <td class="px-4 py-3">
                                    <select name="recitation_module_id[]" 
                                        class="recitation-select border rounded-lg px-3 py-1 text-sm w-full"
                                        data-index="{{ $loop->index }}">
                                        <option value="">Select Recitation</option>
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
                                </td>

                                {{-- PAGE --}}
                                <td class="px-4 py-3 text-center">
                                    <input type="number" name="page_number[]" 
                                        class="page-input border rounded-lg text-sm w-30 px-2 py-1"
                                        placeholder="Page..." 
                                        value="{{ $studentProgress->page_number }}" 
                                        data-index="{{ $loop->index }}" />
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
                            title: 'Invalid Page Number',
                            text: `Page number must be between ${min} and ${max}.`,
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