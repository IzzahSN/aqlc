<x-tutor-layout :title="'Profile'">
    <!-- Header with Title (left) and Breadcrumb (right) -->
    <div class="flex items-center justify-between mb-4">
        <!-- Left: Page Title -->
        <h2 class="text-xl font-medium text-gray-800">Profile Setting</h2>

        <!-- Right: Breadcrumb -->
        <nav class="text-sm text-gray-500">
            <ol class="flex space-x-2">
                <li><a href="{{ route('tutor.dashboard') }}" class="hover:text-green-600">Dashboard</a></li>
                <li>/</li>
                <li>Profile</li>
            </ol>
        </nav>
    </div>

    <!-- Personal Details -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">

            <!-- Left Section -->
            <div>
                <h2 class="text-lg font-semibold">Personal Details</h2>
                <p class="text-sm text-gray-500 mb-4">Please fill out all the fields.</p>

                <!-- Upload Profile Picture -->
                <div class="flex items-center gap-4">
                    <!-- Avatar Container -->
                    <div class="relative w-30 h-30">
                        <!-- Profile Picture -->
                        <img id="profilePreview"
                            src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                            class="w-30 h-30 rounded-full border-2 border-gray-200 object-cover"
                            alt="User" />

                        <!-- Edit Icon (Trigger File Upload) -->
                        <label for="profileUpload" class="absolute bottom-0 right-0 bg-gray-500 text-white p-1.5 rounded-full shadow cursor-pointer hover:bg-gray-600">
                            <!-- Heroicon pencil -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 13l6.232-6.232a2.5 2.5 0 113.536 3.536L12.536 16.5H9v-3.5z" />
                            </svg>
                        </label>

                        <!-- Hidden File Input -->
                        <input id="profileUpload" type="file" name="profile_picture" accept="image/*" class="hidden" onchange="previewProfile(event)" />
                    </div>
                </div>

                <script>
                    function previewProfile(event) {
                        const output = document.getElementById('profilePreview');
                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.onload = () => URL.revokeObjectURL(output.src); // cleanup memory
                    }
                </script>

            </div>

            <!-- Script for Preview -->
            <script>
                function previewProfile(event) {
                    const output = document.getElementById('profilePreview');
                    output.src = URL.createObjectURL(event.target.files[0]);
                    output.onload = () => URL.revokeObjectURL(output.src); // free memory
                };
            </script>


            <!-- Right Section (Form) -->
            <form id="tutorForm" class="lg:col-span-2">
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">

                    <div class="md:col-span-3">
                        <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">First Name</label>
                        <input type="text" id="first_name" name="first_name" placeholder="Ali" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
                        <input type="text" id="last_name" name="last_name" placeholder="Ahmad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                        <input type="text" id="username" name="username" placeholder="Ustaz Jazmy" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="email" id="email" name="email" placeholder="jazmy@gmail.com" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="ic_number" class="block mb-2 text-sm font-medium text-gray-900">IC Number</label>
                        <input type="text" id="ic_number" name="ic_number" placeholder="990101-14-5678" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="age" class="block mb-2 text-sm font-medium text-gray-900">Age</label>
                        <input type="number" id="age" name="age" placeholder="15" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="birth_date" class="block mb-2 text-sm font-medium text-gray-900">Birth Date</label>
                        <input type="date" id="birth_date" name="birth_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900">Gender</label>
                        <select id="gender" name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>

                    <div class="md:col-span-3">
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900">Role</label>
                        <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            <option value="">Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="tutor">Tutor</option>
                        </select>
                    </div>

                    <div class="md:col-span-3">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                        <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            <option value="">Select Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <div class="md:col-span-6">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Address</label>
                        <textarea id="address" name="address" rows="3" placeholder="Enter full address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required></textarea>
                    </div>

                </div>

                <!-- Submit Button -->
                <div class="md:col-span-5 text-right mt-4">
                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm py-2 px-4 text-center">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Education Background -->
    <div class="bg-white rounded-lg shadow p-6 mt-8">
        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">

            <!-- Left Section -->
            <div>
                <h2 class="text-lg font-semibold">Education Background</h2>
                <p class="text-sm text-gray-500 mb-4">Please fill out all the fields.</p>
            </div>

            <!-- Script for Preview -->
            <script>
                function previewProfile(event) {
                    const output = document.getElementById('profilePreview');
                    output.src = URL.createObjectURL(event.target.files[0]);
                    output.onload = () => URL.revokeObjectURL(output.src); // free memory
                };
            </script>


            <!-- Right Section (Form) -->
            <form id="tutorForm" class="lg:col-span-2">
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">

                    <div class="md:col-span-3">
                        <label for="university" class="block mb-2 text-sm font-medium text-gray-900">University</label>
                        <select id="university" name="university" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                            <option value="">Select University</option>
                            <option value="Universiti Malaya">Universiti Malaya</option>
                            <option value="Universiti Kebangsaan Malaysia">Universiti Kebangsaan Malaysia</option>
                        </select>
                    </div>

                    <div class="md:col-span-3">
                        <label for="programme" class="block mb-2 text-sm font-medium text-gray-900">Programme</label>
                        <input type="text" id="programme" name="programme" placeholder="Bachelor of Quran Sunnah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="grade" class="block mb-2 text-sm font-medium text-gray-900">Grade</label>
                        <input type="email" id="grade" name="grade" placeholder="4.0" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>

                    <div class="md:col-span-3">
                        <label for="resume" class="block mb-2 text-sm font-medium text-gray-900">Upload Resume (PDF)</label>
                        <input type="file" id="resume" name="resume" accept="application/pdf" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" required>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="md:col-span-5 text-right mt-4">
                    <button type="submit" id="submitForm" class="text-white bg-green-600 hover:bg-green-700 font-medium rounded-lg text-sm py-2 px-4 text-center">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</x-tutor-layout>