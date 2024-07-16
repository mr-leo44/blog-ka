<x-frontend-layout>
    <div class="grid grid-cols-1 gap-3 px-3 md:grid-cols-3">
        @if ($authors->count() > 0)
            @foreach ($authors as $key => $user)
                <div class="bg-gray-100 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-5">
                        <a href="{{ route('authorPosts', $user) }}">
                            <h5 class="mb-2 text-lg font-medium tracking-tight text-gray-900 dark:text-white">
                                {{ $user->name }}</h5>
                        </a>
                        <a href="{{ route('authorPosts', $user) }}"
                            class="inline-flex items-center my-2 px-3 py-2 text-xs font-medium text-center text-white bg-emerald-500 rounded-lg hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 dark:bg-emerald-500 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">
                            Voir ses articles
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        @else
            <p class="col-span-full text-center">Aucun auteur.</p>
        @endif
    </div>
</x-frontend-layout>
