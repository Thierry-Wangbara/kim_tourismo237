<div class="md:hidden">
    <button @click="open = !open" class="text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 focus:outline-none focus:text-indigo-600 dark:focus:text-indigo-400">
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
    
    <div x-show="open" @click.away="open = false" class="absolute top-16 left-0 right-0 bg-white dark:bg-gray-900 shadow-lg border-t border-gray-200 dark:border-gray-700">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="#accueil" class="block px-3 py-2 text-gray-900 dark:text-white hover:text-indigo-600 dark:hover:text-indigo-400 rounded-md text-base font-medium">Accueil</a>
            <a href="#services" class="block px-3 py-2 text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 rounded-md text-base font-medium">Services</a>
            <a href="#statistiques" class="block px-3 py-2 text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 rounded-md text-base font-medium">Statistiques</a>
            <a href="#contact" class="block px-3 py-2 text-gray-700 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 rounded-md text-base font-medium">Contact</a>
        </div>
    </div>
</div>
