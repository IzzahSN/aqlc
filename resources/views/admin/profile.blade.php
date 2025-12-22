<x-admin-layout :title="'Kemaskini Profil'">
    <!-- Header with Title (left) and Breadcrumb (right) -->
    <div class="flex items-center justify-between mb-4">
        <!-- Left: Page Title -->
        <h2 class="text-xl font-medium text-gray-800">Tetapan Profil</h2>

        <!-- Right: Breadcrumb -->
        <nav class="text-sm text-gray-500">
            <ol class="flex space-x-2">
                <li><a href="{{ route('admin.dashboard') }}" class="hover:text-green-600">Dashboard</a></li>
                <li>/</li>
                <li class="text-green-600">Profil</li>
            </ol>
        </nav>
    </div>

    <!-- Personal Details -->
    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.profile.update', $adminProfile->tutor_id) }}" method="POST" class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Left Section -->
            <div class="lg:col-span-1">
                <h2 class="text-lg font-semibold">Butiran Peribadi</h2>
                <p class="text-sm text-gray-500 mb-4">Sila isi semua butiran.</p>

                <!-- Upload Profile Picture -->
                <div class="flex items-center gap-4">
                    <!-- Avatar Container -->
                    <div class="relative w-40 h-40">
                        <img src="{{ $adminProfile->profile 
                        ? asset('storage/'.$adminProfile->profile)
                        : 'https://ui-avatars.com/api/?name='.urlencode($adminProfile->username).'&background=06B6D4&color=fff' }}" 
                        class="w-40 h-40 rounded-full border-2 border-gray-200 object-cover cursor-pointer" for="profileUpload" alt="Avatar">
                    </div>
                </div>
            </div>

            <!-- Right Section (Form) -->
           <div class="lg:col-span-2">
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">

                    <div class="md:col-span-3">
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Pertama</label>
                        <input type="text" id="first_name" name="first_name" placeholder="Muhammad Ali" value="{{ $adminProfile->first_name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Akhir</label>
                        <input type="text" id="last_name" name="last_name" placeholder="Bin Ahmad" value="{{ $adminProfile->last_name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Nama Pengguna</label>
                        <input type="text" id="username" name="username" placeholder="Ustaz Ali" value="{{ $adminProfile->username }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="ic_number" class="block mb-2 text-sm font-medium text-gray-900">Nombor Kad Pengenalan</label>
                        <input type="text" id="ic_number" name="ic_number" placeholder="990101145678" value="{{ $adminProfile->ic_number }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">E-mel</label>
                        <input type="email" id="email" name="email" placeholder="nama@gmail.com" value="{{ $adminProfile->email }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" readonly>
                    </div>

                    {{-- phone_number --}}
                    <div class="md:col-span-3">
                        <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900">Nombor Telefon</label>
                        <input type="text" id="phone_number" name="phone_number" placeholder="0123456789" value="{{ $adminProfile->phone_number }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="birth_date" class="block mb-2 text-sm font-medium text-gray-900">Tarikh Lahir</label>
                        <input type="date" id="birth_date" name="birth_date" value="{{ $adminProfile->birth_date }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="age" class="block mb-2 text-sm font-medium text-gray-900">Umur</label>
                        <input type="number" id="age" name="age" placeholder="15" value="{{ $adminProfile->age }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900">Jantina</label>
                        {{-- show the curretn gender in the selection --}}
                        <input type="text" id="gender" name="gender" value="{{ ucfirst($adminProfile->gender) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" readonly>
                    </div>

                    <div class="md:col-span-3">
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Peranan</label>
                        <input type="text" id="role" name="role" value="{{ ucfirst($adminProfile->role) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" readonly>
                    </div>

                    {{-- bank name --}}
                    <div class="md:col-span-3">
                        <label for="bank_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Bank</label>
                        <select id="bank_name" name="bank_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                            <option value="">-- Pilih Bank --</option>
                            @foreach($banks as $bank)
                                <option value="{{ $bank }}" {{ $adminProfile->bank_name == $bank ? 'selected' : '' }}>{{ $bank }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- acc number --}}
                    <div class="md:col-span-3">
                        <label for="acc_number" class="block mb-2 text-sm font-medium text-gray-900">Nombor Akaun</label>
                        <input type="text" id="acc_number" name="acc_number" placeholder="1234567890" value="{{ $adminProfile->acc_number }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" >
                    </div>

                    <div class="md:col-span-3">
                        {{-- profile only insert image--}}
                        <label for="profile" class="block mb-2 text-sm font-medium text-gray-900">Gambar Profil</label>
                        <input type="file" id="profile" name="profile" accept="image/*" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" >
                    </div>

                    <div class="md:col-span-6">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Alamat Rumah</label>
                        <textarea id="address" name="address" rows="3" placeholder="Masukkan alamat penuh" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">{{ old('address', $adminProfile->address) }}</textarea>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="md:col-span-5 text-right mt-4">
                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm py-2 px-4 text-center">Simpan Maklumat</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Education Background -->
    <div class="bg-white rounded-lg shadow p-6 mt-8">
        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">

            <!-- Left Section -->
            <div>
                <h2 class="text-lg font-semibold">Latar Belakang Pendidikan</h2>
                <p class="text-sm text-gray-500 mb-4">Sila isi semua butiran.</p>
            </div>

            <!-- Right Section (Form) -->
            <form action="{{ route('admin.profile.education.update', $adminProfile->tutor_id) }}" method="POST" class="lg:col-span-2" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">

                    <div class="md:col-span-3">
                        <label for="university" class="block mb-2 text-sm font-medium text-gray-900">Universiti</label>
                        <input type="text" id="university" name="university" placeholder="Universiti Kebangsaan Malaysia" value="{{ $adminProfile->university }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="programme" class="block mb-2 text-sm font-medium text-gray-900">Bidang Pengajian</label>
                        <input type="text" id="programme" name="programme" placeholder="Undang-undang Syariah" value="{{ $adminProfile->programme }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="grade" class="block mb-2 text-sm font-medium text-gray-900">Gred</label>
                        <input type="number" id="grade" name="grade" placeholder="4.0" value="{{ $adminProfile->grade }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" min="0.00" max="4.00" step="0.01" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="resume" class="block mb-2 text-sm font-medium text-gray-900">Muat Naik Resume (PDF)</label>
                        <input type="file" id="resume" name="resume" accept="application/pdf" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                        {{-- link to preview upload resume --}}
                        {{-- link preview resume --}}
                        @if ($adminProfile->resume)
                            <div class="mt-2">
                                <a href="{{ asset('storage/' . $adminProfile->resume) }}" target="_blank"
                                    class="text-green-600 hover:underline text-sm font-medium">
                                    Lihat Resume
                                </a>
                            </div>
                        @endif
                    </div>

                    {{-- bg_description --}}
                    <div class="md:col-span-6">
                        <label for="bg_description" class="block mb-2 text-sm font-medium text-gray-900">Penerangan Latar Belakang</label>
                        <textarea id="bg_description" name="bg_description" rows="4" placeholder="Sila terangkan latar belakang pendidikan anda" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-green-500 focus:border-green-500 block w-full p-2.5">{{ old('address', $adminProfile->bg_description) }}</textarea>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="md:col-span-5 text-right mt-4">
                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm py-2 px-4 text-center">Simpan Maklumat</button>
                </div>
            </form>
        </div>
    </div>

</x-admin-layout>