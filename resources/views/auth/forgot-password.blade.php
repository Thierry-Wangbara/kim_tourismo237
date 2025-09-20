@extends('layouts.app')

@section('title', 'Mot de passe oublié - TOURISM237')

@section('content')
<div class="container-fluid">
    <div class="row min-vh-100">
        <!-- Section gauche - Image et présentation -->
        <div class="col-lg-6 d-none d-lg-block p-0">
            <div class="position-relative h-100">
                <img src="images/forgot-password-bg.jpg" 
                     class="w-100 h-100" 
                     style="object-fit: cover;" 
                     alt="Mot de passe oublié TOURISM237">
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex align-items-center justify-content-center">
                    <div class="text-center text-white p-5">
                        <h2 class="display-4 fw-bold mb-4">Mot de passe oublié ?</h2>
                        <p class="lead mb-4">
                            Pas de souci ! Entrez votre adresse email et nous vous enverrons un lien pour réinitialiser votre mot de passe.
                        </p>
                        <div class="row text-center">
                            <div class="col-4">
                                <i class="bi bi-envelope display-6 mb-2"></i>
                                <p>Entrez votre email</p>
                            </div>
                            <div class="col-4">
                                <i class="bi bi-send display-6 mb-2"></i>
                                <p>Recevez le lien</p>
                            </div>
                            <div class="col-4">
                                <i class="bi bi-key display-6 mb-2"></i>
                                <p>Réinitialisez</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section droite - Formulaire -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center p-5">
            <div class="w-100" style="max-width: 400px;">
                <!-- Logo et titre -->
                <div class="text-center mb-5">
                    <h1 class="text-primary fw-bold mb-3">
                        <i class="bi bi-globe me-2"></i>TOURISM237
                    </h1>
                    <h2 class="h4 text-muted">Mot de passe oublié</h2>
                    <p class="text-muted">Entrez votre adresse email pour recevoir un lien de réinitialisation</p>
                </div>

                <!-- Formulaire -->
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    
                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="form-label">
                            <i class="bi bi-envelope me-2"></i>Adresse email
                        </label>
                        <input type="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               id="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required 
                               autocomplete="email" 
                               autofocus
                               placeholder="votre@email.com">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Message de statut -->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            <i class="bi bi-check-circle me-2"></i>
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Bouton d'envoi -->
                    <button type="submit" class="btn btn-primary w-100 py-3 mb-3">
                        <i class="bi bi-send me-2"></i>Envoyer le lien de réinitialisation
                    </button>

                    <!-- Lien vers la connexion -->
                    <div class="text-center">
                        <p class="text-muted">
                            Vous vous souvenez de votre mot de passe ? 
                            <a href="{{ route('login') }}" class="text-primary text-decoration-none fw-bold">
                                Se connecter
                            </a>
                        </p>
                    </div>
                </form>

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