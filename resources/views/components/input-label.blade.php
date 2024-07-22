@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-normal text-xs text-gray-700 dark:text-emerald-700']) }}>
    {{ $value ?? $slot }}
</label>
