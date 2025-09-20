<section class="py-20 bg-gradient-to-br from-indigo-50 to-purple-50 dark:from-gray-800 dark:to-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                Pourquoi choisir Tourismo Kim ?
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                Des avantages concrets pour votre site touristique
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <x-tourismo.feature-card 
                icon="⚡"
                title="Gain de Temps"
                description="Automatisez vos processus de gestion et gagnez du temps précieux pour vous concentrer sur l'essentiel."
                :benefits="['Réservations automatiques', 'Rapports générés automatiquement', 'Notifications intelligentes']"
            />

            <x-tourismo.feature-card 
                icon="💰"
                title="Augmentation des Revenus"
                description="Optimisez vos tarifs et augmentez vos revenus grâce à nos outils d'analyse avancés."
                :benefits="['Pricing dynamique', 'Suggestions d\'optimisation', 'Suivi des performances']"
            />

            <x-tourismo.feature-card 
                icon="😊"
                title="Satisfaction Client"
                description="Améliorez l'expérience de vos visiteurs avec des outils modernes et intuitifs."
                :benefits="['Interface utilisateur intuitive', 'Support multilingue', 'Application mobile']"
            />

            <x-tourismo.feature-card 
                icon="📈"
                title="Croissance Durable"
                description="Développez votre activité touristique de manière durable et mesurable."
                :benefits="['Analytics détaillés', 'Prédictions de fréquentation', 'Recommandations personnalisées']"
            />

            <x-tourismo.feature-card 
                icon="🔒"
                title="Sécurité Garantie"
                description="Protégez vos données et celles de vos visiteurs avec nos protocoles de sécurité avancés."
                :benefits="['Chiffrement des données', 'Conformité RGPD', 'Sauvegardes automatiques']"
            />

            <x-tourismo.feature-card 
                icon="🛠️"
                title="Support 24/7"
                description="Bénéficiez d'un support technique disponible 24h/24 et 7j/7 pour vous accompagner."
                :benefits="['Support technique dédié', 'Formation personnalisée', 'Mises à jour régulières']"
            />
        </div>
    </div>
</section>
