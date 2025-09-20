<section class="py-20 bg-gray-50 dark:bg-gray-700">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                Questions Fréquentes
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300">
                Trouvez les réponses à vos questions
            </p>
        </div>
        
        <div class="space-y-4" x-data="{ openItem: null }">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md">
                <button @click="openItem = openItem === 1 ? null : 1" class="w-full px-6 py-4 text-left flex justify-between items-center focus:outline-none">
                    <span class="text-lg font-semibold text-gray-900 dark:text-white">Comment fonctionne le système de réservation ?</span>
                    <svg class="w-5 h-5 text-gray-500 transform transition-transform" :class="{ 'rotate-180': openItem === 1 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="openItem === 1" x-transition class="px-6 pb-4">
                    <p class="text-gray-600 dark:text-gray-300">
                        Notre système de réservation permet aux visiteurs de réserver leurs créneaux en ligne, 
                        avec gestion automatique des disponibilités, paiements sécurisés et confirmations par email. 
                        Vous pouvez configurer vos horaires, capacités et tarifs selon vos besoins.
                    </p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md">
                <button @click="openItem = openItem === 2 ? null : 2" class="w-full px-6 py-4 text-left flex justify-between items-center focus:outline-none">
                    <span class="text-lg font-semibold text-gray-900 dark:text-white">Puis-je intégrer le système avec mon site existant ?</span>
                    <svg class="w-5 h-5 text-gray-500 transform transition-transform" :class="{ 'rotate-180': openItem === 2 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="openItem === 2" x-transition class="px-6 pb-4">
                    <p class="text-gray-600 dark:text-gray-300">
                        Oui, notre système s'intègre facilement avec la plupart des sites web existants via des APIs, 
                        des widgets ou des iframes. Nous fournissons une documentation complète et un support technique 
                        pour vous accompagner dans l'intégration.
                    </p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md">
                <button @click="openItem = openItem === 3 ? null : 3" class="w-full px-6 py-4 text-left flex justify-between items-center focus:outline-none">
                    <span class="text-lg font-semibold text-gray-900 dark:text-white">Quels types de paiements sont acceptés ?</span>
                    <svg class="w-5 h-5 text-gray-500 transform transition-transform" :class="{ 'rotate-180': openItem === 3 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="openItem === 3" x-transition class="px-6 pb-4">
                    <p class="text-gray-600 dark:text-gray-300">
                        Nous acceptons tous les moyens de paiement courants : cartes bancaires (Visa, Mastercard, American Express), 
                        PayPal, virements bancaires et paiements par mobile. Tous les paiements sont sécurisés et conformes aux standards PCI DSS.
                    </p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md">
                <button @click="openItem = openItem === 4 ? null : 4" class="w-full px-6 py-4 text-left flex justify-between items-center focus:outline-none">
                    <span class="text-lg font-semibold text-gray-900 dark:text-white">Y a-t-il une période d'essai gratuite ?</span>
                    <svg class="w-5 h-5 text-gray-500 transform transition-transform" :class="{ 'rotate-180': openItem === 4 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="openItem === 4" x-transition class="px-6 pb-4">
                    <p class="text-gray-600 dark:text-gray-300">
                        Oui, nous offrons une période d'essai gratuite de 14 jours pour tous nos plans. 
                        Vous pouvez tester toutes les fonctionnalités sans engagement et annuler à tout moment.
                    </p>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md">
                <button @click="openItem = openItem === 5 ? null : 5" class="w-full px-6 py-4 text-left flex justify-between items-center focus:outline-none">
                    <span class="text-lg font-semibold text-gray-900 dark:text-white">Comment puis-je obtenir de l'aide si j'ai des questions ?</span>
                    <svg class="w-5 h-5 text-gray-500 transform transition-transform" :class="{ 'rotate-180': openItem === 5 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
                <div x-show="openItem === 5" x-transition class="px-6 pb-4">
                    <p class="text-gray-600 dark:text-gray-300">
                        Notre équipe de support est disponible 24h/24 et 7j/7. Vous pouvez nous contacter par email, 
                        chat en direct, ou téléphone. Nous proposons également une documentation complète, 
                        des tutoriels vidéo et des webinaires de formation.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
