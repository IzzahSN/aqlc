<x-app-layout :title="'Home'">

    <!-- Statistic section -->
    <section class="relative bg-gray-50 dark:bg-neutral-950 py-16 px-20">
        <div class="p-6 bg-gradient-to-bl from-emerald-700 via-emerald-800 to-emerald-900 rounded-2xl">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-y-12 gap-x-10 text-center">
                <!-- Stats 1-->
                <div class="relative text-center flex flex-col items-center">
                    <!-- Icon -->
                    <div class="flex justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-15 h-15 text-yellow-500 "
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l2 2l4 -4" />
                        </svg>
                    </div>
                    <!-- Text -->
                    <div class="mt-3">
                        <h3 class="text-xl sm:text-3xl font-bold text-white">10+</h3>
                        <p class="mt-1 text-sm sm:text-base text-green-100">Qualified Tutors</p>
                    </div>
                </div>

                <!-- Stats 2-->
                <div class="relative text-center flex flex-col items-center">
                    <div class="flex justify-center items-center -space-x-9">
                        <img class="w-15 h-15 relative z-2 shrink-0 size-8 rounded-full shadow border-5 border-emerald-900" src="https://images.unsplash.com/photo-1601935111741-ae98b2b230b0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80" alt="Avatar">
                        <img class="w-15 h-15 relative z-1 shrink-0 size-8 rounded-full shadow -mt-7 border-5 border-emerald-900" src="https://images.unsplash.com/photo-1570654639102-bdd95efeca7a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80" alt="Avatar">
                        <img class="w-15 h-15 relative shrink-0 size-8 rounded-full shadow border-5 border-emerald-900" src="https://images.unsplash.com/photo-1679412330254-90cb240038c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80" alt="Avatar">
                    </div>
                    <!-- Text -->
                    <div class="mt-3">
                        <h3 class="text-xl sm:text-3xl font-bold text-white">50+</h3>
                        <p class="mt-1 text-sm sm:text-base text-green-100">Students Enrolled</p>
                    </div>
                </div>

                <!-- Stats 3-->
                <div class="relative text-center flex flex-col items-center">
                    <div class="flex justify-center items-center -space-x-5">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-15 h-15 icon icon-tabler icons-tabler-outline icon-tabler-calendar-clock text-yellow-500">
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
                        <h3 class="text-xl sm:text-3xl font-bold text-white">300+</h3>
                        <p class="mt-1 text-sm sm:text-base text-green-100">Classes Conducted</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="relative bg-gray-50 dark:bg-neutral-950 py-16 px-6">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-12 lg:gap-16 lg:items-center">

                <!-- Left Image Grid -->
                <div class="lg:col-span-7">
                    <div class="grid grid-cols-12 gap-4 sm:gap-6 items-center">
                        <div class="col-span-4">
                            <img class="rounded-2xl shadow-lg" src="https://images.unsplash.com/photo-1606868306217-dbf5046868d2?ixlib=rb-4.0.3&auto=format&fit=crop&w=920&q=80" alt="Teaching">
                        </div>
                        <div class="col-span-3">
                            <img class="rounded-2xl shadow-lg" src="https://images.unsplash.com/photo-1605629921711-2f6b00c6bbf4?ixlib=rb-4.0.3&auto=format&fit=crop&w=920&q=80" alt="Learning">
                        </div>
                        <div class="col-span-5">
                            <img class="rounded-2xl shadow-lg" src="https://images.unsplash.com/photo-1600194992440-50b26e0a0309?ixlib=rb-4.0.3&auto=format&fit=crop&w=920&q=80" alt="Environment">
                        </div>
                    </div>
                </div>
                <!-- End Left -->

                <!-- Right Content -->
                <div class="mt-10 lg:mt-0 lg:col-span-5">
                    <div class="space-y-6">
                        <!-- Title -->
                        <div class="space-y-4">
                            <h2 class="font-bold text-3xl lg:text-4xl text-gray-900 dark:text-white">
                                Why Choose Us?
                            </h2>
                            <p class="text-gray-600 dark:text-neutral-400">
                                We are committed to providing the best Quran learning experience, tailored for individuals and families.
                            </p>
                        </div>
                        <!-- End Title -->

                        <!-- List -->
                        <ul class="space-y-4">
                            <li class="flex gap-x-3">
                                <span class="mt-1 w-6 h-6 flex justify-center items-center rounded-full bg-green-100 text-green-600">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <polyline points="20 6 9 17 4 12" />
                                    </svg>
                                </span>
                                <span class="text-gray-700 dark:text-neutral-300 text-base">Flexible Schedule</span>
                            </li>

                            <li class="flex gap-x-3">
                                <span class="mt-1 w-6 h-6 flex justify-center items-center rounded-full bg-green-100 text-green-600">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <polyline points="20 6 9 17 4 12" />
                                    </svg>
                                </span>
                                <span class="text-gray-700 dark:text-neutral-300 text-base">Experienced Tutors</span>
                            </li>

                            <li class="flex gap-x-3">
                                <span class="mt-1 w-6 h-6 flex justify-center items-center rounded-full bg-green-100 text-green-600">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <polyline points="20 6 9 17 4 12" />
                                    </svg>
                                </span>
                                <span class="text-gray-700 dark:text-neutral-300 text-base">Conducive Learning Environment</span>
                            </li>

                            <li class="flex gap-x-3">
                                <span class="mt-1 w-6 h-6 flex justify-center items-center rounded-full bg-green-100 text-green-600">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <polyline points="20 6 9 17 4 12" />
                                    </svg>
                                </span>
                                <span class="text-gray-700 dark:text-neutral-300 text-base">Personalized Learning Plans</span>
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
    <section class="relative bg-gray-50 py-16 px-6">
        <div class="max-w-4xl mx-auto px-6">
            <!-- Title -->
            <div class="text-center mb-14">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                    Choose Your Learning Package
                </h2>
                <p class="mt-3 text-gray-500">Flexible options designed for every student</p>
            </div>

            <!-- Grid -->
            <div class="grid gap-8 md:grid-cols-2">

                <!-- Annur Lite -->
                <div class="relative bg-white border border-gray-200 rounded-2xl shadow-md hover:shadow-lg transition p-8">
                    <h3 class="text-xl font-bold text-green-700">Annur Lite</h3>
                    <p class="text-sm text-gray-500">Group Class</p>

                    <div class="mt-6">
                        <span class="text-4xl font-bold text-gray-800">RM100</span>
                        <span class="text-gray-500">/ month</span>
                    </div>

                    <ul class="mt-6 space-y-3 text-gray-700">
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

                    <div class="mt-8">
                        <button class="w-full py-3 px-5 rounded-xl bg-green-600 text-white font-medium hover:bg-green-700 transition">
                            Get Started
                        </button>
                    </div>
                </div>

                <!-- Annur Plus -->
                <div class="relative bg-white border border-gray-200 rounded-2xl shadow-md hover:shadow-lg transition p-8">
                    <span class="absolute top-0 right-0 bg-yellow-500 text-white text-sm font-medium py-2 px-4 rounded-bl-xl rounded-tr-xl">
                        Most popular
                    </span>
                    <h3 class="text-xl font-bold text-green-700">Annur Plus</h3>
                    <p class="text-sm text-gray-500">Personal Class</p>

                    <div class="mt-6">
                        <span class="text-4xl font-bold text-gray-800">RM25.00</span>
                        <span class="text-gray-500">/ session</span>
                    </div>

                    <ul class="mt-6 space-y-3 text-gray-700">
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

                    <div class="mt-8">
                        <button class="w-full py-3 px-5 rounded-xl bg-green-600 text-white font-medium hover:bg-green-700 transition">
                            Get Started
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Feedback Section-->
    <section class="relative bg-cover bg-center py-12 px-6"
        style="background-image: url('/green-bg.jpg');">
        <div class="absolute inset-0 bg-green-900/60"></div> <!-- Overlay hijau gelap -->

        <div class="relative max-w-6xl mx-auto px-6 text-white">
            <h2 class="text-3xl font-bold text-center mb-10">
                What Our Users Say
            </h2>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- Card 1 -->
                <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-md p-6 hover:shadow-lg transition text-gray-800">
                    <p class="italic mb-4">
                        "This platform really helped me organize my learning progress. The
                        reports are super clear and easy to understand!"
                    </p>
                    <div class="flex items-center gap-4">
                        <img src="https://i.pravatar.cc/50" alt="user"
                            class="w-12 h-12 rounded-full shadow" />
                        <div>
                            <h4 class="font-semibold">Sarah Johnson</h4>
                            <span class="text-sm text-gray-600">Student</span>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-md p-6 hover:shadow-lg transition text-gray-800">
                    <p class="italic mb-4">
                        "I love how simple and intuitive the design is. Even for tutors, it
                        makes tracking lessons much easier."
                    </p>
                    <div class="flex items-center gap-4">
                        <img src="https://i.pravatar.cc/51" alt="user"
                            class="w-12 h-12 rounded-full shadow" />
                        <div>
                            <h4 class="font-semibold">Michael Lee</h4>
                            <span class="text-sm text-gray-600">Tutor</span>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-md p-6 hover:shadow-lg transition text-gray-800">
                    <p class="italic mb-4">
                        "The SMS notifications are a game changer! I never miss any updates
                        about my child's progress anymore."
                    </p>
                    <div class="flex items-center gap-4">
                        <img src="https://i.pravatar.cc/52" alt="user"
                            class="w-12 h-12 rounded-full shadow" />
                        <div>
                            <h4 class="font-semibold">Amina Yusuf</h4>
                            <span class="text-sm text-gray-600">Parent</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</x-app-layout>