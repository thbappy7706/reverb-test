<!DOCTYPE html>
<html data-theme="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">




<div x-data="{ open: true }" class="flex h-screen bg-gray-100">

    <!-- Sidebar -->
    <aside :class="{'translate-x-0': open, '-translate-x-full': !open}" class="fixed z-30 inset-y-0 left-0 w-64 bg-white shadow-md transform transition-transform duration-100 ease-in-out">
        <div class="p-6">

            <nav class="mt-8">
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">Dashboard</a>
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">Profile</a>
                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">Settings</a>
            </nav>
        </div>
    </aside>

    <!-- Main content -->
    <div :class="open ? 'ml-64' : 'ml-0'" class="flex-1 flex flex-col overflow-hidden transition-all duration-300 ease-in-out">



        <livewire:layout.navigation />

        @if (isset($header))

            <header class="bg-white shadow">

                <!-- Button to open/close sidebar -->
                <button @click="open = !open" class="p-4 text-gray-600 hover:text-gray-900 focus:outline-none bg-indigo-300 ">
                    <svg :class="{'hidden': open, 'inline-flex': !open}" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                    <svg :class="{'hidden': !open, 'inline-flex': open}" class="h-6 w-6 bg-indigo-300 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>


{{--                <x-danger-button>dwefew</x-danger-button>--}}



                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif
        <!-- Button to open/close sidebar -->

        <!-- Page Content -->
        <main class="flex-1 overflow-y-auto p-6">

            <!-- Your page content goes here -->
            {{ $slot }}
        </main>
    </div>
</div>

</body>
</html>

