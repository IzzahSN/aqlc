<x-admin-layout :title="'Student'">
    <!-- Header with Title (left) and Breadcrumb (right) -->
    <div class="flex items-center justify-between mb-4">
        <!-- Left: Page Title -->
        <h2 class="text-xl font-medium text-gray-800">Student Report Card</h2>

        <!-- Right: Breadcrumb -->
        <nav class="text-sm text-gray-500">
            <ol class="flex space-x-2">
                <li><a href="{{ route('admin.student.index') }}" class="hover:text-green-600">Student</a></li>
                <li>/</li>
                <li>Report</li>
            </ol>
        </nav>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <!-- Student Portfolio -->
        <div class="col-span-1 bg-green-900 text-white rounded-xl shadow p-6 space-y-6">
            <div class="flex flex-col items-center text-center">
                {{-- if dont have profile, display avatar --}}
                <img src="{{ $student->profile_image 
                    ? asset('storage/'.$student->profile_image) 
                    : 'https://ui-avatars.com/api/?name='.urlencode($student->first_name.' '.$student->last_name).'&background=D1FAE5&color=333' }}" 
                    class="w-28 h-28 rounded-full mb-4 object-cover border-4 border-emerald-50" alt="Student Avatar">
                <h2 class="text-lg font-semibold mt-4">{{ $student->first_name }} {{ $student->last_name }}</h2>
                <p class="text-sm opacity-80">Student Portfolio</p>
            </div>

            <div class="space-y-3 text-sm">
                <p class="flex items-center gap-2"><i class="fas fa-user"></i> {{ $student->age }} years old</p>
                <p class="flex items-center gap-2"><i class="fas fa-id-card"></i> {{ $student->ic_number }}</p>
                <p class="flex items-center gap-2"><i class="fas fa-mars"></i> {{ $student->gender }}</p>
                <p class="flex items-center gap-2"><i class="fas fa-calendar"></i> {{ $student->birth_date ? \Carbon\Carbon::parse($student->birth_date)->format('d F Y') : 'N/A' }}</p>
                <p class="flex items-center gap-2"><i class="fas fa-home"></i> {{ $student->address ?? 'N/A' }}</p>
                <p class="flex items-center gap-2"><i class="fas fa-building"></i> {{ $student->packages->first()->package_name ?? 'N/A' }}</p>
                {{-- after ',' nak buat <br> --}}
                <p class="flex items-center gap-2"><i class="fas fa-clock"></i>
                    @if($student->classes->isNotEmpty())
                        {!! $student->classes->pluck('class_name')->map(fn($name) => e($name))->join('<br>') !!}
                    @else
                        Class not assigned.
                    @endif
            </div>

            <!-- Guardian -->
            <div class="pt-4 border-t border-green-700">
                <h4 class="text-yellow-300 font-medium mb-2">Guardian Details</h4>
                @if($student->guardians->isNotEmpty())
                    @php $guardian = $student->guardians->first(); @endphp
                    <p class="flex items-center text-sm gap-2"><i class="fas fa-user-shield"></i> {{ $guardian->first_name }} {{ $guardian->last_name }}</p>
                    <p class="flex items-center text-sm gap-2"><i class="fas fa-phone"></i> {{ $guardian->phone_number ?? 'N/A' }}</p>
                    <p class="flex items-center text-sm gap-2"><i class="fas fa-envelope"></i> {{ $guardian->pivot->relationship_type ?? 'N/A' }}</p>
                @else
                    <p class="text-sm">No guardian assigned.</p>
                @endif
            </div>
        </div>

        <!-- Right Section -->
        <div class="col-span-3 space-y-6">

            <!-- Report Badges -->
            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Report Badges</h3>
                @if($achievements->isNotEmpty())
                    <div class="overflow-hidden relative">
                        <div id="badgeCarousel" class="flex space-x-4" data-count="{{ $achievements->count() }}">
                            @foreach($achievements as $achievement)
                            <div class="flex-shrink-0 w-48 bg-gray-50 rounded-lg p-4 shadow-md text-center">
                                <img src="{{ asset('storage/' . ($achievement->recitationModule->badge ?? 'default.png')) }}"
                                    alt="{{ $achievement->title }}"
                                    class="w-full h-24 object-contain rounded mb-2 mx-auto">
                                <h4 class="text-sm font-medium text-gray-800">{{ $achievement->title }}</h4>
                                <p class="text-xs text-gray-500">{{ $achievement->completion_date ? \Carbon\Carbon::parse($achievement->completion_date)->format('d F Y') : 'N/A' }}</p>
                            </div>
                            @endforeach

                            {{-- Duplicate for infinite scrolling --}}
                            @if($achievements->count() > 3)
                                @foreach($achievements as $achievement)
                                <div class="flex-shrink-0 w-48 bg-gray-50 rounded-lg p-4 shadow-md text-center">
                                    <img src="{{ asset('storage/' . ($achievement->recitationModule->badge ?? 'default.png')) }}"
                                        alt="{{ $achievement->title }}"
                                        class="w-full h-24 object-contain rounded mb-2 mx-auto">
                                    <h4 class="text-sm font-medium text-gray-800">{{ $achievement->title }}</h4>
                                    <p class="text-xs text-gray-500">{{ $achievement->completion_date ? \Carbon\Carbon::parse($achievement->completion_date)->format('d F Y') : 'N/A' }}</p>
                                </div>
                                @endforeach
                            @endif
                        </div>
                        </div>
                @else
                    <p class="text-gray-500">No badges earned yet.</p>
                @endif
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', () => {
                const carousel = document.getElementById('badgeCarousel');
                const count = parseInt(carousel.getAttribute('data-count'));
                if (count > 3) {
                    const speed = 0.5; // adjust for faster/slower movement
                    let translateX = 0;

                    function animate() {
                        translateX -= speed;
                        const totalWidth = carousel.scrollWidth / 2; // half (since duplicated)

                        // when halfway, reset to start seamlessly
                        if (Math.abs(translateX) >= totalWidth) {
                        translateX = 0;
                        }

                        carousel.style.transform = `translateX(${translateX}px)`;
                        carousel.style.transition = 'transform 0s linear';
                        requestAnimationFrame(animate);
                    }

                    animate();
                }
                });
                </script>


            <!-- Recitation Table -->
            <div class="bg-white rounded-xl shadow p-6">
                <!-- Header -->
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h2 class="text-lg font-semibold">List of Recitation Report</h2>
                        <p class="text-sm text-gray-500">Manage your report: search or filter.</p>
                    </div>
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
                    <select id="filterGrade" class="border rounded-lg px-3 py-2 text-sm w-full sm:w-auto">
                        <option value="">Grade</option>
                        <option value="Mumtaz">Mumtaz</option>
                        <option value="Jayyid Jiddan">Jayyid Jiddan</option>
                        <option value="Jayyid">Jayyid</option>
                        <option value="Maqbul">Maqbul</option>
                        <option value="Rasib">Rasib</option>
                    </select>
                    <select id="filterRecitation" class="border rounded-lg px-3 py-2 text-sm w-full sm:w-auto">                        <option value="">Recitation</option>
                        {{-- all unique recitation name sort from the recitation_module_id iqra 1, iqra 2--}}
                        @php
                            $recitationNames = $progressRecords->map(function($progress) {
                                return $progress->recitationModule->recitation_name ?? null;
                            })->filter()->unique()->sort();
                        @endphp
                        @foreach($recitationNames as $name)
                            <option value="{{ strtolower($name) }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="overflow-x-auto">
                    <table id="reportTable" class="min-w-max text-sm text-left text-gray-600">
                        <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
                            <tr>
                                <th class="px-4 py-3">No</th>
                                <th class="px-4 py-3">Recitation</th>
                                <th class="px-4 py-2">Page</th>
                                <th class="px-4 py-2">Grade</th>
                                <th class="px-4 py-2">Class Name</th>
                                <th class="px-4 py-2">Tutor</th>
                                <th class="px-4 py-2">Recitation Date</th>
                                <th class="px-4 py-2">Remark</th>
                            </tr>
                        </thead>
                        <tbody id="reportBody">
                            @forelse($progressRecords as $progress)
                                <tr class="border-t">
                                    <td class="px-4 py-2 row-index"></td>
                                    <td class="px-4 py-2">{{ $progress->recitationModule->recitation_name ?? 'N/A' }}</td>
                                    <td class="px-4 py-2">{{ $progress->page_number ?? 'N/A' }}</td>
                                    <td class="px-4 py-2">{{ $progress->grade ?? 'N/A' }}</td>
                                    <td class="px-4 py-2">{{ $progress->schedule->class->class_name}}</td>
                                    <td class="px-4 py-2">{{ $progress->schedule->tutor->username}}</td>
                                    <td class="px-4 py-2">{{ $progress->created_at ? \Carbon\Carbon::parse($progress->created_at)->format('d/m/Y') : 'N/A' }}</td>
                                    <td class="px-4 py-2">
                                        {{ $progress->remarks ?? '-' }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-4 py-2 text-center text-gray-500">No progress records found.</td>
                                </tr>
                            @endforelse
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
                    const filterGrade = document.getElementById("filterGrade");
                    const filterRecitation = document.getElementById("filterRecitation");
                    const tbody = document.getElementById("reportBody");
                    const rows = Array.from(tbody.getElementsByTagName("tr"));
                    const noRecord = document.getElementById("noRecord");
                    const pagination = document.getElementById("pagination");
                    const entriesInfo = document.getElementById("entriesInfo");

                    let currentPage = 1;
                    const rowsPerPage = 5;

                    function renderTable() {
                        const searchValue = searchInput.value.toLowerCase();
                        const gradeValue = filterGrade.value.toLowerCase();
                        const recitationValue = filterRecitation.value.toLowerCase();

                        let filteredRows = rows.filter(row => {
                            const recitation = row.cells[1].textContent.toLowerCase();
                            const page = row.cells[2].textContent.toLowerCase();
                            const grade = row.cells[3].textContent.toLowerCase();
                            const className = row.cells[4].textContent.toLowerCase();
                            const tutor = row.cells[5].textContent.toLowerCase();
                            const remark = row.cells[7].textContent.toLowerCase();

                            const matchSearch = recitation.includes(searchValue) || page.includes(searchValue) || grade.includes(searchValue) || className.includes(searchValue) || tutor.includes(searchValue) || remark.includes(searchValue);
                            const matchGrade = gradeValue === "" || grade === gradeValue;
                            const matchRecitation = recitationValue === "" || recitation.includes(recitationValue);
                            return matchSearch && matchGrade && matchRecitation;
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
                    filterRecitation.addEventListener("change", () => { currentPage = 1; renderTable(); });

                    // Initial render
                    renderTable();
                </script>
            </div>
        </div>
    </div>
</x-admin-layout>