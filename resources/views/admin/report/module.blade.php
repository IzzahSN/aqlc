<x-admin-layout :title="'Module Report'">
    <!-- Report List -->
    <div class="bg-white p-6 rounded-xl shadow">
        <!-- Header -->
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg font-semibold">List of Module</h2>
                <p class="text-sm text-gray-500">Manage your module: search, filter and update.</p>
            </div>
            <div>
                <button type="button" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700"
                    data-modal-target="addModuleModal" data-modal-toggle="addModuleModal">
                    Add New Module
                </button>
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
            <select id="leveltype" class="border rounded-lg px-3 py-2 text-sm w-full sm:w-auto">
                <option value="">All Level</option>
                <option value="Iqra">Iqra</option>
                <option value="Quran">Quran</option>
            </select>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table id="moduleTable" class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Recitation</th>
                        <th class="px-4 py-3">First Page</th>
                        <th class="px-4 py-3">End page</th>
                        <th class="px-4 py-3">Level Type</th>
                        <th class="px-4 py-3">Badge</th>
                        <th class="px-4 py-3 text-center">Action</th>
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
                                data-modal-toggle="editModuleModal">Edit</button>
                            <form id="delete-form-{{ $module->recitation_module_id }}" 
                                action="{{ route('admin.module.destroy', $module->recitation_module_id) }}" 
                                method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                    class="delete-button px-3 py-1 text-xs rounded bg-red-500 text-white hover:bg-red-600"
                                    data-id="{{ $module->recitation_module_id }}">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
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
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Add New Module</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="addModuleModal">✕</button>
            </div>

            <!-- Modal Body -->
            <form id="addModuleForm" action="{{ route('admin.module.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                       {{-- recitation_name --}}
                       <div>
                            <label for="recitation_name" class="block mb-2 text-sm font-medium text-gray-900">Recitation Name</label>
                            <input type="text" name="recitation_name" id="recitation_name" placeholder="Quran" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required/>
                       </div>

                        {{-- level_type --}}
                        <div>
                            <label for="level_type" class="block mb-2 text-sm font-medium text-gray-900">Level Type</label>
                            <input type="text" name="level_type" id="level_type" placeholder="1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        {{-- first_page --}}
                        <div>
                            <label for="first_page" class="block mb-2 text-sm font-medium text-gray-900">First Page</label>
                            <input type="number" name="first_page" id="first_page" placeholder="1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required/>
                        </div>

                        {{-- end_page --}}
                        <div>
                            <label for="end_page" class="block mb-2 text-sm font-medium text-gray-900">End Page</label>
                            <input type="number" name="end_page" id="end_page" placeholder="20" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        {{-- badge --}}
                        <div>
                            <label for="badge" class="block mb-2 text-sm font-medium text-gray-900">Badge (optional)</label>
                            <input type="file" name="badge" id="badge" accept="image/*" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button" class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="addModuleModal">Cancel</button>

                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-6 py-2.5 text-center">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>

