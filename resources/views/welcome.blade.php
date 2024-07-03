<x-frontend-layout>
    @php
        \Carbon\Carbon::setLocale('fr');
    @endphp
    <div class="grid grid-cols-1 gap-3 px-3 lg:grid-cols-3">
        @if ($posts->count() > 0)
            @foreach ($posts as $key => $post)
                <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    {{-- @if ($post->cover_img)
                        <a href="{{ route('getPost', $post) }}">
                            <img class="rounded-t-lg" src="{{ asset("storage/$post->cover_img") }}" alt="" />
                        </a>
                    @endif --}}
                    <div class="p-5">
                        <a href="{{ route('getPost', $post) }}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $post->title }}</h5>
                        </a>
                        <p class="font-normal text-gray-700 dark:text-gray-400 italic">
                            <a href="{{ route('categoryPosts', $post->category) }}" class="hover:text-emerald-500">
                                {{ $post->category->name }}
                            </a>
                        </p>
                        <div class="flex justify-between gap-1 items-center mt-auto">
                            <a href="{{ route('getPost', $post) }}"
                                class="inline-flex items-center my-2 px-3 py-2 text-sm font-medium text-center text-white bg-emerald-700 rounded-lg hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">
                                Lire
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                            <div>
                                <div class="flex justify-between gap-1 items-center">
                                    <div>
                                        <a href="{{ route('authorPosts', $post->user) }}"
                                            class="flex items-center text-sm font-bold text-gray-900 dark:text-emerald-500">
                                            <svg class="h-4 text-gray-800 dark:text-emerald-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span class="flex-1 ms-3 whitespace-nowrap">{{ $post->user->name }}</span>
                                        </a>
                                    </div>
                                    <div
                                        class="flex items-center p-3 text-sm font-bold text-gray-900 dark:text-emerald-500">
                                        <svg class="h-4 text-gray-800 dark:text-emerald-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M5 5a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1 2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2ZM3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm6.01-6a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm-10 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="flex-1 ms-3 whitespace-nowrap">{{ $post->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="col-span-full text-center">Aucun post publié.</p>
        @endif
    </div>
</x-frontend-layout>
