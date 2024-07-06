<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-emerald-700 border border-transparent rounded-md font-medium text-xs text-white uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-emerald-800 focus:bg-gray-700 dark:focus:bg-emerald-700 active:bg-gray-900 dark:active:bg-emerald-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
