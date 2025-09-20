<section class="py-20 bg-gray-50 dark:bg-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                Témoignages Clients
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                Ce que nos clients disent de nos services
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <x-tourismo.testimonial-card 
                rating="⭐⭐⭐⭐⭐"
                content="Une solution complète qui a révolutionné la gestion de notre musée. Les réservations sont devenues fluides et nos visiteurs sont ravis."
                author="Marie Johnson"
                position="Directrice, Musée d'Art"
                initials="MJ"
            />

            <x-tourismo.testimonial-card 
                rating="⭐⭐⭐⭐⭐"
                content="Les analytics nous permettent de mieux comprendre nos visiteurs et d'optimiser notre offre. Un outil indispensable !"
                author="Pierre Dubois"
                position="Gérant, Château Historique"
                initials="PD"
            />

            <x-tourismo.testimonial-card 
                rating="⭐⭐⭐⭐⭐"
                content="L'application mobile a considérablement amélioré l'expérience de nos visiteurs. Ils adorent les guides audio !"
                author="Sophie Laurent"
                position="Responsable, Site Archéologique"
                initials="SL"
            />
        </div>
    </div>
</section>
