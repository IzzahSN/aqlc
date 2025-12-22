<x-tutor-layout :title="'Dashboard'">
    <!-- Welcome Banner -->
    <div class="relative p-6 sm:p-8 rounded-xl shadow-lg 
                bg-gradient-to-r from-green-600 to-emerald-700 mb-8 overflow-hidden">
        
        <div class="relative flex flex-col md:flex-row items-start md:items-center justify-between">
            
            <div class="text-white mb-4 md:mb-0">
                <h2 class="text-2xl sm:text-3xl font-bold leading-tight">Selamat Datang, {{ session('username') }}!</h2>
                
                <p class="mt-1 text-sm sm:text-base font-light opacity-90">
                    Berikut adalah ringkasan aktiviti anda sebagai tutor hari ini.
                </p>
            </div>
        </div>
    </div>

    <!-- Tutor Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        
        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between transition-all duration-300 hover:shadow-md hover:-translate-y-0.5">
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Sesi Kelas</p>
                <div class="flex items-baseline gap-2">
                    <h3 class="text-3xl font-extrabold text-gray-900">{{ $totalSchedules }}</h3>
                    <span class="text-[10px] font-medium text-lime-600 bg-lime-50 px-2 py-0.5 rounded-full">Bulan ini</span>
                </div>
            </div>
            <div class="flex items-center justify-center p-3 bg-lime-100 rounded-full text-lime-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                    <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>

        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between transition-all duration-300 hover:shadow-md hover:-translate-y-0.5">
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Kelas Ditetapkan</p>
                <h3 class="text-3xl font-extrabold text-gray-900">{{ $totalClasses }}</h3>
            </div>
            <div class="flex items-center justify-center p-3 bg-amber-100 rounded-full text-amber-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                    <path fill-rule="evenodd" d="M12 1.5a5.25 5.25 0 0 0-5.25 5.25v3a3 3 0 0 0-3 3v6.75a3 3 0 0 0 3 3h10.5a3 3 0 0 0 3-3v-6.75a3 3 0 0 0-3-3v-3c0-2.9-2.35-5.25-5.25-5.25Zm3.75 8.25v-3a3.75 3.75 0 1 0-7.5 0v3h7.5Z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>

        <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between transition-all duration-300 hover:shadow-md hover:-translate-y-0.5">
            <div>
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Gaji Tertunggak</p>
                <h3 class="text-3xl font-extrabold text-gray-900">RM{{ number_format($unpaidSalary, 2) }}</h3>
            </div>
            <div class="flex items-center justify-center p-3 bg-red-100 rounded-full text-red-600">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                    <path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>

    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Salary Report -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex flex-col">
            
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                
                <div class="flex items-center gap-3">
                    <div class="p-2.5 bg-emerald-100 rounded-lg text-emerald-600 shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 0 0 0-1.5h-3.75V6Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">Laporan Gaji Bulanan</h3>
                        <p class="text-sm text-gray-500">Analisis pendapatan mengikut tahun.</p>
                    </div>
                </div>

                <div class="relative w-full sm:w-40">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12.75 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM7.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM8.25 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM9.75 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM10.5 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM12.75 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM14.25 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 13.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" />
                            <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <select id="yearFilter" 
                            class="appearance-none cursor-pointer w-full py-2.5 pl-10 pr-8 text-sm text-gray-700 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-600 outline-none shadow-sm transition-all hover:bg-white">
                        @foreach ($salaryYears as $year)
                            <option value="{{ $year->salary_year }}">{{ $year->salary_year }}</option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="relative w-full h-72">
                <canvas id="salaryChart" class="w-full h-full"></canvas>
            </div>

        </div>

        <!-- Chart.js Script -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('salaryChart');
            let salaryChart;

            async function loadSalaryChart(year) {
                const response = await fetch(`{{ route('tutor.dashboard.report') }}?year=${year}`);
                const result = await response.json();

                const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

                const data = {
                    labels: labels,
                    datasets: [{
                        // label: `Total Salary (RM) for ${result.year}`,
                        label: `Jumlah Gaji (RM) untuk Tahun ${result.year}`,
                        data: result.data,
                        borderColor: '#16a34a',
                        backgroundColor: 'rgba(22,163,74,0.2)',
                        fill: true,
                        tension: 0.3
                    }]
                };

                // Destroy previous chart if exists
                if (salaryChart) {
                    salaryChart.destroy();
                }
                salaryChart = new Chart(ctx, {
                    type: 'line',
                    data: data,
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,   // pastikan graf mula dari 0
                                min: 0,              // nilai minimum paksi Y
                                ticks: {
                                    stepSize: 10,    // (optional) jarak antara nilai
                                },
                                grid: {
                                    color: '#e5e7eb' // (optional) warna grid
                                }
                            },
                            x: {
                                grid: {
                                    color: '#f3f4f6' // (optional)
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                display: true,
                                labels: {
                                    color: '#374151'
                                }
                            },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return 'RM ' + context.parsed.y.toFixed(2);
                                    }
                                }
                            }
                        }
                    }
                });
            }

            // Load current year by default
            loadSalaryChart(new Date().getFullYear());

            // Filter by year
            document.getElementById('yearFilter').addEventListener('change', function() {
                loadSalaryChart(this.value);
            });
        </script>

        <!-- Upcoming Sessions Section -->
        <div class="bg-white p-4 rounded-xl shadow flex flex-col lg:col-span-1">
            <div class="flex items-center justify-between mb-4">
                {{-- <h3 class="font-semibold text-gray-800">Upcoming Sessions</h3> --}}
                <h3 class="font-semibold text-gray-800">Sesi Akan Datang</h3>
            </div>

            <!-- Scrollable container -->
            <div class="space-y-3 max-h-[60vh] overflow-y-auto pr-2">
                @forelse ($schedules as $schedule)
                    <a href="{{ route('tutor.schedule.attendance.index', $schedule->schedule_id) }}"
                        class="group flex items-center justify-between p-4 rounded-lg shadow bg-gray-100 hover:bg-gradient-to-r from-green-600 to-emerald-700 transition cursor-pointer">
                        
                        <div class="flex items-center gap-3">
                            <!-- Calendar Icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="currentColor"
                                class="group-hover:text-white transition text-emerald-600">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M16 2c.183 0 .355 .05 .502 .135l.033 .02c.28 .177 .465 .49 .465 .845v1h1a3 3 0 0 1 2.995 2.824l.005 .176v12a3 3 0 0 1 -2.824 2.995l-.176 .005h-12a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-12a3 3 0 0 1 2.824 -2.995l.176 -.005h1v-1a1 1 0 0 1 .514 -.874l.093 -.046l.066 -.025l.1 -.029l.107 -.019l.12 -.007q .083 0 .161 .013l.122 .029l.04 .012l.06 .023c.328 .135 .568 .44 .61 .806l.007 .117v1h6v-1a1 1 0 0 1 1 -1m3 7h-14v9.625c0 .705 .386 1.286 .883 1.366l.117 .009h12c.513 0 .936 -.53 .993 -1.215l.007 -.16z" />
                                <path d="M9.015 13a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1" />
                                <path d="M13.015 13a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1" />
                                <path d="M17.02 13a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1" />
                                <path d="M12.02 15a1 1 0 0 1 0 2a1.001 1.001 0 1 1 -.005 -2z" />
                                <path d="M9.015 16a1 1 0 0 1 -1 1a1.001 1.001 0 1 1 -.005 -2c.557 0 1.005 .448 1.005 1" />
                            </svg>

                            <!-- Text -->
                            <div>
                                <p class="text-sm font-semibold text-gray-700 group-hover:text-white transition">
                                    {{ $schedule->class->class_name }}
                                </p>
                                <p class="text-xs text-gray-500 group-hover:text-white transition">
                                    {{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }}
                                </p>
                            </div>
                        </div>

                        <!-- Chevron Right -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="text-gray-400 group-hover:text-white transition">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 6l6 6l-6 6" />
                        </svg>
                    </a>
                @empty
                    <div class="text-center py-6 text-gray-500 text-sm bg-gray-50 rounded-lg border border-dashed">
                        <i class="fas fa-calendar-times text-2xl text-gray-400 mb-2"></i>
                        {{-- <p>No upcoming sessions scheduled.</p> --}}
                        <p>Tiada sesi akan datang yang dijadualkan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-tutor-layout>