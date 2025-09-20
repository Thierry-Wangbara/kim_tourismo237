<section class="py-20 bg-gray-50 dark:bg-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                Témoignages Clients
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                Découvrez comment nos clients transforment leur gestion touristique
            </p>
        </div>
        
        <div class="relative" x-data="{ currentSlide: 0, slides: 3 }">
            <!-- Carousel Container -->
            <div class="overflow-hidden">
                <div class="flex transition-transform duration-300 ease-in-out" :style="`transform: translateX(-${currentSlide * 100}%)`">
                    <!-- Slide 1 -->
                    <div class="w-full flex-shrink-0 px-4">
                        <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg text-center">
                            <div class="text-4xl mb-4">⭐⭐⭐⭐⭐</div>
                            <p class="text-gray-600 dark:text-gray-300 mb-6 text-lg">
                                "Tourismo Kim a révolutionné la gestion de notre château. Les réservations sont devenues fluides et nos visiteurs adorent l'application mobile !"
                            </p>
                            <div class="flex items-center justify-center">
                                <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900 rounded-full flex items-center justify-center mr-4">
                                    <span class="text-indigo-600 dark:text-indigo-400 font-semibold">CD</span>
                                </div>
                                <div class="text-left">
                                    <div class="font-semibold text-gray-900 dark:text-white">Claire Dubois</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">Directrice, Château de Versailles</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Slide 2 -->
                    <div class="w-full flex-shrink-0 px-4">
                        <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg text-center">
                            <div class="text-4xl mb-4">⭐⭐⭐⭐⭐</div>
                            <p class="text-gray-600 dark:text-gray-300 mb-6 text-lg">
                                "Les analytics nous permettent de mieux comprendre nos visiteurs. Nous avons augmenté notre fréquentation de 40% !"
                            </p>
                            <div class="flex items-center justify-center">
                                <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900 rounded-full flex items-center justify-center mr-4">
                                    <span class="text-indigo-600 dark:text-indigo-400 font-semibold">MR</span>
                                </div>
                                <div class="text-left">
                                    <div class="font-semibold text-gray-900 dark:text-white">Marc Rousseau</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">Gérant, Musée du Louvre</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Slide 3 -->
                    <div class="w-full flex-shrink-0 px-4">
                        <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-lg text-center">
                            <div class="text-4xl mb-4">⭐⭐⭐⭐⭐</div>
                            <p class="text-gray-600 dark:text-gray-300 mb-6 text-lg">
                                "L'intégration a été parfaite avec notre site existant. Le support technique est exceptionnel !"
                            </p>
                            <div class="flex items-center justify-center">
                                <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900 rounded-full flex items-center justify-center mr-4">
                                    <span class="text-indigo-600 dark:text-indigo-400 font-semibold">SL</span>
                                </div>
                                <div class="text-left">
                                    <div class="font-semibold text-gray-900 dark:text-white">Sophie Laurent</div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">Responsable, Site Archéologique</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Navigation Buttons -->
            <button @click="currentSlide = currentSlide > 0 ? currentSlide - 1 : slides - 1" 
                    class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-white dark:bg-gray-800 rounded-full p-2 shadow-lg hover:shadow-xl transition-shadow">
                <svg class="w-6 h-6 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            
            <button @click="currentSlide = currentSlide < slides - 1 ? currentSlide + 1 : 0" 
                    class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-white dark:bg-gray-800 rounded-full p-2 shadow-lg hover:shadow-xl transition-shadow">
                <svg class="w-6 h-6 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
            
            <!-- Dots Indicator -->
            <div class="flex justify-center mt-8 space-x-2">
                <template x-for="i in slides" :key="i">
                    <button @click="currentSlide = i - 1" 
                            class="w-3 h-3 rounded-full transition-colors"
                            :class="currentSlide === i - 1 ? 'bg-indigo-600' : 'bg-gray-300 dark:bg-gray-600'">
                    </button>
                </template>
            </div>
        </div>
    </div>
</section>
