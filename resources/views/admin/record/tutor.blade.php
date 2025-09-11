<x-admin-layout :title="'Tutor'">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white p-4 rounded-sm shadow flex items-center gap-3 border-l-lime-600 border-l-6 justify-between">
            <div>
                <p class="text-sm font-semibold text-lime-600 uppercase">Total Active Teachers</p>
                <h3 class="text-2xl font-bold text-gray-500">8</h3>
            </div>
            <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-square-rounded-check w-8 h-8 text-gray-300"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2c-.218 0 -.432 .002 -.642 .005l-.616 .017l-.299 .013l-.579 .034l-.553 .046c-4.785 .464 -6.732 2.411 -7.196 7.196l-.046 .553l-.034 .579c-.005 .098 -.01 .198 -.013 .299l-.017 .616l-.004 .318l-.001 .324c0 .218 .002 .432 .005 .642l.017 .616l.013 .299l.034 .579l.046 .553c.464 4.785 2.411 6.732 7.196 7.196l.553 .046l.579 .034c.098 .005 .198 .01 .299 .013l.616 .017l.642 .005l.642 -.005l.616 -.017l.299 -.013l.579 -.034l.553 -.046c4.785 -.464 6.732 -2.411 7.196 -7.196l.046 -.553l.034 -.579c.005 -.098 .01 -.198 .013 -.299l.017 -.616l.005 -.642l-.005 -.642l-.017 -.616l-.013 -.299l-.034 -.579l-.046 -.553c-.464 -4.785 -2.411 -6.732 -7.196 -7.196l-.553 -.046l-.579 -.034a28.058 28.058 0 0 0 -.299 -.013l-.616 -.017l-.318 -.004l-.324 -.001zm2.293 7.293a1 1 0 0 1 1.497 1.32l-.083 .094l-4 4a1 1 0 0 1 -1.32 .083l-.094 -.083l-2 -2a1 1 0 0 1 1.32 -1.497l.094 .083l1.293 1.292l3.293 -3.292z" fill="currentColor" stroke-width="0" /></svg>
        </div>
        <div class="bg-white p-4 rounded-sm shadow flex items-center gap-3 border-l-amber-400 border-l-6 justify-between">
            <div>
                <p class="text-sm font-semibold text-amber-600 uppercase">Total Inactive Teachers</p>
                <h3 class="text-2xl font-bold text-gray-500">2</h3>
            </div>
           <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-square-rounded-x w-8 h-8 text-gray-300"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2l.324 .001l.318 .004l.616 .017l.299 .013l.579 .034l.553 .046c4.785 .464 6.732 2.411 7.196 7.196l.046 .553l.034 .579c.005 .098 .01 .198 .013 .299l.017 .616l.005 .642l-.005 .642l-.017 .616l-.013 .299l-.034 .579l-.046 .553c-.464 4.785 -2.411 6.732 -7.196 7.196l-.553 .046l-.579 .034c-.098 .005 -.198 .01 -.299 .013l-.616 .017l-.642 .005l-.642 -.005l-.616 -.017l-.299 -.013l-.579 -.034l-.553 -.046c-4.785 -.464 -6.732 -2.411 -7.196 -7.196l-.046 -.553l-.034 -.579a28.058 28.058 0 0 1 -.013 -.299l-.017 -.616c-.003 -.21 -.005 -.424 -.005 -.642l.001 -.324l.004 -.318l.017 -.616l.013 -.299l.034 -.579l.046 -.553c.464 -4.785 2.411 -6.732 7.196 -7.196l.553 -.046l.579 -.034c.098 -.005 .198 -.01 .299 -.013l.616 -.017c.21 -.003 .424 -.005 .642 -.005zm-1.489 7.14a1 1 0 0 0 -1.218 1.567l1.292 1.293l-1.292 1.293l-.083 .094a1 1 0 0 0 1.497 1.32l1.293 -1.292l1.293 1.292l.094 .083a1 1 0 0 0 1.32 -1.497l-1.292 -1.293l1.292 -1.293l.083 -.094a1 1 0 0 0 -1.497 -1.32l-1.293 1.292l-1.293 -1.292l-.094 -.083z" fill="currentColor" stroke-width="0" /></svg>   
        </div>
        <div class="bg-white p-4 rounded-sm shadow flex items-center gap-3 border-l-cyan-600 border-l-6 justify-between">
            <div>
                <p class="text-sm font-semibold text-cyan-600 uppercase">Total Teachers</p>
                <h3 class="text-2xl font-bold text-gray-500">10</h3>
            </div>  
            <svg class="w-10 h-10 text-gray-300 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path d="M16 10c0-.55228-.4477-1-1-1h-3v2h3c.5523 0 1-.4477 1-1Z"/>
                <path d="M13 15v-2h2c1.6569 0 3-1.3431 3-3 0-1.65685-1.3431-3-3-3h-2.256c.1658-.46917.256-.97405.256-1.5 0-.51464-.0864-1.0091-.2454-1.46967C12.8331 4.01052 12.9153 4 13 4h7c.5523 0 1 .44772 1 1v9c0 .5523-.4477 1-1 1h-2.5l1.9231 4.6154c.2124.5098-.0287 1.0953-.5385 1.3077-.5098.2124-1.0953-.0287-1.3077-.5385L15.75 16l-1.827 4.3846c-.1825.438-.6403.6776-1.0889.6018.1075-.3089.1659-.6408.1659-.9864v-2.6002L14 15h-1ZM6 5.5C6 4.11929 7.11929 3 8.5 3S11 4.11929 11 5.5 9.88071 8 8.5 8 6 6.88071 6 5.5Z"/>
                <path d="M15 11h-4v9c0 .5523-.4477 1-1 1-.55228 0-1-.4477-1-1v-4H8v4c0 .5523-.44772 1-1 1s-1-.4477-1-1v-6.6973l-1.16797 1.752c-.30635.4595-.92722.5837-1.38675.2773-.45952-.3063-.5837-.9272-.27735-1.3867l2.99228-4.48843c.09402-.14507.2246-.26423.37869-.34445.11427-.05949.24148-.09755.3763-.10887.03364-.00289.06747-.00408.10134-.00355H15c.5523 0 1 .44772 1 1 0 .5523-.4477 1-1 1Z"/>
            </svg>        
        </div>
    </div>

    <!-- Teachers List -->
    <div class="bg-white p-6 rounded-xl shadow">
        <!-- Header -->
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg font-semibold">List of Teachers</h2>
                <p class="text-sm text-gray-500">Manage your tutors: add new, search, filter, edit, or delete.</p>
            </div>
            <button data-modal-target="addTutorModal" data-modal-toggle="addTutorModal"
                class="px-4 py-2 text-sm rounded-lg bg-green-600 text-white hover:bg-green-700">
                + Add New Tutor
            </button>

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
            <select id="filterStatus" class="border rounded-lg px-3 py-2 text-sm w-full sm:w-auto">
                <option value="">All Status</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table id="tutorTable" class="min-w-max text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Username</th>
                        <th class="px-4 py-3">Phone Number</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Assigned Classes</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="tutorBody">
                    @foreach ($tutors as $tutor)
                    <tr class="border-b">
                        <td class="px-4 py-3 row-index"></td>
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $tutor->username }}</td>
                        <td class="px-4 py-3">{{ $tutor->phone_number }}</td>
                        <td class="px-4 py-3">{{ $tutor->email }}</td>
                        <td class="px-4 py-3">{{ $tutor->classes_count }}</td>
                        <td class="px-4 py-3">
                            @if($tutor->status == 'active')
                                <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">Active</span>
                            @else
                                <span class="px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-600">Inactive</span>
                            @endif 
                        </td>
                        <td class="px-4 py-3 flex gap-2 justify-center">
                            <button type="button" class="px-3 py-1 text-xs rounded bg-gray-200 hover:bg-gray-300" data-modal-target="editTutorModal" data-modal-toggle="editTutorModal">Edit</button>
                            <a href="{{ route('admin.tutor.report') }}" class="px-3 py-1 text-xs rounded bg-yellow-400 text-white hover:bg-yellow-500">Report</a>
                            <button class="px-3 py-1 text-xs rounded bg-red-500 text-white hover:bg-red-600">Delete</button>
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
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Add New Tutor</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="addTutorModal">✕</button>
            </div>

            <!-- Progress Indicator -->
            <ol class="flex items-center w-full p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white sm:text-base sm:p-4 sm:space-x-4 rtl:space-x-reverse">
                <li class="flex items-center flex-1 justify-center step-indicator active" data-step="1">
                    <span class="flex items-center justify-center w-6 h-6 me-2 text-xs border rounded-full shrink-0 step-circle">1</span>
                    <span class="hidden sm:inline-flex sm:ms-1">Tutor Info</span>
                    <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                    </svg>
                </li>
                <li class="flex items-center flex-1 justify-center step-indicator" data-step="2">
                    <span class="flex items-center justify-center w-6 h-6 me-2 text-xs border rounded-full shrink-0 step-circle">2</span>
                    <span class="hidden sm:inline-flex sm:ms-1">Education Background</span>
                    <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                    </svg>
                </li>
            </ol>

            <!-- Modal Body -->
            <form id="tutorForm">
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <!-- Step 1 -->
                    <div class="step-content" data-step="1">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                            <!-- First Name -->
                            <div>
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">First Name</label>
                                <input type="text" id="first_name" name="first_name" placeholder="Ali" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                            <!-- Last Name -->
                            <div>
                                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                                <input type="text" id="last_name" name="last_name" placeholder="Ahmad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                            <!-- Username -->
                            <div>
                                <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                                <input type="text" id="username" name="username" placeholder="Ustaz Jazmy" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                <input type="email" id="email" name="email" placeholder="jazmy@gmail.com" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                            <!-- IC Number -->
                            <div>
                                <label for="ic_number" class="block mb-2 text-sm font-medium text-gray-900">IC Number</label>
                                <input type="text" id="ic_number" name="ic_number" placeholder="990101-14-5678" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                            <!-- Age -->
                            <div>
                                <label for="age" class="block mb-2 text-sm font-medium text-gray-900">Age</label>
                                <input type="number" id="age" name="age" placeholder="15" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                            <!-- Birth Date -->
                            <div>
                                <label for="birth_date" class="block mb-2 text-sm font-medium text-gray-900">Birth Date</label>
                                <input type="date" id="birth_date" name="birth_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                            <!-- Gender -->
                            <div>
                                <label for="gender" class="block mb-2 text-sm font-medium text-gray-900">Gender</label>
                                <select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <!-- Role -->
                            <div>
                                <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                                <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                    <option value="">Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="tutor">Tutor</option>
                                </select>
                            </div>
                            <!-- Status -->
                            <div>
                                <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                                <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                    <option value="">Select Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <!-- Address (full width) -->
                        <div class="mt-6">
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Address</label>
                            <textarea id="address" name="address" rows="3" placeholder="Enter full address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required></textarea>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="step-content hidden" data-step="2">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="university" class="block mb-2 text-sm font-medium text-gray-900">University</label>
                                <select id="university" name="university" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                    <option value="">Select University</option>
                                    <option value="Universiti Malaya">Universiti Malaya</option>
                                    <option value="Universiti Kebangsaan Malaysia">Universiti Kebangsaan Malaysia</option>
                                </select>
                            </div>
                            <div>
                                <label for="programme" class="block mb-2 text-sm font-medium text-gray-900">Programme</label>
                                <input type="text" id="programme" name="programme" placeholder="Bachelor of Quran Sunnah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>
                            <div>
                                <label for="grade" class="block mb-2 text-sm font-medium text-gray-900">Grade</label>
                                <input type="email" id="grade" name="grade" placeholder="4.0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>
                            <div>
                                <label for="resume" class="block mb-2 text-sm font-medium text-gray-900">Upload Resume (PDF)</label>
                                <input type="file" id="resume" name="resume" accept="application/pdf" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button" class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="addTutorModal">Cancel</button>

                    <div class="flex gap-2">
                        <button type="button" id="prevStep" class="hidden px-6 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300">Previous</button>
                        <button type="button" id="nextStep" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-6 py-2.5 text-center">Next</button>
                        <button type="submit" id="submitForm" class="hidden text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-6 py-2.5 text-center">Submit</button>
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
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Edit Tutor</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="editTutorModal">✕</button>
            </div>

            <!-- Progress Indicator -->
            <ol class="flex items-center w-full p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white sm:text-base sm:p-4 sm:space-x-4 rtl:space-x-reverse">
                <li class="flex items-center flex-1 justify-center step-indicator active" data-step="3">
                    <span class="flex items-center justify-center w-6 h-6 me-2 text-xs border rounded-full shrink-0 step-circle">1</span>
                    <span class="hidden sm:inline-flex sm:ms-1">Tutor Info</span>
                    <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                    </svg>
                </li>
                <li class="flex items-center flex-1 justify-center step-indicator" data-step="4">
                    <span class="flex items-center justify-center w-6 h-6 me-2 text-xs border rounded-full shrink-0 step-circle">2</span>
                    <span class="hidden sm:inline-flex sm:ms-1">Education Background</span>
                    <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                    </svg>
                </li>
            </ol>

            <!-- Modal Body -->
            <form id="tutorFormEdit">
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <!-- Step 1 -->
                    <div class="step-content-edit" data-step="3">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                            <!-- First Name -->
                            <div>
                                <label for="first_name_edit" class="block mb-2 text-sm font-medium text-gray-900">First Name</label>
                                <input type="text" id="first_name_edit" name="first_name_edit" placeholder="Ali" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                            <!-- Last Name -->
                            <div>
                                <label for="last_name_edit" class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                                <input type="text" id="last_name_edit" name="last_name_edit" placeholder="Ahmad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                            <!-- Username -->
                            <div>
                                <label for="username_edit" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                                <input type="text" id="username_edit" name="username_edit" placeholder="Ustaz Jazmy" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email_edit" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                <input type="email_edit" id="email_edit" name="email_edit" placeholder="jazmy@gmail.com" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                            <!-- IC Number -->
                            <div>
                                <label for="ic_number_edit" class="block mb-2 text-sm font-medium text-gray-900">IC Number</label>
                                <input type="text" id="ic_number_edit" name="ic_number_edit" placeholder="990101-14-5678" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                            <!-- Age -->
                            <div>
                                <label for="age_edit" class="block mb-2 text-sm font-medium text-gray-900">Age</label>
                                <input type="number" id="age_edit" name="age_edit" placeholder="15" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                            <!-- Birth Date -->
                            <div>
                                <label for="birth_date_edit" class="block mb-2 text-sm font-medium text-gray-900">Birth Date</label>
                                <input type="date" id="birth_date_edit" name="birth_date_edit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>

                            <!-- Gender -->
                            <div>
                                <label for="gender_edit" class="block mb-2 text-sm font-medium text-gray-900">Gender</label>
                                <select id="gender_edit" name="gender_edit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <!-- Role -->
                            <div>
                                <label for="role_edit" class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                                <select id="role_edit" name="role_edit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                    <option value="">Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="tutor">Tutor</option>
                                </select>
                            </div>

                            <!-- Status -->
                            <div>
                                <label for="status_edit" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                                <select id="status_edit" name="status_edit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                    <option value="">Select Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="mt-6">
                            <label for="address_edit" class="block mb-2 text-sm font-medium text-gray-900">Address</label>
                            <textarea id="address_edit" name="address_edit" rows="3" placeholder="Enter full address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required></textarea>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="step-content-edit hidden" data-step="4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="university_edit" class="block mb-2 text-sm font-medium text-gray-900">University</label>
                                <select id="university_edit" name="university_edit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                    <option value="">Select University</option>
                                    <option value="Universiti Malaya">Universiti Malaya</option>
                                    <option value="Universiti Kebangsaan Malaysia">Universiti Kebangsaan Malaysia</option>
                                </select>
                            </div>
                            <div>
                                <label for="programme_edit" class="block mb-2 text-sm font-medium text-gray-900">Programme</label>
                                <input type="text" id="programme_edit" name="programme_edit" placeholder="Bachelor of Quran Sunnah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>
                            <div>
                                <label for="grade_edit" class="block mb-2 text-sm font-medium text-gray-900">Grade</label>
                                <input type="text" id="grade_edit" name="grade_edit" placeholder="4.0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>
                            <div>
                                <label for="resume_edit" class="block mb-2 text-sm font-medium text-gray-900">Upload Resume (PDF)</label>
                                <input type="file" id="resume_edit" name="resume_edit" accept="application/pdf" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button"
                        class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300"
                        data-modal-hide="editTutorModal">Cancel</button>

                    <div class="flex gap-2">
                        <button type="button" id="prevStepEdit"
                            class="hidden px-6 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300">Previous</button>
                        <button type="button" id="nextStepEdit"
                            class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-6 py-2.5 text-center">Next</button>
                        <button type="submit" id="submitFormEdit"
                            class="hidden text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-6 py-2.5 text-center">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Script for Step Navigation -->
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
            if (currentIndex < stepNums.length - 1) currentIndex++;
            update();
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

    <!-- Script for Step Navigation (Edit Modal) -->
   <script>
        (function(){
        const modal = document.getElementById('editTutorModal');
        if (!modal) return;

        const stepContents = Array.from(modal.querySelectorAll('.step-content-edit'));
        const stepNums = stepContents.map(s => parseInt(s.dataset.step, 10)).sort((a,b)=>a-b);
        let currentIndex = 0; // index dalam stepNums array (automatically picks smallest dataset-step)

        const prevBtn = modal.querySelector('#prevStepEdit');
        const nextBtn = modal.querySelector('#nextStepEdit');
        const submitBtn = modal.querySelector('#submitFormEdit');
        const indicators = Array.from(modal.querySelectorAll('.step-indicator'));

        const update = () => {
            const currentStep = stepNums[currentIndex];

            // show/hide step contents (scoped)
            stepContents.forEach(el => {
            el.classList.toggle('hidden', parseInt(el.dataset.step, 10) !== currentStep);
            });

            // update indicators (scoped to this modal only)
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
            if (currentIndex < stepNums.length - 1) currentIndex++;
            update();
        });

        prevBtn.addEventListener('click', () => {
            if (currentIndex > 0) currentIndex--;
            update();
        });

        // init
        update();

        // reset when edit modal is opened
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


</x-admin-layout>