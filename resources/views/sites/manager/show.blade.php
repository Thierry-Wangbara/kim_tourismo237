@extends('layouts.site-manager')

@section('title', $site->name . ' - TOURISM237')

@section('content')
<div class="container-fluid py-4">
    <!-- En-tête -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">
                        <i class="bi bi-geo-alt me-2"></i>{{ $site->name }}
                    </h2>
                    <p class="text-muted mb-0">{{ $site->location }}</p>
                </div>
                <div class="btn-group">
                    <a href="{{ route('sites.manager.edit', $site) }}" class="btn btn-warning">
                        <i class="bi bi-pencil me-2"></i>Modifier
                    </a>
                    <a href="{{ route('site-manager.sites.bookings', $site) }}" class="btn btn-outline-primary">
                        <i class="bi bi-calendar-check me-2"></i>Réservations
                    </a>
                    <a href="{{ route('sites.manager.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-2"></i>Mes Sites
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-4">
                        @if($site->image)
                            <img src="{{ asset('storage/' . $site->image) }}" 
                                 class="card-img-top" 
                                 height="400" 
                                 style="object-fit: cover;" 
                                 alt="{{ $site->name }}">
                        @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                                 style="height: 400px;">
                                <i class="bi bi-image text-muted" style="font-size: 4rem;"></i>
                            </div>
                        @endif

                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h4 class="card-title">{{ $site->name }}</h4>
                                <span class="badge {{ $site->is_active ? 'bg-success' : 'bg-secondary' }} fs-6">
                                    {{ $site->is_active ? 'Actif' : 'Inactif' }}
                                </span>
                            </div>

                            <p class="text-muted mb-3">
                                <i class="bi bi-geo-alt me-1"></i>{{ $site->location }}, {{ $site->region }}
                            </p>

                            <p class="card-text">{{ $site->description }}</p>

                            @if($site->features && count($site->features) > 0)
                                <div class="mt-4">
                                    <h6>Caractéristiques :</h6>
                                    <div class="d-flex flex-wrap gap-2">
                                        @foreach($site->features as $feature)
                                            <span class="badge bg-primary">{{ ucfirst($feature) }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    @if($site->gallery && count($site->gallery) > 0)
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="card-title mb-0">
                                    <i class="bi bi-images me-2"></i>Galerie d'Images
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach($site->gallery as $image)
                                        <div class="col-md-4 mb-3">
                                            <img src="{{ asset('storage/' . $image) }}" 
                                                 class="img-fluid rounded" 
                                                 style="height: 150px; width: 100%; object-fit: cover;" 
                                                 alt="Galerie {{ $site->name }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi bi-info-circle me-2"></i>Informations
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <strong>Prix :</strong>
                                <span class="text-primary fw-bold">{{ $site->formatted_price }}</span>
                            </div>

                            @if($site->average_rating > 0)
                                <div class="mb-3">
                                    <strong>Note :</strong>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-star-fill text-warning me-1"></i>
                                        <span>{{ $site->average_rating }}</span>
                                        <small class="text-muted ms-1">({{ $site->rating_count }} avis)</small>
                                    </div>
                                </div>
                            @endif

                            @if($site->contact_phone)
                                <div class="mb-3">
                                    <strong>Téléphone :</strong>
                                    <a href="tel:{{ $site->contact_phone }}" class="text-decoration-none">
                                        {{ $site->contact_phone }}
                                    </a>
                                </div>
                            @endif

                            @if($site->contact_email)
                                <div class="mb-3">
                                    <strong>Email :</strong>
                                    <a href="mailto:{{ $site->contact_email }}" class="text-decoration-none">
                                        {{ $site->contact_email }}
                                    </a>
                                </div>
                            @endif

                            @if($site->opening_hours)
                                <div class="mb-3">
                                    <strong>Horaires :</strong>
                                    <p class="mb-0 small">{{ $site->opening_hours }}</p>
                                </div>
                            @endif

                            @if($site->access_info)
                                <div class="mb-3">
                                    <strong>Accès :</strong>
                                    <p class="mb-0 small">{{ $site->access_info }}</p>
                                </div>
                            @endif

                            @if($site->latitude && $site->longitude)
                                <div class="mb-3">
                                    <strong>Coordonnées :</strong>
                                    <p class="mb-0 small">
                                        {{ $site->latitude }}, {{ $site->longitude }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">
                                <i class="bi bi-graph-up me-2"></i>Statistiques
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-6">
                                    <div class="border-end">
                                        <h4 class="text-primary mb-0">{{ $site->rating_count }}</h4>
                                        <small class="text-muted">Avis</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <h4 class="text-success mb-0">{{ $site->is_active ? 'Oui' : 'Non' }}</h4>
                                    <small class="text-muted">Actif</small>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center">
                                <small class="text-muted">
                                    Créé le {{ $site->created_at->format('d/m/Y à H:i') }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
