<x-frontend-layout>
    @php
        \Carbon\Carbon::setLocale('fr');
    @endphp
    <div class="px-5">
        <div class="mb-3">
            @if ($post->cover_img)
                <a href="{{ route('getPost', $post) }}">
                    <img class="rounded-t-lg" src="{{ asset("storage/$post->cover_img") }}" alt="" />
                </a>
            @endif
        </div>
        <div>
            <div>
                <a href="{{ route('getPost', $post) }}">
                    <h5 class="mb-2 text-xl lg:text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $post->title }}</h5>
                </a>
            </div>
            <p class="font-normal lg:text-sm text-gray-700 dark:text-gray-400 italic">
                <a href="{{ route('categoryPosts', $post->category) }}" class="hover:text-emerald-500">
                    {{ $post->category->name }}
                </a>
            </p>
            <div>
                <div class="flex items-center text-sm text-gray-900 dark:text-emerald-500">
                    <svg class="h-4 text-gray-800 dark:text-emerald-500" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M5 5a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1 2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2ZM3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm6.01-6a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm-10 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="flex-1 ms-2 text-sm whitespace-nowrap">{{ $post->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>
        <div class="text-white">
            <p class="my-8 text-justify">
                {!! $post->content !!}
            </p>
            <a href="{{ route('authorPosts', $post->user) }}"
                class="flex items-center mt-6 text-sm text-gray-900 dark:text-white">
                <span class="flex-1 whitespace-nowrap">{{ $post->user->name }}</span>
            </a>
        </div>
        <div class="my-20">
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Voir aussi</h3>
            <hr class="w-full h-1 my-2 mx-auto bg-gray-100 border-0 rounded dark:bg-gray-500">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-1 my-5">
                @foreach($recent_posts as $recent)
                <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    {{-- @if ($recent->cover_img)
                        <a href="{{ route('getPost', $recent) }}">
                            <img class="rounded-t-lg" src="{{ asset("storage/$recent->cover_img") }}" alt="" />
                        </a>
                    @endif --}}
                    <div class="p-5">
                        <a href="{{ route('getPost', $recent) }}">
                            <h5 class="text-md font-semibold tracking-tight text-gray-900 dark:text-white">
                                {{ $recent->title }}</h5>
                        </a>
                        <p class="font-normal text-xs text-gray-700 dark:text-gray-400 italic">
                            <a href="{{ route('categoryPosts', $recent->category) }}" class="hover:text-emerald-500">
                                {{ $recent->category->name }}
                            </a>
                        </p>
                    </div>
                    <div class="flex px-5 justify-between gap-1 items-center mt-auto">
                        <div>
                            <div>
                                <a href="{{ route('authorPosts', $recent->user) }}"
                                    class="flex items-center text-sm font-normal text-gray-900 dark:text-emerald-500">
                                    <svg class="h-4 text-gray-800 dark:text-emerald-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="flex-1 ms-1 text-xs whitespace-nowrap">{{ $recent->user->name }}</span>
                                </a>
                            </div>
                        </div>
                        <a href="{{ route('getPost', $recent) }}"
                            class="inline-flex items-center my-2 px-3 py-1 text-sm font-medium text-center text-white bg-emerald-700 rounded-md hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">
                            <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M4.998 7.78C6.729 6.345 9.198 5 12 5c2.802 0 5.27 1.345 7.002 2.78a12.713 12.713 0 0 1 2.096 2.183c.253.344.465.682.618.997.14.286.284.658.284 1.04s-.145.754-.284 1.04a6.6 6.6 0 0 1-.618.997 12.712 12.712 0 0 1-2.096 2.183C17.271 17.655 14.802 19 12 19c-2.802 0-5.27-1.345-7.002-2.78a12.712 12.712 0 0 1-2.096-2.183 6.6 6.6 0 0 1-.618-.997C2.144 12.754 2 12.382 2 12s.145-.754.284-1.04c.153-.315.365-.653.618-.997A12.714 12.714 0 0 1 4.998 7.78ZM12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-frontend-layout>
