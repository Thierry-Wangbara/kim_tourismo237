@extends('layouts.app')

@section('title', 'Sélection du Type de Compte - TOURISM237')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="text-center mb-5">
                <h1 class="text-primary fw-bold mb-3">
                    <i class="bi bi-globe me-2"></i>TOURISM237
                </h1>
                <h2 class="h4 text-muted">Choisissez votre type de compte</h2>
                <p class="text-muted">Sélectionnez le type de compte qui correspond le mieux à vos besoins</p>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <!-- Touriste -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 text-center">
                <div class="card-body p-4">
                    <i class="bi bi-person display-1 text-primary mb-3"></i>
                    <h4 class="card-title">Touriste</h4>
                    <p class="card-text text-muted">
                        Découvrez le Cameroun, réservez vos visites et hébergements
                    </p>
                    <ul class="list-unstyled text-start">
                        <li class="mb-2">
                            <i class="bi bi-check text-success me-2"></i>Réservation de visites
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check text-success me-2"></i>Recherche d'hébergements
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check text-success me-2"></i>Transport
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check text-success me-2"></i>Guides touristiques
                        </li>
                    </ul>
                    <a href="{{ route('register', ['type' => 'tourist']) }}" class="btn btn-primary w-100">
                        Choisir Touriste
                    </a>
                </div>
            </div>
        </div>

        <!-- Gestionnaire de Site -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 text-center">
                <div class="card-body p-4">
                    <i class="bi bi-geo-alt display-1 text-success mb-3"></i>
                    <h4 class="card-title">Gestionnaire de Site</h4>
                    <p class="card-text text-muted">
                        Gérez votre site touristique, vos réservations et vos visiteurs
                    </p>
                    <ul class="list-unstyled text-start">
                        <li class="mb-2">
                            <i class="bi bi-check text-success me-2"></i>Gestion des réservations
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check text-success me-2"></i>Planning des visites
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check text-success me-2"></i>Gestion des guides
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check text-success me-2"></i>Statistiques détaillées
                        </li>
                    </ul>
                    <a href="{{ route('register', ['type' => 'site_manager']) }}" class="btn btn-success w-100">
                        Choisir Gestionnaire
                    </a>
                </div>
            </div>
        </div>


        <!-- Administrateur -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 text-center">
                <div class="card-body p-4">
                    <i class="bi bi-shield-check display-1 text-danger mb-3"></i>
                    <h4 class="card-title">Administrateur</h4>
                    <p class="card-text text-muted">
                        Accès complet à la plateforme et gestion des utilisateurs
                    </p>
                    <ul class="list-unstyled text-start">
                        <li class="mb-2">
                            <i class="bi bi-check text-success me-2"></i>Gestion des utilisateurs
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check text-success me-2"></i>Modération des contenus
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check text-success me-2"></i>Statistiques globales
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-check text-success me-2"></i>Configuration système
                        </li>
                    </ul>
                    <a href="{{ route('register', ['type' => 'admin']) }}" class="btn btn-danger w-100">
                        Choisir Admin
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Informations supplémentaires -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="card bg-light">
                <div class="card-body text-center">
                    <h5 class="card-title">Besoin d'aide pour choisir ?</h5>
                    <p class="card-text text-muted mb-3">
                        Chaque type de compte offre des fonctionnalités spécifiques adaptées à vos besoins.
                        Vous pourrez toujours modifier votre type de compte plus tard.
                    </p>
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <i class="bi bi-question-circle text-primary me-2"></i>
                            <a href="#" class="text-decoration-none">Questions fréquentes</a>
                        </div>
                        <div class="col-md-4 mb-2">
                            <i class="bi bi-telephone text-primary me-2"></i>
                            <a href="#" class="text-decoration-none">Nous contacter</a>
                        </div>
                        <div class="col-md-4 mb-2">
                            <i class="bi bi-chat text-primary me-2"></i>
                            <a href="#" class="text-decoration-none">Support en ligne</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
