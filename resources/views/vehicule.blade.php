@extends('layouts.app')

@section('title', 'Véhicules - TOURISM237')

@section('content')
<x-tourism.section 
    title="Transport Sécurisé" 
    subtitle="Découvrez notre flotte de véhicules modernes et confortables pour tous vos déplacements"
    background="bg-light"
    padding="py-5"
>
    <div class="row">
        <x-tourism.vehicle-card 
            image="images/4x4-toyota.jpg"
            name="Toyota Land Cruiser"
            type="4x4"
            description="Véhicule tout-terrain idéal pour les safaris et les routes difficiles du Cameroun."
            capacity="7"
            price="80,000 FCFA/jour"
            available="true"
            :features="[
                ['name' => '4x4', 'icon' => 'car-front'],
                ['name' => 'Climatisation', 'icon' => 'snow'],
                ['name' => 'GPS', 'icon' => 'geo-alt'],
                ['name' => 'Chauffeur', 'icon' => 'person']
            ]"
        />
        
        <x-tourism.vehicle-card 
            image="images/minibus.jpg"
            name="Minibus Mercedes"
            type="Minibus"
            description="Minibus confortable pour les groupes, parfait pour les visites de sites touristiques."
            capacity="16"
            price="60,000 FCFA/jour"
            available="true"
            :features="[
                ['name' => 'Groupe', 'icon' => 'people'],
                ['name' => 'Climatisation', 'icon' => 'snow'],
                ['name' => 'WiFi', 'icon' => 'wifi'],
                ['name' => 'Chauffeur', 'icon' => 'person']
            ]"
        />
        
        <x-tourism.vehicle-card 
            image="images/sedan.jpg"
            name="Toyota Camry"
            type="Berline"
            description="Berline de luxe pour les déplacements urbains et les voyages d'affaires."
            capacity="4"
            price="45,000 FCFA/jour"
            available="false"
            :features="[
                ['name' => 'Luxe', 'icon' => 'gem'],
                ['name' => 'Climatisation', 'icon' => 'snow'],
                ['name' => 'Bluetooth', 'icon' => 'bluetooth'],
                ['name' => 'Chauffeur', 'icon' => 'person']
            ]"
        />
        
        <x-tourism.vehicle-card 
            image="images/van.jpg"
            name="Ford Transit"
            type="Van"
            description="Van spacieux pour les familles nombreuses et les groupes moyens."
            capacity="12"
            price="50,000 FCFA/jour"
            available="true"
            :features="[
                ['name' => 'Famille', 'icon' => 'house-heart'],
                ['name' => 'Climatisation', 'icon' => 'snow'],
                ['name' => 'Bagages', 'icon' => 'bag'],
                ['name' => 'Chauffeur', 'icon' => 'person']
            ]"
        />
        
        <x-tourism.vehicle-card 
            image="images/moto.jpg"
            name="Moto Taxi"
            type="Moto"
            description="Moto taxi pour les déplacements rapides en ville et les courtes distances."
            capacity="2"
            price="5,000 FCFA/jour"
            available="true"
            :features="[
                ['name' => 'Rapide', 'icon' => 'lightning'],
                ['name' => 'Économique', 'icon' => 'currency-dollar'],
                ['name' => 'Flexible', 'icon' => 'arrow-left-right'],
                ['name' => 'Chauffeur', 'icon' => 'person']
            ]"
        />
        
        <x-tourism.vehicle-card 
            image="images/bus.jpg"
            name="Bus Interurbain"
            type="Bus"
            description="Bus confortable pour les longs trajets entre les villes du Cameroun."
            capacity="50"
            price="25,000 FCFA/personne"
            available="true"
            :features="[
                ['name' => 'Long trajet', 'icon' => 'road'],
                ['name' => 'Climatisation', 'icon' => 'snow'],
                ['name' => 'Toilettes', 'icon' => 'droplet'],
                ['name' => 'Chauffeur', 'icon' => 'person']
            ]"
        />
    </div>
</x-tourism.section>

<!-- Section Services de Transport -->
<x-tourism.section 
    title="Nos Services de Transport" 
    subtitle="Nous vous offrons des solutions de transport adaptées à tous vos besoins"
>
    <div class="row">
        <div class="col-md-4 text-center mb-4">
            <div class="feature-icon">
                <i class="bi bi-shield-check"></i>
            </div>
            <h3 class="feature-title">Sécurité Avant Tout</h3>
            <p>Tous nos véhicules sont régulièrement entretenus et nos chauffeurs sont formés et certifiés.</p>
        </div>
        
        <div class="col-md-4 text-center mb-4">
            <div class="feature-icon">
                <i class="bi bi-clock"></i>
            </div>
            <h3 class="feature-title">Ponctualité</h3>
            <p>Nous respectons vos horaires et nous nous engageons à être à l'heure pour tous vos rendez-vous.</p>
        </div>
        
        <div class="col-md-4 text-center mb-4">
            <div class="feature-icon">
                <i class="bi bi-geo-alt"></i>
            </div>
            <h3 class="feature-title">Connaissance du Terrain</h3>
            <p>Nos chauffeurs connaissent parfaitement les routes et les destinations du Cameroun.</p>
        </div>
    </div>
</x-tourism.section>

<!-- Section Tarifs -->
<x-tourism.section 
    title="Tarifs de Transport" 
    subtitle="Des tarifs transparents et compétitifs pour tous vos déplacements"
    background="bg-light"
>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>Type de Véhicule</th>
                            <th>Capacité</th>
                            <th>Tarif/Jour</th>
                            <th>Disponibilité</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Toyota Land Cruiser 4x4</td>
                            <td>7 personnes</td>
                            <td>80,000 FCFA</td>
                            <td><span class="badge bg-success">Disponible</span></td>
                        </tr>
                        <tr>
                            <td>Minibus Mercedes</td>
                            <td>16 personnes</td>
                            <td>60,000 FCFA</td>
                            <td><span class="badge bg-success">Disponible</span></td>
                        </tr>
                        <tr>
                            <td>Toyota Camry</td>
                            <td>4 personnes</td>
                            <td>45,000 FCFA</td>
                            <td><span class="badge bg-danger">Indisponible</span></td>
                        </tr>
                        <tr>
                            <td>Ford Transit Van</td>
                            <td>12 personnes</td>
                            <td>50,000 FCFA</td>
                            <td><span class="badge bg-success">Disponible</span></td>
                        </tr>
                        <tr>
                            <td>Moto Taxi</td>
                            <td>2 personnes</td>
                            <td>5,000 FCFA</td>
                            <td><span class="badge bg-success">Disponible</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-tourism.section>

<!-- Call to Action -->
<x-tourism.cta 
    title="Réservez votre transport"
    subtitle="Contactez-nous pour réserver le véhicule qui correspond à vos besoins"
    buttonText="RÉSERVER UN VÉHICULE"
    buttonHref="contact"
/>
@endsection
