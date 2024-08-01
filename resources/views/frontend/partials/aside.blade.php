<div class="mx-3 px-2 my-8 md:my-0">
    <div class="mb-4">
        <h5 class="mb-2 border-b-2"><span
                class="text-xs md:text-sm font-medium tracking-tight text-white bg-gray-900 px-2 py-1">Catégories</span>
        </h5>
        @if ($categories->count() > 0)
            @foreach ($categories as $category)
                <div class="inline-block my-1">
                    <span><a href="{{ route('categoryPosts', $category) }}"
                            class="text-gray-800 transition ease-in-out hover:text-gray-900 dark:text-white dark:hover:text-white text-xs font-medium p-0.5">{{ $category->name }}</a></span>
                </div>
            @endforeach
        @else
            <span>
                Aucune catégorie
            </span>
        @endif
    </div>
    <div class="mt-6">
        <h5 class="mb-2 border-b-2"><span
                class="text-xs md:text-sm font-medium tracking-tight text-white bg-gray-900 px-2 py-1">Hastags</span>
        </h5>
        @if ($tags->count() > 0)
            @foreach ($tags as $tag)
                <div class="inline-block mt-1">
                    <span><a href="{{ route('tagPosts', $tag) }}"
                            class="transition ease-in-out text-gray-800 dark:text-white hover:text-gray-900 dark:hover:text-white text-xs font-medium p-0.5">#{{ $tag->name }}</a></span>
                </div>
            @endforeach
        @else
            <span>
                Aucun hastag
            </span>
        @endif
    </div>
    <hr class="h-1 mt-12 bg-gray-100 border-0 rounded dark:bg-gray-700">
    <div class="my-4">
        <h5 class="mb-2 text-lg font-medium tracking-tight text-gray-900 dark:text-white">A propos de ce site</h5>
        <p class="mb-3 font-normal text-sm lg:text-md text-justify text-gray-700 dark:text-gray-400">
            Cette plateforme web est conçue dans le but d'atteindre tous les corps KA de l'archidiocèse de Kinshasa
            (Archikin),
            publier des articles autour de la doctrine des KA et ceux des activités liées à cette Commission</p>
    </div>
</div>
