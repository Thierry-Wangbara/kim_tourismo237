@extends('layouts.app')

@section('title', 'Connexion - TOURISM237')

@section('content')
<div class="container-fluid">
    <div class="row min-vh-100">
        <!-- Section gauche - Image et présentation -->
        <div class="col-lg-6 d-none d-lg-block p-0">
            <div class="position-relative h-100">
                <img src="images/KRIBI.jpg" 
                     class="w-100 h-100" 
                     style="object-fit: cover;" 
                     alt="Connexion TOURISM237">
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex align-items-center justify-content-center">
                    <div class="text-center text-white p-5">
                        <h2 class="display-4 fw-bold mb-4">Bienvenue sur TOURISM237</h2>
                        <p class="lead mb-4">
                            Connectez-vous pour accéder à votre espace personnel et gérer vos réservations
                        </p>
                        <div class="row text-center">
                            <div class="col-4">
                                <i class="bi bi-geo-alt display-6 mb-2"></i>
                                <p>Découvrez</p>
                            </div>
                            <div class="col-4">
                                <i class="bi bi-calendar-check display-6 mb-2"></i>
                                <p>Réservez</p>
                            </div>
                            <div class="col-4">
                                <i class="bi bi-heart display-6 mb-2"></i>
                                <p>Profitez</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section droite - Formulaire de connexion -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center p-5">
            <div class="w-100" style="max-width: 400px;">
                <!-- Logo et titre -->
                <div class="text-center mb-5">
                    <h1 class="text-dark fw-bold mb-3 text-primary-content">
                        <i class="bi bi-globe me-2"></i>TOURISM237
                    </h1>
                    <h2 class="h4 text-muted">Connexion à votre compte</h2>
                    <p class="text-muted">Accédez à votre espace personnel</p>
                </div>

                <!-- Formulaire de connexion -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <!-- Email -->
                    <div class="mb-3">
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

                    <!-- Mot de passe -->
                    <div class="mb-3">
                        <label for="password" class="form-label">
                            <i class="bi bi-lock me-2"></i>Mot de passe
                        </label>
                        <div class="input-group">
                            <input type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   id="password" 
                                   name="password" 
                                   required 
                                   autocomplete="current-password"
                                   placeholder="Votre mot de passe">
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
                    </div>

                    <!-- Se souvenir de moi et mot de passe oublié -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" 
                                   type="checkbox" 
                                   name="remember" 
                                   id="remember" 
                                   {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                Se souvenir de moi
                            </label>
                        </div>
                        <a href="{{ route('password.request') }}" class="text-decoration-none">
                            Mot de passe oublié ?
                        </a>
                    </div>

                    <!-- Bouton de connexion -->
                    <button type="submit" class="btn btn-primary w-100 py-3 mb-3">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Se connecter
                    </button>

                    <!-- Divider -->
                    <div class="text-center mb-3">
                        <span class="text-muted">ou</span>
                    </div>

                    <!-- Connexion avec Google -->
                    <button type="button" class="btn btn-outline-danger w-100 mb-3">
                        <i class="bi bi-google me-2"></i>Continuer avec Google
                    </button>

                    <!-- Connexion avec Facebook -->
                    <button type="button" class="btn btn-outline-primary w-100 mb-4">
                        <i class="bi bi-facebook me-2"></i>Continuer avec Facebook
                    </button>

                    <!-- Lien vers l'inscription -->
                    <div class="text-center">
                        <p class="text-muted">
                            Pas encore de compte ? 
                            <a href="{{ route('register') }}" class="text-primary text-decoration-none fw-bold">
                                Créer un compte
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
