@props(['videoId', 'title', 'author', 'position', 'thumbnail' => null])

<div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
    <div class="aspect-video bg-gray-200 dark:bg-gray-700 relative group cursor-pointer" @click="open = true">
        @if($thumbnail)
            <img src="{{ $thumbnail }}" alt="{{ $title }}" class="w-full h-full object-cover">
        @else
            <div class="w-full h-full flex items-center justify-center">
                <div class="text-6xl text-gray-400">🎥</div>
            </div>
        @endif
        
        <!-- Play button overlay -->
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="bg-white bg-opacity-90 rounded-full p-4 group-hover:bg-opacity-100 transition-all">
                <svg class="w-8 h-8 text-indigo-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z"/>
                </svg>
            </div>
        </div>
    </div>
    
    <div class="p-6">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">{{ $title }}</h3>
        <div class="flex items-center">
            <div class="w-10 h-10 bg-indigo-100 dark:bg-indigo-900 rounded-full flex items-center justify-center mr-3">
                <span class="text-indigo-600 dark:text-indigo-400 font-semibold text-sm">{{ substr($author, 0, 2) }}</span>
            </div>
            <div>
                <div class="font-semibold text-gray-900 dark:text-white">{{ $author }}</div>
                <div class="text-sm text-gray-500 dark:text-gray-400">{{ $position }}</div>
            </div>
        </div>
    </div>
    
    <!-- Video Modal -->
    <div x-data="{ open: false }" x-show="open" x-transition class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="open = false"></div>
            
            <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
                <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6">
                    <div class="aspect-video">
                        <iframe 
                            src="https://www.youtube.com/embed/{{ $videoId }}?autoplay=1" 
                            class="w-full h-full rounded-lg"
                            frameborder="0" 
                            allow="autoplay; encrypted-media" 
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button @click="open = false" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Fermer
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
