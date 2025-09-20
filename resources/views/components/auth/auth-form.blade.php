@props(['type' => 'login', 'title' => '', 'subtitle' => ''])

<div class="container-fluid">
    <div class="row min-vh-100">
        <!-- Section gauche - Image et présentation -->
        <div class="col-lg-6 d-none d-lg-block p-0">
            <div class="position-relative h-100">
                <img src="{{ $type === 'login' ? 'images/login-bg.jpg' : ($type === 'register' ? 'images/register-bg.jpg' : 'images/auth-bg.jpg') }}" 
                     class="w-100 h-100" 
                     style="object-fit: cover;" 
                     alt="{{ $title }} TOURISM237">
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex align-items-center justify-content-center">
                    <div class="text-center text-white p-5">
                        <h2 class="display-4 fw-bold mb-4">{{ $title }}</h2>
                        <p class="lead mb-4">{{ $subtitle }}</p>
                        <div class="row text-center">
                            @if($type === 'login')
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
                            @elseif($type === 'register')
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
                            @else
                                <div class="col-4">
                                    <i class="bi bi-shield-lock display-6 mb-2"></i>
                                    <p>Sécurisé</p>
                                </div>
                                <div class="col-4">
                                    <i class="bi bi-key display-6 mb-2"></i>
                                    <p>Unique</p>
                                </div>
                                <div class="col-4">
                                    <i class="bi bi-check-circle display-6 mb-2"></i>
                                    <p>Confirmé</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section droite - Formulaire -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center p-5">
            <div class="w-100" style="max-width: {{ $type === 'register' ? '500px' : '400px' }};">
                <!-- Logo et titre -->
                <div class="text-center mb-5">
                    <h1 class="text-primary fw-bold mb-3">
                        <i class="bi bi-globe me-2"></i>TOURISM237
                    </h1>
                    <h2 class="h4 text-muted">{{ $title }}</h2>
                    <p class="text-muted">{{ $subtitle }}</p>
                </div>

                {{ $slot }}

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
