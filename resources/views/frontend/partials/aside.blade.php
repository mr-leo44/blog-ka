<div class="mx-3 px-2 my-8 md:my-0">
    <div>
        <h5 class="mb-2 border-b-2"><span class="text-xs md:text-sm font-medium tracking-tight text-gray-900 text-white bg-emerald-500 px-2 py-1">Catégories</span></h5>
        <ul class="max-w-md ms-2 space-y-2 text-gray-500 list-disc list-inside dark:text-gray-400">
            @if ($categories->count() > 0)
                @foreach ($categories as $category)
                    <li class="font-normal text-xs md:text-sm text-gray-800 dark:text-white hover:text-emerald-500">
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
        <a href="{{ route('getCategories') }}"
            class="inline-flex items-center mb-4 pt-2 text-xs text-center text-emerald-500 rounded-lg hover:text-emerald-600">
            Plus de catégories
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
        </a>
    </div>
    <div class="mt-4">
        <h5 class="mb-2 border-b-2"><span class="text-xs md:text-sm font-medium tracking-tight text-gray-900 text-white bg-emerald-500 px-2 py-1">Auteurs</span></h5>
        <ul class="max-w-md ms-2 space-y-2 text-gray-500 list-disc list-inside dark:text-gray-400">
            @if ($authors->count() > 0)
                @foreach ($authors as $user)
                    <li class="font-normal text-xs md:text-sm text-gray-800 dark:text-white hover:text-emerald-500">
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
        <a href="{{ route('getAuthors') }}"
        class="inline-flex items-center mb-4 pt-2 text-xs text-center text-emerald-500 rounded-lg hover:text-emerald-600">
            Voir plus
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
        </a>
    </div>
    <hr class="h-1 mt-12 bg-gray-100 border-0 rounded dark:bg-gray-700">
    <div class="my-4">
        <h5 class="mb-2 text-lg font-medium tracking-tight text-gray-900 dark:text-white">A propos de ce site</h5>
        <p class="mb-3 font-normal text-sm lg:text-md text-justify text-gray-700 dark:text-gray-400">
            Cette plateforme web est conçu dans le but d'atteindre trous les corps KA de l'archidiocèse de Kinshasa,
            publier des articles autour de la doctrine des KA et ceux des activités liées à cette commission</p>
    </div>
</div>
