<x-admin-layout :title="'Dashboard'">
    <!-- Welcome Banner -->
    <div class="relative p-6 sm:p-8 rounded-xl shadow-lg 
                bg-gradient-to-r from-green-600 to-emerald-700 mb-8 overflow-hidden">        

        <div class="relative flex flex-col md:flex-row items-start md:items-center justify-between">
            
            <div class="text-white mb-4 md:mb-0">
                <h2 class="text-2xl sm:text-3xl font-bold leading-tight">Selamat Datang, {{ session('username') }}!</h2>
                
                <p class="mt-1 text-sm sm:text-base font-light opacity-90">
                    Berikut adalah ringkasan aktiviti terkini di pusat pembelajaran anda.
                </p>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
        <div class="bg-white p-4 rounded-sm shadow flex items-center gap-1 border-l-lime-600 border-l-6 justify-between">
                <div>
                    <p class="text-sm font-semibold text-lime-600 uppercase">Total Students</p>
                    <h3 class="text-xl font-bold text-gray-500">{{ $totalStudents }}</h3>
                </div>
                <svg class="w-10 h-10 text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12.4472 2.10557c-.2815-.14076-.6129-.14076-.8944 0L5.90482 4.92956l.37762.11119c.01131.00333.02257.00687.03376.0106L12 6.94594l5.6808-1.89361.3927-.13363-5.6263-2.81313ZM5 10V6.74803l.70053.20628L7 7.38747V10c0 .5523-.44772 1-1 1s-1-.4477-1-1Zm3-1c0-.42413.06601-.83285.18832-1.21643l3.49538 1.16514c.2053.06842.4272.06842.6325 0l3.4955-1.16514C15.934 8.16715 16 8.57587 16 9c0 2.2091-1.7909 4-4 4-2.20914 0-4-1.7909-4-4Z"/>
                    <path d="M14.2996 13.2767c.2332-.2289.5636-.3294.8847-.2692C17.379 13.4191 19 15.4884 19 17.6488v2.1525c0 1.2289-1.0315 2.1428-2.2 2.1428H7.2c-1.16849 0-2.2-.9139-2.2-2.1428v-2.1525c0-2.1409 1.59079-4.1893 3.75163-4.6288.32214-.0655.65589.0315.89274.2595l2.34883 2.2606 2.3064-2.2634Z"/>
                </svg>
        </div>

        <div class="bg-white p-4 rounded-sm shadow flex items-center gap-1 border-l-amber-400 border-l-6 justify-between">
                <div>
                    <p class="text-sm font-semibold text-amber-600 uppercase">Total Teachers</p>
                    <h3 class="text-xl font-bold text-gray-500">{{ $totalTutors }}</h3>
                </div>
                <svg class="w-10 h-10 text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M16 10c0-.55228-.4477-1-1-1h-3v2h3c.5523 0 1-.4477 1-1Z"/>
                    <path d="M13 15v-2h2c1.6569 0 3-1.3431 3-3 0-1.65685-1.3431-3-3-3h-2.256c.1658-.46917.256-.97405.256-1.5 0-.51464-.0864-1.0091-.2454-1.46967C12.8331 4.01052 12.9153 4 13 4h7c.5523 0 1 .44772 1 1v9c0 .5523-.4477 1-1 1h-2.5l1.9231 4.6154c.2124.5098-.0287 1.0953-.5385 1.3077-.5098.2124-1.0953-.0287-1.3077-.5385L15.75 16l-1.827 4.3846c-.1825.438-.6403.6776-1.0889.6018.1075-.3089.1659-.6408.1659-.9864v-2.6002L14 15h-1ZM6 5.5C6 4.11929 7.11929 3 8.5 3S11 4.11929 11 5.5 9.88071 8 8.5 8 6 6.88071 6 5.5Z"/>
                    <path d="M15 11h-4v9c0 .5523-.4477 1-1 1-.55228 0-1-.4477-1-1v-4H8v4c0 .5523-.44772 1-1 1s-1-.4477-1-1v-6.6973l-1.16797 1.752c-.30635.4595-.92722.5837-1.38675.2773-.45952-.3063-.5837-.9272-.27735-1.3867l2.99228-4.48843c.09402-.14507.2246-.26423.37869-.34445.11427-.05949.24148-.09755.3763-.10887.03364-.00289.06747-.00408.10134-.00355H15c.5523 0 1 .44772 1 1 0 .5523-.4477 1-1 1Z"/>
                </svg>
        </div>

        <div class="bg-white p-4 rounded-sm shadow flex items-center gap-1 border-l-cyan-600 border-l-6 justify-between">
                <div>
                    <p class="text-sm font-semibold text-cyan-600 uppercase">Total Guardians</p>
                    <h3 class="text-xl font-bold text-gray-500">{{ $totalGuardians }}</h3>
                </div>
                <svg class="w-10 h-10 text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z" clip-rule="evenodd"/>
                </svg>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Student Progress -->
        <div class="bg-white p-4 rounded-xl shadow lg:col-span-2">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-semibold">Student Progress</h3>
                <select id="progressFilter" class="border rounded-lg px-3 py-1 text-sm">
                    <option value="all">All</option>
                    <option value="iqra">Iqra</option>
                    <option value="juz">Quran</option>
                </select>
            </div>

            <div class="flex items-center justify-center">
                <div class="relative w-80 h-80">
                    <canvas id="progressChart"></canvas>
                </div>
                <div id="progressLegend" class="ml-6 space-y-2 overflow-y-auto max-h-80 w-48"></div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // ====== Data Backend ======
            const rawProgressCounts = @json($progressCounts); 
            // contoh: { "Iqra 1": 4, "Iqra 2": 6, "Juz 1": 3, "Juz 2": 5, "Iqra 6": 2 }

            const colors = [
                // 🔴 Merah
                '#FF2D2D', '#FF7A7A',
                // 🟠 Jingga
                '#FF7A00', '#FFB366',
                // 🟡 Kuning
                '#FFD60A', '#FFE680',
                // 🟢 Hijau
                '#00B050', '#66D19E',
                // 🟢 Hijau kebiruan
                '#00C49A', '#7BE495',
                // 🔵 Biru muda
                '#0096FF', '#7BC9FF',
                // 🔵 Biru pekat
                '#0056D2', '#668CFF',
                // 🟣 Ungu kebiruan
                '#7A00FF', '#B266FF',
                // 🟣 Ungu lembut
                '#A020F0', '#C58CFF',
                // 💗 Merah jambu
                '#FF1493', '#FF77C2',
                // ❤️‍🔥 Merah coral
                '#FF4D4D', '#FF9999',
                // 🍑 Peach / oren lembut
                '#FFA07A', '#FFD1B3',
                // 💚 Mint & hijau terang
                '#32CD32', '#98FB98',
                // 💙 Cyan & aqua
                '#00FFFF', '#99FFFF',
                // 💜 Lavender & violet lembut
                '#BA55D3', '#E0B0FF',
                // 🧡 Amber & gold
                '#FFBF00', '#FFD966',
                // 🌊 Navy + turquoise
                '#003366', '#33CCCC',
                // 🌈 Pelengkap kontras neutral
                '#FF5733', '#FFC300'
            ];

            const ctx = document.getElementById('progressChart');
            const legendContainer = document.getElementById('progressLegend');
            const filterSelect = document.getElementById('progressFilter');

            // ====== Fungsi untuk tapis dan paparkan ======
            function updateProgressChart(filter) {
                // tapis data ikut filter
                const filtered = Object.entries(rawProgressCounts).filter(([label]) => {
                    if (filter === 'iqra') return label.toLowerCase().includes('iqra');
                    if (filter === 'juz') return label.toLowerCase().includes('juz');
                    return true; // 'all'
                });

                const labels = filtered.map(([label]) => label);
                const data = filtered.map(([_, value]) => value);

                // kemas kini chart
                progressChart.data.labels = labels;
                progressChart.data.datasets[0].data = data;
                progressChart.data.datasets[0].backgroundColor = colors.slice(0, labels.length);
                progressChart.update();

                // bina legend baru
                legendContainer.innerHTML = '';
                labels.forEach((label, i) => {
                    const color = progressChart.data.datasets[0].backgroundColor[i];
                    const value = data[i];
                    const item = document.createElement('div');
                    item.classList.add('flex', 'items-center', 'space-x-2', 'text-sm');
                    item.innerHTML = `
                        <span class="w-4 h-4 rounded-full" style="background-color:${color}"></span>
                        <span class="font-medium text-gray-700">${label}</span>
                        <span class="text-gray-500">(${value})</span>
                    `;
                    legendContainer.appendChild(item);
                });
            }

            // ====== Inisialisasi Chart ======
            const progressChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: [],
                    datasets: [{
                        data: [],
                        backgroundColor: []
                    }]
                },
                options: {
                    plugins: { legend: { display: false } }
                }
            });

            // Default: paparkan semua
            updateProgressChart('all');

            // Tukar filter bila dropdown berubah
            filterSelect.addEventListener('change', (e) => {
                updateProgressChart(e.target.value);
            });
        </script>

         <!-- Upcoming Sessions Section -->
        <div class="bg-white p-4 rounded-xl shadow flex flex-col lg:col-span-1">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-semibold text-gray-800">Upcoming Sessions</h3>
            </div>

            <!-- Scrollable container -->
            <div class="space-y-3 max-h-[60vh] overflow-y-auto pr-2">
                @forelse ($schedules as $schedule)
                    <a href="{{ route('admin.schedule.attendance.index', $schedule->schedule_id) }}"
                        class="group flex items-center justify-between p-4 rounded-lg shadow bg-gray-100 hover:bg-green-700 transition cursor-pointer">
                        
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
                                    {{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }}<br>({{ $schedule->reliefTutor ? $schedule->reliefTutor->username : $schedule->class->tutor->username }})
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
                        <p>No upcoming sessions scheduled.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

</x-admin-layout>