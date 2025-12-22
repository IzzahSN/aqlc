<x-app-layout :title="'Home'">
    <!-- Hero Section -->
    <section class="relative bg-gray-50 py-10 px-4 sm:px-6 mt-12 lg:mt-16">
        <div class="container max-w-7xl mx-auto flex flex-col items-center lg:flex-row lg:justify-between">
            <div class="max-w-2xl flex flex-col justify-center text-center lg:text-left intersect:motion-preset-slide-right">
                <h1 class="text-3xl md:text-5xl font-bold text-gray-900 leading-tight">
                    Mulakan <span class="text-green-600">Pembelajaran Quran</span> Anda Hari Ini
                </h1>
                <p class="mt-4 text-sm md:text-base text-gray-600">Dibimbing oleh guru yang berpengalaman, pusat kami menyediakan program pembelajaran Al-Quran secara peribadi dan berkumpulan yang direka untuk memupuk ilmu, sahsiah, dan kecintaan terhadap Al-Quran.</p>

                <div class="mt-6 flex flex-wrap gap-3 justify-center lg:justify-start">
                    <a href="#pakej"
                        class="inline-flex items-center justify-center px-4 py-2 text-xs sm:px-6 sm:py-3 sm:text-sm font-medium rounded-lg bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        Daftar Sekarang
                        <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <script>
                    document.querySelector('a[href="#pakej"]').addEventListener('click', function(e) {
                    e.preventDefault();
                    document.querySelector('#pakej').scrollIntoView({
                        behavior: 'smooth'
                    });
                    });
                </script>

            </div>

            <div class="relative flex flex-col items-center mt-8 lg:mt-0 intersect:motion-preset-slide-left">
                <img class="relative z-10 w-48 h-48 sm:w-64 sm:h-64 md:w-80 md:h-80" src="/images/budak-lelaki.svg" alt="Pelajar mengaji Al-Quran">
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="relative max-w-7xl mx-auto bg-gray-50 px-4 sm:px-6 md:px-20">
        <div class="p-6 sm:p-8 bg-gradient-to-bl from-emerald-700 via-emerald-800 to-emerald-900 rounded-2xl shadow-lg motion-preset-pop motion-duration-1000">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 text-center">
            
            <div class="flex flex-col items-center">
                <div class="flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-12 h-12 md:w-14 md:h-14 text-yellow-400"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l2 2l4 -4" />
                </svg>
                </div>
                <div class="mt-3">
                <h3 class="text-2xl md:text-3xl font-bold text-white">10+</h3>
                <p class="mt-1 text-sm md:text-base text-green-100">Guru Bertauliah</p>
                </div>
            </div>

            <div class="flex flex-col items-center">
                <div class="flex justify-center items-center -space-x-4 sm:-space-x-6">
                <img class="w-10 h-10 md:w-14 md:h-14 rounded-full border-2 border-emerald-900 shadow-lg" src="https://images.unsplash.com/photo-1601935111741-ae98b2b230b0?auto=format&fit=facearea&facepad=2&w=320&h=320&q=80" alt="Avatar">
                <img class="w-10 h-10 md:w-14 md:h-14 rounded-full border-2 border-emerald-900 shadow-lg -mt-3 md:-mt-4" src="https://images.unsplash.com/photo-1570654639102-bdd95efeca7a?auto=format&fit=facearea&facepad=2&w=320&h=320&q=80" alt="Avatar">
                <img class="w-10 h-10 md:w-14 md:h-14 rounded-full border-2 border-emerald-900 shadow-lg" src="https://images.unsplash.com/photo-1679412330254-90cb240038c5?auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">
                </div>
                <div class="mt-3">
                <h3 class="text-2xl md:text-3xl font-bold text-white">50+</h3>
                <p class="mt-1 text-sm md:text-base text-green-100">Pelajar Berdaftar</p>
                </div>
            </div>

            <div class="flex flex-col items-center">
                <div class="flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                    class="w-12 h-12 md:w-14 md:h-14 text-yellow-400">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10.5 21h-4.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v3" />
                    <path d="M16 3v4" />
                    <path d="M8 3v4" />
                    <path d="M4 11h10" />
                    <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                    <path d="M18 16.5v1.5l.5 .5" />
                </svg>
                </div>
                <div class="mt-3">
                <h3 class="text-2xl md:text-3xl font-bold text-white">300+</h3>
                <p class="mt-1 text-sm md:text-base text-green-100">Kelas Dikendalikan</p>
                </div>
            </div>

            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="relative bg-gray-50 py-8 sm:py-16 px-4 sm:px-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-12 lg:gap-8 lg:items-center">

                <!-- Left Image Grid -->
                <div class="lg:col-span-7">
                    <div class="grid grid-cols-12 gap-2 sm:gap-4 md:gap-6 items-center">
                        <div class="col-span-4 intersect:motion-preset-pop motion-duration-1000">
                            <img class="rounded-2xl shadow-lg w-full h-auto" src="https://images.unsplash.com/photo-1606868306217-dbf5046868d2?ixlib=rb-4.0.3&auto=format&fit=crop&w=920&q=80" alt="Teaching">
                        </div>
                        <div class="col-span-3 intersect:motion-preset-pop motion-duration-1000 motion-delay-200">
                            <img class="rounded-2xl shadow-lg w-full h-auto" src="https://images.unsplash.com/photo-1605629921711-2f6b00c6bbf4?ixlib=rb-4.0.3&auto=format&fit=crop&w=920&q=80" alt="Learning">
                        </div>
                        <div class="col-span-5 intersect:motion-preset-pop motion-duration-1000 motion-delay-400">
                            <img class="rounded-2xl shadow-lg w-full h-auto" src="https://images.unsplash.com/photo-1600194992440-50b26e0a0309?ixlib=rb-4.0.3&auto=format&fit=crop&w=920&q=80" alt="Environment">
                        </div>
                    </div>
                </div>
                <!-- End Left -->

                <!-- Right Content -->
                <div class="mt-8 lg:mt-0 lg:col-span-5">
                    <div class="space-y-4 sm:space-y-6">
                        <!-- Title -->
                        <div class="space-y-4">
                            <h2 class="font-bold text-2xl sm:text-3xl lg:text-4xl text-gray-900">
                                Mengapa Pilih Kami?
                            </h2>
                            <p class="text-gray-600 text-sm sm:text-base">Kami komited untuk menyediakan pengalaman pembelajaran Al-Quran yang terbaik, disesuaikan untuk individu dan keluarga.</p>
                        </div>
                        <!-- End Title -->

                        <!-- List -->
                        <ul class="space-y-3 sm:space-y-4">
                            <li class="flex gap-x-3">
                                <span class="mt-1 w-5 h-5 sm:w-6 sm:h-6 flex justify-center items-center rounded-full bg-green-100 text-green-600">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <polyline points="20 6 9 17 4 12" />
                                    </svg>
                                </span>
                                <span class="text-gray-700 text-sm sm:text-base">Jadual Fleksibel</span>
                            </li>

                            <li class="flex gap-x-3">
                                <span class="mt-1 w-5 h-5 sm:w-6 sm:h-6 flex justify-center items-center rounded-full bg-green-100 text-green-600">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <polyline points="20 6 9 17 4 12" />
                                    </svg>
                                </span>
                                <span class="text-gray-700 text-sm sm:text-base">Guru Berpengalaman</span>
                            </li>

                            <li class="flex gap-x-3">
                                <span class="mt-1 w-5 h-5 sm:w-6 sm:h-6 flex justify-center items-center rounded-full bg-green-100 text-green-600">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <polyline points="20 6 9 17 4 12" />
                                    </svg>
                                </span>
                                <span class="text-gray-700 text-sm sm:text-base">Persekitaran Pembelajaran Kondusif</span>
                            </li>

                            <li class="flex gap-x-3">
                                <span class="mt-1 w-5 h-5 sm:w-6 sm:h-6 flex justify-center items-center rounded-full bg-green-100 text-green-600">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <polyline points="20 6 9 17 4 12" />
                                    </svg>
                                </span>
                                <span class="text-gray-700 text-sm sm:text-base">Pelan Pembelajaran Peribadi</span>
                            </li>
                        </ul>
                        <!-- End List -->
                    </div>
                </div>
                <!-- End Right -->
            </div>
        </div>
    </section>

    <!-- Packages Section -->
    <section id="pakej" class="relative bg-gray-50 py-8 sm:py-16 px-4 sm:px-6">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            <!-- Title -->
            <div class="text-center mb-8 sm:mb-14">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800">
                    Pilih Pakej Pembelajaran Anda
                </h2>
                <p class="mt-3 text-gray-500 text-sm sm:text-base">Pilihan fleksibel yang direka untuk setiap pelajar</p>
            </div>

            <!-- Grid -->
            <div class="grid gap-6 sm:gap-8 md:grid-cols-2">
                @foreach ($packages as $package)
                <!-- Package -->
                <div class="relative bg-white border border-gray-200 rounded-2xl shadow-md hover:shadow-lg transition p-6 sm:p-8 intersect:motion-preset-pop motion-duration-1000">
                    @if ($highestEnrolledPackage && $package->package_id == $highestEnrolledPackage->package_id)
                        <span class="absolute top-0 right-0 bg-yellow-500 text-white text-xs sm:text-sm font-medium py-1 sm:py-2 px-3 sm:px-4 rounded-bl-xl rounded-tr-xl">
                            Paling popular
                        </span>
                    @endif

                    <h3 class="text-lg sm:text-xl font-bold text-green-700">{{ $package->package_name }}</h3>
                    <p class="text-sm text-gray-500">{{ ucfirst($package->package_type) }} Class</p>

                    <div class="mt-4 sm:mt-6">
                        <span class="text-3xl sm:text-4xl font-bold text-gray-800">RM{{ number_format($package->package_rate, 2) }}</span>
                        <span class="text-gray-500 text-sm sm:text-base">{{ $package->unit }}</span>
                    </div>

                    <ul class="mt-4 sm:mt-6 space-y-2 sm:space-y-3 text-gray-700 text-sm sm:text-base">
                        <li class="flex items-center gap-2">
                            {!! nl2br(e($package->details)) !!}
                        </li>
                    </ul>

                    <div class="mt-6 sm:mt-8">
                        <button class="w-full py-2 sm:py-3 px-4 sm:px-5 rounded-xl bg-green-600 text-white font-medium hover:bg-green-700 transition text-sm sm:text-base">
                            Daftar Sekarang
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Feedback Section-->
    <section class="relative bg-gray-50 py-12 sm:py-16 px-4 sm:px-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        
        <!-- Kotak dalam (bercorak + gradient + border lembut) -->
        <div class="relative rounded-2xl shadow-xl overflow-hidden px-6 sm:px-10 py-10 sm:py-16 border border-emerald-300/40 
                    bg-gradient-to-br from-emerald-800 via-emerald-900 to-green-950 text-white">
        
        <!-- Corak latar halus dalam kotak -->
        <div class="absolute inset-0 opacity-15 bg-[radial-gradient(circle_at_1px_1px,white_1px,transparent_0)] [background-size:22px_22px]"></div>
        
        <div class="relative max-w-6xl mx-auto text-center">
            <h2 class="text-2xl sm:text-3xl font-bold mb-6 sm:mb-10">
            Apa Kata Pengguna Kami
            </h2>

            <div class="grid gap-6 sm:gap-8 md:grid-cols-2 lg:grid-cols-3 text-left">
            
            <!-- Card 1 -->
            <div class="bg-white/90 backdrop-blur-md rounded-2xl shadow-md p-5 sm:p-6 border border-green-200 hover:scale-[1.02] hover:shadow-xl transition-all duration-300 text-gray-800">
                <p class="italic mb-4 text-sm sm:text-base">"Platform ini sangat membantu saya menyusun kemajuan pembelajaran saya. Laporannya sangat jelas dan mudah difahami!"
                </p>
                <div class="flex items-center gap-3 sm:gap-4">
                <img src="https://i.pravatar.cc/50" alt="user"
                    class="w-10 h-10 sm:w-12 sm:h-12 rounded-full shadow-md border border-green-300" />
                <div>
                    <h4 class="font-semibold text-sm sm:text-base">Faiz Azhan</h4>
                    <span class="text-xs sm:text-sm text-gray-600">Pelajar</span>
                </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white/90 backdrop-blur-md rounded-2xl shadow-md p-5 sm:p-6 border border-green-200 hover:scale-[1.02] hover:shadow-xl transition-all duration-300 text-gray-800">
                <p class="italic mb-4 text-sm sm:text-base">
                "Saya suka reka bentuk yang ringkas dan intuitif. Malah bagi guru, ia menjadikan penjejakan pelajaran lebih mudah."
                </p>
                <div class="flex items-center gap-3 sm:gap-4">
                <img src="https://i.pravatar.cc/51" alt="user"
                    class="w-10 h-10 sm:w-12 sm:h-12 rounded-full shadow-md border border-green-300" />
                <div>
                    <h4 class="font-semibold text-sm sm:text-base">Ustaz Hareez</h4>
                    <span class="text-xs sm:text-sm text-gray-600">Guru</span>
                </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white/90 backdrop-blur-md rounded-2xl shadow-md p-5 sm:p-6 border border-green-200 hover:scale-[1.02] hover:shadow-xl transition-all duration-300 text-gray-800">
                <p class="italic mb-4 text-sm sm:text-base">
                "Pemberitahuan SMS benar-benar mengubah keadaan! Saya tidak pernah terlepas sebarang kemas kini tentang kemajuan anak saya lagi."
                </p>
                <div class="flex items-center gap-3 sm:gap-4">
                <img src="https://i.pravatar.cc/52" alt="user"
                    class="w-10 h-10 sm:w-12 sm:h-12 rounded-full shadow-md border border-green-300" />
                <div>
                    <h4 class="font-semibold text-sm sm:text-base">Aminah Yusuf</h4>
                    <span class="text-xs sm:text-sm text-gray-600">Ibu Bapa</span>
                </div>
                </div>
            </div>

            </div>
        </div>
        </div>
    </div>
    </section>

    <!-- Encouragement Section -->
    <section class="relative bg-gray-50 pt-12 pb-12 px-4 sm:px-6">
        <div class="max-w-4xl mx-auto">
            <!-- Banner -->
            <div class="relative bg-gradient-to-bl from-amber-400 via-amber-500 to-amber-600 rounded-2xl px-4 sm:px-8 md:px-12 grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8 items-center overflow-visible shadow-2xl motion-preset-oscillate motion-duration-1500">

                <!-- Left Content -->
                <div class="space-y-4 sm:space-y-6">
                    <h2 class="text-3xl font-extrabold text-emerald-900 leading-tight">
                        Daftarkan<span class="text-gray-200"> Anak Anda</span> Segera!
                    </h2>
                </div>

                <!-- Center Image -->
                <div class="flex justify-center relative">
                    <img src="/images/ustaz.svg"
                        alt="Quran Learning"
                        class="w-48 sm:w-64 md:w-80 object-contain -mt-8 sm:-mt-16 relative z-10" />
                </div>

                <!-- Right Content -->
                <div class="space-y-4 sm:space-y-6">
                    <p class="text-white/90 text-sm max-w-md">
                        Bantu anak anda belajar Al-Quran dengan bimbingan guru yang penyayang dan berpengalaman.
                    </p>
                    <a href="#pakej" class="text-xs sm:text-sm font-semibold inline-block bg-emerald-900 text-white px-3 sm:px-4 py-2 rounded-full shadow-lg hover:bg-emerald-800 transition">Sertai Kami Sekarang</a>

                    <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const scrollLink = document.querySelector('a[href="#pakej"]');
                        const target = document.querySelector('#pakej');

                        if (scrollLink && target) {
                            scrollLink.addEventListener('click', function (e) {
                                e.preventDefault();
                                target.scrollIntoView({
                                    behavior: 'smooth'
                                });
                            });
                        }
                    });
                    </script>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>