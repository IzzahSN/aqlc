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
                            <button class="px-3 py-1 text-xs rounded bg-gray-200 hover:bg-gray-300">Edit</button>
                            <button class="px-3 py-1 text-xs rounded bg-yellow-400 text-white hover:bg-yellow-500">View</button>
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
                            <button class="px-3 py-1 text-xs rounded bg-gray-200 hover:bg-gray-300">Edit</button>
                            <button class="px-3 py-1 text-xs rounded bg-yellow-400 text-white hover:bg-yellow-500">View</button>
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

    <!-- Add New Tutor Modal -->
    <div id="addTutorModal" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative bg-white rounded-lg shadow w-full max-w-lg">

            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t">
                <h3 class="text-lg font-semibold text-gray-900">
                    Add New Tutor
                </h3>
                <button type="button" data-modal-hide="addTutorModal"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center">
                    ✕
                </button>
            </div>

            <!-- Modal body -->
            <form class="p-6 space-y-4">
                <!-- Full Name -->
                <div>
                    <label for="tutorName" class="block mb-1 text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" id="tutorName" name="tutorName"
                        class="w-full border rounded-lg px-3 py-2 text-sm focus:ring focus:ring-green-200 focus:border-green-400"
                        placeholder="Enter full name" required />
                </div>

                <!-- Phone -->
                <div>
                    <label for="tutorPhone" class="block mb-1 text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="text" id="tutorPhone" name="tutorPhone"
                        class="w-full border rounded-lg px-3 py-2 text-sm focus:ring focus:ring-green-200 focus:border-green-400"
                        placeholder="e.g. 0123456789" required />
                </div>

                <!-- Email -->
                <div>
                    <label for="tutorEmail" class="block mb-1 text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="tutorEmail" name="tutorEmail"
                        class="w-full border rounded-lg px-3 py-2 text-sm focus:ring focus:ring-green-200 focus:border-green-400"
                        placeholder="e.g. tutor@example.com" required />
                </div>

                <!-- Assigned Classes -->
                <div>
                    <label for="assignedClasses" class="block mb-1 text-sm font-medium text-gray-700">Assigned Classes</label>
                    <select id="assignedClasses" name="assignedClasses"
                        class="w-full border rounded-lg px-3 py-2 text-sm focus:ring focus:ring-green-200 focus:border-green-400">
                        <option value="">Select number of classes</option>
                        <option>1 Class</option>
                        <option>2 Classes</option>
                        <option>3 Classes</option>
                        <option>4 Classes</option>
                        <option>5 Classes</option>
                    </select>
                </div>

                <!-- Status -->
                <div>
                    <label for="tutorStatus" class="block mb-1 text-sm font-medium text-gray-700">Status</label>
                    <select id="tutorStatus" name="tutorStatus"
                        class="w-full border rounded-lg px-3 py-2 text-sm focus:ring focus:ring-green-200 focus:border-green-400">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <!-- Modal footer -->
                <div class="flex items-center justify-end gap-3 pt-4 border-t">
                    <button type="button" data-modal-hide="addTutorModal"
                        class="px-4 py-2 text-sm rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-4 py-2 text-sm rounded-lg bg-green-600 text-white hover:bg-green-700">
                        Save Tutor
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>