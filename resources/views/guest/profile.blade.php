<x-app-layout :title="'Profile'">
    <!-- About Us Section -->
    <section class="relative bg-gray-50 py-8 sm:py-16 px-4 sm:px-6 mt-6">
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
                <span class="text-emerald-600 font-semibold uppercase tracking-wide text-sm sm:text-base">Tentang Kami</span>
                <h2 class="mt-2 text-2xl sm:text-3xl md:text-4xl font-extrabold text-gray-900 leading-snug">
                    Membimbing Hati <br> Melalui Al-Quran
                </h2>
                <p class="mt-4 text-gray-600 leading-relaxed text-sm sm:text-base text-justify">
                    Di Pusat Pembelajaran Al-Quran kami, kami menyediakan ruang yang memupuk untuk kanak-kanak dan orang dewasa bagi mengukuhkan hubungan mereka dengan Al-Quran. Dengan guru yang berdedikasi, kami menumpukan pada bacaan yang betul, pemahaman, dan menanamkan kecintaan kepada Kitabullah.
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
                            <h3 class="text-base sm:text-lg font-bold text-gray-900">Misi Kami</h3>
                            <p class="mt-1 text-xs sm:text-sm text-gray-600">
Mencetus kecintaan Al-Quran melalui pengajaran bacaan tepat, pemahaman kukuh, dan penerapan nilai-nilai Islam dalam suasana yang kondusif.                            </p>
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
                            <h3 class="text-base sm:text-lg font-bold text-gray-900">Visi Kami</h3>
                            <p class="mt-1 text-xs sm:text-sm text-gray-600">
Mencetus kecintaan Al-Quran melalui pengajaran bacaan tepat, pemahaman kukuh, dan penerapan nilai-nilai Islam dalam suasana yang kondusif.                            </p>
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
                    Guru Kami
                </h2>
                <p class="mt-3 text-gray-500 text-sm sm:text-base">Guru berdedikasi membimbing pelajar dalam bacaan dan pemahaman Al-Quran.</p>
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                <!-- Card 1-->
                @foreach ($tutors as $tutor)                    
                <div class="flex flex-col rounded-2xl sm:rounded-4xl p-3 sm:p-4 md:p-6 bg-white border border-emerald-200/60 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-x-3 sm:gap-x-4">
                        <img src="{{ $tutor->profile 
                        ? asset('storage/'.$tutor->profile)
                        : 'https://ui-avatars.com/api/?name='.urlencode($tutor->username).'&background=F97316&color=fff' }}" 
                        class="rounded-full size-16 sm:size-20 shadow" for="profileUpload" alt="Avatar">
                        <div class="grow">
                            <h3 class="font-semibold text-gray-900 text-sm sm:text-base">
                                {{ $tutor->username }}
                            </h3>
                            <p class="text-xs tracking-wider text-gray-700">
                                {{ $tutor->university }}
                            </p>
                        </div>
                    </div>

                    <div class="mt-3">
                        <span class="inline-flex items-center px-2 py-1 text-xs font-medium rounded-md bg-emerald-50 text-emerald-700 shadow-emerald-500">
                            {{ $tutor->programme }}
                        </span>
                        <p class="mt-3 text-xs sm:text-sm text-gray-600">
                            <p class="mt-3 text-xs sm:text-sm text-gray-600">
                                {!! nl2br(e($tutor->bg_description)) !!}
                            </p>
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


</x-app-layout>