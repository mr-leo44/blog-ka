<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Mukasa-Kasima Archikin') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased dark:bg-slate-800 dark:text-white/50">
    @include('frontend.partials.navigation')
    <div class="py-10 max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-4">
            <div class="col-span-3">
                {{ $slot }}
            </div>
            @include('frontend.partials.aside')    
        </div>
    </div>
    @include('frontend.partials.footer')
</body>

</html>
