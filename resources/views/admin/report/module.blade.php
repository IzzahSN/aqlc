<x-admin-layout :title="'Laporan Modul Pembelajaran'">
    <!-- Report List -->
    <div class="bg-white p-6 rounded-xl shadow">
        <!-- Header -->
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg font-semibold">Senarai Modul Pembelajaran</h2>
                <p class="text-sm text-gray-500">Urus modul pembelajaran anda: carian, tapis dan kemaskini.</p>
            </div>
            <div>
                <button data-modal-target="addModuleModal" data-modal-toggle="addModuleModal"
                class="px-4 py-2 text-sm rounded-md font-semibold text-white bg-green-600 shadow-sm hover:bg-green-700 transition-colors duration-200 focus:ring-2 focus:ring-green-400 focus:ring-offset-1">
                + Tambah Modul Baru
            </button>
            </div>
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
                <select id="leveltype" 
                        class="appearance-none cursor-pointer w-full p-2.5 pl-10 pr-8 text-sm text-gray-700 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-green-500/20 focus:border-green-600 outline-none shadow-sm transition-all">
                    <option value="">Jenis Bacaan</option>
                    @foreach ($modules->pluck('level_type')->unique() as $level)
                        <option value="{{ $level }}">{{ $level }}</option>
                    @endforeach
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
            <table id="moduleTable" class="w-full min-w-max text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">Bil</th>
                        <th class="px-4 py-3">Bacaan</th>
                        <th class="px-4 py-3">M/S Awal</th>
                        <th class="px-4 py-3">M/S Akhir</th>
                        <th class="px-4 py-3">Jenis Bacaan</th>
                        <th class="px-4 py-3">Lencana</th>
                        <th class="px-4 py-3 text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody id="moduleBody">
                    @foreach ($modules as $module)                        
                    <tr class="border-b">
                        <td class="px-4 py-3 row-index"></td>
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $module->recitation_name }}</td>
                        <td class="px-4 py-3">{{ $module->first_page }}</td>
                        <td class="px-4 py-3">{{ $module->end_page }}</td>
                        <td class="px-4 py-3">{{ $module->level_type }}</td>
                        <td class="px-4 py-3">
                            @if ($module->badge)
                                <img src="{{ asset('storage/' . $module->badge) }}" alt="Badge" class="mx-auto max-h-12 w-auto object-contain">
                            @else
                                N/A
                            @endif
                        </td>
                        <td class="px-4 py-3 flex gap-2 justify-center">
                            <button type="button"
                                class="px-3 py-1 text-xs rounded bg-gray-200 hover:bg-gray-300 edit-button"
                                data-id="{{ $module->recitation_module_id }}" 
                                data-modal-target="editModuleModal"
                                data-modal-toggle="editModuleModal">Kemaskini</button>
                            <form id="delete-form-{{ $module->recitation_module_id }}" 
                                action="{{ route('admin.module.destroy', $module->recitation_module_id) }}" 
                                method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                    class="delete-button px-3 py-1 text-xs rounded bg-red-500 text-white hover:bg-red-600"
                                    data-id="{{ $module->recitation_module_id }}">
                                    Padam
                                </button>
                            </form>
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
            const filterLevel = document.getElementById("leveltype");
            const tbody = document.getElementById("moduleBody");
            const rows = Array.from(tbody.getElementsByTagName("tr"));
            const noRecord = document.getElementById("noRecord");
            const pagination = document.getElementById("pagination");
            const entriesInfo = document.getElementById("entriesInfo");

            let currentPage = 1;
            const rowsPerPage = 5;

            function renderTable() {
                const searchValue = searchInput.value.toLowerCase();
                const levelValue = filterLevel.value.toLowerCase();

                let filteredRows = rows.filter(row => {
                    const name = row.cells[1].textContent.toLowerCase();
                    const id = row.cells[0].textContent.toLowerCase();
                    const level = row.cells[4].textContent.toLowerCase(); // 👈 ambil room

                    const matchSearch = name.includes(searchValue) || id.includes(searchValue);
                    const matchLevel = levelValue === "" || level.includes(levelValue);
                    return matchSearch && matchLevel;
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
            filterLevel.addEventListener("change", () => { currentPage = 1; renderTable(); });

            renderTable();
        </script>
    </div>

    {{-- addModuleModal --}}
    <div id="addModuleModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative w-full max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <div class="w-6"></div>
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Tambah Modul</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="addModuleModal">✕</button>
            </div>

            <!-- Modal Body -->
            <form id="addModuleForm" action="{{ route('admin.module.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                       {{-- recitation_name --}}
                       <div>
                            <label for="recitation_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Bacaan</label>
                            <input type="text" name="recitation_name" id="recitation_name" placeholder="Juz 1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required/>
                       </div>

                        {{-- level_type --}}
                        <div>
                            <label for="level_type" class="block mb-2 text-sm font-medium text-gray-900">Jenis Bacaan</label>
                            <input type="text" name="level_type" id="level_type" placeholder="Quran" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        {{-- first_page --}}
                        <div>
                            <label for="first_page" class="block mb-2 text-sm font-medium text-gray-900">Muka Surat Awal</label>
                            <input type="number" name="first_page" id="first_page" placeholder="1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required/>
                        </div>

                        {{-- end_page --}}
                        <div>
                            <label for="end_page" class="block mb-2 text-sm font-medium text-gray-900">Muka Surat Akhir</label>
                            <input type="number" name="end_page" id="end_page" placeholder="20" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        {{-- badge --}}
                        <div>
                            <label for="badge" class="block mb-2 text-sm font-medium text-gray-900">Lencana (pilihan)</label>
                            <input type="file" name="badge" id="badge" accept="image/*" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                        </div>

                        {{-- is_complete_series, yes=1, no=0 --}}
                        <div>
                            <label for="is_complete_series" class="block mb-2 text-sm font-medium text-gray-900">Tandakan Sebagai Lengkap?</label>
                            <select id="is_complete_series" name="is_complete_series"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Pilih</option>
                                <option value="0">Tidak</option>
                                <option value="1">Ya</option>
                            </select>
                        </div>
                        
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="addModuleModal">Batal</button>

                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-4 py-2 text-center">Hantar</button>
                </div>
            </form>
        </div>
    </div>

    {{-- editModuleModal --}}
    <div id="editModuleModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative w-full max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <div class="w-6"></div>
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Kemaskini Maklumat Modul</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="editModuleModal">✕</button>
            </div>

            <!-- Modal Body -->
            <form id="editModuleForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                       {{-- recitation_name --}}
                       <div>
                            <label for="recitation_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Bacaan</label>
                            <input type="text" name="recitation_name" id="recitation_name" placeholder="Juz 1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required/>
                       </div>

                        {{-- level_type --}}
                        <div>
                            <label for="level_type" class="block mb-2 text-sm font-medium text-gray-900">Jenis Bacaan</label>
                            <input type="text" name="level_type" id="level_type" placeholder="Quran" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        {{-- first_page --}}
                        <div>
                            <label for="first_page" class="block mb-2 text-sm font-medium text-gray-900">Muka Surat Awal</label>
                            <input type="number" name="first_page" id="first_page" placeholder="1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required/>
                        </div>

                        {{-- end_page --}}
                        <div>
                            <label for="end_page" class="block mb-2 text-sm font-medium text-gray-900">Muka Surat Akhir</label>
                            <input type="number" name="end_page" id="end_page" placeholder="20" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        {{-- badge --}}
                        <div>
                            <label for="badge" class="block mb-2 text-sm font-medium text-gray-900">Lencana (pilihan)</label>
                            <input type="file" name="badge" id="badge" accept="image/*" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                        </div>

                        {{-- is_complete_series, yes=1, no=0 --}}
                        <div>
                            <label for="is_complete_series" class="block mb-2 text-sm font-medium text-gray-900">Tandakan Sebagai Lengkap?</label>
                            <select id="is_complete_series" name="is_complete_series"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                    focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="0">Tidak</option>
                                <option value="1">Ya</option>
                            </select>
                        </div>

                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="editModuleModal">Batal</button>

                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-4 py-2 text-center">Kemaskini Maklumat</button>
                </div>
            </form>
        </div>
    </div>

    {{-- delete confirmation --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".delete-button").forEach(button => {
                button.addEventListener("click", function () {
                    let id = this.getAttribute("data-id");
                    let form = document.getElementById("delete-form-" + id);

                    Swal.fire({
                        title: 'Adakah anda pasti?',
                        text: "Modul ini akan dipadamkan!",
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

    {{-- edit modal script --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const editButtons = document.querySelectorAll(".edit-button");
            const editForm = document.getElementById("editModuleForm");

            editButtons.forEach(button => {
                button.addEventListener("click", function () {
                    const id = this.getAttribute("data-id");

                    fetch(`/admin/module/${id}/edit`)
                        .then(response => response.json())
                        .then(data => {
                            editForm.action = `/admin/module/${id}`;
                            editForm.recitation_name.value = data.recitation_name;
                            editForm.level_type.value = data.level_type;
                            editForm.first_page.value = data.first_page;
                            editForm.end_page.value = data.end_page;
                            editForm.is_complete_series.value = data.is_complete_series ? '1' : '0';

                            // Resume upload tak boleh auto isi (security reason)
                            // Kalau nak, boleh letak link preview badge lama
                            if (data.badge) {
                                const badgeField = editForm.querySelector('#badge');
                                let oldBadge = document.getElementById('oldBadgeLink');
                                if (!oldBadge) {
                                    oldBadge = document.createElement('a');
                                    oldBadge.id = 'oldBadgeLink';
                                    oldBadge.className = 'text-green-600 underline text-sm';
                                    badgeField.parentNode.appendChild(oldBadge);
                                }
                                oldBadge.href = `/storage/${data.badge}`;
                                oldBadge.textContent = 'View Existing Badge';
                                oldBadge.target = '_blank';
                            } else {
                                const oldBadge = document.getElementById('oldBadgeLink');
                                if (oldBadge) {
                                    oldBadge.remove();
                                }
                            }

                        })
                        .catch(error => {
                            console.error('Error fetching module data:', error);
                        });
                });
            });
        });
    </script>
</x-admin-layout>

