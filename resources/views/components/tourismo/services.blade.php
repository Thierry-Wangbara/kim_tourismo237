<section id="services" class="py-20 bg-white dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                Nos Services
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                Des solutions complètes pour gérer efficacement votre site touristique
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <x-tourismo.service-card 
                icon="🎫"
                title="Gestion des Réservations"
                description="Système de réservation en ligne avec gestion des créneaux, paiements sécurisés et confirmations automatiques."
                :features="['Réservations en temps réel', 'Paiements en ligne', 'Notifications automatiques']"
                gradient="from-blue-50 to-indigo-50"
            />

            <x-tourismo.service-card 
                icon="📊"
                title="Analytics & Reporting"
                description="Tableaux de bord détaillés avec analyses des performances, tendances et rapports personnalisés."
                :features="['Statistiques en temps réel', 'Rapports personnalisés', 'Prédictions de fréquentation']"
                gradient="from-green-50 to-emerald-50"
            />

            <x-tourismo.service-card 
                icon="👥"
                title="Gestion des Visiteurs"
                description="Suivi des visiteurs, gestion des groupes, contrôle d'accès et historique des visites."
                :features="['Contrôle d\'accès', 'Gestion des groupes', 'Historique des visites']"
                gradient="from-purple-50 to-pink-50"
            />

            <x-tourismo.service-card 
                icon="📱"
                title="Application Mobile"
                description="Application mobile pour les visiteurs avec guides audio, plans interactifs et informations pratiques."
                :features="['Guides audio multilingues', 'Plans interactifs', 'Notifications push']"
                gradient="from-orange-50 to-red-50"
            />

            <x-tourismo.service-card 
                icon="🛒"
                title="Boutique en Ligne"
                description="E-commerce intégré pour la vente de souvenirs, billets et produits dérivés."
                :features="['Catalogue de produits', 'Panier d\'achat', 'Gestion des stocks']"
                gradient="from-teal-50 to-cyan-50"
            />

            <x-tourismo.service-card 
                icon="🎯"
                title="Marketing & Communication"
                description="Outils de marketing digital, campagnes email et gestion des réseaux sociaux."
                :features="['Campagnes email', 'Gestion réseaux sociaux', 'Publicités ciblées']"
                gradient="from-yellow-50 to-amber-50"
            />
        </div>
    </div>
</section>
