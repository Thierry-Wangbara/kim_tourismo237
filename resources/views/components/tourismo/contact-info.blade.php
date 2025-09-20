@props(['icon', 'title', 'value', 'href' => null])

<div class="flex items-center">
    <div class="text-2xl mr-4">{{ $icon }}</div>
    <div>
        <div class="font-semibold text-gray-900 dark:text-white">{{ $title }}</div>
        @if($href)
            <a href="{{ $href }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 transition-colors">
                {{ $value }}
            </a>
        @else
            <div class="text-gray-600 dark:text-gray-300">{{ $value }}</div>
        @endif
    </div>
</div>
