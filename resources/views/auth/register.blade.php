@extends('layouts.app')

@section('title', 'Inscription - TOURISM237')

@section('content')
<div class="container-fluid">
    <div class="row min-vh-100">
        <!-- Section gauche - Image et présentation -->
        <div class="col-lg-6 d-none d-lg-block p-0">
            <div class="position-relative h-100">
                <img src="images/register-bg.jpg" 
                     class="w-100 h-100" 
                     style="object-fit: cover;" 
                     alt="Inscription TOURISM237">
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex align-items-center justify-content-center">
                    <div class="text-center text-white p-5">
                        <h2 class="display-4 fw-bold mb-4">Rejoignez TOURISM237</h2>
                        <p class="lead mb-4">
                            Créez votre compte et commencez votre aventure au Cameroun
                        </p>
                        <div class="row text-center">
                            <div class="col-4">
                                <i class="bi bi-person-plus display-6 mb-2"></i>
                                <p>Inscrivez-vous</p>
                            </div>
                            <div class="col-4">
                                <i class="bi bi-calendar-check display-6 mb-2"></i>
                                <p>Réservez</p>
                            </div>
                            <div class="col-4">
                                <i class="bi bi-airplane display-6 mb-2"></i>
                                <p>Voyagez</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section droite - Formulaire d'inscription -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center p-5">
            <div class="w-100" style="max-width: 500px;">
                <!-- Logo et titre -->
                <div class="text-center mb-5">
                    <h1 class="text-primary fw-bold mb-3">
                        <i class="bi bi-globe me-2"></i>TOURISM237
                    </h1>
                    <h2 class="h4 text-muted">Créer votre compte</h2>
                    <p class="text-muted">Rejoignez notre communauté de voyageurs</p>
                </div>

                <!-- Formulaire d'inscription -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    
                    <!-- Nom et Prénom -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="first_name" class="form-label">
                                <i class="bi bi-person me-2"></i>Prénom
                            </label>
                            <input type="text" 
                                   class="form-control @error('first_name') is-invalid @enderror" 
                                   id="first_name" 
                                   name="first_name" 
                                   value="{{ old('first_name') }}" 
                                   required 
                                   autocomplete="given-name"
                                   placeholder="Votre prénom">
                            @error('first_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="last_name" class="form-label">
                                <i class="bi bi-person me-2"></i>Nom
                            </label>
                            <input type="text" 
                                   class="form-control @error('last_name') is-invalid @enderror" 
                                   id="last_name" 
                                   name="last_name" 
                                   value="{{ old('last_name') }}" 
                                   required 
                                   autocomplete="family-name"
                                   placeholder="Votre nom">
                            @error('last_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

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
                               placeholder="votre@email.com">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Téléphone -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">
                            <i class="bi bi-telephone me-2"></i>Téléphone
                        </label>
                        <input type="tel" 
                               class="form-control @error('phone') is-invalid @enderror" 
                               id="phone" 
                               name="phone" 
                               value="{{ old('phone') }}" 
                               autocomplete="tel"
                               placeholder="+237 6XX XX XX XX">
                        @error('phone')
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
                                   autocomplete="new-password"
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
                        <div class="form-text">
                            Le mot de passe doit contenir au moins 8 caractères
                        </div>
                    </div>

                    <!-- Confirmation du mot de passe -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">
                            <i class="bi bi-lock-fill me-2"></i>Confirmer le mot de passe
                        </label>
                        <input type="password" 
                               class="form-control" 
                               id="password_confirmation" 
                               name="password_confirmation" 
                               required 
                               autocomplete="new-password"
                               placeholder="Confirmez votre mot de passe">
                    </div>

                    <!-- Type de compte -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">Type de compte</label>
                        <div class="row justify-content-center">
                            <div class="col-md-4 mb-3">
                                <div class="card h-100">
                                    <div class="card-body text-center">
                                        <input class="form-check-input" 
                                               type="radio" 
                                               name="account_type" 
                                               id="tourist" 
                                               value="tourist" 
                                               {{ old('account_type', 'tourist') == 'tourist' ? 'checked' : '' }}>
                                        <div class="mt-2">
                                            <i class="bi bi-person display-4 text-primary mb-2"></i>
                                            <h6 class="card-title">Touriste</h6>
                                            <p class="card-text small text-muted">
                                                Découvrez le Cameroun, réservez vos visites et hébergements
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card h-100">
                                    <div class="card-body text-center">
                                        <input class="form-check-input" 
                                               type="radio" 
                                               name="account_type" 
                                               id="site_manager" 
                                               value="site_manager" 
                                               {{ old('account_type') == 'site_manager' ? 'checked' : '' }}>
                                        <div class="mt-2">
                                            <i class="bi bi-geo-alt display-4 text-success mb-2"></i>
                                            <h6 class="card-title">Gestionnaire de Site</h6>
                                            <p class="card-text small text-muted">
                                                Gérez votre site touristique, vos réservations et vos visiteurs
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="card h-100">
                                    <div class="card-body text-center">
                                        <input class="form-check-input" 
                                               type="radio" 
                                               name="account_type" 
                                               id="admin" 
                                               value="admin" 
                                               {{ old('account_type') == 'admin' ? 'checked' : '' }}>
                                        <div class="mt-2">
                                            <i class="bi bi-shield-check display-4 text-danger mb-2"></i>
                                            <h6 class="card-title">Administrateur</h6>
                                            <p class="card-text small text-muted">
                                                Accès complet à la plateforme et gestion des utilisateurs
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Conditions d'utilisation -->
                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input @error('terms') is-invalid @enderror" 
                                   type="checkbox" 
                                   name="terms" 
                                   id="terms" 
                                   required>
                            <label class="form-check-label" for="terms">
                                J'accepte les <a href="#" class="text-primary">conditions d'utilisation</a> 
                                et la <a href="#" class="text-primary">politique de confidentialité</a>
                            </label>
                            @error('terms')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Newsletter -->
                    <div class="mb-4">
                        <div class="form-check">
                            <input class="form-check-input" 
                                   type="checkbox" 
                                   name="newsletter" 
                                   id="newsletter" 
                                   {{ old('newsletter') ? 'checked' : '' }}>
                            <label class="form-check-label" for="newsletter">
                                Je souhaite recevoir les offres et actualités de TOURISM237
                            </label>
                        </div>
                    </div>

                    <!-- Bouton d'inscription -->
                    <button type="submit" class="btn btn-primary w-100 py-3 mb-3">
                        <i class="bi bi-person-plus me-2"></i>Créer mon compte
                    </button>

                    <!-- Divider -->
                    <div class="text-center mb-3">
                        <span class="text-muted">ou</span>
                    </div>

                    <!-- Inscription avec Google -->
                    <button type="button" class="btn btn-outline-danger w-100 mb-3">
                        <i class="bi bi-google me-2"></i>S'inscrire avec Google
                    </button>

                    <!-- Inscription avec Facebook -->
                    <button type="button" class="btn btn-outline-primary w-100 mb-4">
                        <i class="bi bi-facebook me-2"></i>S'inscrire avec Facebook
                    </button>

                    <!-- Lien vers la connexion -->
                    <div class="text-center">
                        <p class="text-muted">
                            Déjà un compte ? 
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
