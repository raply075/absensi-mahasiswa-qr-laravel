<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Profil') }}
        </h2>
    </x-slot>

    <div class="space-y-6">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <!-- Profil & QR Card -->
            <div class="lg:col-span-1">
                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden relative group">
                    <div class="h-24 bg-gradient-to-r from-blue-600 to-indigo-600"></div>
                    
                    <div class="px-6 pb-6 relative">
                        <div class="flex justify-center -mt-12 mb-4">
                            <div class="w-24 h-24 rounded-full bg-white dark:bg-gray-800 p-1 shadow-lg">
                                <div class="w-full h-full rounded-full bg-blue-100 flex items-center justify-center text-blue-600 text-3xl font-bold">
                                    {{ substr($mahasiswa->nama, 0, 1) }}
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center mb-6">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ $mahasiswa->nama }}</h3>
                            <p class="text-gray-500 font-mono mt-1">{{ $mahasiswa->nim }}</p>
                        </div>
                        
                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between py-2 border-b border-gray-50 dark:border-gray-700/50">
                                <span class="text-gray-500 text-sm">Kelas</span>
                                <span class="font-medium text-gray-900 dark:text-gray-200">{{ $mahasiswa->kelas->nama }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-50 dark:border-gray-700/50">
                                <span class="text-gray-500 text-sm">Email</span>
                                <span class="font-medium text-gray-900 dark:text-gray-200 truncate max-w-[150px]">{{ $mahasiswa->email }}</span>
                            </div>
                            <div class="flex justify-between py-2">
                                <span class="text-gray-500 text-sm">Status</span>
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">Aktif</span>
                            </div>
                        </div>

                        <!-- Progress Bar Kehadiran -->
                        @php
                            $total_absen = $hadir + $izin + $sakit + $alpa;
                            $persentase = $total_absen > 0 ? round(($hadir / $total_absen) * 100) : 0;
                        @endphp
                        <div class="mb-2">
                            <div class="flex justify-between text-sm mb-1">
                                <span class="font-medium text-gray-700 dark:text-gray-300">Persentase Kehadiran</span>
                                <span class="font-bold text-blue-600">{{ $persentase }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2.5">
                                <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $persentase }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistik & Riwayat -->
            <div class="lg:col-span-2 space-y-6">
                
                <!-- Stat Cards -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="bg-white dark:bg-gray-800 rounded-xl p-4 border border-gray-100 dark:border-gray-700 shadow-sm text-center">
                        <div class="w-10 h-10 mx-auto rounded-full bg-green-100 text-green-600 flex items-center justify-center mb-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <p class="text-xs text-gray-500 uppercase font-semibold">Hadir</p>
                        <h4 class="text-2xl font-bold text-gray-900 dark:text-white mt-1">{{ $hadir }}</h4>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-xl p-4 border border-gray-100 dark:border-gray-700 shadow-sm text-center">
                        <div class="w-10 h-10 mx-auto rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center mb-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <p class="text-xs text-gray-500 uppercase font-semibold">Izin</p>
                        <h4 class="text-2xl font-bold text-gray-900 dark:text-white mt-1">{{ $izin }}</h4>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-xl p-4 border border-gray-100 dark:border-gray-700 shadow-sm text-center">
                        <div class="w-10 h-10 mx-auto rounded-full bg-blue-100 text-blue-600 flex items-center justify-center mb-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                        </div>
                        <p class="text-xs text-gray-500 uppercase font-semibold">Sakit</p>
                        <h4 class="text-2xl font-bold text-gray-900 dark:text-white mt-1">{{ $sakit }}</h4>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-xl p-4 border border-gray-100 dark:border-gray-700 shadow-sm text-center">
                        <div class="w-10 h-10 mx-auto rounded-full bg-red-100 text-red-600 flex items-center justify-center mb-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </div>
                        <p class="text-xs text-gray-500 uppercase font-semibold">Alpa</p>
                        <h4 class="text-2xl font-bold text-gray-900 dark:text-white mt-1">{{ $alpa }}</h4>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Grafik Absensi -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 p-6">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Grafik Kehadiran</h3>
                        <div class="relative h-48 w-full flex justify-center">
                            <canvas id="chartMahasiswa"></canvas>
                        </div>
                    </div>

                    <!-- Riwayat Absensi (Timeline) -->
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 p-6 flex flex-col h-full">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Riwayat Terakhir</h3>
                        
                        <div class="relative flex-1 overflow-y-auto pr-2" style="max-height: 200px;">
                            @if(count($riwayat) > 0)
                                <div class="space-y-4 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-gray-200 before:to-transparent">
                                    @foreach($riwayat->take(5) as $item)
                                    <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                                        <div class="flex items-center justify-center w-10 h-10 rounded-full border-2 border-white bg-blue-100 text-blue-600 shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10">
                                            @if($item->status == 'hadir')
                                                <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                            @else
                                                <svg class="w-4 h-4 text-gray-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                                            @endif
                                        </div>
                                        <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] bg-gray-50 dark:bg-gray-700/30 p-3 rounded-lg border border-gray-100 dark:border-gray-700 shadow-sm">
                                            <div class="flex items-center justify-between mb-1">
                                                <div class="font-bold text-gray-900 dark:text-white text-sm">{{ ucfirst($item->status) }}</div>
                                                <time class="font-mono text-xs text-gray-500">{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/y') }}</time>
                                            </div>
                                            <div class="text-xs text-gray-500">Pukul: {{ $item->jam }}</div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center text-gray-500 text-sm py-8">Belum ada riwayat absensi.</div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Chart.js -->
    <script type="module">
        Chart.defaults.font.family = 'Inter, sans-serif';
        new Chart(document.getElementById('chartMahasiswa'), {
            type: 'pie',
            data: {
                labels: ['Hadir', 'Izin', 'Sakit', 'Alpa'],
                datasets: [{
                    data: [{{ $hadir }}, {{ $izin }}, {{ $sakit }}, {{ $alpa }}],
                    backgroundColor: ['#10b981', '#f59e0b', '#3b82f6', '#ef4444'],
                    borderWidth: 0,
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'right' }
                }
            }
        });
    </script>
</x-app-layout>