@extends('layouts.app')

@section('title', 'Mon Espace - TOURISM237')

@section('content')
<div class="container-fluid py-4">
    <!-- En-tête -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2>Mon Espace Touriste</h2>
                    <p class="text-muted">Gérez vos réservations et découvrez de nouveaux sites</p>
                </div>
                <div class="btn-group">
                    <button class="btn btn-outline-primary">
                        <i class="bi bi-heart me-2"></i>Mes favoris
                    </button>
                    <a href="{{ route('sites') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>Nouvelle réservation
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistiques personnelles -->
    <div class="row mb-4">
        <div class="col-md-3 col-6 mb-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0">{{ $totalBookings }}</h4>
                            <p class="mb-0">Total réservations</p>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-calendar-check display-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-6 mb-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0">{{ $confirmedBookings }}</h4>
                            <p class="mb-0">Confirmées</p>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-check-circle display-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-6 mb-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0">{{ $pendingBookings }}</h4>
                            <p class="mb-0">En attente</p>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-hourglass-split display-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 col-6 mb-3">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h4 class="mb-0">{{ $completedBookings }}</h4>
                            <p class="mb-0">Terminées</p>
                        </div>
                        <div class="align-self-center">
                            <i class="bi bi-flag display-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contenu principal -->
    <div class="row">
        <!-- Réservations récentes -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Mes Réservations Récentes</h5>
                        <a href="{{ route('bookings.index') }}" class="btn btn-outline-primary btn-sm">
                            Voir toutes <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if($recentBookings->count() > 0)
                        <div class="row">
                            @foreach($recentBookings as $booking)
                                <div class="col-md-6 mb-3">
                                    <div class="card h-100">
                                        @if($booking->site->image)
                                            <img src="{{ asset('storage/' . $booking->site->image) }}" 
                                                 class="card-img-top" 
                                                 height="150" 
                                                 style="object-fit: cover;" 
                                                 alt="{{ $booking->site->name }}">
                                        @else
                                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                                                 style="height: 150px;">
                                                <i class="bi bi-image text-muted" style="font-size: 2rem;"></i>
                                            </div>
                                        @endif
                                        <div class="card-body d-flex flex-column">
                                            <h6 class="card-title">{{ $booking->site->name }}</h6>
                                            <p class="card-text small text-muted">
                                                <i class="bi bi-geo-alt me-1"></i>{{ $booking->site->location }}
                                            </p>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <span class="text-primary fw-bold">
                                                    {{ $booking->total_price ? number_format($booking->total_price, 0, ',', ' ') . ' FCFA' : 'Gratuit' }}
                                                </span>
                                                <span class="badge {{ $booking->status_badge['class'] }}">
                                                    {{ $booking->status_badge['label'] }}
                                                </span>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <small class="text-muted">
                                                    <i class="bi bi-calendar me-1"></i>{{ $booking->visit_date->format('d/m/Y') }}
                                                </small>
                                                @if($booking->visit_time)
                                                    <small class="text-muted">
                                                        <i class="bi bi-clock me-1"></i>{{ $booking->visit_time->format('H:i') }}
                                                    </small>
                                                @endif
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">
                                                    <i class="bi bi-people me-1"></i>{{ $booking->visitors_count }} {{ $booking->visitors_count == 1 ? 'personne' : 'personnes' }}
                                                </small>
                                                <a href="{{ route('bookings.show', $booking) }}" class="btn btn-outline-primary btn-sm">
                                                    <i class="bi bi-eye me-1"></i>Voir
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="bi bi-calendar-x text-muted" style="font-size: 3rem;"></i>
                            <h5 class="text-muted mt-3">Aucune réservation</h5>
                            <p class="text-muted">Vous n'avez pas encore de réservations.</p>
                            <a href="{{ route('sites') }}" class="btn btn-primary">
                                <i class="bi bi-compass me-2"></i>Explorer les sites
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Actions rapides et favoris -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Actions Rapides</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('sites') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-2"></i>Nouvelle réservation
                        </a>
                        <a href="{{ route('sites') }}" class="btn btn-outline-primary">
                            <i class="bi bi-geo-alt me-2"></i>Explorer les sites
                        </a>
                        <a href="{{ route('bookings.index') }}" class="btn btn-outline-primary">
                            <i class="bi bi-calendar-check me-2"></i>Mes réservations
                        </a>
                        <button class="btn btn-outline-primary">
                            <i class="bi bi-building me-2"></i>Rechercher un hôtel
                        </button>
                        <button class="btn btn-outline-primary">
                            <i class="bi bi-car-front me-2"></i>Réserver un transport
                        </button>
                        <button class="btn btn-outline-primary">
                            <i class="bi bi-heart me-2"></i>Mes favoris
                        </button>
                    </div>
                </div>
            </div>

            <!-- Prochaines visites -->
            @if($upcomingVisits->count() > 0)
                <div class="card mt-3">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-calendar-event me-2 text-success"></i>Prochaines visites
                        </h5>
                    </div>
                    <div class="card-body p-0">
                        @foreach($upcomingVisits as $visit)
                            <div class="border-bottom p-3">
                                <div class="d-flex">
                                    @if($visit->site->image)
                                        <img src="{{ asset('storage/' . $visit->site->image) }}" 
                                             class="rounded me-3" 
                                             style="width: 50px; height: 50px; object-fit: cover;" 
                                             alt="{{ $visit->site->name }}">
                                    @else
                                        <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center" 
                                             style="width: 50px; height: 50px;">
                                            <i class="bi bi-image text-muted"></i>
                                        </div>
                                    @endif
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">
                                            <a href="{{ route('bookings.show', $visit) }}" class="text-decoration-none">
                                                {{ $visit->site->name }}
                                            </a>
                                        </h6>
                                        <p class="text-muted small mb-1">{{ $visit->site->location }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <small class="text-success fw-bold">
                                                <i class="bi bi-calendar me-1"></i>{{ $visit->visit_date->format('d/m/Y') }}
                                            </small>
                                            @if($visit->visit_time)
                                                <small class="text-muted">
                                                    <i class="bi bi-clock me-1"></i>{{ $visit->visit_time->format('H:i') }}
                                                </small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Mes favoris -->
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-heart me-2 text-danger"></i>Mes Favoris
                    </h5>
                </div>
                <div class="card-body text-center">
                    <i class="bi bi-heart text-muted" style="font-size: 3rem;"></i>
                    <h6 class="text-muted mt-3">Fonctionnalité à venir</h6>
                    <p class="text-muted small">Vous pourrez bientôt sauvegarder vos sites préférés.</p>
                </div>
            </div>

            <!-- Statistiques rapides -->
            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-graph-up me-2 text-info"></i>Statistiques
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-6 mb-3">
                            <div class="border-end">
                                <h4 class="text-primary mb-1">{{ $totalBookings }}</h4>
                                <small class="text-muted">Total</small>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <h4 class="text-success mb-1">{{ $confirmedBookings }}</h4>
                            <small class="text-muted">Confirmées</small>
                        </div>
                        <div class="col-6">
                            <h4 class="text-warning mb-1">{{ $pendingBookings }}</h4>
                            <small class="text-muted">En attente</small>
                        </div>
                        <div class="col-6">
                            <h4 class="text-info mb-1">{{ $completedBookings }}</h4>
                            <small class="text-muted">Terminées</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
