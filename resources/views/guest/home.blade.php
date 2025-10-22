<x-app-layout :title="'Home'">
    <!-- Hero Section -->
    <section class="relative bg-gray-50 py-8 sm:py-16 px-4 sm:px-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <!-- Text Section -->
                <div class="">
                    <h1 class="text-3xl md:text-5xl font-bold text-gray-900 leading-tight">
                        Begin Your <span class="text-green-600">Quranic Journey</span> Today
                    </h1>
                    <p class="mt-4 text-sm md:text-base text-gray-600">
                        Guided by experienced teachers, our centre provides personalized and group Quran learning programs designed to nurture knowledge, character, and love for the Quran.
                    </p>

                    <!-- Buttons -->
                    <div class="mt-6 flex flex-wrap gap-3">
                        <a href="#daftar"
                            class="inline-flex items-center justify-center px-4 py-2 text-xs sm:px-6 sm:py-3 sm:text-sm font-medium rounded-lg bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                            Register Now
                            <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Image -->
                <div class="relative flex justify-center">
                    <!-- Boy Image -->
                    <img class="relative z-10 w-48 h-48 sm:w-64 sm:h-64 md:w-80 md:h-80" src="/images/budak-lelaki.svg" alt="Pelajar mengaji Al-Quran">
                </div>
            </div>
        </div>
    </section>

   <!-- Statistic section -->
    <section class="relative bg-gray-50 px-4 sm:px-6 md:px-20">
    <div class="p-6 sm:p-8 bg-gradient-to-bl from-emerald-700 via-emerald-800 to-emerald-900 rounded-2xl shadow-lg">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 text-center">
        
        <!-- Stat 1 -->
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
            <p class="mt-1 text-sm md:text-base text-green-100">Qualified Tutors</p>
            </div>
        </div>

        <!-- Stat 2 -->
        <div class="flex flex-col items-center">
            <div class="flex justify-center items-center -space-x-4 sm:-space-x-6">
            <img class="w-10 h-10 md:w-14 md:h-14 rounded-full border-2 border-emerald-900 shadow-lg" src="https://images.unsplash.com/photo-1601935111741-ae98b2b230b0?auto=format&fit=facearea&facepad=2&w=320&h=320&q=80" alt="Avatar">
            <img class="w-10 h-10 md:w-14 md:h-14 rounded-full border-2 border-emerald-900 shadow-lg -mt-3 md:-mt-4" src="https://images.unsplash.com/photo-1570654639102-bdd95efeca7a?auto=format&fit=facearea&facepad=2&w=320&h=320&q=80" alt="Avatar">
            <img class="w-10 h-10 md:w-14 md:h-14 rounded-full border-2 border-emerald-900 shadow-lg" src="https://images.unsplash.com/photo-1679412330254-90cb240038c5?auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">
            </div>
            <div class="mt-3">
            <h3 class="text-2xl md:text-3xl font-bold text-white">50+</h3>
            <p class="mt-1 text-sm md:text-base text-green-100">Students Enrolled</p>
            </div>
        </div>

        <!-- Stat 3 -->
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
            <p class="mt-1 text-sm md:text-base text-green-100">Classes Conducted</p>
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
                        <div class="col-span-4">
                            <img class="rounded-2xl shadow-lg w-full h-auto" src="https://images.unsplash.com/photo-1606868306217-dbf5046868d2?ixlib=rb-4.0.3&auto=format&fit=crop&w=920&q=80" alt="Teaching">
                        </div>
                        <div class="col-span-3">
                            <img class="rounded-2xl shadow-lg w-full h-auto" src="https://images.unsplash.com/photo-1605629921711-2f6b00c6bbf4?ixlib=rb-4.0.3&auto=format&fit=crop&w=920&q=80" alt="Learning">
                        </div>
                        <div class="col-span-5">
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
                                Why Choose Us?
                            </h2>
                            <p class="text-gray-600 text-sm sm:text-base">
                                We are committed to providing the best Quran learning experience, tailored for individuals and families.
                            </p>
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
                                <span class="text-gray-700 text-sm sm:text-base">Flexible Schedule</span>
                            </li>

                            <li class="flex gap-x-3">
                                <span class="mt-1 w-5 h-5 sm:w-6 sm:h-6 flex justify-center items-center rounded-full bg-green-100 text-green-600">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <polyline points="20 6 9 17 4 12" />
                                    </svg>
                                </span>
                                <span class="text-gray-700 text-sm sm:text-base">Experienced Tutors</span>
                            </li>

                            <li class="flex gap-x-3">
                                <span class="mt-1 w-5 h-5 sm:w-6 sm:h-6 flex justify-center items-center rounded-full bg-green-100 text-green-600">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <polyline points="20 6 9 17 4 12" />
                                    </svg>
                                </span>
                                <span class="text-gray-700 text-sm sm:text-base">Conducive Learning Environment</span>
                            </li>

                            <li class="flex gap-x-3">
                                <span class="mt-1 w-5 h-5 sm:w-6 sm:h-6 flex justify-center items-center rounded-full bg-green-100 text-green-600">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <polyline points="20 6 9 17 4 12" />
                                    </svg>
                                </span>
                                <span class="text-gray-700 text-sm sm:text-base">Personalized Learning Plans</span>
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
    <section class="relative bg-gray-50 py-8 sm:py-16 px-4 sm:px-6">
        <div class="max-w-4xl mx-auto px-4 sm:px-6">
            <!-- Title -->
            <div class="text-center mb-8 sm:mb-14">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800">
                    Choose Your Learning Package
                </h2>
                <p class="mt-3 text-gray-500 text-sm sm:text-base">Flexible options designed for every student</p>
            </div>

            <!-- Grid -->
            <div class="grid gap-6 sm:gap-8 md:grid-cols-2">

                <!-- Annur Lite -->
                <div class="relative bg-white border border-gray-200 rounded-2xl shadow-md hover:shadow-lg transition p-6 sm:p-8">
                    <h3 class="text-lg sm:text-xl font-bold text-green-700">Annur Lite</h3>
                    <p class="text-sm text-gray-500">Group Class</p>

                    <div class="mt-4 sm:mt-6">
                        <span class="text-3xl sm:text-4xl font-bold text-gray-800">RM100</span>
                        <span class="text-gray-500 text-sm sm:text-base">/ month</span>
                    </div>

                    <ul class="mt-4 sm:mt-6 space-y-2 sm:space-y-3 text-gray-700 text-sm sm:text-base">
                        <li class="flex items-center gap-2">
                            <span class="text-green-600">✔</span> 3 classes per week
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-green-600">✔</span> 1 hour per session
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-green-600">✔</span> Recitation (Iqra & Quran)
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-green-600">✔</span> Tajweed lessons
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-green-600">✔</span> Lesson materials provided
                        </li>
                    </ul>

                    <div class="mt-6 sm:mt-8">
                        <button class="w-full py-2 sm:py-3 px-4 sm:px-5 rounded-xl bg-green-600 text-white font-medium hover:bg-green-700 transition text-sm sm:text-base">
                            Get Started
                        </button>
                    </div>
                </div>

                <!-- Annur Plus -->
                <div class="relative bg-white border border-gray-200 rounded-2xl shadow-md hover:shadow-lg transition p-6 sm:p-8">
                    <span class="absolute top-0 right-0 bg-yellow-500 text-white text-xs sm:text-sm font-medium py-1 sm:py-2 px-3 sm:px-4 rounded-bl-xl rounded-tr-xl">
                        Most popular
                    </span>
                    <h3 class="text-lg sm:text-xl font-bold text-green-700">Annur Plus</h3>
                    <p class="text-sm text-gray-500">Personal Class</p>

                    <div class="mt-4 sm:mt-6">
                        <span class="text-3xl sm:text-4xl font-bold text-gray-800">RM25.00</span>
                        <span class="text-gray-500 text-sm sm:text-base">/ session</span>
                    </div>

                    <ul class="mt-4 sm:mt-6 space-y-2 sm:space-y-3 text-gray-700 text-sm sm:text-base">
                        <li class="flex items-center gap-2">
                            <span class="text-green-600">✔</span> 30 minutes per session
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-green-600">✔</span> Flexible class session
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-green-600">✔</span> Recitation (Iqra & Quran)
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-green-600">✔</span> Tajweed lessons
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="text-green-600">✔</span> Lesson materials provided
                        </li>
                    </ul>

                    <div class="mt-6 sm:mt-8">
                        <button class="w-full py-2 sm:py-3 px-4 sm:px-5 rounded-xl bg-green-600 text-white font-medium hover:bg-green-700 transition text-sm sm:text-base">
                            Get Started
                        </button>
                    </div>
                </div>
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
            What Our Users Say
            </h2>

            <div class="grid gap-6 sm:gap-8 md:grid-cols-2 lg:grid-cols-3 text-left">
            
            <!-- Card 1 -->
            <div class="bg-white/90 backdrop-blur-md rounded-2xl shadow-md p-5 sm:p-6 border border-green-200 hover:scale-[1.02] hover:shadow-xl transition-all duration-300 text-gray-800">
                <p class="italic mb-4 text-sm sm:text-base">
                "This platform really helped me organize my learning progress. The
                reports are super clear and easy to understand!"
                </p>
                <div class="flex items-center gap-3 sm:gap-4">
                <img src="https://i.pravatar.cc/50" alt="user"
                    class="w-10 h-10 sm:w-12 sm:h-12 rounded-full shadow-md border border-green-300" />
                <div>
                    <h4 class="font-semibold text-sm sm:text-base">Sarah Johnson</h4>
                    <span class="text-xs sm:text-sm text-gray-600">Student</span>
                </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white/90 backdrop-blur-md rounded-2xl shadow-md p-5 sm:p-6 border border-green-200 hover:scale-[1.02] hover:shadow-xl transition-all duration-300 text-gray-800">
                <p class="italic mb-4 text-sm sm:text-base">
                "I love how simple and intuitive the design is. Even for tutors, it
                makes tracking lessons much easier."
                </p>
                <div class="flex items-center gap-3 sm:gap-4">
                <img src="https://i.pravatar.cc/51" alt="user"
                    class="w-10 h-10 sm:w-12 sm:h-12 rounded-full shadow-md border border-green-300" />
                <div>
                    <h4 class="font-semibold text-sm sm:text-base">Michael Lee</h4>
                    <span class="text-xs sm:text-sm text-gray-600">Tutor</span>
                </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white/90 backdrop-blur-md rounded-2xl shadow-md p-5 sm:p-6 border border-green-200 hover:scale-[1.02] hover:shadow-xl transition-all duration-300 text-gray-800">
                <p class="italic mb-4 text-sm sm:text-base">
                "The SMS notifications are a game changer! I never miss any updates
                about my child's progress anymore."
                </p>
                <div class="flex items-center gap-3 sm:gap-4">
                <img src="https://i.pravatar.cc/52" alt="user"
                    class="w-10 h-10 sm:w-12 sm:h-12 rounded-full shadow-md border border-green-300" />
                <div>
                    <h4 class="font-semibold text-sm sm:text-base">Amina Yusuf</h4>
                    <span class="text-xs sm:text-sm text-gray-600">Parent</span>
                </div>
                </div>
            </div>

            </div>
        </div>
        </div>
    </div>
    </section>

    <!-- Encouragement Section -->
    <section class="relative bg-gray-50 pt-12 sm:pt-20 pb-5 px-4 sm:px-6">
        <div class="max-w-4xl mx-auto">
            <!-- Banner -->
            <div class="relative bg-gradient-to-bl from-amber-400 via-amber-500 to-amber-600 rounded-2xl px-4 sm:px-8 md:px-12 grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8 items-center overflow-visible shadow-2xl">

                <!-- Left Content -->
                <div class="space-y-4 sm:space-y-6">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-emerald-900 leading-tight">
                        Enroll Your <br> <span class="text-gray-100">Child</span> Today
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
                    <p class="text-white/90 text-sm sm:text-base max-w-md">
                        Help your child learn the Quran with guidance from caring, experienced teachers.
                    </p>
                    <a href="#"
                        class="text-xs sm:text-sm font-semibold inline-block bg-emerald-900 text-white px-3 sm:px-4 py-2 rounded-full shadow-lg hover:bg-emerald-800 transition">
                        Join Us Now
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>