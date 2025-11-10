<footer class="bg-gradient-to-bl from-emerald-700 via-emerald-800 to-emerald-900 text-gray-200">
    <div class="mx-auto w-full max-w-screen-xl px-16 py-10">
        <div class="md:flex md:justify-between">
            <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 md:grid-cols-5 w-full">

                <!-- Brand (besar sikit: span 2 kolum) -->
                <div class="md:col-span-2">
                    <a href="#" class="flex items-center mb-3">
                        <img src="/images/logo-2.svg" class="h-10 mr-3 rounded-full" alt="Logo" />
                        <span class="self-center text-base font-semibold leading-tight">
                            Pusat Pengajian Quran <br> As-Siraaj
                        </span>
                    </a>
                    <p class="text-xs text-emerald-100 font-medium mb-4">
                        ⭐ Menyinari hidupmu di dunia dan di sana ⭐
                    </p>

                    <!-- Social Links -->
                    <div class="flex space-x-3">
                        <a href="#" class="p-2 rounded-full bg-emerald-600 hover:bg-emerald-500 transition">
                            <!-- facebook -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                            </svg>
                        </a>
                        <a href="#" class="p-2 rounded-full bg-emerald-600 hover:bg-emerald-500 transition">
                            <!-- insta -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 8a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                <path d="M16.5 7.5v.01" />
                            </svg>
                        </a>
                        <a href="#" class="p-2 rounded-full bg-emerald-600 hover:bg-emerald-500 transition">
                            <!-- youtube -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M2 8a4 4 0 0 1 4 -4h12a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-12a4 4 0 0 1 -4 -4v-8z" />
                                <path d="M10 9l5 3l-5 3z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Company -->
                <div>
                    <h2 class="mb-4 text-sm font-bold uppercase tracking-wide text-white">Pautan Pantas</h2>
                    <ul class="space-y-3 text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-white">Utama</a></li>
                        <li><a href="{{ route('profile') }}" class="hover:text-white">Tentang Kami</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-white">Hubungi Kami</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h2 class="mb-4 text-sm font-bold uppercase tracking-wide text-white">Hubungi Kami</h2>
                    <ul class="space-y-3 text-sm">
                        <li><a href="tel:0123456789" class="hover:text-white">012-3456789</a></li>
                        <li><a href="mailto:as-siraaj@gmail.com" class="hover:text-white">as-siraaj@gmail.com</a></li>
                        <li>
                            <p class="text-emerald-100">
                                6-1, Jalan Villa Tropika 1,<br>
                                Jln Kampung Sg Tangkas,<br>
                                43000 Kajang, Selangor
                            </p>
                        </li>
                    </ul>
                </div>

                <!-- Map -->
                <div>
                    <h2 class="mb-4 text-sm font-bold uppercase tracking-wide text-white">Cari Kami</h2>
                    <div class="rounded-lg overflow-hidden shadow">
                        <iframe src="https://maps.google.com/maps?q=Kajang%20Selangor&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            class="w-full h-32 border-0"></iframe>
                    </div>
                </div>
            </div>
        </div>


        <!-- Divider -->
        <hr class="my-8 border-emerald-600/50" />

        <!-- Bottom -->
        <div class="flex flex-col md:flex-row md:justify-between items-center gap-4">
            <span class="text-sm text-emerald-100">© {{ date('Y') }} Pusat Pengajian Quran As-Siraaj. Hak Cipta Terpelihara.</span>
            <span>Dasar Privasi |   Terma & Syarat</span>
        </div>
    </div>
</footer>