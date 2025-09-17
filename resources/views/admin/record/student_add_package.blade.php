{{-- <x-admin-layout :title="'Student'">
    <!-- Header with Title (left) and Breadcrumb (right) -->
    <div class="flex items-center justify-between mb-4">
        <!-- Left: Page Title -->
        <h2 class="text-xl font-medium text-gray-800">Student Report Card</h2>

        <!-- Right: Breadcrumb -->
        <nav class="text-sm text-gray-500">
            <ol class="flex space-x-2">
                <li><a href="{{ route('admin.student.index') }}" class="hover:text-green-600">Student</a></li>
                <li>/</li>
                <li>Package</li>
            </ol>
        </nav>
    </div>

    <div>
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
                <label for="join-edit" class="block mb-2 text-sm font-medium text-gray-900">Class Joined</label>
                <select id="join-edit" name="join-edit[]" multiple class="bg-gray-50 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500">
                    <option value="Mon-2100-K1">Mon-2100-K1</option>
                    <option value="Tue-2000-K2">Tue-2000-K2</option>
                    <option value="Wed-1930-K3">Wed-1930-K3</option>
                </select>
            </div>
            <script>
                new TomSelect("#join-edit", {
                    plugins: ['remove_button'],
                    maxItems: 2,
                    create: false,
                    persist: false,
                    render: {
                        item: function(data, escape) {
                            return `<div class="bg-green-100 text-green-800 text-xs font-medium mr-1 mb-1 px-2.5 py-1 rounded-md flex items-center">${escape(data.text)}</div>`;
                        },
                        option: function(data, escape) {
                            return `<div class="px-3 py-2 text-sm text-gray-900 hover:bg-green-50 cursor-pointer">${escape(data.text)}</div>`;
                        }
                    }
                });
            </script>
        </div>

        <!-- Available Classes Table -->
        <div class="mt-4">
            <h5 class="font-semibold text-gray-800 mb-3">List of Available Classes</h5>
            <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                <table class="w-full text-sm text-left text-gray-700">
                    <thead class="bg-gray-100 text-gray-600 uppercase text-xs font-semibold">
                        <tr>
                            <th class="px-4 py-3">No</th>
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
                            <td class="px-4 py-3">1</td>
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
</x-admin-layout> --}}