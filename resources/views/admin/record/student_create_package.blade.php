<x-admin-layout :title="'Student'">
    <!-- Header with Title (left) and Breadcrumb (right) -->
    <div class="flex items-center justify-between mb-4">
        <!-- Left: Page Title -->
        <h2 class="text-xl font-medium text-gray-800">Student Add Package</h2>

        <!-- Right: Breadcrumb -->
        <nav class="text-sm text-gray-500">
            <ol class="flex space-x-2">
                <li><a href="{{ route('admin.student.index') }}" class="hover:text-green-600">Student</a></li>
                <li>/</li>
                <li>Package</li>
            </ol>
        </nav>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('admin.student.package.store', ['id' => $student->student_id]) }}" method="POST" id="packageForm">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                {{-- package name --}}
                <div>
                    <label for="package_id" class="block mb-2 text-sm font-medium text-gray-900">Package Name</label>
                    <select id="package_id" name="package_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                        required>
                        <option value="">Select Package</option>
                        @foreach ($packages as $package)
                            <option value="{{ $package->package_id }}"
                                data-type="{{ $package->package_type }}"
                                data-rate="{{ $package->package_rate }}"
                                data-unit="{{ $package->unit }}"
                                data-duration="{{ $package->duration_per_sessions }}"
                                data-session="{{ $package->session_per_week }}">
                                {{ $package->package_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                {{-- package type --}}
                <div>
                    <label for="package_type" class="block mb-2 text-sm font-medium text-gray-900">Package Type</label>
                    <input type="text" id="package_type" name="package_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" readonly>
                </div>
                {{-- package rate --}}
                <div>
                    <label for="package_rate" class="block mb-2 text-sm font-medium text-gray-900">Package Rate (RM)</label>
                    <input type="number" id="package_rate" name="package_rate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" step="0.01" min="0" readonly>
                </div>
                {{-- package unit --}}
                <div>
                    <label for="unit" class="block mb-2 text-sm font-medium text-gray-900">Unit</label>
                    <input type="text" id="unit" name="unit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" readonly>
                </div>
                {{-- duration per session --}}
                <div>
                    <label for="duration_per_sessions" class="block mb-2 text-sm font-medium text-gray-900">Duration Per Session</label>
                    <input type="text" id="duration_per_sessions" name="duration_per_sessions" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" readonly>
                </div>
                {{-- session per week --}}
                <div>
                    <label for="session_per_week" class="block mb-2 text-sm font-medium text-gray-900">Session Per Week</label>
                    <input type="text" id="session_per_week" name="session_per_week" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" readonly>
                </div>
            </div>

            <!-- Available Classes Table -->
            {{-- display class available in the package (class_model table), only can select class depends on the session_per_week numbers--}}
            <div class="mt-4">
                <h5 class="font-semibold text-gray-800 mb-3">List of Available Classes</h5>
                <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                    <table class="w-full text-sm text-left text-gray-700">
                        <thead class="bg-gray-100 text-gray-600 uppercase text-xs font-semibold">
                            <tr>
                                <th class="px-4 py-3"></th> {{-- for checkbox --}}
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
                                <td class="px-4 py-3"></td>
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
            <!-- Action Buttons -->
            <div class="mt-6 flex justify-between space-x-3">
                <a href="{{ route('admin.student.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Add Package</button>
            </div>
        </form>
    </div>
</x-admin-layout>