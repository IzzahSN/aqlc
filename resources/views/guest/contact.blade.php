<x-app-layout :title="'Home'">
    <!-- Contact Section -->
    <section class="relative bg-gray-50 py-8 sm:py-16 px-4 sm:px-6">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <!-- Title -->
            <div class="text-center mb-8 sm:mb-14">
                <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-800">
                    Get in Touch
                </h2>
                <p class="mt-3 text-gray-500 text-sm sm:text-base">Contact us for any inquiries or further information</p>
            </div>
            <!-- Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-10 items-center">

                <!-- Map -->
                <div class="rounded-2xl overflow-hidden shadow-lg border border-emerald-200">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1985.311792201525!2d101.693207!3d3.139003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x123456789abcdef!2sKuala%20Lumpur!5e0!3m2!1sen!2smy!4v00000000000"
                        width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <!-- Contact Info -->
                <div class="space-y-6 sm:space-y-10">
                    <!-- Address -->
                    <div>
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-700 mb-4">
                            Our Address
                        </h3>
                        <div class="flex items-start gap-3 sm:gap-4">
                            <div>
                                <svg class="shrink-0 size-4 sm:size-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                            </div>
                            <div>
                                <p class="text-gray-700 text-sm sm:text-base">Selangor, Malaysia</p>
                                <address class="mt-1 font-medium text-gray-900 not-italic text-sm sm:text-base">
                                    6-1, Jalan Villa Tropika 1,
                                    Jln Kampung Sg Tangkas,<br>
                                    43000 Kajang, Selangor
                                </address>
                            </div>
                        </div>
                    </div>

                    <!-- Contacts -->
                    <div>
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-700 mb-4">
                            Contact Us
                        </h3>
                        <div class="space-y-4 sm:space-y-6 flex flex-col sm:flex-row justify-between w-full sm:w-fit gap-6 sm:gap-10">
                            <!-- Email -->
                            <div class="flex items-start gap-3 sm:gap-4">
                                <div>
                                    <svg class="shrink-0 size-4 sm:size-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21.2 8.4c.5.38.8.97.8 1.6v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V10a2 2 0 0 1 .8-1.6l8-6a2 2 0 0 1 2.4 0l8 6Z"></path>
                                        <path d="m22 10-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 10"></path>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-700 text-sm sm:text-base">Email us</p>
                                    <a href="mailto:hello@example.com" class="font-medium text-gray-900 hover:underline text-sm sm:text-base">
                                        assiraaj@gmail.com
                                    </a>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="flex items-start gap-3 sm:gap-4">
                                <div>
                                    <svg class="shrink-0 size-4 sm:size-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-gray-700 text-sm sm:text-base">Call us</p>
                                    <a href="tel:+60123456789" class="font-medium text-gray-900 hover:underline text-sm sm:text-base">
                                        +60 12-345 6789
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Grid -->
        </div>
    </section>

    <!-- FAQ -->
    <section class="relative bg-gray-50 py-8 sm:py-16 px-4 sm:px-6">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <!-- Grid -->
            <div class="grid md:grid-cols-5 gap-8 sm:gap-12">

                <!-- Left Title Section -->
                <div class="md:col-span-2 flex justify-center">
                    <div class="max-w-sm">
                        <h2 class="text-2xl sm:text-3xl font-bold md:text-4xl lg:text-5xl md:leading-tight text-gray-800">
                            Frequently <span class="text-green-600">Asked</span> Questions
                        </h2>
                        <p class="mt-4 text-gray-600 text-sm sm:text-base">
                            Answers to the most common questions about our Quran learning programs.
                        </p>
                    </div>
                </div>
                <!-- End Col -->

                <!-- Right Accordion Section -->
                <div class="md:col-span-3">
                    <!-- Accordion -->
                    <div id="accordion-collapse" data-accordion="collapse" class="rounded-xl border border-gray-200 overflow-hidden shadow-sm">

                        <!-- Q1 -->
                        <h2 id="accordion-collapse-heading-1">
                            <button type="button" class="flex items-center justify-between w-full p-4 sm:p-5 font-medium text-gray-800 border-b border-gray-200 hover:bg-gray-50 transition gap-3 text-sm sm:text-base" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
                                <span>What courses are offered at the center?</span>
                                <svg data-accordion-icon class="w-4 h-4 rotate-180 shrink-0 text-gray-500 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                            <div class="p-4 sm:p-5 bg-gray-50">
                                <p class="text-gray-600 text-sm sm:text-base">
                                    We provide Quran recitation (tajweed), memorization (hifz), tafsir studies, and Islamic knowledge classes for all age groups, both online and in-person.
                                </p>
                            </div>
                        </div>

                        <!-- Q2 -->
                        <h2 id="accordion-collapse-heading-2">
                            <button type="button" class="flex items-center justify-between w-full p-4 sm:p-5 font-medium text-gray-800 border-b border-gray-200 hover:bg-gray-50 transition gap-3 text-sm sm:text-base" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                                <span>Do you offer online classes?</span>
                                <svg data-accordion-icon class="w-4 h-4 rotate-180 shrink-0 text-gray-500 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                            <div class="p-4 sm:p-5 bg-gray-50">
                                <p class="text-gray-600 text-sm sm:text-base">
                                    Yes, we offer flexible online Quran classes for students worldwide. Lessons are conducted via Zoom/Google Meet with experienced teachers.
                                </p>
                            </div>
                        </div>

                        <!-- Q3 -->
                        <h2 id="accordion-collapse-heading-3">
                            <button type="button" class="flex items-center justify-between w-full p-4 sm:p-5 font-medium text-gray-800 border-b-0 border-gray-200 hover:bg-gray-50 transition gap-3 text-sm sm:text-base" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
                                <span>What is the class schedule like?</span>
                                <svg data-accordion-icon class="w-4 h-4 rotate-180 shrink-0 text-gray-500 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                            <div class="p-4 sm:p-5 bg-gray-50">
                                <p class="text-gray-600 text-sm sm:text-base">
                                    We offer both weekday and weekend sessions, morning and evening slots, so students can choose a schedule that suits their lifestyle.
                                </p>
                            </div>
                        </div>

                    </div>
                    <!-- End Accordion -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Grid -->
        </div>
    </section>
</x-app-layout>