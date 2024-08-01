<nav class="bg-emerald-700 dark:bg-gray-900 shadow">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a @profile('author') href="{{ route('posts.index') }}" @endprofile
            @profile('dash') href="{{ route('dashboard') }}" @endprofile
            class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('images/logo.png') }}" class="self-center text-white h-8" alt="Logo" />
            <span
                class="self-center text-md md:text-xl font-semibold md:font-semibold whitespace-nowrap text-white dark:hover:text-emerald-400">Mukasa-Kasima
                Archikin</span>
        </a>

        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden focus:outline-none focus:ring-2 focus:ring-gray-200 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="font-medium text-sm lg:text-md flex flex-col p-4 md:p-0 mt-4 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                @profile('dash')
                    <li class="list-none">
                        <a href="{{ route('dashboard') }}"
                            class="{{ request()->routeIs('dashboard') ? 'text-white dark:text-emerald-500 dark:hover:text-emerald-500' : 'text-gray-300 dark:text-white' }} block py-2 px-3 rounded hover:text-white transition ease-in-out md:border-0 md:p-0 dark:hover:bg-gray-700 md:dark:hover:bg-transparent"
                            aria-current="page">Dashboard</a>
                    </li>
                @endprofile
                <li class="list-none">
                    <a href="{{ route('posts.index') }}"
                        class="{{ request()->routeIs('posts.*') ? 'text-white dark:text-emerald-500 dark:hover:text-emerald-500' : 'text-gray-300 dark:text-white' }} block py-2 px-3 rounded hover:text-white transition ease-in-out md:border-0 md:p-0 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Articles</a>
                </li>
                @profile('admin')
                    <li class="list-none">
                        <a href="{{ route('categories.index') }}"
                            class="{{ request()->routeIs('categories.*') ? 'text-white dark:text-emerald-500 dark:hover:text-emerald-500' : 'text-gray-300 dark:text-white' }} block py-2 px-3 rounded hover:text-white transition ease-in-out md:border-0 md:p-0 dark:hover:bg-gray-700 md:dark:hover:bg-transparent"
                            aria-current="page">Catégories</a>
                    </li>
                    <li class="list-none">
                        <a href="{{ route('tags.index') }}"
                            class="{{ request()->routeIs('tags.*') ? 'text-white dark:text-emerald-500 dark:hover:text-emerald-500' : 'text-gray-300 dark:text-white' }} block py-2 px-3 rounded hover:text-white transition ease-in-out md:border-0 md:p-0 dark:hover:bg-gray-700 md:dark:hover:bg-transparent"
                            aria-current="page">Tags</a>
                    </li>
                    <li class="list-none">
                        <a href="{{ route('authors.index') }}"
                            class="{{ request()->routeIs('authors.*') ? 'text-white dark:text-emerald-500 dark:hover:text-emerald-500' : 'text-gray-300 dark:text-white' }} block py-2 px-3 rounded hover:text-white transition ease-in-out md:border-0 md:p-0 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Auteurs</a>
                    </li>
                @endprofile
                <li class="list-none">
                    <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName"
                        class="flex items-center px-3 md:p-0 font-medium text-md py-2 pe-1 text-gray-300 hover:text-white rounded-full transition ease-in-out md:border-0 dark:hover:text-emerald-500 md:me-0 dark:text-white"
                        type="button">
                        <span class="sr-only">Open user menu</span>
                        {{-- <img class="w-8 h-8 me-2 rounded-full" src="
                            alt="user photo"> --}}
                        {{ Auth::user()->name }}
                        <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownAvatarName"
                        class="z-10 hidden divide-y divide-gray-400 rounded-lg shadow w-60 bg-gray-100 dark:bg-gray-700 dark:divide-gray-600">
                        <div class="px-4 py-2 text-gray-700 hover:text-gray-900 dark:hover:text-white dark:text-white">
                            <div class="truncate">{{ Auth::user()->email }}</div>
                        </div>
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profil') }}
                        </x-dropdown-link>
                        <div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Se deconnecter') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </div>

                </li>
            </ul>
        </div>
    </div>
</nav>
