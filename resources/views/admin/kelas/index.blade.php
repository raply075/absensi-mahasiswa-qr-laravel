<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Kelas') }}
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
            
            <!-- Table Toolbar -->
            <div class="p-6 border-b border-gray-100 dark:border-gray-700 flex flex-col md:flex-row md:items-center justify-between gap-4">
                
                <!-- Spacer for search if any, but since the previous blade didn't have search form for kelas, we will just put a title -->
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Daftar Kelas Perkuliahan</h3>

                <a href="{{ route('admin.kelas.create') }}" class="inline-flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-5 py-2.5 rounded-xl font-medium transition-all shadow-sm hover:shadow-md transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Tambah Kelas
                </a>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 dark:bg-gray-700/50 border-b border-gray-100 dark:border-gray-700 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            <th class="p-4 pl-6 w-16 text-center">No</th>
                            <th class="p-4">Kode Kelas</th>
                            <th class="p-4">Nama Kelas</th>
                            <th class="p-4 text-center">Angkatan</th>
                            <th class="p-4 pr-6 text-center w-32">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-700 text-sm">
                        @forelse($kelas as $item)
                        <tr class="hover:bg-blue-50/50 dark:hover:bg-gray-700/30 transition-colors group">
                            <td class="p-4 pl-6 text-center text-gray-500 dark:text-gray-400 font-medium">
                                {{ $loop->iteration }}
                            </td>
                            <td class="p-4 font-mono text-blue-600 dark:text-blue-400 font-medium">
                                {{ $item->kode }}
                            </td>
                            <td class="p-4">
                                <span class="font-medium text-gray-900 dark:text-white">{{ $item->nama }}</span>
                            </td>
                            <td class="p-4 text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-medium bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                    {{ $item->angkatan }}
                                </span>
                            </td>
                            <td class="p-4 pr-6 text-center">
                                <div class="flex justify-center items-center gap-2 opacity-100 sm:opacity-0 sm:group-hover:opacity-100 transition-opacity">
                                    <a href="{{ route('admin.kelas.edit', $item) }}" class="p-2 text-blue-600 hover:bg-blue-100 rounded-lg transition-colors tooltip" title="Edit">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    </a>
                                    <form action="{{ route('admin.kelas.destroy', $item) }}" method="POST" class="inline">
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
                                    <svg class="w-12 h-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                                    <p>Data kelas belum tersedia.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="p-4 border-t border-gray-100 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50">
                {{ $kelas->links() }}
            </div>
        </div>
    </div>
</x-app-layout>