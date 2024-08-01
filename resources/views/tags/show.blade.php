<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ $tag->name }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead
                        class="text-xs text-slate-700 text-center uppercase bg-emerald-200 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                N°
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Titre
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Contenu
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Auteur
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Catégorie
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Statut
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Date de publication
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($posts->count() > 0)
                            @foreach ($posts as $key => $post)
                                <tr
                                    class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $key + 1 }}
                                    </th>
                                    <td class="px-6 py-3">
                                        {{ $post->title }}
                                    </td>
                                    <td class="px-6 py-3">
                                        {!! Str::limit($post->content, 20, '...') !!}
                                    </td>
                                    <td class="px-6 py-3">
                                        {{ $post->user->name }}
                                    </td>
                                    <td class="px-6 py-3">
                                        {{ $post->category->name }}
                                    </td>
                                    @if ($post->is_published === 1)
                                        <td class="px-6 py-3">
                                            {{ __('Publié') }}
                                        </td>
                                    @else
                                        <td class="px-6 py-3">
                                            {{ __('Non publié') }}
                                        </td>
                                    @endif
                                    @if ($post->is_published === 1)
                                        <td class="px-6 py-3">
                                            {{ $post->created_at->format('d-m-Y') }}
                                        </td>
                                    @else
                                        <td class="px-6 py-3"></td>
                                    @endif
                                    <td class="px-6 py-3 flex justify-end">
                                        <a href="{{ route('posts.show', $post) }}">
                                            <div
                                                class="font-medium bg-amber-400 hover:bg-amber-400 dark:bg-amber-400 py-2 px-3 rounded me-3 text-white dark:text-white">
                                                <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M4.998 7.78C6.729 6.345 9.198 5 12 5c2.802 0 5.27 1.345 7.002 2.78a12.713 12.713 0 0 1 2.096 2.183c.253.344.465.682.618.997.14.286.284.658.284 1.04s-.145.754-.284 1.04a6.6 6.6 0 0 1-.618.997 12.712 12.712 0 0 1-2.096 2.183C17.271 17.655 14.802 19 12 19c-2.802 0-5.27-1.345-7.002-2.78a12.712 12.712 0 0 1-2.096-2.183 6.6 6.6 0 0 1-.618-.997C2.144 12.754 2 12.382 2 12s.145-.754.284-1.04c.153-.315.365-.653.618-.997A12.714 12.714 0 0 1 4.998 7.78ZM12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </a>
                                        <a href="{{ route('posts.edit', $post) }}"
                                            class="font-medium bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 py-2 px-3 rounded me-3 text-white dark:text-white">
                                            <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('posts.destroy', $post) }}" data-modal-target="delete-modal"
                                            data-modal-toggle="delete-modal" onclick="supprimer(event)"
                                            class="font-medium bg-red-600 hover:bg-red-700 dark:bg-red-700 py-2 px-3 rounded  text-white dark:text-white">
                                            <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" class="text-center px-6 py-4">{{ __('Aucun post trouvé') }}
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="my-3 px-6">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
    <x-delete :message="__('Voulez-vous vraiment supprimer cet Article ?')" />

</x-app-layout>
