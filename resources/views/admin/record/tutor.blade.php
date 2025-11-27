<x-admin-layout :title="'Rekod Tutor'">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between transition-all duration-300 hover:shadow-md hover:-translate-y-0.5">
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Jumlah Tutor Aktif</p>
                <h3 class="text-3xl font-extrabold text-gray-900">{{ $activeTutors }}</h3>
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
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Tutor Tidak Aktif</p>
                <h3 class="text-3xl font-extrabold text-gray-900">{{ $inactiveTutors }}</h3>
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
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Jumlah Tutor</p>
                <h3 class="text-3xl font-extrabold text-gray-900">{{ $totalTutors }}</h3>
            </div>
            <div class="flex items-center justify-center p-3 bg-cyan-100 rounded-full text-cyan-600">
                <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12.4472 2.10557c-.2815-.14076-.6129-.14076-.8944 0L5.90482 4.92956l.37762.11119c.01131.00333.02257.00687.03376.0106L12 6.94594l5.6808-1.89361.3927-.13363-5.6263-2.81313ZM5 10V6.74803l.70053.20628L7 7.38747V10c0 .5523-.44772 1-1 1s-1-.4477-1-1Zm3-1c0-.42413.06601-.83285.18832-1.21643l3.49538 1.16514c.2053.06842.4272.06842.6325 0l3.4955-1.16514C15.934 8.16715 16 8.57587 16 9c0 2.2091-1.7909 4-4 4-2.20914 0-4-1.7909-4-4Z"/>
                    <path d="M14.2996 13.2767c.2332-.2289.5636-.3294.8847-.2692C17.379 13.4191 19 15.4884 19 17.6488v2.1525c0 1.2289-1.0315 2.1428-2.2 2.1428H7.2c-1.16849 0-2.2-.9139-2.2-2.1428v-2.1525c0-2.1409 1.59079-4.1893 3.75163-4.6288.32214-.0655.65589.0315.89274.2595l2.34883 2.2606 2.3064-2.2634Z"/>
                </svg>
            </div>
        </div>

    </div>

    <!-- Teachers List -->
    <div class="bg-white p-6 rounded-xl shadow">
        <!-- Header -->
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg font-semibold">Senarai Tutor</h2>
                <p class="text-sm text-gray-500">Urus tutor anda: tambah baru, cari, tapis, sunting, atau padam.</p>
            </div>
            <button data-modal-target="addTutorModal" data-modal-toggle="addTutorModal"
                class="px-4 py-2 text-sm rounded-md font-semibold text-white bg-green-600 shadow-sm hover:bg-green-700 transition-colors duration-200 focus:ring-2 focus:ring-green-400 focus:ring-offset-1">
                + Tambah Tutor
            </button>
        </div>

         <!-- Search + Filter -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
            <!-- Search -->
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
            <!-- Filter -->
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

        <!-- Table -->
        <div class="w-full overflow-x-auto">
            <table id="tutorTable" class="w-full min-w-max text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">Bil</th>
                        <th class="px-4 py-3">Nama Pengguna</th>
                        <th class="px-4 py-3">Nombor Telefon</th>
                        <th class="px-4 py-3">E-mel</th>
                        <th class="px-4 py-3">Bil. Kelas</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody id="tutorBody">
                    @foreach ($tutors as $tutor)
                    <tr class="border-b">
                        <td class="px-4 py-3 row-index"></td>
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $tutor->username }}</td>
                        <td class="px-4 py-3">{{ $tutor->phone_number }}</td>
                        <td class="px-4 py-3">{{ $tutor->email }}</td>
                        <td class="px-4 py-3 text-center">{{ $tutor->classes_count }}</td>
                        <td class="px-4 py-3 text-center">
                            @if($tutor->status == 'active')
                                <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">Aktif</span>
                            @else
                                <span class="px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-600">Tidak Aktif</span>
                            @endif 
                        </td>
                        <td class="px-4 py-3 flex gap-2 justify-center">
                            <button type="button"
                                class="px-3 py-1 text-xs rounded bg-gray-200 hover:bg-gray-300 edit-tutor-button"
                                data-id="{{ $tutor->tutor_id }}" 
                                data-modal-target="editTutorModal"
                                data-modal-toggle="editTutorModal">Kemaskini</button>
                            <a href="{{ route('admin.tutor.report', $tutor->tutor_id) }}" 
                                class="px-3 py-1 text-xs rounded bg-yellow-500 text-white hover:bg-yellow-600">
                                Laporan
                            </a>
                             {{-- <form id="delete-form-{{ $tutor->tutor_id }}" 
                                action="{{ route('admin.tutor.destroy', $tutor->tutor_id) }}" 
                                method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                    class="delete-button px-3 py-1 text-xs rounded bg-red-500 text-white hover:bg-red-600"
                                    data-id="{{ $tutor->tutor_id }}">
                                    Delete
                                </button>
                            </form>                         --}}
                        </td>
                    </tr>
                    @endforeach
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
            const filterStatus = document.getElementById("filterStatus");
            const tbody = document.getElementById("tutorBody");
            const rows = Array.from(tbody.getElementsByTagName("tr"));
            const noRecord = document.getElementById("noRecord");
            const pagination = document.getElementById("pagination");
            const entriesInfo = document.getElementById("entriesInfo");

            let currentPage = 1;
            const rowsPerPage = 5;

            function renderTable() {
                const searchValue = searchInput.value.toLowerCase();
                const filterValue = filterStatus.value.toLowerCase();

                let filteredRows = rows.filter(row => {
                    const name = row.cells[1].textContent.toLowerCase();
                    const id = row.cells[0].textContent.toLowerCase();
                    const status = row.cells[5].textContent.toLowerCase(); // 👈 ambil status

                    const matchSearch = name.includes(searchValue) || id.includes(searchValue);
                    const matchFilter = filterValue === "" || status.trim() === filterValue;
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
            filterStatus.addEventListener("change", () => { currentPage = 1; renderTable(); });

            renderTable();
        </script>
    </div>

    <!-- Multi-step Add Tutor Modal -->
    <div id="addTutorModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative w-full max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-lg max-h-[85vh] overflow-y-auto">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <div class="w-6"></div>
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Tambah Tutor Baru</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="addTutorModal">✕</button>
            </div>

            <!-- Progress Indicator -->
            <ol class="flex items-center w-full p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white sm:text-base sm:p-4 sm:space-x-4 rtl:space-x-reverse">
                <li class="flex items-center flex-1 justify-center step-indicator active" data-step="1">
                    <span class="flex items-center justify-center w-6 h-6 me-2 text-xs border rounded-full shrink-0 step-circle">1</span>
                    <span class="hidden sm:inline-flex sm:ms-1">Maklumat Tutor</span>
                    <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                    </svg>
                </li>
                <li class="flex items-center flex-1 justify-center step-indicator" data-step="2">
                    <span class="flex items-center justify-center w-6 h-6 me-2 text-xs border rounded-full shrink-0 step-circle">2</span>
                    <span class="hidden sm:inline-flex sm:ms-1">Latar Belakang Pendidikan</span>
                    <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                    </svg>
                </li>
            </ol>

            <!-- Modal Body -->
            <form id="addTutorForm" action="{{ route('admin.tutor.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <!-- Step 1 -->
                    <div class="step-content" data-step="1">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                            <!-- First Name -->
                            <div>
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Pertama</label>
                                <input type="text" id="first_name" name="first_name" placeholder="Ali" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                            <!-- Last Name -->
                            <div>
                                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Akhir</label>
                                <input type="text" id="last_name" name="last_name" placeholder="Bin Ahmad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                            <!-- Username -->
                            <div>
                                <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Nama Pengguna</label>
                                <input type="text" id="username" name="username" placeholder="Ustaz Ali" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">E-mel</label>
                                <input type="email" id="email" name="email" placeholder="nama@gmail.com" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                            <!-- Phone Number -->
                            <div>
                                <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900">Nombor Telefon</label>
                                <input type="text" id="phone_number" name="phone_number" placeholder="0123456789" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                            <!-- IC Number -->
                            <div>
                                <label for="ic_number" class="block mb-2 text-sm font-medium text-gray-900">Nombor Kad Pengenalan</label>
                                <input type="text" id="ic_number" name="ic_number" placeholder="990101145678" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                            <!-- Age -->
                            <div>
                                <label for="age" class="block mb-2 text-sm font-medium text-gray-900">Umur</label>
                                <input type="number" id="age" name="age" placeholder="15" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                            <!-- Birth Date -->
                            <div>
                                <label for="birth_date" class="block mb-2 text-sm font-medium text-gray-900">Tarikh Lahir</label>
                                <input type="date" id="birth_date" name="birth_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                            <!-- Gender -->
                            <div>
                                <label for="gender" class="block mb-2 text-sm font-medium text-gray-900">Jantina</label>
                                <select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                    <option value="">Pilih Jantina</option>
                                    <option value="male">Lelaki</option>
                                    <option value="female">Perempuan</option>
                                </select>
                            </div>
                            <!-- Role -->
                            <div>
                                <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Peranan</label>
                                <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                    <option value="">Pilih Peranan</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Tutor">Tutor</option>
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
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Alamat Penuh</label>
                            <textarea id="address" name="address" rows="3" placeholder="Masukkan alamat penuh" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-green-500 focus:border-green-500 block w-full p-2.5"></textarea>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="step-content hidden" data-step="2">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            {{-- university --}}
                            <div>
                                <label for="university" class="block mb-2 text-sm font-medium text-gray-900">Universiti</label>
                                <input type="text" id="university" name="university" placeholder="Universiti Kebangsaan Malaysia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>
                            {{-- programme --}}
                            <div>
                                <label for="programme" class="block mb-2 text-sm font-medium text-gray-900">Bidang Pengajian</label>
                                <input type="text" id="programme" name="programme" placeholder="Undang-undang Syariah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>
                            {{-- grade --}}
                            <div>
                                <label for="grade" class="block mb-2 text-sm font-medium text-gray-900">Gred</label>
                                <input type="text" id="grade" name="grade" placeholder="4.0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" min="0.00" max="4.00" step="0.01" required>
                            </div>
                            {{-- resume --}}
                            <div>
                                <label for="resume" class="block mb-2 text-sm font-medium text-gray-900">Muat Naik Resume (PDF)</label>
                                <input type="file" id="resume" name="resume" accept="application/pdf" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                            </div>
                            {{-- background description --}}
                            <div>
                                <label for="bg_description" class="block mb-2 text-sm font-medium text-gray-900">Penerangan Latar Belakang</label>
                                <textarea id="bg_description" name="bg_description" rows="4" placeholder="Sila terangkan latar belakang pendidikan anda" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-green-500 focus:border-green-500 block w-full p-2.5"></textarea>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="addTutorModal">Batal</button>

                    <div class="flex gap-2">
                        <button type="button" id="prevStep" class="hidden px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300">Sebelumnya</button>
                        <button type="button" id="nextStep" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-4 py-2 text-center">Seterusnya</button>
                        <button type="submit" id="submitForm" class="hidden text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-4 py-2 text-center">Hantar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Multi-step Edit Tutor Modal -->
    <div id="editTutorModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative w-full max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-lg max-h-[85vh] overflow-y-auto">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <div class="w-6"></div>
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Kemaskini Maklumat Tutor</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="editTutorModal">✕</button>
            </div>

            <!-- Progress Indicator -->
            <ol class="flex items-center w-full p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white sm:text-base sm:p-4 sm:space-x-4 rtl:space-x-reverse">
                <li class="flex items-center flex-1 justify-center step-indicator-edit active" data-step="1">
                    <span class="flex items-center justify-center w-6 h-6 me-2 text-xs border rounded-full shrink-0 step-circle">1</span>
                    <span class="hidden sm:inline-flex sm:ms-1">Maklumat Tutor</span>
                    <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                    </svg>
                </li>
                <li class="flex items-center flex-1 justify-center step-indicator-edit" data-step="2">
                    <span class="flex items-center justify-center w-6 h-6 me-2 text-xs border rounded-full shrink-0 step-circle">2</span>
                    <span class="hidden sm:inline-flex sm:ms-1">Latar Belakang Pendidikan</span>
                    <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                    </svg>
                </li>
            </ol>

            <!-- Modal Body -->
            <form id="editTutorForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <!-- Step 1 -->
                    <div class="step-content-edit" data-step="1">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                            <!-- First Name -->
                            <div>
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Pertama</label>
                                <input type="text" id="first_name" name="first_name" placeholder="Ali" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                            <!-- Last Name -->
                            <div>
                                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Akhir</label>
                                <input type="text" id="last_name" name="last_name" placeholder="Bin Ahmad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                            <!-- Username -->
                            <div>
                                <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Nama Pengguna</label>
                                <input type="text" id="username" name="username" placeholder="Ustaz Ali" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">E-mel</label>
                                <input type="email" id="email" name="email" placeholder="nama@gmail.com" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" readonly>
                            </div>

                            <!-- Phone Number -->
                            <div>
                                <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900">Nombor Telefon</label>
                                <input type="text" id="phone_number" name="phone_number" placeholder="0123456789" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                            <!-- IC Number -->
                            <div>
                                <label for="ic_number" class="block mb-2 text-sm font-medium text-gray-900">Nombor Kad Pengenalan</label>
                                <input type="text" id="ic_number" name="ic_number" placeholder="990101445678" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" readonly>
                            </div>

                            <!-- Age -->
                            <div>
                                <label for="age" class="block mb-2 text-sm font-medium text-gray-900">Umur</label>
                                <input type="number" id="age" name="age" placeholder="15" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                            <!-- Birth Date -->
                            <div>
                                <label for="birth_date" class="block mb-2 text-sm font-medium text-gray-900">Tarikh Lahir</label>
                                <input type="date" id="birth_date" name="birth_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                            <!-- Gender -->
                            <div>
                                <label for="gender" class="block mb-2 text-sm font-medium text-gray-900">Jantina</label>
                                <select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                    <option value="male">Lelaki</option>
                                    <option value="female">Perempuan</option>
                                </select>
                            </div>
                            <!-- Role -->
                            <div>
                                <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Peranan</label>
                                <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                    <option value="Admin">Admin</option>
                                    <option value="Tutor">Tutor</option>
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
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Alamat Penuh</label>
                            <textarea id="address" name="address" rows="3" placeholder="Masukkan alamat penuh" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-green-500 focus:border-green-500 block w-full p-2.5"></textarea>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="step-content-edit hidden" data-step="2">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            {{-- university --}}
                            <div>
                                <label for="university" class="block mb-2 text-sm font-medium text-gray-900">Universiti</label>
                                <input type="text" id="university" name="university" placeholder="Universiti Kebangsaan Malaysia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>
                            {{-- programme --}}
                            <div>
                                <label for="programme" class="block mb-2 text-sm font-medium text-gray-900">Bidang Pengajian</label>
                                <input type="text" id="programme" name="programme" placeholder="Undang-undang Syariah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>
                            {{-- grade --}}
                            <div>
                                <label for="grade" class="block mb-2 text-sm font-medium text-gray-900">Gred</label>
                                <input type="number" id="grade" name="grade" placeholder="4.0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" min="0.00" max="4.00" step="0.01" required>
                            </div>
                            {{-- resume --}}
                            <div>
                                <label for="resume" class="block mb-2 text-sm font-medium text-gray-900">Muat Naik Resume (PDF)</label>
                                <input type="file" id="resume" name="resume" accept="application/pdf" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                            </div>
                            {{-- background description --}}
                            <div>
                                <label for="bg_description" class="block mb-2 text-sm font-medium text-gray-900">Keterangan Latar Belakang</label>
                                <textarea id="bg_description" name="bg_description" rows="4" placeholder="Sila terangkan latar belakang pendidikan anda" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-green-500 focus:border-green-500 block w-full p-2.5"></textarea>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="editTutorModal">Batal</button>

                    <div class="flex gap-2">
                        <button type="button" id="prevStepEdit" class="hidden px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300">Sebelumnya</button>
                        <button type="button" id="nextStepEdit" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-4 py-2 text-center">Seterusnya</button>
                        <button type="submit" id="submitFormEdit" class="hidden text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-4 py-2 text-center">Kemaskini Maklumat</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if(session('closeModalAdd'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Cari button yang ada data-modal-hide="addTutorModal"
            const closeBtn = document.querySelector('[data-modal-hide="addTutorModal"]');
            if (closeBtn) {
                closeBtn.click(); // trigger tutup modal
            }
        });
    </script>
    @endif

     @if(session('closeModalEdit'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Cari button yang ada data-modal-hide="editTutorModal"
            const closeBtn = document.querySelector('[data-modal-hide="editTutorModal"]');
            if (closeBtn) {
                closeBtn.click(); // trigger tutup modal
            }
        });
    </script>
    @endif

    {{-- Delete Confirmation --}}
   <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".delete-button").forEach(button => {
                button.addEventListener("click", function () {
                    let id = this.getAttribute("data-id");
                    let form = document.getElementById("delete-form-" + id);

                    Swal.fire({
                        title: 'Anda pasti?',
                        text: "Tutor ini akan dipadamkan!",
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

    {{-- Script for Step Navigation --}}
    <script>
            (function(){
            const modal = document.getElementById('addTutorModal');
            if (!modal) return;

            const stepContents = Array.from(modal.querySelectorAll('.step-content'));
            const stepNums = stepContents.map(s => parseInt(s.dataset.step, 10)).sort((a,b)=>a-b);
            let currentIndex = 0; // index dalam stepNums array

            const prevBtn = modal.querySelector('#prevStep');
            const nextBtn = modal.querySelector('#nextStep');
            const submitBtn = modal.querySelector('#submitForm');
            const indicators = Array.from(modal.querySelectorAll('.step-indicator'));

            const update = () => {
                const currentStep = stepNums[currentIndex];

                // show/hide step contents (scoped)
                stepContents.forEach(el => {
                el.classList.toggle('hidden', parseInt(el.dataset.step, 10) !== currentStep);
                });

                // update indicators (scoped)
                indicators.forEach(ind => {
                const circle = ind.querySelector('.step-circle');
                if (parseInt(ind.dataset.step, 10) === currentStep) {
                    ind.classList.add('text-green-600', 'font-bold');
                    circle.classList.add('bg-green-600', 'text-white', 'border-green-600');
                } else {
                    ind.classList.remove('text-green-600', 'font-bold');
                    circle.classList.remove('bg-green-600', 'text-white', 'border-green-600');
                }
                });

                // buttons
                prevBtn.classList.toggle('hidden', currentIndex === 0);
                nextBtn.classList.toggle('hidden', currentIndex === stepNums.length - 1);
                submitBtn.classList.toggle('hidden', currentIndex !== stepNums.length - 1);
            };

        nextBtn.addEventListener('click', () => {
                if (currentIndex < stepNums.length - 1) {
                    // validate step 1 sebelum move ke step 2
                    if (currentIndex === 0) {
                        const step1 = stepContents.find(s => s.dataset.step === "1");
                        const inputs = step1.querySelectorAll("input[required], select[required], textarea[required]");
                        let valid = true;

                        inputs.forEach(input => {
                            if (!input.value.trim()) {
                                input.classList.add("border-red-500"); // highlight merah
                                valid = false;
                            } else {
                                input.classList.remove("border-red-500");
                            }
                        });

                    if (!valid) {
                        const firstInvalid = step1.querySelector(".border-red-500");
                        if (firstInvalid) {
                            firstInvalid.scrollIntoView({ behavior: "smooth", block: "center" });
                        }
                        Swal.fire({
                            icon: "warning",
                            title: "Borang Tidak Lengkap",
                            text: "Sila isi semua medan yang diperlukan di Langkah 1.",
                            confirmButtonColor: "#16a34a",
                            confirmButtonText: "Faham"
                        });
                        return;
                    }

                    }

                    currentIndex++;
                    update();
                }
            });


            prevBtn.addEventListener('click', () => {
                if (currentIndex > 0) currentIndex--;
                update();
            });

            // init once
            update();

            // Reset to first step each time modal is opened (detect class change 'hidden')
            const mo = new MutationObserver(muts => {
                muts.forEach(m => {
                if (m.attributeName === 'class' && !modal.classList.contains('hidden')) {
                    currentIndex = 0;
                    update();
                }
                });
            });
            mo.observe(modal, { attributes: true });
            })();
    </script>

    {{-- Edit navigation --}}
    <script>
        (function(){
        const modal = document.getElementById('editTutorModal');
        if (!modal) return;

        const stepContents = Array.from(modal.querySelectorAll('.step-content-edit'));
        const stepNums = stepContents.map(s => parseInt(s.dataset.step, 10)).sort((a,b)=>a-b);
        let currentIndex = 0; // index dalam stepNums array

        const prevBtn = modal.querySelector('#prevStepEdit');
        const nextBtn = modal.querySelector('#nextStepEdit');
        const submitBtn = modal.querySelector('#submitFormEdit');
        const indicators = Array.from(modal.querySelectorAll('.step-indicator-edit'));

        const update = () => {
            const currentStep = stepNums[currentIndex];

            // show/hide step contents (scoped)
            stepContents.forEach(el => {
            el.classList.toggle('hidden', parseInt(el.dataset.step, 10) !== currentStep);
            });

            // update indicators (scoped)
            indicators.forEach(ind => {
            const circle = ind.querySelector('.step-circle');
            if (parseInt(ind.dataset.step, 10) === currentStep) {
                ind.classList.add('text-green-600', 'font-bold');
                circle.classList.add('bg-green-600', 'text-white', 'border-green-600');
            } else {
                ind.classList.remove('text-green-600', 'font-bold');
                circle.classList.remove('bg-green-600', 'text-white', 'border-green-600');
            }
            });

            // buttons
            prevBtn.classList.toggle('hidden', currentIndex === 0);
            nextBtn.classList.toggle('hidden', currentIndex === stepNums.length - 1);
            submitBtn.classList.toggle('hidden', currentIndex !== stepNums.length - 1);
        };

      nextBtn.addEventListener('click', () => {
            if (currentIndex < stepNums.length - 1) {
                // validate step 1 sebelum move ke step 2
                if (currentIndex === 0) {
                    const step1 = stepContents.find(s => s.dataset.step === "1");
                    const inputs = step1.querySelectorAll("input[required], select[required], textarea[required]");
                    let valid = true;

                    inputs.forEach(input => {
                        if (!input.value.trim()) {
                            input.classList.add("border-red-500"); // highlight merah
                            valid = false;
                        } else {
                            input.classList.remove("border-red-500");
                        }
                    });

                if (!valid) {
                    const firstInvalid = step1.querySelector(".border-red-500");
                    if (firstInvalid) {
                        firstInvalid.scrollIntoView({ behavior: "smooth", block: "center" });
                    }
                    Swal.fire({
                        icon: "warning",
                        title: "Borang Tidak Lengkap",
                        text: "Sila isi semua medan yang diperlukan di Langkah 1.",
                        confirmButtonColor: "#16a34a",
                        confirmButtonText: "Faham"
                    });
                    return;
                }

                }

                currentIndex++;
                update();
            }
        });


        prevBtn.addEventListener('click', () => {
            if (currentIndex > 0) currentIndex--;
            update();
        });

        // init once
        update();

        // Reset to first step each time modal is opened (detect class change 'hidden')
        const mo = new MutationObserver(muts => {
            muts.forEach(m => {
            if (m.attributeName === 'class' && !modal.classList.contains('hidden')) {
                currentIndex = 0;
                update();
            }
            });
        });
        mo.observe(modal, { attributes: true });
        })();
    </script>

    {{-- Edit Tutor Form --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editButtons = document.querySelectorAll('.edit-tutor-button'); // butang edit
            const editForm = document.getElementById('editTutorForm');

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const tutorId = this.getAttribute('data-id');

                    fetch(`/admin/tutor/${tutorId}/edit`)
                        .then(response => response.json())
                        .then(data => {
                            // Set form action untuk PUT
                            editForm.action = `/admin/tutor/${tutorId}`;

                            // Step 1 - Personal Info
                            editForm.first_name.value = data.first_name || '';
                            editForm.last_name.value = data.last_name || '';
                            editForm.username.value = data.username || '';
                            editForm.email.value = data.email || '';
                            editForm.phone_number.value = data.phone_number || '';
                            editForm.ic_number.value = data.ic_number || '';
                            editForm.age.value = data.age || '';
                            editForm.birth_date.value = data.birth_date || '';
                            editForm.gender.value = data.gender || '';
                            editForm.role.value = data.role || '';
                            editForm.status.value = data.status || '';
                            editForm.address.value = data.address || '';

                            // Step 2 - Education
                            editForm.university.value = data.university || '';
                            editForm.programme.value = data.programme || '';
                            editForm.grade.value = data.grade || '';
                            editForm.bg_description.value = data.bg_description || '';

                            // Resume upload tak boleh auto isi (security reason)
                            // Kalau nak, boleh letak link preview resume lama
                        if (data.resume) {
                                const resumeField = editForm.querySelector('#resume');
                                let oldResume = document.getElementById('oldResumeLink');
                                if (!oldResume) {
                                    oldResume = document.createElement('a');
                                    oldResume.id = 'oldResumeLink';
                                    oldResume.href = `/storage/${data.resume}`;
                                    oldResume.target = '_blank';
                                    oldResume.className = 'block text-sm text-blue-600 mt-1';
                                    oldResume.innerText = 'Lihat resume';
                                    resumeField.insertAdjacentElement('afterend', oldResume);
                                } else {
                                    oldResume.href = `/storage/${data.resume}`;
                                }
                            } else {
                                // kalau tiada resume, remove link lama
                                let oldResume = document.getElementById('oldResumeLink');
                                if (oldResume) {
                                    oldResume.remove();
                                }
                            }

                        })
                        .catch(error => {
                            console.error('Error fetching tutor data:', error);
                        });
                });
            });
        });
    </script>


</x-admin-layout>