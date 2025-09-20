@props(['icon', 'title', 'description', 'benefits'])

<div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl transition-shadow p-8 border border-gray-200 dark:border-gray-700">
    <div class="text-center">
        <div class="text-5xl mb-4">{{ $icon }}</div>
        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">{{ $title }}</h3>
        <p class="text-gray-600 dark:text-gray-300 mb-6">{{ $description }}</p>
        
        @if($benefits)
            <ul class="text-left space-y-2">
                @foreach($benefits as $benefit)
                    <li class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                        <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        {{ $benefit }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
