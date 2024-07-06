@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-normal text-xs text-gray-700 dark:text-white']) }}>
    {{ $value ?? $slot }}
</label>
