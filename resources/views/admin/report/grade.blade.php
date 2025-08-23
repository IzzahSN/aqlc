<x-admin-layout :title="'Schedule'">
    <!-- Header with Title (left) and Breadcrumb (right) -->
    <div class="flex items-center justify-between mb-4">
        <!-- Left: Page Title -->
        <h2 class="text-xl font-medium text-gray-800">Grade Report</h2>

        <!-- Right: Breadcrumb -->
        <nav class="text-sm text-gray-500">
            <ol class="flex space-x-2">
                <li><a href="{{ route('admin.report') }}" class="hover:text-green-600">Report</a></li>
                <li>/</li>
                <li>Grade</li>
            </ol>
        </nav>
    </div>

    <!-- Attendance Report List -->
    <div class="bg-white p-6 rounded-xl shadow">
        <!-- Header -->
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg font-semibold">List of Report</h2>
                <p class="text-sm text-gray-500">Manage your report: search, filter and update.</p>
            </div>
            <button class="px-4 py-2 text-sm rounded-lg bg-green-600 text-white hover:bg-green-700">Allocate Grade</button>
        </div>

        <!-- Search + Filter -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-4">
            <!-- Search -->
            <div class="relative w-full sm:w-full">
                <input type="text" placeholder="Search by name or ID"
                    class="w-full pl-10 pr-4 py-2 text-sm border rounded-lg focus:ring focus:ring-green-200" />
                <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
                </svg>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Student Name</th>
                        <th class="px-4 py-3">Recitation</th>
                        <th class="px-4 py-3">Page</th>
                        <th class="px-4 py-3">Remark</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody id="studentTable">
                    <!-- Student Row -->
                    <tr class="border-b" data-student="1">
                        <td class="px-4 py-3">1</td>
                        <td class="px-4 py-3 font-medium text-gray-900">Muhammad Ikhwan Bin Idris</td>
                        <td class="px-4 py-3">
                            <select class="border rounded-lg px-3 py-1 text-sm w-full sm:w-auto">
                                <option value="">Select Recitation</option>
                                @for ($i = 1; $i <= 6; $i++)
                                    <option value="Iqra {{ $i }}">Iqra {{ $i }}</option>
                                    @endfor
                                    @for ($j = 1; $j <= 30; $j++)
                                        <option value="Juz {{ $j }}">Juz {{ $j }}</option>
                                        @endfor
                            </select>

                        <td class="px-4 py-3 text-center">
                            <input type="number" placeholder="Page" class="w-full px-2 py-1 text-sm border rounded-lg focus:ring focus:ring-green-200 focus:border-green-500" />
                        </td>
                        <td class="px-4 py-3">
                            <input type="text" placeholder="Remark..." class="w-full px-2 py-1 text-sm border rounded-lg focus:ring focus:ring-green-200 focus:border-green-500" />
                        </td>
                        <td class="px-4 py-3 flex justify-center">
                            <button onclick="addSubRow(this)" class="px-3 py-1 text-xs rounded bg-yellow-500 text-white hover:bg-yellow-600">+</button>
                        </td>
                    </tr>

                    <tr class="border-b" data-student="2">
                        <td class="px-4 py-3">2</td>
                        <td class="px-4 py-3 font-medium text-gray-900">Muhammad Ammar Bin Shahizzul</td>
                        <td class="px-4 py-3">
                            <select class="border rounded-lg px-3 py-1 text-sm w-full sm:w-auto">
                                <option value="">Select Recitation</option>
                                @for ($i = 1; $i <= 6; $i++)
                                    <option value="Iqra {{ $i }}">Iqra {{ $i }}</option>
                                    @endfor
                                    @for ($j = 1; $j <= 30; $j++)
                                        <option value="Juz {{ $j }}">Juz {{ $j }}</option>
                                        @endfor
                            </select>

                        </td>
                        <td class="px-4 py-3 text-center">
                            <input type="number" placeholder="Page" class="w-full px-2 py-1 text-sm border rounded-lg focus:ring focus:ring-green-200 focus:border-green-500" />
                        </td>
                        <td class="px-4 py-3">
                            <input type="text" placeholder="Remark..." class="w-full px-2 py-1 text-sm border rounded-lg focus:ring focus:ring-green-200 focus:border-green-500" />
                        </td>
                        <td class="px-4 py-3 flex justify-center">
                            <button onclick="addSubRow(this)" class="px-3 py-1 text-xs rounded bg-yellow-500 text-white hover:bg-yellow-600">+</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <script>
            function addSubRow(button) {
                const parentRow = button.closest("tr");
                const studentId = parentRow.dataset.student;
                const newRow = document.createElement("tr");
                newRow.classList.add("bg-gray-50");

                newRow.innerHTML = `
                <td></td>
                <td></td>
                <td class="px-4 py-3">
                    <select class="border rounded-lg px-3 py-1 text-sm w-full sm:w-auto">
                        <option value="">Select Recitation</option>
                        @for ($i = 1; $i <= 6; $i++)
                            <option value="Iqra {{ $i }}">Iqra {{ $i }}</option>
                        @endfor
                        @for ($j = 1; $j <= 30; $j++)
                            <option value="Juz {{ $j }}">Juz {{ $j }}</option>
                        @endfor
                    </select>
                </td>
                <td class="px-4 py-3 text-center">
                    <input type="number" placeholder="Page" class="w-full px-2 py-1 text-sm border rounded-lg focus:ring focus:ring-green-200 focus:border-green-500" />
                </td>
                <td class="px-4 py-3">
                    <input type="text" placeholder="Remark..." class="w-full px-2 py-1 text-sm border rounded-lg focus:ring focus:ring-green-200 focus:border-green-500" />
                </td>
                <td class="px-4 py-3 flex justify-center">
                    <button onclick="removeSubRow(this)" class="px-3 py-1 text-xs rounded bg-red-500 text-white hover:bg-red-600">-</button>
                </td>
                `;

                parentRow.insertAdjacentElement("afterend", newRow);
            }

            function removeSubRow(button) {
                const row = button.closest("tr");
                row.remove();
            }
        </script>

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
</x-admin-layout>