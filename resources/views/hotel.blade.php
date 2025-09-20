@extends('layouts.app')

@section('title', 'Hôtels - TOURISM237')

@section('content')
<x-tourism.section 
    title="Hébergements de Qualité" 
    subtitle="Découvrez nos hôtels partenaires soigneusement sélectionnés pour votre confort et sécurité"
    background="bg-light"
    padding="py-5"
>
    <div class="row">
        <x-tourism.hotel-card 
            image="images/hotel-yaounde.jpg"
            name="Hôtel Mont Fébé"
            description="Hôtel 4 étoiles situé sur les hauteurs de Yaoundé avec une vue panoramique sur la capitale."
            location="Yaoundé, Centre"
            price="45,000 FCFA/nuit"
            rating="4.5"
            rooms="25"
            :amenities="[
                ['name' => 'WiFi', 'icon' => 'wifi'],
                ['name' => 'Piscine', 'icon' => 'water'],
                ['name' => 'Restaurant', 'icon' => 'cup'],
                ['name' => 'Parking', 'icon' => 'car-front']
            ]"
        />
        
        <x-tourism.hotel-card 
            image="images/hotel-douala.jpg"
            name="Hôtel Sawa"
            description="Hôtel moderne au cœur de Douala avec un accès facile aux attractions de la ville."
            location="Douala, Littoral"
            price="35,000 FCFA/nuit"
            rating="4.3"
            rooms="40"
            :amenities="[
                ['name' => 'WiFi', 'icon' => 'wifi'],
                ['name' => 'Spa', 'icon' => 'heart'],
                ['name' => 'Gym', 'icon' => 'dumbbell'],
                ['name' => 'Aéroport', 'icon' => 'airplane']
            ]"
        />
        
        <x-tourism.hotel-card 
            image="images/hotel-kribi.jpg"
            name="Hôtel des Chutes"
            description="Hôtel de charme face à l'océan Atlantique, idéal pour un séjour détente à Kribi."
            location="Kribi, Sud"
            price="28,000 FCFA/nuit"
            rating="4.7"
            rooms="20"
            :amenities="[
                ['name' => 'Plage', 'icon' => 'water'],
                ['name' => 'WiFi', 'icon' => 'wifi'],
                ['name' => 'Restaurant', 'icon' => 'cup'],
                ['name' => 'Bar', 'icon' => 'cup-straw']
            ]"
        />
        
        <x-tourism.hotel-card 
            image="images/hotel-foumban.jpg"
            name="Hôtel Chez Wou"
            description="Hôtel traditionnel au cœur de Foumban, parfait pour découvrir la culture Bamoun."
            location="Foumban, Ouest"
            price="22,000 FCFA/nuit"
            rating="4.4"
            rooms="15"
            :amenities="[
                ['name' => 'Culture', 'icon' => 'people'],
                ['name' => 'WiFi', 'icon' => 'wifi'],
                ['name' => 'Jardin', 'icon' => 'flower'],
                ['name' => 'Musée', 'icon' => 'book']
            ]"
        />
        
        <x-tourism.hotel-card 
            image="images/hotel-buea.jpg"
            name="Hôtel Mountain"
            description="Hôtel au pied du Mont Cameroun, idéal pour les randonneurs et amateurs de nature."
            location="Buea, Sud-Ouest"
            price="30,000 FCFA/nuit"
            rating="4.6"
            rooms="18"
            :amenities="[
                ['name' => 'Montagne', 'icon' => 'mountain'],
                ['name' => 'WiFi', 'icon' => 'wifi'],
                ['name' => 'Randonnée', 'icon' => 'walking'],
                ['name' => 'Nature', 'icon' => 'tree']
            ]"
        />
        
        <x-tourism.hotel-card 
            image="images/hotel-garoua.jpg"
            name="Hôtel Sahel"
            description="Hôtel confortable dans le Grand Nord, point de départ pour explorer les parcs nationaux."
            location="Garoua, Nord"
            price="25,000 FCFA/nuit"
            rating="4.2"
            rooms="30"
            :amenities="[
                ['name' => 'Safari', 'icon' => 'binoculars'],
                ['name' => 'WiFi', 'icon' => 'wifi'],
                ['name' => 'Climatisation', 'icon' => 'snow'],
                ['name' => 'Parc', 'icon' => 'tree']
            ]"
        />
    </div>
</x-tourism.section>

<!-- Section Services Hôteliers -->
<x-tourism.section 
    title="Nos Services Hôteliers" 
    subtitle="Nous vous garantissons le meilleur confort et service"
>
    <div class="row">
        <div class="col-md-4 text-center mb-4">
            <div class="feature-icon">
                <i class="bi bi-shield-check"></i>
            </div>
            <h3 class="feature-title">Sécurité Garantie</h3>
            <p>Tous nos hôtels partenaires sont soigneusement sélectionnés et certifiés pour votre sécurité.</p>
        </div>
        
        <div class="col-md-4 text-center mb-4">
            <div class="feature-icon">
                <i class="bi bi-headset"></i>
            </div>
            <h3 class="feature-title">Support 24/7</h3>
            <p>Notre équipe est disponible 24h/24 pour vous assister pendant votre séjour.</p>
        </div>
        
        <div class="col-md-4 text-center mb-4">
            <div class="feature-icon">
                <i class="bi bi-currency-exchange"></i>
            </div>
            <h3 class="feature-title">Meilleurs Prix</h3>
            <p>Nous négocions les meilleurs tarifs avec nos partenaires pour vous offrir des prix compétitifs.</p>
        </div>
    </div>
</x-tourism.section>

<!-- Call to Action -->
<x-tourism.cta 
    title="Trouvez votre hébergement idéal"
    subtitle="Réservez dès maintenant votre hôtel au Cameroun avec nos tarifs préférentiels"
    buttonText="RÉSERVER MA CHAMBRE"
    buttonHref="contact"
/>
@endsection
