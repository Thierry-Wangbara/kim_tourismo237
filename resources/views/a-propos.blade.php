@extends('layouts.app')

@section('title', 'À Propos - TOURISM237')

@section('content')
<!-- Hero Section -->
<section class="hero-section" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('images/equipe.jpg') no-repeat center center; background-size: cover;">
    <div class="container">
        <h1 class="hero-title">À Propos de TOURISM237</h1>
        <p class="hero-subtitle">Votre partenaire de confiance pour découvrir les merveilles du Cameroun</p>
    </div>
</section>

<!-- Notre Histoire -->
<x-tourism.section 
    title="Notre Histoire" 
    subtitle="Une passion pour le tourisme camerounais"
    padding="py-5"
>
    <div class="row align-items-center">
        <div class="col-md-6">
            <h4>Notre Mission</h4>
            <p class="lead">
                TOURISM237 est né de la passion pour faire découvrir les richesses culturelles et naturelles 
                du Cameroun, l'Afrique en miniature. Nous nous engageons à offrir des expériences de voyage 
                authentiques et mémorables.
            </p>
            <p>
                Depuis notre création, nous avons accompagné des milliers de voyageurs dans leur découverte 
                du Cameroun, en leur proposant des services de qualité et des guides experts.
            </p>
        </div>
        <div class="col-md-6">
            <img src="images/equipe-travail.jpg" class="img-fluid rounded" alt="Notre équipe">
        </div>
    </div>
</x-tourism.section>

<!-- Nos Valeurs -->
<x-tourism.section 
    title="Nos Valeurs" 
    subtitle="Ce qui nous guide dans notre mission"
    background="bg-light"
>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <i class="bi bi-heart-fill text-primary display-4 mb-3"></i>
                    <h5 class="card-title">Passion</h5>
                    <p class="card-text">
                        Nous sommes passionnés par le tourisme et nous mettons tout notre cœur 
                        à vous faire découvrir les beautés du Cameroun.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <i class="bi bi-shield-check text-primary display-4 mb-3"></i>
                    <h5 class="card-title">Sécurité</h5>
                    <p class="card-text">
                        Votre sécurité est notre priorité. Tous nos services sont sécurisés 
                        et nos partenaires sont soigneusement sélectionnés.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <i class="bi bi-people-fill text-primary display-4 mb-3"></i>
                    <h5 class="card-title">Service Client</h5>
                    <p class="card-text">
                        Notre équipe dédiée est disponible 24h/24 pour vous accompagner 
                        et répondre à tous vos besoins.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-tourism.section>

<!-- Notre Équipe -->
<x-tourism.section 
    title="Notre Équipe" 
    subtitle="Des professionnels passionnés à votre service"
>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <img src="images/sarah.png" class="card-img-top rounded-circle mx-auto mt-3" style="width: 150px; height: 150px; object-fit: cover;" alt="Sarah">
                <div class="card-body">
                    <h5 class="card-title">Sarah Manga</h5>
                    <p class="text-muted">Directrice Générale</p>
                    <p class="card-text">
                        Passionnée de tourisme, Sarah dirige TOURISM237 avec une vision claire 
                        de faire découvrir le Cameroun au monde entier.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <img src="images/guide1.jpg" class="card-img-top rounded-circle mx-auto mt-3" style="width: 150px; height: 150px; object-fit: cover;" alt="Guide">
                <div class="card-body">
                    <h5 class="card-title">Jean-Pierre Nguema</h5>
                    <p class="text-muted">Guide Principal</p>
                    <p class="card-text">
                        Guide expérimenté avec plus de 10 ans d'expérience, Jean-Pierre connaît 
                        tous les secrets du Cameroun.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card text-center">
                <img src="images/guide2.jpg" class="card-img-top rounded-circle mx-auto mt-3" style="width: 150px; height: 150px; object-fit: cover;" alt="Guide">
                <div class="card-body">
                    <h5 class="card-title">Marie-Claire Fouda</h5>
                    <p class="text-muted">Responsable Logistique</p>
                    <p class="card-text">
                        Marie-Claire s'occupe de la logistique et s'assure que chaque détail 
                        de votre voyage soit parfaitement organisé.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-tourism.section>

<!-- Nos Partenaires -->
<x-tourism.section 
    title="Nos Partenaires" 
    subtitle="Des partenaires de confiance pour un service de qualité"
    background="bg-light"
>
    <div class="row">
        <div class="col-md-3 col-6 mb-4 text-center">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center justify-content-center">
                    <h5 class="mb-0">Hôtels 4★</h5>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-6 mb-4 text-center">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center justify-content-center">
                    <h5 class="mb-0">Agences Locales</h5>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-6 mb-4 text-center">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center justify-content-center">
                    <h5 class="mb-0">Transporteurs</h5>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-6 mb-4 text-center">
            <div class="card h-100">
                <div class="card-body d-flex align-items-center justify-content-center">
                    <h5 class="mb-0">Guides Experts</h5>
                </div>
            </div>
        </div>
    </div>
</x-tourism.section>

<!-- Statistiques -->
<x-tourism.stats />

<!-- Témoignages -->
<x-tourism.section 
    title="Ce que disent nos clients" 
    subtitle="La satisfaction de nos clients est notre plus grande récompense"
>
    <div class="row">
        <x-tourism.testimonial-card 
            name="Pierre Dubois"
            location="Voyageur français"
            text="TOURISM237 a transformé ma vision du Cameroun. Un service exceptionnel et des guides passionnés !"
            image="images/client1.jpg"
            rating="5"
        />
        
        <x-tourism.testimonial-card 
            name="Anna Schmidt"
            location="Touriste allemande"
            text="Grâce à TOURISM237, j'ai découvert un Cameroun que je ne connaissais pas. Une expérience inoubliable !"
            image="images/client2.jpg"
            rating="5"
        />
        
        <x-tourism.testimonial-card 
            name="Mohamed Ali"
            location="Voyageur marocain"
            text="Professionnalisme et chaleur humaine, c'est ce qui caractérise TOURISM237. Je recommande vivement !"
            image="images/client3.jpg"
            rating="5"
        />
    </div>
</x-tourism.section>

<!-- Call to Action -->
<x-tourism.cta 
    title="Rejoignez l'aventure TOURISM237"
    subtitle="Découvrez le Cameroun avec nous et vivez une expérience inoubliable"
    buttonText="COMMENCER MON VOYAGE"
    buttonHref="contact"
/>
@endsection
