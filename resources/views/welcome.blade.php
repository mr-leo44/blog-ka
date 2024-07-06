<x-frontend-layout>
    @php
        \Carbon\Carbon::setLocale('fr');
    @endphp
    <div class="grid grid-cols-1 gap-2 px-3 lg:grid-cols-3">
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
                            <h5 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-white">
                                {{ $post->title }}</h5>
                        </a>
                        <p class="font-normal text-gray-700 dark:text-gray-400 italic">
                            <a href="{{ route('categoryPosts', $post->category) }}" class="hover:text-emerald-500">
                                {{ $post->category->name }}
                            </a>
                        </p>
                    </div>
                    <div class="flex px-5 justify-between gap-1 items-center mt-auto">
                        <div>
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
                        </div>
                        <a href="{{ route('getPost', $post) }}"
                            class="inline-flex items-center my-2 px-3 py-1 text-sm font-medium text-center text-white bg-emerald-700 rounded-lg hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">
                            Lire
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
            <p class="col-span-full text-center">Aucun post publié.</p>
        @endif
    </div>
</x-frontend-layout>
