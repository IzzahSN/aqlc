<x-admin-layout :title="'Schedule'">
    <div class="p-6 bg-white rounded-xl shadow mb-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold">Class Timetable</h2>

            <!-- Filter Dropdown -->
            <div class="flex justify-end relative">
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">
                    <span id="dropdownSelected">All Tutors</span>
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <div id="dropdown" class="absolute right-0 mt-2 z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-44">
                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                        <li><button class="dropdown-option w-full text-left block px-4 py-2 hover:bg-gray-100">All Tutors</button></li>
                        <li><button class="dropdown-option w-full text-left block px-4 py-2 hover:bg-gray-100">Ustaz Hafiz</button></li>
                        <li><button class="dropdown-option w-full text-left block px-4 py-2 hover:bg-gray-100">Ustaz Jazmy</button></li>
                        <li><button class="dropdown-option w-full text-left block px-4 py-2 hover:bg-gray-100">Ustazah Nuha</button></li>
                        <li><button class="dropdown-option w-full text-left block px-4 py-2 hover:bg-gray-100">Ustazah Iman</button></li>
                    </ul>
                </div>
            </div>

            <script>
                const dropdownButton = document.getElementById("dropdownDefaultButton");
                const dropdownMenu = document.getElementById("dropdown");
                const dropdownSelected = document.getElementById("dropdownSelected");
                const dropdownOptions = document.querySelectorAll(".dropdown-option");

                dropdownButton.addEventListener("click", () => {
                    dropdownMenu.classList.toggle("hidden");
                });

                dropdownOptions.forEach(option => {
                    option.addEventListener("click", (e) => {
                        dropdownSelected.textContent = e.target.textContent; // update button text
                        dropdownMenu.classList.add("hidden"); // auto close menu
                    });
                });

                document.addEventListener("click", (e) => {
                    if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                        dropdownMenu.classList.add("hidden");
                    }
                });
            </script>

        </div>

        <!-- Class timetable -->
        <div class="overflow-x-auto mb-6">
            <table class="w-max min-w-full border-collapse text-xs">
                <!-- Table Head -->
                <thead class="bg-gray-50 sticky top-0 z-10">
                    <tr class="text-gray-600">
                        <th class="border border-gray-200 p-3 text-left min-w-[80px]">Day</th>
                        <th class="border border-gray-200 p-3 text-center">09:00 - 09:30</th>
                        <th class="border border-gray-200 p-3 text-center">09:30 - 10:00</th>
                        <th class="border border-gray-200 p-3 text-center">10:00 - 10:30</th>
                        <th class="border border-gray-200 p-3 text-center">10:30 - 11:00</th>
                        <th class="border border-gray-200 p-3 text-center">13:00 - 13:30</th>
                        <th class="border border-gray-200 p-3 text-center">13:30 - 14:00</th>
                        <th class="border border-gray-200 p-3 text-center">19:00 - 19:30</th>
                        <th class="border border-gray-200 p-3 text-center">19:30 - 20:00</th>
                        <th class="border border-gray-200 p-3 text-center">20:00 - 20:30</th>
                        <th class="border border-gray-200 p-3 text-center">20:30 - 21:00</th>
                        <th class="border border-gray-200 p-3 text-center">21:00 - 21:30</th>
                        <th class="border border-gray-200 p-3 text-center">21:30 - 22:00</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody class="divide-y divide-gray-100 border border-gray-200">
                    <!-- Monday -->
                    <tr class="hover:bg-gray-50 border border-gray-200">
                        <td class="p-3 font-medium text-gray-700 border border-gray-200">Monday</td>
                        <td class="text-center">
                            <span class="block m-1 px-3 py-1 text-xs rounded-full bg-green-100 text-green-800 font-medium">Ustaz Hafiz</span>
                        </td>
                        <td class="text-center">
                            <span class="block m-1 px-3 py-1 text-xs rounded-full bg-green-100 text-green-800 font-medium">Ustaz Hafiz</span>
                        </td>
                        <td class="text-center">
                            <span class="block m-1 px-3 py-1 text-xs rounded-full bg-orange-100 text-orange-800 font-medium">Ustaz Mustaqim</span>
                        </td>
                        <td class="text-center">
                            <span class="block m-1 px-3 py-1 text-xs rounded-full bg-orange-100 text-orange-800 font-medium">Ustaz Mustaqim</span>
                        </td>
                        <td></td>
                        <td></td>
                        <td class="text-center space-y-1 py-1">
                            <span class="block m-1 px-3 py-1 text-xs rounded-full bg-red-100 text-red-800 font-medium">Ustazah Iman</span>
                            <span class="block m-1 px-3 py-1 text-xs rounded-full bg-blue-100 text-blue-800 font-medium">Ustazah Nuha</span>
                            <span class="block m-1 px-3 py-1 text-xs rounded-full bg-purple-100 text-purple-800 font-medium">Ustaz Hilmi</span>
                        </td>
                        <td class="text-center space-y-1 py-1">
                            <span class="block m-1 px-3 py-1 text-xs rounded-full bg-red-100 text-red-800 font-medium">Ustazah Iman</span>
                            <span class="block m-1px-3 py-1 text-xs rounded-full bg-blue-100 text-blue-800 font-medium">Ustazah Nuha</span>
                            <span class="block m-1 px-3 py-1 text-xs rounded-full bg-purple-100 text-purple-800 font-medium">Ustaz Hilmi</span>
                        </td>
                        <td class="text-center">
                            <span class="block m-1 px-3 py-1 text-xs rounded-full bg-green-100 text-green-800 font-medium">Ustazah Nuha</span>
                        </td>
                        <td></td>
                    </tr>

                    <!-- Tuesday -->
                    <tr class="hover:bg-gray-50 border border-gray-200">
                        <td class="p-3 font-medium text-gray-700 border border-gray-200">Tuesday</td>
                        <td></td>
                        <td class="text-center">
                            <span class="block m-1 px-3 py-1 text-xs rounded-full bg-red-100 text-red-800 font-medium">Ustaz Jazmy</span>
                        </td>
                        <td></td>
                        <td></td>
                        <td colspan="8"></td>
                    </tr>

                    <!-- Wednesday -->
                    <tr class="hover:bg-gray-50 border border-gray-200">
                        <td class="p-3 font-medium text-gray-700 border border-gray-200">Wednesday</td>
                        <td class="text-center">
                            <span class="block m-1 px-3 py-1 text-xs rounded-full bg-green-100 text-green-800 font-medium">Ustazah Aira</span>
                        </td>
                        <td></td>
                        <td class="text-center">
                            <span class="block m-1 px-3 py-1 text-xs rounded-full bg-pink-100 text-pink-800 font-medium">Ustazah Iman</span>
                        </td>
                        <td></td>
                        <td colspan="8"></td>
                    </tr>

                    <!-- Thursday -->
                    <tr class="hover:bg-gray-50 border border-gray-200">
                        <td class="p-3 font-medium text-gray-700 border border-gray-200">Thursday</td>
                        <td colspan="12" class="text-center text-gray-400 italic">No classes</td>
                    </tr>

                    <!-- Friday -->
                    <tr class="hover:bg-gray-50 border border-gray-200">
                        <td class="p-3 font-medium text-gray-700 border border-gray-200">Friday</td>
                        <td colspan="5"></td>
                        <td class="text-center">
                            <span class="block m-1 px-3 py-1 text-xs rounded-full bg-green-100 text-green-800 font-medium">Ustazah Nuha</span>
                        </td>
                        <td colspan="6"></td>
                    </tr>

                    <!-- Saturday -->
                    <tr class="hover:bg-gray-50 border border-gray-200">
                        <td class="p-3 font-medium text-gray-700 border border-gray-200">Saturday</td>
                        <td></td>
                        <td class="text-center">
                            <span class="block m-1 px-3 py-1 text-xs rounded-full bg-red-100 text-red-800 font-medium">Ustaz Hafiz</span>
                        </td>
                        <td class="text-center">
                            <span class="block m-1 px-3 py-1 text-xs rounded-full bg-purple-100 text-purple-800 font-medium">Ustaz Jazmy</span>
                        </td>
                        <td colspan="8"></td>
                    </tr>

                    <!-- Sunday -->
                    <tr class="hover:bg-gray-50 border border-gray-200">
                        <td class="p-3 font-medium text-gray-700 border border-gray-200">Sunday</td>
                        <td colspan="12" class="text-center text-gray-400 italic">No classes</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Legend -->
        <div class="flex flex-wrap gap-4 justify-center ">
            <div class="flex items-center gap-1">
                <span class="w-3 h-3 rounded-full bg-green-800"></span>
                <span class="text-sm text-gray-700">Kelas 1</span>
            </div>
            <div class="flex items-center gap-1">
                <span class="w-3 h-3 rounded-full bg-orange-500"></span>
                <span class="text-sm text-gray-700">Kelas 2</span>
            </div>
            <div class="flex items-center gap-1">
                <span class="w-3 h-3 rounded-full bg-red-500"></span>
                <span class="text-sm text-gray-700">Kelas 3</span>
            </div>
            <div class="flex items-center gap-1">
                <span class="w-3 h-3 rounded-full bg-blue-500"></span>
                <span class="text-sm text-gray-700">Kelas 4</span>
            </div>
            <div class="flex items-center gap-1">
                <span class="w-3 h-3 rounded-full bg-purple-500"></span>
                <span class="text-sm text-gray-700">Bilik 1</span>
            </div>
            <div class="flex items-center gap-1">
                <span class="w-3 h-3 rounded-full bg-pink-500"></span>
                <span class="text-sm text-gray-700">Bilik 2</span>
            </div>
        </div>
    </div>

    <!-- Schedules List -->
    <div class="bg-white p-6 rounded-xl shadow">
        <!-- Header -->
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg font-semibold">List of Schedules</h2>
                <p class="text-sm text-gray-500">Manage your schedules: add new, search, filter, edit, or delete.</p>
            </div>
            <button data-modal-target="addScheduleModal" data-modal-toggle="addScheduleModal"
                class="px-4 py-2 text-sm rounded-lg bg-green-600 text-white hover:bg-green-700">
                + Add New Schedule
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
                <option value="">Day</option>
                <option value="monday">Monday</option>
                <option value="tuesday">Tuesday</option>
                <option value="wednesday">Wednesday</option>
                <option value="thursday">Thursday</option>
                <option value="friday">Friday</option>
                <option value="saturday">Saturday</option>
                <option value="sunday">Sunday</option>
            </select>
            <select class="border rounded-lg px-3 py-2 text-sm w-full sm:w-auto">
                <option value="">Room</option>
                <option value="1">Kelas 1</option>
                <option value="2">Kelas 2</option>
                <option value="3">Kelas 3</option>
                <option value="4">Kelas 4</option>
                <option value="5">Kelas 5</option>
                <option value="6">Kelas 6</option>
            </select>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Class Name</th>
                        <th class="px-4 py-3">Package Type</th>
                        <th class="px-4 py-3">Tutor Name</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-3">1</td>
                        <td class="px-4 py-3 font-medium text-gray-900">Mon-20-K1</td>
                        <td class="px-4 py-3">Personal</td>
                        <td class="px-4 py-3">Ustaz Hafiz</td>
                        <td class="px-4 py-3">12/09/2025</td>
                        <td class="px-4 py-3 flex gap-2 justify-center">
                            <button class="px-3 py-1 text-xs rounded bg-gray-200 hover:bg-gray-300">Edit</button>
                            <button class="px-3 py-1 text-xs rounded bg-yellow-400 text-white hover:bg-yellow-500">Attendance</button>
                            <button class="px-3 py-1 text-xs rounded bg-red-500 text-white hover:bg-red-600">Delete</button>
                        </td>
                    </tr>

                    <tr class="border-b">
                        <td class="px-4 py-3">2</td>
                        <td class="px-4 py-3 font-medium text-gray-900">Tue-21-K1</td>
                        <td class="px-4 py-3">Group</td>
                        <td class="px-4 py-3">Ustazah Nuha</td>
                        <td class="px-4 py-3">10/08/2025</td>
                        <td class="px-4 py-3 flex gap-2 justify-center">
                            <button class="px-3 py-1 text-xs rounded bg-gray-200 hover:bg-gray-300">Edit</button>
                            <button class="px-3 py-1 text-xs rounded bg-yellow-400 text-white hover:bg-yellow-500">Attendance</button>
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

    <!-- Add New Schedule Modal -->
    <div id="addScheduleModal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative bg-white rounded-lg shadow w-full max-w-lg">

            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900">
                    Add New Schedule
                </h3>
                <button type="button" data-modal-hide="addScheduleModal"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center">
                    ✕
                </button>
            </div>

            <!-- Modal body -->
            <form class="p-6 space-y-4">
                <!-- Full Name -->
                <div>
                    <label for="scheduleName" class="block mb-1 text-sm font-medium text-gray-700">Schedule Name</label>
                    <input type="text" id="scheduleName" name="scheduleName"
                        class="w-full border rounded-lg px-3 py-2 text-sm focus:ring focus:ring-green-200 focus:border-green-400"
                        placeholder="Enter full name" required />
                </div>

                <!-- Modal footer -->
                <div class="flex items-center justify-end gap-3 pt-4 border-t">
                    <button type="button" data-modal-hide="addPackageModal"
                        class="px-4 py-2 text-sm rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-4 py-2 text-sm rounded-lg bg-green-600 text-white hover:bg-green-700">
                        Save Schedule
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-admin-layout>