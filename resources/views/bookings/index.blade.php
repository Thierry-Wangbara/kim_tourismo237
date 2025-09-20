@extends('layouts.app')

@section('title', 'Mes Réservations - TOURISM237')

@section('content')
<div class="container py-5">
    <!-- En-tête -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <div class="card-body text-white p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h2 class="mb-2">
                                <i class="bi bi-calendar-check me-3"></i>Mes Réservations
                            </h2>
                            <p class="mb-0 opacity-75">Gérez vos visites planifiées</p>
                        </div>
                        <div class="btn-group">
                            <a href="{{ route('sites') }}" class="btn btn-light btn-lg">
                                <i class="bi bi-plus-circle me-2"></i>Nouvelle réservation
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($bookings->count() > 0)
        <div class="row">
            @foreach($bookings as $booking)
                <div class="col-lg-6 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title mb-0">{{ $booking->site->name }}</h5>
                                <span class="badge {{ $booking->status_badge['class'] }} fs-6">
                                    {{ $booking->status_badge['label'] }}
                                </span>
                            </div>

                            <p class="text-muted small mb-3">
                                <i class="bi bi-geo-alt me-1"></i>{{ $booking->site->location }}
                            </p>

                            <div class="row mb-3">
                                <div class="col-6">
                                    <small class="text-muted">Date de visite</small>
                                    <div class="fw-bold">
                                        <i class="bi bi-calendar me-1"></i>
                                        {{ $booking->visit_date->format('d/m/Y') }}
                                    </div>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">Visiteurs</small>
                                    <div class="fw-bold">
                                        <i class="bi bi-people me-1"></i>
                                        {{ $booking->visitors_count }}
                                    </div>
                                </div>
                            </div>

                            @if($booking->visit_time)
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <small class="text-muted">Heure</small>
                                        <div class="fw-bold">
                                            <i class="bi bi-clock me-1"></i>
                                            {{ $booking->visit_time->format('H:i') }}
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">Prix total</small>
                                        <div class="fw-bold text-primary">
                                            <i class="bi bi-currency-exchange me-1"></i>
                                            {{ $booking->total_price ? number_format($booking->total_price, 0, ',', ' ') . ' FCFA' : 'Gratuit' }}
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <small class="text-muted">Prix total</small>
                                        <div class="fw-bold text-primary">
                                            <i class="bi bi-currency-exchange me-1"></i>
                                            {{ $booking->total_price ? number_format($booking->total_price, 0, ',', ' ') . ' FCFA' : 'Gratuit' }}
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($booking->special_requests)
                                <div class="mb-3">
                                    <small class="text-muted">Demandes spéciales</small>
                                    <div class="small">{{ Str::limit($booking->special_requests, 100) }}</div>
                                </div>
                            @endif

                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    Réservé le {{ $booking->created_at->format('d/m/Y') }}
                                </small>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('bookings.show', $booking) }}" class="btn btn-outline-primary">
                                        <i class="bi bi-eye me-1"></i>Voir
                                    </a>
                                    @if($booking->status === 'pending' || $booking->status === 'confirmed')
                                        <form method="POST" action="{{ route('bookings.cancel', $booking) }}" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" 
                                                    class="btn btn-outline-danger" 
                                                    onclick="return confirm('Êtes-vous sûr de vouloir annuler cette réservation ?')">
                                                <i class="bi bi-x-circle me-1"></i>Annuler
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $bookings->links() }}
        </div>
    @else
        <!-- Aucune réservation -->
        <div class="text-center py-5">
            <div class="mb-4">
                <i class="bi bi-calendar-x text-muted" style="font-size: 4rem;"></i>
            </div>
            <h4 class="text-muted mb-3">Aucune réservation</h4>
            <p class="text-muted mb-4">Vous n'avez pas encore de réservations. Découvrez nos sites et planifiez votre première visite !</p>
            <a href="{{ route('sites') }}" class="btn btn-primary btn-lg">
                <i class="bi bi-compass me-2"></i>Explorer les sites
            </a>
        </div>
    @endif
</div>
@endsection
