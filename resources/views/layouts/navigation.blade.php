<nav class="bg-white/70 dark:bg-gray-800/70 backdrop-blur-md sticky top-0 z-30 border-b border-gray-200 dark:border-gray-700 h-16 flex items-center justify-between px-4 sm:px-6 lg:px-8">
    
    <!-- Mobile Hamburger & Breadcrumb Area -->
    <div class="flex items-center gap-4">
        <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
        </button>
        <!-- Search Bar (Dummy) -->
        <div class="hidden md:flex items-center bg-gray-100 dark:bg-gray-700 rounded-lg px-3 py-1.5 border border-transparent focus-within:border-blue-500 focus-within:ring-1 focus-within:ring-blue-500 transition-all">
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <input type="text" placeholder="Search..." class="bg-transparent border-none focus:ring-0 text-sm text-gray-700 dark:text-gray-200 w-48 focus:w-64 transition-all duration-300">
        </div>
    </div>

    <!-- Right Topbar: Notification & Profile -->
    <div class="flex items-center gap-4">
        
        <!-- Notifications -->
        <button class="relative p-2 text-gray-500 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-400 transition-colors rounded-full hover:bg-gray-100 dark:hover:bg-gray-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
            <span class="absolute top-1.5 right-2 w-2 h-2 bg-red-500 rounded-full ring-2 ring-white dark:ring-gray-800"></span>
        </button>

        <!-- Profile Dropdown -->
        <div class="relative" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
            <button @click="dropdownOpen = !dropdownOpen" class="flex items-center gap-2 focus:outline-none">
                <div class="w-8 h-8 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center text-white font-bold text-sm shadow-md">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <span class="hidden md:block text-sm font-medium text-gray-700 dark:text-gray-200">{{ Auth::user()->name }}</span>
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>

            <!-- Dropdown Menu -->
            <div x-show="dropdownOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute right-0 mt-3 w-48 bg-white dark:bg-gray-800 rounded-xl shadow-lg py-2 border border-gray-100 dark:border-gray-700 z-50 hidden" :class="{'hidden': !dropdownOpen, 'block': dropdownOpen }">
                
                <div class="px-4 py-2 border-b border-gray-100 dark:border-gray-700 md:hidden">
                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
                </div>

                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700/50 hover:text-blue-600 transition-colors">
                    Edit Profil
                </a>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/30 transition-colors">
                        Logout
                    </a>
                </form>
            </div>
        </div>

    </div>
</nav>
