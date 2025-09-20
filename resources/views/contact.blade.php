@extends('layouts.app')

@section('title', 'Contact - TOURISM237')

@section('content')
<x-tourism.section 
    title="Contactez-nous" 
    subtitle="Nous sommes là pour vous aider à planifier votre voyage au Cameroun"
    background="bg-light"
    padding="py-5"
>
    <x-tourism.contact-form 
        title="Planifiez votre voyage"
        subtitle="Remplissez le formulaire ci-dessous et notre équipe vous contactera dans les plus brefs délais"
    />
</x-tourism.section>

<!-- Informations de Contact -->
<x-tourism.section 
    title="Nos Coordonnées" 
    subtitle="Plusieurs façons de nous contacter"
>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <i class="bi bi-geo-alt-fill text-primary display-4 mb-3"></i>
                    <h5 class="card-title">Adresse</h5>
                    <p class="card-text">
                        Emombo-Chapelle<br>
                        Yaoundé, Cameroun
                    </p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <i class="bi bi-telephone-fill text-primary display-4 mb-3"></i>
                    <h5 class="card-title">Téléphone</h5>
                    <p class="card-text">
                        +237 640 94 40 68<br>
                        +237 655 12 34 56
                    </p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
                <div class="card-body">
                    <i class="bi bi-envelope-fill text-primary display-4 mb-3"></i>
                    <h5 class="card-title">Email</h5>
                    <p class="card-text">
                        kimayesarah96@gmail.com<br>
                        info@tourism237.com
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-tourism.section>

<!-- Horaires d'ouverture -->
<x-tourism.section 
    title="Horaires d'Ouverture" 
    subtitle="Notre équipe est disponible pour vous"
    background="bg-light"
>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">Horaires de Service</h5>
                    <div class="row">
                        <div class="col-6">
                            <h6>Lundi - Vendredi</h6>
                            <p class="text-muted">8h00 - 18h00</p>
                        </div>
                        <div class="col-6">
                            <h6>Samedi</h6>
                            <p class="text-muted">9h00 - 16h00</p>
                        </div>
                        <div class="col-6">
                            <h6>Dimanche</h6>
                            <p class="text-muted">10h00 - 14h00</p>
                        </div>
                        <div class="col-6">
                            <h6>Urgences</h6>
                            <p class="text-muted">24h/24</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-tourism.section>

<!-- Réseaux Sociaux -->
<x-tourism.section 
    title="Suivez-nous" 
    subtitle="Restez connecté avec TOURISM237 sur les réseaux sociaux"
>
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <div class="d-flex justify-content-center gap-3">
                <a href="#" class="social-icon">
                    <i class="bi bi-facebook"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="bi bi-twitter"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="bi bi-instagram"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="bi bi-linkedin"></i>
                </a>
                <a href="#" class="social-icon">
                    <i class="bi bi-youtube"></i>
                </a>
            </div>
            <p class="mt-3 text-muted">
                Suivez nos actualités, découvrez nos nouvelles destinations et partagez vos expériences avec nous !
            </p>
        </div>
    </div>
</x-tourism.section>

<!-- Call to Action -->
<x-tourism.cta 
    title="Prêt à commencer votre aventure ?"
    subtitle="Contactez-nous dès maintenant pour planifier votre voyage au Cameroun"
    buttonText="COMMENCER MA RÉSERVATION"
    buttonHref="#"
/>
@endsection
