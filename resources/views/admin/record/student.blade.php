<x-admin-layout :title="'Rekod Pelajar'">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
    
        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between transition-all duration-300 hover:shadow-md hover:-translate-y-0.5">
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Jumlah Pelajar Aktif</p>
                <h3 class="text-3xl font-extrabold text-gray-900">{{ $activeStudents }}</h3>
            </div>
            <div class="flex items-center justify-center p-3 bg-lime-100 rounded-full text-lime-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M12 2c-.218 0 -.432 .002 -.642 .005l-.616 .017l-.299 .013l-.579 .034l-.553 .046c-4.785 .464 -6.732 2.411 -7.196 7.196l-.046 .553l-.034 .579c-.005 .098 -.01 .198 -.013 .299l-.017 .616l-.004 .318l-.001 .324c0 .218 .002 .432 .005 .642l.017 .616l.013 .299l.034 .579l.046 .553c.464 4.785 2.411 6.732 7.196 7.196l.553 .046l.579 .034c.098 .005 .198 .01 .299 .013l.616 .017l.642 .005l.642 -.005l.616 -.017l.299 -.013l.579 -.034l.553 -.046c4.785 -.464 6.732 -2.411 7.196 -7.196l.046 -.553l.034 -.579c.005 -.098 .01 -.198 .013 -.299l.017 -.616l.005 -.642l-.005 -.642l-.017 -.616l-.013 -.299l-.034 -.579l-.046 -.553c-.464 -4.785 -2.411 -6.732 -7.196 -7.196l-.553 -.046l-.579 -.034a28.058 28.058 0 0 0 -.299 -.013l-.616 -.017l-.318 -.004l-.324 -.001zm2.293 7.293a1 1 0 0 1 1.497 1.32l-.083 .094l-4 4a1 1 0 0 1 -1.32 .083l-.094 -.083l-2 -2a1 1 0 0 1 1.32 -1.497l.094 .083l1.293 1.292l3.293 -3.292z" />
                </svg>
            </div>
        </div>

        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between transition-all duration-300 hover:shadow-md hover:-translate-y-0.5">
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Pelajar Tidak Aktif</p>
                <h3 class="text-3xl font-extrabold text-gray-900">{{ $inactiveStudents }}</h3>
            </div>
            <div class="flex items-center justify-center p-3 bg-amber-100 rounded-full text-amber-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M12 2l.324 .001l.318 .004l.616 .017l.299 .013l.579 .034l.553 .046c4.785 .464 6.732 2.411 7.196 7.196l.046 .553l.034 .579c.005 .098 .01 .198 .013 .299l.017 .616l.005 .642l-.005 .642l-.017 .616l-.013 .299l-.034 .579l-.046 .553c-.464 4.785 -2.411 6.732 -7.196 7.196l-.553 .046l-.579 .034c-.098 .005 -.198 .01 -.299 .013l-.616 .017l-.642 .005l-.642 -.005l-.616 -.017l-.299 -.013l-.579 -.034l-.553 -.046c-4.785 -.464 -6.732 -2.411 -7.196 -7.196l-.046 -.553l-.034 -.579a28.058 28.058 0 0 1 -.013 -.299l-.017 -.616c-.003 -.21 -.005 -.424 -.005 -.642l.001 -.324l.004 -.318l.017 -.616l.013 -.299l.034 -.579l.046 -.553c.464 -4.785 2.411 -6.732 7.196 -7.196l.553 -.046l.579 -.034c.098 -.005 .198 -.01 .299 -.013l.616 -.017c.21 -.003 .424 -.005 .642 -.005zm-1.489 7.14a1 1 0 0 0 -1.218 1.567l1.292 1.293l-1.292 1.293l-.083 .094a1 1 0 0 0 1.497 1.32l1.293 -1.292l1.293 1.292l.094 .083a1 1 0 0 0 1.32 -1.497l-1.292 -1.293l1.292 -1.293l.083 -.094a1 1 0 0 0 -1.497 -1.32l-1.293 1.292l-1.293 -1.292l-.094 -.083z" />
                </svg>
            </div>
        </div>

        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between transition-all duration-300 hover:shadow-md hover:-translate-y-0.5">
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Jumlah Pelajar</p>
                <h3 class="text-3xl font-extrabold text-gray-900">{{ $totalStudents }}</h3>
            </div>
            <div class="flex items-center justify-center p-3 bg-cyan-100 rounded-full text-cyan-600">
                <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12.4472 2.10557c-.2815-.14076-.6129-.14076-.8944 0L5.90482 4.92956l.37762.11119c.01131.00333.02257.00687.03376.0106L12 6.94594l5.6808-1.89361.3927-.13363-5.6263-2.81313ZM5 10V6.74803l.70053.20628L7 7.38747V10c0 .5523-.44772 1-1 1s-1-.4477-1-1Zm3-1c0-.42413.06601-.83285.18832-1.21643l3.49538 1.16514c.2053.06842.4272.06842.6325 0l3.4955-1.16514C15.934 8.16715 16 8.57587 16 9c0 2.2091-1.7909 4-4 4-2.20914 0-4-1.7909-4-4Z"/>
                    <path d="M14.2996 13.2767c.2332-.2289.5636-.3294.8847-.2692C17.379 13.4191 19 15.4884 19 17.6488v2.1525c0 1.2289-1.0315 2.1428-2.2 2.1428H7.2c-1.16849 0-2.2-.9139-2.2-2.1428v-2.1525c0-2.1409 1.59079-4.1893 3.75163-4.6288.32214-.0655.65589.0315.89274.2595l2.34883 2.2606 2.3064-2.2634Z"/>
                </svg>
            </div>
        </div>

    </div>

    <!-- Students List -->
    <div class="bg-white p-6 rounded-xl shadow">
        <!-- Header -->
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg font-semibold">Senarai Pelajar</h2>
                <p class="text-sm text-gray-500">Urus pelajar anda: tambah baru, cari, tapis, kemaskini, atau padam.</p>
            </div>
            <button data-modal-target="addStudentModal" data-modal-toggle="addStudentModal"
                class="px-4 py-2 text-sm rounded-md font-semibold text-white bg-green-600 shadow-sm hover:bg-green-700 transition-colors duration-200 focus:ring-2 focus:ring-green-400 focus:ring-offset-1">
                + Tambah Pelajar
            </button>
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
                    placeholder="Cari mengikut Nama atau ID..." 
                    class="block w-full p-2.5 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-green-500/20 focus:border-green-600 focus:bg-white transition-all duration-200 outline-none shadow-sm" />
            </div>

            <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                
                <div class="relative w-full sm:w-48">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12.378 1.602a.75.75 0 0 0-.756 0L3 6.632l9 5.25 9-5.25-8.622-5.03ZM21.75 7.93l-9 5.25v9l8.628-5.032a.75.75 0 0 0 .372-.648V7.93ZM11.25 22.18v-9l-9-5.25v8.57a.75.75 0 0 0 .372.648l8.628 5.033Z" />
                        </svg>
                    </div>
                    <select id="filterPackage" 
                            class="appearance-none cursor-pointer w-full p-2.5 pl-10 pr-8 text-sm text-gray-700 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-green-500/20 focus:border-green-600 outline-none shadow-sm transition-all">
                        <option value="">Semua Pakej</option>
                        @foreach ($packageFilters as $packageFilter)
                            <option value="{{ strtolower($packageFilter->package_name) }}">{{ $packageFilter->package_name }}</option>
                        @endforeach
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
                            <path fill-rule="evenodd" d="M3 2.25a.75.75 0 0 1 .75.75v.54l1.838-.46a9.75 9.75 0 0 1 6.725.738l.108.054a8.25 8.25 0 0 0 5.58.652l3.109-.732a.75.75 0 0 1 .917.81 47.784 47.784 0 0 0 .005 10.337.75.75 0 0 1-.574.812l-3.114.733a9.75 9.75 0 0 1-6.594-.158l-.108-.054a8.25 8.25 0 0 0-5.89-.538l-2.25.54A.75.75 0 0 1 3 15.6V3a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <select id="filterStatus" 
                            class="appearance-none cursor-pointer w-full p-2.5 pl-10 pr-8 text-sm text-gray-700 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-green-500/20 focus:border-green-600 outline-none shadow-sm transition-all">
                        <option value="">Semua Status</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>

            </div>
        </div>

        <!-- Table -->
        <div class="w-full overflow-x-auto">
            <table id="studentTable" class="w-full min-w-max text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">Bil</th>
                        <th class="px-4 py-3">Nama Penuh</th>
                        <th class="px-4 py-3">Pakej</th>
                        <th class="px-4 py-3">Tarikh Kemasukan</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody id="studentBody">
                    @foreach ($students as $student)                        
                    <tr class="border-b">
                        <td class="px-4 py-3 row-index"></td>
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td class="px-4 py-3">
                            {{ optional(optional($student->joinPackage)->package)->package_name ?? '-' }}
                        </td>
                        <td class="px-4 py-3">{{ \Carbon\Carbon::parse($student->admission_date)->format('d/m/Y') }}</td>
                        <td class="px-4 py-3">
                            @if($student->status == 'active')
                                <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">Aktif</span>
                            @else
                                <span class="px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-600">Tidak Aktif</span>
                            @endif 
                        </td>
                        <td class="px-4 py-3 flex gap-2 justify-center">
                             <button type="button"
                                class="px-3 py-1 text-xs rounded bg-gray-200 hover:bg-gray-300 edit-student-button"
                                data-id="{{ $student->student_id }}" 
                                data-modal-target="editStudentModal"
                                data-modal-toggle="editStudentModal">Kemaskini</button>
                            <a href="{{ route('admin.student.report', $student->student_id) }}" 
                                class="px-3 py-1 text-xs rounded bg-yellow-400 text-white hover:bg-yellow-500">
                                Laporan
                            </a>
                            <form id="delete-form-{{ $student->student_id }}" action="{{ route('admin.student.destroy', $student->student_id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                    class="delete-button px-3 py-1 text-xs rounded bg-red-500 text-white hover:bg-red-600"
                                    data-id="{{ $student->student_id }}">
                                    Padam
                                </button>
                            </form>
                           {{-- if package none exist show create package, else edit package route --}}
                            <a href="{{ $student->joinPackage && $student->joinPackage->package
                                    ? route('admin.student.package.edit', ['studentId' => $student->student_id, 'id' => $student->joinPackage->package->package_id])
                                    : route('admin.student.package.create', $student->student_id) }}"
                                class="px-3 py-1 text-xs rounded bg-cyan-500 text-white hover:bg-cyan-600">
                                Pakej
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- No Record Message -->
            {{-- <div id="noRecord" class="hidden text-center text-gray-500 py-4">No records found</div> --}}
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
            const filterPackage = document.getElementById("filterPackage");
            const filterStatus = document.getElementById("filterStatus");
            const tbody = document.getElementById("studentBody");
            const rows = Array.from(tbody.getElementsByTagName("tr"));
            const noRecord = document.getElementById("noRecord");
            const pagination = document.getElementById("pagination");
            const entriesInfo = document.getElementById("entriesInfo");

            let currentPage = 1;
            const rowsPerPage = 10;

            function renderTable() {
                const searchValue = searchInput.value.toLowerCase();
                const packageValue = filterPackage.value.toLowerCase();
                const statusValue = filterStatus.value.toLowerCase();

                let filteredRows = rows.filter(row => {
                    const id = row.cells[0].textContent.toLowerCase();
                    const name = row.cells[1].textContent.toLowerCase();
                    const packageName = row.cells[2].textContent.toLowerCase();
                    const status = row.cells[4].textContent.toLowerCase();

                    const matchSearch = name.includes(searchValue) || id.includes(searchValue);
                    const matchPackage = packageValue === "" || packageName.includes(packageValue);
                    const matchStatus = statusValue === "" || status.trim() === statusValue;

                    return matchSearch && matchPackage && matchStatus;
                });

                const totalRows = filteredRows.length;
                const totalPages = Math.ceil(totalRows / rowsPerPage);
                if (currentPage > totalPages) currentPage = totalPages || 1;

                // hide all rows dulu
                rows.forEach(r => r.style.display = "none");

                // ambil rows ikut page
                let pageRows = filteredRows.slice((currentPage - 1) * rowsPerPage, currentPage * rowsPerPage);

                pageRows.forEach((r, i) => {
                    r.style.display = "";
                    // update numbering semula (row-index)
                    r.querySelector(".row-index").textContent = (currentPage - 1) * rowsPerPage + (i + 1);
                });

                // show/hide "no records"
                noRecord.classList.toggle("hidden", totalRows > 0);

                // entries info
                const start = totalRows === 0 ? 0 : (currentPage - 1) * rowsPerPage + 1;
                const end = Math.min(currentPage * rowsPerPage, totalRows);
                // entriesInfo.textContent = `Showing ${start} to ${end} of ${totalRows} entries`;
                entriesInfo.textContent = `Menunjukkan ${start} hingga ${end} daripada ${totalRows} rekod`;

                // build pagination
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

                // page numbers (max 5)
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

            // event listeners
            searchInput.addEventListener("input", () => { currentPage = 1; renderTable(); });
            filterStatus.addEventListener("change", () => { currentPage = 1; renderTable(); });
            filterPackage.addEventListener("change", () => { currentPage = 1; renderTable(); });

            // initial render
            renderTable();
        </script>

    </div>

    <!-- Add Student Modal -->
    <div id="addStudentModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative w-full max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <div class="w-6"></div>
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Tambah Pelajar Baru</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="addStudentModal">✕</button>
            </div>

            <!-- Modal Body -->
            <form id="addStudentForm" action="{{ route('admin.student.store') }}" method="POST">
                @csrf
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                        <!-- First Name -->
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Pertama</label>
                            <input type="text" id="first_name" name="first_name" placeholder="Muhammad Ali" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        <!-- Last Name -->
                        <div>
                            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Akhir</label>
                            <input type="text" id="last_name" name="last_name" placeholder="Bin Ahmad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        <!-- IC Number -->
                        <div>
                            <label for="ic_number" class="block mb-2 text-sm font-medium text-gray-900">Nombor Kad Pengenalan</label>
                            <input type="text" id="ic_number" name="ic_number" placeholder="990101145678" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
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
                                <option value="">Pilih Jantina</option>
                                <option value="Male">Lelaki</option>
                                <option value="Female">Perempuan</option>                                
                            </select>
                            </div>
                            
                        <!-- Status -->
                        <div>
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                            <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Pilih Status</option>
                                <option value="active">Aktif</option>
                                <option value="inactive">Tidak Aktif</option>
                            </select>
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
                <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="addStudentModal">Batal</button>
                <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-4 py-2 text-center">Hantar</button>
            </div>
        </form>
        </div>
    </div>

    <!-- Edit Student Modal -->
    <div id="editStudentModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative w-full max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <div class="w-6"></div>
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Kemaskini Pelajar</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="editStudentModal">✕</button>
            </div>

            <!-- Modal Body -->
            <form id="editStudentForm" method="POST">
                @csrf
                @method('PUT')
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                        <!-- First Name -->
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Pertama</label>
                            <input type="text" id="first_name" name="first_name" placeholder="Muhammad Ali" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        <!-- Last Name -->
                        <div>
                            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Akhir</label>
                            <input type="text" id="last_name" name="last_name" placeholder="Bin Ahmad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        <!-- IC Number -->
                        <div>
                            <label for="ic_number" class="block mb-2 text-sm font-medium text-gray-900">Nombor Kad Pengenalan</label>
                            <input type="text" id="ic_number" name="ic_number" placeholder="990101145678" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
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
                                <option value="Male">Lelaki</option>
                                <option value="Female">Perempuan</option>
                            </select>
                        </div>
                            
                        <!-- Status -->
                        <div>
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                            <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="active">Aktif</option>
                                <option value="inactive">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    <!-- Address (full width) -->
                    <div class="mt-6">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Alamat</label>
                        <textarea id="address" name="address" rows="3" placeholder="Masukkan alamat penuh" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-green-500 focus:border-green-500 block w-full p-2.5"></textarea>
                    </div>
                </div>
                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="editStudentModal">Batal</button>
                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-4 py-2 text-center">Kemaskini</button>
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

    @if(session('closeModalEdit'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const closeBtn = document.querySelector('[data-modal-hide="editStudentModal"]');
            if (closeBtn) {
                closeBtn.click(); // trigger tutup modal
            }
        });
    </script>
    @endif

     {{-- Edit Student Form --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editButtons = document.querySelectorAll('.edit-student-button'); // butang edit
            const editForm = document.getElementById('editStudentForm');

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const studentId = this.getAttribute('data-id');
                    fetch(`/admin/student/${studentId}/edit`)
                        .then(response => response.json())
                        .then(data => {
                            // Set form action untuk PUT
                            editForm.action = `/admin/student/${studentId}`;

                            editForm.first_name.value = data.first_name || '';
                            editForm.last_name.value = data.last_name || '';
                            editForm.ic_number.value = data.ic_number || '';
                            editForm.age.value = data.age || '';
                            editForm.birth_date.value = data.birth_date || '';
                            editForm.gender.value = data.gender || '';
                            editForm.status.value = data.status || '';
                            editForm.address.value = data.address || '';
                        })
                        .catch(error => {
                            // console.error('Error fetching student data:', error);
                            console.error('Ralat mendapatkan data pelajar:', error);
                        });
                });
            });
        });
    </script>

    {{-- Delete Confirmation --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".delete-button").forEach(button => {
                button.addEventListener("click", function () {
                    let id = this.getAttribute("data-id");
                    let form = document.getElementById("delete-form-" + id);

                    Swal.fire({
                        // title: 'Are you sure?',
                        title: 'Adakah anda pasti?',
                        // text: "This studdent will be deleted!",
                        text: "Pelajar ini akan dipadamkan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, padamkan!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

</x-admin-layout>