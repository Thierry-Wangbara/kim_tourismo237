@extends('layouts.app')

@section('title', 'Vérification email - TOURISM237')

@section('content')
<div class="container-fluid">
    <div class="row min-vh-100">
        <!-- Section gauche - Image et présentation -->
        <div class="col-lg-6 d-none d-lg-block p-0">
            <div class="position-relative h-100">
                <img src="images/verify-email-bg.jpg" 
                     class="w-100 h-100" 
                     style="object-fit: cover;" 
                     alt="Vérification email TOURISM237">
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex align-items-center justify-content-center">
                    <div class="text-center text-white p-5">
                        <h2 class="display-4 fw-bold mb-4">Vérifiez votre email</h2>
                        <p class="lead mb-4">
                            Nous avons envoyé un lien de vérification à votre adresse email
                        </p>
                        <div class="row text-center">
                            <div class="col-4">
                                <i class="bi bi-envelope display-6 mb-2"></i>
                                <p>Email envoyé</p>
                            </div>
                            <div class="col-4">
                                <i class="bi bi-check-circle display-6 mb-2"></i>
                                <p>Cliquez sur le lien</p>
                            </div>
                            <div class="col-4">
                                <i class="bi bi-shield-check display-6 mb-2"></i>
                                <p>Compte vérifié</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section droite - Contenu -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center p-5">
            <div class="w-100" style="max-width: 500px;">
                <!-- Logo et titre -->
                <div class="text-center mb-5">
                    <h1 class="text-primary fw-bold mb-3">
                        <i class="bi bi-globe me-2"></i>TOURISM237
                    </h1>
                    <h2 class="h4 text-muted">Vérification de l'email</h2>
                </div>

                <!-- Message principal -->
                <div class="text-center mb-4">
                    <i class="bi bi-envelope-check display-1 text-primary mb-3"></i>
                    <h3 class="h5 mb-3">Vérifiez votre adresse email</h3>
                    <p class="text-muted mb-4">
                        Avant de continuer, veuillez vérifier votre email pour un lien de vérification. 
                        Si vous n'avez pas reçu l'email, nous pouvons vous en renvoyer un.
                    </p>
                </div>

                <!-- Formulaire de renvoi -->
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    
                    <button type="submit" class="btn btn-primary w-100 py-3 mb-3">
                        <i class="bi bi-send me-2"></i>Renvoyer l'email de vérification
                    </button>
                </form>

                <!-- Message de statut -->
                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success" role="alert">
                        <i class="bi bi-check-circle me-2"></i>
                        Un nouveau lien de vérification a été envoyé à votre adresse email.
                    </div>
                @endif

                <!-- Actions supplémentaires -->
                <div class="text-center mt-4">
                    <p class="text-muted mb-3">
                        Vous avez vérifié votre email ? 
                        <a href="{{ route('dashboard.tourist') }}" class="text-primary text-decoration-none fw-bold">
                            Continuer vers le tableau de bord
                        </a>
                    </p>
                    
                    <p class="text-muted">
                        Vous voulez vous déconnecter ? 
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-link text-muted p-0 text-decoration-none">
                                Se déconnecter
                            </button>
                        </form>
                    </p>
                </div>

                <!-- Retour à l'accueil -->
                <div class="text-center mt-4">
                    <a href="{{ url('/') }}" class="text-muted text-decoration-none">
                        <i class="bi bi-arrow-left me-1"></i>Retour à l'accueil
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
