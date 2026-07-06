<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scan QR Absensi</title>
    
    <script src="https://unpkg.com/html5-qrcode"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-gray-900 font-sans antialiased flex flex-col min-h-screen">

    <div class="flex-grow flex items-center justify-center p-4">
        
        <div class="w-full max-w-lg bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden animate-scale">
            
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-6 text-center">
                <h1 class="text-2xl font-bold text-white mb-2 flex items-center justify-center gap-2">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm14 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path></svg>
                    Scan QR Absensi
                </h1>
                <p class="text-blue-100 text-sm">Arahkan kamera ke QR Code mahasiswa untuk mencatat kehadiran</p>
            </div>

            <div class="p-6">
                
                @if(session('success'))
                    <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg flex items-center gap-3 animate-fade-in">
                        <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-green-600 shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <p class="text-green-800 text-sm font-medium">{{ session('success') }}</p>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg flex items-center gap-3 animate-fade-in">
                        <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center text-red-600 shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </div>
                        <p class="text-red-800 text-sm font-medium">{{ session('error') }}</p>
                    </div>
                @endif

                <!-- Scanner Container -->
                <div class="relative rounded-xl overflow-hidden border-4 border-gray-100 dark:border-gray-700 shadow-inner bg-black">
                    <div id="reader" class="w-full"></div>
                </div>
                
                <p class="text-center text-gray-500 text-xs mt-4 mb-6">
                    Pastikan pencahayaan cukup dan QR Code terlihat jelas di dalam kotak.
                </p>

                <form id="form-scan" action="{{ route('scan.absensi') }}" method="POST" class="hidden">
                    @csrf
                    <input type="hidden" name="token" id="token">
                </form>

                <div class="flex justify-center mt-6">
                    @auth
                        <a href="{{ route('dashboard') }}" class="inline-flex justify-center items-center gap-2 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 px-6 py-2.5 rounded-xl transition-colors font-medium text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                            Kembali ke Dashboard
                        </a>
                    @else
                        <a href="{{ url('/') }}" class="inline-flex justify-center items-center gap-2 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 px-6 py-2.5 rounded-xl transition-colors font-medium text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                            Halaman Utama
                        </a>
                    @endauth
                </div>

            </div>
        </div>
    </div>

    <script>
        function onScanSuccess(decodedText) {
            document.getElementById('token').value = decodedText;
            
            // Add a simple loading state feedback before submit
            if(typeof Swal !== 'undefined') {
                Swal.fire({
                    title: 'Memproses Absensi...',
                    text: 'Mohon tunggu sebentar',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
            }
            
            document.getElementById('form-scan').submit();
        }

        const html5QrcodeScanner = new Html5QrcodeScanner("reader", { 
            fps: 10, 
            qrbox: {width: 250, height: 250},
            aspectRatio: 1.0 
        }, false);
        
        html5QrcodeScanner.render(onScanSuccess);

        // Customize the scanner UI a bit after it renders
        setTimeout(() => {
            const scanBtn = document.getElementById('html5-qrcode-button-camera-permission');
            if(scanBtn) {
                scanBtn.className = "bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors m-2";
            }
        }, 1000);
    </script>
</body>
</html>