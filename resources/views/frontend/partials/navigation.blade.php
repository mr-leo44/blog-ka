<nav class="bg-emerald-700 dark:bg-gray-900 shadow">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
        <a href="{{ route('welcome') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('images/logo.png') }}" class="self-center text-white h-8" alt="Logo" />
            <span
                class="self-center text-md md:text-xl font-semibold md:font-semibold whitespace-nowrap text-white dark:hover:text-emerald-400">Mukasa-Kasima
                Archikin</span>
        </a>
        <div class="flex items-center justify-center space-x-6 rtl:space-x-reverse">
            <a href="tel:+243899939371" class="hidden md:block text-xs md:text-sm text-white hover:underline">(+243)
                899-939-371</a>
            @if (Auth::user() != null)
            @profile('author')
                <a href="{{ route('posts.index') }}"
                    class="text-sm text-white hover:underline">Articles</a>
            @endprofile
            @profile('dash')
                <a href="{{ route('dashboard') }}"
                    class="text-sm text-white hover:underline">Dashboard</a>
            @endprofile
            @endif
        </div>
    </div>
</nav>
