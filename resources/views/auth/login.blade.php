<x-app-layout :title="'Login'">
    <div class="min-h-screen flex">
        <!-- Left side (Login form) -->
        <div class="w-full lg:w-1/2 flex flex-col justify-center px-8 lg:px-20 bg-white">

            <!-- Back to Dashboard -->
            <a href="{{ route('welcome') }}" class="flex items-center text-sm text-gray-500 hover:text-gray-700 mb-6">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
                Back to dashboard
            </a>

            <h2 class="text-3xl font-bold mb-2">Sign In</h2>
            <p class="text-gray-500 mb-6">Enter your email and password to sign in!</p>

            <!-- Login Form -->
            <form class="space-y-4">
                <div>
                    <label for="email" class="text-sm font-medium text-gray-700">Email*</label>
                    <input type="email" id="email" name="email" placeholder="info@gmail.com"
                        class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label for="password" class="text-sm font-medium text-gray-700">Password*</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password"
                        class="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <button type="submit"
                    class="w-full py-2 px-4 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition">
                    Sign In
                </button>
            </form>

            <p class="mt-6 text-sm text-gray-500">
                Don’t have an account? <a href="{{ route('register') }}" class="text-green-600 hover:underline">Sign Up</a>
            </p>
        </div>

        <!-- Right side (Company info + Illustration) -->
        <div class="hidden lg:flex w-1/2 flex-col items-center justify-center bg-gray-50 text-white relative p-12">
            <!-- Illustration -->
            <img src="/boy-read-quran.png" alt="Illustration" class="w-3/4 max-w-md">
            <!-- Optional text -->
            <h3 class="text-xl font-bold text-emerald-800">Pusat Pengajian Quran As-Siraaj</h3>
            <p class="text-center font-semibold text-yellow-500">
                ⭐ Menyinari hidupmu di dunia dan di sana ⭐
            </p>
        </div>
    </div>

</x-app-layout>