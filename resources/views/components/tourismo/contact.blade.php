<section id="contact" class="py-20 bg-white dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                Contactez-nous
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                Prêt à transformer la gestion de votre site touristique ?
            </p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div>
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">
                    Informations de contact
                </h3>
                <div class="space-y-4">
                    <x-tourismo.contact-info 
                        icon="📧"
                        title="Email"
                        value="contact@tourismo-kim.com"
                        href="mailto:contact@tourismo-kim.com"
                    />
                    <x-tourismo.contact-info 
                        icon="📞"
                        title="Téléphone"
                        value="+33 1 23 45 67 89"
                        href="tel:+33123456789"
                    />
                    <x-tourismo.contact-info 
                        icon="📍"
                        title="Adresse"
                        value="123 Avenue des Champs-Élysées
75008 Paris, France"
                    />
                </div>
            </div>
            
            <div class="bg-gray-50 dark:bg-gray-700 p-8 rounded-xl">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">
                    Demander une démonstration
                </h3>
                <x-tourismo.contact-form />
            </div>
        </div>
    </div>
</section>
