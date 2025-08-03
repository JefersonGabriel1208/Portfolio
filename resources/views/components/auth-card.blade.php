<div {{ $attributes->merge(['class' => 'w-full max-w-md p-6 bg-gray-800 shadow-md overflow-hidden sm:rounded-lg']) }}>
    {{ $logo ?? '' }}
    <div class="mt-4">
        {{ $slot }}
    </div>
</div>
