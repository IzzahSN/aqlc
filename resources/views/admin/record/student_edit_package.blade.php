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
        <form id="packageEditForm" action="{{ route('admin.student.package.update', ['studentId' => $student->student_id,'id' => $joinPackage->package_id]) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Package Info (read-only) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Package Name</label>
                    <input type="text" id="package_name" class="form-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" value="{{ $student->joinPackage->package->package_name }}" readonly>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Package Type</label>
                    <input type="text" id="package_type" class="form-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" value="{{ $student->joinPackage->package->package_type }}" readonly>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Package Rate</label>
                    <input type="text" id="package_rate" class="form-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" value="{{ $student->joinPackage->package->package_rate }}" readonly>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Unit</label>
                    <input type="text" id="unit" class="form-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" value="{{ $student->joinPackage->package->unit }}" readonly>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Duration per Session</label>
                    <input type="text" id="duration_per_sessions" class="form-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" value="{{ $student->joinPackage->package->duration_per_sessions }}" readonly>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Sessions per Week</label>
                    <input type="text" id="session_per_week" class="form-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" value="{{ $student->joinPackage->package->session_per_week }}" readonly>
                </div>
            </div>
            
             <!-- Available Classes Table -->
            <div class="mt-4">
                <h5 class="font-semibold text-gray-800 mb-3">List of Available Classes</h5>
                <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                    <!-- Classes Table -->
                    <table class="w-full text-sm text-left text-gray-700">
                        <thead class="bg-gray-100 text-gray-600 uppercase text-xs font-semibold">
                            <tr>
                                <th class="px-4 py-3"></th>
                                <th class="px-4 py-3">Class Name</th>
                                <th class="px-4 py-3">Room</th>
                                <th class="px-4 py-3">Day</th>
                                <th class="px-4 py-3">Start</th>
                                <th class="px-4 py-3">End</th>
                                <th class="px-4 py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody id="classTableBody" class="divide-y divide-gray-200">
                            <!-- Akan load dari JS -->
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-6 flex justify-between space-x-3">
                <a href="{{ route('admin.student.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Update Classes</button>
            </div>
        </form>
    </div>

    <script>
    let sessionLimit = parseInt(@json($joinPackage->package->session_per_week ?? 0));
    let selectedClasses = @json($selectedClasses ?? []);

    function loadClasses(packageId) {
        fetch(`/admin/api/package/${packageId}/classes`)
            .then(r => r.json())
            .then(data => {
                let tbody = document.getElementById("classTableBody");
                tbody.innerHTML = "";

                if (!Array.isArray(data) || data.length === 0) {
                    tbody.innerHTML = `<tr><td colspan="8" class="text-center py-3 text-gray-500">No classes available</td></tr>`;
                    return;
                }

                data.forEach(cls => {
                    // ensure numeric comparison
                    const clsId = Number(cls.class_id);
                    const checked = selectedClasses.includes(clsId) ? "checked" : "";
                    const disabled = (cls.capacity <= 0 && !checked) ? "disabled" : "";

                    tbody.innerHTML += `
                        <tr>
                            <td class="px-4 py-3">
                                <input type="checkbox" class="class-checkbox" name="class_ids[]" value="${cls.class_id}"
                                    data-capacity="${cls.capacity}" ${checked} ${disabled}>
                            </td>
                            <td class="px-4 py-3">${cls.class_name}</td>
                            <td class="px-4 py-3">${cls.room}</td>
                            <td class="px-4 py-3">${cls.day}</td>
                            <td class="px-4 py-3">${cls.start_time?.substring(0,5) || ''}</td>
                            <td class="px-4 py-3">${cls.end_time?.substring(0,5) || ''}</td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-700">
                                    ${cls.status}
                                </span>
                            </td>
                        </tr>
                    `;
                });

                attachCheckboxLimit();
            })
            .catch(err => console.error(err));
    }

    function attachCheckboxLimit() {
        let checkboxes = document.querySelectorAll('.class-checkbox');
        checkboxes.forEach(cb => {
            cb.addEventListener('change', function () {
                let checked = document.querySelectorAll('.class-checkbox:checked').length;

                if (checked >= sessionLimit) {
                    checkboxes.forEach(box => {
                        if (!box.checked) box.disabled = true;
                    });
                } else {
                    checkboxes.forEach(box => {
                        if (Number(box.dataset.capacity) > 0) box.disabled = false;
                    });
                }
            });
        });

        document.getElementById("packageEditForm").addEventListener("submit", function (e) {
            let checked = document.querySelectorAll('.class-checkbox:checked').length;
            if (checked !== sessionLimit) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Invalid Selection',
                    text: `You must select exactly ${sessionLimit} classes.`,
                    confirmButtonText: 'Okay'
                });
            }
        });
    }

    // initial load
    loadClasses(@json($joinPackage->package_id));
</script>


</x-admin-layout>