<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editer un Article') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto overflow-y-auto overflow-x-hidden flex justify-center items-center max-w-7xl md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="p-4 md:p-5">
                        <div class="max-h-auto mx-auto max-w-5xl">
                            @if ($errors->any())
                                <div class="bg-red-500 text-white px-3 py-2 rounded-lg mb-4">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="w-full" action="{{ route('posts.update', $post->slug) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div>
                                    <label for="title"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre</label>
                                    <input type="text" name="title" id="title"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        value="{{ $post->title }}" />
                                </div>
                                <div class="mt-2">
                                    <label for="editor"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contenu</label>
                                    <textarea name="content" id="editor" cols="100" rows="10"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="lorem ipsum" required>{!! $post->content !!}</textarea>
                                </div>
                                <div class="mt-2">
                                    <label for="cover_img"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image de
                                        couverture</label>
                                    <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="cover_img_help" name="cover_img" id="cover_img" type="file">
                                    <div class="mt-1 text-xs text-gray-500 dark:text-gray-300" id="user_avatar_help">
                                        JPG, JPEG, PNG (max 500Kb)
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <label for="tags"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hastags</label>
                                    <select name="tags[]" id="tags" multiple
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        required>
                                        @foreach ($post->tags as $tag)
                                            <option value="{{ $tag->name }}" selected>{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-2">
                                    <label for="category_id"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catégorie</label>
                                    <select name="category_id" id="category_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        required>
                                        <option value="" disabled>Selectionnez</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id === $post->category_id ? 'selected' :'' }}>{{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex justify-start mt-2 mb-4">
                                    <button type="submit"
                                        class="text-white bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-emerald-800">
                                        Envoyer
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <x-head.tinymce-config/>
    <x-head.tomjs-multiselect/>
</x-app-layout>
