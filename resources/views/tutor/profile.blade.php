<x-tutor-layout :title="'Kemaskini Profil'">
    <!-- Header with Title (left) and Breadcrumb (right) -->
    <div class="flex items-center justify-between mb-4">
        <!-- Left: Page Title -->
        <h2 class="text-xl font-medium text-gray-800">Kemaskini Profil</h2>

        <!-- Right: Breadcrumb -->
        <nav class="text-sm text-gray-500">
            <ol class="flex space-x-2">
                <li><a href="{{ route('tutor.dashboard') }}" class="hover:text-green-600">Dashboard</a></li>
                <li>/</li>
                <li class="text-green-600">Kemaskini Profil</li>
            </ol>
        </nav>
    </div>

    <!-- Personal Details -->
    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('tutor.profile.update', $tutorProfile->tutor_id) }}" method="POST" class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Left Section -->
            <div class="lg:col-span-1">
                {{-- <h2 class="text-lg font-semibold">Personal Details</h2> --}}
                <h2 class="text-lg font-semibold text-gray-800">Butiran Peribadi</h2>
                <p class="text-sm text-gray-500 mb-4">Sila isi semua butiran.</p>

                <!-- Upload Profile Picture -->
                <div class="flex items-center gap-4">
                    <!-- Avatar Container -->
                    <div class="relative w-40 h-40">
                        <img src="{{ $tutorProfile->profile 
                        ? asset('storage/'.$tutorProfile->profile)
                        : 'https://ui-avatars.com/api/?name='.urlencode($tutorProfile->username).'&background=F97316&color=fff' }}" 
                        class="w-40 h-40 rounded-full border-2 border-gray-200 object-cover cursor-pointer" for="profileUpload" alt="Avatar">
                    </div>
                </div>
            </div>

            <!-- Right Section (Form) -->
           <div class="lg:col-span-2">
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">

                    <div class="md:col-span-3">
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Pertama</label>
                        <input type="text" id="first_name" name="first_name" placeholder="Muhammad Ali" value="{{ $tutorProfile->first_name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Akhir</label>
                        <input type="text" id="last_name" name="last_name" placeholder="Bin Ahmad" value="{{ $tutorProfile->last_name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Nama Pengguna</label>
                        <input type="text" id="username" name="username" placeholder="Ustaz Jazmy" value="{{ $tutorProfile->username }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="ic_number" class="block mb-2 text-sm font-medium text-gray-900">Nombor Kad Pengenalan</label>
                        <input type="text" id="ic_number" name="ic_number" placeholder="990101145678" value="{{ $tutorProfile->ic_number }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">E-mel</label>
                        <input type="email" id="email" name="email" placeholder="nama@gmail.com" value="{{ $tutorProfile->email }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" readonly>
                    </div>

                    {{-- phone_number --}}
                    <div class="md:col-span-3">
                        <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900">Nombor Telefon</label>
                        <input type="text" id="phone_number" name="phone_number" placeholder="0123456789" value="{{ $tutorProfile->phone_number }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="birth_date" class="block mb-2 text-sm font-medium text-gray-900">Tarikh Lahir</label>
                        <input type="date" id="birth_date" name="birth_date" value="{{ $tutorProfile->birth_date }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="age" class="block mb-2 text-sm font-medium text-gray-900">Umur</label>
                        <input type="number" id="age" name="age" placeholder="15" value="{{ $tutorProfile->age }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900">Jantina</label>
                        {{-- show the curretn gender in the selection --}}
                        <input type="text" id="gender" name="gender" value="{{ ucfirst($tutorProfile->gender) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" readonly>
                    </div>

                    <div class="md:col-span-3">
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Peranan</label>
                        <input type="text" id="role" name="role" value="{{ ucfirst($tutorProfile->role) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" readonly>
                    </div>

                    <div class="md:col-span-3">
                        {{-- profile only insert image--}}
                        <label for="profile" class="block mb-2 text-sm font-medium text-gray-900">Gambar Profil</label>
                        <input type="file" id="profile" name="profile" accept="image/*" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" >
                    </div>

                    <div class="md:col-span-6">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Alamat Rumah</label>
                        <textarea id="address" name="address" rows="3" placeholder="Masukkan alamat penuh" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">{{ old('address', $tutorProfile->address) }}</textarea>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="md:col-span-5 text-right mt-4">
                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm py-2 px-4 text-center">Kemaskini Maklumat</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Education Background -->
    <div class="bg-white rounded-lg shadow p-6 mt-8">
        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">

            <!-- Left Section -->
            <div>
                <h2 class="text-lg font-semibold text-gray-800">Latar Belakang Pendidikan</h2>
                <p class="text-sm text-gray-500 mb-4">Sila isi semua butiran.</p>
            </div>

            <!-- Right Section (Form) -->
            <form action="{{ route('tutor.profile.education.update', $tutorProfile->tutor_id) }}" method="POST" class="lg:col-span-2" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">

                    <div class="md:col-span-3">
                        <label for="university" class="block mb-2 text-sm font-medium text-gray-900">Nama Universiti</label>
                        <input type="text" id="university" name="university" placeholder="Universiti Kebangsaan Malaysia" value="{{ $tutorProfile->university }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="programme" class="block mb-2 text-sm font-medium text-gray-900">Bidang Pengajian</label>
                        <input type="text" id="programme" name="programme" placeholder="Undang-undang Syariah" value="{{ $tutorProfile->programme }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="grade" class="block mb-2 text-sm font-medium text-gray-900">Gred</label>
                        <input type="number" id="grade" name="grade" placeholder="4.0" value="{{ $tutorProfile->grade }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" min="0.00" max="4.00" step="0.01" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="resume" class="block mb-2 text-sm font-medium text-gray-900">Muat Naik Resume (PDF)</label>
                        <input type="file" id="resume" name="resume" accept="application/pdf" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                        {{-- link to preview upload resume --}}
                        {{-- link preview resume --}}
                        @if ($tutorProfile->resume)
                            <div class="mt-2">
                                <a href="{{ asset('storage/' . $tutorProfile->resume) }}" target="_blank"
                                    class="text-green-600 hover:underline text-sm font-medium">
                                    Lihat Resume
                                </a>
                            </div>
                        @endif
                    </div>

                    {{-- bg_description --}}
                    <div class="md:col-span-6">
                        <label for="bg_description" class="block mb-2 text-sm font-medium text-gray-900">Penerangan Latar Belakang</label>
                        <textarea id="bg_description" name="bg_description" rows="4" placeholder="Sila terangkan latar belakang pendidikan anda" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-green-500 focus:border-green-500 block w-full p-2.5">{{ old('address', $tutorProfile->bg_description) }}</textarea>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="md:col-span-5 text-right mt-4">
                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm py-2 px-4 text-center">Kemaskini Maklumat</button>
                </div>
            </form>
        </div>
    </div>
</x-tutor-layout>