<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            {{-- <img src="" class="h-8" alt="Logo" /> --}}
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-emerald-700 md:dark:hover:text-emerald-500 text-emerald-700">Mukasa -
                Kasima Archikin</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-emerald-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
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
                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="{{ request()->routeIs('dashboard') ? 'text-emerald-500 dark:text-emerald-500 md:dark:text-emerald-500' : 'text-gray-900 dark:text-white md:dark:text-white' }} block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-emerald-700 md:p-0  md:dark:hover:text-emerald-500 dark:hover:bg-gray-700 md:dark:hover:bg-transparent"
                        aria-current="page">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('categories.index')}}"
                        class="{{ request()->routeIs('categories.*') ? 'text-emerald-500 dark:text-emerald-500 md:dark:text-emerald-500' : 'text-gray-900 dark:text-white md:dark:text-white' }} block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-emerald-700 md:p-0  md:dark:hover:text-emerald-500 dark:hover:bg-gray-700 md:dark:hover:bg-transparent"
                        aria-current="page">Catégories</a>
                    </li>
                <li>
                    <a href="{{ route('posts.index')}}"
                        class="{{ request()->routeIs('posts.*') ? 'text-emerald-500 dark:text-emerald-500 md:dark:text-emerald-500' : 'text-gray-900 dark:text-white md:dark:text-white' }} block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-emerald-700 md:p-0 md:dark:hover:text-emerald-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Articles</a>
                </li>
                <li>
                    <a href="{{ route('authors.index')}}"
                        class="{{ request()->routeIs('authors.*') ? 'text-emerald-500 dark:text-emerald-500 md:dark:text-emerald-500' : 'text-gray-900 dark:text-white md:dark:text-white' }} block py-2 px-3 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-emerald-700 md:p-0 dark:text-white md:dark:hover:text-emerald-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Auteurs</a>
                </li>
                <li>
                    <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName"
                        class="flex items-center px-3 md:p-0 font-medium text-md py-2 pe-1 text-gray-900 rounded-full hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-emerald-700 md:dark:hover:text-emerald-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent md:me-0 dark:text-white"
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
                        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-60 dark:bg-gray-700 dark:divide-gray-600">
                        <div class="px-4 py-3 text-md text-gray-900 dark:text-white">
                            <div class="truncate">{{ Auth::user()->email }}</div>
                        </div>
                        <ul class="py-2 text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                            <li>
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profil') }}
                                </x-dropdown-link>
                            </li>
                        </ul>
                        <div class="py-2">
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
