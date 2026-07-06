<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Absensi') }}
        </h2>
    </x-slot>

    <div class="space-y-6">

        @if(session('success'))
            <div class="bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg shadow-sm flex items-center justify-between animate-fade-in" x-data="{ show: true }" x-show="show">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <p class="text-green-800 font-medium">{{ session('success') }}</p>
                </div>
                <button @click="show = false" class="text-green-600 hover:text-green-800 focus:outline-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        @endif

        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden">
            
            <!-- Table Toolbar & Filters -->
            <div class="p-6 border-b border-gray-100 dark:border-gray-700 flex flex-col gap-4">
                
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Riwayat Kehadiran</h3>
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('admin.absensi.create') }}" class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-medium transition-all shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Tambah
                        </a>
                        <a href="{{ route('admin.absensi.pdf') }}" class="inline-flex items-center justify-center gap-2 bg-red-50 text-red-600 hover:bg-red-100 dark:bg-red-900/30 dark:text-red-400 dark:hover:bg-red-900/50 px-4 py-2 rounded-lg font-medium transition-all border border-red-200 dark:border-red-800">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                            PDF
                        </a>
                        <a href="{{ route('admin.absensi.excel') }}" class="inline-flex items-center justify-center gap-2 bg-green-50 text-green-600 hover:bg-green-100 dark:bg-green-900/30 dark:text-green-400 dark:hover:bg-green-900/50 px-4 py-2 rounded-lg font-medium transition-all border border-green-200 dark:border-green-800">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            Excel
                        </a>
                    </div>
                </div>

                <form method="GET" class="mt-2 bg-gray-50 dark:bg-gray-700/30 p-4 rounded-xl border border-gray-100 dark:border-gray-600">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1">Tanggal</label>
                            <input type="date" name="tanggal" value="{{ request('tanggal') }}" class="block w-full px-3 py-2 border border-gray-200 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 sm:text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1">Kelas</label>
                            <select name="kelas_id" class="block w-full px-3 py-2 border border-gray-200 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 sm:text-sm">
                                <option value="">Semua Kelas</option>
                                @foreach($kelas as $item)
                                    <option value="{{ $item->id }}" {{ request('kelas_id') == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 mb-1">Status</label>
                            <select name="status" class="block w-full px-3 py-2 border border-gray-200 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 sm:text-sm">
                                <option value="">Semua Status</option>
                                <option value="hadir" {{ request('status') == 'hadir' ? 'selected' : '' }}>Hadir</option>
                                <option value="izin" {{ request('status') == 'izin' ? 'selected' : '' }}>Izin</option>
                                <option value="sakit" {{ request('status') == 'sakit' ? 'selected' : '' }}>Sakit</option>
                                <option value="alpa" {{ request('status') == 'alpa' ? 'selected' : '' }}>Alpa</option>
                            </select>
                        </div>
                        <div class="flex items-end">
                            <button type="submit" class="w-full bg-gray-800 hover:bg-gray-900 dark:bg-gray-200 dark:hover:bg-white dark:text-gray-900 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors shadow-sm">Terapkan Filter</button>
                        </div>
                    </div>
                </form>

            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 dark:bg-gray-700/50 border-b border-gray-100 dark:border-gray-700 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            <th class="p-4 pl-6 w-16 text-center">No</th>
                            <th class="p-4">Mahasiswa</th>
                            <th class="p-4">Waktu</th>
                            <th class="p-4 text-center">Status</th>
                            <th class="p-4 pr-6 text-center w-32">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-700 text-sm">
                        @forelse($absensi as $item)
                        <tr class="hover:bg-blue-50/50 dark:hover:bg-gray-700/30 transition-colors group">
                            <td class="p-4 pl-6 text-center text-gray-500 dark:text-gray-400 font-medium">
                                {{ $absensi->firstItem() + $loop->index }}
                            </td>
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs">
                                        {{ substr($item->mahasiswa->nama, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 dark:text-white">{{ $item->mahasiswa->nama }}</p>
                                        <p class="text-xs text-gray-500">{{ $item->mahasiswa->nim }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                <p class="text-gray-900 dark:text-white font-medium">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</p>
                                <p class="text-xs text-gray-500 flex items-center gap-1 mt-0.5">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    {{ $item->jam }}
                                </p>
                            </td>
                            <td class="p-4 text-center">
                                @if($item->status == 'hadir')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700 dark:bg-green-900/40 dark:text-green-400 border border-green-200 dark:border-green-800">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Hadir
                                    </span>
                                @elseif($item->status == 'izin')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700 dark:bg-yellow-900/40 dark:text-yellow-400 border border-yellow-200 dark:border-yellow-800">
                                        <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span> Izin
                                    </span>
                                @elseif($item->status == 'sakit')
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700 dark:bg-blue-900/40 dark:text-blue-400 border border-blue-200 dark:border-blue-800">
                                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span> Sakit
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700 dark:bg-red-900/40 dark:text-red-400 border border-red-200 dark:border-red-800">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Alpa
                                    </span>
                                @endif
                            </td>
                            <td class="p-4 pr-6 text-center">
                                <div class="flex justify-center items-center gap-2 opacity-100 sm:opacity-0 sm:group-hover:opacity-100 transition-opacity">
                                    <a href="{{ route('admin.absensi.edit', $item) }}" class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition-colors tooltip" title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <form action="{{ route('admin.absensi.destroy', $item) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="button" onclick="confirmDelete(event)" class="p-2 text-red-600 hover:bg-red-100 rounded-lg transition-colors tooltip" title="Hapus">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                    <p>Data absensi tidak ditemukan.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="p-4 border-t border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
                {{ $absensi->links() }}
            </div>
        </div>
    </div>
</x-app-layout>