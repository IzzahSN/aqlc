<x-admin-layout :title="'Student'">
    <!-- Header with Title (left) and Breadcrumb (right) -->
    <div class="flex items-center justify-between mb-4">
        <!-- Left: Page Title -->
        <h2 class="text-xl font-medium text-gray-800">Student Report Card</h2>

        <!-- Right: Breadcrumb -->
        <nav class="text-sm text-gray-500">
            <ol class="flex space-x-2">
                <li><a href="{{ route('admin.student') }}" class="hover:text-green-600">Student</a></li>
                <li>/</li>
                <li>Report</li>
            </ol>
        </nav>
    </div>

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
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Juz 30</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-600">
                        <thead class="bg-gray-100 text-gray-700 text-xs uppercase">
                            <tr>
                                <th class="px-4 py-2">Page</th>
                                <th class="px-4 py-2">Grade</th>
                                <th class="px-4 py-2">No. of Recitation</th>
                                <th class="px-4 py-2">Recitation Date</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t">
                                <td class="px-4 py-2">582</td>
                                <td class="px-4 py-2">Mumtaz</td>
                                <td class="px-4 py-2">1</td>
                                <td class="px-4 py-2">18/09/2016</td>
                                <td class="px-4 py-2">
                                    <button class="px-3 py-1 bg-yellow-500 text-white text-xs rounded-lg hover:bg-yellow-600">Notes</button>
                                </td>
                            </tr>
                            <tr class="border-t">
                                <td class="px-4 py-2">583</td>
                                <td class="px-4 py-2">Mumtaz</td>
                                <td class="px-4 py-2">1</td>
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
</x-admin-layout>