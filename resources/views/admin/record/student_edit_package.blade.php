<x-admin-layout :title="'Kemaskini Pakej Pelajar'">
    <!-- Header with Title (left) and Breadcrumb (right) -->
    <div class="flex items-center justify-between mb-4">
        <!-- Left: Page Title -->
        <h2 class="text-xl font-medium text-gray-800">Kemaskini Pakej Pelajar</h2>

        <!-- Right: Breadcrumb -->
        <nav class="text-sm text-gray-500">
            <ol class="flex space-x-2">
                <li><a href="{{ route('admin.student.index') }}" class="hover:text-green-600">Senarai Pelajar</a></li>
                <li>/</li>
                <li class="text-green-600">Kemaskini Pakej Pelajar</li>
            </ol>
        </nav>
    </div>
    {{-- disjoin package button --}}
    <div class="mb-4 flex justify-end">
        <form id="disjoinForm" 
            action="{{ route('admin.student.package.destroy', ['studentId' => $student->student_id,'id' => $joinPackage->package_id]) }}" 
            method="POST">
            @csrf
            @method('DELETE')
            <button type="button" id="disjoinBtn" 
                    class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-semibold text-white bg-red-600 rounded-lg shadow-sm hover:bg-red-700 hover:shadow transition-all duration-200 focus:ring-4 focus:ring-red-300 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                </svg>
                Keluar Pakej
            </button>
        </form>
    </div>

    <script>
        document.getElementById("disjoinBtn").addEventListener("click", function () {
            Swal.fire({
                title: 'Adakah anda pasti?',
                text: "Tindakan ini akan mengeluarkan pelajar daripada pakej dan kelas berkaitan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, keluarkan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById("disjoinForm").submit();
                }
            });
        });
    </script>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <form id="packageEditForm" action="{{ route('admin.student.package.update', ['studentId' => $student->student_id,'id' => $joinPackage->package_id]) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Package Info (read-only) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Nama Pakej</label>
                    <input type="text" id="package_name" class="form-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" value="{{ $student->joinPackage->package->package_name }}" readonly>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Jenis Pakej</label>
                    <input type="text" id="package_type" class="form-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" value="{{ ucwords($student->joinPackage->package->package_type) }}" readonly>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Kadar Pakej</label>
                    <input type="text" id="package_rate" class="form-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" value="RM {{ $student->joinPackage->package->package_rate }}" readonly>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Unit</label>
                    <input type="text" id="unit" class="form-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" value="{{ ucwords($student->joinPackage->package->unit) }}" readonly>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Tempoh setiap Sesi</label>
                    <input type="text" id="duration_per_sessions" class="form-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" value="{{ $student->joinPackage->package->duration_per_sessions }}" readonly>
                </div>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900">Sesi setiap Minggu</label>
                    <input type="text" id="session_per_week" class="form-input bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" value="{{ $student->joinPackage->package->session_per_week }}" readonly>
                </div>
            </div>
            
             <!-- Available Classes Table -->
            <div class="mt-4">
                <h5 class="font-semibold text-gray-800 mb-3">Senarai Kelas Tersedia (Pilih tepat {{ $joinPackage->package->session_per_week }} kelas)</h5>
                <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                    <!-- Classes Table -->
                    <table class="w-full text-sm text-left text-gray-700">
                        <thead class="bg-gray-100 text-gray-600 uppercase text-xs font-semibold">
                            <tr>
                                <th class="px-4 py-3"></th>
                                <th class="px-4 py-3">Nama Kelas</th>
                                <th class="px-4 py-3">Bilik</th>
                                <th class="px-4 py-3">Hari</th>
                                <th class="px-4 py-3">Jam Mula</th>
                                <th class="px-4 py-3">Jam Tamat</th>
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
                <a href="{{ route('admin.student.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">Batal</a>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Kemaskini Kelas</button>
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
                        const clsId = Number(cls.class_id);
                        const checked = selectedClasses.includes(clsId) ? "checked" : "";

                        // condition baru: hanya enable kalau status == "Available" atau dah dipilih sebelum ni
                        const disabled = (cls.status !== "Available" && !checked) ? "disabled" : "";

                        tbody.innerHTML += `
                            <tr>
                                <td class="px-4 py-3">
                                    <input type="checkbox" 
                                        class="class-checkbox" 
                                        name="class_ids[]" 
                                        value="${cls.class_id}"
                                        data-status="${cls.status}" 
                                        ${checked} ${disabled}>
                                </td>
                                <td class="px-4 py-3">${cls.class_name}</td>
                                <td class="px-4 py-3">${cls.room}</td>
                                <td class="px-4 py-3">${cls.day}</td>
                                <td class="px-4 py-3">${cls.start_time?.substring(0,5) || ''}</td>
                                <td class="px-4 py-3">${cls.end_time?.substring(0,5) || ''}</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full 
                                        ${cls.status === 'Available' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'}">
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
                            if (!box.checked && box.dataset.status === "Available") {
                                box.disabled = true;
                            }
                        });
                    } else {
                        checkboxes.forEach(box => {
                            if (box.dataset.status === "Available") {
                                box.disabled = false;
                            }
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
                        // title: 'Invalid Selection',
                        title: 'Pemilihan Tidak Sah',
                        // text: `You must select exactly ${sessionLimit} classes.`,
                        text: `Anda mesti memilih tepat ${sessionLimit} kelas.`,
                        confirmButtonText: 'Okay'
                    });
                }
            });
        }

        // initial load
        loadClasses(@json($joinPackage->package_id));
    </script>

</x-admin-layout>