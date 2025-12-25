<x-admin-layout :title="'Laporan Pelajar'">
    <!-- Header with Title (left) and Breadcrumb (right) -->
    <div class="flex items-center justify-between mb-4">
        <!-- Left: Page Title -->
        <h2 class="text-xl font-medium text-gray-800">Kad Laporan Pelajar</h2>

        <!-- Right: Breadcrumb -->
        <nav class="text-sm text-gray-500">
            <ol class="flex space-x-2">
                <li><a href="{{ route('admin.student.index') }}" class="hover:text-green-600">Senarai Pelajar</a></li>
                <li>/</li>
                <li class="text-green-600">Laporan Pelajar</li>
            </ol>
        </nav>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 h-[calc(100vh-8rem)]">
        <!-- Student Portfolio -->
        <div class="col-span-1 bg-green-900 text-white rounded-xl shadow p-6 space-y-6 overflow-y-auto">
            <div class="flex flex-col items-center text-center">
                {{-- if dont have profile, display avatar --}}
                <img src="{{ $student->profile
                    ? asset('storage/'.$student->profile) 
                    : 'https://ui-avatars.com/api/?name='.urlencode($student->first_name.' '.$student->last_name).'&background=D1FAE5&color=333' }}" 
                    class="w-28 h-28 rounded-full mb-4 object-cover border-4 border-emerald-50" alt="Student Avatar">
                <h2 class="text-lg font-semibold mt-4">{{ $student->first_name }} {{ $student->last_name }}</h2>
                <p class="text-sm opacity-80">Profil Pelajar</p>
            </div>

            <div class="space-y-3 text-sm">
                <p class="flex items-center gap-2"><i class="fas fa-user"></i> {{ $student->age }} tahun</p>
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
                        Kelas belum ditetapkan.
                    @endif
            </div>

            <!-- Guardian -->
            <div class="pt-4 border-t border-green-700">
                <h4 class="text-yellow-300 font-medium mb-2">Maklumat Penjaga</h4>
                @if($student->guardians->isNotEmpty())
                    @php $guardian = $student->guardians->first(); @endphp
                    <p class="flex items-center text-sm gap-2"><i class="fas fa-user-shield"></i> {{ $guardian->first_name }} {{ $guardian->last_name }}</p>
                    <p class="flex items-center text-sm gap-2"><i class="fas fa-phone"></i> {{ $guardian->phone_number ?? 'N/A' }}</p>
                    <p class="flex items-center text-sm gap-2"><i class="fas fa-envelope"></i> {{ $guardian->pivot->relationship_type ?? 'N/A' }}</p>
                @else
                    <p class="text-sm">Penjaga belum ditetapkan.</p>
                @endif
            </div>
        </div>

        <!-- Right Section -->
        <div class="col-span-3 flex flex-col gap-6 h-full">

            <!-- Report Badges -->
            <div class="bg-white rounded-xl shadow p-6 flex-shrink-0">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Lencana Pencapaian</h3>
                @if($achievements->isNotEmpty())
                    <div class="overflow-hidden relative">
                        <div id="badgeCarousel" class="flex space-x-4" data-count="{{ $achievements->count() }}">
                            @foreach($achievements as $achievement)
                            <a href="{{ route('admin.achievement.certificate', $achievement->achievement_id) }}"target="_blank"class="flex-shrink-0 w-48 bg-gray-50 rounded-lg p-4 shadow-md text-center hover:bg-gray-100 hover:shadow-lg transition">
                                <img src="{{ asset('storage/' . ($achievement->recitationModule->badge ?? 'default.png')) }}"
                                    alt="{{ $achievement->title }}"
                                    class="w-full h-24 object-contain rounded mb-2 mx-auto">
                                <h4 class="text-sm font-medium text-gray-800">{{ $achievement->title }}</h4>
                                <p class="text-xs text-gray-500">{{ $achievement->completion_date ? \Carbon\Carbon::parse($achievement->completion_date)->format('d F Y') : 'N/A' }}</p>
                            </a>
                            @endforeach

                            {{-- Duplicate for infinite scrolling --}}
                            @if($achievements->count() > 3)
                                @foreach($achievements as $achievement)
                                <a href="{{ route('admin.achievement.certificate', $achievement->achievement_id) }}"target="_blank"class="flex-shrink-0 w-48 bg-gray-50 rounded-lg p-4 shadow-md text-center hover:bg-gray-100 hover:shadow-lg transition">
                                <div class="flex-shrink-0 w-48 bg-gray-50 rounded-lg p-4 shadow-md text-center">
                                    <img src="{{ asset('storage/' . ($achievement->recitationModule->badge ?? 'default.png')) }}"
                                        alt="{{ $achievement->title }}"
                                        class="w-full h-24 object-contain rounded mb-2 mx-auto">
                                    <h4 class="text-sm font-medium text-gray-800">{{ $achievement->title }}</h4>
                                    <p class="text-xs text-gray-500">{{ $achievement->completion_date ? \Carbon\Carbon::parse($achievement->completion_date)->format('d F Y') : 'N/A' }}</p>
                                </a>
                                @endforeach
                            @endif
                        </div>
                        </div>
                @else
                    <p class="text-gray-500">Tiada lencana diperoleh lagi.</p>
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
                        <p class="text-sm text-gray-500">Urus laporan anda: cari atau tapis.</p>
                    </div>
                </div>
                <!-- Search & Filters -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
                    <div class="relative w-full sm:flex-1">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="text" 
                            id="searchInput" 
                            placeholder="Taip carian anda..." 
                            class="block w-full p-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-green-500/20 focus:border-green-600 focus:bg-white transition-all duration-200 outline-none shadow-sm" />
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                        
                        <div class="relative w-full sm:w-40">
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

                        <div class="relative w-full sm:w-48">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                                </svg>
                            </div>
                            <select id="filterRecitation" 
                                    class="appearance-none cursor-pointer w-full p-2.5 pl-10 pr-8 text-sm text-gray-700 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-green-500/20 focus:border-green-600 outline-none shadow-sm transition-all">
                                <option value="">Semua Bacaan</option>
                                {{-- Logic PHP dikekalkan --}}
                                @php
                                    $recitationNames = $progressRecords->map(function($progress) {
                                        return $progress->recitationModule->recitation_name ?? null;
                                    })->filter()->unique()->sort();
                                @endphp
                                @foreach($recitationNames as $name)
                                    <option value="{{ strtolower($name) }}">{{ $name }}</option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="w-full overflow-x-auto overflow-y-auto flex-1">
                    <table id="reportTable" class="w-full min-w-max text-sm text-left text-gray-600">
                        <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
                            <tr>
                                <th class="px-4 py-3">Bil</th>
                                <th class="px-4 py-3">Bacaan</th>
                                <th class="px-4 py-2">M/S</th>
                                <th class="px-4 py-2">Gred</th>
                                <th class="px-4 py-2">Kelas</th>
                                <th class="px-4 py-2">Tutor</th>
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
                                    <td colspan="8" class="px-4 py-2 text-center text-gray-500">Tiada rekod kemajuan ditemui.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- No Record Message -->
                    {{-- <div id="noRecord" class="hidden text-center text-gray-500 py-4">No records found</div> --}}
                    <div id="noRecord" class="hidden text-center text-gray-500 py-4">Tiada rekod ditemui</div>
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
                        // entriesInfo.textContent = `Showing ${start} to ${end} of ${totalRows} entries`;
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
</x-admin-layout>