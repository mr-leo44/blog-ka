<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">


    <title>{{ config('app.name', 'Mukasa-Kasima Archikin') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-800">
        <div class="my-8">
            <a href="/">
                <x-application-logo class="w-20 h-20 text-gray-500" />
            </a>
        </div>

        <div
            class="w-full sm:max-w-md px-6 py-4 bg-white dark:bg-gray-800 shadow-md border border-gray-700 overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
