<x-frontend-layout>
    {{-- @php
        \Carbon\Carbon::setLocale('fr');
    @endphp --}}
    <div class="grid grid-cols-1 gap-3 px-3 lg:grid-cols-3">
        @if ($posts->count() > 0)
            @foreach ($posts as $key => $post)
                <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="{{ route('getPost', $post) }}">
                        <div class="relative">
                            @if ($post->cover_img)
                                <a href="{{ route('getPost', $post) }}">
                                    <img class="object-cover h-auto max-w-full"
                                        src="{{ asset("storage/$post->cover_img") }}" alt="" />
                                </a>
                            @else
                                <a href="{{ route('getPost', $post) }}">
                                    <img src="{{ asset('images/cover.jpg') }}" alt="Image par defaut"
                                        class="object-cover h-auto max-w-full">
                                </a>
                            @endif
                            <a href="{{ route('categoryPosts', $post->category) }}!">
                                <div
                                    class="absolute bottom-0 left-0 px-3 py-2 font-normal text-xs text-white bg-emerald-500 hover:bg-emerald-600 transition ease-in-out">
                                    {{ $post->category->name }}
                                </div>
                            </a>
                        </div>
                        <div class="my-2 px-3">
                            <a href="{{ route('getPost', $post) }}">
                                <h5 class="text-md font-medium tracking-tight text-gray-900 dark:text-white">
                                    {{ $post->title }}</h5>
                            </a>
                            <div class="flex justify-between gap-1 items-center bottom-0">
                                <div>
                                    <div>
                                        <a href="{{ route('authorPosts', $post->user) }}"
                                            class="flex items-center text-sm font-normal text-gray-900 dark:text-emerald-500">
                                            <svg class="h-4 text-gray-800 dark:text-emerald-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span
                                                class="flex-1 ms-1 text-xs whitespace-nowrap">{{ $post->user->name }}</span>
                                        </a>
                                    </div>
                                </div>
                                <a href="{{ route('getPost', $post) }}"
                                    class="inline-flex items-center my-2 px-3 py-1 text-sm font-medium text-center text-white bg-emerald-700 rounded-md hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">
                                    <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M4.998 7.78C6.729 6.345 9.198 5 12 5c2.802 0 5.27 1.345 7.002 2.78a12.713 12.713 0 0 1 2.096 2.183c.253.344.465.682.618.997.14.286.284.658.284 1.04s-.145.754-.284 1.04a6.6 6.6 0 0 1-.618.997 12.712 12.712 0 0 1-2.096 2.183C17.271 17.655 14.802 19 12 19c-2.802 0-5.27-1.345-7.002-2.78a12.712 12.712 0 0 1-2.096-2.183 6.6 6.6 0 0 1-.618-.997C2.144 12.754 2 12.382 2 12s.145-.754.284-1.04c.153-.315.365-.653.618-.997A12.714 12.714 0 0 1 4.998 7.78ZM12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        @else
            <p class="col-span-full text-center">Aucun post publié.</p>
        @endif
    </div>
</x-frontend-layout>
