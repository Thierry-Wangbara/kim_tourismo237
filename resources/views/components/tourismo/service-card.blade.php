@props(['icon', 'title', 'description', 'features', 'gradient' => 'from-blue-50 to-indigo-50'])

<div class="bg-gradient-to-br {{ $gradient }} dark:from-gray-700 dark:to-gray-600 p-8 rounded-xl shadow-lg hover:shadow-xl transition-shadow">
    <div class="text-4xl mb-4">{{ $icon }}</div>
    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">{{ $title }}</h3>
    <p class="text-gray-600 dark:text-gray-300 mb-4">
        {{ $description }}
    </p>
    <ul class="text-sm text-gray-500 dark:text-gray-400 space-y-1">
        @foreach($features as $feature)
            <li>• {{ $feature }}</li>
        @endforeach
    </ul>
</div>
