<section class="py-16 bg-indigo-600">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-4">
            Restez informé de nos actualités
        </h2>
        <p class="text-xl text-indigo-100 mb-8">
            Recevez nos dernières fonctionnalités, conseils et offres spéciales
        </p>
        
        <form class="max-w-md mx-auto" x-data="{ email: '', submitted: false }" @submit.prevent="submitted = true">
            <div class="flex flex-col sm:flex-row gap-4">
                <input 
                    type="email" 
                    x-model="email"
                    placeholder="Votre adresse email"
                    class="flex-1 px-4 py-3 rounded-lg border-0 focus:ring-2 focus:ring-indigo-300 focus:outline-none"
                    required
                >
                <button 
                    type="submit"
                    class="bg-white text-indigo-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors focus:outline-none focus:ring-2 focus:ring-indigo-300"
                >
                    S'abonner
                </button>
            </div>
            
            <div x-show="submitted" x-transition class="mt-4 text-indigo-100">
                <p>✅ Merci ! Vous êtes maintenant abonné à notre newsletter.</p>
            </div>
        </form>
        
        <p class="text-sm text-indigo-200 mt-4">
            Nous respectons votre vie privée. Désabonnement possible à tout moment.
        </p>
    </div>
</section>
