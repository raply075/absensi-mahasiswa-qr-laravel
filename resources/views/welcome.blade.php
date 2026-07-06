<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>AbsensiQR | Sistem Absensi Mahasiswa Berbasis QR Code</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-900 selection:bg-blue-500 selection:text-white">
    
    <!-- Navbar -->
    <nav class="fixed w-full z-50 bg-white/80 backdrop-blur-md border-b border-gray-100 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center gap-3 cursor-pointer" onclick="window.scrollTo(0,0)">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-blue-600 to-indigo-600 flex items-center justify-center text-white font-bold text-xl shadow-lg">
                        A
                    </div>
                    <span class="font-bold text-xl tracking-tight text-gray-900">AbsensiQR</span>
                </div>
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="#fitur" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">Fitur</a>
                    <a href="#cara-kerja" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">Cara Kerja</a>
                    <a href="#faq" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">FAQ</a>
                </div>
                <div class="flex items-center gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors hidden sm:block">Masuk</a>
                        <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg font-medium transition-all shadow-md hover:shadow-lg transform hover:-translate-y-0.5">Daftar</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5"></div>
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full bg-blue-100 blur-3xl opacity-50 pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-96 h-96 rounded-full bg-indigo-100 blur-3xl opacity-50 pointer-events-none"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center animate-slide-up">
            <span class="inline-block py-1 px-3 rounded-full bg-blue-50 text-blue-600 text-sm font-semibold mb-6 border border-blue-100 tracking-wide">Inovasi Kampus Digital</span>
            <h1 class="text-5xl md:text-6xl font-extrabold text-gray-900 tracking-tight mb-6 leading-tight">
                Absensi Semakin Mudah <br class="hidden md:block" /> Dengan <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">QR Code</span>
            </h1>
            <p class="mt-4 text-xl text-gray-600 max-w-2xl mx-auto mb-10 leading-relaxed">
                Tinggalkan cara lama. Kelola kehadiran mahasiswa secara real-time, akurat, dan paperless menggunakan teknologi QR Code modern.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3.5 rounded-xl font-medium text-lg transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center justify-center gap-2">
                    Mulai Sekarang
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                </a>
                <a href="#fitur" class="bg-white border border-gray-200 hover:border-gray-300 text-gray-700 hover:text-gray-900 px-8 py-3.5 rounded-xl font-medium text-lg transition-all shadow-sm flex items-center justify-center gap-2">
                    Pelajari Lebih Lanjut
                </a>
                
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="fitur" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Fitur Unggulan</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Kami menyediakan berbagai fitur untuk mempermudah proses absensi perkuliahan.</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-gray-50 rounded-2xl p-8 border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 group">
                    <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm14 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Scan Cepat</h3>
                    <p class="text-gray-600 leading-relaxed">Absensi hanya dalam hitungan detik. Cukup scan QR code dan kehadiran langsung tercatat di sistem.</p>
                </div>
                <!-- Feature 2 -->
                <div class="bg-gray-50 rounded-2xl p-8 border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 group">
                    <div class="w-14 h-14 bg-indigo-100 text-indigo-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Analitik Lengkap</h3>
                    <p class="text-gray-600 leading-relaxed">Pantau grafik kehadiran secara komprehensif melalui dashboard admin yang interaktif.</p>
                </div>
                <!-- Feature 3 -->
                <div class="bg-gray-50 rounded-2xl p-8 border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 group">
                    <div class="w-14 h-14 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Export Laporan</h3>
                    <p class="text-gray-600 leading-relaxed">Unduh laporan absensi dengan mudah dalam format PDF maupun Excel untuk kebutuhan arsip.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="cara-kerja" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Cara Kerja</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Sangat mudah dan praktis untuk digunakan oleh dosen maupun mahasiswa.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 relative">
                <!-- Line connector -->
                <div class="hidden md:block absolute top-1/2 left-0 w-full h-0.5 bg-gray-200 -z-10 -translate-y-1/2"></div>
                
                <div class="text-center">
                    <div class="w-20 h-20 mx-auto bg-white border-4 border-blue-100 rounded-full flex items-center justify-center text-2xl font-bold text-blue-600 mb-6 shadow-sm">1</div>
                    <h3 class="text-xl font-bold mb-2">Login / Register</h3>
                    <p class="text-gray-600">Mahasiswa mendaftarkan akun dan mendapatkan QR Code unik.</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 mx-auto bg-white border-4 border-blue-100 rounded-full flex items-center justify-center text-2xl font-bold text-blue-600 mb-6 shadow-sm">2</div>
                    <h3 class="text-xl font-bold mb-2">Tunjukkan QR</h3>
                    <p class="text-gray-600">Buka halaman profil mahasiswa dan tunjukkan QR Code pada kamera admin/dosen.</p>
                </div>
                <div class="text-center">
                    <div class="w-20 h-20 mx-auto bg-white border-4 border-blue-100 rounded-full flex items-center justify-center text-2xl font-bold text-blue-600 mb-6 shadow-sm">3</div>
                    <h3 class="text-xl font-bold mb-2">Selesai</h3>
                    <p class="text-gray-600">Sistem otomatis mencatat kehadiran real-time ke dalam database.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
   <footer class="bg-white border-t border-gray-200 pt-16 pb-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col md:flex-row justify-between items-center gap-4">

            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-blue-600 flex items-center justify-center text-white font-bold">
                    A
                </div>

                <span class="font-bold text-gray-900">
                    AbsensiQR
                </span>
            </div>

            <div class="text-center text-gray-500 text-sm">
                © {{ date('Y') }}
                <strong>AbsensiQR</strong>.
                Designed & Developed by
                <span class="font-semibold text-blue-600">
                    Raply Fediansyah
                </span>.
                All rights reserved.
            </div>

            <div class="flex gap-5 text-sm">

                <a
                    href="https://github.com/raply075/absensi-mahasiswa-qr-laravel"
                    target="_blank"
                    class="text-gray-600 hover:text-blue-600">

                    GitHub

                </a>

                <a
                    href="mailto:raply@gmail.com"
                    class="text-gray-600 hover:text-blue-600">

                    Email

                </a>

            </div>

        </div>

    </div>
</footer>

</body>
</html>
