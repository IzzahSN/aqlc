<x-admin-layout :title="'Laporan Pelan Pengajian'">
    <!-- Header with Title (left) and Breadcrumb (right) -->
    <div class="flex items-center justify-between mb-4">
        <!-- Left: Page Title -->
        <h2 class="text-xl font-medium text-gray-800">Laporan Pelan Pengajian</h2>

        <!-- Right: Breadcrumb -->
        <nav class="text-sm text-gray-500">
            <ol class="flex space-x-2">
                <li><a href="{{ route('admin.report.index') }}" class="hover:text-green-600">Senarai Prestasi Pelajar</a></li>
                <li>/</li>
                <li class="text-green-600">Pelan Pengajian</li>
            </ol>
        </nav>
    </div>

    <!-- Lesson Plan Form -->
    <div class="bg-white rounded-lg shadow p-6">

        {{-- maklumat kelas [nama kelas dan tarikh] --}}
            <div class="mb-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="flex items-center p-3 bg-white border border-gray-200 rounded-lg shadow-sm">
                    <div class="flex-shrink-0 p-2 bg-green-50 rounded-lg text-green-600 mr-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider leading-none mb-1">Nama Kelas</p>
                        <p class="text-sm font-semibold text-gray-800">{{ $className }}</p>
                    </div>
                </div>

                <div class="flex items-center p-3 bg-white border border-gray-200 rounded-lg shadow-sm">
                    <div class="flex-shrink-0 p-2 bg-blue-50 rounded-lg text-blue-600 mr-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider leading-none mb-1">Tarikh Rekod</p>
                        <p class="text-sm font-semibold text-gray-800">{{ \Carbon\Carbon::parse($date)->format('d M Y, l') }}</p>
                    </div>
                </div>
            </div>
            
        <form action="{{ route('admin.report.lesson-plan.update', $lessonPlan->lesson_plan_id) }}" 
            method="POST" 
            enctype="multipart/form-data" 
            class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div>
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Tajuk</label>
                <input type="text" id="title" name="title"
                    placeholder="Hukum Mad Silah Qasirah"
                    value="{{ $lessonPlan->title }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
            </div>

            <!-- Upload Materials -->
            <div>
                <label for="materials" class="block mb-2 text-sm font-medium text-gray-900">Muat Naik Bahan Pengajaran</label>
                <input type="file" id="materials" name="materials"
                    accept=".pdf,image/*"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">

                <p class="mt-1 text-xs text-gray-500">Anda boleh memuat naik satu fail sahaja (imej atau PDF).</p>

                @if($lessonPlan->learning_materials)
                    <div class="mt-3">
                        @if(Str::endsWith($lessonPlan->learning_materials, '.pdf'))
                            <a href="{{ asset('storage/' . $lessonPlan->learning_materials) }}" target="_blank" class="text-green-600 underline text-sm">Lihat PDF Sedia Ada</a>
                        @else
                            <img src="{{ asset('storage/' . $lessonPlan->learning_materials) }}" class="w-24 h-24 object-cover rounded-lg border mt-2">
                        @endif
                    </div>
                @endif
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Keterangan</label>
                <textarea id="description" name="description" rows="3"
                        placeholder="Tulis keterangan ringkas mengenai pelan pengajian..."
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-green-500 focus:border-green-500 block w-full p-2.5">{{ $lessonPlan->description }}</textarea>
            </div>

            <!-- Submit -->
            <div class="flex justify-end">
                <button type="submit"
                        class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Kemaskini Maklumat
                </button>
            </div>
        </form>

    </div>
    <script>
        const input = document.getElementById('materials');
        const preview = document.getElementById('preview');
        let filesArray = [];

        input.addEventListener('change', () => {
            preview.innerHTML = "";
            filesArray = Array.from(input.files);

            filesArray.forEach((file, index) => {
                if (!file.type.startsWith("image/")) return;

                const reader = new FileReader();
                reader.onload = (e) => {
                    const div = document.createElement("div");
                    div.classList.add("relative", "w-24", "h-24");

                    div.innerHTML = `
                    <img src="${e.target.result}" class="w-full h-full object-cover rounded-lg border border-gray-50">
                    <button type="button" data-index="${index}" class="absolute top-0 right-0 bg-red-600 text-white rounded-full px-2 py-0.5 text-xs">✕</button>
                `;
                    preview.appendChild(div);
                };
                reader.readAsDataURL(file);
            });
        });

        // Remove file from list
        preview.addEventListener("click", (e) => {
            if (e.target.tagName === "BUTTON") {
                const index = e.target.dataset.index;
                filesArray.splice(index, 1);

                const dataTransfer = new DataTransfer();
                filesArray.forEach(f => dataTransfer.items.add(f));
                input.files = dataTransfer.files;

                input.dispatchEvent(new Event('change')); // refresh preview
            }
        });
    </script>
</x-admin-layout>