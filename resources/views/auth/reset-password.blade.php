@extends('layouts.app')

@section('title', 'Nouveau mot de passe - TOURISM237')

@section('content')
<div class="container-fluid">
    <div class="row min-vh-100">
        <!-- Section gauche - Image et présentation -->
        <div class="col-lg-6 d-none d-lg-block p-0">
            <div class="position-relative h-100">
                <img src="images/reset-password-bg.jpg" 
                     class="w-100 h-100" 
                     style="object-fit: cover;" 
                     alt="Nouveau mot de passe TOURISM237">
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex align-items-center justify-content-center">
                    <div class="text-center text-white p-5">
                        <h2 class="display-4 fw-bold mb-4">Nouveau mot de passe</h2>
                        <p class="lead mb-4">
                            Créez un nouveau mot de passe sécurisé pour votre compte TOURISM237
                        </p>
                        <div class="row text-center">
                            <div class="col-4">
                                <i class="bi bi-shield-check display-6 mb-2"></i>
                                <p>Sécurisé</p>
                            </div>
                            <div class="col-4">
                                <i class="bi bi-key display-6 mb-2"></i>
                                <p>Nouveau</p>
                            </div>
                            <div class="col-4">
                                <i class="bi bi-check-circle display-6 mb-2"></i>
                                <p>Confirmé</p>
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
                    <h2 class="h4 text-muted">Nouveau mot de passe</h2>
                    <p class="text-muted">Créez un nouveau mot de passe sécurisé</p>
                </div>

                <!-- Formulaire -->
                <form method="POST" action="{{ route('password.store') }}">
                    @csrf
                    
                    <!-- Token caché -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">
                            <i class="bi bi-envelope me-2"></i>Adresse email
                        </label>
                        <input type="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               id="email" 
                               name="email" 
                               value="{{ old('email', $request->email) }}" 
                               required 
                               autocomplete="email" 
                               autofocus
                               readonly>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Nouveau mot de passe -->
                    <div class="mb-3">
                        <label for="password" class="form-label">
                            <i class="bi bi-lock me-2"></i>Nouveau mot de passe
                        </label>
                        <div class="input-group">
                            <input type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   id="password" 
                                   name="password" 
                                   required 
                                   autocomplete="new-password"
                                   placeholder="Votre nouveau mot de passe">
                            <button class="btn btn-outline-secondary" 
                                    type="button" 
                                    id="togglePassword">
                                <i class="bi bi-eye" id="toggleIcon"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-text">
                            Le mot de passe doit contenir au moins 8 caractères
                        </div>
                    </div>

                    <!-- Confirmation du mot de passe -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">
                            <i class="bi bi-lock-fill me-2"></i>Confirmer le mot de passe
                        </label>
                        <input type="password" 
                               class="form-control" 
                               id="password_confirmation" 
                               name="password_confirmation" 
                               required 
                               autocomplete="new-password"
                               placeholder="Confirmez votre nouveau mot de passe">
                    </div>

                    <!-- Bouton de réinitialisation -->
                    <button type="submit" class="btn btn-primary w-100 py-3 mb-3">
                        <i class="bi bi-check-circle me-2"></i>Réinitialiser le mot de passe
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

<!-- Script pour afficher/masquer le mot de passe -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const togglePassword = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');

    togglePassword.addEventListener('click', function() {
        if (password.type === 'password') {
            password.type = 'text';
            toggleIcon.classList.remove('bi-eye');
            toggleIcon.classList.add('bi-eye-slash');
        } else {
            password.type = 'password';
            toggleIcon.classList.remove('bi-eye-slash');
            toggleIcon.classList.add('bi-eye');
        }
    });
});
</script>
@endsection