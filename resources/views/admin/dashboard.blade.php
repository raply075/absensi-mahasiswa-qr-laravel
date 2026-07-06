<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="space-y-6">
        
        <!-- Welcome Message -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl p-6 text-white shadow-lg relative overflow-hidden">
            <div class="relative z-10">
                <h3 class="text-2xl font-bold mb-1">Selamat Datang, {{ Auth::user()->name }}! 👋</h3>
                <p class="text-blue-100">Pantau kehadiran mahasiswa dan statistik perkuliahan hari ini.</p>
            </div>
            <svg class="absolute right-0 top-0 h-full text-white opacity-10" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 22h20L12 2z"></path></svg>
        </div>

        <!-- Stat Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-100 dark:border-gray-700 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Total Mahasiswa</p>
                        <h4 class="text-3xl font-extrabold text-gray-900 dark:text-white" x-data="{ count: 0 }" x-init="let target = {{ $totalMahasiswa }}; let i = 0; let interval = setInterval(() => { count = i; i += Math.ceil(target/20); if(i >= target) { count = target; clearInterval(interval); } }, 20);" x-text="count">0</h4>
                    </div>
                    <div class="p-3 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                </div>
                <div class="absolute -bottom-4 -right-4 text-blue-50 dark:text-gray-700/50 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 24 24"><path d="M12 4a4 4 0 110 8 4 4 0 010-8zm0 10c-4.418 0-8 3.582-8 8h16c0-4.418-3.582-8-8-8z"></path></svg>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-100 dark:border-gray-700 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Total Kelas</p>
                        <h4 class="text-3xl font-extrabold text-gray-900 dark:text-white" x-data="{ count: 0 }" x-init="let target = {{ $totalKelas }}; let i = 0; let interval = setInterval(() => { count = i; i += Math.ceil(target/20); if(i >= target) { count = target; clearInterval(interval); } }, 20);" x-text="count">0</h4>
                    </div>
                    <div class="p-3 bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 rounded-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-100 dark:border-gray-700 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Absensi Hari Ini</p>
                        <h4 class="text-3xl font-extrabold text-gray-900 dark:text-white" x-data="{ count: 0 }" x-init="let target = {{ $absensiHariIni }}; let i = 0; let interval = setInterval(() => { count = i; i += Math.ceil(target/20); if(i >= target) { count = target; clearInterval(interval); } }, 20);" x-text="count">0</h4>
                    </div>
                    <div class="p-3 bg-purple-50 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400 rounded-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 border border-gray-100 dark:border-gray-700 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-1">Total Kehadiran</p>
                        <h4 class="text-3xl font-extrabold text-gray-900 dark:text-white" x-data="{ count: 0 }" x-init="let target = {{ $hadir }}; let i = 0; let interval = setInterval(() => { count = i; i += Math.ceil(target/20); if(i >= target) { count = target; clearInterval(interval); } }, 20);" x-text="count">0</h4>
                    </div>
                    <div class="p-3 bg-orange-50 dark:bg-orange-900/30 text-orange-600 dark:text-orange-400 rounded-xl">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </div>
            </div>

        </div>

        <!-- Detail Kehadiran Cards -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="bg-green-50 dark:bg-green-900/20 border border-green-100 dark:border-green-800 rounded-xl p-4 flex items-center gap-4">
                <div class="w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center font-bold">H</div>
                <div>
                    <p class="text-xs text-green-600 dark:text-green-400 font-semibold uppercase">Hadir</p>
                    <h5 class="text-xl font-bold text-gray-900 dark:text-white">{{ $hadir }}</h5>
                </div>
            </div>
            <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-100 dark:border-yellow-800 rounded-xl p-4 flex items-center gap-4">
                <div class="w-10 h-10 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center font-bold">I</div>
                <div>
                    <p class="text-xs text-yellow-600 dark:text-yellow-400 font-semibold uppercase">Izin</p>
                    <h5 class="text-xl font-bold text-gray-900 dark:text-white">{{ $izin }}</h5>
                </div>
            </div>
            <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-100 dark:border-blue-800 rounded-xl p-4 flex items-center gap-4">
                <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold">S</div>
                <div>
                    <p class="text-xs text-blue-600 dark:text-blue-400 font-semibold uppercase">Sakit</p>
                    <h5 class="text-xl font-bold text-gray-900 dark:text-white">{{ $sakit }}</h5>
                </div>
            </div>
            <div class="bg-red-50 dark:bg-red-900/20 border border-red-100 dark:border-red-800 rounded-xl p-4 flex items-center gap-4">
                <div class="w-10 h-10 rounded-full bg-red-100 text-red-600 flex items-center justify-center font-bold">A</div>
                <div>
                    <p class="text-xs text-red-600 dark:text-red-400 font-semibold uppercase">Alpa</p>
                    <h5 class="text-xl font-bold text-gray-900 dark:text-white">{{ $alpa }}</h5>
                </div>
            </div>
        </div>

        <!-- Charts Area -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
            <!-- Area Chart -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Grafik Kehadiran Bulanan</h3>
                <div class="relative h-72 w-full">
                    <canvas id="areaChart"></canvas>
                </div>
            </div>

            <!-- Doughnut Chart -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Status Absensi Terkini</h3>
                <div class="relative h-72 w-full flex justify-center">
                    <canvas id="statusChart"></canvas>
                </div>
            </div>

        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Bar Chart -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Statistik Per Kelas (Estimasi)</h3>
                <div class="relative h-72 w-full">
                    <canvas id="barChart"></canvas>
                </div>
            </div>

            <!-- Line Chart -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Tren Izin & Sakit</h3>
                <div class="relative h-72 w-full">
                    <canvas id="lineChart"></canvas>
                </div>
            </div>
        </div>

    </div>

    <!-- Scripts for Charts -->
    <script type="module">
        // Common chart options
        Chart.defaults.font.family = 'Inter, sans-serif';
        Chart.defaults.color = '#64748b';
        
        const hadir = {{ $hadir }};
        const izin = {{ $izin }};
        const sakit = {{ $sakit }};
        const alpa = {{ $alpa }};

        // 1. Doughnut Chart (Status Absensi)
        new Chart(document.getElementById('statusChart'), {
            type: 'doughnut',
            data: {
                labels: ['Hadir', 'Izin', 'Sakit', 'Alpa'],
                datasets: [{
                    data: [hadir, izin, sakit, alpa],
                    backgroundColor: ['#10b981', '#f59e0b', '#3b82f6', '#ef4444'],
                    borderWidth: 0,
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom' }
                },
                cutout: '70%'
            }
        });

        // 2. Area Chart (Kehadiran Bulanan - Mocked Data)
        const ctxArea = document.getElementById('areaChart').getContext('2d');
        const gradientArea = ctxArea.createLinearGradient(0, 0, 0, 300);
        gradientArea.addColorStop(0, 'rgba(59, 130, 246, 0.5)');
        gradientArea.addColorStop(1, 'rgba(59, 130, 246, 0.0)');
        
        new Chart(ctxArea, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul'],
                datasets: [{
                    label: 'Hadir',
                    data: [Math.floor(hadir*0.5), Math.floor(hadir*0.7), Math.floor(hadir*0.8), Math.floor(hadir*0.6), Math.floor(hadir*0.9), Math.floor(hadir*1.1), hadir],
                    fill: true,
                    backgroundColor: gradientArea,
                    borderColor: '#3b82f6',
                    tension: 0.4,
                    borderWidth: 2,
                    pointBackgroundColor: '#ffffff',
                    pointBorderColor: '#3b82f6',
                    pointBorderWidth: 2,
                    pointRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: { grid: { display: false } },
                    y: { border: { dash: [4, 4] }, grid: { color: '#f1f5f9' }, beginAtZero: true }
                }
            }
        });

        // 3. Bar Chart (Per Kelas - Mocked Data based on total)
        new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: {
                labels: ['Kelas A', 'Kelas B', 'Kelas C', 'Kelas D'],
                datasets: [{
                    label: 'Total Absensi',
                    data: [
                        Math.floor({{ $totalAbsensi }} * 0.3),
                        Math.floor({{ $totalAbsensi }} * 0.25),
                        Math.floor({{ $totalAbsensi }} * 0.2),
                        Math.floor({{ $totalAbsensi }} * 0.25)
                    ],
                    backgroundColor: '#6366f1',
                    borderRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    x: { grid: { display: false } },
                    y: { beginAtZero: true, grid: { color: '#f1f5f9' } }
                }
            }
        });

        // 4. Line Chart (Tren Izin & Sakit)
        new Chart(document.getElementById('lineChart'), {
            type: 'line',
            data: {
                labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum'],
                datasets: [
                    {
                        label: 'Izin',
                        data: [1, 2, Math.floor(izin/2), 0, izin],
                        borderColor: '#f59e0b',
                        tension: 0.4,
                        borderWidth: 2
                    },
                    {
                        label: 'Sakit',
                        data: [0, 1, Math.floor(sakit/2), 2, sakit],
                        borderColor: '#3b82f6',
                        tension: 0.4,
                        borderWidth: 2
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { position: 'top' } },
                scales: {
                    x: { grid: { display: false } },
                    y: { beginAtZero: true, grid: { color: '#f1f5f9' }, ticks: { stepSize: 1 } }
                }
            }
        });
    </script>
</x-app-layout>