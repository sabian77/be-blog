<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xs sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-4">Hi, {{ Auth::user()->name }} 👋</h2>
                    <p class="text-gray-600 dark:text-gray-400">
                        Welcome back to your dashboard. Manage your posts and profile here.
                    </p>
                    {{-- <h2 class="text-2xl font-bold mb-4">Hi, {{ $posts }}</h2> --}}
                    <x-posts.table :posts="$posts"/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
