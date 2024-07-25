<style>
ol {
    list-style-type: decimal !important;
    padding-left: 2rem !important;
}

ul
 {
     list-style-type: disc !important;
     padding-left: 2rem !important;
 }

blockquote {
    border-left: 2px solid #ccc;
    margin-left: 1.5rem;
    padding-left: 1rem;
}

</style>
<x-frontend-layout>
    @php
        \Carbon\Carbon::setLocale('fr');
    @endphp
    <div class="px-5">
        <div class="mb-4">
            <a href="{{ route('categoryPosts', $post->category) }}"
                class="font-medium rounded-sm bg-emerald-700 py-2 px-3 lg:text-sm text-white dark:text-white">
                {{ $post->category->name }}
            </a>
        </div>
        @if ($post->cover_img)
            <div class="my-3 max-h-[28rem]">
                <img class="object-cover w-full md:h-[28rem] max-w-full h-auto"
                    src="{{ asset("storage/$post->cover_img") }}" alt="" />
            </div>
        @endif
        <div class="mt-4">
            <a href="{{ route('getPost', $post) }}">
                <h5
                    class="mb-2 text-xl md:text-2xl lg:text-3xl font-medium tracking-tight text-gray-900 dark:text-white">
                    {{ $post->title }}</h5>
            </a>
            <div class="flex items-center text-xs text-gray-900 dark:text-emerald-700">
                <svg class="h-4 text-gray-800 dark:text-emerald-700" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M5 5a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1 2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2ZM3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm6.01-6a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm-10 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z"
                        clip-rule="evenodd" />
                </svg>
                <span class="flex-1 ms-2 whitespace-nowrap">{{ $post->created_at->diffForHumans() }}</span>
            </div>
        </div>
        <div class="text-gray-800 dark:text-white">
            <p class="my-4 text-justify">
                {!! $post->content !!}
            </p>
            <a href="{{ route('authorPosts', $post->user) }}"
                class="flex items-center text-xs mt-6 md:text-sm text-gray-900 dark:text-white">
                <span class="flex-1 whitespace-nowrap">{{ $post->user->name }}</span>
            </a>
        </div>

        <div class="my-10">
            <h5 class="mb-2 border-b-2"><span
                    class="text-sm font-medium tracking-tight text-white bg-emerald-700 px-2 py-1">Voir
                    aussi</span></h5>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3 md:gap-2 my-5">
                @if ($recent_posts->count() > 0)
                    @foreach ($recent_posts as $recent)
                        <div
                            class="bg-white border border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700 inline-flex md:flex-col justify-between items-center">
                            <div>
                                @if ($recent->cover_img)
                                    <a href="{{ route('getPost', $recent) }}">
                                        <img class="object-cover h-[5rem] md:h-auto max-w-full"
                                            src="{{ asset("storage/$recent->cover_img") }}" alt="" />
                                    </a>
                                @else
                                    <a href="{{ route('getPost', $recent) }}">
                                        <img src="{{ asset('images/cover.jpg') }}" alt="Image par defaut"
                                            class="object-cover h-[5rem] md:h-auto max-w-full">
                                    </a>
                                @endif
                            </div>
                            <div class="w-full px-3">
                                <a href="{{ route('getPost', $recent) }}">
                                    <h5 class="text-sm font-semibold tracking-tight text-gray-900 dark:text-white">
                                        {{ $recent->title }}</h5>
                                </a>
                                <div class="flex justify-between gap-1 items-center mt-auto">
                                    <a href="{{ route('authorPosts', $post->user) }}"
                                        class="flex items-center text-sm font-normal text-gray-900 dark:text-emerald-700">
                                        <svg class="h-4 text-gray-800 dark:text-emerald-700" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span
                                            class="flex-1 ms-1 text-xs whitespace-nowrap">{{ $post->user->name }}</span>
                                    </a>
                                    <a href="{{ route('getPost', $recent) }}"
                                        class="inline-flex items-center my-2 px-2 py-1 text-sm font-medium text-center text-white bg-emerald-700 rounded-md hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">
                                        <svg class="w-4 h-4 text-white dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M4.998 7.78C6.729 6.345 9.198 5 12 5c2.802 0 5.27 1.345 7.002 2.78a12.713 12.713 0 0 1 2.096 2.183c.253.344.465.682.618.997.14.286.284.658.284 1.04s-.145.754-.284 1.04a6.6 6.6 0 0 1-.618.997 12.712 12.712 0 0 1-2.096 2.183C17.271 17.655 14.802 19 12 19c-2.802 0-5.27-1.345-7.002-2.78a12.712 12.712 0 0 1-2.096-2.183 6.6 6.6 0 0 1-.618-.997C2.144 12.754 2 12.382 2 12s.145-.754.284-1.04c.153-.315.365-.653.618-.997A12.714 12.714 0 0 1 4.998 7.78ZM12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-frontend-layout>
