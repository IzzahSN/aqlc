<x-guardian-layout :title="'Report'">
    <!-- Header with Title (left) and Breadcrumb (right) -->
    <div class="flex items-center justify-between mb-4">
        <!-- Left: Page Title -->
        <div class="flex items-center gap-3">
            <h2 class="text-xl font-medium text-gray-800">Grade Report: </h2>
            <select
                class="border border-gray-300 rounded-lg px-3 py-2 text-sm shadow-sm transition w-full sm:w-auto">
                <option value="Muhammad Najmi Bin Kamal">Muhammad Najmi Bin Kamal</option>
                <option value="Muhammad Naim Bin Kamal">Muhammad Naim Bin Kamal</option>
            </select>
        </div>

        <!-- Right: Breadcrumb -->
        <button data-modal-target="editStudentModal" data-modal-toggle="editStudentModal"
            class="px-4 py-2 text-sm rounded-lg bg-yellow-500 text-white hover:bg-yellow-600">
            Edit Student
        </button>
    </div>

    <!-- Report -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <!-- Student Portfolio -->
        <div class="col-span-1 bg-green-900 text-white rounded-xl shadow p-6 space-y-6">
            <div class="flex flex-col items-center text-center">
                <img src="https://randomuser.me/api/portraits/men/32.jpg"
                    alt="Student Photo"
                    class="w-28 h-28 rounded-full border-4 border-white shadow">
                <h2 class="text-lg font-semibold mt-4">Ali Bin Ghazali</h2>
                <p class="text-sm opacity-80">Student Portfolio</p>
            </div>

            <div class="space-y-3 text-sm">
                <p class="flex items-center gap-2"><i class="fas fa-user"></i> 16 years old</p>
                <p class="flex items-center gap-2"><i class="fas fa-id-card"></i> 09121301897</p>
                <p class="flex items-center gap-2"><i class="fas fa-mars"></i> Male</p>
                <p class="flex items-center gap-2"><i class="fas fa-calendar"></i> 12 December 2009</p>
                <p class="flex items-center gap-2"><i class="fas fa-home"></i> No. 131, Jalan Cerdik 2, Bandar Universiti, 43000 Kajang</p>
                <p class="flex items-center gap-2"><i class="fas fa-building"></i> PC003 – Al-Falah Group</p>
                <p class="flex items-center gap-2"><i class="fas fa-clock"></i> Mon-20-K1, Tue-20-K1, Wed-20-K1</p>
            </div>

            <!-- Guardian -->
            <div class="pt-4 border-t border-green-700">
                <h4 class="text-yellow-300 font-medium mb-2">Guardian Details</h4>
                <p class="flex items-center text-sm gap-2"><i class="fas fa-user-shield"></i> Ghazali Bin Razali</p>
                <p class="flex items-center text-sm gap-2"><i class="fas fa-phone"></i> 601234567891</p>
                <p class="flex items-center text-sm gap-2"><i class="fas fa-envelope"></i> Father</p>
            </div>
        </div>

        <!-- Right Section -->
        <div class="col-span-3 space-y-6">

            <!-- Report Progress -->
            <div class="bg-white rounded-xl shadow p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Report Progress</h3>
                <div class="flex items-center space-x-6 overflow-x-auto">
                    <!-- Progress Circles -->
                    <div class="flex flex-col items-center">
                        <div class="relative w-20 h-20">
                            <svg class="w-full h-full">
                                <circle class="text-gray-200" stroke-width="6" stroke="currentColor" fill="transparent" r="30" cx="40" cy="40" />
                                <circle class="text-yellow-400" stroke-width="6" stroke-dasharray="188" stroke-dashoffset="0" stroke-linecap="round" stroke="currentColor" fill="transparent" r="30" cx="40" cy="40" />
                            </svg>
                            <span class="absolute inset-0 flex items-center justify-center font-semibold text-sm">100%</span>
                        </div>
                        <span class="mt-2 text-sm font-medium">Iqra 1</span>
                    </div>

                    <div class="flex flex-col items-center">
                        <div class="relative w-20 h-20">
                            <svg class="w-full h-full">
                                <circle class="text-gray-200" stroke-width="6" stroke="currentColor" fill="transparent" r="30" cx="40" cy="40" />
                                <circle class="text-pink-500" stroke-width="6" stroke-dasharray="188" stroke-dashoffset="47" stroke-linecap="round" stroke="currentColor" fill="transparent" r="30" cx="40" cy="40" />
                            </svg>
                            <span class="absolute inset-0 flex items-center justify-center font-semibold text-sm">75%</span>
                        </div>
                        <span class="mt-2 text-sm font-medium">Juz 30</span>
                    </div>

                    <div class="flex flex-col items-center">
                        <div class="relative w-20 h-20">
                            <svg class="w-full h-full">
                                <circle class="text-gray-200" stroke-width="6" stroke="currentColor" fill="transparent" r="30" cx="40" cy="40" />
                                <circle class="text-blue-500" stroke-width="6" stroke-dasharray="188" stroke-dashoffset="66" stroke-linecap="round" stroke="currentColor" fill="transparent" r="30" cx="40" cy="40" />
                            </svg>
                            <span class="absolute inset-0 flex items-center justify-center font-semibold text-sm">65%</span>
                        </div>
                        <span class="mt-2 text-sm font-medium">Juz 1</span>
                    </div>

                    <div class="flex flex-col items-center">
                        <div class="relative w-20 h-20">
                            <svg class="w-full h-full">
                                <circle class="text-gray-200" stroke-width="6" stroke="currentColor" fill="transparent" r="30" cx="40" cy="40" />
                                <circle class="text-green-500" stroke-width="6" stroke-dasharray="188" stroke-dashoffset="75" stroke-linecap="round" stroke="currentColor" fill="transparent" r="30" cx="40" cy="40" />
                            </svg>
                            <span class="absolute inset-0 flex items-center justify-center font-semibold text-sm">60%</span>
                        </div>
                        <span class="mt-2 text-sm font-medium">Juz 2</span>
                    </div>

                    <div class="flex flex-col items-center">
                        <div class="relative w-20 h-20">
                            <svg class="w-full h-full">
                                <circle class="text-gray-200" stroke-width="6" stroke="currentColor" fill="transparent" r="30" cx="40" cy="40" />
                                <circle class="text-purple-500" stroke-width="6" stroke-dasharray="188" stroke-dashoffset="122" stroke-linecap="round" stroke="currentColor" fill="transparent" r="30" cx="40" cy="40" />
                            </svg>
                            <span class="absolute inset-0 flex items-center justify-center font-semibold text-sm">35%</span>
                        </div>
                        <span class="mt-2 text-sm font-medium">Juz 3</span>
                    </div>
                </div>
            </div>

            <!-- Recitation Table -->
            <div class="bg-white rounded-xl shadow p-6">
                <!-- Header -->
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h2 class="text-lg font-semibold">List of Recitation Report</h2>
                        <p class="text-sm text-gray-500">Manage your report: search or filter.</p>
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
                    <!-- Filter -->
                    <select class="border rounded-lg px-3 py-2 text-sm w-full sm:w-auto">
                        <option value="">Grade</option>
                        <option value="Mumtaz">Mumtaz</option>
                        <option value="Jayyid Jiddan">Jayyid Jiddan</option>
                        <option value="Jayyid">Jayyid</option>
                        <option value="Maqbul">Maqbul</option>
                        <option value="Rasib">Rasib</option>
                    </select>
                    <select class="border rounded-lg px-3 py-2 text-sm w-full sm:w-auto">
                        <option value="">Recitation</option>
                        @for ($i = 1; $i <= 6; $i++)
                            <option value="Iqra {{ $i }}">Iqra {{ $i }}</option>
                            @endfor
                            @for ($j = 1; $j <= 30; $j++)
                                <option value="Juz {{ $j }}">Juz {{ $j }}</option>
                                @endfor
                    </select>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-600">
                        <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
                            <tr>
                                <th class="px-4 py-3">Recitation</th>
                                <th class="px-4 py-2">Page</th>
                                <th class="px-4 py-2">Grade</th>
                                <th class="px-4 py-2">Class Name</th>
                                <th class="px-4 py-2">Tutor</th>
                                <th class="px-4 py-2">Recitation Date</th>
                                <th class="px-4 py-2">Remark</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t">
                                <td class="px-4 py-2">Juz 30</td>
                                <td class="px-4 py-2">582</td>
                                <td class="px-4 py-2">Mumtaz</td>
                                <td class="px-4 py-2">Mon-20-K1</td>
                                <td class="px-4 py-2">Ustaz Farhan</td>
                                <td class="px-4 py-2">18/09/2016</td>
                                <td class="px-4 py-2">
                                    <button class="px-3 py-1 bg-yellow-500 text-white text-xs rounded-lg hover:bg-yellow-600">Notes</button>
                                </td>
                            </tr>
                            <tr class="border-t">
                                <td class="px-4 py-2">Juz 30</td>
                                <td class="px-4 py-2">583</td>
                                <td class="px-4 py-2">Mumtaz</td>
                                <td class="px-4 py-2">Tue-21-K1</td>
                                <td class="px-4 py-2">Ustazah Aira</td>
                                <td class="px-4 py-2">12/06/2020</td>
                                <td class="px-4 py-2">
                                    <button class="px-3 py-1 bg-yellow-500 text-white text-xs rounded-lg hover:bg-yellow-600">Notes</button>
                                </td>
                            </tr>
                            <!-- Repeat rows -->
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="flex justify-between items-center mt-4 text-sm">
                    <div>
                        Result per page:
                        <select class="ml-2 border rounded px-2 py-1">
                            <option>10</option>
                            <option>20</option>
                            <option>50</option>
                        </select>
                    </div>
                    <div class="flex space-x-1">
                        <button class="px-2 py-1 border rounded">‹ Back</button>
                        <button class="px-3 py-1 border rounded">1</button>
                        <button class="px-3 py-1 border rounded bg-green-700 text-white">2</button>
                        <button class="px-3 py-1 border rounded">3</button>
                        <button class="px-3 py-1 border rounded">4</button>
                        <button class="px-2 py-1 border rounded">Next ›</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Student Modal -->
    <div id="editStudentModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative w-full max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-lg max-h-[85vh] overflow-y-auto">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <div class="w-6"></div>
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Edit Student</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="editStudentModal">✕</button>
            </div>

            <!-- Modal Body -->
            <form id="editStudentForm">
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
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
                    <!-- Address (full width) -->
                    <div class="mt-6">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Address</label>
                        <textarea id="address" name="address" rows="3" placeholder="Enter full address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required></textarea>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button" class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="editStudentModal">Cancel</button>

                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-6 py-2.5 text-center">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

</x-guardian-layout>