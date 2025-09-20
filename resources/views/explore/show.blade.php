@extends('layouts.app')

@section('title', $site->name . ' - TOURISM237')

@section('content')


<!-- Contenu principal -->
<div class="container py-5">
    <div class="row">
        <!-- Contenu principal -->
        <div class="col-lg-8">
            <!-- Images -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body p-0">
                    @if($site->image)
                        <img src="{{ asset('storage/' . $site->image) }}" 
                             class="img-fluid w-100" 
                             style="height: 400px; object-fit: cover;" 
                             alt="{{ $site->name }}">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center" 
                             style="height: 400px;">
                            <i class="bi bi-image text-muted" style="font-size: 4rem;"></i>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Galerie -->
            @if($site->gallery && count($site->gallery) > 0)
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-images me-2 text-primary"></i>Galerie Photos
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            @foreach($site->gallery as $image)
                                <div class="col-md-4">
                                    <img src="{{ asset('storage/' . $image) }}" 
                                         class="img-fluid rounded" 
                                         style="height: 200px; width: 100%; object-fit: cover;" 
                                         alt="Galerie {{ $site->name }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Description détaillée -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-info-circle me-2 text-primary"></i>À propos de ce site
                    </h5>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $site->description }}</p>
                    
                    @if($site->features && count($site->features) > 0)
                        <h6 class="mt-4 mb-3">Caractéristiques</h6>
                        <div class="row">
                            @foreach($site->features as $feature)
                                <div class="col-md-6 mb-2">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-check-circle text-success me-2"></i>
                                        <span>{{ ucfirst($feature) }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <!-- Informations pratiques -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-calendar-check me-2 text-primary"></i>Informations pratiques
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @if($site->price)
                            <div class="col-md-6 mb-3">
                                <h6 class="text-muted">Prix d'entrée</h6>
                                <p class="fw-bold text-primary fs-5">{{ $site->formatted_price }}</p>
                            </div>
                        @endif
                        
                        @if($site->opening_hours)
                            <div class="col-md-6 mb-3">
                                <h6 class="text-muted">Horaires d'ouverture</h6>
                                <p class="mb-0">{{ $site->opening_hours }}</p>
                            </div>
                        @endif
                        
                        @if($site->access_info)
                            <div class="col-12 mb-3">
                                <h6 class="text-muted">Informations d'accès</h6>
                                <p class="mb-0">{{ $site->access_info }}</p>
                            </div>
                        @endif
                        
                        @if($site->latitude && $site->longitude)
                            <div class="col-12">
                                <h6 class="text-muted">Coordonnées GPS</h6>
                                <p class="mb-0">
                                    <i class="bi bi-geo-alt me-1"></i>
                                    {{ $site->latitude }}, {{ $site->longitude }}
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Carte de contact -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-person-circle me-2 text-primary"></i>Gestionnaire du site
                    </h5>
                </div>
                <div class="card-body text-center">
                    <div class="mb-3">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" 
                             style="width: 60px; height: 60px;">
                            <i class="bi bi-person-fill text-primary" style="font-size: 1.5rem;"></i>
                        </div>
                    </div>
                    <h6 class="mb-1">{{ $site->user->name }}</h6>
                    <p class="text-muted small mb-3">Gestionnaire de site</p>
                    
                    @if($site->contact_phone)
                        <div class="mb-2">
                            <a href="tel:{{ $site->contact_phone }}" class="btn btn-outline-primary btn-sm w-100">
                                <i class="bi bi-telephone me-2"></i>{{ $site->contact_phone }}
                            </a>
                        </div>
                    @endif
                    
                    @if($site->contact_email)
                        <div class="mb-2">
                            <a href="mailto:{{ $site->contact_email }}" class="btn btn-outline-primary btn-sm w-100">
                                <i class="bi bi-envelope me-2"></i>Envoyer un email
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Actions -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <h6 class="card-title mb-3">
                        <i class="bi bi-lightning me-2 text-warning"></i>Actions
                    </h6>
                    <div class="d-grid gap-2">
                        @auth
                            @if(auth()->user()->isTourist())
                                <a href="{{ route('bookings.create', $site) }}" class="btn btn-primary">
                                    <i class="bi bi-calendar-plus me-2"></i>Planifier une visite
                                </a>
                            @else
                                <button class="btn btn-primary" disabled title="Seuls les touristes peuvent planifier des visites">
                                    <i class="bi bi-calendar-plus me-2"></i>Planifier une visite
                                </button>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary">
                                <i class="bi bi-calendar-plus me-2"></i>Planifier une visite
                            </a>
                        @endauth
                        <button class="btn btn-outline-primary">
                            <i class="bi bi-share me-2"></i>Partager
                        </button>
                        <button class="btn btn-outline-secondary">
                            <i class="bi bi-heart me-2"></i>Ajouter aux favoris
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sites similaires -->
            @if($similarSites->count() > 0)
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-compass me-2 text-primary"></i>Sites similaires
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        @foreach($similarSites as $similarSite)
                            <div class="border-bottom p-3">
                                <div class="d-flex">
                                    @if($similarSite->image)
                                        <img src="{{ asset('storage/' . $similarSite->image) }}" 
                                             class="rounded me-3" 
                                             style="width: 60px; height: 60px; object-fit: cover;" 
                                             alt="{{ $similarSite->name }}">
                                    @else
                                        <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center" 
                                             style="width: 60px; height: 60px;">
                                            <i class="bi bi-image text-muted"></i>
                                        </div>
                                    @endif
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">
                                            <a href="{{ route('explore.show', $similarSite) }}" class="text-decoration-none">
                                                {{ $similarSite->name }}
                                            </a>
                                        </h6>
                                        <p class="text-muted small mb-1">{{ $similarSite->location }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="text-primary fw-bold small">{{ $similarSite->formatted_price }}</span>
                                            @if($similarSite->average_rating > 0)
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-star-fill text-warning me-1" style="font-size: 0.8rem;"></i>
                                                    <small>{{ $similarSite->average_rating }}</small>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation d'apparition des cartes
    const cards = document.querySelectorAll('.card');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            card.style.transition = 'all 0.6s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });
});
</script>
@endpush
