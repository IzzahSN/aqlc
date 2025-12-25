<x-admin-layout :title="'Daftar Pakej Pelajar'">
    <!-- Header with Title (left) and Breadcrumb (right) -->
    <div class="flex items-center justify-between mb-4">
        <!-- Left: Page Title -->
        <h2 class="text-xl font-medium text-gray-800">Daftar Pakej Pelajar</h2>

        <!-- Right: Breadcrumb -->
        <nav class="text-sm text-gray-500">
            <ol class="flex space-x-2">
                <li><a href="{{ route('admin.student.index') }}" class="hover:text-green-600">Senarai Pelajar</a></li>
                <li>/</li>
                <li class="text-green-600">Daftar Pakej Pelajar</li>
            </ol>
        </nav>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="{{ route('admin.student.package.store', ['id' => $student->student_id]) }}" method="POST" id="packageForm">

            {{-- maklumat student->first_name + last_name, tarik kemasukan --}}
            <div class="mb-6 grid grid-cols-1 md:grid-cols-2 gap-4">
    
                <div class="flex items-center p-3 bg-white border border-gray-200 rounded-lg shadow-sm">
                    <div class="flex-shrink-0 p-2 bg-indigo-50 rounded-lg text-indigo-600 mr-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider leading-none mb-1">Nama Pelajar</p>
                        <p class="text-sm font-semibold text-gray-800 uppercase">{{ $student->first_name }} {{ $student->last_name }}</p>
                    </div>
                </div>

                <div class="flex items-center p-3 bg-white border border-gray-200 rounded-lg shadow-sm">
                    <div class="flex-shrink-0 p-2 bg-emerald-50 rounded-lg text-emerald-600 mr-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider leading-none mb-1">Tarikh Kemasukan</p>
                        <p class="text-sm font-semibold text-gray-800">{{ \Carbon\Carbon::parse($student->created_at)->format('d M Y') }}</p>
                    </div>
                </div>

            </div>

            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                {{-- package name --}}
                <div>
                    <label for="package_id" class="block mb-2 text-sm font-medium text-gray-900">Nama Pakej</label>
                    <select id="package_id" name="package_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5"
                        required>
                        <option value="">Pilih Pakej</option>
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
                    <label for="package_type" class="block mb-2 text-sm font-medium text-gray-900">Jenis Pakej</label>
                    <input type="text" id="package_type" name="package_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" readonly>
                </div>
                {{-- package rate --}}
                <div>
                    <label for="package_rate" class="block mb-2 text-sm font-medium text-gray-900">Kadar Pakej (RM)</label>
                    <input type="text" id="package_rate" name="package_rate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" step="0.01" min="0" readonly>
                </div>
                {{-- package unit --}}
                <div>
                    <label for="unit" class="block mb-2 text-sm font-medium text-gray-900">Unit</label>
                    <input type="text" id="unit" name="unit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" readonly>
                </div>
                {{-- duration per session --}}
                <div>
                    <label for="duration_per_sessions" class="block mb-2 text-sm font-medium text-gray-900">Tempoh setiap Sesi</label>
                    <input type="text" id="duration_per_sessions" name="duration_per_sessions" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" readonly>
                </div>
                {{-- session per week --}}
                <div>
                    <label for="session_per_week" class="block mb-2 text-sm font-medium text-gray-900">Sesi setiap Minggu</label>
                    <input type="text" id="session_per_week" name="session_per_week" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" readonly>
                </div>
            </div>

            <!-- Available Classes Table -->
            <div class="mt-4">
                <h5 class="font-semibold text-gray-800 mb-3">Senarai Kelas Tersedia</h5>
                <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
                    <table id="classTable" class="w-full text-sm text-left text-gray-700">
                        <thead class="bg-gray-100 text-gray-600 uppercase text-xs font-semibold">
                            <tr>
                                <th class="px-4 py-3"></th> {{-- for checkbox --}}
                                <th class="px-4 py-3">Nama Kelas</th>
                                <th class="px-4 py-3">Bilik</th>
                                <th class="px-4 py-3">Hari</th>
                                <th class="px-4 py-3">Jam Mula</th>
                                <th class="px-4 py-3">Jam Akhir</th>
                                <th class="px-4 py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody id="classTableBody" class="divide-y divide-gray-200">
                            <!-- Rows will be loaded dynamically -->
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Action Buttons -->
            <div class="mt-6 flex justify-between space-x-3">
                <a href="{{ route('admin.student.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">Batal</a>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">Daftar Pakej</button>
            </div>
        </form>
    </div>

    <script>
      let sessionLimit = 0;

        document.getElementById('package_id').addEventListener('change', function () {
            let selected = this.options[this.selectedIndex];

            // Fungsi untuk Capitalize Setiap Perkataan
            function capitalizeWords(str) {
                return str.replace(/\b\w/g, char => char.toUpperCase());
            }

            // Assign value dengan formatting
            document.getElementById('package_type').value = selected.dataset.type 
                ? capitalizeWords(selected.dataset.type) 
                : '';

            document.getElementById('package_rate').value = selected.dataset.rate 
                ? 'RM ' + selected.dataset.rate 
                : '';

            document.getElementById('unit').value = selected.dataset.unit 
                ? capitalizeWords(selected.dataset.unit) 
                : '';

            document.getElementById('duration_per_sessions').value = selected.dataset.duration || '';
            document.getElementById('session_per_week').value = selected.dataset.session || '';

            sessionLimit = parseInt(selected.dataset.session) || 0;

            loadClasses(selected.value);
        });

        function loadClasses(packageId) {
            console.log("Loading classes for package:", packageId); // Debug
            fetch(`/admin/api/package/${packageId}/classes`)
                .then(response => response.json())
                .then(data => {
                    console.log("API response:", data); // Debug

                    let tbody = document.getElementById("classTableBody");
                    tbody.innerHTML = "";

                    if (!Array.isArray(data) || data.length === 0) {
                        tbody.innerHTML = `<tr>
                            <td colspan="8" class="text-center py-3 text-gray-500">No classes available</td>
                        </tr>`;
                        return;
                    }

                    data.forEach(cls => {
                        console.log("Row data:", cls); // Debug
                        let isAvailable = cls.status === "Available";

                        tbody.innerHTML += `
                            <tr>
                                <td class="px-4 py-3">
                                    <input 
                                        type="checkbox" 
                                        class="class-checkbox" 
                                        name="class_ids[]" 
                                        value="${cls.class_id}" 
                                        ${isAvailable ? '' : 'disabled'}>
                                </td>
                                <td class="px-4 py-3">${cls.class_name}</td>
                                <td class="px-4 py-3">${cls.room}</td>
                                <td class="px-4 py-3">${cls.day}</td>
                                <td class="px-4 py-3">${cls.start_time?.substring(0,5) || ''}</td>
                                <td class="px-4 py-3">${cls.end_time?.substring(0,5) || ''}</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full ${isAvailable ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'}">
                                        ${cls.status}
                                    </span>
                                </td>
                            </tr>
                        `;
                    });

                    attachCheckboxLimit();
                })
                .catch(err => {
                    console.error("Error fetching classes:", err);
                });
        }

        function attachCheckboxLimit() {
            let checkboxes = document.querySelectorAll('.class-checkbox');
            checkboxes.forEach(cb => {
                cb.addEventListener('change', function () {
                    let checked = document.querySelectorAll('.class-checkbox:checked').length;

                    // Lock checkboxes if exact limit reached
                    if (checked >= sessionLimit) {
                        checkboxes.forEach(box => {
                            if (!box.checked) {
                                box.disabled = true;
                            }
                        });
                    } else {
                        checkboxes.forEach(box => {
                            if (box.closest('tr').querySelector('span').innerText === "Available") {
                                box.disabled = false;
                            }
                        });
                    }
                });
            });

            // Prevent form submit if not exact number selected
            document.getElementById("packageForm").addEventListener("submit", function (e) {
                let checked = document.querySelectorAll('.class-checkbox:checked').length;
                if (checked !== sessionLimit) {
                    e.preventDefault();

                    Swal.fire({
                        icon: 'warning',
                        // title: 'Invalid Selection',
                        title: 'Pemilihan Tidak Sah',
                        // text: `You must select exactly ${sessionLimit} classes.`,
                        text: `Anda mesti memilih tepat ${sessionLimit} kelas.`,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Okay'
                    });
                }
            });
        }
    </script>


</x-admin-layout>