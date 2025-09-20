@extends('layouts.site-manager')

@section('title', 'Réservations - ' . $site->name . ' - TOURISM237')

@section('content')
<div class="container-fluid py-4">
    <!-- En-tête -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">
                        <i class="bi bi-calendar-check me-2"></i>Réservations - {{ $site->name }}
                    </h2>
                    <p class="text-muted mb-0">{{ $site->location }}</p>
                </div>
                <div class="btn-group">
                    <a href="{{ route('site-manager.bookings.index') }}" class="btn btn-outline-primary">
                        <i class="bi bi-arrow-left me-2"></i>Toutes les réservations
                    </a>
                    <a href="{{ route('sites.manager.show', $site) }}" class="btn btn-outline-success">
                        <i class="bi bi-geo-alt me-2"></i>Voir le site
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Liste des réservations -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-0 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-list-ul me-2 text-primary"></i>Réservations pour ce site
                        </h5>
                        <span class="badge bg-primary fs-6">{{ $bookings->total() }} réservation{{ $bookings->total() > 1 ? 's' : '' }}</span>
                    </div>
                </div>
                <div class="card-body p-0">
                    @if($bookings->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="border-0">Client</th>
                                        <th class="border-0">Date de visite</th>
                                        <th class="border-0">Visiteurs</th>
                                        <th class="border-0">Montant</th>
                                        <th class="border-0">Statut</th>
                                        <th class="border-0">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bookings as $booking)
                                        <tr>
                                            <td class="py-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-3" 
                                                         style="width: 40px; height: 40px;">
                                                        <i class="bi bi-person-fill text-primary"></i>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bold">{{ $booking->user->name }}</div>
                                                        <small class="text-muted">{{ $booking->user->email }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-3">
                                                <div>
                                                    <div class="fw-bold">{{ $booking->visit_date->format('d/m/Y') }}</div>
                                                    @if($booking->visit_time)
                                                        <small class="text-muted">{{ $booking->visit_time->format('H:i') }}</small>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="py-3">
                                                <div class="fw-bold">{{ $booking->visitors_count }}</div>
                                                <small class="text-muted">{{ $booking->visitors_count == 1 ? 'personne' : 'personnes' }}</small>
                                            </td>
                                            <td class="py-3">
                                                <div class="fw-bold text-primary">
                                                    {{ $booking->total_price ? number_format($booking->total_price, 0, ',', ' ') . ' FCFA' : 'Gratuit' }}
                                                </div>
                                            </td>
                                            <td class="py-3">
                                                <span class="badge {{ $booking->status_badge['class'] }} fs-6">
                                                    {{ $booking->status_badge['label'] }}
                                                </span>
                                            </td>
                                            <td class="py-3">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{ route('site-manager.bookings.show', $booking) }}" class="btn btn-outline-primary" title="Voir">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    @if($booking->status === 'pending')
                                                        <form method="POST" action="{{ route('site-manager.bookings.approve', $booking) }}" class="d-inline">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="btn btn-outline-success" title="Approuver" 
                                                                    onclick="return confirm('Êtes-vous sûr de vouloir approuver cette réservation ?')">
                                                                <i class="bi bi-check-circle"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        @if($bookings->hasPages())
                            <div class="card-footer bg-white border-0 py-3">
                                <div class="d-flex justify-content-center">
                                    {{ $bookings->links() }}
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="text-center py-5">
                            <i class="bi bi-calendar-x text-muted" style="font-size: 3rem;"></i>
                            <h5 class="text-muted mt-3">Aucune réservation</h5>
                            <p class="text-muted">Ce site n'a pas encore de réservations.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
