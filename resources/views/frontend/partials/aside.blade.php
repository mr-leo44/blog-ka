<div class="mx-3 px-2 my-8 md:my-0">
    <div class="mb-4">
        <h5 class="mb-2 border-b-2"><span
                class="text-xs md:text-sm font-medium tracking-tight text-white bg-gray-900 px-2 py-1">Catégories</span>
        </h5>
        @if ($categories->count() > 0)
            @foreach ($categories as $category)
                <a href="{{ route('categoryPosts', $category) }}"
                    class="bg-emerald-600 transition ease-in-out hover:bg-emerald-800 text-white text-xs font-medium px-2.5 py-0.5 rounded border border-emerald-400">{{ $category->name }}</a>
            @endforeach
        @else
            <span>
                Aucune catégorie
            </span>
        @endif
    </div>
    <div class="mt-6">
        <h5 class="mb-2 border-b-2"><span
                class="text-xs md:text-sm font-medium tracking-tight text-white bg-gray-900 px-2 py-1">Auteurs</span>
        </h5>
        @if ($authors->count() > 0)
            @foreach ($authors as $user)
                <a href="{{ route('authorPosts', $user) }}"
                    class="bg-blue-600 transition ease-in-out hover:bg-blue-800 text-white text-xs font-medium px-2.5 py-0.5 rounded border border-blue-400">{{ $user->name }}</a>
            @endforeach
        @else
            <span>
                Aucun auteur
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
