<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200" x-data="{ sidebarOpen: false }">
    
    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content Wrapper -->
        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">
            
            <!-- Topbar (Navigation) -->
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white/70 dark:bg-gray-800/70 backdrop-blur-md shadow-sm sticky top-0 z-10 border-b border-gray-200 dark:border-gray-700">
                    <div class="px-4 py-4 sm:px-6 lg:px-8 max-w-7xl mx-auto flex items-center justify-between">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-1 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 animate-fade-in">
                {{ $slot }}
            </main>

        </div>
    </div>

    <!-- SweetAlert Confirm Script -->
    <script>
        function confirmDelete(event) {
            event.preventDefault();
            const form = event.target.closest('form');
            if(typeof Swal !== 'undefined') {
                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: 'Data yang dihapus tidak dapat dikembalikan!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal',
                    customClass: {
                        popup: 'rounded-xl'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            } else {
                if(confirm('Yakin ingin menghapus? Data yang dihapus tidak dapat dikembalikan!')) {
                    form.submit();
                }
            }
        }
    </script>
</body>
</html>
