<x-app-layout :title="'Profile'">
    <!-- About Us Section -->
    <section class="relative bg-gray-50 py-8 sm:py-16 px-4 sm:px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 sm:gap-12 items-center px-4 sm:px-6">
            <!-- Left: Images -->
            <div class="relative flex flex-col items-center">

                <!-- Image -->
                <img class="relative z-10 w-48 h-48 sm:w-64 sm:h-64 md:w-auto md:h-auto"
                    src="/images/budak perempuan.svg"
                    alt="Pelajar mengaji Al-Quran">
            </div>

            <!-- Right: Content -->
            <div>
                <span class="text-emerald-600 font-semibold uppercase tracking-wide text-sm sm:text-base">About Us</span>
                <h2 class="mt-2 text-2xl sm:text-3xl md:text-4xl font-extrabold text-gray-900 leading-snug">
                    Guiding Hearts <br> Through the Quran
                </h2>
                <p class="mt-4 text-gray-600 leading-relaxed text-sm sm:text-base">
                    At our Quran Learning Centre, we provide a nurturing space for children and adults
                    to strengthen their connection with the Quran. With dedicated teachers, we focus
                    on proper recitation, understanding, and instilling love for the Book of Allah.
                </p>

                <!-- Mission & Vision -->
                <div class="mt-6 sm:mt-8 grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                    <!-- Mission -->
                    <div class="flex items-start space-x-3 sm:space-x-4">
                        <div class="flex-shrink-0 w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center rounded-xl bg-emerald-100 text-emerald-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c.379 0 .725.214.895.553l1.276 2.552
                       2.829.412a1 1 0 01.554 1.705l-2.048 1.996.483
                       2.815a1 1 0 01-1.451 1.054L12 18.347l-2.518
                       1.32a1 1 0 01-1.451-1.054l.483-2.815-2.048-1.996
                       a1 1 0 01.554-1.705l2.829-.412
                       1.276-2.552A1 1 0 0112 8z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-base sm:text-lg font-bold text-gray-900">Our Mission</h3>
                            <p class="mt-1 text-xs sm:text-sm text-gray-600">
                                To inspire a love for the Quran by teaching accurate recitation,
                                strong understanding, and Islamic values in a supportive environment.
                            </p>
                        </div>
                    </div>

                    <!-- Vision -->
                    <div class="flex items-start space-x-3 sm:space-x-4">
                        <div class="flex-shrink-0 w-10 h-10 sm:w-12 sm:h-12 flex items-center justify-center rounded-xl bg-emerald-100 text-emerald-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 sm:w-6 sm:h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477
                       0 8.268 2.943 9.542 7-1.274 4.057-5.065
                       7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-base sm:text-lg font-bold text-gray-900">Our Vision</h3>
                            <p class="mt-1 text-xs sm:text-sm text-gray-600">
                                To nurture future generations with strong Quranic foundations,
                                guiding them to live with faith, character, and excellence.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Tutors -->
    <section class="relative bg-gray-50 py-8 sm:py-16 px-4 sm:px-6">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <!-- Title -->
            <div class="text-center mb-8 sm:mb-14">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800">
                    Our Tutors
                </h2>
                <p class="mt-3 text-gray-500 text-sm sm:text-base">Dedicated teachers guiding students in Quran recitation and understanding</p>
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                <!-- Card 1-->
                <div class="flex flex-col rounded-2xl sm:rounded-4xl p-3 sm:p-4 md:p-6 bg-white border border-emerald-200/60 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-x-3 sm:gap-x-4">
                        <img class="rounded-full size-16 sm:size-20 shadow"
                            src="https://i.pravatar.cc/55"
                            alt="Foto Ustazah Aisyah Karim">
                        <div class="grow">
                            <h3 class="font-semibold text-gray-900 text-sm sm:text-base">
                                Ustazah Aisyah Karim
                            </h3>
                            <p class="text-xs tracking-wider text-gray-700">
                                Universiti Malaya
                            </p>
                        </div>
                    </div>

                    <div class="mt-3">
                        <span class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-emerald-50 text-emerald-700 shadow-emerald-500">
                            Ijazah Sarjana Muda Pengajian Islam
                        </span>
                        <p class="mt-3 text-xs sm:text-sm text-gray-600">
                            • Johan Tilawah Al-Quran 2023<br>
                            • Hafiz Quran
                        </p>
                    </div>
                </div>

                <!-- Card 1 -->
                <div class="flex flex-col rounded-2xl sm:rounded-4xl p-3 sm:p-4 md:p-6 bg-white border border-emerald-200/60 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-x-3 sm:gap-x-4">
                        <img class="rounded-full size-16 sm:size-20 shadow"
                            src="https://i.pravatar.cc/56"
                            alt="Foto Ustaz Ahmad Zulkifli">
                        <div class="grow">
                            <h3 class="font-semibold text-gray-900 text-sm sm:text-base">
                                Ustaz Ahmad Zulkifli
                            </h3>
                            <p class="text-xs tracking-wider text-gray-700">
                                Universiti Kebangsaan Malaysia
                            </p>
                        </div>
                    </div>

                    <div class="mt-3">
                        <span class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-emerald-50 text-emerald-700 shadow-emerald-500">
                            Ijazah Sarjana Muda Syariah & Undang-undang
                        </span>
                        <p class="mt-3 text-xs sm:text-sm text-gray-600">
                            • Pakar Fiqh Kontemporari<br>
                            • Pensyarah Jemputan di Masjid Negara
                        </p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="flex flex-col rounded-2xl sm:rounded-4xl p-3 sm:p-4 md:p-6 bg-white border border-emerald-200/60 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-x-3 sm:gap-x-4">
                        <img class="rounded-full size-16 sm:size-20 shadow"
                            src="https://i.pravatar.cc/57"
                            alt="Foto Ustazah Nurul Huda">
                        <div class="grow">
                            <h3 class="font-semibold text-gray-900 text-sm sm:text-base">
                                Ustazah Nurul Huda
                            </h3>
                            <p class="text-xs tracking-wider text-gray-700">
                                Universiti Islam Antarabangsa Malaysia
                            </p>
                        </div>
                    </div>

                    <div class="mt-3">
                        <span class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-emerald-50 text-emerald-700 shadow-emerald-500">
                            Ijazah Sarjana Muda Bahasa Arab & Kesusasteraan
                        </span>
                        <p class="mt-3 text-xs sm:text-sm text-gray-600">
                            • Penterjemah Kitab Klasik Arab<br>
                            • Pakar Nahu & Balaghah
                        </p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="flex flex-col rounded-2xl sm:rounded-4xl p-3 sm:p-4 md:p-6 bg-white border border-emerald-200/60 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-x-3 sm:gap-x-4">
                        <img class="rounded-full size-16 sm:size-20 shadow"
                            src="https://i.pravatar.cc/58"
                            alt="Foto Ustaz Farid Hakim">
                        <div class="grow">
                            <h3 class="font-semibold text-gray-900 text-sm sm:text-base">
                                Ustaz Farid Hakim
                            </h3>
                            <p class="text-xs tracking-wider text-gray-700">
                                Universiti Sains Islam Malaysia
                            </p>
                        </div>
                    </div>

                    <div class="mt-3">
                        <span class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-emerald-50 text-emerald-700 shadow-emerald-500">
                            Ijazah Sarjana Muda Dakwah & Pengurusan Islam
                        </span>
                        <p class="mt-3 text-xs sm:text-sm text-gray-600">
                            • Penceramah Motivasi Remaja<br>
                            • Penulis Buku “Muda & Iman”
                        </p>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="flex flex-col rounded-2xl sm:rounded-4xl p-3 sm:p-4 md:p-6 bg-white border border-emerald-200/60 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-x-3 sm:gap-x-4">
                        <img class="rounded-full size-16 sm:size-20 shadow"
                            src="https://i.pravatar.cc/59"
                            alt="Foto Ustazah Siti Mariam">
                        <div class="grow">
                            <h3 class="font-semibold text-gray-900 text-sm sm:text-base">
                                Ustazah Siti Mariam
                            </h3>
                            <p class="text-xs tracking-wider text-gray-700">
                                Universiti Putra Malaysia
                            </p>
                        </div>
                    </div>

                    <div class="mt-3">
                        <span class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-emerald-50 text-emerald-700 shadow-emerald-500">
                            Ijazah Sarjana Muda Pendidikan Islam
                        </span>
                        <p class="mt-3 text-xs sm:text-sm text-gray-600">
                            • Guru Kelas Tahfiz<br>
                            • Pakar Kaedah Pengajaran Al-Quran Kanak-kanak
                        </p>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="flex flex-col rounded-2xl sm:rounded-4xl p-3 sm:p-4 md:p-6 bg-white border border-emerald-200/60 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-x-3 sm:gap-x-4">
                        <img class="rounded-full size-16 sm:size-20 shadow"
                            src="https://i.pravatar.cc/60"
                            alt="Foto Ustaz Khairul Nizam">
                        <div class="grow">
                            <h3 class="font-semibold text-gray-900 text-sm sm:text-base">
                                Ustaz Khairul Nizam
                            </h3>
                            <p class="text-xs tracking-wider text-gray-700">
                                Al-Azhar University, Mesir
                            </p>
                        </div>
                    </div>

                    <div class="mt-3">
                        <span class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-emerald-50 text-emerald-700 shadow-emerald-500">
                            Ijazah Sarjana Muda Usuluddin
                        </span>
                        <p class="mt-3 text-xs sm:text-sm text-gray-600">
                            • Pakar Tafsir & Hadis<br>
                            • 10 Tahun Pengalaman Mengajar Pondok
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>


</x-app-layout>