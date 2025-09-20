@props(['type' => 'success', 'message', 'show' => false])

<div x-data="{ show: @js($show) }" 
     x-show="show" 
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform translate-y-2"
     x-transition:enter-end="opacity-100 transform translate-y-0"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 transform translate-y-0"
     x-transition:leave-end="opacity-0 transform translate-y-2"
     class="fixed top-4 right-4 z-50 max-w-sm w-full">
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 p-4">
        <div class="flex items-start">
            <div class="flex-shrink-0">
                @if($type === 'success')
                    <div class="text-green-500 text-xl">✅</div>
                @elseif($type === 'error')
                    <div class="text-red-500 text-xl">❌</div>
                @elseif($type === 'warning')
                    <div class="text-yellow-500 text-xl">⚠️</div>
                @else
                    <div class="text-blue-500 text-xl">ℹ️</div>
                @endif
            </div>
            <div class="ml-3 flex-1">
                <p class="text-sm font-medium text-gray-900 dark:text-white">
                    {{ $message }}
                </p>
            </div>
            <div class="ml-4 flex-shrink-0">
                <button @click="show = false" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                    <span class="sr-only">Fermer</span>
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
