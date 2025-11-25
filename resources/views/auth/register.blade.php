<x-app-layout :title="'Register'">
    <div class="min-h-screen flex">
        <!-- Left side (Register form) -->
        <div class="w-full lg:w-1/2 flex flex-col justify-center px-8 lg:px-20 bg-white">

            <!-- Back to Dashboard -->
            <a href="{{ route('home') }}" class="flex items-center text-sm text-gray-500 hover:text-gray-700 mb-6">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Menu Utama
            </a>

            <h2 class="text-3xl font-bold mb-2">Daftar</h2>
            <!-- change the sentences, said register as parent -->
            <p class="text-gray-500 mb-6">Sila isi butiran anda di bawah untuk mencipta akaun penjaga anda.</p>

            <!-- Register Form -->
            <form action="{{ route('register') }}" method="POST" class="space-y-6">
                @csrf
                <!-- First & Last Name -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700">Nama Pertama</label>
                        <input type="text" id="first_name" name="first_name" placeholder="Muhammad Ali"
                            class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" required>
                        </div>
                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Nama Akhir</label>
                        <input type="text" id="last_name" name="last_name" placeholder="Bin Abu Bakar"
                            class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" required>
                    </div>
                </div>

                <!-- Email & Phone Number -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">E-mel</label>
                        <input type="email" id="email" name="email" placeholder="nama@gmail.com"
                            class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" required>
                    </div>
                    <div>
                        <label for="phone_number" class="block text-sm font-medium text-gray-700">Nombor Telefon</label>
                        <input type="text" id="phone_number" name="phone_number" placeholder="01328997872"
                            class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" required>
                       </div>
                </div>

                <!-- IC -->
                <div class="relative">
                    <label for="ic_number" class="block text-sm font-medium text-gray-700">Nombor Kad Pengenalan</label>
                    <div class="relative mt-1">
                        <input type="text" id="ic_number" name="ic_number" placeholder="0908121018726" class="w-full px-4 py-2 pr-10 border border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500" required>

                        <!-- Tooltip Icon -->
                        <button type="button" data-tooltip-target="tooltip-ic"
                            class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                <path d="M12 17l0 .01" />
                                <path d="M12 13.5a1.5 1.5 0 0 1 1 -1.5a2.6 2.6 0 1 0 -3 -4" />
                            </svg>
                        </button>

                        <!-- Tooltip Message -->
                        <div id="tooltip-ic" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-xs font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-lg opacity-0 tooltip">
                            Gunakan nombor Kad Pengenalan anda sebagai kata laluan untuk log masuk.                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </div>
                </div>


                <!-- Button -->
                <button type="submit" class="w-full py-3 px-4 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold shadow-md transition">
                    Daftar
                </button>
            </form>

            <p class="mt-6 text-sm text-gray-500 text-center">
                Sudah mempunyai akaun? <a href="{{ route('login') }}" class="text-green-600 hover:underline">Log Masuk</a>
            </p>
        </div>

        <!-- Right side (Company info + Illustration) -->
        <div class="hidden lg:flex w-1/2 flex-col items-center justify-center bg-gray-100 text-white relative p-12">
            <img src="/images/logo-1.svg" alt="logo" class="w-1/3">

            <!-- Optional text -->
            <h3 class="text-xl font-bold text-emerald-800">Pusat Pengajian Quran As-Siraaj</h3>
            <p class="text-center font-semibold text-yellow-500">
                ⭐ Menyinari hidupmu di dunia dan di sana ⭐
            </p>
            <!-- Illustration -->
            <img src="/images/login-register.svg" alt="Illustration" class="w-3/4 max-w-md">
        </div>
    </div>
     @if($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: '{!! implode("<br>", $errors->all()) !!}',
                confirmButtonColor: '#d33'
            })
        </script>
    @endif
</x-app-layout>