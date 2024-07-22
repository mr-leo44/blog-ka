<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Auteurs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
            @if (session('success'))
                <div id="success-message"
                    class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium">
                        {{ session('success') }}
                    </div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#success-message" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif
            <div class="flex justify-end my-2">
                <button data-modal-target="modal" data-modal-toggle="modal" type="button"
                    class="px-3 py-2 bg-emerald-500 hover:bg-emerald-700 text-white rounded">
                    <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14m-7 7V5" />
                    </svg>
                </button>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead
                        class="text-xs text-slate-700 text-center uppercase bg-emerald-200 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                N°
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nom
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($authors->count() > 0)
                            @foreach ($authors as $key => $author)
                                <tr
                                    class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $key + 1 }}
                                    </th>
                                    <td class="px-6 py-3">
                                        {{ $author->name }}
                                    </td>
                                    <td class="px-6 py-3">
                                        {{ $author->email }}
                                    </td>
                                    <td class="px-6 py-3 flex justify-end">
                                        <div>
                                            <form action="{{ route('authors.passwordReset', $author) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="id" value="{{ $author->id }}">
                                                <button type="submit" title="Réinitialiser mot de passe"
                                                    class="font-medium cursor-pointer bg-blue-600 hover:bg-blue-700 dark:bg-blue-600 py-2 px-3 rounded me-3 text-white dark:text-white">
                                                    <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd"
                                                            d="M15 7a2 2 0 1 1 4 0v4a1 1 0 1 0 2 0V7a4 4 0 0 0-8 0v3H5a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-7a2 2 0 0 0-2-2V7Zm-5 6a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                        <button type="button" title="Changer rôle" data-modal-target="change-role"
                                            data-modal-toggle="change-role"
                                            class="font-medium cursor-pointer bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-600 py-2 px-3 rounded me-3 text-white dark:text-white">
                                            <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path fill-rule="evenodd"
                                                    d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        @if ($author->profile->is_activated === 0)
                                            <form action="{{ route('authors.activation', $author) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="id" value="{{ $author->id }}">
                                                <input type="hidden" name="is_activated" value="1">
                                                <button type="submit" title="Activer le compte"
                                                    class="font-medium cursor-pointer bg-emerald-600 hover:bg-emerald-700 dark:bg-emerald-700 py-2 px-3 rounded text-white dark:text-white">
                                                    <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m8.032 12 1.984 1.984 4.96-4.96m4.55 5.272.893-.893a1.984 1.984 0 0 0 0-2.806l-.893-.893a1.984 1.984 0 0 1-.581-1.403V7.04a1.984 1.984 0 0 0-1.984-1.984h-1.262a1.983 1.983 0 0 1-1.403-.581l-.893-.893a1.984 1.984 0 0 0-2.806 0l-.893.893a1.984 1.984 0 0 1-1.403.581H7.04A1.984 1.984 0 0 0 5.055 7.04v1.262c0 .527-.209 1.031-.581 1.403l-.893.893a1.984 1.984 0 0 0 0 2.806l.893.893c.372.372.581.876.581 1.403v1.262a1.984 1.984 0 0 0 1.984 1.984h1.262c.527 0 1.031.209 1.403.581l.893.893a1.984 1.984 0 0 0 2.806 0l.893-.893a1.985 1.985 0 0 1 1.403-.581h1.262a1.984 1.984 0 0 0 1.984-1.984V15.7c0-.527.209-1.031.581-1.403Z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('authors.activation', $author) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="id" value="{{ $author->id }}">
                                                <input type="hidden" name="is_activated" value="0">
                                                <button type="submit"
                                                    title="Désactiver le compte"
                                                    class="font-medium cursor-pointer bg-red-600 hover:bg-red-700 dark:bg-red-700 py-2 px-3 rounded  text-white dark:text-white">
                                                    <svg class="w-5 h-5 text-white dark:text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-width="2"
                                                            d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center px-6 py-4">{{ __('Aucun auteur trouvé') }}
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="my-3 px-6">
                    {{ $authors->links() }}
                </div>
            </div>
        </div>
    </div>
    <x-author-create />
    <x-change-role :message="__('Voulez-vous vraiment supprimer cet auteur ?')" />

</x-app-layout>
