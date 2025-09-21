@extends('layouts.app')

@section('title', 'Réservation #' . $booking->id . ' - TOURISM237')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- En-tête -->
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bold text-primary mb-3">
                    <i class="bi bi-calendar-check me-3"></i>Détails de la réservation
                </h1>
                <p class="lead text-muted">Réservation #{{ $booking->id }}</p>
            </div>

            <div class="row">
                <!-- Détails de la réservation -->
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-white border-0 py-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-title mb-0">
                                    <i class="bi bi-info-circle me-2 text-primary"></i>Informations de la réservation
                                </h4>
                                <span class="badge {{ $booking->status_badge['class'] }} fs-6">
                                    {{ $booking->status_badge['label'] }}
                                </span>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <h6 class="text-muted mb-2">Date de visite</h6>
                                    <p class="fw-bold">
                                        <i class="bi bi-calendar me-2"></i>
                                        {{ $booking->visit_date->format('d/m/Y') }}
                                    </p>
                                </div>

                                @if($booking->visit_time)
                                    <div class="col-md-6 mb-3">
                                        <h6 class="text-muted mb-2">Heure de visite</h6>
                                        <p class="fw-bold">
                                            <i class="bi bi-clock me-2"></i>
                                            {{ $booking->visit_time->format('H:i') }}
                                        </p>
                                    </div>
                                @endif

                                <div class="col-md-6 mb-3">
                                    <h6 class="text-muted mb-2">Nombre de visiteurs</h6>
                                    <p class="fw-bold">
                                        <i class="bi bi-people me-2"></i>
                                        {{ $booking->visitors_count }} {{ $booking->visitors_count == 1 ? 'personne' : 'personnes' }}
                                    </p>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <h6 class="text-muted mb-2">Prix total</h6>
                                    <p class="fw-bold text-primary fs-5">
                                        <i class="bi bi-currency-exchange me-2"></i>
                                        {{ $booking->total_price ? number_format($booking->total_price, 0, ',', ' ') . ' FCFA' : 'Gratuit' }}
                                    </p>
                                </div>

                                @if($booking->special_requests)
                                    <div class="col-12 mb-3">
                                        <h6 class="text-muted mb-2">Demandes spéciales</h6>
                                        <p class="mb-0">{{ $booking->special_requests }}</p>
                                    </div>
                                @endif

                                @if($booking->notes)
                                    <div class="col-12 mb-3">
                                        <h6 class="text-muted mb-2">Notes du gestionnaire</h6>
                                        <div class="alert alert-info mb-0">
                                            <i class="bi bi-info-circle me-2"></i>{{ $booking->notes }}
                                        </div>
                                    </div>
                                @endif

                                <div class="col-12">
                                    <h6 class="text-muted mb-2">Date de réservation</h6>
                                    <p class="mb-0">
                                        <i class="bi bi-calendar-plus me-2"></i>
                                        {{ $booking->created_at->format('d/m/Y à H:i') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    @if($booking->status === 'pending' || $booking->status === 'confirmed')
                        <div class="card border-0 shadow-sm mb-4">
                            <div class="card-body text-center">
                                <h5 class="card-title mb-3">
                                    <i class="bi bi-lightning me-2 text-warning"></i>Actions disponibles
                                </h5>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    @if($booking->status === 'pending')
                                        <button class="btn btn-outline-warning" disabled>
                                            <i class="bi bi-hourglass-split me-2"></i>En attente de confirmation
                                        </button>
                                    @elseif($booking->status === 'confirmed')
                                        <button class="btn btn-success" disabled>
                                            <i class="bi bi-check-circle me-2"></i>Confirmée
                                        </button>
                                    @endif
                                    
                                    <form method="POST" action="{{ route('bookings.cancel', $booking) }}" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" 
                                                class="btn btn-outline-danger" 
                                                onclick="return confirm('Êtes-vous sûr de vouloir annuler cette réservation ?')">
                                            <i class="bi bi-x-circle me-2"></i>Annuler
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Informations du site -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm sticky-top" style="top: 2rem;">
                        <div class="card-header bg-white border-0 py-3">
                            <h5 class="card-title mb-0">
                                <i class="bi bi-geo-alt me-2 text-primary"></i>Site réservé
                            </h5>
                        </div>
                        <div class="card-body">
                            @if($booking->site->image)
                                <img src="{{ asset('storage/' . $booking->site->image) }}" 
                                     class="img-fluid rounded mb-3" 
                                     style="height: 200px; width: 100%; object-fit: cover;" 
                                     alt="{{ $booking->site->name }}">
                            @else
                                <div class="bg-light rounded mb-3 d-flex align-items-center justify-content-center" 
                                     style="height: 200px;">
                                    <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                                </div>
                            @endif

                            <h6 class="fw-bold mb-2">{{ $booking->site->name }}</h6>
                            <p class="text-muted small mb-3">
                                <i class="bi bi-geo-alt me-1"></i>{{ $booking->site->location }}
                            </p>
                            <p class="card-text small">{{ Str::limit($booking->site->description, 150) }}</p>

                            <div class="border-top pt-3 mt-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="text-muted small">Prix par personne :</span>
                                    <span class="fw-bold text-primary">{{ $booking->site->formatted_price }}</span>
                                </div>
                                
                                @if($booking->site->contact_phone)
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="text-muted small">Contact :</span>
                                        <a href="tel:{{ $booking->site->contact_phone }}" class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-telephone me-1"></i>Appeler
                                        </a>
                                    </div>
                                @endif

                                <div class="d-grid mt-3">
                                    <a href="{{ route('explore.show', $booking->site) }}" class="btn btn-outline-orange">
                                        <i class="bi bi-eye me-2"></i>Voir le site
                                    </a>
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
