<x-admin-layout :title="'Tutor'">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white p-4 rounded-xl shadow flex items-center gap-3">
            <div class="p-3 rounded-full bg-blue-100 text-blue-600">👨‍🏫</div>
            <div>
                <p class="text-sm text-gray-500">Total Active Teachers</p>
                <h3 class="text-2xl font-bold">8</h3>
            </div>
        </div>
        <div class="bg-white p-4 rounded-xl shadow flex items-center gap-3">
            <div class="p-3 rounded-full bg-purple-100 text-purple-600">📘</div>
            <div>
                <p class="text-sm text-gray-500">Total Inactive Teachers</p>
                <h3 class="text-2xl font-bold">2</h3>
            </div>
        </div>
        <div class="bg-white p-4 rounded-xl shadow flex items-center gap-3">
            <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">📊</div>
            <div>
                <p class="text-sm text-gray-500">Total Teachers</p>
                <h3 class="text-2xl font-bold">10</h3>
            </div>
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
                <option value="">Status</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">Teacher ID</th>
                        <th class="px-4 py-3">First Name</th>
                        <th class="px-4 py-3">Phone Number</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Assigned Classes</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-3">TC001</td>
                        <td class="px-4 py-3 font-medium text-gray-900">Wade Warren</td>
                        <td class="px-4 py-3">0123456789</td>
                        <td class="px-4 py-3">abc123@gmail.com</td>
                        <td class="px-4 py-3">5 Classes</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">Active</span>
                        </td>
                        <td class="px-4 py-3 flex gap-2 justify-center">
                            <button type="button" class="px-3 py-1 text-xs rounded bg-gray-200 hover:bg-gray-300" data-modal-target="editTutorModal" data-modal-toggle="editTutorModal">Edit</button>
                            <a href="{{ route('admin.tutor.report') }}" class="px-3 py-1 text-xs rounded bg-yellow-400 text-white hover:bg-yellow-500">Report</a>
                            <button class="px-3 py-1 text-xs rounded bg-red-500 text-white hover:bg-red-600">Delete</button>
                        </td>
                    </tr>

                    <tr class="border-b">
                        <td class="px-4 py-3">TC002</td>
                        <td class="px-4 py-3 font-medium text-gray-900">Esther Howard</td>
                        <td class="px-4 py-3">0123456789</td>
                        <td class="px-4 py-3">abc123@gmail.com</td>
                        <td class="px-4 py-3">5 Classes</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-600">Inactive</span>
                        </td>
                        <td class="px-4 py-3 flex gap-2 justify-center">
                            <button type="button" class="px-3 py-1 text-xs rounded bg-gray-200 hover:bg-gray-300" data-modal-target="editTutorModal" data-modal-toggle="editTutorModal">Edit</button>
                            <a href="{{ route('admin.tutor.report') }}" class="px-3 py-1 text-xs rounded bg-yellow-400 text-white hover:bg-yellow-500">Report</a>
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