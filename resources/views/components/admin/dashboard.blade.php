@props(['stats' => []])

<div class="row mb-4">
    <div class="col-md-3 col-6 mb-3">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h4 class="mb-0">{{ number_format($stats['total_bookings'] ?? 0) }}</h4>
                        <p class="mb-0">Réservations</p>
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
                        <h4 class="mb-0">{{ number_format($stats['total_revenue'] ?? 0, 0, ',', ' ') }} FCFA</h4>
                        <p class="mb-0">Revenus</p>
                    </div>
                    <div class="align-self-center">
                        <i class="bi bi-currency-dollar display-4"></i>
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
                        <h4 class="mb-0">{{ number_format($stats['active_sites'] ?? 0) }}</h4>
                        <p class="mb-0">Sites Actifs</p>
                    </div>
                    <div class="align-self-center">
                        <i class="bi bi-geo-alt display-4"></i>
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
                        <h4 class="mb-0">{{ number_format($stats['total_users'] ?? 0) }}</h4>
                        <p class="mb-0">Utilisateurs</p>
                    </div>
                    <div class="align-self-center">
                        <i class="bi bi-people display-4"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Réservations Récentes</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Service</th>
                                <th>Date</th>
                                <th>Montant</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentBookings ?? [] as $booking)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center me-2" 
                                                 style="width: 32px; height: 32px;">
                                                <i class="bi bi-person-fill text-primary"></i>
                                            </div>
                                            <div>
                                                <div class="fw-bold">{{ $booking->user->name }}</div>
                                                <small class="text-muted">{{ $booking->user->email }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <div class="fw-bold">{{ $booking->site->name }}</div>
                                            <small class="text-muted">{{ $booking->site->location }}</small>
                                        </div>
                                    </td>
                                    <td>{{ $booking->visit_date->format('d/m/Y') }}</td>
                                    <td>{{ $booking->total_price ? number_format($booking->total_price, 0, ',', ' ') . ' FCFA' : 'Gratuit' }}</td>
                                    <td>
                                        <span class="badge {{ $booking->status_badge['class'] }}">
                                            {{ $booking->status_badge['label'] }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('site-manager.bookings.show', $booking) }}" class="btn btn-sm btn-outline-primary">Voir</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        <i class="bi bi-calendar-x text-muted" style="font-size: 2rem;"></i>
                                        <p class="text-muted mt-2 mb-0">Aucune réservation</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Actions Rapides</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('site-manager.bookings.index') }}" class="btn btn-primary">
                        <i class="bi bi-calendar-check me-2"></i>Gérer les Réservations
                    </a>
                    <a href="{{ route('sites') }}" class="btn btn-outline-primary">
                        <i class="bi bi-geo-alt me-2"></i>Voir les Sites
                    </a>
                    <a href="{{ route('hotel') }}" class="btn btn-outline-primary">
                        <i class="bi bi-building me-2"></i>Voir les Hôtels
                    </a>
                    <a href="{{ route('vehicule') }}" class="btn btn-outline-primary">
                        <i class="bi bi-car-front me-2"></i>Voir les Véhicules
                    </a>
                    <button class="btn btn-outline-primary" onclick="alert('Fonctionnalité à venir')">
                        <i class="bi bi-people me-2"></i>Gérer les Utilisateurs
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
