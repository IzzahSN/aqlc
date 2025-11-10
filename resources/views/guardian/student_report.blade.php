<x-guardian-layout :title="'Kad Laporan Pelajar'">
    <!-- Header with Title (left) and Breadcrumb (right) -->
    <div class="flex items-center justify-between mb-4">
         <!-- Left: Page Title -->
        <h2 class="text-xl font-medium text-gray-800">Kad Laporan Pelajar</h2>

        <div class="flex items-center gap-6">
            <!-- Right: Breadcrumb -->
            <nav class="text-sm text-gray-500">
                <ol class="flex space-x-2">
                    <li><a href="{{ route('guardian.report.index') }}" class="hover:text-green-600">Senarai Laporan</a></li>
                    <li>/</li>
                    <li class="text-green-600">Pelajar</li>
                </ol>
            </nav>

            <!-- Left: Breadcrumb -->
            <button data-modal-target="editStudentModal" data-modal-toggle="editStudentModal" data-id="{{ $student->student_id }}"
                class="px-4 py-2 text-sm rounded-lg bg-yellow-500 text-white hover:bg-yellow-600 edit-student-button">
                Kemaskini Pelajar
            </button>
        </div>
       
    </div>

    <!-- Report -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <!-- Left Portfolio -->
        <div class="col-span-1 bg-green-900 text-white rounded-xl shadow p-6 space-y-6">
            <div class="flex flex-col items-center text-center">
                {{-- if dont have profile, display avatar --}}
                <img src="{{ $student->profile
                    ? asset('storage/'.$student->profile) 
                    : 'https://ui-avatars.com/api/?name='.urlencode($student->first_name.' '.$student->last_name).'&background=D1FAE5&color=333' }}" 
                    class="w-28 h-28 rounded-full mb-4 object-cover border-4 border-emerald-50" alt="Student Avatar">
                <h2 class="text-lg font-semibold mt-4">{{ $student->first_name }} {{ $student->last_name }}</h2>
                <p class="text-sm opacity-80">Portfolio Pelajar</p>
            </div>

             <div class="space-y-3 text-sm">
                <p class="flex items-center gap-2"><i class="fas fa-user"></i> {{ $student->age }} tahun</p>
                <p class="flex items-center gap-2"><i class="fas fa-id-card"></i> {{ $student->ic_number }}</p>
                <p class="flex items-center gap-2"><i class="fas fa-mars"></i>
                    {{ $student->gender == 'Male' ? 'Lelaki' : ($student->gender == 'Female' ? 'Perempuan' : 'N/A') }}
                </p>
                <p class="flex items-center gap-2"><i class="fas fa-calendar"></i> {{ $student->birth_date ? \Carbon\Carbon::parse($student->birth_date)->format('d F Y') : 'N/A' }}</p>
                <p class="flex items-center gap-2"><i class="fas fa-home"></i> {{ $student->address ?? 'N/A' }}</p>
                <p class="flex items-center gap-2"><i class="fas fa-building"></i> {{ $student->packages->first()->package_name ?? 'N/A' }}</p>
                {{-- after ',' nak buat <br> --}}
                <p class="flex items-center gap-2"><i class="fas fa-clock"></i>
                    @if($student->classes->isNotEmpty())
                        {!! $student->classes->pluck('class_name')->map(fn($name) => e($name))->join('<br>') !!}
                    @else
                        Kelas belum diwujudkan lagi.
                    @endif
            </div>

            <!-- Guardian -->
            <div class="pt-4 border-t border-green-700 space-y-2">
                <h4 class="text-yellow-300 font-semibold mb-2 text-sm">Maklumat Penjaga</h4>
                @if($student->guardians->isNotEmpty())
                    @php $guardian = $student->guardians->first(); @endphp
                    <p class="flex items-center text-sm gap-2"><i class="fas fa-user-shield"></i> {{ $guardian->first_name }} {{ $guardian->last_name }}</p>
                    <p class="flex items-center text-sm gap-2"><i class="fas fa-phone"></i> {{ $guardian->phone_number ?? 'N/A' }}</p>
                    <p class="flex items-center text-sm gap-2"><i class="fas fa-envelope"></i> {{ $guardian->pivot->relationship_type ?? 'N/A' }}</p>
                @else
                    <p class="text-sm">Penjaga belum didaftarkan lagi.</p>
                @endif
            </div>
        </div>

        <!-- Right Section -->
        <div class="col-span-3 flex flex-col gap-6 h-full">

            <!-- Report Badges -->
            <div class="bg-white rounded-xl shadow p-6 flex-shrink-0">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Laporan Pencapaian</h3>
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
                    <p class="text-gray-500">Tiada pencapaian didaftakan.</p>
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
            <div class="bg-white rounded-xl shadow p-6 flex-1 flex flex-col overflow-hidden">
                <!-- Header -->
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h2 class="text-lg font-semibold">Senarai Laporan Bacaan</h2>
                        <p class="text-sm text-gray-500">Urus laporan ini menggunakan fungsi carian dan tapisan</p>
                    </div>
                </div>
                <!-- Search + Filter -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
                   <!-- Search -->
                    <div class="relative w-full sm:w-full">
                        <input type="text" id="searchInput" placeholder="Taip untuk carian"
                            class="w-full pl-10 pr-4 py-2 text-sm border rounded-lg focus:ring focus:ring-green-200" />
                        <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
                        </svg>
                    </div>
                    <!-- Filter -->
                    <select id="filterGrade" class="border rounded-lg px-3 py-2 text-sm w-full sm:w-auto">
                        <option value="">Gred</option>
                        <option value="Mumtaz">Mumtaz</option>
                        <option value="Jayyid Jiddan">Jayyid Jiddan</option>
                        <option value="Jayyid">Jayyid</option>
                        <option value="Maqbul">Maqbul</option>
                        <option value="Rasib">Rasib</option>
                    </select>
                    <select id="filterRecitation" class="border rounded-lg px-3 py-2 text-sm w-full sm:w-auto">
                        <option value="">Bacaan</option>
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
                <div class="overflow-x-auto overflow-y-auto flex-1">
                    <table id="reportTable" class="min-w-full text-sm text-left text-gray-600">
                        <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
                            <tr>
                                <th class="px-4 py-3">Bil</th>
                                <th class="px-4 py-3">Bacaan</th>
                                <th class="px-4 py-2">Muka Surat</th>
                                <th class="px-4 py-2">Gred</th>
                                <th class="px-4 py-2">Nama Kelas</th>
                                <th class="px-4 py-2">Guru</th>
                                <th class="px-4 py-2">Tarikh Bacaan</th>
                                <th class="px-4 py-2">Catatan</th>
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
                                    <td colspan="7" class="px-4 py-2 text-center text-gray-500">Tiada rekod dijumpai.</td>
                                </tr>
                            @endforelse
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
                    filterRecitation.addEventListener("change", () => { currentPage = 1; renderTable(); });

                    // Initial render
                    renderTable();
                </script>
            </div>
        </div>
    </div>

    <!-- Edit Student Modal -->
    <div id="editStudentModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative w-full max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <div class="w-6"></div>
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Edit Student</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="editStudentModal">✕</button>
            </div>

            <!-- Modal Body -->
            <form id="editStudentForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                        <!-- First Name -->
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Awal</label>
                            <input type="text" id="first_name" name="first_name" placeholder="Ali" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        <!-- Last Name -->
                        <div>
                            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Akhir</label>
                            <input type="text" id="last_name" name="last_name" placeholder="Ahmad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        <!-- IC Number -->
                        <div>
                            <label for="ic_number" class="block mb-2 text-sm font-medium text-gray-900">Nombor Kad Pengenalan</label>
                            <input type="text" id="ic_number" name="ic_number" placeholder="990101145678" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" readonly>
                        </div>

                        <!-- Age -->
                        <div>
                            <label for="age" class="block mb-2 text-sm font-medium text-gray-900">Umur</label>
                            <input type="number" id="age" name="age" placeholder="15" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                        </div>

                        <!-- Birth Date -->
                        <div>
                            <label for="birth_date" class="block mb-2 text-sm font-medium text-gray-900">Tarikh Lahir</label>
                            <input type="date" id="birth_date" name="birth_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                        </div>

                        <!-- Gender -->
                        <div>
                            <label for="gender" class="block mb-2 text-sm font-medium text-gray-900">Jantina</label>
                            <select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        {{-- profile --}}
                        <div>
                            <label for="profile" class="block mb-2 text-sm font-medium text-gray-900">Gambar Profil</label>
                            <input type="file" id="profile" name="profile" accept="image/*" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                        </div>
                    </div>
                    <!-- Address (full width) -->
                    <div class="mt-6">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Alamat Rumah</label>
                        <textarea id="address" name="address" rows="3" placeholder="Enter full address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-green-500 focus:border-green-500 block w-full p-2.5"></textarea>
                    </div>
                </div>
                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button" class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="editStudentModal">Cancel</button>
                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-6 py-2.5 text-center">Submit</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Edit Student Form --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editButtons = document.querySelectorAll('.edit-student-button'); // butang edit
            const editForm = document.getElementById('editStudentForm');

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const studentId = this.getAttribute('data-id');
                    fetch(`/guardian/report/${studentId}/edit`)
                        .then(response => response.json())
                        .then(data => {
                            // Set form action untuk PUT
                            editForm.action = `/guardian/report/${studentId}`;

                            editForm.first_name.value = data.first_name || '';
                            editForm.last_name.value = data.last_name || '';
                            editForm.ic_number.value = data.ic_number || '';
                            editForm.age.value = data.age || '';
                            editForm.birth_date.value = data.birth_date || '';
                            editForm.gender.value = data.gender || '';
                            editForm.status.value = data.status || '';
                            editForm.profile.value = data.profile || '';
                            editForm.address.value = data.address || '';
                        })
                        .catch(error => {
                            console.error('Error fetching student data:', error);
                        });
                });
            });
        });
    </script>

</x-guardian-layout>