<x-admin-layout :title="'Schedule'">
    <!-- Header with Title (left) and Breadcrumb (right) -->
    <div class="flex items-center justify-between mb-4">
        <!-- Left: Page Title -->
        <h2 class="text-xl font-medium text-gray-800">Attendance Report</h2>

        <!-- Right: Breadcrumb -->
        <nav class="text-sm text-gray-500">
            <ol class="flex space-x-2">
                <li><a href="{{ route('admin.schedule') }}" class="hover:text-green-600">Schedule</a></li>
                <li>/</li>
                <li>Attendance</li>
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
            <div>
                <!-- if student ganti kelas -->
                <button type="button" class="px-4 py-2 text-sm rounded-lg bg-yellow-400 text-white hover:bg-yellow-500" data-modal-target="addStudentModal" data-modal-toggle="addStudentModal">+ Add Student</button>
                <button class="px-4 py-2 text-sm rounded-lg bg-green-600 text-white hover:bg-green-700">Allocate Attendance</button>
            </div>
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
                        <th class="px-4 py-3">Remark</th>
                        <th class="px-4 py-3 text-center">Attendance</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-3">1</td>
                        <td class="px-4 py-3 font-medium text-gray-900">Muhammad Ikhwan Bin Idris</td>
                        <td class="px-4 py-3">
                            <input type="text" placeholder="Enter remark..."
                                class="w-full px-2 py-1 text-sm border rounded-lg focus:ring focus:ring-green-200 focus:border-green-500" />
                        </td>
                        <td class="px-4 py-3 text-center">
                            <input type="checkbox" class="w-5 h-5 text-green-600 border-gray-300 rounded focus:ring-green-500">
                        </td>
                        <td class="px-4 py-3 flex justify-center">
                            <button class="px-3 py-1 text-xs rounded bg-red-500 text-white hover:bg-red-600" disabled>Delete</button>
                        </td>
                    </tr>

                    <tr class="border-b">
                        <td class="px-4 py-3">2</td>
                        <td class="px-4 py-3 font-medium text-gray-900">Nur Hanna Binti Eijaz</td>
                        <td class="px-4 py-3">
                            <input type="text" placeholder="Enter remark..." class="w-full px-2 py-1 text-sm border rounded-lg focus:ring focus:ring-green-200 focus:border-green-500" />
                        </td>
                        <td class="px-4 py-3 text-center">
                            <input type="checkbox" checked class="w-5 h-5 text-green-600 border-gray-300 rounded focus:ring-green-500">
                        </td>
                        <td class="px-4 py-3 flex justify-center">
                            <button class="px-3 py-1 text-xs rounded bg-red-500 text-white hover:bg-red-600" disabled>Delete</button>
                        </td>
                    </tr>

                    <tr class="border-b">
                        <td class="px-4 py-3">3</td>
                        <td class="px-4 py-3 font-medium text-gray-900">Nur Qistiona Binti Rahim</td>
                        <td class="px-4 py-3">
                            <input type="text" placeholder="Enter remark..." class="w-full px-2 py-1 text-sm border rounded-lg focus:ring focus:ring-green-200 focus:border-green-500" />
                        </td>
                        <td class="px-4 py-3 text-center">
                            <input type="checkbox" class="w-5 h-5 text-green-600 border-gray-300 rounded focus:ring-green-500">
                        </td>
                        <td class="px-4 py-3 flex justify-center">
                            <button class="px-3 py-1 text-xs rounded bg-red-500 text-white hover:bg-red-600">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


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

    <!-- Add Student Modal -->
    <div id="addStudentModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative w-full max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <div class="w-6"></div>
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Add Student</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="addStudentModal">✕</button>
            </div>

            <!-- Modal Body -->
            <form id="studentForm">
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <div>
                        <label for="student" class="block mb-2 text-sm font-medium text-gray-900">Class Joined</label>
                        <select id="student" name="student[]" multiple class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full">
                            <option value="1">Muhammad Bin Hareez</option>
                            <option value="2">Irfan Jaafar Bin Khamis</option>
                            <option value="3">Ali Jais Bin Hazwan</option>
                        </select>
                    </div>

                    <script>
                        new TomSelect("#student", {
                            plugins: ['remove_button'],
                            maxItems: 1,
                            create: false,
                            persist: false,
                            render: {
                                item: function(data, escape) {
                                    return `<div class="bg-green-100 text-green-800 text-sm font-medium mr-1 mb-1 px-2.5 py-1 rounded-md flex items-center">${escape(data.text)}</div>`;
                                },
                                option: function(data, escape) {
                                    return `<div class="px-3 py-2 text-sm text-gray-900 hover:bg-green-50 cursor-pointer">${escape(data.text)}</div>`;
                                }
                            }
                        });
                    </script>
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button" class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="addStudentModal">Cancel</button>

                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-6 py-2.5 text-center">Submit</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>