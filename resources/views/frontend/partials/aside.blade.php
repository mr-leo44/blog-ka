<div class="mx-3 px-2 my-8 md:my-0">
    <div class="mb-4">
        <h5 class="mb-2 border-b-2"><span class="text-xs md:text-sm font-medium tracking-tight text-gray-900 dark:text-white bg-emerald-700 px-2 py-1">Catégories</span></h5>
        <ul class="max-w-md ms-2 space-y-2 text-gray-500 list-disc list-inside dark:text-gray-400">
            @if ($categories->count() > 0)
                @foreach ($categories as $category)
                    <li class="font-normal text-xs md:text-sm text-gray-800 dark:text-white hover:text-emerald-700">
                        <a
                            href="{{ route('categoryPosts', $category) }}">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            @else
                <li>
                    Aucune catégorie
                </li>
            @endif
        </ul>
    </div>
    <div class="mt-6">
        <h5 class="mb-2 border-b-2"><span class="text-xs md:text-sm font-medium tracking-tight text-gray-900 dark:text-white bg-emerald-700 px-2 py-1">Auteurs</span></h5>
        <ul class="max-w-md ms-2 space-y-2 text-gray-500 list-disc list-inside dark:text-gray-400">
            @if ($authors->count() > 0)
                @foreach ($authors as $user)
                    <li class="list-none font-normal text-xs md:text-sm text-gray-800 dark:text-white hover:text-emerald-700">
                        <a href="{{ route('authorPosts', $user) }}">
                            {{ $user->name }}
                        </a>
                    </li>
                @endforeach
            @else
                <li>
                    Aucun auteur
                </li>
            @endif
        </ul>
    </div>
    <hr class="h-1 mt-12 bg-gray-100 border-0 rounded dark:bg-gray-700">
    <div class="my-4">
        <h5 class="mb-2 text-lg font-medium tracking-tight text-gray-900 dark:text-white">A propos de ce site</h5>
        <p class="mb-3 font-normal text-sm lg:text-md text-justify text-gray-700 dark:text-gray-400">
            Cette plateforme web est conçue dans le but d'atteindre tous les corps KA de l'archidiocèse de Kinshasa (Archikin),
            publier des articles autour de la doctrine des KA et ceux des activités liées à cette Commission</p>
    </div>
</div>
