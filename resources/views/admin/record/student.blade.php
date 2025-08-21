<x-admin-layout :title="'Student'">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white p-4 rounded-xl shadow flex items-center gap-3">
            <div class="p-3 rounded-full bg-blue-100 text-blue-600">👨‍🏫</div>
            <div>
                <p class="text-sm text-gray-500">Total Active Students</p>
                <h3 class="text-2xl font-bold">8</h3>
            </div>
        </div>
        <div class="bg-white p-4 rounded-xl shadow flex items-center gap-3">
            <div class="p-3 rounded-full bg-purple-100 text-purple-600">📘</div>
            <div>
                <p class="text-sm text-gray-500">Total Inactive Students</p>
                <h3 class="text-2xl font-bold">2</h3>
            </div>
        </div>
        <div class="bg-white p-4 rounded-xl shadow flex items-center gap-3">
            <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">📊</div>
            <div>
                <p class="text-sm text-gray-500">Total Students</p>
                <h3 class="text-2xl font-bold">10</h3>
            </div>
        </div>
    </div>

    <!-- Students List -->
    <div class="bg-white p-6 rounded-xl shadow">
        <!-- Header -->
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg font-semibold">List of Students</h2>
                <p class="text-sm text-gray-500">Manage your students: add new, search, filter, edit, or delete.</p>
            </div>
            <button data-modal-target="addStudentModal" data-modal-toggle="addStudentModal"
                class="px-4 py-2 text-sm rounded-lg bg-green-600 text-white hover:bg-green-700">
                + Add New Student
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
                <option value="">Package</option>
                <option value="active">An-Nur Lite</option>
                <option value="inactive">An-Nur Plus</option>
            </select>
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
                        <th class="px-4 py-3">Student ID</th>
                        <th class="px-4 py-3">First Name</th>
                        <th class="px-4 py-3">Package Name</th>
                        <th class="px-4 py-3">Admission Date</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-3">ST001</td>
                        <td class="px-4 py-3 font-medium text-gray-900">Wade Warren</td>
                        <td class="px-4 py-3">An-Nur Lite</td>
                        <td class="px-4 py-3">15/08/2024</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">Active</span>
                        </td>
                        <td class="px-4 py-3 flex gap-2 justify-center">
                            <button class="px-3 py-1 text-xs rounded bg-gray-200 hover:bg-gray-300">Edit</button>
                            <a href="{{ route('admin.student.report') }}" class="px-3 py-1 text-xs rounded bg-yellow-400 text-white hover:bg-yellow-500">Report</a>
                            <button class="px-3 py-1 text-xs rounded bg-red-500 text-white hover:bg-red-600">Delete</button>
                        </td>
                    </tr>

                    <tr class="border-b">
                        <td class="px-4 py-3">ST002</td>
                        <td class="px-4 py-3 font-medium text-gray-900">Esther Howard</td>
                        <td class="px-4 py-3">An-Nur Plus</td>
                        <td class="px-4 py-3">10/07/2025</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-600">Inactive</span>
                        </td>
                        <td class="px-4 py-3 flex gap-2 justify-center">
                            <button class="px-3 py-1 text-xs rounded bg-gray-200 hover:bg-gray-300">Edit</button>
                            <a href="{{ route('admin.student.report') }}" class="px-3 py-1 text-xs rounded bg-yellow-400 text-white hover:bg-yellow-500">Report</a>
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

    <!-- Multi-step Add Student Modal -->
    <div id="addStudentModal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-black bg-opacity-50">
        <div class="relative w-full max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-lg max-h-[85vh] overflow-y-auto">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <div class="w-6"></div> <!-- placeholder supaya tajuk betul² center -->
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Add New Student</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="addStudentModal">✕</button>
            </div>

            <!-- Progress Indicator -->
            <ol class="flex items-center w-full p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white sm:text-base sm:p-4 sm:space-x-4 rtl:space-x-reverse">
                <li class="flex items-center flex-1 justify-center step-indicator active" data-step="1">
                    <span class="flex items-center justify-center w-6 h-6 me-2 text-xs border rounded-full shrink-0 step-circle">1</span>
                    <span class="hidden sm:inline-flex sm:ms-1">Student Info</span>
                    <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                    </svg>
                </li>
                <li class="flex items-center flex-1 justify-center step-indicator" data-step="2">
                    <span class="flex items-center justify-center w-6 h-6 me-2 text-xs border rounded-full shrink-0 step-circle">2</span>
                    <span class="hidden sm:inline-flex sm:ms-1">Package and Class</span>
                    <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                    </svg>
                </li>
                <li class="flex items-center flex-1 justify-center step-indicator" data-step="3">
                    <span class="flex items-center justify-center w-6 h-6 me-2 text-xs border rounded-full shrink-0 step-circle">3</span>
                    <span>Guardian Details</span>
                </li>
            </ol>

            <!-- Modal Body -->
            <form id="studentForm">
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
                        </div>

                        <!-- Address (full width) -->
                        <div class="mt-6">
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Address</label>
                            <textarea id="address" name="address" rows="3" placeholder="Enter full address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required></textarea>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="step-content hidden" data-step="2">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                            <div>
                                <label for="id" class="block mb-2 text-sm font-medium text-gray-900">Package Name</label>
                                <select id="id" name="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                    <option value="">Select Package</option>
                                    <option value="1">An-Nur Lite</option>
                                    <option value="2">An-Nur Plus</option>
                                </select>
                            </div>
                            <div>
                                <label for="type" class="block mb-2 text-sm font-medium text-gray-900">Package Type</label>
                                <input type="text" id="type" name="type" placeholder="group" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>
                            <div>
                                <label for="rate" class="block mb-2 text-sm font-medium text-gray-900">Package Rate (RM)</label>
                                <input type="number" id="rate" name="rate" placeholder="100" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>
                            <div>
                                <label for="unit" class="block mb-2 text-sm font-medium text-gray-900">Unit</label>
                                <input type="text" id="unit" name="unit" placeholder="Per month" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>
                            <div>
                                <label for="duration" class="block mb-2 text-sm font-medium text-gray-900">Duration Per Session</label>
                                <input type="text" id="duration" name="duration" placeholder="1 hour" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>
                            <div>
                                <label for="join" class="block mb-2 text-sm font-medium text-gray-900">Class Joined</label>
                                <input type="text" id="join" name="join" placeholder="Mon-2100-K1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>
                        </div>

                        <!-- Available Classes Table -->
                        <div class="mt-4">
                            <h5 class="font-semibold text-gray-800 mb-3">List of Available Classes</h5>
                            <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                                <table class="w-full text-sm text-left text-gray-700">
                                    <thead class="bg-gray-100 text-gray-600 uppercase text-xs font-semibold">
                                        <tr>
                                            <th class="px-4 py-3"><input type="checkbox"></th>
                                            <th class="px-4 py-3">Class Name</th>
                                            <th class="px-4 py-3">Room</th>
                                            <th class="px-4 py-3">Day</th>
                                            <th class="px-4 py-3">Start</th>
                                            <th class="px-4 py-3">End</th>
                                            <th class="px-4 py-3">Capacity Left</th>
                                            <th class="px-4 py-3">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-4 py-3"><input type="checkbox"></td>
                                            <td class="px-4 py-3">Kelas 1</td>
                                            <td class="px-4 py-3">PC003</td>
                                            <td class="px-4 py-3">Monday</td>
                                            <td class="px-4 py-3">20:00</td>
                                            <td class="px-4 py-3">21:00</td>
                                            <td class="px-4 py-3">7</td>
                                            <td class="px-4 py-3">
                                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">Available</span>
                                            </td>
                                        </tr>
                                        <!-- Repeat rows here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <!-- Step 3 -->
                    <div class="step-content hidden" data-step="3">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">First Name</label>
                                <input type="text" id="first_name" name="first_name" placeholder="Ali" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>
                            <div>
                                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                                <input type="text" id="last_name" name="last_name" placeholder="Ahmad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                <input type="email" id="email" name="email" placeholder="abu@gmail.com" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>
                            <div>
                                <label for="ic_number" class="block mb-2 text-sm font-medium text-gray-900">IC Number</label>
                                <input type="text" id="ic_number" name="ic_number" placeholder="990101-14-5678" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>
                            <div>
                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Phone Number</label>
                                <input type="text" id="phone" name="phone" placeholder="01234567891" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 bg-gray-50 rounded-b-lg">
                    <button type="button" class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="addStudentModal">Cancel</button>

                    <div class="flex gap-2">
                        <button type="button" id="prevStep" class="hidden px-6 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300">Previous</button>
                        <button type="button" id="nextStep" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-6 py-2.5 text-center">Next</button>
                        <button type="submit" id="submitForm" class="hidden text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-6 py-2.5 text-center">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Script for Step Navigation -->
    <script>
        let currentStep = 1;
        const totalSteps = 3;

        const updateSteps = () => {
            document.querySelectorAll('.step-content').forEach(el => {
                el.classList.add('hidden');
                if (parseInt(el.dataset.step) === currentStep) el.classList.remove('hidden');
            });

            document.querySelectorAll('.step-indicator').forEach(el => {
                el.classList.remove('text-green-700', 'font-semibold');
                if (parseInt(el.dataset.step) === currentStep) el.classList.add('text-green-700', 'font-semibold');
            });

            document.getElementById('prevStep').classList.toggle('hidden', currentStep === 1);
            document.getElementById('nextStep').classList.toggle('hidden', currentStep === totalSteps);
            document.getElementById('submitForm').classList.toggle('hidden', currentStep !== totalSteps);
        };

        document.getElementById('nextStep').addEventListener('click', () => {
            if (currentStep < totalSteps) currentStep++;
            updateSteps();
        });

        document.getElementById('prevStep').addEventListener('click', () => {
            if (currentStep > 1) currentStep--;
            updateSteps();
        });

        updateSteps();
    </script>
</x-admin-layout>