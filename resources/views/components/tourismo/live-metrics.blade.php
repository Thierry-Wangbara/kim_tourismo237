<section class="py-16 bg-gradient-to-r from-green-600 to-blue-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-4">
                Activité en Temps Réel
            </h2>
            <p class="text-xl text-green-100">
                Suivez l'activité de nos sites partenaires
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" x-data="liveMetrics()">
            <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-xl p-6 text-center">
                <div class="text-3xl font-bold text-white mb-2" x-text="visitorsToday">1,247</div>
                <div class="text-green-100">Visiteurs aujourd'hui</div>
                <div class="text-sm text-green-200 mt-1">+12% vs hier</div>
            </div>
            
            <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-xl p-6 text-center">
                <div class="text-3xl font-bold text-white mb-2" x-text="reservationsToday">89</div>
                <div class="text-green-100">Réservations aujourd'hui</div>
                <div class="text-sm text-green-200 mt-1">+8% vs hier</div>
            </div>
            
            <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-xl p-6 text-center">
                <div class="text-3xl font-bold text-white mb-2" x-text="activeSites">23</div>
                <div class="text-green-100">Sites actifs</div>
                <div class="text-sm text-green-200 mt-1">En ligne maintenant</div>
            </div>
            
            <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-xl p-6 text-center">
                <div class="text-3xl font-bold text-white mb-2" x-text="satisfactionRate">98.5%</div>
                <div class="text-green-100">Taux de satisfaction</div>
                <div class="text-sm text-green-200 mt-1">Ce mois-ci</div>
            </div>
        </div>
    </div>
</section>

<script>
function liveMetrics() {
    return {
        visitorsToday: 1247,
        reservationsToday: 89,
        activeSites: 23,
        satisfactionRate: 98.5,
        
        init() {
            // Simuler des mises à jour en temps réel
            setInterval(() => {
                this.visitorsToday += Math.floor(Math.random() * 3);
                this.reservationsToday += Math.floor(Math.random() * 2);
                this.activeSites = 20 + Math.floor(Math.random() * 8);
                this.satisfactionRate = 98 + Math.random() * 2;
            }, 5000);
        }
    }
}
</script>
