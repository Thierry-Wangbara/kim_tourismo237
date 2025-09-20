<div x-data="{ show: !localStorage.getItem('cookieConsent') }" 
     x-show="show"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 transform translate-y-4"
     x-transition:enter-end="opacity-100 transform translate-y-0"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 transform translate-y-0"
     x-transition:leave-end="opacity-0 transform translate-y-4"
     class="fixed bottom-0 left-0 right-0 z-50 bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <div class="flex flex-col sm:flex-row items-center justify-between space-y-4 sm:space-y-0">
            <div class="flex-1">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                    🍪 Gestion des cookies
                </h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    Nous utilisons des cookies pour améliorer votre expérience sur notre site. 
                    En continuant à naviguer, vous acceptez notre utilisation des cookies.
                </p>
            </div>
            <div class="flex space-x-3">
                <button @click="localStorage.setItem('cookieConsent', 'accepted'); show = false" 
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                    Accepter
                </button>
                <button @click="localStorage.setItem('cookieConsent', 'declined'); show = false" 
                        class="bg-gray-200 hover:bg-gray-300 dark:bg-gray-600 dark:hover:bg-gray-500 text-gray-900 dark:text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors">
                    Refuser
                </button>
            </div>
        </div>
    </div>
</div>
