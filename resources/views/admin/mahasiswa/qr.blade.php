<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('QR Code Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-8">

        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl p-8 md:p-12 text-center border border-gray-100 dark:border-gray-700 animate-slide-up relative overflow-hidden">
            
            <div class="absolute top-0 right-0 w-32 h-32 bg-blue-100 dark:bg-blue-900/30 rounded-bl-full -z-10"></div>
            <div class="absolute bottom-0 left-0 w-32 h-32 bg-indigo-100 dark:bg-indigo-900/30 rounded-tr-full -z-10"></div>

            <div class="w-20 h-20 mx-auto rounded-full bg-gradient-to-tr from-blue-500 to-indigo-600 flex items-center justify-center text-white font-bold text-3xl shadow-lg mb-6">
                {{ substr($mahasiswa->nama, 0, 1) }}
            </div>

            <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-2">
                {{ $mahasiswa->nama }}
            </h1>
            <p class="text-lg text-gray-500 font-mono mb-8">{{ $mahasiswa->nim }} - {{ $mahasiswa->kelas->nama }}</p>

            <div class="inline-block p-4 bg-white border-2 border-gray-100 rounded-2xl shadow-sm mb-6" id="qr-container">
                {!! $qr !!}
            </div>

            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-3 inline-block mx-auto mb-10 border border-gray-200 dark:border-gray-600">
                <p class="text-gray-600 dark:text-gray-300 text-sm flex items-center gap-2">
                    <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    Token: <span class="font-mono font-bold text-gray-900 dark:text-white">{{ $mahasiswa->qr_token }}</span>
                </p>
            </div>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <button onclick="window.print()" class="inline-flex justify-center items-center gap-2 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-200 px-6 py-3 rounded-xl border border-gray-200 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors shadow-sm font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                    Print QR
                </button>
                <a href="{{ route('admin.mahasiswa.index') }}" class="inline-flex justify-center items-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-8 py-3 rounded-xl shadow-md hover:shadow-lg transition-all transform hover:-translate-y-0.5 font-medium">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali
                </a>
            </div>

        </div>

    </div>

    <style type="text/css" media="print">
        @page { size: auto; margin: 0mm; }
        body * { visibility: hidden; }
        #qr-container, #qr-container * { visibility: visible; }
        #qr-container { position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); border: none; box-shadow: none; }
    </style>
</x-app-layout>