@props(['title' => 'Contactez-nous', 'subtitle' => 'Nous sommes là pour vous aider à planifier votre voyage au Cameroun'])

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card shadow">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <h3 class="fw-bold">{{ $title }}</h3>
                    <p class="text-muted">{{ $subtitle }}</p>
                </div>
                
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="firstName" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="lastName" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Téléphone</label>
                            <input type="tel" class="form-control" id="phone">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="service" class="form-label">Service souhaité</label>
                        <select class="form-select" id="service">
                            <option value="">Sélectionnez un service</option>
                            <option value="sites">Visite de sites touristiques</option>
                            <option value="hotel">Réservation d'hôtel</option>
                            <option value="transport">Transport</option>
                            <option value="package">Package complet</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" rows="5" placeholder="Décrivez votre projet de voyage..."></textarea>
                    </div>
                    
                    <div class="text-center">
                        <x-tourism.button type="submit" variant="primary" size="lg" icon="send">
                            Envoyer le message
                        </x-tourism.button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
