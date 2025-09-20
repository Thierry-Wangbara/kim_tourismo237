@props(['id', 'title', 'subtitle', 'background' => 'bg-white dark:bg-gray-800', 'padding' => 'py-20'])

<section id="{{ $id }}" class="{{ $padding }} {{ $background }}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($title || $subtitle)
            <div class="text-center mb-16">
                @if($title)
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        {{ $title }}
                    </h2>
                @endif
                @if($subtitle)
                    <p class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                        {{ $subtitle }}
                    </p>
                @endif
            </div>
        @endif
        
        {{ $slot }}
    </div>
</section>
