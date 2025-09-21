@extends('layouts.site-manager')

@section('title', 'Gestion des Réservations - TOURISM237')

@section('content')
<div class="container-fluid py-4">
    <!-- En-tête -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1">
                        <i class="bi bi-calendar-check me-2"></i>Gestion des Réservations
                    </h2>
                    <p class="text-muted mb-0">Gérez les réservations de vos sites touristiques</p>
                </div>
                <div class="btn-group">
                    <a href="{{ route('sites.manager.index') }}" class="btn btn-outline-primary">
                        <i class="bi bi-geo-alt me-2"></i>Mes Sites
                    </a>
                    <button class="btn btn-outline-success" onclick="refreshBookings()">
                        <i class="bi bi-arrow-clockwise me-2"></i>Actualiser
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistiques -->
    <div class="row mb-4">
        <div class="col-md-3 col-6 mb-3">
            <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #f4a15dff 0%, #d1cad8ff 100%);">
                <div class="card-body text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-1 fw-bold">{{ $stats['total'] }}</h3>
                            <p class="mb-0 opacity-75">Total Réservations</p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-circle p-3">
                            <i class="bi bi-calendar-check fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-6 mb-3">
            <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #f4a15dff 0%, #d1cad8ff 100%);">
                <div class="card-body text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-1 fw-bold">{{ $stats['pending'] }}</h3>
                            <p class="mb-0 opacity-75">En Attente</p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-circle p-3">
                            <i class="bi bi-hourglass-split fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-6 mb-3">
            <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                <div class="card-body text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-1 fw-bold">{{ $stats['confirmed'] }}</h3>
                            <p class="mb-0 opacity-75">Confirmées</p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-circle p-3">
                            <i class="bi bi-check-circle fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-6 mb-3">
            <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                <div class="card-body text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-1 fw-bold">{{ $stats['cancelled'] }}</h3>
                            <p class="mb-0 opacity-75">Annulées</p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-circle p-3">
                            <i class="bi bi-x-circle fs-1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-6 mb-3">
            <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #6c757d 0%, #495057 100%);">
                <div class="card-body text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-1 fw-bold">{{ $stats['rejected'] }}</h3>
                            <p class="mb-0 opacity-75">Refusées</p>
                        </div>
                        <div class="bg-white bg-opacity-20 rounded-circle p-3">
                            <i class="bi bi-x-octagon fs-1"></i>
                        </div>
                    </div>
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
                        <h5 class="card-title mb-0 text-dark">
                            <i class="bi bi-list-ul me-2 text-primary"></i>Toutes les Réservations
                        </h5>
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-outline-primary active" data-filter="all">Toutes</button>
                            <button class="btn btn-outline-warning" data-filter="pending">En attente</button>
                            <button class="btn btn-outline-success" data-filter="confirmed">Confirmées</button>
                            <button class="btn btn-outline-danger" data-filter="cancelled">Annulées</button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    @if($bookings->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="border-0 py-3 px-4">Réservation</th>
                                        <th class="border-0 py-3">Site</th>
                                        <th class="border-0 py-3">Client</th>
                                        <th class="border-0 py-3">Date de visite</th>
                                        <th class="border-0 py-3">Statut</th>
                                        <th class="border-0 py-3">Prix</th>
                                        <th class="border-0 py-3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bookings as $booking)
                                        <tr data-status="{{ $booking->status }}">
                                            <td class="py-3 px-4">
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                                        <i class="bi bi-calendar-check text-primary"></i>
                                                    </div>
                                                    <div>
                                                        <div class="fw-bold">#{{ $booking->id }}</div>
                                                        <small class="text-muted">{{ $booking->created_at->format('d/m/Y H:i') }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-3">
                                                <div>
                                                    <div class="fw-bold">{{ $booking->site->name }}</div>
                                                    <small class="text-muted">{{ $booking->site->location }}</small>
                                                </div>
                                            </td>
                                            <td class="py-3">
                                                <div>
                                                    <div class="fw-bold">{{ $booking->user->name }}</div>
                                                    <small class="text-muted">{{ $booking->user->email }}</small>
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
                                                <span class="badge {{ $booking->status_badge['class'] }} fs-6">
                                                    {{ $booking->status_badge['label'] }}
                                                </span>
                                            </td>
                                            <td class="py-3">
                                                <div class="fw-bold text-primary">
                                                    {{ $booking->total_price ? number_format($booking->total_price, 0, ',', ' ') . ' FCFA' : 'Gratuit' }}
                                                </div>
                                                <small class="text-muted">{{ $booking->visitors_count }} {{ $booking->visitors_count == 1 ? 'personne' : 'personnes' }}</small>
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
                                                        <button class="btn btn-outline-danger" 
                                                                onclick="showRejectModal({{ $booking->id }})" 
                                                                title="Refuser">
                                                            <i class="bi bi-x-circle"></i>
                                                        </button>
                                                    @endif
                                                    @if(in_array($booking->status, ['confirmed']))
                                                        <button class="btn btn-outline-info" 
                                                                onclick="updateStatus({{ $booking->id }}, 'completed')" 
                                                                title="Marquer comme terminée">
                                                            <i class="bi bi-flag"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="d-flex justify-content-center p-3">
                            {{ $bookings->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="bi bi-calendar-x text-muted" style="font-size: 3rem;"></i>
                            <h5 class="text-muted mt-3">Aucune réservation</h5>
                            <p class="text-muted">Vous n'avez pas encore de réservations pour vos sites.</p>
                            <a href="{{ route('sites.manager.index') }}" class="btn btn-primary">
                                <i class="bi bi-geo-alt me-2"></i>Gérer mes sites
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de mise à jour du statut -->
<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusModalLabel">Modifier le statut</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="statusForm" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="status" class="form-label">Nouveau statut</label>
                        <select class="form-select" id="status" name="status" required>
                            <option value="pending">En attente</option>
                            <option value="confirmed">Confirmée</option>
                            <option value="cancelled">Annulée</option>
                            <option value="completed">Terminée</option>
                            <option value="rejected">Refusée</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="notes" class="form-label">Notes (optionnel)</label>
                        <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Ajoutez des notes pour le client..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal de refus de réservation -->
<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rejectModalLabel">Refuser la réservation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="rejectForm" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="alert alert-warning">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        <strong>Attention :</strong> Cette action refusera définitivement la réservation. Veuillez expliquer la raison du refus au client.
                    </div>
                    <div class="mb-3">
                        <label for="rejection_reason" class="form-label">Raison du refus *</label>
                        <textarea class="form-control @error('rejection_reason') is-invalid @enderror" 
                                  id="rejection_reason" 
                                  name="rejection_reason" 
                                  rows="4" 
                                  placeholder="Expliquez pourquoi cette réservation est refusée..." 
                                  required></textarea>
                        @error('rejection_reason')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Cette raison sera communiquée au client.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-x-circle me-2"></i>Refuser la réservation
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Filtrage des réservations
document.querySelectorAll('[data-filter]').forEach(button => {
    button.addEventListener('click', function() {
        const filter = this.getAttribute('data-filter');
        
        // Mettre à jour les boutons actifs
        document.querySelectorAll('[data-filter]').forEach(btn => btn.classList.remove('active'));
        this.classList.add('active');
        
        // Filtrer les lignes
        document.querySelectorAll('tbody tr').forEach(row => {
            if (filter === 'all' || row.getAttribute('data-status') === filter) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});

// Mise à jour du statut
function updateStatus(bookingId, status) {
    const form = document.getElementById('statusForm');
    form.action = `/site-manager/bookings/${bookingId}/status`;
    document.getElementById('status').value = status;
    
    const modal = new bootstrap.Modal(document.getElementById('statusModal'));
    modal.show();
}

// Afficher le modal de refus
function showRejectModal(bookingId) {
    const form = document.getElementById('rejectForm');
    form.action = `/site-manager/bookings/${bookingId}/reject`;
    document.getElementById('rejection_reason').value = '';
    
    const modal = new bootstrap.Modal(document.getElementById('rejectModal'));
    modal.show();
}
</script>
@endpush
