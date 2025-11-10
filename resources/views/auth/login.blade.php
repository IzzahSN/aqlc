<x-app-layout :title="'Login'">
    <div class="min-h-screen flex">
        <!-- Left side (Login form) -->
        <div class="w-full lg:w-1/2 flex flex-col justify-center px-8 lg:px-20 bg-white">

            <!-- Back to Dashboard -->
            <a href="{{ route('home') }}" class="flex items-center text-sm text-gray-500 hover:text-gray-700 mb-6">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Menu Utama
            </a>

            <h2 class="text-3xl font-bold mb-2">Log Masuk</h2>
            <p class="text-gray-500 mb-6">Masukkan e-mel dan kata laluan anda untuk log masuk!</p>

            <!-- Login Form -->
            <form id="loginForm" class="space-y-4">
                @csrf
                <!-- User Role Selection -->
                <div class="grid sm:grid-cols-2 gap-3">
                    <!-- Guardian -->
                    <label class="flex items-center gap-2 px-3 py-2 rounded-lg cursor-pointer border border-gray-200 transition hover:border-green-500 has-[:checked]:border-green-500 has-[:checked]:bg-green-50">
                        <input type="radio" name="role" value="guardian" checked required
                            class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300">
                        <span class="text-sm font-medium text-gray-700 group-has-[:checked]:text-green-700">
                            Penjaga
                        </span>
                    </label>

                    <!-- Tutor -->
                    <label class="flex items-center gap-2 px-3 py-2 rounded-lg cursor-pointer border border-gray-200 transition hover:border-green-500 has-[:checked]:border-green-500 has-[:checked]:bg-green-50">
                        <input type="radio" name="role" value="tutor" required
                            class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300">
                        <span class="text-sm font-medium text-gray-700 group-has-[:checked]:text-green-700">
                            Guru
                        </span>
                    </label>
                </div>


                <div>
                    <label for="email" class="text-sm font-medium text-gray-700">E-mel</label>
                    <input type="email" id="email" name="email" placeholder="contoh@gmail.com"
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                </div>

                <div>
                    <label for="password" class="text-sm font-medium text-gray-700">Kata Laluan</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan kata laluan anda"
                        class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg" required>
                </div>

                <button type="submit"
                    class="w-full py-2 px-4 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition">
                    Log Masuk
                </button>
            </form>

            <p class="mt-6 text-sm text-gray-500 text-center">
                Tiada akaun? <a href="{{ route('register') }}" class="text-green-600 hover:underline">Daftar</a>
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
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            })
        </script>
    @endif
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
    <script>
        document.getElementById("loginForm").addEventListener("submit", function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            fetch("{{ route('login') }}", {
                method: "POST",
                credentials: "same-origin", // 🔑 penting untuk Laravel session
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Accept": "application/json"
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Log Masuk Berjaya',
                        text: data.message,
                        timer: 2000,
                        timerProgressBar: true,
                        showConfirmButton: false,
                        willClose: () => {
                            window.location.href = data.redirect_url;
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Log Masuk Gagal',
                        text: data.message
                    });
                }
            })
            .catch(() => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terdapat masalah semasa memproses permintaan anda. Sila cuba lagi kemudian.'
                });
            });
        });
    </script>
</x-app-layout>