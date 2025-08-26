<x-guardian-layout :title="'Dashboard'">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <!-- Welcome -->
        <h2 class="text-xl font-bold text-gray-800">Welcome back, Fahmi Hazwan!</h2>

        <!-- Link Child Button -->
        <button data-modal-target="linkChildModal" data-modal-toggle="linkChildModal"
            class="flex items-center gap-2 px-4 py-2 text-sm font-medium rounded-lg bg-green-500 text-white 
               hover:bg-green-600 hover:shadow-md hover:scale-105 transition-all duration-200">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5"
                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15l6 -6" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 6l.463 -.536a5 5 0 0 1 7.071 7.072l-.534 .464" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 18l-.397 .534a5.068 5.068 0 0 1 -7.127 0a4.972 4.972 0 0 1 0 -7.071l.524 -.463" />
            </svg>
            <span>Link Child</span>
        </button>
    </div>

    <!-- Link Child Modal -->
    <div id="linkChildModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative w-full max-w-xl mx-auto my-8 bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <div class="w-6"></div>
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Link Child</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="linkChildModal">✕</button>
            </div>

            <!-- Modal Body -->
            <form id="classForm">
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-6">
                        <!-- IC Number -->
                        <div>
                            <label for="ic_number" class="block mb-2 text-sm font-medium text-gray-900">Child IC Number</label>
                            <input type="text" id="ic_number" name="ic_number" placeholder="090817101758" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>
                    </div>

                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button" class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="linkChildModal">Cancel</button>

                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-6 py-2.5 text-center">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Insight -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <!-- Children Reports -->
        <div class="bg-white p-4 rounded-xl shadow">
            <div class="flex items-center gap-3">
                <div>
                    <p class="text-sm text-gray-500">Children Reports</p>
                    <h3 class="text-2xl font-bold">3</h3>
                    <div class="flex items-center gap-1 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-4 h-4 text-green-500">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 17l6 -6l4 4l8 -8" />
                            <path d="M14 7l7 0l0 7" />
                        </svg>
                        <p class="text-xs text-green-500">2 updated this week</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upcoming Classes -->
        <div class="bg-white p-4 rounded-xl shadow">
            <div class="flex items-center gap-3">
                <div>
                    <p class="text-sm text-gray-500">Outstanding Bills</p>
                    <h3 class="text-2xl font-bold">RM 120</h3>
                    <div class="flex items-center gap-1 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-4 h-4 text-red-500">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <circle cx="12" cy="12" r="9" />
                            <line x1="12" y1="8" x2="12" y2="12" />
                            <line x1="12" y1="16" x2="12" y2="16.01" />
                        </svg>
                        <p class="text-xs text-red-500">1 bill pending payment</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Salary -->
        <div class="bg-white p-4 rounded-xl shadow">
            <div class="flex items-center gap-3">
                <div>
                    <p class="text-sm text-gray-500">Upcoming Classes</p>
                    <h3 class="text-2xl font-bold">5</h3>
                    <div class="flex items-center gap-1 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="w-4 h-4 text-blue-500">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <rect x="4" y="5" width="16" height="16" rx="2" />
                            <line x1="16" y1="3" x2="16" y2="7" />
                            <line x1="8" y1="3" x2="8" y2="7" />
                            <line x1="4" y1="11" x2="20" y2="11" />
                        </svg>
                        <p class="text-xs text-blue-500">Next: Aug 20, 2025</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Schedule -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- 2/3: Upcoming Schedule -->
        <div class="bg-white p-4 rounded-xl shadow lg:col-span-2">
            <!-- Header -->
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="font-semibold text-gray-800">List of Upcoming Schedule</h3>
                </div>
            </div>
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
            </div>
            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-600">
                    <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                        <tr>
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Student Name</th>
                            <th class="px-4 py-3">Class Name</th>
                            <th class="px-4 py-3">Room</th>
                            <th class="px-4 py-3">Day</th>
                            <th class="px-4 py-3">Start Time</th>
                            <th class="px-4 py-3">End Time</th>
                            <th class="px-4 py-3">Tutor Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b">
                            <td class="px-4 py-3">1</td>
                            <td class="px-4 py-3 font-medium text-gray-900">Muhammad Firas</td>
                            <td class="px-4 py-3 font-medium text-gray-900">Mon-20-K1</td>
                            <td class="px-4 py-3">Kelas 1</td>
                            <td class="px-4 py-3">Monday</td>
                            <td class="px-4 py-3">20:00:00</td>
                            <td class="px-4 py-3">21:00:00</td>
                            <td class="px-4 py-3">Ustaz Aamir</td>
                        </tr>

                        <tr class="border-b">
                            <td class="px-4 py-3">2</td>
                            <td class="px-4 py-3 font-medium text-gray-900">Muhammad Faqriez</td>
                            <td class="px-4 py-3 font-medium text-gray-900">Tue-21-K4</td>
                            <td class="px-4 py-3">Kelas 4</td>
                            <td class="px-4 py-3">Tuesday</td>
                            <td class="px-4 py-3">21:00:00</td>
                            <td class="px-4 py-3">22:00:00</td>
                            <td class="px-4 py-3">Ustazah Husniah</td>
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

        <!-- Children Summary Section -->
        <div class="bg-white p-4 rounded-xl shadow flex flex-col lg:col-span-1">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-semibold text-gray-800">Latest Recitation</h3>
            </div>

            <div class="space-y-3">
                <a href="{{ route('guardian.report') }}" class="group flex items-center justify-between p-4 rounded-lg shadow bg-gray-100 hover:bg-green-700 transition cursor-pointer">
                    <div class="flex items-center gap-3">
                        <!-- Text Section -->
                        <div>
                            <p class="text-sm font-semibold text-gray-700 group-hover:text-white transition">
                                Muhammad Firas Bin Kamal
                            </p>

                            <!-- Juz Info -->
                            <div class="flex items-start gap-2 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4 text-emerald-600 group-hover:text-white transition mt-[2px]"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                    <path d="M9 17l0 -5" />
                                    <path d="M12 17l0 -1" />
                                    <path d="M15 17l0 -3" />
                                </svg>
                                <div class="flex flex-col leading-tight">
                                    <p class="text-xs text-gray-500 group-hover:text-white transition">
                                        Juz 30, Page 532
                                    </p>
                                    <p class="text-xs text-gray-500 group-hover:text-white transition">
                                        (Mumtaz)
                                    </p>
                                </div>
                            </div>

                            <!-- Date Info -->
                            <div class="flex items-center gap-2 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4 text-emerald-600 group-hover:text-white transition"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                                    <path d="M16 3v4" />
                                    <path d="M8 3v4" />
                                    <path d="M4 11h16" />
                                    <path d="M11 15h1" />
                                    <path d="M12 15v3" />
                                </svg>
                                <p class="text-xs text-gray-500 group-hover:text-white transition">
                                    21/09/2025
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Chevron Right -->
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 text-gray-400 group-hover:text-white transition"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 6l6 6l-6 6" />
                    </svg>
                </a>

                <a href="{{ route('guardian.report') }}" class="group flex items-center justify-between p-4 rounded-lg shadow bg-gray-100 hover:bg-green-700 transition cursor-pointer">
                    <div class="flex items-center gap-3">
                        <!-- Text Section -->
                        <div>
                            <p class="text-sm font-semibold text-gray-700 group-hover:text-white transition">
                                Muhammad Faqriez Bin Kamal
                            </p>

                            <!-- Juz Info -->
                            <div class="flex items-start gap-2 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4 text-emerald-600 group-hover:text-white transition mt-[2px]"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                    <path d="M9 17l0 -5" />
                                    <path d="M12 17l0 -1" />
                                    <path d="M15 17l0 -3" />
                                </svg>
                                <div class="flex flex-col leading-tight">
                                    <p class="text-xs text-gray-500 group-hover:text-white transition">
                                        Iqra 4, Page 6
                                    </p>
                                    <p class="text-xs text-gray-500 group-hover:text-white transition">
                                        (Jayyid Jiddan)
                                    </p>
                                </div>
                            </div>

                            <!-- Date Info -->
                            <div class="flex items-center gap-2 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="w-4 h-4 text-emerald-600 group-hover:text-white transition"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                                    <path d="M16 3v4" />
                                    <path d="M8 3v4" />
                                    <path d="M4 11h16" />
                                    <path d="M11 15h1" />
                                    <path d="M12 15v3" />
                                </svg>
                                <p class="text-xs text-gray-500 group-hover:text-white transition">
                                    21/09/2025
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Chevron Right -->
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 text-gray-400 group-hover:text-white transition"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 6l6 6l-6 6" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

</x-guardian-layout>