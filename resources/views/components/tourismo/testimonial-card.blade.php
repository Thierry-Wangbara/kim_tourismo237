@props(['rating', 'content', 'author', 'position', 'initials'])

<div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg">
    <div class="flex items-center mb-4">
        <div class="text-yellow-400 text-xl">{{ $rating }}</div>
    </div>
    <p class="text-gray-600 dark:text-gray-300 mb-4">
        "{{ $content }}"
    </p>
    <div class="flex items-center">
        <div class="w-10 h-10 bg-indigo-100 dark:bg-indigo-900 rounded-full flex items-center justify-center mr-3">
            <span class="text-indigo-600 dark:text-indigo-400 font-semibold">{{ $initials }}</span>
        </div>
        <div>
            <div class="font-semibold text-gray-900 dark:text-white">{{ $author }}</div>
            <div class="text-sm text-gray-500 dark:text-gray-400">{{ $position }}</div>
        </div>
    </div>
</div>
