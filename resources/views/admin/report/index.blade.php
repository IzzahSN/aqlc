<x-admin-layout :title="'Report'">

    <!-- Summary Cards + Chart -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">

        {{-- summary cards --}}
        <div class="lg:col-span-1 space-y-4">
            <div class="bg-white p-4 rounded-sm shadow flex items-center gap-3 border-l-lime-600 border-l-6 justify-between">
                <div>
                    <p class="text-sm font-semibold text-lime-600 uppercase">Total Finished Iqra'</p>
                    <h3 class="text-2xl font-bold text-gray-500">12</h3>
                </div>            
                <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-square-rounded-check w-8 h-8 text-gray-300"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2c-.218 0 -.432 .002 -.642 .005l-.616 .017l-.299 .013l-.579 .034l-.553 .046c-4.785 .464 -6.732 2.411 -7.196 7.196l-.046 .553l-.034 .579c-.005 .098 -.01 .198 -.013 .299l-.017 .616l-.004 .318l-.001 .324c0 .218 .002 .432 .005 .642l.017 .616l.013 .299l.034 .579l.046 .553c.464 4.785 2.411 6.732 7.196 7.196l.553 .046l.579 .034c.098 .005 .198 .01 .299 .013l.616 .017l.642 .005l.642 -.005l.616 -.017l.299 -.013l.579 -.034l.553 -.046c4.785 -.464 6.732 -2.411 7.196 -7.196l.046 -.553l.034 -.579c.005 -.098 .01 -.198 .013 -.299l.017 -.616l.005 -.642l-.005 -.642l-.017 -.616l-.013 -.299l-.034 -.579l-.046 -.553c-.464 -4.785 -2.411 -6.732 -7.196 -7.196l-.553 -.046l-.579 -.034a28.058 28.058 0 0 0 -.299 -.013l-.616 -.017l-.318 -.004l-.324 -.001zm2.293 7.293a1 1 0 0 1 1.497 1.32l-.083 .094l-4 4a1 1 0 0 1 -1.32 .083l-.094 -.083l-2 -2a1 1 0 0 1 1.32 -1.497l.094 .083l1.293 1.292l3.293 -3.292z" fill="currentColor" stroke-width="0" /></svg>
            </div>

           <div class="bg-white p-4 rounded-sm shadow flex items-center gap-3 border-l-amber-400 border-l-6 justify-between">
                <div>
                    <p class="text-sm font-semibold text-amber-600 uppercase">Total Finished Quran</p>
                    <h3 class="text-2xl font-bold text-gray-500">12</h3>
                </div>
                <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-square-rounded-x w-8 h-8 text-gray-300"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2l.324 .001l.318 .004l.616 .017l.299 .013l.579 .034l.553 .046c4.785 .464 6.732 2.411 7.196 7.196l.046 .553l.034 .579c.005 .098 .01 .198 .013 .299l.017 .616l.005 .642l-.005 .642l-.017 .616l-.013 .299l-.034 .579l-.046 .553c-.464 4.785 -2.411 6.732 -7.196 7.196l-.553 .046l-.579 .034c-.098 .005 -.198 .01 -.299 .013l-.616 .017l-.642 .005l-.642 -.005l-.616 -.017l-.299 -.013l-.579 -.034l-.553 -.046c-4.785 -.464 -6.732 -2.411 -7.196 -7.196l-.046 -.553l-.034 -.579a28.058 28.058 0 0 1 -.013 -.299l-.017 -.616c-.003 -.21 -.005 -.424 -.005 -.642l.001 -.324l.004 -.318l.017 -.616l.013 -.299l.034 -.579l.046 -.553c.464 -4.785 2.411 -6.732 7.196 -7.196l.553 -.046l.579 -.034c.098 -.005 .198 -.01 .299 -.013l.616 -.017c.21 -.003 .424 -.005 .642 -.005zm-1.489 7.14a1 1 0 0 0 -1.218 1.567l1.292 1.293l-1.292 1.293l-.083 .094a1 1 0 0 0 1.497 1.32l1.293 -1.292l1.293 1.292l.094 .083a1 1 0 0 0 1.32 -1.497l-1.292 -1.293l1.292 -1.293l.083 -.094a1 1 0 0 0 -1.497 -1.32l-1.293 1.292l-1.293 -1.292l-.094 -.083z" fill="currentColor" stroke-width="0" /></svg>   
            </div>
            <div class="bg-white p-4 rounded-sm shadow flex items-center gap-3 border-l-cyan-600 border-l-6 justify-between">
                <div>
                    <p class="text-sm font-semibold text-cyan-600 uppercase">Total Students</p>
                    <h3 class="text-2xl font-bold text-gray-500">13</h3>                
                </div>
                <svg class="w-10 h-10 text-gray-300 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M3 4.92857C3 3.90506 3.80497 3 4.88889 3H19.1111C20.195 3 21 3.90506 21 4.92857V13h-3v-2c0-.5523-.4477-1-1-1h-4c-.5523 0-1 .4477-1 1v2H3V4.92857ZM3 15v1.0714C3 17.0949 3.80497 18 4.88889 18h3.47608L7.2318 19.3598c-.35356.4243-.29624 1.0548.12804 1.4084.42428.3536 1.05484.2962 1.40841-.128L10.9684 18h2.0632l2.2002 2.6402c.3535.4242.9841.4816 1.4084.128.4242-.3536.4816-.9841.128-1.4084L15.635 18h3.4761C20.195 18 21 17.0949 21 16.0714V15H3Z"/>
                    <path d="M16 12v1h-2v-1h2Z"/>
                </svg>
            </div>
        </div>

        {{-- chart --}}
        <div class="lg:col-span-2 bg-white rounded-sm shadow p-4 flex flex-col border-l-rose-600 border-l-6">
            <!-- Header -->
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-700">Student Progress Report</h2>
                <div>
                    <!-- Styled Dropdown -->
                    <div class="relative inline-block w-full sm:w-48">
                        <select
                            class="block w-full rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm text-gray-700 shadow-sm transition ease-in-out duration-150">
                            <option value="quran">Quran</option>
                            <option value="iqra">Iqra'</option>
                        </select>
                    </div>

                </div>
            </div>

            <!-- Chart -->
            <div class="relative w-full h-50 flex items-center justify-center">
                <canvas id="progressChart"></canvas>
            </div>
        </div>

        <!-- Chart.js CDN -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Generate labels from 1 → 30
            const labels = Array.from({
                length: 30
            }, (_, i) => i + 1);

            // Example random data for 30 days
            const data = labels.map(() => Math.floor(Math.random() * 60) + 20);

            const ctx = document.getElementById('progressChart').getContext('2d');
            const progressChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Progress',
                        data: data,
                        backgroundColor: '#fc8181 ', // Tailwind blue-500
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            ticks: {
                                autoSkip: false, // biar semua label keluar
                                maxRotation: 0, // elak tulisan senget
                                minRotation: 0
                            }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 20
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        </script>
    </div>

    <!-- Report List -->
    <div class="bg-white p-6 rounded-xl shadow">
        <!-- Header -->
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg font-semibold">List of Report</h2>
                <p class="text-sm text-gray-500">Manage your report: search, filter and update.</p>
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
            <select id="filterDay" class="border rounded-lg px-3 py-2 text-sm w-full sm:w-auto">
                <option value="">All Days</option>
                <option value="monday">Monday</option>
                <option value="tuesday">Tuesday</option>
                <option value="wednesday">Wednesday</option>
                <option value="thursday">Thursday</option>
                <option value="friday">Friday</option>
                <option value="saturday">Saturday</option>
                <option value="sunday">Sunday</option>
            </select>
            <select id="filterRoom" class="border rounded-lg px-3 py-2 text-sm w-full sm:w-auto">
                <option value="">All Rooms</option>
                <option value="Kelas 1">Kelas 1</option>
                <option value="Kelas 2">Kelas 2</option>
                <option value="Kelas 3">Kelas 3</option>
                <option value="Kelas 4">Kelas 4</option>
                <option value="Bilik 1">Bilik 1</option>
                <option value="Bilik 2">Bilik 2</option>
            </select>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table id="reportTable" class="min-w-max text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Class Name</th>
                        <th class="px-4 py-3">Package Type</th>
                        <th class="px-4 py-3">Day</th>
                        <th class="px-4 py-3">Room</th>
                        <th class="px-4 py-3">Tutor Name</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="reportBody">
                    @foreach ($schedules as $schedule)                        
                    <tr class="border-b">
                        <td class="px-4 py-3 row-index"></td>
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $schedule->class->class_name }}</td>
                        <td class="px-4 py-3">{{ ucfirst($schedule->class->package->package_type) }}</td>
                        <td class="px-4 py-3">{{ $schedule->class->day }}</td>
                        <td class="px-4 py-3">{{ $schedule->class->room }}</td>
                        {{-- if relief null display $schedule->class->tutor->username, if ada value $schedule->relief->tutor->username--}}
                        <td class="px-4 py-3">
                            {{ $schedule->reliefTutor ? $schedule->reliefTutor->username : $schedule->class->tutor->username }}
                        </td>
                        <td class="px-4 py-3">{{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }}</td>
                        <td class="px-4 py-3 flex gap-2 justify-center">
                            <a href="{{ route('admin.grade.index') }}" class="px-3 py-1 text-xs rounded bg-yellow-400 text-white hover:bg-yellow-500">Grade</a>
                            <a href="{{ route('admin.lesson-plan.index') }}" class="px-3 py-1 text-xs rounded bg-green-500 text-white hover:bg-green-600">Lesson Plan</a>
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
            const filterDay = document.getElementById("filterDay");
            const filterRoom = document.getElementById("filterRoom");
            const tbody = document.getElementById("reportBody");
            const rows = Array.from(tbody.getElementsByTagName("tr"));
            const noRecord = document.getElementById("noRecord");
            const pagination = document.getElementById("pagination");
            const entriesInfo = document.getElementById("entriesInfo");

            let currentPage = 1;
            const rowsPerPage = 5;

            function renderTable() {
                const searchValue = searchInput.value.toLowerCase();
                const dayValue = filterDay.value.toLowerCase();
                const roomValue = filterRoom.value.toLowerCase();

                let filteredRows = rows.filter(row => {
                    const name = row.cells[1].textContent.toLowerCase();
                    const id = row.cells[0].textContent.toLowerCase();
                    const day = row.cells[3].textContent.toLowerCase(); // 👈 ambil day
                    const room = row.cells[4].textContent.toLowerCase(); // 👈 ambil room

                    const matchSearch = name.includes(searchValue) || id.includes(searchValue);
                    const matchDay = dayValue === "" || day.includes(dayValue);
                    const matchRoom = roomValue === "" || room.includes(roomValue);
                    return matchSearch && matchDay && matchRoom;
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
            filterDay.addEventListener("change", () => { currentPage = 1; renderTable(); });
            filterRoom.addEventListener("change", () => { currentPage = 1; renderTable(); });

            renderTable();
        </script>
    </div>

</x-admin-layout>