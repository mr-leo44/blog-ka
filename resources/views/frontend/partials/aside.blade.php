<div class="px-3">
    <div class="w-full p-2 my-2">
        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Catégories</h5>
        <ul class="max-w-md space-y-2 text-gray-500 list-disc list-inside dark:text-gray-400">
            @if ($categories->count() > 0)
                @foreach ($categories as $category)
                    <li>
                        <a class="font-medium my-2 text-gray-800 dark:text-white hover:text-emerald-500"
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
            class="inline-flex items-center my-4 px-3 py-2 text-sm font-medium text-center text-emerald-500 rounded-lg hover:text-emerald-600">
            Plus de catégories
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
        </a>
    </div>
    <hr class="w-full h-1 mx-auto my-0 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">
    <div class="w-full p-2 my-2">
        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Auteurs</h5>
        <ul class="max-w-md space-y-2 text-gray-500 list-disc list-inside dark:text-gray-400">
            @if ($authors->count() > 0)
                @foreach ($authors as $user)
                    <li>
                        <a class="font-medium my-2 text-gray-800 dark:text-white hover:text-emerald-500"
                            href="{{ route('authorPosts', $user) }}">
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
            class="inline-flex items-center my-4 px-3 py-2 text-sm font-medium text-center text-emerald-500 rounded-lg hover:text-emerald-600">
            Voir plus
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9" />
            </svg>
        </a>
    </div>
    <hr class="w-full h-1 mx-auto my-0 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">
    <div class="w-full p-4 my-4 border border-gray-200 rounded-lg shadow dark:border-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">A propos de ce site</h5>
        <p class="mb-3 font-normal text-justify text-gray-700 dark:text-gray-400">
            Cette plateforme web est conçu dans le but d'atteindre trous les corps KA de l'archidiocèse de Kinshasa,
            publier des articles autour de la doctrine des KA et ceux des activités liées à cette commission</p>
    </div>
</div>
