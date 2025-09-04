<x-admin-layout :title="'Package'">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white p-4 rounded-xl shadow flex items-center gap-3">
            <div class="p-3 rounded-full bg-blue-100 text-blue-600">👨‍🏫</div>
            <div>
                <p class="text-sm text-gray-500">Total Personal Packages</p>
                <h3 class="text-2xl font-bold">8</h3>
            </div>
        </div>
        <div class="bg-white p-4 rounded-xl shadow flex items-center gap-3">
            <div class="p-3 rounded-full bg-purple-100 text-purple-600">📘</div>
            <div>
                <p class="text-sm text-gray-500">Total Group Packages</p>
                <h3 class="text-2xl font-bold">2</h3>
            </div>
        </div>
        <div class="bg-white p-4 rounded-xl shadow flex items-center gap-3">
            <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">📊</div>
            <div>
                <p class="text-sm text-gray-500">Total Available Packages</p>
                <h3 class="text-2xl font-bold">10</h3>
            </div>
        </div>
    </div>

    <!-- Packages List -->
    <div class="bg-white p-6 rounded-xl shadow">
        <!-- Header -->
        <div class="flex items-center justify-between mb-4">
            <div>
                <h2 class="text-lg font-semibold">List of Packages</h2>
                <p class="text-sm text-gray-500">Manage your packages: add new, search, filter, edit, or delete.</p>
            </div>
            <button data-modal-target="addPackageModal" data-modal-toggle="addPackageModal"
                class="px-4 py-2 text-sm rounded-lg bg-green-600 text-white hover:bg-green-700">
                + Add New Package
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
                <option value="">Type</option>
                <option value="active">Personal</option>
                <option value="inactive">Group</option>
            </select>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-600">
                <thead class="bg-gray-100 text-xs uppercase text-gray-500">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Package Name</th>
                        <th class="px-4 py-3">Package Type</th>
                        <th class="px-4 py-3">Package Rate</th>
                        <th class="px-4 py-3">Unit</th>
                        <th class="px-4 py-3">No. of Student</th>
                        <th class="px-4 py-3">Class Duration</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $package)
                    <tr class="border-b">
                        <td class="px-4 py-3">{{ $loop->iteration + ($packages->currentPage() - 1) * $packages->perPage() }}</td>
                        <td class="px-4 py-3 font-medium text-gray-900">{{ $package->package_name }}</td>
                        <td class="px-4 py-3">{{ ucfirst($package->package_type) }}</td>
                        <td class="px-4 py-3">RM{{ number_format($package->package_rate, 2) }}</td>
                        <td class="px-4 py-3">{{ ucwords(str_replace('_', ' ', $package->unit)) }}</td>
                        <td class="px-4 py-3">{{ $package->join_packages_count   }}</td>
                        <td class="px-4 py-3">{{ $package->duration_per_sessions }}</td>
                        <td class="px-4 py-3 flex gap-2 justify-center">
                            <button type="button" class="px-3 py-1 text-xs rounded bg-gray-200 hover:bg-gray-300 edit-button" data-id="{{ $package->package_id }}" data-modal-target="editPackageModal" data-modal-toggle="editPackageModal">Edit</button>
                            <a href="{{ route('admin.package.report') }}" class="px-3 py-1 text-xs rounded bg-yellow-400 text-white hover:bg-yellow-500">Report</a>
                            <form id="delete-form-{{ $package->package_id }}" 
                                action="{{ route('admin.package.destroy', $package->package_id) }}" 
                                method="POST" 
                                class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                        class="delete-button px-3 py-1 text-xs rounded bg-red-500 text-white hover:bg-red-600"
                                        data-id="{{ $package->package_id }}">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{$packages->links()}}
        </div>
    </div>

    <!-- Add Package Modal -->
    <div id="addPackageModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative w-full max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <div class="w-6"></div>
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Add New Package</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="addPackageModal">✕</button>
            </div>

            <!-- Modal Body -->
            <form id="addPackageForm" action="{{ route('admin.package.store') }}" method="POST">
                @csrf
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                        <!-- Package Name -->
                        <div>
                            <label for="package_name" class="block mb-2 text-sm font-medium text-gray-900">Package Name</label>
                            <input type="text" id="package_name" name="package_name" placeholder="An-Nur Lite" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        <!-- Package Type -->
                        <div>
                            <label for="package_type" class="block mb-2 text-sm font-medium text-gray-900">Package Type</label>
                            <select id="package_type" name="package_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Select Type</option>
                                <option value="personal">Personal</option>
                                <option value="group">Group</option>
                            </select>
                        </div>

                        <!-- Rate -->
                        <div>
                            <label for="package_rate" class="block mb-2 text-sm font-medium text-gray-900">Package Rate (RM)</label>
                            <input type="number" id="package_rate" name="package_rate" placeholder="15" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" step="0.01" min="0" required>
                        </div>

                        <!-- Unit -->
                        <div>
                            <label for="unit" class="block mb-2 text-sm font-medium text-gray-900">Select Unit</label>
                            <select id="unit" name="unit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Select unit</option>
                                <option value="per month">Per Month</option>
                                <option value="per session">Per Session</option>
                            </select>
                        </div>

                        <!-- Class Duration -->
                        <div>
                            <label for="duration_per_sessions" class="block mb-2 text-sm font-medium text-gray-900">Class Duration</label>
                            <select id="duration_per_sessions" name="duration_per_sessions" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="">Select unit</option>
                                <option value="30 minutes">30 Minutes</option>
                                <option value="1 hour">1 Hour</option>
                            </select>
                        </div>

                        <!-- Session per week -->
                        <div>
                            <label for="session_per_week" class="block mb-2 text-sm font-medium text-gray-900">Class Limit per Week</label>
                            <input type="number" id="session_per_week" name="session_per_week" placeholder="15" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
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

                        <!-- Details -->
                        <div>
                            <label for="details" class="block mb-2 text-sm font-medium text-gray-900">Details</label>
                            <textarea id="details" name="details" rows="3" placeholder="Additional information about the package..." class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"></textarea>
                        </div>

                    </div>

                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button" class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="addPackageModal">Cancel</button>

                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-6 py-2.5 text-center">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Package Modal -->
    <div id="editPackageModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-900/50">
        <div class="relative w-full max-w-2xl mx-auto my-8 bg-white rounded-lg shadow-lg">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4">
                <div class="w-6"></div>
                <h3 class="text-xl font-bold text-gray-800 tracking-wide text-center flex-1">Edit Package</h3>
                <button type="button" class="text-gray-400 hover:text-gray-600 transition-colors duration-200" data-modal-hide="editPackageModal">✕</button>
            </div>

            <!-- Modal Body -->
            <form id="editPackageForm" method="POST">
                @csrf
                @method('PUT')
                <div class="px-6 py-6 max-h-[70vh] overflow-y-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                        <!-- Package Name -->
                        <div>
                            <label for="package_name" class="block mb-2 text-sm font-medium text-gray-900">Package Name</label>
                            <input type="text" id="package_name" name="package_name" placeholder="An-Nur Lite" value="{{ old('package_name', $package->package_name) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        <!-- Package Type -->
                        <div>
                            <label for="package_type" class="block mb-2 text-sm font-medium text-gray-900">Package Type</label>
                            <select id="package_type" name="package_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="personal" {{old('package_type', $package->package_type) == 'personal' ? 'selected' : '' }}>Personal</option>
                                <option value="group" {{old('package_type', $package->package_type) == 'group' ? 'selected' : '' }}>Group</option>
                            </select>
                        </div>

                        <!-- Rate -->
                        <div>
                            <label for="package_rate" class="block mb-2 text-sm font-medium text-gray-900">Package Rate (RM)</label>
                            <input type="number" id="package_rate" name="package_rate" placeholder="15" value="{{ old('package_rate', $package->package_rate) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" step="0.01" min="0" required>
                        </div>

                        <!-- Unit -->
                        <div>
                            <label for="unit" class="block mb-2 text-sm font-medium text-gray-900">Select Unit</label>
                            <select id="unit" name="unit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="per month" {{old('unit', $package->unit) == 'per month' ? 'selected' : '' }}>Per Month</option>
                                <option value="per session" {{old('unit', $package->unit) == 'per session' ? 'selected' : '' }}>Per Session</option>
                            </select>
                        </div>

                        <!-- Class Duration -->
                        <div>
                            <label for="duration_per_sessions" class="block mb-2 text-sm font-medium text-gray-900">Class Duration</label>
                            <select id="duration_per_sessions" name="duration_per_sessions" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="30 minutes" {{old('duration_per_sessions', $package->duration_per_sessions) == '30 minutes' ? 'selected' : '' }}>30 Minutes</option>
                                <option value="1 hour" {{old('duration_per_sessions', $package->duration_per_sessions) == '1 hour' ? 'selected' : '' }}>1 Hour</option>
                            </select>
                        </div>

                        <!-- Session per week -->
                        <div>
                            <label for="session_per_week" class="block mb-2 text-sm font-medium text-gray-900">Class Limit per Week</label>
                            <input type="number" id="session_per_week" name="session_per_week" placeholder="15" value="{{ old('session_per_week', $package->session_per_week) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                            <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                                <option value="active" {{old('status', $package->status) == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{old('status', $package->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        
                         <!-- Details -->
                        <div>
                            <label for="details" class="block mb-2 text-sm font-medium text-gray-900">Details</label>
                            <textarea id="details" name="details" rows="3" placeholder="Additional information about the package..." value="{{ old('details', $package->details) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"></textarea>
                        </div>

                    </div>

                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between px-6 py-4 rounded-b-lg">
                    <button type="button" class="px-6 py-2.5 bg-gray-200 text-gray-700 rounded-lg text-sm text-center hover:bg-gray-300" data-modal-hide="editPackageModal">Cancel</button>

                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm px-6 py-2.5 text-center">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
    
     @if(session('closeModalAdd'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Cari button yang ada data-modal-hide="addPackageModal"
            const closeBtn = document.querySelector('[data-modal-hide="addPackageModal"]');
            if (closeBtn) {
                closeBtn.click(); // trigger tutup modal
            }
        });
    </script>
    @endif

    @if(session('closeModalEdit'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Cari button yang ada data-modal-hide="editPackageModal"
            const closeBtn = document.querySelector('[data-modal-hide="editPackageModal"]');
            if (closeBtn) {
                closeBtn.click(); // trigger tutup modal
            }
        });
    </script>
    @endif

    {{-- Edit form --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editButtons = document.querySelectorAll('.edit-button');
            const editForm = document.getElementById('editPackageForm');

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const packageId = this.getAttribute('data-id');
                    fetch(`/admin/package/${packageId}/edit`)
                        .then(response => response.json())
                        .then(data => {
                            // Set action URL for the form
                            editForm.action = `/admin/package/${packageId}`;

                            // Populate form fields with fetched data
                            editForm.package_name.value = data.package_name;
                            editForm.package_type.value = data.package_type;
                            editForm.package_rate.value = data.package_rate;
                            editForm.unit.value = data.unit;
                            editForm.duration_per_sessions.value = data.duration_per_sessions;
                            editForm.session_per_week.value = data.session_per_week;
                            editForm.status.value = data.status;
                            editForm.details.value = data.details || '';
                        })
                        .catch(error => {
                            console.error('Error fetching package data:', error);
                        });
                });
            });
        });
    </script>

    {{-- Delete Confirmation --}}
   <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".delete-button").forEach(button => {
                button.addEventListener("click", function () {
                    let id = this.getAttribute("data-id");
                    let form = document.getElementById("delete-form-" + id);

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "This package will be deleted!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

</x-admin-layout>