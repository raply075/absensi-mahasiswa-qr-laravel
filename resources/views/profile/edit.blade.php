<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Pengaturan Profil') }}
        </h2>
    </x-slot>

    <div class="space-y-6">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="md:col-span-1 space-y-6">
                <!-- User Summary Card -->
                <div class="bg-white dark:bg-gray-800 shadow-sm border border-gray-100 dark:border-gray-700 rounded-2xl p-6 text-center">
                    <div class="w-24 h-24 mx-auto rounded-full bg-gradient-to-tr from-blue-500 to-indigo-600 flex items-center justify-center text-white font-bold text-4xl shadow-lg mb-4">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ Auth::user()->name }}</h3>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mb-4">{{ Auth::user()->email }}</p>
                    <span class="inline-block px-3 py-1 bg-blue-100 text-blue-800 dark:bg-blue-900/30 dark:text-blue-300 rounded-full text-xs font-semibold uppercase tracking-wide">
                        {{ Auth::user()->role }}
                    </span>
                </div>
            </div>

            <div class="md:col-span-2 space-y-6">
                
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow-sm border border-gray-100 dark:border-gray-700 sm:rounded-2xl">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow-sm border border-gray-100 dark:border-gray-700 sm:rounded-2xl">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-red-50 dark:bg-gray-800 shadow-sm border border-red-100 dark:border-gray-700 sm:rounded-2xl">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
                
            </div>
            
        </div>
        
    </div>
</x-app-layout>
